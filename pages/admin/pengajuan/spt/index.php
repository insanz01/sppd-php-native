<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Surat Perintah Tugas</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Pengajuan</a></li>
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
              <label for="">Nomor SPPD</label>
              <input type="text" class="form-control" id="nomor_sppd">
            </div>
            <div class="form-group">
              <label for="">NIP Karyawan (Yang diperintah)</label>
              <input type="text" class="form-control" id="nip_karyawan">
            </div>
            <div class="form-group">
              <label for="">Nama Karyawan (Yang diperintah)</label>
              <input type="text" class="form-control" id="nama_karyawan">
            </div>
            <div class="form-group">
              <label for="">Pangkat</label>
              <input type="text" class="form-control" id="pangkat">
            </div>
            <div class="form-group">
              <label for="">Golongan</label>
              <input type="text" class="form-control" id="golongan">
            </div>
            <div class="form-group">
              <label for="">Jabatan</label>
              <input type="text" class="form-control" id="jabatan">
            </div>
            <div class="form-group">
              <label for="">Rangka Acara</label>
              <textarea name="rangka-acara" id="rangka_acara" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label for="">Tujuan</label>
              <textarea name="tujuan" id="tujuan" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label for="">Tanggal Kegiatan</label>
              <input type="date" class="form-control" id="tanggal_kegiatan">
            </div>
            <div class="form-group">
              <label for="">Atas Beban</label>
              <textarea name="atas-beban" id="atas_beban" class="form-control" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
              <button class="btn btn-primary btn-block" role="button" onclick="submitData()">SIMPAN DATA</button>
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
    return await axios.post(`<?= $base_url ?>api/spt.api.php?todo=save-pengajuan`, data, {
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const getValue = (target) => {
    return document.getElementById(target).value;
  }

  const submitData = async () => {
    const nomor_sppd = getValue("nomor_sppd");
    const nip_karyawan = getValue("nip_karyawan");
    const nama_karyawan = getValue("nama_karyawan");
    const pangkat = getValue("pangkat");
    const golongan = getValue("golongan");
    const rangka_acara = getValue("rangka_acara");
    const jabatan = getValue("jabatan");
    const tujuan = getValue("tujuan");
    const tanggal_kegiatan = getValue("tanggal_kegiatan");
    const atas_beban = getValue("atas_beban");

    const data = {
      nomor_sppd,
      nip_karyawan,
      nama_karyawan,
      pangkat,
      golongan,
      rangka_acara,
      jabatan,
      tujuan,
      tanggal_kegiatan,
      atas_beban,
    }

    const result = await saveData(data);

    if(result.status) {
      window.location.href = `<?= $base_url ?>index.php?page=pengajuan-spt`
    }
  }
</script>