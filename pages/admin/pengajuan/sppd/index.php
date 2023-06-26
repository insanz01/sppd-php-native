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
              <input type="text" class="form-control" id="nip_karyawan">
            </div>
            <div class="form-group">
              <label for="">Nama Karyawan</label>
              <input type="text" class="form-control" id="nama_karyawan">
            </div>
            <div class="form-group">
              <label for="">Pangkat Karyawan</label>
              <input type="text" class="form-control" id="pangkat">
            </div>
            <div class="form-group">
              <label for="">Golongan Karyawan</label>
              <input type="email" class="form-control" id="golongan">
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
              <input type="text" class="form-control" id="tingkat_perjalanan_dinas">
            </div>
            <div class="form-group">
              <label for="">Maksud Perjalanan Dinas</label>
              <input type="text" class="form-control" id="maksud_perjalanan_dinas">
            </div>
            <div class="form-group">
              <label for="">Alat Angkutan</label>
              <input type="text" class="form-control" id="alat_angkutan">
            </div>
            <div class="form-group">
              <label for="">Tampat Berangkat</label>
              <input type="text" class="form-control" id="tempat_berangkat">
            </div>
            <div class="form-group">
              <label for="">Tempat Tujuan</label>
              <input type="text" class="form-control" id="tempat_tujuan">
            </div>
            <div class="form-group">
              <label for="">Lama Dinas</label>
              <input type="text" class="form-control" id="lama_dinas">
            </div>
            <div class="form-group">
              <label for="">Tanggal Berangkat</label>
              <input type="date" class="form-control" id="tanggal_berangkat">
            </div>
            <div class="form-group">
              <label for="">Tanggal Kembali</label>
              <input type="date" class="form-control" id="tanggal_kembali">
            </div>
            <div class="form-group">
              <label for="">Beban Anggaran (Instansi)</label>
              <input type="text" class="form-control" id="beban_anggaran_instansi">
            </div>
            <div class="form-group">
              <label for="">Mata Anggaran</label>
              <input type="text" class="form-control" id="beban_anggaran_mata_anggaran">
            </div>
            <div class="form-group">
              <label for="">Keterangan Lainnya</label>
              <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label for="">Berangkat Dari</label>
              <input type="text" class="form-control" id="berangkat_dari">
            </div>
            <div class="form-group">
              <label for="">Tujuan Pertama</label>
              <input type="text" class="form-control" id="tujuan_satu">
            </div>
            <div class="form-group">
              <label for="">Tujuan Kedua</label>
              <input type="text" class="form-control" id="tujuan_dua" placeholder="hanya isi jika ada tujuan kedua">
            </div>
            <div class="form-group">
              <label for="">Tanggal Berangkat Tujuan Kedua</label>
              <input type="date" class="form-control" id="tanggal_berangkat_tujuan_dua">
            </div>
            <div class="form-group">
              <label for="">Tujuan Ketiga</label>
              <input type="text" class="form-control" id="tujuan_tiga" placeholder="hanya isi jika ada tujuan ketiga">
            </div>
            <div class="form-group">
              <label for="">Tanggal Berangkat Tujuan Ketiga</label>
              <input type="date" class="form-control" id="tanggal_berangkat_tujuan_tiga">
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
    return await axios.post(`<?= $base_url ?>api/sppd.api.php?todo=save-pengajuan`, data, {
      headers: {
        "Content-Type": "multipart/form-data"
      }
    }).then(res => res.data);
  }

  const getValue = (target) => {
    return document.getElementById(target).value;
  }

  const submitData = async () => {
    const author = getValue("author");
    const nip_karyawan = getValue("nip_karyawan");
    const nama_karyawan = getValue("nama_karyawan");
    const pangkat = getValue("pangkat");
    const golongan = getValue("golongan");
    const jabatan = getValue("jabatan");
    const instansi = getValue("instansi");
    const tingkat_perjalanan_dinas = getValue("tingkat_perjalanan_dinas");
    const alat_angkutan = getValue("alat_angkutan");
    const tempat_berangkat = getValue("tempat_berangkat");
    const tempat_tujuan = getValue("tempat_tujuan");
    const lama_dinas = getValue("lama_dinas");
    const tanggal_berangkat = getValue("tanggal_berangkat");
    const tanggal_kembali = getValue("tanggal_kembali");
    const beban_anggaran_instansi = getValue("beban_anggaran_instansi");
    const beban_anggaran_mata_anggaran = getValue("beban_anggaran_mata_anggaran");
    const NIP_kepala_dinas = getValue("NIP_kepala_dinas");
    const nama_kepala_dinas = getValue("nama_kepala_dinas");
    const keterangan = getValue("keterangan");
    const berangkat_dari = getValue("berangkat_dari");
    const tujuan_satu = getValue("tujuan_satu");
    const tujuan_dua = getValue("tujuan_dua");
    const tanggal_berangkat_tujuan_dua = getValue("tanggal_berangkat_tujuan_dua");
    const tujuan_tiga = getValue("tujuan_tiga");
    const tanggal_berangkat_tujuan_tiga = getValue("tanggal_berangkat_tujuan_tiga");

    const data = {
      author,
      nip_karyawan,
      nama_karyawan,
      pangkat,
      golongan,
      jabatan,
      instansi,
      tingkat_perjalanan_dinas,
      alat_angkutan,
      tempat_berangkat,
      tempat_tujuan,
      lama_dinas,
      tanggal_berangkat,
      tanggal_kembali,
      beban_anggaran_instansi,
      beban_anggaran_mata_anggaran,
      NIP_kepala_dinas,
      nama_kepala_dinas,
      keterangan,
      berangkat_dari,
      tujuan_satu,
      tujuan_dua,
      tanggal_berangkat_tujuan_dua,
      tujuan_tiga,
      tanggal_berangkat_tujuan_tiga,
    }

    const result = await saveData(data);

    if(result.status) {
      window.location.href = `<?= $base_url ?>index.php?page=pengajuan-sppd`
    }
  }
</script>