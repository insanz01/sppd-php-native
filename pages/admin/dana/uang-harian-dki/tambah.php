<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Uang Harian DKI</a></li>
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
              <label for="">Uraian</label>
              <input type="text" class="form-control" id="uraian">
            </div>
            <div class="form-group">
              <label for="">Walikota</label>
              <input type="text" class="form-control" id="walikota">
            </div>
            <div class="form-group">
              <label for="">DPRD</label>
              <input type="text" class="form-control" id="dprd">
            </div>
            <div class="form-group">
              <label for="">Sekda</label>
              <input type="text" class="form-control" id="sekda">
            </div>
            <div class="form-group">
              <label for="">Asisten Sekda</label>
              <input type="text" class="form-control" id="asisten_sekda">
            </div>
            <div class="form-group">
              <label for="">Administrator</label>
              <input type="text" class="form-control" id="administrator">
            </div>
            <div class="form-group">
              <label for="">Pengawas</label>
              <input type="text" class="form-control" id="pengawas">
            </div>
            <div class="form-group">
              <label for="">Pelaksana</label>
              <input type="text" class="form-control" id="pelaksana">
            </div>
            <div class="form-group">
              <label for="">Keterangan</label>
              <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10"></textarea>
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
    return await axios.post(`<?= $base_url ?>api/uhpd.api.php?todo=save_dki`, data, {
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const getValue = (target) => {
    return document.getElementById(target).value;
  }

  const submitData = async () => {
    const uraian = getValue("uraian");
    const walikota = getValue("walikota");
    const dprd = getValue("dprd");
    const sekda = getValue("sekda");
    const asisten_sekda = getValue("asisten_sekda");
    const administrator = getValue("administrator");
    const pengawas = getValue("pengawas");
    const pelaksana = getValue("pelaksana");
    const keterangan = getValue("keterangan");

    const data = {
      uraian,
      walikota,
      dprd,
      sekda,
      asisten_sekda,
      administrator,
      pengawas,
      pelaksana,
      keterangan
    }

    const result = await saveData(data);

    if(result.status) {
      window.location.href = `<?= $base_url ?>index.php?page=uang-harian-dki`
    }
  }
</script>