<div class="row align-items-center">
    <div class="col-6 pt-4">
        <h5 class="fw-semibold mb-1">Daftar Penilai Anda</h5>
        <p class="mb-4">Daftar pekerja yang akan menilai anda beserta perannya</p>
    </div>
    <div class="col-6">
        <div class="col text-end">
            <button type="button" class="btn btn-primary">
                Setting Penilai Bawahan
            </button>
        </div>
    </div>

    {{-- datatable --}}
    <div class="card-datatable table-responsive">
        <table id="table-asesmen-multirater-360" aria-label="table-asesmen-multirater-360"
            class="datatables-basic table table-light border table-bordered text-nowrap" style="width: 100%;">
            <thead class="text-dark fs-4">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">NIPP</th>
                    <th class="text-center">Nama Pekerja</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
        </table>
    </div>
    {{-- end datatable --}}
</div>
