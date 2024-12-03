// START SCRIPT DATATABLES BAWAHAN
if ($.fn.dataTable.isDataTable('#izin-datatables')) {
    $('#izin-datatables').DataTable().destroy();
}
var table = $('#izin-datatables').DataTable({
    processing: true,
    serverSide: true,
    ajax: 'getHistoryIzin',
    columns: [
        {
            data: 'DT_RowIndex',
            title: 'No',
            orderable: false // Kolom ini tidak diurutkan
        },
        {
            data: 'tipeIzin',
            title: 'Tipe Izin'
        },
        {
            data: 'tanggal',
            render: function (data) {
                // Memastikan data tidak kosong sebelum di-format
                return data ? formatDate(data) : data; // Kembali ke data asli jika kosong
            },
            title: 'Tanggal Izin'
        },
        {
            data: 'jam',
            title: 'Jam Izin'
        },
        {
            data: 'jumlahJam',
            title: 'Jumlah Jam'
        },
        {
            data: 'namaAtasan',
            title: 'Nama Atasan'
        },
        {
            data: 'nippAtasan',
            title: 'NIPP Atasan'
        },
        {
            data: 'telepon',
            title: 'Telepon'
        },
        {
            data: 'alasan',
            title: 'Alasan'
        },
        {
            data: 'status',
            title: 'Status', // Menyediakan judul kolom
            render: function (data, type, row) {
                if (row.statusApprove == 0) {
                    return '<span class="badge rounded-pill font-medium fw-bolder bg-warning bg-opacity-25 text-warning">Menunggu</span>';
                } else if (row.statusApprove == 1) {
                    return '<span class="badge rounded-pill font-medium fw-bolder bg-success bg-opacity-25 text-success">Disetujui</span>';
                } else if (row.statusApprove == 2) {
                    return '<span class="badge rounded-pill font-medium fw-bolder bg-danger bg-opacity-25 text-danger">Ditolak</span>';
                } else if (row.statusApprove == 3) {
                    return '<span class="badge rounded-pill font-medium fw-bolder bg-dark bg-opacity-25 text-dark">Batal</span>';
                }
            }
        },
        {
            data: 'action',
            orderable: false,
            searchable: false,
            title: 'Aksi',
            render: function (data, type, row) {
                return `
                    <a id="btnShowModal" data-id="${row.idIzinPulang}" class="fw-bolder cursor-pointer">Detail</a>
                    <a id="cetakIzinPribadi" data-id="${row.idIzinPulang}" class="fw-bolder cursor-pointer">Cetak</a>
                `;
            }
        }
    ],
    order: [[2, 'desc']], // Urut berdasarkan kolom tanggal
    searching: false, // Menonaktifkan pencarian
    lengthChange: false, // Menonaktifkan perubahan jumlah tampilan
    scrollX: true, // Mengaktifkan scroll horizontal
    autoWidth: false, // Menonaktifkan auto lebar kolom
    language: {
        emptyTable: "Tidak ada data izin yang tersedia" // Pesan khusus jika tidak ada data
    }
});
// Fungsi untuk memformat tanggal dari 'yyyy-mm-dd' ke 'dd-mm-yyyy'
function formatDate(data) {
    var parts = data.split('-'); // Misal format API: yyyy-mm-dd
    return `${parts[2]}-${parts[1]}-${parts[0]}`; // Mengembalikan format dd-mm-yyyy
}
// END SCRIPT DATATABLES BAWAHAN

