<?php 
@session_start();
$nama=$_SESSION['nama'];
include'../config.php';
$Qmenu = mysql_query("SELECT * FROM daftarmenu ORDER BY id DESC");

$nomorurut=mysql_query("SELECT max(noTransaksi) as maxKode FROM datapesanan where lunas=1");
$nomor=mysql_fetch_array($nomorurut);
$kodeTran = $nomor['maxKode'];

$noUrut = (int) substr($kodeTran, 12, 9);
$noUrut++;
$char = "PSN";
$subthn=date('Y');
$blnhari=date('md');
$newID = $char .$subthn .$blnhari .'-'. sprintf("%03s", $noUrut);
?>
<input type="hidden" id="noTransaksi" value="<?php echo $newID ?>">
<input type="hidden" id="user" value="<?php echo $nama ?>">
<table id="example" class="table table-bordered">
    <thead style="background-color: #0072ff;color: white;text-align: center;">
        <tr>
            <th>NO</th>
            <th>GAMBAR</th>
            <th>MENU</th>
            <th>HARGA</th>
            <th>STOCK</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody style="font-weight: bold;">
        <?php $no=1; while($dataMenu = mysql_fetch_array($Qmenu)){ ?>
        <tr>
            <td width="1%" align="center"><?php echo $no++ ?></td>
            <td width="10%" align="center"><img width="120" height="120" src="<?php echo $dataMenu['gambar'] ?>"><br><?php if($dataMenu['tipe']==1){echo'Makanan';}else{echo'Minuman';} ?></td>
            <td><?php echo $dataMenu['namaMenu'] ?></td>
            <td align="right">Rp.<?php echo number_format($dataMenu['harga'], 0,",",".") ?>,-</td>
            <td align="center"><?php echo $dataMenu['stock'] ?></td>
            <td width="1%">
                <button class="btn btn-warning btn-xs shadow-warning" title="Edit Menu" data-toggle="modal" data-target="#editMenu<?php echo $dataMenu['id'] ?>"><i class="fa fa-edit"></i></button>

                <!--/////////////////////////////////// MODAL EDIT MENU //////////////////////////////////////////-->
                <div id="editMenu<?php echo $dataMenu['id'] ?>" class="modal fade" role="dialog">
                <form method="post" action="edtMenu" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id<?php echo $dataMenu['id'] ?>" value="<?php echo $dataMenu['id'] ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Menu</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body col-sm-12">
                          <div class="form-group col-sm-12">
                            <label>Upload Gambar</label><br>
                            <img width="150" style="padding-bottom: 10px;" src="<?php echo $dataMenu['gambar'] ?>">
                            <input type="file" class="form-control" name="gambar">
                          </div>
                          <div class="form-group col-sm-8">
                            <label>Tipe</label>
                            <select class="form-control" name="tipe">
                              <option selected="selected" disabled="disabled" value="">- Pilihan -</option>
                              <option value="1" <?php if($dataMenu['tipe']==1){echo'selected';}?>>Makanan</option>
                              <option value="2" <?php if($dataMenu['tipe']==2){echo'selected';}?>>Minuman</option>
                            </select>
                          </div>
                          <div class="form-group col-sm-8">
                            <label>Nama Menu</label>
                            <input type="text" class="form-control" name="namaMenu" value="<?php echo $dataMenu['namaMenu'] ?>">
                          </div>
                          <div class="form-group col-sm-7">
                            <label>Harga</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="font-size: 12px;">Rp.</span>
                              </div>
                              <input type="text" name="harga" id="harga" class="form-control" value="<?php echo number_format($dataMenu['harga'], 0,".","."); ?>">
                              </div>
                          </div>
                          <div class="form-group col-sm-4">
                            <label>Stock</label>
                            <input type="number" name="stock" class="form-control" value="<?php echo $dataMenu['stock'] ?>">
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-warning">Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                    </div>
                  </div>
                  </form>
                </div>
                <!--///////////////////////////////////////////////////////////////////////////////////////-->

                <button class="btn btn-danger btn-xs shadow-danger" title="Hapus Menu" id="hapus<?php echo $dataMenu['id'] ?>"><i class="fa fa-trash"></i></button>

                <script type="text/javascript">
                    $("#hapus<?php echo $dataMenu['id'] ?>").on("click",function(){
                      var id = document.getElementById("id<?php echo $dataMenu['id'] ?>").value;
                      var user = document.getElementById("user").value;
                      var validasi = confirm("Yakin menu akan dihapus?");
                        if (validasi == true){
                          $.ajax({
                            url:"delMenu.php",
                            type:"POST",
                            data:{id:id,user:user},
                            success:function(data){
                              swal({
                                icon: 'success',
                                title: 'Deleted successfully',
                                text: "Data berhasil dihapus",
                                type: 'success',
                                timer: 2000,
                                buttons: false,
                              }).then(function(){
                                $('#allMenus').load("allMenus.php");
                              });
                            }
                          });
                        }
                    });
                  </script>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php include'footer.php';?>