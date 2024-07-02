<?php
    include 'onek.php';
    require_once 'nav.php';
    // if (isset($_GET['id']=='hapus' && $_GET['name'])) {
    //  echo "dihapus.";
    // }
?>
            
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Alternatif</h1>
                            <a class="btn btn-primary"href="nilai.php">Masukkan Nilai Alternatif</a><br><br>
                        </div>

                        <div class="col-lg-8">
                            <form role="form" action="" method="POST">
                                <div class="form-group">
                                    <input type="text" required name="kode_penghuni" class="form-control" placeholder="KODE ALTERNATIF">
                                </div>
                                <div class="form-group">
                                    <input type="text" required name="nama_penghuni" class="form-control" placeholder="NAMA PENERIMA">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="form-control btn btn-success form-control" value="SUBMIT" placeholder="submit">
                                </div>
                            </form>
                            <?php
                                if (isset($_POST['submit'])) {
                                    $kode_penghuni   = $_POST['kode_penghuni'];
                                    $nama_penghuni   = $_POST['nama_penghuni'];
                                    // var_dump($nama_penghuni,$kode_penghuni);
                                    // die;

                                    //sql insert to penghuni
                                    $sql = "INSERT INTO penghuni (kode_penghuni,nama_penghuni)VALUES ('$kode_penghuni','$nama_penghuni')";
                                    $query = mysqli_query($dbcon,$sql);
                                    if ($query) {
                                        echo "<script>alert('Berhasil Memasukkan Data Alternatif')</script>";
                                    }else{
                                        echo "<script>alert('Gagal Memasukkan data')</script>";

                                    }
                                    
                                }else{
                                   
                                }
                            ?>
                        </div>


                        <!-- Menampilkan Tabel Data -->
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data Alternatif
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Alternatif</th>
                                                    <th>Nama Penerima</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- mengeluarkan data alternatif dari database -->
                                                <?php
                                                   $sql ="SELECT * FROM penghuni";
                                                   $query = mysqli_query($dbcon, $sql);
                                                   $n = 1 ;
                                                   while ($penghuni=mysqli_fetch_array($query)) {
                                                        
                                                ?>
                                                <tr>
                                                    <td><?=$n?></td>
                                                    <td><?=$penghuni['kode_penghuni']?></td>
                                                    <td><?=$penghuni['nama_penghuni']?></td>
                                                    <td><a class="btn btn-danger" onclick="return confirm('Apakah tetap ingin menghapus ?')" href='aksi/hapusa.php?name=<?=$penghuni['kode_penghuni'];?>'>HAPUS</a></td>
                                                </tr>
                                                <?php
                                                    $n++;
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end Tabel Data -->



                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

<?php 
    require_once 'foot.php';
 ?>