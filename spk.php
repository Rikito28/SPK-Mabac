<?php
include 'onek.php';
require_once 'nav.php';
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">HASIL SPK METODE MABAC</h1>
            </div>
            <div class="col-lg-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><center>No</center></th>
                            <th><center>Kode Alternatif</center></th>
                            <th><center>Nama Penerima</center></th>
                            <th><center>Nilai Penghasilan</center></th>
                            <th><center>Nilai Kepemilikan</center></th>
                            <th><center>Nilai Dinding</center></th>
                            <th><center>Nilai Atap</center></th>
                            <th><center>Nilai Jumlah Tanggungan</center></th>
                            <th><center>Nilai Bobot Evaluasi</center></th>
                            <th><center>Peringkat</center></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            // bobot dan kriteria
                            $bobot = [];
                            $sqlkriteria = "SELECT bobot FROM kriteria";
                            $querykriteria = mysqli_query($dbcon, $sqlkriteria);
                            while ($datakriteria = mysqli_fetch_array($querykriteria)) {
                            array_push($bobot, $datakriteria['bobot']);
                            }

                            //nilai
                            $sqlnilai = "SELECT * FROM penilaian";
                            $querynilai = mysqli_query($dbcon, $sqlnilai);

                            //MENJUMLAH DARI SETIAP KRITERIA
                            $sqlpenghasilan = "SELECT SUM(np) FROM penilaian";
                            $sqlkepemilikan = "SELECT SUM(nk) FROM penilaian";
                            $sqldinding = "SELECT SUM(nd) FROM penilaian";
                            $sqlatap = "SELECT SUM(na) FROM penilaian";
                            $sqljumlah_tanggungan = "SELECT SUM(njt) FROM penilaian";

                            //MENCARI NILAI MAKSIMAL TIAP KRITERIA
                            $sqlmaxpenghasilan = "SELECT MAX(np) FROM penilaian";
                            $sqlmaxkepemilikan = "SELECT MAX(nk) FROM penilaian";
                            $sqlmaxdinding = "SELECT MAX(nd) FROM penilaian";
                            $sqlmaxatap = "SELECT MAX(na) FROM penilaian";
                            $sqlmaxjumlah_tanggungan = "SELECT MAX(njt) FROM penilaian";

                            //MENCARI NILAI MINIMAL DARI SETIAP KRITERIA
                            $sqlminpenghasilan = "SELECT MIN(np) FROM penilaian";
                            $sqlminkepemilikan = "SELECT MIN(nk) FROM penilaian";
                            $sqlmindinding = "SELECT MIN(nd) FROM penilaian";
                            $sqlminatap = "SELECT MIN(na) FROM penilaian";
                            $sqlminjumlah_tanggungan = "SELECT MIN(njt) FROM penilaian";

                            //penangkapan data 
                            $jumlahpenghasilan = mysqli_fetch_array(mysqli_query($dbcon, $sqlpenghasilan));
                            $jumlahkepemilikan = mysqli_fetch_array(mysqli_query($dbcon, $sqlkepemilikan));
                            $jumlahdinding = mysqli_fetch_array(mysqli_query($dbcon, $sqldinding));
                            $jumlahatap = mysqli_fetch_array(mysqli_query($dbcon, $sqlatap));
                            $jumlahjumlah_tanggungan = mysqli_fetch_array(mysqli_query($dbcon, $sqljumlah_tanggungan));

                            $maxpenghasilan = mysqli_fetch_array(mysqli_query($dbcon, $sqlmaxpenghasilan));
                            $maxkepemilikan = mysqli_fetch_array(mysqli_query($dbcon, $sqlmaxkepemilikan));
                            $maxdinding = mysqli_fetch_array(mysqli_query($dbcon, $sqlmaxdinding));
                            $maxatap = mysqli_fetch_array(mysqli_query($dbcon, $sqlmaxatap));
                            $maxjumlah_tanggungan = mysqli_fetch_array(mysqli_query($dbcon, $sqlmaxjumlah_tanggungan));

                            $minpenghasilan = mysqli_fetch_array(mysqli_query($dbcon, $sqlminpenghasilan));
                            $minkepemilikan = mysqli_fetch_array(mysqli_query($dbcon, $sqlminkepemilikan));
                            $mindinding = mysqli_fetch_array(mysqli_query($dbcon, $sqlmindinding));
                            $minatap = mysqli_fetch_array(mysqli_query($dbcon, $sqlminatap));
                            $minjumlah_tanggungan = mysqli_fetch_array(mysqli_query($dbcon, $sqlminjumlah_tanggungan));

                            $n = 0;
                            while ($barisnilai = mysqli_fetch_array($querynilai)) {
                            $kode_penghuni = $barisnilai['kode_penghuni'];

                            //menghitung normalisasi elemen matriks awal
                                    //BENEFIT
                            try {
                                $uP = (($barisnilai['np'] - $minpenghasilan[0]) / ($maxpenghasilan[0] - $minpenghasilan[0]));
                            } catch (DivisionByZeroError $e) {
                                $uP = 0;
                            }

                            try {
                                $uK = (($barisnilai['nk'] - $minkepemilikan[0]) / ($maxkepemilikan[0] - $minkepemilikan[0]));
                            } catch (DivisionByZeroError $e) {
                                $uK = 0;
                            }
                                //COST
                            try {
                                $uD= (($maxdinding[0] - $barisnilai['nd']) / ($maxdinding[0] - $mindinding[0]));
                            } catch (DivisionByZeroError $e) {
                                $uD = 0;
                            }

                            try {
                                $uA= (($maxatap[0] - $barisnilai['na']) / ($maxatap[0] - $minatap[0]));
                            } catch (DivisionByZeroError $e) {
                                $uA = 0;
                            }
                                    //BENEFIT
                            try {
                                $uJT = (($barisnilai['njt'] - $minjumlah_tanggungan[0]) / ($maxjumlah_tanggungan[0] - $minjumlah_tanggungan[0]));
                            } catch (DivisionByZeroError $e) {
                                $uJT = 0;
                            }

                            // Update data pada database
                            $sql10 = "UPDATE penilaian SET uJT = '$uJT', uP = '$uP', uK = '$uK', uA = '$uA', uD = '$uD' where kode_penghuni = '$kode_penghuni'";
                            $sql1 = mysqli_query($dbcon, $sql10);

                            //melakukan perhitungan elemen matriks tertimbang
               
                            $bobotfix1 = $bobot[0] /  100;
                            $bobotfix2 = $bobot[1] /  100;
                            $bobotfix3 = $bobot[2] /  100;
                            $bobotfix4 = $bobot[3] /  100;
                            $bobotfix5 = $bobot[4] /  100;

                            $nilaiP = ($bobotfix2 * $uP) + $bobotfix2;
                            $nilaiK = ($bobotfix3 * $uK) + $bobotfix3;
                            $nilaiD = ($bobotfix5 * $uD) + $bobotfix5;
                            $nilaiA = ($bobotfix4 * $uA) + $bobotfix4;
                            $nilaiJT = ($bobotfix1 * $uJT) + $bobotfix1;

                            // Update Nilai pada Database
                            $sql11 = "UPDATE penilaian SET nilaiJT = '$nilaiJT', nilaiP = '$nilaiP', nilaiK = '$nilaiK', nilaiA = '$nilaiA', nilaiD = '$nilaiD' where kode_penghuni = '$kode_penghuni'";
                            $sql1 = mysqli_query($dbcon, $sql11);

                            
                            //melakukan perhitungan normalisasi terbobot
                            // $nilaiPfix = sum($nilaiP[]);
                            // var_dump($nilaiPfix);
                            // $nilaiK = $uK * ($bobot[1]  /100);
                            // $nilaiD = $uD * ($bobot[2]  /100);
                            // $nilaiA = $uA * ($bobot[3] / 100);
                            // $nilaiJT = $uJT * ($bobot[4] /100);
                            
                            // Matriks area perbatasan G
                            $cekJT = mysqli_fetch_array(mysqli_query($dbcon, "SELECT EXP(SUM(LOG(nilaiJT))) AS hasil_JT FROM penilaian"));
                            $nilaiJTDB = $cekJT['hasil_JT'];
                            $cekP = mysqli_fetch_array(mysqli_query($dbcon, "SELECT EXP(SUM(LOG(nilaiP))) AS hasil_P FROM penilaian"));
                            $nilaiPDB = $cekP['hasil_P'];
                            $cekK = mysqli_fetch_array(mysqli_query($dbcon, "SELECT EXP(SUM(LOG(nilaiK))) AS hasil_K FROM penilaian"));
                            $nilaiKDB = $cekK['hasil_K'];
                            $cekA = mysqli_fetch_array(mysqli_query($dbcon, "SELECT EXP(SUM(LOG(nilaiA))) AS hasil_A FROM penilaian"));
                            $nilaiADB = $cekA['hasil_A'];
                            $cekD = mysqli_fetch_array(mysqli_query($dbcon, "SELECT EXP(SUM(LOG(nilaiD))) AS hasil_D FROM penilaian"));
                            $nilaiDDB = $cekD['hasil_D'];

                            $peng = pow($nilaiPDB, 0.2);
                            $pengsel = number_format($peng, 2);

                            $kem = pow($nilaiKDB, 0.2);
                            $kemsel = number_format($kem, 2);

                            $din = pow($nilaiDDB, 0.2);
                            $dinsel = number_format($din, 2);

                            $at = pow($nilaiADB, 0.2);
                            $atsel = number_format($at, 2);

                            $jum = pow($nilaiJTDB, 0.2);
                            $jumsel = number_format($jum, 2);

                            // $sql10 = "UPDATE ranking SET nilaiP = '$nilaiP1', nilaiJT = '$jum'";
                            // $sql1 = mysqli_query($dbcon, $sql10);


                            $gP = $nilaiP - $pengsel;
                            $gK = $nilaiK - $kemsel;
                            $gD = $nilaiD - $dinsel;
                            $gA = $nilaiA - $atsel;
                            $gJT = $nilaiJT - $jumsel;

                            //NILAI AKHIR
                            $nilaievaluasi = $gP + $gK + $gD + $gA + $gJT;

                            $sql = "UPDATE `penilaian` SET `hasil`='$nilaievaluasi ' WHERE `kode_penghuni` = '$kode_penghuni'";

                            mysqli_query($dbcon, $sql);

                            $n++;
                            }

                            $sqlakhir = "SELECT * FROM penilaian ORDER BY hasil DESC";
                            $queryakhir = mysqli_query($dbcon, $sqlakhir);
                            $p = 0;
                            while ($dataakhir = mysqli_fetch_array($queryakhir)) {
                            $p++;
                            $kodepenghuni = $dataakhir['kode_penghuni'];
                            $sqlnama_penghuni = "SELECT `nama_penghuni` FROM `penghuni` WHERE `kode_penghuni` ='$kodepenghuni'";
                            $namapenghuni = mysqli_fetch_array(mysqli_query($dbcon, $sqlnama_penghuni));
                            ?>
                                                    <tr>
                            <td><?=$p?></td>
                            <td><?=$dataakhir['kode_penghuni']?></td>
                            <td><?=$namapenghuni['nama_penghuni']?></td>
                            <td class="text-center"><?=$dataakhir['np']?></td>
                            <td class="text-center"><?=$dataakhir['nk']?></td>
                            <td class="text-center"><?=$dataakhir['nd']?></td>
                            <td class="text-center"><?=$dataakhir['na']?></td>
                            <td class="text-center"><?=$dataakhir['njt']?></td>
                            <td class="text-center"><?=round($dataakhir['hasil'], 3)?></td>
                            <td><?=$p?></td>

                        </tr>




                        <?php
}

?>





                    </tbody>
                </table>
            </div>
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