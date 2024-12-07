<div class="modal fade" id="modalSoftware" aria-hidden="true" aria-labelledby="showModalSoftware" Software="-1">
    <div class="modal-dialog modal-l modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header px-4 pt-4 pb-2">
                <h5 class="esa-title fs-5 text-primary-kai fw-bolder" id="showModalSoftware">Software Fields</h5>
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
            
                                <form id="softwareUpdateForm" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
            
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="modalID" class="form-label esa-label">ID</label>
                                        <input type="text" class="form-control" id="modalID" name="idassetsoftware" required readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="modalAssetCode" class="form-label esa-label">Kode Aset</label>
                                        <input type="text" class="form-control" id="modalAssetCode" name="assetcode" required readonly>
                                    </div>
                                </div>
            
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="modalSoftwareType" class="form-label esa-label">Tipe</label>
                                        <select id="modalSoftwareType" class="form-control" name="softwaretype" required>
                                            <option value="" disabled selected>Select Software Type</option>
                                            @foreach ($assetMaster as $mst)
                                                @if ($mst['description'])
                                                    <option value="{{ $mst['description'] }}">
                                                        {{ $mst['description'] }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="modalSoftwareCategory" class="form-label esa-label">Kategori</label>
                                        <select id="modalSoftwareCategory" class="form-control" name="softwarecategory" required>
                                            <option value="" disabled selected>Select Software Category</option>
                                            @foreach ($assetMaster as $mst)
                                                @if ($mst['description'])
                                                    <option value="{{ $mst['description'] }}">
                                                        {{ $mst['description'] }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="modalSoftwareName" class="form-label esa-label">Nama</label>
                                        <select id="modalSoftwareName" class="form-control" name="softwarename" required>
                                            <option value="" disabled selected>Select Software Name</option>
                                            @foreach ($assetMaster as $mst)
                                                @if ($mst['description'])
                                                    <option value="{{ $mst['description'] }}">
                                                        {{ $mst['description'] }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="modalSoftwareLicense" class="form-label esa-label">Lisensi</label>
                                        <select id="modalSoftwareLicense" class="form-control" name="softwarelicense" required>
                                            <option value="" disabled selected>Select Software LIcense</option>
                                            @foreach ($assetMaster as $mst)
                                                @if ($mst['description'])
                                                    <option value="{{ $mst['description'] }}">
                                                        {{ $mst['description'] }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="modalSoftwarePeriod" class="form-label esa-label">Periode</label>
                                        <select id="modalSoftwarePeriod" class="form-control" name="softwareperiod" required>
                                            <option value="" disabled selected>Select Software Period</option>
                                            @foreach ($assetMaster as $mst)
                                                @if ($mst['description'])
                                                    <option value="{{ $mst['description'] }}">
                                                        {{ $mst['description'] }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="active" class="form-label esa-label">Active</label>
                                        <select id="active" name="active" class="form-control @error('active') is-invalid @enderror">
                                            <option value="Y">Y</option>  <!-- Represents true -->
                                            <option value="N">N</option>  <!-- Represents false -->
                                        </select>
                                        @error('active')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3" hidden>
                                    <div class="col-md-12">
                                        <label for="picadded" class="form-label esa-label">picadded</label>
                                        <input type="text" class="form-control @error('picadded') is-invalid @enderror" id="picadded" name="picadded" value="{{ $data['nama'] }}" placeholder="Lisensi Software" required>
                                        @error('picadded')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <hr>
            
                                <!-- Tombol Aksi -->
                                <div class="button-group">
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


<script>
    function openSoftwareModal(software) {
        // Populate the modal fields with the software data
        document.getElementById('modalID').value = software.idassetsoftware;
        document.getElementById('modalAssetCode').value = software.assetcode;
        document.getElementById('modalSoftwareType').value = software.softwaretype;
        document.getElementById('modalSoftwareCategory').value = software.softwarecategory;
        document.getElementById('modalSoftwareName').value = software.softwarename;
        document.getElementById('modalSoftwareLicense').value = software.softwarelicense;
        document.getElementById('modalSoftwarePeriod').value = software.softwareperiod;
        document.getElementById('active').value = software.active; 

        // Update the form action
        var assetcode = "{{ $assetcode }}"; // Assuming you have this variable available in your Blade template
        var form = document.getElementById('softwareUpdateForm');
        form.action = "{{ route('transaction.software.update', ['assetcode' => ':assetcode', 'idassetsoftware' => ':idassetsoftware']) }}".replace(':assetcode', assetcode).replace(':idassetsoftware', software.idassetsoftware);
    }


</script>