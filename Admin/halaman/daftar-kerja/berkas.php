<?php 
$judul = 'Upload Berkas Pendaftaran';
include '../../komponen/header.php';
include '../../komponen/navbar-pelamar.php';
include '../../komponen/sidebar-pelamar.php';

$id = $_SESSION['id'];
$sql = "SELECT * FROM berkas WHERE id_pengguna = $id";
$query = mysqli_query($koneksi,$sql);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Upload Berkas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Upload Berkas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
               Form Upload Berkas
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">

                  <div class="tab-pane" id="settings">
                    <form action="aksi.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <select name="nama_berkas" id="" class="form-control">
                            <option value="">Pilih Jenis Berkas</option>
                            <option value="1">CV/Resume/Portfolio</option>
                            <option value="2">Surat Lamaran Kerja</option>
                          </select>
                        </div>
                      </div>
                    
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">File (pdf,docx)</label>
                        <div class="col-sm-10">
                          <input type="file" name="berkas" class="form-control" id="inputName" >
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <input type="hidden" name="id_pengguna" value="<?= $_SESSION['id']?>">
                          <button type="submit" name="berkas" class="btn btn-primary">Upload</button>
                        </div>
                      </div>
                    </form>
                  </div>

                
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>

            <div class="card">
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; while($berkas = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?php if($berkas['nama_berkas'] == '1'){echo 'CV/RESUME/PORTFOLIO';}else{echo 'Surat Lamaran Kerja';}?></a></td>
                        <td><a href="<?= folder_upload().$berkas['berkas']?>" target="blank">Lihat File</a></td>
                        <td>
                          <a href="aksi.php?download=<?= $berkas['id']?>" class="btn btn-primary"><i class="fa fa-download"></i></a>
                          <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                    </tbody>
                </table>
                </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <?php include '../../komponen/footer.php'?>