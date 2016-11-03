<?php $this->load->view('header');?>
<?php
  foreach($qbarang as $rowdata){
    $id=$rowdata->kode_brg;
    $kode=$rowdata->barcode;
    $nama=$rowdata->nama_brg;
    $jenis=$rowdata->jenis;
    $harga=$rowdata->harga_brg;
    $keterangan=$rowdata->keterangan;
    $satuan=$rowdata->satuan;
    $stok=$rowdata->stok_brg;
  }
?>
    <div class="container">
 
      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b>Detail Barang</b></div>
  <div class="panel-body">
 
     <p> <a href="<?=base_url()?>barang" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i> Kembali</a>
     </p>
 
       <table class="table table-striped">
         <tr>
          <td>Barcode</td>
          <td><?=$kode?></td>
         </tr>
         <tr>
          <td>Nama Barang</td>
          <td><?=$nama?></td>
          </tr>
         <tr>
          <td>Harga Barang</td>
          <td><?=$harga?></td>
          </tr>
         <tr>
          <td>Jenis</td>
          <td><?=$jenis?></td>
          </tr>
         <tr>
          <td>Satuan</td>
          <td><?=$satuan?></td>
          </tr>
         <tr>
          <td>Stok</td>
          <td><?=$stok?></td>
           </tr>
         <tr>
          <td>Keterangan</td>
          <td>
           <?=$keterangan?>
          </td>
         </tr>
 
       </table>
        </div>
    </div>    <!-- /panel -->
 
    </div> <!-- /container -->
<?php $this->load->view('footer');?>