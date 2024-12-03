// START SCRIPT DATATABLES BAWAHAN
if ($.fn.dataTable.isDataTable('#dinas-datatables')) {
    $('#dinas-datatables').DataTable().destroy();
}
var table = $('#dinas-datatables').DataTable({
    processing: true,
    serverSide: true,
    // ajax: 'getHistoryDinas',
    ajax: {
        url: 'getHistoryDinas', // URL yang memanggil fungsi getPengajuanDinas
        dataSrc: 'data',
        error: function (xhr, status, error) {
            Swal.fire({
                title: 'Error!',
                text: 'Terjadi kesalahan saat mengambil data Dinas',
                // icon: 'error',
                confirmButtonText: 'OK',
                width: '35%', // Atur lebar SweetAlert
                didOpen: () => {
                    // Menargetkan tombol konfirmasi dan mengatur gaya inline
                    const confirmButton = Swal.getConfirmButton();
                    confirmButton.style.width = '100%';
                    confirmButton.style.padding = '10px 0';
                    confirmButton.style.textAlign = 'center';

                }
            });
        }
    },
    columns: [
        {
            data: 'DT_RowIndex',
            title: 'No',
            orderable: false // Kolom ini tidak diurutkan
        },
        {
            data: 'jenisDinas',
            title: 'Jenis DInas'
        },
        {
            data: 'alamat',
            title: 'Tujuan Dinas'
        },
        {
            data: 'tanggalMulai',
            title: 'Tanggal Mulai'
        },
        {
            data: 'tanggalBerakhir',
            title: 'Tanggal Berakhir'
        },
        {
            data: 'jamMulai',
            title: 'Jam Mulai'
        },
        // {
        //     data: 'status',
        //     title: 'Status', // Menyediakan judul kolom
        //     render: function (data, type, row) {
        //         if (row.statusApprove == 0) {
        //             return '<span class="badge rounded-pill font-medium fw-bolder bg-warning bg-opacity-25 text-warning">Menunggu</span>';
        //         } else if (row.statusApprove == 1) {
        //             return '<span class="badge rounded-pill font-medium fw-bolder bg-success bg-opacity-25 text-success">Disetujui</span>';
        //         } else if (row.statusApprove == 2) {
        //             return '<span class="badge rounded-pill font-medium fw-bolder bg-danger bg-opacity-25 text-danger">Ditolak</span>';
        //         } else if (row.statusApprove == 3) {
        //             return '<span class="badge rounded-pill font-medium fw-bolder bg-dark bg-opacity-25 text-dark">Batal</span>';
        //         }
        //     }
        // },
        {
            data: 'action',
            orderable: false,
            searchable: false,
            title: 'Aksi',
            render: function (data, type, row) {
                return `
                    <a id="cetakDinasPribadi" data-id="${row.idDinas}" class="fw-bolder cursor-pointer">Cetak</a>
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
        emptyTable: "Tidak ada data dinas yang tersedia" // Pesan khusus jika tidak ada data
    }
});
// Fungsi untuk memformat tanggal dari 'yyyy-mm-dd' ke 'dd-mm-yyyy'
// function formatDate(data) {
//     var parts = data.split('-'); // Misal format API: yyyy-mm-dd
//     return `${parts[2]}-${parts[1]}-${parts[0]}`; // Mengembalikan format dd-mm-yyyy
// }
// END SCRIPT DATATABLES BAWAHAN

// START SCRIPT DATATABLES ATASAN
if ($.fn.dataTable.isDataTable('#dinas-datatables-atasan')) {
    $('#dinas-datatables-atasan').DataTable().destroy();
}
var table = $('#dinas-datatables-atasan').DataTable({
    processing: true,
    serverSide: true,
    // ajax: 'getHistoryDinasAtasan',
    ajax: {
        url: 'getHistoryDinasAtasan', // URL yang memanggil fungsi getPengajuanDinas
        dataSrc: 'data',
        error: function (xhr, status, error) {
            Swal.fire({
                title: 'Error!',
                text: 'Terjadi kesalahan saat mengambil data Dinas',
                // icon: 'error',
                confirmButtonText: 'OK',
                width: '35%', // Atur lebar SweetAlert
                didOpen: () => {
                    // Menargetkan tombol konfirmasi dan mengatur gaya inline
                    const confirmButton = Swal.getConfirmButton();
                    confirmButton.style.width = '100%';
                    confirmButton.style.padding = '10px 0';
                    confirmButton.style.textAlign = 'center';

                }
            });
        }
    },
    columns: [
        {
            data: 'DT_RowIndex',
            title: 'No',
            orderable: false // Kolom ini tidak diurutkan
        },
        {
            data: 'jenisDinas',
            title: 'Jenis DInas'
        },
        {
            data: 'alamat',
            title: 'Tujuan Dinas'
        },
        {
            data: 'tanggalMulai',
            title: 'Tanggal Mulai'
        },
        {
            data: 'tanggalBerakhir',
            title: 'Tanggal Berakhir'
        },
        {
            data: 'jamMulai',
            title: 'Jam Mulai'
        },
        // {
        //     data: 'status',
        //     title: 'Status', // Menyediakan judul kolom
        //     render: function (data, type, row) {
        //         if (row.statusApprove == 0) {
        //             return '<span class="badge rounded-pill font-medium fw-bolder bg-warning bg-opacity-25 text-warning">Menunggu</span>';
        //         } else if (row.statusApprove == 1) {
        //             return '<span class="badge rounded-pill font-medium fw-bolder bg-success bg-opacity-25 text-success">Disetujui</span>';
        //         } else if (row.statusApprove == 2) {
        //             return '<span class="badge rounded-pill font-medium fw-bolder bg-danger bg-opacity-25 text-danger">Ditolak</span>';
        //         } else if (row.statusApprove == 3) {
        //             return '<span class="badge rounded-pill font-medium fw-bolder bg-dark bg-opacity-25 text-dark">Batal</span>';
        //         }
        //     }
        // },
        {
            data: 'action',
            orderable: false,
            searchable: false,
            title: 'Aksi',
            render: function (data, type, row) {
                return `
                <a id="cetakDinasPribadi" data-id="${row.idDinas}" class="fw-bolder cursor-pointer">Cetak</a>
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
        emptyTable: "Tidak ada data dinas yang tersedia" // Pesan khusus jika tidak ada data
    }
});
// END SCRIPT DATATABLES ATASAN

// START LIST PENGAJUAN DINAS VIEW ATASAN
if ($.fn.dataTable.isDataTable('#dinas-pengajuan-datatables')) {
    $('#dinas-pengajuan-datatables').DataTable().destroy();
}
var table = $('#dinas-pengajuan-datatables').DataTable({
    processing: true,
    serverSide: true,
    scrollX: false, // Mengaktifkan scroll horizontal
    autoWidth: false, // Mencegah DataTables mengatur lebar kolom secara
    ajax: {
        url: 'getPengajuanDinas', // URL yang memanggil fungsi getPengajuanDinas
        dataSrc: 'data',
        error: function (xhr, status, error) {
            Swal.fire({
                title: 'Error!',
                text: 'Terjadi kesalahan saat mengambil data Dinas',
                // icon: 'error',
                confirmButtonText: 'OK',
                width: '35%', // Atur lebar SweetAlert
                didOpen: () => {
                    // Menargetkan tombol konfirmasi dan mengatur gaya inline
                    const confirmButton = Swal.getConfirmButton();
                    confirmButton.style.width = '100%';
                    confirmButton.style.padding = '10px 0';
                    confirmButton.style.textAlign = 'center';

                }
            });
        }
    },
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
            data: 'jenisDinas',
            title: 'Jenis DIinas' // Menyediakan judul kolom
        },
        {
            data: 'alamat',
            title: 'Tujuan Dinas' // Menyediakan judul kolom
        },
        // {
        //     data: 'tanggalMulai',
        //     title: 'Tanggal Mulai'
        // },
        // {
        //     data: 'tanggalBerakhir',
        //     title: 'Tanggal Berakhir'

        // },
        // {
        //     data: 'jamMulai',
        //     title: 'Jam Mulai' // Menyediakan judul kolom
        // },
        // {
        //     data: 'jamBerakhir',
        //     title: 'Jam Berakhir' // Menyediakan judul kolom
        // },
        // {
        //     data: 'jumlahHari',
        //     title: 'Lama Dinas', // Menyediakan judul kolom
        //     render: function (data, type, row) {
        //         return data + ' Hari';
        //     }
        // },
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
    language: {
        emptyTable: "Tidak ada data dinas yang tersedia" // Pesan khusus jika tidak ada data
    }
});
// END LIST PENGAJUAN DINAS VIEW ATASAN


// SCRIPT START SHOW MODAL DINAS DETAIL DI ATASAN
$(document).on('click', '#btnShowModalTanggapiDinas', function () {
    var idDinas = $(this).data('id'); // Ambil idIzinPulang dari data-id
    // idIzinPulang = idIzinPulang.replace(/\+/g, '%2B');
    id_dinas = idDinas.replace(/\+/g, '%2B');
    $('#inputId').val(idDinas);
    // console.log(idIzinPulang);
    $.ajax({
        url: '/time-management/dinas/show_tanggapi_dinas?id=' + encodeURIComponent(id_dinas),
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

                return day + ' ' + month + ' ' + year;
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
                let timeParts = item.jamMulai.split(':'); // Pisahkan berdasarkan ":"
                let formattedTime = timeParts[0] + ':' + timeParts[1]; // Gabungkan kembali hanya jam dan menit
                let hourParts = item.jumlahJam.split(':'); // Pisahkan berdasarkan ":"
                let formattedHour = parseInt(hourParts[0], 10); // Ambil bagian jam dan ubah ke integer
                $('#nippPegawaiTanggapi').html(item.nippPegawai); // Tampilkan telepon
                $('#namaPegawaiTanggapi').html(item.namaPegawai); // Tampilkan telepon
                $('#posisiPegawai').html(item.posisiPegawai); // Tampilkan telepon
                $('#tanggalMulaiDinas').html(formatDate(item.tanggalMulai)); // Format dan tampilkan tanggal mulai
                $('#tanggalAkhirDinas').html(formatDate(item.tanggalBerakhir)); // Format dan tampilkan tanggal berakhir
                $('#tujuanDinas').html(item.alamat); // Tampilkan telepon
                $('#jumlahHari').html(item.jumlahHari); // Tampilkan telepon
                $('#telepon').html(item.telepon); // Tampilkan telepon
                $('#unitPegawai').html(item.unitPegawai); // Tampilkan telepon
                $('#nippAtasanTanggapi').html(item
                    .nippAtasan); // Tampilkan hasil looping di modal
                $('#namaAtasTanggapi').html(item
                    .namaAtasan); // Tampilkan hasil looping di modal
                $('#posisiAtasanTanggapi').html(item
                    .posisiAtasan); // Tampilkan hasil looping di modal
                $('#emailAtasanTanggapi').html(item
                    .emailAtasan); // Tampilkan hasil looping di modal
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
                $('#statusDinasTanggapi').html(
                    statusBadgeTanggapi); // Tampilkan status persetujuan di modal
                $('#ketDinasTanggapi').html(item.statusApproveDesc); // Tampilkan status persetujuan di modal
                $('#tipeDinasTanggapi').html(item.jenisDinas); // Tampilkan tipe izin
                // Ubah format tanggal menjadi dd-mm-yyyy
                // let formattedTanggal = formatDate(item.tanggal);
                // $('#tanggalTanggapi').html(formattedTanggal); // Tampilkan tanggal izin
                // $('#jumlahJamTanggapi').html(formattedHour + ' jam'); // Tampilkan jumlah jam izin
                // $('#jamTanggapi').html(item.jam); // Tampilkan jam izin
                $('#jamDinasTanggapi').html(formattedTime); // Tampilkan jam izin
                // $('#alasanTanggapi').html(item.alasan); // Tampilkan alasan izin
                // $('#teleponTanggapi').html(item.telepon); // Tampilkan telepon
                let formattedCreatedAt = formatDateString(item.createdAt);
                $('#createDinasTanggapi').html(formattedCreatedAt); // Tamp
                //  $('#idizin').html(idIzinPulang); // Tampilkan tanggal dibuat
                // $('#teleponTanggapi').html(item.telepon); // Tampilkan telepon
            });
            // Tampilkan modal
            $('#modal-tanggapi').modal('show');
            console.log('Modal is about to be shown');

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Terjadi kesalahan: ' + errorThrown); // Tangani error
        }
    });
});
// SCRIPT START SHOW MODAL DINAS DETAIL DI ATASAN


