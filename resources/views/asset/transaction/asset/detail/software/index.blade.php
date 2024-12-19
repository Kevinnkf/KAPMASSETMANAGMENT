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
                    @if ($data['unit'] === 'Teknologi Informasi')
                    <div>
                        <a href="{{ route('transaction.software.create', ['assetcode' => $assetcode]) }}" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn">
                            Add Software
                        </a>
                    </div>
                    @endif
                </div>

            {{-- <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300" onclick="window.location.href='{{ route('transaction.edit',[
                'assetcategory' => $assetcategory, 
                'assetcode' => $assetcode,
                'idassetspec' => $idassetspec
                ])}}'">
                Update Asset
            </button> --}}

            <div class="card-datatable table-responsive px-4 py-6">
                <table id="software" class="table table-striped display nowrap esa-table-light">
                    <thead>
                        <!-- start row -->
                        <tr>
                            {{-- <th>ID</th> --}}
                            <th>Kode Aset</th>
                            <th>Tipe</th>
                            <th>Kategori</th>
                            <th>Nama</th>
                            <th>Lisensi</th>
                            @if ($data['unit'] === 'Teknologi Informasi')
                            <th>Aktif</th>
                            @endif
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
                            {{-- <td>{{ $software['idassetsoftware'] }}</td> --}}
                            <td>{{  $software['assetcode'] }}</td>
                            <td>{{  $software['softwaretype'] }}</td>
                            <td>{{  $software['softwarecategory'] }}</td>
                            <td>{{  $software['softwarename'] }}</td>
                            <td>{{  $software['softwarelicense'] }}</td>
                            @if ($data['unit'] === 'Teknologi Informasi')
                            <td>{{  $software['active'] }}</td>
                            <td class="action-buttons">
                                <a href="#modalSoftware" 
                                    data-bs-toggle="modal" 
                                    class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn" 
                                    onclick="openSoftwareModal({{ json_encode($software) }})">
                                    Update
                                </a>
                            @endif
                                {{-- <a href="javascript:void(0);" class="text-blue-500 text-sm font-bold mr-2" onclick="openSoftwareModal({{ json_encode($software) }})">
                                    <i class="fas fa-edit"></i>
                                 </a> --}}
                                 {{-- <div>
                                    <a href="{{ route('transaction.software.edit', ['assetcode' => $assetcode, $software['idassetsoftware']]) }}" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn">
                                        Edit
                                    </a>
                                </div> --}}
                            </td>
                            @include('asset.transaction.asset.detail.software.modal')
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>