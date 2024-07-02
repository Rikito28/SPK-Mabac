<?php
    include 'onek.php';
    require_once 'nav.php';
?>
            
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Kriteria</h1>
                        </div>
                        
                        <!-- Tabel Data Kriteria-->
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data Kriteria
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th> <center> No </center> </th>
                                                    <th>Nama Kriteria</th>
                                                    <th> <center> Bobot Kriteria </center> </th>
                                                    <th> <center> Normalisasi </center> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- mengeluarkan data penghuni dari database -->
                                                <?php
                                                   
                                                   $sqljumlah ="SELECT SUM(bobot) FROM kriteria";
                                                   $queryjumlah= mysqli_query($dbcon,$sqljumlah);
                                                   $jumlah0=mysqli_fetch_array($queryjumlah);
                                                   $jumlah = $jumlah0[0];
                                                   


                                                   $sql ="SELECT * FROM kriteria";
                                                   $query = mysqli_query($dbcon, $sql);
                                                   $n = 1 ;
                                                   while ($barisbobot=mysqli_fetch_assoc($query)) {
                                                        
                                                ?>
                                                <tr>
                                                    <td><center><?=$n?></center></td>
                                                    <td><?=$barisbobot['nama_kriteria']?></td>
                                                    <td class="text-center"><?=$barisbobot['bobot']?></td>
                                                    <td class="text-center"><?=round($barisbobot['bobot']/$jumlah,3) ?></td>
                                                    
                                                </tr>
                                                <?php
                                                    $n++;
                                                    }
                                                ?>
                                                 <tr class="inverse">
                                                    <td colspan="2"> <center> Total </center> </td>
                                                    <td class="text-center"><?=$jumlah?></td>
                                                    <td class="text-center"> </td>
                                                    <td></td>
                                                </tr>
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