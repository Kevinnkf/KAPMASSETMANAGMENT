@extends('layouts.app')

@section('content')
    {{-- Breadcrumb --}}
    @include('kepegawaian.asesmen-pekerja.asesmen-multirater-360.breadcrumb')
    {{-- End Breadcrumb --}}

    <div class="row">
        <!-- First Column (8/12) -->
        <div class="col">
            <div class="card" style="background:none">
                <div class="card-body">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="esa-title">Maintenance History</h4>
                        </div>
                        <div>
                            
                        </div>
                    </div>
                    <div class="card-datatable table-responsive">
                        <table id="maintenance" class="table table-striped display nowrap esa-table-light">
                            <thead>
                                <tr>
                                    {{-- <th>ID</th> --}}
                                    <th>Kode Aset</th>
                                    <th>Suku Cadang</th>
                                    <th>Catatan Perbaikan</th>
                                    <th>Hasil Perbaikan</th>
                                    <th>Tanggal Perbaikan</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody id="table-master">
                                @if(empty($maintenanceData))
                                    <tr>
                                        <td colspan="12" class="text-center"><h5>No data for this table</h5></td>
                                    </tr>
                                @else
                                    @foreach($maintenanceData as $maintenance)
                                        <tr>
                                            {{-- <td>{{ $maintenance['maintenanceid'] }}</td> --}}
                                            <td>{{ $maintenance['assetcode'] }}</td>
                                            <td>{{ $maintenance['notessparepart'] }}</td>
                                            <td>{{ $maintenance['notesaction'] }}</td>
                                            <td>{{ $maintenance['notesresult'] }}</td>
                                            <td>{{ $maintenance['dateadded'] }}</td>
                                            <td>{{ $maintenance['picadded'] }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dinas').DataTable({
                "lengthChange": false,
                "searching": false
            });
        });
    </script>
@endsection
