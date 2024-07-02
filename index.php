<?php
    // include 'cek.php';
    include 'onek.php';
    require_once 'nav.php';
?>
            
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <center> <h1 class="page-header">SPK Penentuan Bantuan Rumah Tidak Layak Huni Kota Semarang Menggunakan Metode MABAC</h1> </center>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <center> Admin </center>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="alert alert-info">
                                        <center> Selamat datang, <?=$_SESSION['username']?>. Ini adalah aplikasi pengambilan metode keputusan penentuan bantuan rumah tidak layak huni Kota Semarang dengan metode MABAC (Multi Attributive Border Approximation Area Comparation). <a href="alternatif.php" class="alert-link">masukkan Data Alternatif</a> </center>
                                    </div>
                                </div>
                                <!-- .panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>                        <!-- /.col-lg-12 -->
                        <div class="col-lg-12">
                        <center><img class="img-fluid" src="css/disper.jpg" width="100%"><br></center>
                        </div>
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