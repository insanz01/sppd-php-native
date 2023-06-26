<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Uang Harian Perjalanan Dinas (DKI)</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Laporan</a></li>
          <li class="breadcrumb-item active">UHPD (DKI)</li>
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
                <a href="?page=uang-harian-dki&action=tambah" class="btn btn-primary float-right" role="button">
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
                <th>URAIAN</th>
                <th>WALIKOTA/ WAKIL WALIKOTA/ PIMPINAN DPRD</th>
                <th>ANGGOTA DPRD</th>
                <th>SEKDA</th>
                <th>ASISTEN SEKDA/ JABATAN PIMPINAN TINGGI</th>
                <th>ADMINISTRATOR/ GOL IV</th>
                <th>PENGAWAS/ GOL III</th>
                <th>PELAKSANA GOL II/ I/ NON PNS</th>
                <th>KET.</th>
                <th>AKSI</th>
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
    return await axios.get(`<?= $base_url ?>api/uhpd.api.php?todo=find_all_dki`).then(res => res.data);
  }

  const renderTable = (target, data) => {
    const tableData = document.getElementById(target);

    let temp = ``;

    data.forEach((res, index) => {
      temp += `
              <tr>
                <td>${index + 1}</td>
                <td>${res.uraian}</td>
                <td>${res.walikota}</td>
                <td>${res.dprd}</td>
                <td>${res.sekda}</td>
                <td>${res.asisten_sekda}</td>
                <td>${res.administrator}</td>
                <td>${res.pengawas}</td>
                <td>${res.pelaksana}</td>
                <td>${res.keterangan}</td>
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