// START SCRIPT DATATABLES ATASAN
if ($.fn.dataTable.isDataTable('#izin-datatables-atasan')) {
    $('#izin-datatables-atasan').DataTable().destroy();
}
var table = $('#izin-datatables-atasan').DataTable({
    processing: true,
    serverSide: true,
    ajax: 'getHistoryIzinAtasan',
    columns: [
        {
            data: 'DT_RowIndex',
            title: 'No',
            orderable: false // Kolom ini tidak diurutkan
        },
        {
            data: 'tipeIzin',
            title: 'Tipe Izin'
        },
        {
            data: 'tanggal',
            render: function (data) {
                // Memastikan data tidak kosong sebelum di-format
                return data ? formatDate(data) : data; // Kembali ke data asli jika kosong
            },
            title: 'Tanggal Izin'
        },
        {
            data: 'jam',
            title: 'Jam Izin'
        },
        {
            data: 'jumlahJam',
            title: 'Jumlah Jam'
        },
        {
            data: 'namaAtasan',
            title: 'Nama Atasan'
        },
        {
            data: 'nippAtasan',
            title: 'NIPP Atasan'
        },
        {
            data: 'telepon',
            title: 'Telepon'
        },
        {
            data: 'alasan',
            title: 'Alasan'
        },
        {
            data: 'status',
            title: 'Status', // Menyediakan judul kolom
            render: function (data, type, row) {
                if (row.statusApprove == 0) {
                    return '<span class="badge rounded-pill font-medium fw-bolder bg-warning bg-opacity-25 text-warning">Menunggu</span>';
                } else if (row.statusApprove == 1) {
                    return '<span class="badge rounded-pill font-medium fw-bolder bg-success bg-opacity-25 text-success">Disetujui</span>';
                } else if (row.statusApprove == 2) {
                    return '<span class="badge rounded-pill font-medium fw-bolder bg-danger bg-opacity-25 text-danger">Ditolak</span>';
                } else if (row.statusApprove == 3) {
                    return '<span class="badge rounded-pill font-medium fw-bolder bg-dark bg-opacity-25 text-dark">Batal</span>';
                }
            }
        },
        {
            data: 'action',
            orderable: false,
            searchable: false,
            title: 'Aksi',
            render: function (data, type, row) {
                return `
                    <a id="btnShowModal" data-id="${row.idIzinPulang}" class="fw-bolder cursor-pointer">Detail</a>
                    <a id="cetakIzinPribadi" data-id="${row.idIzinPulang}" class="fw-bolder cursor-pointer">Cetak</a>
                `;
            }
        }
    ],
    order: [[2, 'desc']], // Urut berdasarkan kolom tanggal
    searching: false, // Menonaktifkan pencarian
    lengthChange: false, // Menonaktifkan perubahan jumlah tampilan
    scrollX: true, // Mengaktifkan scroll horizontal
    autoWidth: false, // Menonaktifkan auto lebar kolom
    language: {
        emptyTable: "Tidak ada data izin yang tersedia" // Pesan khusus jika tidak ada data
    }
});
// END SCRIPT DATATABLES ATASAN

// SCRIPT START SHOW MODAL IZIN DETAIL DI PEGAWAI
$(document).on('click', '#btnShowModal', function () {
    var idIzinPulang = $(this).data('id'); // Ambil idIzinPulang dari data-id
    $('#input_id').val(idIzinPulang);

    $.ajax({
        url: '/time-management/izin/show?id=' + encodeURIComponent(idIzinPulang.replace(/\+/g, '%2B')),
        type: 'GET',
        success: function (data) {
            // console.log(data); // Mencetak seluruh objek data ke konsol
            const items = data.data.data;
            let content = '';
            function formatDate(dateString) {
                let date = new Date(dateString);
                // Array untuk nama bulan singkat
                const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                let day = ('0' + date.getDate()).slice(-2);
                let month = monthNames[date.getMonth()]; // Ambil nama bulan dari array
                let year = date.getFullYear();

                return day + '-' + month + '-' + year;
            }

            function formatDateString(dateString) {
                let date = new Date(dateString);
                // Array untuk nama bulan singkat
                const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

                let day = ('0' + date.getDate()).slice(-2);
                let month = monthNames[date.getMonth()]; // Ambil nama bulan dari array
                let year = date.getFullYear();

                return day + '-' + month + '-' + year;
            }
            // Looping data dan membuat elemen HTML untuk ditampilkan di modal
            items.forEach(item => {
                let timeParts = item.jam.split(':'); // Pisahkan berdasarkan ":"
                let formattedTime = timeParts[0] + ':' + timeParts[1]; // Gabungkan kembali hanya jam dan menit
                let hourParts = item.jumlahJam.split(':'); // Pisahkan berdasarkan ":"
                let formattedHour = parseInt(hourParts[0], 10); // Ambil bagian jam dan ubah ke integer
                $('#namaAtasan').html(item
                    .namaAtasan); // Tampilkan hasil looping di modal
                $('#namaAtas').html(item
                    .namaAtasan); // Tampilkan hasil looping di modal
                $('#nippAtasan').html(item
                    .nippAtasan); // Tampilkan hasil looping di modal
                // Ubah statusApprove menjadi badge
                let statusBadge = '';
                if (item.statusApprove == 0) {
                    statusBadge =
                        '<span class="badge rounded-pill font-medium fw-bolder bg-warning bg-opacity-25 text-warning">Menunggu</span>';
                } else if (item.statusApprove == 1) {
                    statusBadge =
                        '<span class="badge rounded-pill font-medium fw-bolder bg-success bg-opacity-25 text-success">Disetujui</span>';
                } else if (item.statusApprove == 2) {
                    statusBadge =
                        '<span class="badge rounded-pill font-medium fw-bolder bg-danger bg-opacity-25 text-danger">Ditolak</span>';
                } else if (item.statusApprove == 3) {
                    statusBadge =
                        '<span class="badge rounded-pill font-medium fw-bolder bg-dark bg-opacity-25 text-dark">Batal</span>';
                }
                $('#statusIzin').html(
                    statusBadge); // Tampilkan status persetujuan di modal
                $('#ketIzin').html(item.statusApproveDesc); // Tampilkan status persetujuan di modal
                $('#tipeIzin').html(item.tipeIzinDesc); // Tampilkan tipe izin
                // Ubah format tanggal menjadi dd-mm-yyyy
                let formattedTanggal = formatDate(item.tanggal);
                $('#tanggal').html(formattedTanggal); // Tampilkan tanggal izin

                $('#jumlahJam').html(formattedHour + ' jam'); // Tampilkan jumlah jam izin
                $('#jam').html(item.jam); // Tampilkan jam izin
                $('#jamIzin').html(formattedTime); // Tampilkan jam izin
                $('#alasan').html(item.alasan); // Tampilkan alasan izin
                $('#telepon').html(item.telepon); // Tampilkan telepon
                let formattedString = formatDateString(item.createdAt);
                $('#createIzin').html(formattedString); // Tampilkan tanggal
                let statusPengajuan = '';
                if (item.statusApprove == 0) {
                    statusPengajuan = `
                <button id="sa-tolak" type="button"
                    class="btn mt-3 mb-3 waves-effect waves-light btn-rounded btn-outline-danger fs-2 fw-bolder w-100"
                    data-bs-dismiss="modal">
                    Batalkan Pengajuan
                </button>`;
                } else if (item.statusApprove == 1) {
                    statusPengajuan = `
                    <div class="mt-3">
                    </div>`;
                } else if (item.statusApprove == 2) {
                    statusPengajuan = `
                <div class="mt-2">
                    <div class="text-grey mb-2" style="padding-left: 2.2%">
                        Alasan Pengajuan Ditolak
                    </div>
                    <div class="p-3 m-2 d-flex flex-column align-items-stretch h-100"
                        style="background-color: #F9F9F9">
                        <div class="mb-3">
                            <span class="text-dark">
                                ${item.keterangan}
                            </span>
                        </div>
                        <div class="text-grey">
                            -&nbsp; <span class="fs-2">${item.namaAtasan}</span>
                        </div>
                    </div>
                </div>
                `;
                } else if (item.statusApprove == 3) {
                    statusPengajuan = `
                    <div class="mt-3">
                    </div>`;
                }
                $('#statusPengajuan').html(statusPengajuan);
            });

            // Tampilkan modal
            $('#modalDetailIzin').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Terjadi kesalahan: ' + errorThrown); // Tangani error
        }
    });
});
// SCRIPT END SHOW MODAL IZIN DETAIL DI PEGAWAI