// SCRIPT START SETUJU PENGAJUAN DINAS
$("#dinas-setuju").click(function () {
    var idDinas = $('#inputId').val();
    var statusApprove = 1;
    // Melanjutkan ke proses AJAX jika validasi berhasil
    $.ajax({
        url: '/time-management/dinas/submit_tanggapi',
        type: 'POST',
        data: {
            id: idDinas,
            status: statusApprove,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            Swal.fire({
                title: response.message,
                html: '<span style="color: #818181;">Harap cek lanjut status pengajuan formulir dinas melalui dashboard halaman dinas</span>',
                icon: 'success',
                confirmButtonText: 'Lihat Status',
                cancelButtonText: 'Ke Halaman Pengajuan Dinas',
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
                        window.location.href = '/time-management/dinas/index';
                    }, 200);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    setTimeout(() => {
                        window.location.href = '/time-management/dinas/create';
                    }, 200);
                }
            });

            $('#modal-tanggapi').modal('hide');
            $('#dinas-pengajuan-datatables').DataTable().ajax.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Terjadi kesalahan: ' + errorThrown);
        }
    });
});
// SCRIPT END SETUJU PENGAJUAN DINAS

// START FUNCTION CETAK
$(document).ready(function () {
    $(document).on('click', '#cetakDinasPribadi', function () {
        var idDinas = $(this).data('id'); // Mengambil ID dari elemen yang di-klik
        var id = idDinas.replace(/\+/g, '%2B');
        $.ajax({
            url: '/time-management/dinas/cetakDinas', // Jangan tambahkan id di URL di sini
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
                link.download = "dinas-pdf.pdf"; // Menggunakan nama file yang sesuai
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
