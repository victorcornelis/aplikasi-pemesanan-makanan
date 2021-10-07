<?php include'header.php'; ?>
 <div id="wrapper">
<?php include'headerSub.php';
include'../config.php';
$QnoMeja = mysql_query("SELECT * FROM nomeja WHERE block = 0");
@session_start();
$nama=$_SESSION['nama'];
if($_GET['x']=='x'){ ?>
<script type="text/javascript">
  $(document).ready(function(){
    swal({
    icon: 'success',
    title: 'Yeay, Welcome',
    text: "<?php echo $_SESSION['namaLengkap']?>",
    type: 'success',
    timer: 1500,
    button: false,
  });
});
</script>
<?php }else{}?>
<div class="clearfix"></div>
  
  <div class="content-wrapper">
    <div class="container-fluid">
    <input type="hidden" id="user" value="<?php echo $nama ?>">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">

              <h4 class="form-header text-uppercase">
                <i class="fa fa-money"></i>
                  Master Menu
                </h4>
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header"><i class="fa fa-table"></i> Master Menu 
                      <button style="float: right;" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambahMenu">Tambah Menu</button>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive" id="allMenus">
                      
                      </div>
                      <script type="text/javascript">
                        $(document).ready(function(){
                          $('#allMenus').load("allMenus.php");
                        });
                      </script>
                    </div>
                  </div>
                </div>
              </div><!-- End Row-->

          </div>
        </div>
      </div>
    
    </div>
    <!-- End container-fluid-->
 
    <!--/////////////////////////////////// MODAL TAMBAH MENU //////////////////////////////////////////-->
    <div id="tambahMenu" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Menu</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body col-sm-12">
            <form method="post" action="addMenu" enctype="multipart/form-data">
              <input type="hidden" name="user" value="<?php echo $nama ?>">
              <div class="form-group col-sm-12">
                <label>Upload Gambar</label>
                <input type="file" class="form-control" name="gambar">
              </div>
              <div class="form-group col-sm-8">
                <label>Tipe</label>
                <select class="form-control" name="tipe">
                  <option selected="selected" disabled="disabled" value="">- Pilihan -</option>
                  <option value="1">Makanan</option>
                  <option value="2">Minuman</option>
                </select>
              </div>
              <div class="form-group col-sm-8">
                <label>Nama Menu</label>
                <input type="text" class="form-control" name="namaMenu" placeholder="Nama Menu">
              </div>
              <div class="form-group col-sm-7">
                <label>Harga</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="font-size: 12px;">Rp.</span>
                  </div>
                  <input type="text" name="harga" id="harga" class="form-control" required>
                  </div>
              </div>
              <div class="form-group col-sm-4">
                <label>Stock</label>
                <input type="number" name="stock" class="form-control" placeholder="Stock Menu">
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-info">Submit</button>
            </form>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--///////////////////////////////////////////////////////////////////////////////////////-->

    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
   <!--Start footer-->
   <script type="text/javascript">
      var harga = document.getElementById('harga');
      harga.addEventListener('keyup', function(e){
        harga.value = formatRupiah(this.value, '');
      });

      function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split       = number_string.split(','),
        sisa        = split[0].length % 3,
        harga        = split[0].substr(0, sisa),
        ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
        if(ribuan){
          separator = sisa ? '.' : '';
          harga += separator + ribuan.join('.');
        }
        harga = split[1] != undefined ? harga + ',' + split[1] : harga;
        return prefix == undefined ? harga : (harga ? '' + harga : '');
      }
    </script>
    <footer class="footer">
        <div class="container">
          <div class="text-center">
            Victor Cornelis
          </div>
        </div>
      </footer>
    <!--End footer-->
  <?php include'footer.php';?>