// SCRIPT START BATAL PENGAJUAN DINAS PEGAWAI
$(document).on('click', '#sa-tolak', function () {
    $('#modalSaTolak').modal('show');
    $('#alasanTolak').val(''); // Reset nilai textarea dengan id "alasanTolak"
});

preConfirm: () => {
    const alasan = document.getElementById('alasanTolak').value.trim();
    if (!alasan) {
        Swal.showValidationMessage('Alasan pembatalan wajib diisi!');
        return false;  // Menghentikan eksekusi jika alasan kosong
    }
    return alasan;
}

$("#sa-tolak-yes").click(function () {
    var idIzinPulang = $('#input_id').val();
    var alasanDitolak = $('#alasanTolak').val().trim();

    // Validasi apakah alasan kosong
    if (!alasanDitolak) {
        Swal.fire({
            title: 'Error!',
            text: 'Alasan pembatalan wajib diisi!',
            icon: 'error',
            confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'w-100' // Menambahkan kelas w-100 agar tombol penuh
            }
        });
        return; // Menghentikan eksekusi jika alasan kosong
    }

    // Melanjutkan ke proses AJAX jika validasi berhasil
    $.ajax({
        url: '/time-management/izin/batalPegawai',
        type: 'POST',
        data: {
            id: idIzinPulang,
            alasan: alasanDitolak,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            Swal.fire({
                title: response.message,
                html: '<span style="color: #818181;">Harap cek lanjut status pengajuan formulir izin melalui dashboard halaman izin</span>',
                icon: 'success',
                confirmButtonText: 'Lihat Status',
                cancelButtonText: 'Ke Halaman Pengajuan Izin',
                showCancelButton: true,
                imageWidth: 100,
                imageHeight: 100,
                customClass: {
                    actions: 'my-actions',
                    confirmButton: 'lihat-status',
                    cancelButton: 'ke-hal-izin'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(() => {
                        window.location.href = '/time-management/izin/index';
                    }, 200);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    setTimeout(() => {
                        window.location.href = '/time-management/izin/create';
                    }, 200);
                }
            });

            $('#modalDetailIzin').modal('hide');
            $('#izin-datatables').DataTable().ajax.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Terjadi kesalahan: ' + errorThrown);
        }
    });
});
// SCRIPT END BATAL PENGAJUAN DINAS

