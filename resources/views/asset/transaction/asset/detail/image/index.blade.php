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
                                <div class="card mb-2" style="cursor: pointer; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%;">
                                    <div class="card-body p-3 d-flex flex-column align-items-center justify-content-center">
                                        <img class="h-auto max-w-full rounded-lg" src="/assets/dist/images/network_share/AssetManagementSystem/Image/Asset/{{$img['assetpic']}}" alt="Asset Image" style="max-width: 100%; margin-bottom: 10px;">
                                        <a href="{{ route('transaction.image.edit', ['assetcode' => $assetcode, $img['idassetpic']]) }}" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn" style="max-width: 120px">
                                            Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @include('asset.transaction.asset.detail.image.modal')
                        @endforeach
                        @else

                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="font-semibold leading-tight text-xl border-gray-300 mb-2">No images available</h4>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>