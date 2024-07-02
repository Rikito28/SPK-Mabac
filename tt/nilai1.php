<?php
    include 'onek.php';
    require_once 'nav.php';
?>
            
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Nilai Kain</h1>
                            <a class="btn btn-primary" href="kriteria.php">Tentukan kriteria dahulu</a><br><br>
                        </div>

                        <div class="col-lg-8">
                            <form role="form" method="POST" action="">
                                <div class="form-group">
                                    <input required type="text" name="kodekain" class="form-control" placeholder="KODE KAIN">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="harga" class="form-control" placeholder="NILAI HARGA">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="kenyamanan" class="form-control" placeholder="NILAI KENYAMANAN">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="warna" class="form-control" placeholder="NILAI WARNA">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="stock" class="form-control" placeholder="NILAI STOCK">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="ketahanan" class="form-control" placeholder="NILAI KETAHANAN">
                                </div>  
                                <div class="form-group">
                                    <input type="submit" name="submit" class=" btn btn-success form-control" value="submit" placeholder="submit">
                                </div>
                            </form>

                            <?php
                                if (isset($_POST['submit'])) {
                                    $kain    = $_POST['kode_kain'];
                                    $harga= $_POST['harga'];
                                    $kenyamanan= $_POST['kenyamanan'];
                                    $warna = $_POST['warna'];
                                    $stock = $_POST['stock'];
                                    $ketahanan = $_POST['ketahanan'];
                                    // var_dump($nama_kain,$kode_kain);
                                    // die;
                                    $sqlceknilai = "SELECT * FROM penilaian WHERE kode_kain=$kain";
                                    $sqlcek  = "SELECT * FROM kain WHERE kode_kain=$kain ";
                                    $cekquery= mysqli_query($dbcon,$sqlcek);
                                    
                                    if (mysqli_num_rows($cekquery) < 1) {
                                        echo "<script>alert('data kain tidak ditemukan')</script>";
                                    }else{
                                        if (mysqli_num_rows(mysqli_query($dbcon,$sqlceknilai)) < 1 ) {
                                             $sql = "INSERT INTO penilaian (kode_kain,nh,nk,nw,ns,ndt)VALUES ('$kode_kain','$harga','$kenyamanan','$warna','$stock','$ketahanan')";
                                            $query = mysqli_query($dbcon,$sql);
                                            if ($query) {
                                                echo "<script>alert('berhasil memasukkan data penilaian')</script>";
                                            }else{
                                                echo "<script>alert('Gagal Memasukkan data')</script>";
                                            }
                                        }else{
                                                echo "<script>alert('Duplikasi Data dengan NIM tersebut')</script>";

                                        }
                                    }                                        
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
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Kain</th>
                                                    <th>Nama Kain</th>
                                                    <th>Harga</th>
                                                    <th>Kenyamanan</th>
                                                    <th>Warna</th>
                                                    <th>Stock</th>
                                                    <th>Ketahanan</th>
                                            </thead>
                                            <tbody>
                                                <!-- mengeluarkan data siswa dari database -->
                                                <?php
                                                   $sql ="SELECT * FROM penilaian";
                                                   $query = mysqli_query($dbcon, $sql);
                                                   $n = 1 ;



                                                   while ($kode_kain=mysqli_fetch_array($query)) {
                                                        $kode_kain = $kode_kain['kode_kain'];
                                                        $sqlnama_kain = "SELECT nama_kain FROM kain WHERE kode_kain = $kode_kain";
                                                        $namakain = mysqli_fetch_array(mysqli_query($dbcon,$sqlnama_kain));
                                                        
                                                ?>
                                                        <tr>
                                                            <td><?=$n?></td>
                                                            <td><?=$kain['kode_kain']?></td>
                                                            <td><?=$kain['nama_kain']?></td>
                                                            <td class="text-right"><?=$kain['nh']?></td>
                                                            <td class="text-right"><?=$penilaian['nk']?></td>
                                                            <td class="text-right"><?=$penilaian['nw']?></td>
                                                            <td class="text-right"><?=$penilaian['ns']?></td>
                                                            <td class="text-right"><?=$penilaian['ndt']?></td>
                                                            <td><a class="btn btn-danger" href="aksi/hapusna.php?name=<?=$penilaian['id_penilaian'];?>">hapus</a></td>
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