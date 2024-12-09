<div class="modal fade" id="modalImage" aria-hidden="true" aria-labelledby="showModalImage" tabindex="-1">
    <div class="modal-dialog modal-l modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header px-4 pt-4 pb-2">
                <h5 class="esa-title fs-5 text-primary-kai fw-bolder" id="showModalImg">Image Fields</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <form action="{{ route('transaction.image.store', ['assetcode' => $assetcode]) }}" id="imageUpdateForm" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate> --}}
                <form id="imageUpdateForm" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="imageID" class="form-label esa-label">ID</label>
                            <input type="text" class="form-control" id="imageID" name="idassetpic" required readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="modalAssetCodeImg" class="form-label esa-label">Kode Aset</label>
                            <input type="text" class="form-control" id="modalAssetCodeImg" name="assetcode" required readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <input 
                            class="form-control @error('assetimage') is-invalid @enderror block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" 
                            aria-describedby="assetimage" 
                            id="assetimage" 
                            name="assetimage" 
                            type="file" 
                            required
                        >
                    </div>

                    <div class="row mb-3" aria-readonly="true">
                        <div class="col-md-12">
                            <label for="picadded" class="form-label esa-label">picadded</label>
                            <input type="text" class="form-control @error('picadded') is-invalid @enderror" id="picadded" name="picadded" value="{{ $data['nama'] }}" placeholder="Lisensi Software" required>
                            @error('picadded')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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


<script>
    function openImgModal(img) {
        // Populate the modal fields with the software data
        document.getElementById('imageID').value = img.idassetpic;
        document.getElementById('modalAssetCodeImg').value = img.assetcode;
        document.getElementById('assetimage').value = img.assetpic;
        document.getElementById('active').value = img.active; 

        // Update the form action
    var assetcode = "{{ $assetcode }}"; // Ensure this variable is available in your Blade template
    var form = document.getElementById('imageUpdateForm');
    // Debugging logs
    console.log("Asset Code:", assetcode);
    console.log("Image ID:", img.idassetpic);
    console.log("Form Action:", form.action);
    
    // Ensure you are using the correct route name
    form.action = "{{ route('transaction.image.update', ['assetcode' => ':assetcode', 'idassetpic' => ':idassetpic']) }}".replace(':assetcode', assetcode).replace(':idassetpic', img.idassetpic);

}


</script>