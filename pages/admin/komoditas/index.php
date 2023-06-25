<?php
  include "config/config.php";

  $role_id = 0;
  if(isset($_SESSION["SESS_HARPAN_ROLE_ID"])) {
    $role_id = $_SESSION["SESS_HARPAN_ROLE_ID"];
  }
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Komoditas</a></li>
          <li class="breadcrumb-item active">Komoditas</li>
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
          <a href="?page=komoditas&action=tambah" class="btn btn-success float-right mx-2" role="button">
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
              <th class="text-right">Opsi</th>
            </tr>
          </thead>
          <tbody id="tabel-harga">
            <tr>
              <td>1</td>
              <td>Beras Banjar Super</td>
              <td>Kg</td>
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

<script>
  const loadData = async () => {
    return await axios.get(`<?= $base_url ?>/api/komoditas.api.php`).then(res => res.data);
  }

  const renderTable = (data) => {
    const target = document.getElementById('tabel-harga');

    let temp = ``;

    let role_id = `<?= $role_id ?>`;

    data.forEach((res, index) => {
      temp += `
              <tr>
                <td>${index + 1}</td>
                <td>${res.nama}</td>
                <td>${res.satuan}</td>
                
            `;

      if(role_id == 1) {
        temp += `
                <td>
                  <a href="#" class="btn btn-primary float-right mx-2" role="button">
                    <i class="fas fa-fw fa-book"></i>
                    Verifikasi
                  </a>
                </td>
              </tr>`;
      } else {
        temp += `
                <td>
                  <a href="#" class="btn btn-danger float-right" role="button">
                    <i class="fas fa-fw fa-trash"></i>
                    Hapus
                  </a>
                  <a href="?page=komoditas&action=edit&id=${res.id}" class="btn btn-primary float-right mx-2" role="button">
                    <i class="fas fa-fw fa-edit"></i>
                    Ubah
                  </a>
                </td>
              </tr>`;
      }
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