// $("#sa-tolak-tes").click(function () {
//     // Tampilkan pesan Swal
//     Swal.fire({
//         title: 'Pengajuan berhasil dibatalkan!',
//         html: '<span style="color: #818181;">Harap cek lanjut status pengajuan formulir izin melalui dashboard halaman izin</span>', // Menggunakan style inline            icon: 'success',
//         icon: 'success',
//         confirmButtonText: 'Lihat Status',
//         cancelButtonText: 'Ke Halaman Pengajuan Izin',
//         showCancelButton: true,
//         imageWidth: 100,
//         imageHeight: 100,
//         customClass: {
//             actions: 'my-actions',
//             confirmButton: 'lihat-status ', // Menambah kelas untuk lebar penuh
//             cancelButton: 'ke-hal-izin' // Menambah kelas untuk lebar penuh
//         }
//     }).then((result) => {
//         if (result.isConfirmed) {
//             // Aksi jika pengguna mengklik "Lihat Status"
//             setTimeout(() => {
//                 window.location.href = '/time-management/izin/index'; // URL yang sesuai
//             }, 200); // Menunggu 200 ms sebelum berpindah
//         } else if (result.dismiss === Swal.DismissReason.cancel) {
//             // Aksi jika pengguna mengklik "Ke Halaman Pengajuan Izin"
//             setTimeout(() => {
//                 window.location.href = '/time-management/izin/create'; // URL yang sesuai
//             }, 200); // Menunggu 200 ms sebelum berpindah
//         }
//     });
// });

// START FUNCTION DATEPICKER
$(document).ready(function () {
    // Inisialisasi datepicker
    $('#datepicker').datepicker({
        format: "MM-yyyy", // Ubah format ke "MM-yyyy"
        startView: "months",
        minViewMode: "months",
        autoclose: true,
        orientation: "bottom" // Memaksa datepicker muncul di bawah input
    }).datepicker('setDate', new Date(2024, 9, 1)); // Set datepicker ke Oktober 2024

    // Reset datepicker saat dibuka
    $('#datepicker').on('show', function () {
        $(this).datepicker('setDate', new Date(2024, 9, 1)); // Set kembali ke Oktober 2024 saat dibuka
    });
});
// END FUNCTION DATEPICKER

// START FUNCTION SEARCHING
$(document).ready(function () {
    // Event listener untuk mengubah nilai pada select dan input
    $('.filter').on('change', function () {
        // Ambil nilai dari select dan input
        var status = $('.filter').val(); // Mengambil nilai idStatus dari dropdown
        var tahunBulan = $('#datepicker').val(); // Mengambil nilai dari input datepicker

        // Memisahkan bulan dan tahun
        var [bulan, tahun] = tahunBulan.split('-'); // Memecah string menjadi bulan dan tahun

        console.log("status: " + status + ", bulan: " + bulan + ", tahun: " + tahun);
        // Kirim data ke server menggunakan AJAX
        $.ajax({
            url: '/time-management/izin/getHistoryIzin', // Ganti dengan URL endpoint yang benar
            type: 'GET',
            data: {
                status: status,
                tahun: tahun
            },
            success: function (response) {
                // Proses respon dari server
                console.log(response);
                // Anda bisa memproses data response di sini
            },
            error: function (xhr, status, error) {
                // Tangani error di sini
                console.error(error);
            }
        });
    });
});
// END FUNCTION SEARCHING

// START FUNCTION CETAK
$(document).ready(function () {
    $(document).on('click', '#cetakIzinPribadi', function () {
        var idIzinPulang = $(this).data('id'); // Mengambil ID dari elemen yang di-klik
        var id = idIzinPulang.replace(/\+/g, '%2B');
        $.ajax({
            url: '/time-management/izin/cetakIzin', // Jangan tambahkan id di URL di sini
            type: 'GET',
            data: { id: id },
            xhrFields: {
                responseType: "blob",
            },
            success: function (data) {

                console.log("data", data);

                var blob = new Blob([data]);
                var link = document.createElement("a");
                link.href = window.URL.createObjectURL(blob);
                link.download = "izin-pdf.pdf"; // Menggunakan nama file yang sesuai
                link.click();
            },
            error: function (xhr, status, error) {
                console.log("Kesalahan:", error);
                alert('Terjadi kesalahan saat mengirim permintaan: ' + error);
            }
        });
    });
});
// END FUNCTION CETAK

