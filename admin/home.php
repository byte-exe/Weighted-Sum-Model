<?php require_once('data.php'); ?>
<!-- Small boxes (Stat box) -->
      <div class="row">
     
        <div class="col-lg-6 col-md-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $row_rs_kriteria['jumlahKriteria']; ?> KRITERIA</h3>

              <p>KRITERIA</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="?page=kriteria/view" class="small-box-footer">
              Detail <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-md-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $row_rs_alternatif['jumlahAlternatif']; ?> ALTERNATIF</h3>

              <p>ALTERNATIF</p>
            </div>
            <div class="icon">
              <i class="fa fa-folder-o"></i>
            </div>
            <a href="?page=alternatif/view" class="small-box-footer">
               Detail <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-md-6">
         <a href="?page=empty&reset=1" class="btn btn-info btn-block">RESET ULANG SEMUA</a>
        </div>
        <div class="col-md-6">
         <a href="?page=empty&kosongkan=1" class="btn btn-block bg-yellow">KOSONGKAN NILAI TIAP ALTERNATIF</a>
        </div>
      </div>
      <!-- /.row -->
      <p></p>
            <p></p>
<?php require_once('proses/result.php'); ?>      