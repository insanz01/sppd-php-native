<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Uang Taxi Perjalanan Dinas</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Laporan</a></li>
          <li class="breadcrumb-item active">UTPD</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row pt-4">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-12">
                <a href="?page=uang-taxi&action=tambah" class="btn btn-primary float-right" role="button">
                  Tambah
                </a>
                <!-- <a href="#" class="btn btn-primary" role="button">
                  Cetak Semua
                </a> -->
              </div>
            </div>

            <table class="table custom-table">
              <thead>
                <th>#</th>
                <th>Nama Provinsi</th>
                <th>Satuan</th>
                <th>Besaran</th>
                <th>Aksi</th>
              </thead>
              <tbody id="data-tabel">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Main row -->

  </div><!-- /.container-fluid -->
</section>

<script>
  const getData = async () => {
    return await axios.get(`<?= $base_url ?>api/utpd.api.php?todo=find_all`).then(res => res.data);
  }

  const renderTable = (target, data) => {
    const tableData = document.getElementById(target);

    let temp = ``;

    data.forEach((res, index) => {
      temp += `
              <tr>
                <td>${index + 1}</td>
                <td>${res.nama_provinsi}</td>
                <td>${res.satuan}</td>
                <td>${res.besaran}</td>
                <td>

                </td>
              </tr>
      `;
    })

    tableData.innerHTML = temp;
  }

  const loadData = async () => {
    const result = await getData();

    if(result.status) {
      renderTable("data-tabel", result.data);
    }
  }

  window.addEventListener("load", async () => {
    await loadData();
  })
</script>