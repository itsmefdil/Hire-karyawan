<?php 

if (($_SESSION['role']) == '1') {
   
} elseif(($_SESSION['role']) == '0') {
  echo "<script>alert" ;
  echo "('Anda Tidak Memiliki Akses, Silahkan Login');" ;
  echo "window.location.href='../../../Auth/login.php';" ;
  echo "</script>" ;
} else {
    echo "<script>alert" ;
    echo "('Anda Tidak Memiliki Akses, Silahkan Login');" ;
    echo "window.location.href='../../../Auth/login.php';" ;
    echo "</script>" ;
}
  
$sql = "SELECT * FROM tentang" ;
$query = mysqli_query($koneksi,$sql) ;
$row = mysqli_fetch_array($query) ;

$id = $_SESSION['id'];
$sql2 = "SELECT * FROM pengguna WHERE id ='$id' ";
$query2 = mysqli_query($koneksi,$sql2);
$row2 = mysqli_fetch_array($query2);

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= home()?>" class="brand-link">
      <img src="<?= folder_upload()?><?= $row['logo']?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= folder_upload() ?><?php if($row2['foto'] == null){echo 'profile.png';}else{echo $row2['foto'];}?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $_SESSION['nama']?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
         


          <!-- halaman data kontak  -->
          <li class="nav-item">
            <a href="<?= admin()?>halaman/daftar-kerja" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Daftar Kerja 
              </p>
            </a>
          </li>

          <!-- halaman tentang aplikasi  -->
          <li class="nav-item">
            <a href="<?= admin()?>halaman/daftar-kerja/berkas.php" class="nav-link">
              <i class="nav-icon fas fa-folder-plus"></i>
              <p>
                Berkas Pendaftaran
              </p>
            </a>
          </li>

          <!-- halaman profile -->
          <li class="nav-item">
            <a href="<?= admin()?>halaman/profile/pelamar.php" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Profile 
              </p>
            </a>
          </li>
          

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>