// START LIST PENGAJUAN IZIN VIEW ATASAN
if ($.fn.dataTable.isDataTable('#izin-pengajuan-datatables')) {
    $('#izin-pengajuan-datatables').DataTable().destroy();
}
var table = $('#izin-pengajuan-datatables').DataTable({
    processing: true,
    serverSide: true,
    ajax: 'getPengajuanIzin',
    columns: [
        {
            data: 'nippPegawai',
            title: 'NIPP',
        },
        {
            data: 'namaPegawai',
            title: 'Nama' // Menyediakan judul kolom
        },
        {
            data: 'posisiPegawai',
            title: 'Posisi' // Menyediakan judul kolom
        },
        {
            data: 'tanggal',
            render: function (data) {
                // Memastikan data tidak kosong sebelum di-format
                if (data) {
                    var parts = data.split('-'); // Misal format API: yyyy-mm-dd
                    var day = parts[2];
                    var month = parts[1];
                    var year = parts[0];

                    return day + '-' + month + '-' + year; // Mengembalikan format dd-mm-yyyy
                }
                return data; // Kembali ke data asli jika kosong
            },
            title: 'Tanggal Izin'
        },
        {
            data: 'namaAtasan',
            title: 'Nama Atasan' // Menyediakan judul kolom
        },
        {
            data: 'statusApprove',
            title: 'Status', // Menyediakan judul kolom
            render: function (data, type, row) {
                if (row.statusApprove == 0) {
                    return '<span class="badge rounded-pill font-medium fw-bolder bg-warning bg-opacity-25 text-warning">Menunggu</span>';
                } else if (row.statusApprove == 1) {
                    return '<span class="badge rounded-pill font-medium fw-bolder bg-success bg-opacity-25 text-success">Disetujui</span>';
                } else if (row.statusApprove == 2) {
                    return '<span class="badge rounded-pill font-medium fw-bolder bg-danger bg-opacity-25 text-danger">Ditolak</span>';
                } else if (row.statusApprove == 3) {
                    return '<span class="badge rounded-pill font-medium fw-bolder bg-dark bg-opacity-25 text-dark">Batal</span>';
                }
            }
        },
        {
            data: 'action', // Kolom action untuk tombol Edit dan Delete
            orderable: false, // Kolom ini tidak diurutkan
            searchable: false, // Tidak perlu pencarian untuk kolom ini
            title: 'Aksi' // Menyediakan judul kolom
        }
    ],
    order: [[2, 'desc']], // Urut berdasarkan kolom tanggal
    searching: false, // Menonaktifkan pencarian
    lengthChange: false, // Menonaktifkan perubahan jumlah tampilan
    scrollX: false, // Mengaktifkan scroll horizontal
    autoWidth: false // Menonaktifkan auto lebar kolom
});
// END LIST PENGAJUAN IZIN VIEW ATASAN

// START LIST PPROVAL IZIN VIEW ATASAN
if ($.fn.dataTable.isDataTable('#izin-approval-datatables')) {
    $('#izin-approval-datatables').DataTable().destroy();
}

var table = $('#izin-approval-datatables').DataTable({
    processing: true,
    serverSide: true,
    ajax: 'getApprovalIzin',
    columns: [
        {
            data: 'nippPegawai',
            title: 'NIPP',
        },
        {
            data: 'namaPegawai',
            title: 'Nama' // Menyediakan judul kolom
        },
        {
            data: 'posisiPegawai',
            title: 'Posisi' // Menyediakan judul kolom
        },
        {
            data: 'tanggal',
            render: function (data) {
                // Memastikan data tidak kosong sebelum di-format
                if (data) {
                    var parts = data.split('-'); // Misal format API: yyyy-mm-dd
                    var day = parts[2];
                    var month = parts[1];
                    var year = parts[0];

                    return day + '-' + month + '-' + year; // Mengembalikan format dd-mm-yyyy
                }
                return data; // Kembali ke data asli jika kosong
            },
            title: 'Tanggal Izin'
        },
        {
            data: 'namaAtasan',
            title: 'Nama Atasan' // Menyediakan judul kolom
        },
        {
            data: 'statusApprove',
            title: 'Status', // Menyediakan judul kolom
            render: function (data, type, row) {
                if (row.statusApprove == 0) {
                    return '<span class="badge rounded-pill font-medium fw-bolder bg-warning bg-opacity-25 text-warning">Menunggu</span>';
                } else if (row.statusApprove == 1) {
                    return '<span class="badge rounded-pill font-medium fw-bolder bg-success bg-opacity-25 text-success">Disetujui</span>';
                } else if (row.statusApprove == 2) {
                    return '<span class="badge rounded-pill font-medium fw-bolder bg-danger bg-opacity-25 text-danger">Ditolak</span>';
                } else if (row.statusApprove == 3) {
                    return '<span class="badge rounded-pill font-medium fw-bolder bg-dark bg-opacity-25 text-dark">Batal</span>';
                }
            }
        },
        {
            data: 'action', // Kolom action untuk tombol Edit dan Delete
            orderable: false, // Kolom ini tidak diurutkan
            searchable: false, // Tidak perlu pencarian untuk kolom ini
            title: 'Aksi' // Menyediakan judul kolom
        }
    ],
    order: [[2, 'desc']], // Urut berdasarkan kolom tanggal
    searching: false, // Menonaktifkan pencarian
    lengthChange: false, // Menonaktifkan perubahan jumlah tampilan
    scrollX: false,
    autoWidth: false
});
// END LIST PPROVAL IZIN VIEW ATASAN


// FUNGSI UNTUK MENGHITUNG JUMLAH ROW DATATABLES
function hitungJumlahRow() {
    var jumlahRow = $('#izin-pengajuan-datatables').DataTable().page.info().recordsDisplay;
    $('#jumlahRow').html(jumlahRow);
}

