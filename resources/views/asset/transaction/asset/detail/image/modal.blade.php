<div class="modal fade" id="modalImage" aria-hidden="true" aria-labelledby="showModalImage" tabindex="-1">
    <div class="modal-dialog modal-l modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header px-4 pt-4 pb-2">
                <h5 class="esa-title fs-5 text-primary-kai fw-bolder" id="showModalImg">Image Fields</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <img
                        src="/assets/dist/images/network_share/AssetManagementSystem/Image/Asset/{{$img['assetpic']}}"
                        alt="Asset Image"
                        class="w-100"
                    />
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function openImgModal(img) {
        // Populate the modal fields with the software data
        document.getElementById('assetimage').value = img.assetpic;

}

</script>

{{-- <form id="imageUpdateForm" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
    @csrf
    @method('PUT')

    <div class="row mb-3">
        <img
            src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Slides/1.webp"
            data-mdb-img="https://mdbcdn.b-cdn.net/img/Photos/Slides/1.webp"
            alt="Table Full of Spices"
            class="w-100"
        />
    </div>
    <hr>
</form> --}}