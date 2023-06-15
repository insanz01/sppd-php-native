<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Harga</a></li>
          <li class="breadcrumb-item active">Eceran</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container">

    <div class="row py-4">
      <div class="col-4">
        <div class="form-group">
          <label for="laporan-periode">Laporan Periode</label>
          <input type="date" class="form-control">
        </div>
      </div>
      <div class="col-4">
        <div class="form-group">
          <label for="laporan-periode">Laporan Periode</label>
          <input type="date" class="form-control">
        </div>    
      </div>
      <div class="col-4">
        <div class="form-group">
          <a href="#" class="btn btn-info float-right" role="button">
            <i class="fas fa-fw fa-print"></i>
            Cetak
          </a>
          <a href="?page=eceran&action=tambah" class="btn btn-success float-right mx-2" role="button">
            <i class="fas fa-fw fa-plus"></i>
            Tambah
          </a>
        </div>
      </div>
    </div>

    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-12 mx-auto">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Komoditi</th>
              <th>Satuan</th>
              <th>Harga</th>
              <th>Tanggal</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Beras Banjar Super</td>
              <td>Kg</td>
              <td>14000</td>
              <td>2023-03-08</td>
              <td>
                <a href="#" class="btn btn-primary" role="button">
                  <i class="fas fa-fw fa-edit"></i>
                  Ubah
                </a>
                <a href="#" class="btn btn-danger" role="button">
                  <i class="fas fa-fw fa-delete"></i>
                  Hapus
                </a>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Telur</td>
              <td>Butir</td>
              <td>1500</td>
              <td>2023-03-06</td>
              <td>
                <a href="#" class="btn btn-primary" role="button">
                  <i class="fas fa-fw fa-edit"></i>
                  Ubah
                </a>
                <a href="#" class="btn btn-danger" role="button">
                  <i class="fas fa-fw fa-delete"></i>
                  Hapus
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>