// CALL FUNCTION SETelah DATATABLES DIRENDER
$('#izin-pengajuan-datatables').on('draw.dt', function () {
    hitungJumlahRow();
});
// SCRIPT START SHOW MODAL IZIN DETAIL DI ATASAN
$(document).on('click', '#btnShowModalTanggapi', function () {
    var idIzinPulang = $(this).data('id'); // Ambil idIzinPulang dari data-id
    // idIzinPulang = idIzinPulang.replace(/\+/g, '%2B');
    id_izin = idIzinPulang.replace(/\+/g, '%2B');
    $('#inputId').val(idIzinPulang);
    // console.log(idIzinPulang);
    $.ajax({
        url: '/time-management/izin/show_tanggapi?id=' + encodeURIComponent(id_izin),
        type: 'GET',
        success: function (data) {
            // console.log(data); // Mencetak seluruh objek data ke konsol
            const items = data.data.data;
            let content = '';
            function formatDate(dateString) {
                let date = new Date(dateString);
                // Array untuk nama bulan singkat
                const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                let day = ('0' + date.getDate()).slice(-2);
                let month = monthNames[date.getMonth()]; // Ambil nama bulan dari array
                let year = date.getFullYear();

                return day + '-' + month + '-' + year;
            }

            function formatDateString(dateString) {
                let date = new Date(dateString);
                // Array untuk nama bulan singkat
                const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

                let day = ('0' + date.getDate()).slice(-2);
                let month = monthNames[date.getMonth()]; // Ambil nama bulan dari array
                let year = date.getFullYear();

                return day + '-' + month + '-' + year;
            }        // Looping data dan membuat elemen HTML untuk ditampilkan di modal
            items.forEach(item => {
                let timeParts = item.jam.split(':'); // Pisahkan berdasarkan ":"
                let formattedTime = timeParts[0] + ':' + timeParts[1]; // Gabungkan kembali hanya jam dan menit
                let hourParts = item.jumlahJam.split(':'); // Pisahkan berdasarkan ":"
                let formattedHour = parseInt(hourParts[0], 10); // Ambil bagian jam dan ubah ke integer
                $('#nippPegawaiTanggapi').html(item.nippPegawai); // Tampilkan telepon
                $('#namaPegawaiTanggapi').html(item.namaPegawai); // Tampilkan telepon
                $('#posisiPegawai').html(item.posisiPegawai); // Tampilkan telepon
                $('#namaAtasanTanggapi').html(item
                    .namaAtasan); // Tampilkan hasil looping di modal
                $('#namaAtasTanggapi').html(item
                    .namaAtasan); // Tampilkan hasil looping di modal
                $('#nippAtasanTanggapi').html(item
                    .nippAtasan); // Tampilkan hasil looping di modal
                // Ubah statusApprove menjadi badge
                let statusBadgeTanggapi = '';
                if (item.statusApprove == 0) {
                    statusBadgeTanggapi =
                        '<span class="badge rounded-pill font-medium fw-bolder bg-warning bg-opacity-25 text-warning">Menunggu</span>';
                } else if (item.statusApprove == 1) {
                    statusBadgeTanggapi =
                        '<span class="badge rounded-pill font-medium fw-bolder bg-success bg-opacity-25 text-success">Disetujui</span>';
                } else if (item.statusApprove == 2) {
                    statusBadgeTanggapi =
                        '<span class="badge rounded-pill font-medium fw-bolder bg-danger bg-opacity-25 text-danger">Ditolak</span>';
                } else if (item.statusApprove == 3) {
                    statusBadgeTanggapi =
                        '<span class="badge rounded-pill font-medium fw-bolder bg-dark bg-opacity-25 text-dark">Batal</span>';
                }
                $('#statusIzinTanggapi').html(
                    statusBadgeTanggapi); // Tampilkan status persetujuan di modal
                $('#ketIzinTanggapi').html(item.statusApproveDesc); // Tampilkan status persetujuan di modal
                $('#tipeIzinTanggapi').html(item.tipeIzinDesc); // Tampilkan tipe izin
                // Ubah format tanggal menjadi dd-mm-yyyy
                let formattedTanggal = formatDate(item.tanggal);
                $('#tanggalTanggapi').html(formattedTanggal); // Tampilkan tanggal izin
                $('#jumlahJamTanggapi').html(formattedHour + ' jam'); // Tampilkan jumlah jam izin
                $('#jamTanggapi').html(item.jam); // Tampilkan jam izin
                $('#jamIzinTanggapi').html(formattedTime); // Tampilkan jam izin
                $('#alasanTanggapi').html(item.alasan); // Tampilkan alasan izin
                $('#teleponTanggapi').html(item.telepon); // Tampilkan telepon
                let formattedCreatedAt = formatDateString(item.createdAt);
                $('#createIzinTanggapi').html(formattedCreatedAt); // Tampilkan tanggal dibuat                $('#idizin').html(idIzinPulang); // Tampilkan tanggal dibuat
                $('#teleponTanggapi').html(item.telepon); // Tampilkan telepon
            });
            // Tampilkan modal
            $('#ModalTanggapi').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Terjadi kesalahan: ' + errorThrown); // Tangani error
        }
    });
});
// SCRIPT START SHOW MODAL IZIN DETAIL DI ATASAN

