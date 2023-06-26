<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Surat Perintah Perjalanan Dinas</h1>
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
              <label for="">Pejabat yang memberi perintah</label>
              <input type="text" class="form-control" id="author">
            </div>
            <div class="form-group">
              <label for="">NIP Karyawan</label>
              <input type="text" class="form-control" id="NIP">
            </div>
            <div class="form-group">
              <label for="">Nama Karyawan</label>
              <input type="text" class="form-control" id="nama">
            </div>
            <div class="form-group">
              <label for="">Pangkat Karyawan</label>
              <input type="text" class="form-control" id="nomor_hp">
            </div>
            <div class="form-group">
              <label for="">Golongan Karyawan</label>
              <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="">Jabatan</label>
              <input type="text" class="form-control" id="jabatan">
            </div>
            <div class="form-group">
              <label for="">Instansi</label>
              <input type="text" class="form-control" id="instansi">
            </div>
            <div class="form-group">
              <label for="">Tingkat Perjalanan Dinas</label>
              <input type="text" class="form-control" id="tingkat-perjalanan-dinas">
            </div>
            <div class="form-group">
              <label for="">Maksud Perjalanan Dinas</label>
              <input type="text" class="form-control" id="maksud">
            </div>
            <div class="form-group">
              <label for="">Alat Angkutan</label>
              <input type="text" class="form-control" id="alat-angkutan">
            </div>
            <div class="form-group">
              <label for="">Tampat Berangkat</label>
              <input type="text" class="form-control" id="tempat-berangkat">
            </div>
            <div class="form-group">
              <label for="">Tempat Tujuan</label>
              <input type="text" class="form-control" id="tempat-tujuan">
            </div>
            <div class="form-group">
              <label for="">Lama Dinas</label>
              <input type="text" class="form-control" id="lama-dinas">
            </div>
            <div class="form-group">
              <label for="">Tanggal Berangkat</label>
              <input type="date" class="form-control" id="tanggal-berangkat">
            </div>
            <div class="form-group">
              <label for="">Tanggal Kembali</label>
              <input type="date" class="form-control" id="tanggal-kembali">
            </div>
            <div class="form-group">
              <label for="">Beban Anggaran (Instansi)</label>
              <input type="text" class="form-control" id="beban-anggaran">
            </div>
            <div class="form-group">
              <label for="">Mata Anggaran</label>
              <input type="text" class="form-control" id="mata-anggaran">
            </div>
            <div class="form-group">
              <label for="">Keterangan Lainnya</label>
              <textarea name="keterangan-lainnya" id="keterangan-lainnya" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label for="">Berangkat Dari</label>
              <input type="text" class="form-control" id="berangkat-dari">
            </div>
            <div class="form-group">
              <label for="">Tujuan Pertama</label>
              <input type="text" class="form-control" id="tujuan-pertama">
            </div>
            <div class="form-group">
              <label for="">Tanggal Berangkat Tujuan Kedua</label>
              <input type="date" class="form-control" id="tanggal-berangkat-tujuan-kedua">
            </div>
            <div class="form-group">
              <label for="">Tujuan Ketiga</label>
              <input type="text" class="form-control" id="tujuan-ketiga">
            </div>
            <div class="form-group">
              <label for="">Tanggal Berangkat Tujuan Ketiga</label>
              <input type="date" class="form-control" id="tanggal-berangkat-tujuan-ketiga">
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
      window.location.href = `<?= $base_url ?>index.php?page=pengajuan-sppd`
    }
  }
</script>