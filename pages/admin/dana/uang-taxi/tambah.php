<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Uang Taxi</a></li>
          <li class="breadcrumb-item active">Tambah</li>
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
            
            <div class="form-group">
              <label for="">Nama Provinsi</label>
              <input type="text" class="form-control" id="nama_provinsi">
            </div>
            <div class="form-group">
              <label for="">Satuan</label>
              <input type="text" class="form-control" id="satuan">
            </div>
            <div class="form-group">
              <label for="">Besaran</label>
              <input type="number" class="form-control" id="besaran" min="0">
            </div>
            
            <div class="form-group">
              <button class="btn btn-primary btn-block" onclick="submitData()">SIMPAN DATA</button>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- Main row -->

  </div><!-- /.container-fluid -->
</section>

<script>

  const saveData = async (data) => {
    return await axios.post(`<?= $base_url ?>api/utpd.api.php?todo=save`, data, {
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const getValue = (target) => {
    return document.getElementById(target).value;
  }

  const submitData = async () => {
    const nama_provinsi = getValue("nama_provinsi");
    const satuan = getValue("satuan");
    const besaran = getValue("besaran");

    const data = {
      nama_provinsi,
      satuan,
      besaran
    }

    const result = await saveData(data);

    if(result.status) {
      window.location.href = `<?= $base_url ?>index.php?page=uang-harian`
    }
  }
</script>