// SCRIPT START DETAIL YANG UDAH DI SETUJUI
$(document).on('click', '#btnShowModalDetail', function () {
    var idIzinPulang = $(this).data('id'); // Ambil idIzinPulang dari data-id
    // idIzinPulang = idIzinPulang.replace(/\+/g, '%2B');
    id_izin = idIzinPulang.replace(/\+/g, '%2B');
    $('#input_id').val(idIzinPulang);
    // console.log(idIzinPulang);
    $.ajax({
        url: '/time-management/izin/show_approvaldetail?id=' + encodeURIComponent(id_izin),
        type: 'GET',
        success: function (data) {
            console.log(data); // Mencetak seluruh objek data ke konsol
            const items = data.data.data;
            let content = '';
            function formatDate(dateString) {
                let date = new Date(dateString);
                // Array untuk nama bulan singkat
                const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                let day = ('0' + date.getDate()).slice(-2);
                let month = monthNames[date.getMonth()]; // Ambil nama bulan dari array
                let year = date.getFullYear();

                return day + '-' + month + '-' + year;
            }

            function formatDateString(dateString) {
                let date = new Date(dateString);
                // Array untuk nama bulan singkat
                const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

                let day = ('0' + date.getDate()).slice(-2);
                let month = monthNames[date.getMonth()]; // Ambil nama bulan dari array
                let year = date.getFullYear();

                return day + '-' + month + '-' + year;
            }             // Looping data dan membuat elemen HTML untuk ditampilkan di modal
            items.forEach(item => {
                let timeParts = item.jam.split(':'); // Pisahkan berdasarkan ":"
                let formattedTime = timeParts[0] + ':' + timeParts[1]; // Gabungkan kembali hanya jam dan menit
                let hourParts = item.jumlahJam.split(':'); // Pisahkan berdasarkan ":"
                let formattedHour = parseInt(hourParts[0], 10); // Ambil bagian jam dan ubah ke integer
                $('#nippPegawaii').html(item.nippPegawai); // Tampilkan telepon
                $('#namaPegawaii').html(item.namaPegawai); // Tampilkan telepon
                $('#posisiPegawaii').html(item.posisiPegawai); // Tampilkan telepon
                $('#namaAtasann').html(item
                    .namaAtasan); // Tampilkan hasil looping di modal
                $('#namaAtasn').html(item
                    .namaAtasan); // Tampilkan hasil looping di modal
                $('#nippAtasann').html(item
                    .nippAtasan); // Tampilkan hasil looping di modal
                // Ubah statusApprove menjadi badge
                let statusBadge = '';
                if (item.statusApprove == 0) {
                    statusBadge =
                        '<span class="badge rounded-pill font-medium fw-bolder bg-warning bg-opacity-25 text-warning">Menunggu</span>';
                } else if (item.statusApprove == 1) {
                    statusBadge =
                        '<span class="badge rounded-pill font-medium fw-bolder bg-success bg-opacity-25 text-success">Disetujui</span>';
                } else if (item.statusApprove == 2) {
                    statusBadge =
                        '<span class="badge rounded-pill font-medium fw-bolder bg-danger bg-opacity-25 text-danger">Ditolak</span>';
                } else if (item.statusApprove == 3) {
                    statusBadge =
                        '<span class="badge rounded-pill font-medium fw-bolder bg-dark bg-opacity-25 text-dark">Batal</span>';
                }
                $('#statusIzinn').html(
                    statusBadge); // Tampilkan status persetujuan di modal
                $('#ketIzinn').html(item.statusApproveDesc); // Tampilkan status persetujuan di modal
                $('#tipeIzinn').html(item.tipeIzinDesc); // Tampilkan tipe izin
                // Ubah format tanggal menjadi dd-mm-yyyy
                let formattedTanggal = formatDate(item.tanggal);
                $('#tanggall').html(formattedTanggal); // Tampilkan tanggal izin
                $('#jumlahJamm').html(formattedHour + ' jam'); // Tampilkan jumlah jam izin
                $('#jamm').html(item.jam); // Tampilkan jam izin
                $('#jamIzinn').html(formattedTime); // Tampilkan jam izin
                $('#alasann').html(item.alasan); // Tampilkan alasan izin
                $('#teleponn').html(item.telepon); // Tampilkan telepon
                let formattedCreatedAt = formatDateString(item.createdAt);
                $('#createIzinn').html(formattedCreatedAt); // Tampilkan tanggal dibuat
                $('#idizinn').html(idIzinPulang); // Tampilkan tanggal dibuat
                $('#teleponn').html(item.telepon); // Tampilkan telepon
                let statusIzinApprove = '';
                if (item.statusApprove == 1) {
                    statusIzinApprove = `
                    <div class="mt-3">
                    </div>`;
                } else if (item.statusApprove == 2) {
                    statusIzinApprove = `
                    <div class="mt-2">
                        <div class="text-grey mb-2" style="padding-left: 2.2%">
                            Alasan Pengajuan Ditolak
                        </div>
                        <div class="p-3 m-2 d-flex flex-column align-items-stretch h-100"
                            style="background-color: #F9F9F9">
                            <div class="mb-3">
                                <span class="text-dark">
                                    ${item.keterangan}
                                </span>
                            </div>
                            <div class="text-grey">
                                -&nbsp; <span class="fs-2">${item.namaAtasan}</span>
                            </div>
                        </div>
                    </div>`;
                }
                // Mengganti isi HTML dengan variabel yang benar
                $('#statusApprove').html(statusIzinApprove);
            });
            // Tampilkan modal
            $('#ModalApprovalDetail').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Terjadi kesalahan: ' + errorThrown); // Tangani error
        }
    });
});
// SCRIPT END DETAIL YANG UDAH DI SETUJUI

