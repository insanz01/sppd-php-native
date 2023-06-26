<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Pegawai</a></li>
          <li class="breadcrumb-item active">Tabel</li>
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
              <label for="">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama">
            </div>
            <div class="form-group">
              <label for="">NIP</label>
              <input type="text" class="form-control" id="NIP">
            </div>
            <div class="form-group">
              <label for="">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label for="">Nomor HP</label>
              <input type="text" class="form-control" id="nomor_hp">
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="">Jabatan</label>
              <input type="text" class="form-control" id="jabatan">
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
    return await axios.post(`<?= $base_url ?>api/pegawai.api.php?todo=save`, data, {
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const getValue = (target) => {
    return document.getElementById(target).value;
  }

  const submitData = async () => {
    const nama = getValue("nama");
    const NIP = getValue("NIP");
    const alamat = getValue("alamat");
    const nomor_hp = getValue("nomor_hp");
    const email = getValue("email");
    const jabatan = getValue("jabatan");

    const data = {
      nama,
      NIP,
      alamat,
      nomor_hp,
      email,
      jabatan
    }

    const result = await saveData(data);

    if(result.status) {
      window.location.href = `<?= $base_url ?>index.php?page=pegawai`
    }
  }
</script>