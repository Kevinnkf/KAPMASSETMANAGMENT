@extends('layouts.app')

@section('content')
    {{-- Breadcrumb --}}
    @include('kepegawaian.asesmen-pekerja.asesmen-multirater-360.breadcrumb')
    {{-- End Breadcrumb --}}

    {{-- Content --}}
    <div class="row align-items-center">
        <div class="col">
            <h4 class="fw-semibold mt-3 text-primary-kai">{{ $title }}</h4>
        </div>
        
    </div>
    {{-- End Content --}}
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body pt-0">
                        <div class="py-3">
                            <h5 class="card-title fw-semibold mb-0 text-primary">Data Pegawai</h5>
                        </div>
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama pegawai">
                        </div>
                        <div class="mb-3">
                            <label for="nipp">NIPP</label>
                            <input type="text" class="form-control" id="nipp" placeholder="Nomor NIPP">
                        </div>
                        <div class="mb-3">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" placeholder="Jabatan anda">
                        </div>
                        <div class="mb-3">
                            <label for="unitKerja">Unit Kerja</label>
                            <input type="text" class="form-control" id="unitKerja" placeholder="Unit kerja">
                        </div>
                        <div class="mb-3">
                            <label for="emailPegawai">Email</label>
                            <input type="email" class="form-control" id="emailPegawai" placeholder="Email">
                        </div>
                        <hr>
                        <div class="py-3">
                        <h5 class="card-title fw-semibold mb-0 text-primary">Data Dinas</h5>
                        </div>
                        <div class="mb-3">
                            <label for="jenisDinas">Jenis Dinas</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenisDinas" id="dinasDalam" value="dalam">
                                <label class="form-check-label" for="dinasDalam">
                                    Perjalanan Dinas (jarak lebih dari 50KM)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenisDinas" id="dinasLuar" value="luar" checked>
                                <label class="form-check-label" for="dinasLuar">
                                    Dinas Luar (jarak kurang dari 50KM)
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tglAwal">Tanggal Dinas Awal</label>
                                <input type="date" class="form-control" id="tglAwal">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tglAkhir">Tanggal Dinas Akhir</label>
                                <input type="date" class="form-control" id="tglAkhir">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tujuanDinas">Tujuan Dinas</label>
                            <input type="text" class="form-control" id="tujuanDinas" placeholder="Tujuan dinas">
                        </div>
                        <div class="mb-3">
                            <label for="kontak">Kontak yang Dapat Dihubungi</label>
                            <input type="text" class="form-control" id="kontak" placeholder="+62 000 000 000">
                        </div>
        
                        <hr>
                        <div class="py-3">
                        <h5 class="card-title fw-semibold mb-0 text-primary">Data Atasan</h5>
                        </div>
                        <div class="mb-3">
                            <label for="namaAtasan">Nama Atasan</label>
                            <input type="text" class="form-control" id="namaAtasan" placeholder="Nama atasan">
                        </div>
                        <div class="mb-3">
                            <label for="nippAtasan">NIPP</label>
                            <input type="text" class="form-control" id="nippAtasan" placeholder="Nomor NIPP">
                        </div>
                        <div class="mb-3">
                            <label for="jabatanAtasan">Jabatan Atasan</label>
                            <input type="text" class="form-control" id="jabatanAtasan" placeholder="Jabatan atasan">
                        </div>
                        <div class="mb-3">
                            <label for="emailAtasan">Email</label>
                            <input type="email" class="form-control" id="emailAtasan" placeholder="Email">
                        </div>
        
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary">Kembali</button>
                            <button type="submit" class="btn btn-primary" id="ajukan" onclick="validateForm()">Ajukan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
@endsection

@section('scripts')
<script>
    function validateForm() {
        const fields = document.querySelectorAll('.form-control');
        let isValid = true;
        fields.forEach(field => {
            const message = field.nextSibling;
            if (message) {
                message.remove();
            }
            if (field.value.trim() === '') {
                field.classList.add('is-invalid');
                const errorMessage = document.createElement('div');
                errorMessage.classList.add('invalid-feedback');
                switch (field.id) {
                    case 'nama':
                        errorMessage.textContent = 'Harap isi nama pegawai';
                        break;
                    case 'nipp':
                        errorMessage.textContent = 'Harap isi NIPP';
                        break;
                    case 'jabatan':
                        errorMessage.textContent = 'Harap isi jabatan';
                        break;
                    case 'unitKerja':
                        errorMessage.textContent = 'Harap isi unit kerja';
                        break;
                    case 'emailPegawai':
                        errorMessage.textContent = 'Harap isi email';
                        break;
                    case 'jenisDinas':
                        errorMessage.textContent = 'Harap pilih jenis dinas';
                        break;
                    case 'tglAwal':
                        errorMessage.textContent = 'Harap isi tanggal awal';
                        break;
                    case 'tglAkhir':
                        errorMessage.textContent = 'Harap isi tanggal akhir';
                        break;
                    case 'tujuanDinas':
                        errorMessage.textContent = 'Harap isi tujuan dinas';
                        break;
                    case 'kontak':
                        errorMessage.textContent = 'Harap isi kontak';
                        break;
                    case 'namaAtasan':
                        errorMessage.textContent = 'Harap isi nama atasan';
                        break;
                    case 'nippAtasan':
                        errorMessage.textContent = 'Harap isi NIPP atasan';
                        break;
                    case 'jabatanAtasan':
                        errorMessage.textContent = 'Harap isi jabatan atasan';
                        break;
                    case 'emailAtasan':
                        errorMessage.textContent = 'Harap isi email atasan';
                        break;
                    default:
                        errorMessage.textContent = 'Harap isi kolom ini';
                }
                field.parentNode.insertBefore(errorMessage, field.nextSibling);
                field.setCustomValidity('Harap isi kolom ini');
                isValid = false;
            } else {
                field.classList.remove('is-invalid');
                field.setCustomValidity('');
            }
        });
        if (isValid) {
            submitData();
        }
    }
    function submitData() {
        event.preventDefault();
        const formData = new FormData(document.querySelector('form'));
        const data = {
            jenisDinas: formData.get('jenisDinas'),
            tglAwal: formData.get('tglAwal'),
            tglAkhir: formData.get('tglAkhir'),
            tujuanDinas: formData.get('tujuanDinas'),
            kontak: formData.get('kontak'),
            namaAtasan: formData.get('namaAtasan'),
            nippAtasan: formData.get('nippAtasan'),
            jabatanAtasan: formData.get('jabatanAtasan'),
            emailAtasan: formData.get('emailAtasan'),
        };
        fetch('/api/pengajuan', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: "Berhasil Kirim Pengajuan",
                    html: '<span style="font-size: 16px;color:#818181">Hai, pengajuan kamu berhasil kami terima. Mohon tunggu beberapa waktu untuk disetujui oleh atasan / pejabat terkait!</span>',
                    imageUrl: "{{ asset('assets/dist/images/svgs/Illustration.svg') }}",
                    imageWidth: 200,
                    imageHeight: 200,
                });
            } else {
                Swal.fire({
                    title: "Gagal Kirim Pengajuan",
                    text: data.message,
                    icon: 'error',
                });
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>
@endsection
