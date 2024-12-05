<div class="py-3">
    <div class="esa-header">
        <div class="esa-header-dark">Software</div>
    </div>
</div>

<div class="row">
    <div class="col-md-12" >
        <div class="card" style="background:none">
            <div class="card-body">
                <!-- Data Pegawai -->
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="esa-title">Software Installed</h4>
                    </div>
                    <div>
                        <a href="{{ route('transaction.software.create', ['assetcode' => $assetcode]) }}" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn">
                            Add Software
                        </a>
                    </div>
                </div>

            {{-- <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300" onclick="window.location.href='{{ route('transaction.edit',[
                'assetcategory' => $assetcategory, 
                'assetcode' => $assetcode,
                'idassetspec' => $idassetspec
                ])}}'">
                Update Asset
            </button> --}}

            <div class="card-datatable table-responsive">
                <table id="software" class="table table-striped display nowrap esa-table-light">
                    <thead>
                        <!-- start row -->
                        <tr>
                            <th>ID</th>
                            <th>Kode Aset</th>
                            <th>Tipe</th>
                            <th>Kategori</th>
                            <th>Nama</th>
                            <th>Lisensi</th>
                            <th>Aktif</th>
                        </tr>
                        <!-- end row -->
                    </thead>
                    <tbody id="table-master">
                        @if(empty($detailSoftwareData))
                                <tr>
                                    <td colspan="7" class="text-center"><h5>No data for this table</h5></td>
                                </tr>
                        @else
                        @foreach($detailSoftwareData as $software)
                        <tr>
                            <td>{{ $software['idassetsoftware'] }}</td>
                            <td>{{  $software['assetcode'] }}</td>
                            <td>{{  $software['softwaretype'] }}</td>
                            <td>{{  $software['softwarecategory'] }}</td>
                            <td>{{  $software['softwarename'] }}</td>
                            <td>{{  $software['softwarelicense'] }}</td>
                            <td>{{  $software['active'] }}</td>
                            <td class="action-buttons">
                                <button class="btn mb-1 waves-effect waves-light btn-outline-danger esa-btn">Delete</button>
                                <button class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn" style="height:36px" onclick="openEditModal({{ json_encode($software) }})">Update</button>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>