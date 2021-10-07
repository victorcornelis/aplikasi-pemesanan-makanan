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
                <i class="fa fa-refresh"></i>
                  Aktifitas Pemesanan
                </h4>
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header"><i class="fa fa-table"></i> Daftar Aktifitas dari user : "<?php echo $nama ?>"</div>
                    <div class="card-body">
                      <div class="table-responsive" id="daftarAktifitas">
                      
                      </div>
                      <script type="text/javascript">
                        $(document).ready(function(){
                          $('#daftarAktifitas').load("daftarAktifitas.php");
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
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	 <!--Start footer-->
    <footer class="footer">
        <div class="container">
          <div class="text-center">
            Victor Cornelis
          </div>
        </div>
      </footer>
    <!--End footer-->
	<?php include'footer.php';?>