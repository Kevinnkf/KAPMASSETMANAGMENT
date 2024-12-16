<div class="modal fade" id="modalMaster" aria-hidden="true" aria-labelledby="showModalMaster" Software="-1">
    <div class="modal-dialog modal-l modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header px-4 pt-4 pb-2">
                <h5 class="esa-title fs-5 text-primary-kai fw-bolder" id="showModalMaster">Master Fields</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-content">
                <div class="row justify-center m-2">
                    <div class="col-md-12">
                        <div class="card w-100">
                            <div class="card-body">
                                {{-- @if (session('success'))
                                    <h3 class="text-success">{{ session('success') }}</h3>
                                @endif --}}
            
                                <form id="modalUpdateMasterForm" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
            
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="modalMasterId" class="form-label esa-label">ID</label>
                                        <input type="text" class="form-control" id="modalMasterId" name="masterid" required readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="modalCondition" class="form-label esa-label">Condition</label>
                                        <input type="text" class="form-control" id="modalCondition" name="condition" required readonly>
                                    </div>
                                </div>
            
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="modalNoSr" class="form-label esa-label">No Sr</label>
                                        <input type="text" id="modalNoSr" class="form-control" name="nosr" required></input >
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="modalDescription" class="form-label esa-label">Description</label>
                                        <input type="text" id="modalDescription" class="form-control" name="description" required>
                                        </input>
                                    </div>
                                </div>
                                <div class="row mb-3" id="valueInputGroup">
                                    <div class="col-md-12">
                                        <label for="modalValue" class="form-label esa-label">Value</label>
                                        {{-- <select id="modalValueSelect" name="valuegcm" class="form-control d-none">
                                            <option value="small">Small</option>
                                            <option value="medium">Medium</option>
                                            <option value="large">Large</option>
                                        </select> --}}
                                        <input type="text" id="modalValue" class="form-control" name="valuegcm" required>
                                    </div>
                                </div>
                                
                                {{-- <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const conditionInput = document.getElementById('modalCondition');
                                        const selectInput = document.getElementById('modalValueSelect');
                                        const textInput = document.getElementById('modalValueText');
                                
                                        function toggleInputs() {
                                            const condition = conditionInput.value;
                                            if (condition === 'FILE IMAGE SIZE') {
                                                selectInput.classList.remove('d-none');
                                                selectInput.required = true;
                                                textInput.classList.add('d-none');
                                                textInput.required = false;
                                            } else {
                                                textInput.classList.remove('d-none');
                                                textInput.required = true;
                                                selectInput.classList.add('d-none');
                                                selectInput.required = false;
                                            }
                                        }
                                
                                        // Initialize on page load
                                        toggleInputs();
                                
                                        // Update inputs dynamically if the condition changes
                                        conditionInput.addEventListener('change', toggleInputs);
                                    });
                                </script> --}}
                                
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="modalType" class="form-label esa-label">Tipe</label>
                                        <input type="text" id="modalType" class="form-control" name="typegcm"></input>
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
            </div>
        </div>
    </div>
</div>
<script>

function openMasterModal(master) {
    // Populate the modal fields with the software data
    document.getElementById('modalMasterId').value = master.masterid;
    document.getElementById('modalCondition').value = master.condition;
    document.getElementById('modalNoSr').value = master.nosr;
    document.getElementById('modalDescription').value = master.description;
    document.getElementById('modalValue').value = master.valuegcm;
    document.getElementById('modalType').value = master.typegcm;
    document.getElementById('active').value = master.active; 

    // Update the form action
    var form = document.getElementById('modalUpdateMasterForm');
    form.action = "{{ route('master.type.update', ['masterid' => ':masterid']) }}".replace(':masterid', master.masterid);
}

</script>