<?php
  include("../config/koneksi.php");  
  ?>
  <?php
$id_jenis_layanan = $_GET['id_jenis_layanan']; //get the no which will updated

$queryy = mysql_query("SELECT * FROM jenis_layanan WHERE id_jenis_layanan = '$id_jenis_layanan'"); //get the data that will be updated
$dt=mysql_fetch_array($queryy);

?>
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Jenis Layanan</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Jenis Layanan</a></li>
                                    <li class="active"><a href="#">Edit Data Jenis Layanan</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Edit Data Jenis Layanan</strong>
                            </div>
                            <div class="card-body">
         
<form action="index.php?p=proses_edit_jenis_layanan" method="post" enctype="multipart/form-data" class="form-horizontal">
     <input type="hidden" id="text-input" name="id_jenis_layanan" value="<?=$dt['id_jenis_layanan'];?>" class="form-control" required="">

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jenis Layanan</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="jenis_layanan" class="form-control" value="<?=$dt['jenis_layanan'];?>" required="">
                                        </div>
                                    </div>
<!-- 
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jenis Layanan</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="jenis_l" class="form-control" value="<?=$dt['biaya'];?>" required="">
                                        </div>
                                    </div>
                                 -->
                                    
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </form>


                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->