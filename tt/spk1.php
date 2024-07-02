<?php
    include 'onek.php';
    require_once 'nav.php';
?>
            
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">HASIL SPK</h1>
                        </div>
                        <div class="col-lg-12">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Kain</th>
                                        <th>Nama Kain</th>
                                        <th>Nilai Harga</th>
                                        <th>Nilai Kenyamanan</th>
                                        <th>Nilai warna</th>
                                        <th>Nilai Ketersediaan</th>
                                        <th>Nilai Ketahanan</th>
                                        <th>Nilai Bobot Evaluasi</th> 
                                        <th>Peringkat</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $n = 1 ;

                                    $sqljumlah ="SELECT SUM(bobot) FROM kriteria";
                                    $queryjumlah= mysqli_query($dbcon,$sqljumlah);
                                    $jumlah0=mysqli_fetch_array($queryjumlah);
                                    $jumlah = $jumlah0[0];
                                    
                                    // bobot
                                    $sqlkriteria ="SELECT bobot FROM kriteria";
                                    $querykriteria = mysqli_query($dbcon, $sqlkriteria);
                                    $bobot=[];
                                    while ($bariskriteria= mysqli_fetch_array($querykriteria)) {
                                        $bobot[]=$bariskriteria['bobot'];
                                    }
                                    // var_dump($bobot);die();
                                    //end bobot
                                    
                                    //nilai 
                                    $sqlnilai = "SELECT * FROM penilaian";
                                    $querynilai = mysqli_query($dbcon,$sqlnilai);

                                    

                                    while ($barisnilai=mysqli_fetch_array($querynilai)) {  
                                        //nama
                                        $kode_kain= $barisnilai['kode_kain'];
                                        $sqlnama = "SELECT nama_kain FROM kain WHERE kode_kain = $kode_kain";
                                        $nama_kain = mysqli_fetch_array(mysqli_query($dbcon,$sqlnama));
                                        //nilai
                                        $nilaiH = $barisnilai['nh']*($bobot[1]/$jumlah);
                                        $nilaiK = $barisnilai['nk']*($bobot[1]/$jumlah);
                                        $nilaiW = $barisnilai['nw']*($bobot[1]/$jumlah);
                                        $nilaiS = $barisnilai['ns']*($bobot[1]/$jumlah);
                                        $nilaiDT = $barisnilai['ndt']*($bobot[1]/$jumlah);
                                        $nilaievaluasi = $nilaiH + $nilaiK +$nilaiW +$nilaiS +$nilaiDT;

                                        ?>
                                        <tr>
                                        <td><?=$n?></td>
                                        <td><?=$barisnilai['kode_kain']?></td>
                                        <td><?=$namakain['nama_kain'] ?></td>
                                        <td class="text-right"><?=$barisnilai['nh']?></td>
                                        <td class="text-right"><?=$barisnilai['nk']?></td>
                                        <td class="text-right"><?=$barisnilai['nw']?></td>
                                        <td class="text-right"><?=$barisnilai['ns']?></td>
                                        <td class="text-right"><?=$barisnilai['ndt']?></td>
                                        <td class="text-right"><?= round($nilaievaluasi,3)?></td>
                                        <td><?= $jurusan?></td>
                                        </tr>
                                    <?php    
                                    $n++;
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