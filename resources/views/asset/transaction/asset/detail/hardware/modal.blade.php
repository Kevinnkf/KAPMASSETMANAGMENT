<div class="modal fade" id="showModalPortalSistem" aria-hidden="true" aria-labelledby="showModalPortalSistemLabel" tabindex="-1">
    <div class="modal-dialog modal-l modal-dialog-centered">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            @if (session('success'))
                                <h3 class="text-success">{{ session('success') }}</h3>
                            @endif
                            <form action="{{ route('transaction.maintenance.store', ['assetcode' => $assetcode]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
        
                            <form action="{{ route('transaction.software.store', ['assetcode' => $assetcode]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <!-- Data Pegawai -->
                            <h4 class="esa-title">Software Fields</h4>
        
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="assetcode" class="form-label esa-label">Kode Aset</label>
                                    <input type="text" class="form-control @error('assetcode') is-invalid @enderror" id="assetcode" name="assetcode" value="{{ $assetcode }}" placeholder="{{ $assetcode }}" required readonly>
                                    @error('assetcode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="softwaretype" class="form-label esa-label">Tipe</label>
                                    <select id="softwaretype" class="form-control" name="softwaretype"  @error('softwaretype') is-invalid @enderror" required>
                                        <option value="" disabled selected>Select Software Type</option>
                                        @foreach ($assetSpecData as $mst)
                                            @if ($mst['assetcode'])
                                                <option value="{{ $mst['assetcode'] }}" {{ old('softwaretype') == $mst['assetcode'] ? 'selected' : '' }}>
                                                    {{ $mst['assetcode'] }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    
                                    @error('softwaretype')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
        
                            <!-- Tombol Aksi -->
                            <div class="button-group">
                                <button type="button" class="btn btn-outline-muted esa-btn-lg" onclick="window.location='{{ route('transaction.asset.laptop', ['assetcode' => $assetcode]) }}'">Kembali</button>
                                <button type="submit" class="btn btn-primary esa-btn-lg">Submit</button>
                            </div>
        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>