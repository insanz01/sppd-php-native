<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Harga</a></li>
          <li class="breadcrumb-item active">Tambah Eceran</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="">Nama Komoditi</label>
              <input type="text" class="form-control" placeholder="misal: telur">
            </div>
            <div class="form-group">
              <label for="">Satuan</label>
              <select name="satuan" id="satuan" class="form-control">
                <option value="Kg">Kg</option>
                <option value="Butir">Butir</option>
                <option value="Pcs">Pcs</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Harga</label>
              <input type="number" min="0" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Tanggal</label>
              <input type="date" class="form-control" value="<?= date('Y-m-d', time()) ?>" readonly>
            </div>
            <div class="form-group">
              <button class="btn btn-success btn-block">Simpan Data Komoditas</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>