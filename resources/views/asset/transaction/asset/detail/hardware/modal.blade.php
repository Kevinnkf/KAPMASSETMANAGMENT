<div class="modal fade" id="modalHardware" aria-hidden="true" aria-labelledby="showModalHardware" Hardware="-1">
    <div class="modal-dialog modal-l modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header px-4 pt-4 pb-2">
                <h5 class="esa-title fs-5 text-primary-kai fw-bolder" id="showModalHardware">Hardware Fields</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-content">
                <div class="row justify-center m-2">
                    <div class="col-md-12">
                        <div class="card w-100">
                            <div class="card-body">
                                @if (session('success'))
                                    <h3 class="text-success">{{ session('success') }}</h3>
                                @endif
                                <form action="{{ route('transaction.maintenance.store', ['assetcode' => $assetcode]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf
            
                                <form action="{{ route('transaction.software.store', ['assetcode' => $assetcode]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf
            
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
</div>