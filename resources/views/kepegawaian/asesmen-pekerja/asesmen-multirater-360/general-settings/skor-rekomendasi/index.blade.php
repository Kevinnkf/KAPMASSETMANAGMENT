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
        <div class="row mb-3 align-items-center">
            <div class="col-md-2 col-sm-3">
                <select id="dropdown_year_skor_rekomendasi" class="select2 form-control">
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024" selected>2024</option>
                </select>
            </div>
            <div class="col-md-4 col-sm-4">
                <input class="form-control" type="text" id="searching" name="searching" autocomplete="off"
                    placeholder="Masukkan kata kunci pencarian" onkeydown="search(this)" />
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr style="background-color: #0b56a7;color:white; height: 60px;">
                        <th class="text-center" style="vertical-align:middle;">Kategori</th>
                        <th class="text-center" style="vertical-align: middle;">Nilai Minimum</th>
                        <th class="text-center" style="vertical-align: middle;">Nilai Maximum</th>
                        <th class="text-center" style="vertical-align: middle; width:15%">
                            <button type="button" class="btn btn-primary">
                                Tambah Variabel
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-3 py-2">
                            <input type="text" class="form-control" id="kategori" disabled>
                        </td>
                        <td class="px-3 py-2">
                            <input type="number" class="form-control text-end" id="nilai-minimum" min="0"
                                pattern="^\d*(\.\d{0,2})?$" disabled>
                        </td>
                        <td class="px-3 py-2">
                            <input type="number" class="form-control text-end" id="nilai-maximum" min="0"
                                pattern="^\d*(\.\d{0,2})?$" disabled>
                        </td>
                        <td class="text-center" style="vertical-align: middle;">
                            <button class="btn ti ti-edit"></button>
                            <button class="btn ti ti-trash"></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#dropdown_year_skor_rekomendasi").select2({
                allowClear: true,
                placeholder: "Tahun",
            });
        });

        $(document).on('keydown', 'input[pattern]', function(e) {
            var input = $(this);
            var oldVal = input.val();
            var regex = new RegExp(input.attr('pattern'), 'g');

            setTimeout(function() {
                var newVal = input.val();
                if (!regex.test(newVal)) {
                    input.val(oldVal);
                }
            }, 1);
        });
    </script>
@endsection
