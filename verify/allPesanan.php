<?php 
include'../config.php';
$idMeja = $_POST['idMeja'];
$Qmenu = mysql_query("SELECT dt.*, dm.namaMenu FROM datapesanan dt
LEFT JOIN daftarmenu dm ON dt.idMenu=dm.id
WHERE dt.idMeja = '$idMeja' AND dt.lunas=0 ORDER BY id");

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
<div class="card-header"><i class="fa fa-table"></i> Daftar Pesanan</div>
<input type="hidden" id="noTransaksi" value="<?php echo $newID ?>">
<table class="table table-bordered">
    <thead style="background-color: #0072ff;color: white;text-align: center;">
        <tr>
            <th>MENU</th>
            <th>HARGA</th>
            <th></th>
        </tr>
    </thead>
    <tbody style="font-weight: bold;">
        <?php while($dataMenu = mysql_fetch_array($Qmenu)){ ?>
        <tr>
            <input type="hidden" id="id_<?php echo $dataMenu['id'] ?>" value="<?php echo $dataMenu['id'] ?>">
            <input type="hidden" id="idMenu_<?php echo $dataMenu['id'] ?>" value="<?php echo $dataMenu['idMenu'] ?>">
            <input type="hidden" id="harga<?php echo $dataMenu['id'] ?>" value="<?php echo $dataMenu['harga'] ?>">
            <td align="center"><?php echo $dataMenu['namaMenu'] ?></td>
            <td align="right">Rp.<?php echo number_format($dataMenu['harga'], 0,",",".") ?>,-</td>
            <td align="center">
                <button class="btn btn-sm btn-danger" id="batal<?php echo $dataMenu['id'] ?>">X</button>
            </td>
        </tr>

        <script type="text/javascript">
          $("#pesanMenu<?php echo $dataMenu['id'] ?>").on("click",function(){
            var noTransaksi = document.getElementById("noTransaksi").value;
            var idMeja = document.getElementById("idMeja").value;
            if(idMeja==''){
                alert('Nomor meja harus dipilih !');
                return;
            }
            var idMenu = document.getElementById("idMenu_<?php echo $dataMenu['id'] ?>").value;
            var harga = document.getElementById("harga<?php echo $dataMenu['id'] ?>").value;
            var user = document.getElementById("user").value;
              $.ajax({
                url: 'addPesanan.php',
                method: 'POST',
                data: {noTransaksi:noTransaksi,idMeja:idMeja,idMenu:idMenu,harga:harga,user:user},
                success:function(data){
                    swal({
                        icon: 'success',
                        title: 'Pemesanan Berhasil',
                        text: 'Pemesanan berhasil disimpan No.Pesanan : '+noTransaksi+'',
                        type: 'success',
                        timer: 10000,
                        button: false,
                      });
                    $(document).ready(function(){
                      $('#daftarMenus').load("daftarMenus.php");
                    });
                }
              });
          });

          $("#batal<?php echo $dataMenu['id'] ?>").on("click",function(){
            var id = document.getElementById("id_<?php echo $dataMenu['id'] ?>").value;
            var idMeja = document.getElementById("idMeja").value;
            var idMenu = document.getElementById("idMenu_<?php echo $dataMenu['id'] ?>").value;
            var user = document.getElementById("user").value;
              $.ajax({
                url: 'delPesanan.php',
                method: 'POST',
                data: {id:id,idMeja:idMeja,idMenu:idMenu,user:user},
                success:function(data){
                    //$("#allPesanan").html(data);
                    //$('#allPesanan').load("allPesanan.php");
                    $('#daftarMenus').load("daftarMenus.php");
                }
              });
              $.ajax({
                url: 'allPesanan.php',
                method: 'POST',
                data: {idMeja:idMeja},
                success:function(data){
                    $("#allPesanan").html(data);
                    //$('#allPesanan').load("allPesanan.php");
                }
              });
          });
        </script>
        <?php 
        $total += $dataMenu['harga'];
        } ?>
        <td align="right" style="color: red;">
            Total
        </td>
        <td align="right" style="color: red;">
            Rp.<?php echo number_format($total, 0,",",".") ?>,-
        </td>
    </tbody>
</table>