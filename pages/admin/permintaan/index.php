<?php
  include "config/config.php";
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Data</a></li>
          <li class="breadcrumb-item active">Permintaan</li>
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
          <a href="?page=permintaan&action=tambah" class="btn btn-success float-right mx-2" role="button">
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
              <th>Jumlah Permintaan</th>
              <th>Tanggal</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody id="tabel-permintaan">

          </tbody>
        </table>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

<script>
  const loadData = async () => {
    return await axios.get(`<?= $base_url ?>/api/admin-permintaan.api.php`).then(res => res.data);
  }

  const renderTable = (data) => {
    const target = document.getElementById('tabel-permintaan');

    let temp = ``;

    data.forEach((res, index) => {
      temp += `
              <tr>
                <td>${index + 1}</td>
                <td>${res.nama}</td>
                <td>${res.satuan}</td>
                <td>${res.jumlah} ${res.satuan}</td>
                <td>${res.created_at}</td>
                <td>
                  <a href="#" class="btn btn-danger float-right" role="button">
                    <i class="fas fa-fw fa-trash"></i>
                    Hapus
                  </a>
                  <a href="#" class="btn btn-primary float-right mx-2" role="button">
                    <i class="fas fa-fw fa-edit"></i>
                    Ubah
                  </a>
                </td>
              </tr>
            `;
    });

    target.innerHTML = temp;
  }

  const showData = async () => {
    const result = await loadData();

    if(result.status) {
      renderTable(result.data);
    }
  }

  window.addEventListener("load", async () => {
    await showData();
  })

</script>