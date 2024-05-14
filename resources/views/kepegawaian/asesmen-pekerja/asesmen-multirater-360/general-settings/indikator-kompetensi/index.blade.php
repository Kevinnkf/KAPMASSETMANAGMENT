@extends('layouts.app')

@section('styles')
    <style>
        .list-group-item {
            color: #475467;
        }

        .node-icon {
            margin-right: 8px !important;
        }

        .table_custom {
            --bs-table-bg: transparent !important;
            margin: 0px;
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
            <select id="dropdown_year_indikator_kompetensi" class="select2 form-control">
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024" selected>2024</option>
            </select>
        </div>
        <div id="treeview-indikator-kompetensi"></div>
    </div>

    <div class="modal fade" id="modal_review" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary-kai">Kompetensi Dasar (Basic)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-borderless">
                            <tr>
                                <td style="width:20%;">Kode</td>
                                <td style=""><strong>SBCUST</strong></td>
                            </tr>
                            <tr>
                                <td style="width:20%;">Nama</td>
                                <td style="">Adi Layanan (Customer Focus)</td>
                            </tr>
                            <tr>
                                <td style="width:20%;">Deskripsi</td>
                                <td style="">Kemampuan memberikan layanan terbaik kepada
                                    pelanggan baik internal maupun eksternal</td>
                            </tr>
                            <tr>
                                <td style="width:20%;">Detail</td>
                                <td>
                                    <table class="table table-sm table-borderless table_custom">
                                        <tr>
                                            <td style="width:15%;"><strong>0001</strong>
                                            </td>
                                            <td>
                                                Memenuhi kebutuhan pelanggan internal dan eksternal sesuai dengan prosedur
                                                layanan
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:20%;"></td>
                                <td>
                                    <table class="table table-sm table-borderless table_custom">
                                        <tr>
                                            <td style="width:15%;"><strong>0002</strong>
                                            </td>
                                            <td>
                                                Merespons dan menindaklanjuti keluhan layanan dari pelanggan internal dan
                                                eksternal dengan memberikan solusi atas keluhan tersebut
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:20%;"></td>
                                <td>
                                    <table class="table table-sm table-borderless table_custom">
                                        <tr>
                                            <td style="width:15%;"><strong>0003</strong>
                                            </td>
                                            <td>
                                                Memberikan pelayanan ke pelanggan internal dan eksternal melebihi
                                                ekspektasi/harapan pelanggannya
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:20%;"></td>
                                <td>
                                    <table class="table table-sm table-borderless table_custom">
                                        <tr>
                                            <td style="width:15%;"><strong>0004</strong>
                                            </td>
                                            <td>
                                                Menampilkan inisiatif untuk mengembangkan pola pelayanan yang dapat
                                                meningkatkan kepuasan pelanggannya
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:20%;"></td>
                                <td>
                                    <table class="table table-sm table-borderless table_custom">
                                        <tr>
                                            <td style="width:15%;"><strong>0005</strong>
                                            </td>
                                            <td>
                                                Mengembangkan strategi peningkatan layanan di berbagai bidang serta
                                                menyiapkan program-program layanan untuk mempersiapkan kebutuhan pelayanan
                                                pelanggan di masa mendatang
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark col" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Content --}}
@endsection

@section('scripts')
    <script src="{{ asset('assets/dist/libs/bootstrap-tree/dist/bootstrap-treeview.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#dropdown_year_indikator_kompetensi").select2({
                allowClear: true,
                placeholder: "Tahun",
            });

            var defaultData = [{
                    text: "Kompetensi Dasar (Basic)",
                    nodes: [{
                            text: "Adi Layanan (Customer Focus)",
                        },
                        {
                            text: "Integritas (Integrity)",
                        },
                        {
                            text: "Mengutamakan Keselamatan & Kesehatan (Safety and Health Orientation)"
                        },
                    ],
                },
                {
                    text: "Kompetensi Inti (Core)",
                    nodes: [{
                        text: "Inovasi (Driving Innovation)",
                    }, {
                        text: "Kolaborasi (Collaboration)"
                    }, {
                        text: "Proaktif (Proactive)"
                    }, ],
                },
                {
                    text: "Kompetensi Leading Business",
                    nodes: [{
                        text: "Fokus Pelanggan (Customer Focus)",
                    }, {
                        text: "Inovasi (Driving Innovation)",
                    }, {
                        text: "Kepemimpinan Digital (Digital Leadership)",
                    }, {
                        text: "Kepiawaian Bisnis Global (Global Business Savvy)",
                    }, {
                        text: "Orientasi Strategi (Strategic Orientation)",
                    }, {
                        text: "Pembangunan Kemitraan Strategi (Building Strategic Partnership)",
                    }, {
                        text: "Pengelolaan Eksekusi (Driving Execution)",
                    }, ],
                },
                {
                    text: "Kompetensi Leading People & Organization",
                    nodes: [{
                        text: "Memimpin Perubahan (Leading Change)",
                    }, {
                        text: "Pengelolaan Keberagaman (Managing Diversity)",
                    }, {
                        text: "Pengembangan Kapabilitas Organisasi (Developing Organizational Capabilities)",
                    }, ],
                },
                {
                    text: "Kompetensi Primary Leadership",
                    nodes: [{
                            text: "Dorongan Berprestasi (Achievement Drive)",
                        },
                        {
                            text: "Empati Sosial (Social Empathy)",
                        },
                        {
                            text: "Kepiawaian Digital (Digital Savvy)",
                        },
                        {
                            text: "Komunikasi dan Persuasi (Communication and Persuation)",
                        },
                        {
                            text: "Kontrol Diri (Self Control)",
                        },
                        {
                            text: "Pengembangan Diri (Self Development)",
                        },
                        {
                            text: "Penyelesaian Masalah dan Pengambilan Keputusan (Problem Solving and Decision Making)",
                        },
                        {
                            text: "Resolusi Konflik (Conflict Management)",
                        },
                    ],
                },
            ];

            $("#treeview-indikator-kompetensi").treeview({
                selectedBackColor: "#CEDDED",
                selectedColor: "#0B56A7",
                onhoverColor: "#CEDDED",
                expandIcon: "ti ti-plus",
                collapseIcon: "ti ti-minus",
                nodeIcon: "fa fa-folder",
                data: defaultData,
            }).on('nodeSelected', function(e, node) {
                // jika yang di klik adalah child dan bukan parent
                if (node['parentId'] != null) {
                    $("#modal_review").modal("show");
                }
            });
        });
    </script>
@endsection
