<div class="py-3">
    <div class="esa-header">
        <div class="esa-header-dark">Detail Asset</div>
    </div>
</div>

<div class="row">
    <div class="col-md-12" >
        <div class="card" style="background:none">
            <div class="card-body">
                <!-- Data Pegawai -->
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="esa-title">General Information and Hardware</h4>
                    </div>
                    <div>
                        <button class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn" 
                            onclick="openAndDownloadPDF('{{ route('transaction.asset.label', ['assetcode' => $assetcode]) }}')">
                        Print Label
                        </button>
                        {{-- change the route accordingly --}}
                        @if (is_null($idassetspec) || $idassetspec === 0 || $idassetspec === 'N/A')
                            <a href="{{ route('transaction.asset.index') }}" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn">Add Hardware</a>
                            {{-- <div class="col">
                                <img src="{{ asset('assets/dist/images/portal-menu/img-lihat-semua.svg') }}" alt="image-lihat-semua"
                                    data-bs-target="#showModalPortalSistem" data-bs-toggle="modal" style="cursor: pointer">
                            </div> --}}
                        @else
                            <a href="#showModalPortalSistem" data-bs-toggle="modal" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary esa-btn">Update Hardware</a>
                        @endif
                    </div>
                </div>
            </div>

            @include('asset.transaction.asset.detail.hardware.modal')
                
            {{-- <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300" onclick="window.location.href='{{ route('transaction.edit',[
                'assetcategory' => $assetcategory, 
                'assetcode' => $assetcode,
                'idassetspec' => $idassetspec
                ])}}'">
                Update Asset
            </button> --}}

                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <tbody>
                        <!-- Table Head in the First Column -->
                        <tr class="bg-white hidden" hidden>
                            <th scope="row" class="px-6 py-4 font-medium text-b lack whitespace-nowrap ">Asset ID:</th>
                            <td class="px-6 py-4">: {{$idassetspec}}</td>    
                            @if (!empty($assetSpecData))
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">First Graphics Card Type</th>
                            <td class="px-6 py-4">: {{$graphicstype1}}</td>
                            @endif
                        </tr>
                        <tr class="bg-white">
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Asset Type:</th>
                            <td class="px-6 py-4">: {{$assettype}}</td>
                            @if (!empty($assetSpecData))
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">First Graphics Card</th>
                            <td class="px-6 py-4">: {{$graphics1}}</td>
                            @endif
                        </tr>
                        <tr class="bg-white">
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Device Type:</th>
                            <td class="px-6 py-4">: {{$assetcategory}}</td>
                            @if (!empty($assetSpecData))
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Second Graphics Card Type</th>
                            <td class="px-6 py-4">: {{$graphicstype2}}</td>
                            @endif
                        </tr>
                        <tr class="bg-white">
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Asset Code:</th>
                            <td class="px-6 py-4">: {{$assetcode}}</td>
                            @if (!empty($assetSpecData))
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Second Graphics Card</th>
                            <td class="px-6 py-4">: {{$graphics2}}</td>
                            @endif
                        </tr>
                        <tr>
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Device:</th>
                            <td class="px-6 py-4">: {{$assetbms}}</td>
                            @if (!empty($assetSpecData))
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Screen Resolution</th>
                            <td class="px-6 py-4">: {{$screenresolution}}</td>
                            @endif
                        </tr>
                        <tr>
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Asset SerialNumber:</th>
                            <td class="px-6 py-4">: {{$assetserialnumber}}</td>
                            @if (!empty($assetSpecData))
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Touchscreen</th>
                            <td class="px-6 py-4">: @if($touchscreen == 'true') yes @else no @endif</td>
                            @endif
                        </tr>
                        @if (!empty($assetSpecData))
                        <tr class="bg-white">
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Processor:</th>
                            <td class="px-6 py-4">: {{$processor}}</td>
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Backlight Keyboard</th>
                            <td class="px-6 py-4">: @if($backlightkeyboard == 'true') yes @else no @endif</td>
                        </tr>
                        <tr class="bg-white">
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Memory:</th>
                            <td class="px-6 py-4">: {{$memory}}</td>
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Convertible</th>
                            <td class="px-6 py-4">: @if($convertible == 'true') yes @else no @endif</td>
                        </tr>
                        <tr class="bg-white">
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Storage:</th>
                            <td class="px-6 py-4">: {{$storage}}</td>
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Web Camera</th>
                            <td class="px-6 py-4">: @if($webcamera == 'true') yes @else no @endif</td>
                        </tr>
                        <tr class="bg-white">
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Speaker</th>
                            <td class="px-6 py-4">: @if($speaker == 'true') yes @else no @endif</td>
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Wifi</th>
                            <td class="px-6 py-4">: @if($wifi == 'true') yes @else no @endif</td>
                        </tr>
                        <tr class="bg-white">
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Microphone</th>
                            <td class="px-6 py-4">: @if($microphone == 'true') yes @else no @endif</td>
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">Bluetooth</th>
                            <td class="px-6 py-4">: @if($bluetooth == 'true') yes @else no @endif</td>
                        </tr>
                        @endif
                        <!-- Add more rows as necessary -->
                    </tbody>
                </table>
        </div>
    </div>
</div>