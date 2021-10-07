<?php @session_start();
  $nama=$_SESSION['nama'];
  $role=$_SESSION['role'];
  if(empty($nama)){ ?>
    <script type="text/javascript">
      alert('Session expired, anda harus login ulang !');
      document.location="../index";
    </script>
  <?php }
?>
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index">
       <img src="" class="logo-icon">
       <h5 class="logo-text" style="font-size: 15px;font-weight: bold;"> RM Primaya</h5>
     </a>
	 </div>
	 <ul class="sidebar-menu do-nicescrol">
      <!--<a class="sidebar-header">PILIHAN MENU</a>-->
      <li>
        <a href="index" class="waves-effect">
          <i class="icon-chart"></i> <span>Dashboard</span></i>
        </a>
      </li>
      <li>
        <a href="masterMenu" class="waves-effect">
          <i class="icon-screen-desktop"></i> <span>Master Menu</span></i>
        </a>
      </li>
      <li>
        <a href="pesanan" class="waves-effect">
          <i class="icon-screen-desktop"></i> <span>Pemesanan Menu</span></i>
        </a>
      </li>
      <?php if($role==1){ ///////////////////// 1: Pelayan ?>
        <li>
        <a href="aktifitas" class="waves-effect">
          <i class="icon-layers"></i> <span>Aktifitas Pesanan</span></i>
        </a>
      </li>
      <?php }elseif($role==2){ //////////////// 2: Kasir ?>
        <li>
        <a href="pembayaran" class="waves-effect">
          <i class="icon-layers"></i> <span>Pembayaran</span></i>
        </a>
      </li>
      <?php } ?>
    </ul>
	 
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top bg-danger">
  <ul class="navbar-nav mr-auto align-items-center">
    <a class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </a>
    <a class="nav-item">
      <marquee style="color:#ffff;">Selamat datang di RM Primaya</marquee>
    </a>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    
    <a class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <font size="3"><?php echo $nama ?></font>
        <span class="user-profile"><img src="../assets/images/avatars/user.png" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right animated fadeIn">
        <a class="dropdown-divider"></a>
        <a class="dropdown-item" href="logout"><i class="icon-power mr-2" style="color: red;font-weight: bold;"></i> Logout</a>
      </ul>
    </a>
  </ul>
</nav>
</header>
<!--End topbar header-->