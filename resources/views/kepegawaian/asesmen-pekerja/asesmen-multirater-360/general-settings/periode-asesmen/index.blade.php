@extends('layouts.app')

@section('styles')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            margin-left: 12px;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endsection

@section('content')
    {{-- Breadcrumb --}}
    @include('kepegawaian.asesmen-pekerja.asesmen-multirater-360.breadcrumb')
    {{-- End Breadcrumb --}}

    {{-- Top Bar --}}
    @include('kepegawaian.asesmen-pekerja.asesmen-multirater-360.topbar')
    {{-- End Top Bar --}}

    {{-- Content --}}
    <div>
        <h4 class="fw-semibold mt-3 mb-4 text-primary-kai">{{ $title }}</h4>
        <div class="mb-3 col-md-1">
            Tahun
            <select id="dropdown_year_periode_asesmen" class="select2 form-control">
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024" selected>2024</option>
            </select>
        </div>


        <div class="card">
            <div class="card-body">
                {{-- PT Kereta Api Indonesia (Persero) --}}
                <div class="row mb-2">
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" value="PT Kereta Api Indonesia (Persero)"
                            disabled>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" placeholder="Periode Awal">
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" placeholder="Periode Akhir">
                    </div>
                    <div class="col-3 text-center">
                        <button class="btn btn-danger" style="background-color: red">
                            <i class="ti ti-x" style="margin-right: 8px;"></i>Reset
                        </button>
                        <button class="btn btn-primary">
                            <i class="ti ti-check" style="margin-right: 8px;"></i>Submit
                        </button>
                    </div>
                </div>

                {{-- PT KCI --}}
                <div class="row mb-2">
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" value="PT KCI" disabled>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" placeholder="Periode Awal">
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" placeholder="Periode Akhir">
                    </div>
                    <div class="col-3 text-center">
                        <button class="btn btn-danger" style="background-color: red">
                            <i class="ti ti-x" style="margin-right: 8px;"></i>Reset
                        </button>
                        <button class="btn btn-primary">
                            <i class="ti ti-check" style="margin-right: 8px;"></i>Submit
                        </button>
                    </div>
                </div>

                {{-- PT KAPM --}}
                <div class="row mb-2">
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" value="PT KAPM" disabled>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" placeholder="Periode Awal">
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" placeholder="Periode Akhir">
                    </div>
                    <div class="col-3 text-center">
                        <button class="btn btn-danger" style="background-color: red">
                            <i class="ti ti-x" style="margin-right: 8px;"></i>Reset
                        </button>
                        <button class="btn btn-primary">
                            <i class="ti ti-check" style="margin-right: 8px;"></i>Submit
                        </button>
                    </div>
                </div>

                {{-- PT KALOG --}}
                <div class="row mb-2">
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" value="PT KALOG" disabled>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" placeholder="Periode Awal">
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" placeholder="Periode Akhir">
                    </div>
                    <div class="col-3 text-center">
                        <button class="btn btn-danger" style="background-color: red">
                            <i class="ti ti-x" style="margin-right: 8px;"></i>Reset
                        </button>
                        <button class="btn btn-primary">
                            <i class="ti ti-check" style="margin-right: 8px;"></i>Submit
                        </button>
                    </div>
                </div>

                {{-- PT RAILINK --}}
                <div class="row mb-2">
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" value="PT RAILINK" disabled>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" placeholder="Periode Awal">
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" placeholder="Periode Akhir">
                    </div>
                    <div class="col-3 text-center">
                        <button class="btn btn-danger" style="background-color: red">
                            <i class="ti ti-x" style="margin-right: 8px;"></i>Reset
                        </button>
                        <button class="btn btn-primary">
                            <i class="ti ti-check" style="margin-right: 8px;"></i>Submit
                        </button>
                    </div>
                </div>

                {{-- PT KAWISTA --}}
                <div class="row mb-2">
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" value="PT KAWISTA" disabled>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" placeholder="Periode Awal">
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" placeholder="Periode Akhir">
                    </div>
                    <div class="col-3 text-center">
                        <button class="btn btn-danger" style="background-color: red">
                            <i class="ti ti-x" style="margin-right: 8px;"></i>Reset
                        </button>
                        <button class="btn btn-primary">
                            <i class="ti ti-check" style="margin-right: 8px;"></i>Submit
                        </button>
                    </div>
                </div>

                {{-- PT RMU --}}
                <div class="row">
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" value="PT RMU" disabled>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" placeholder="Periode Awal">
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="kategori" placeholder="Periode Akhir">
                    </div>
                    <div class="col-3 text-center">
                        <button class="btn btn-danger" style="background-color: red">
                            <i class="ti ti-x" style="margin-right: 8px;"></i>Reset
                        </button>
                        <button class="btn btn-primary">
                            <i class="ti ti-check" style="margin-right: 8px;"></i>Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#dropdown_year_periode_asesmen").select2({
                allowClear: true,
                placeholder: "Tahun",
            });
        });
    </script>
@endsection
