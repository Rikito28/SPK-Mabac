<?php
include 'onek.php';
require_once 'nav.php';
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Nilai Penerima</h1>
                <a class="btn btn-primary" href="kriteria.php">DATA KRITERIA</a><br><br>
            </div>

            <div class="col-lg-8">
                <form role="form" method="POST" action="">
                    <div class="form-group">
                        <input required type="text" name="kode_penghuni" class="form-control" placeholder="KODE ALTERNATIF">
                    </div>
                    <div class="form-group">
                        <input required type="text" name="penghasilan" class="form-control" placeholder="NILAI PENGHASILAN">
                    </div>
                    <div class="form-group">
                        <input required type="text" name="kepemilikan" class="form-control"
                            placeholder="NILAI KEPEMILIKAN">
                    </div>
                    <div class="form-group">
                        <input required type="text" name="dinding" class="form-control" placeholder="NILAI DINDING">
                    </div>
                    <div class="form-group">
                        <input required type="text" name="atap" class="form-control" placeholder="NILAI ATAP">
                    </div>
                    <div class="form-group">
                        <input required type="text" name="jumlah_tanggungan" class="form-control" placeholder="NILAI JUMLAH TANGGUNGAN">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class=" btn btn-success form-control" value="SUBMIT"
                            placeholder="submit">
                    </div>
                </form>

                <?php
                    if (isset($_POST['submit'])) {
                    $penghuni = $_POST['kode_penghuni'];
                    $penghasilan = $_POST['penghasilan'];
                    $kepemilikan = $_POST['kepemilikan'];
                    $dinding = $_POST['dinding'];
                    $atap = $_POST['atap'];
                    $jumlah_tanggungan = $_POST['jumlah_tanggungan'];
                    // var_dump($nama_penghuni,$kode_penghuni);
                    // die;
                    $sqlceknilai = "SELECT * FROM `penilaian` WHERE `kode_penghuni`='$penghuni'";
                    $sqlcek = "SELECT * FROM `penghuni` WHERE `kode_penghuni`='$penghuni'";
                    $cekquery = mysqli_query($dbcon, $sqlcek);
                    if (mysqli_num_rows($cekquery) > 0) {
                    if (mysqli_num_rows(mysqli_query($dbcon, $sqlceknilai)) < 1) {
                    $sql = "INSERT INTO penilaian (kode_penghuni,np,nk,nd,na,njt)VALUES ('$penghuni','$penghasilan','$kepemilikan','$dinding','$atap','$jumlah_tanggungan')";
                    $query = mysqli_query($dbcon, $sql);
                    if ($query) {
                        echo "<script>alert('Berhasil Memasukkan Data Penilaian')</script>";
                    } else {
                        echo "<script>alert('Gagal Memasukkan data')</script>";
                    }
                    } else {
                    echo "<script>alert('Duplikasi Data dengan NIM tersebut')</script>";

                    }
                    } else {
                    echo "<script>alert('Data Alternatif Tidak Ditemukan')</script>";

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
                                        <th>Kode Alternatif</th>
                                        <th>Nama Penerima</th>
                                        <th><center>Penghasilan</center></th>
                                        <th><center>Kepemilikan</center></th>
                                        <th><center>Dinding</center></th>
                                        <th><center>Atap</center></th>
                                        <th><center>Jumlah Tanggungan</center></th>
                                </thead>
                                <tbody>
                                    <!-- mengeluarkan data penghuni dari database -->
                                    <?php
                                        $sql = "SELECT * FROM penilaian";
                                        $query = mysqli_query($dbcon, $sql);
                                        $n = 1;

                                        while ($penilaian = mysqli_fetch_array($query)) {
                                        $kodepenghuni = $penilaian['kode_penghuni'];
                                        $sqlnama_penghuni = "SELECT `nama_penghuni` FROM `penghuni` WHERE `kode_penghuni` ='$kodepenghuni'";
                                        $namapenghuni = mysqli_fetch_array(mysqli_query($dbcon, $sqlnama_penghuni));

                                        ?>
                                    <tr>
                                        <td><center><?=$n?></center></td>
                                        <td><center><?=$penilaian['kode_penghuni']?></center></td>
                                        <td><?=$namapenghuni['nama_penghuni']?></td>
                                        <td class="text-center"><?=$penilaian['np']?></td>
                                        <td class="text-center"><?=$penilaian['nk']?></td>
                                        <td class="text-center"><?=$penilaian['nd']?></td>
                                        <td class="text-center"><?=$penilaian['na']?></td>
                                        <td class="text-center"><?=$penilaian['njt']?></td>
                                        <td><a class="btn btn-danger"
                                                href="aksi/hapusna.php?name=<?=$penilaian['id_penilaian'];?>">HAPUS</a>
                                        </td>
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