// SCRIPT START TOLAK PENGAJUAN DINAS
$(document).on('click', '#sa-tolakTanggapi', function () {
    $('#ModalTanggapi').modal('hide');
    $('#modalSaTolakAtasan').modal('show');
    $('#alasanTolakAtasan').val(''); // Reset nilai textarea dengan id "alasanTolak"
});
reConfirm: () => {
    const alasan = document.getElementById('alasanTolakAtasan').value.trim();
    if (!alasan) {
        Swal.showValidationMessage('Alasan pembatalan wajib diisi!');
        return false;  // Menghentikan eksekusi jika alasan kosong
    }
    return alasan;
}
$("#atasan-tolak-yes").click(function () {
    var idIzinPulang = $('#inputId').val();
    var alasanDitolak = $('#alasanTolakAtasan').val().trim();
    var statusApprove = 2;


    // Validasi apakah alasan kosong
    if (!alasanDitolak) {
        Swal.fire({
            title: 'Error!',
            text: 'Alasan pembatalan wajib diisi!',
            icon: 'error',
            confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'w-100' // Menambahkan kelas w-100 agar tombol penuh
            }
        });
        return; // Menghentikan eksekusi jika alasan kosong
    }

    // Melanjutkan ke proses AJAX jika validasi berhasil
    $.ajax({
        url: '/time-management/izin/submit_tanggapi',
        type: 'POST',
        data: {
            id: idIzinPulang,
            alasan: alasanDitolak,
            status: statusApprove,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            Swal.fire({
                title: response.message,
                html: '<span style="color: #818181;">Harap cek lanjut status pengajuan formulir izin melalui dashboard halaman izin</span>',
                icon: 'success',
                confirmButtonText: 'Lihat Status',
                cancelButtonText: 'Ke Halaman Pengajuan Izin',
                showCancelButton: true,
                imageWidth: 100,
                imageHeight: 100,
                customClass: {
                    actions: 'my-actions',
                    confirmButton: 'lihat-status',
                    cancelButton: 'ke-hal-izin'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(() => {
                        window.location.href = '/time-management/izin/index';
                    }, 200);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    setTimeout(() => {
                        window.location.href = '/time-management/izin/create';
                    }, 200);
                }
            });

            $('#modalDetailIzin').modal('hide');
            $('#izin-datatables-atasan').DataTable().ajax.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Terjadi kesalahan: ' + errorThrown);
        }
    });
});
// SCRIPT END TOLAK PENGAJUAN DINAS

// SCRIPT START SETUJU PENGAJUAN DINAS
$("#sa-atasan-yes").click(function () {
    var idIzinPulang = $('#inputId').val();
    var statusApprove = 1;
    // Melanjutkan ke proses AJAX jika validasi berhasil
    $.ajax({
        url: '/time-management/izin/submit_tanggapi',
        type: 'POST',
        data: {
            id: idIzinPulang,
            status: statusApprove,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            Swal.fire({
                title: response.message,
                html: '<span style="color: #818181;">Harap cek lanjut status pengajuan formulir izin melalui dashboard halaman izin</span>',
                icon: 'success',
                confirmButtonText: 'Lihat Status',
                cancelButtonText: 'Ke Halaman Pengajuan Izin',
                showCancelButton: true,
                imageWidth: 100,
                imageHeight: 100,
                customClass: {
                    actions: 'my-actions',
                    confirmButton: 'lihat-status',
                    cancelButton: 'ke-hal-izin'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(() => {
                        window.location.href = '/time-management/izin/index';
                    }, 200);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    setTimeout(() => {
                        window.location.href = '/time-management/izin/create';
                    }, 200);
                }
            });

            $('#modalDetailIzin').modal('hide');
            $('#izin-datatables-atasan').DataTable().ajax.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Terjadi kesalahan: ' + errorThrown);
        }
    });
});
// SCRIPT END SETUJU PENGAJUAN DINAS
