<div class="row">
    <!-- First Column (8/12) -->
    <div class="col-md-8">
        <div class="card" style="background:none">
            <div class="card-body">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="esa-title">Maintenance History</h4>
                    </div>
                    <div>
                        <a href="{{ route('transaction.maintenance.create', ['assetcode' => $assetcode]) }}" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn">
                            Add History
                        </a>
                    </div>
                </div>
                <div class="card-datatable table-responsive">
                    <table id="maintenance" class="table table-striped display nowrap esa-table-light">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                {{-- <th>Kode Aset</th> --}}
                                <th>Catatan Perbaikan</th>
                                <th>Suku Cadang</th>
                                <th>Hasil Perbaikan</th>
                                <th>Tanggal Perbaikan</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="table-master">
                            @if(empty($historyMaintenanceData))
                                <tr>
                                    <td colspan="7" class="text-center"><h5>No data for this table</h5></td>
                                </tr>
                            @else
                                @foreach($historyMaintenanceData as $maintenance)
                                    <tr>
                                        {{-- <td>{{ $maintenance['maintenanceid'] }}</td> --}}
                                        {{-- <td>{{ $maintenance['assetcode'] }}</td> --}}
                                        <td>{{ $maintenance['notesaction'] }}</td>
                                        <td>{{ $maintenance['notessparepart'] }}</td>
                                        <td>{{ $maintenance['notesresult'] }}</td>
                                        <td>{{ $maintenance['dateadded'] }}</td>
                                        <td>{{ $maintenance['picadded'] }}</td>
                                        <td style="width: 150px">
                                            <button class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn" style="max-width: 100px; white-space: normal; padding: 5px 10px;" 
                                                    onclick="window.location.href='{{ route('transaction.maintenance.print', ['assetcode' => $assetcode, 'idmtc' => $maintenance['maintenanceid']]) }}'">
                                                Print BAP
                                            </button>
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

    @php
        $empNIPP = 'N/A';
        $empName = 'N/A';
        $empPosition = 'N/A';
        $empUnit = 'N/A';        
        
    @endphp

    <!-- Second Column (4/12) -->
    <div class="col-md-4">
        <div class="card" style="background:none">
            <div class="card-body">
                @if(empty($histData))
                    <h4 class="esa-title">Asset History</h4>
                    <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-900"> No data available</h3>
                @else
                <h4 class="esa-title">Asset History</h4>
                <ol class="timeline">
                    @foreach ($histData as $data)
                    <li class="timeline-item mb-4">
                        <div class="d-flex align-items-start">
                            <div class="me-3">
                            </div>
                            <div>
                                <time class="text-muted d-block mb-1">{{ $data['dateadded'] }}</time>
                                <p class="text-muted mb-2 fw-bold">{{ $data['assetcode'] }}</p>
                                <p class="text-muted mb-2 fw-bold">{{ $data['idassethistory'] }}</p>
                                {{-- <p class="text-muted mb-2 fw-bold">{{ $data['status'] }}</p> --}}
                                @if(isset($data['status'] == 'Assigned') && !empty($data['nipp']))
                                    <h5 class="fw-bold">Asset has been assigned to</h5>
                                    @foreach($empData as $emp)
                                        @if($emp['nipp'] == $assetData['nipp'])
                                        <p class="fw-bold">{{ $emp['name'] }}</p>
                                        @endif
                                    @endforeach
                                @else
                                    <h5 class="fw-bold">Unassigned Asset</h5>
                                    <p class="fw-bold">Asset returned to IT</p>
                                    <button class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn" style="width: 100px;" 
                                            onclick="window.location.href='{{ route('transaction.asset.printBast', ['assetcode' => $assetcode, 'idassethistory' => $data['idassethistory']]) }}'">
                                            Print BAST
                                    </button>
                                @endif
                            </div>
                        </div>
                    </li>
                    @endforeach
                    @endif
                </ol>
            </div>
        </div>
    </div>
</div>