<?php include'header.php'; ?>
 <div id="wrapper">
<?php include'headerSub.php';
include'../config.php';
$query_menu = mysql_query("SELECT id,status FROM daftarmenu WHERE STATUS = 0");
$query_pesanan = mysql_query("SELECT noTransaksi, lunas FROM datapesanan WHERE lunas=0 GROUP BY noTransaksi");
$query_lunas = mysql_query("SELECT noTransaksi, lunas FROM datapesanan WHERE lunas=1 GROUP BY noTransaksi");
$query_user = mysql_query("SELECT id, status FROM datausers WHERE status=0");

$jmlmenu = mysql_num_rows($query_menu);
$jmlpesanan = mysql_num_rows($query_pesanan);
$jmllunas = mysql_num_rows($query_lunas);
$jmluser = mysql_num_rows($query_user);
session_start();
if($_GET['x']=='x'){ ?>
<script type="text/javascript">
  $(document).ready(function(){
    swal({
    icon: 'success',
    title: 'Yeay, Welcome',
    text: "<?php echo $_SESSION['nama']?>",
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
	
      <!--Start Dashboard Content-->
      <div><h3 style="color: #008cff;">Dashboard</h3></div>
       <div class="row mt-4">
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
          <div class="card bg-primary shadow-primary">
            <div class="card-body p-4">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white"><?php echo $jmllunas ?></h4>
                <span class="text-white">Total Transaksi Lunas</span>
              </div>
              <div class="align-self-center w-icon"><i class="icon-basket-loaded text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
          <div class="card bg-danger shadow-danger">
            <div class="card-body p-4">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white"><?php echo $jmlmenu ?></h4>
                <span class="text-white">Total Menu Aktif</span>
              </div>
              <div class="align-self-center w-icon"><i class="icon-wallet text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
          <div class="card bg-success shadow-success">
            <div class="card-body p-4">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white"><?php echo $jmlpesanan ?></h4>
                <span class="text-white">Total Pemesanan</span>
              </div>
              <div class="align-self-center w-icon"><i class="icon-pie-chart text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
          <div class="card bg-warning shadow-warning">
            <div class="card-body p-4">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white"><?php echo $jmluser ?></h4>
                <span class="text-white">Total User</span>
              </div>
              <div class="align-self-center w-icon"><i class="icon-user text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
      </div><!--End Row-->
	  	  
	  <div class="row">
      <div class="col-lg-6">
        <h4 style="color: #008cff;">API Login</h4>
        <div class="card" style="min-height: 550px;">
           <div class="card-body">
             <pre><?php include'viewAPILogin.php'; ?></pre>
           </div>
        </div>
      </div>
      <div class="col-lg-6">
        <h4 style="color: #008cff;">API Akses Menu Makanan</h4>
        <div class="card" style="min-height: 550px;">
          <div class="card-body">
            <pre><?php include'viewAPIMenu.php'; ?></pre>
           </div>
        </div>
      </div>
    </div><!--End Row-->
	  
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