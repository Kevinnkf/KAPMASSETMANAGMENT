<div class="py-3">
    <div class="esa-header">
        <div class="esa-header-dark">Image</div>
    </div>
</div>

<div class="row">
    <div class="col-md-12" >
        <div class="card" style="background:none">
            <div class="card-body">
                <!-- Data Pegawai -->
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="esa-title">Asset Image</h4>
                    </div>
                    <div>
                        <a href="{{ route('transaction.image.create', ['assetcode' => $assetcode]) }}" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn">
                            Add Image
                        </a>
                    </div>
                </div>
                <div class="card-datatable table-responsive">
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xxl-3 g-3 p-3">
                        {{-- card 1 --}}
                        @if(!empty($imgData) && is_array($imgData)) <!-- Check if $imgData is not empty and is an array -->
                            @foreach ($imgData as $img)
                        <div class="col">
                            <div class="card mb-2" style="cursor: pointer; display: flex; align-items: center; justify-content: center; height: 100%;">
                                <div class="card-body p-3 d-flex flex-column align-items-center justify-content-center">
                                    <div class="row g-5">
                                        <div class="col-sm-4 d-none d-sm-block text-center">
                                            <a href="#modalImage" data-bs-toggle="modal"  onclick="openImgModal({{ json_encode($img) }})">
                                                <img class="h-auto max-w-full rounded-lg" src="{{ $img['assetpic'] }}" alt="Asset Image">
                                            </a>
                                            <a href="{{ route('transaction.image.edit', ['assetcode' => $assetcode, $img['idassetpic']]) }}" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn">
                                                Edit
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('asset.transaction.asset.detail.image.modal')
                        @endforeach
                        @else
                            <p class="font-semibold leading-tight text-xl border-gray-300 mb-2">No images available</p> <!-- Display Condition -->
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>