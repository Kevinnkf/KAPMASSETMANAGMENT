<div class="row align-items-center">
    {{-- searching --}}
    <div class="row mb-4 mx-0 gap-3">
        <div class="col-lg-1 px-0">
            <select class="select2 form-select" id="dropdown_year_sudah_dinilai">
                <option value="">Tahun</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
            </select>
        </div>
    </div>

    {{-- datatable --}}
    <div class="card-datatable table-responsive">
        <table id="table-asesmen-multirater-360-harus-dinilai" aria-label="table-asesmen-multirater-360-harus-dinilai"
            class="datatables-basic table table-light border table-bordered text-nowrap" style="width: 100%;">
            <thead class="text-dark fs-4">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">NIPP</th>
                    <th class="text-center">Nama Pekerja</th>
                    <th class="text-center">Posisi</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Skor Akhir</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
    {{-- end datatable --}}
</div>
