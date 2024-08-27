@extends('template.admin.partials.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-0 row important-project mt-3">
                        <div class="col-xl-6 col-md-6 box-col-6">
                            <div class="projectlist-card">
                                <div class="projectlist">
                                    <div class="project-data">
                                        <img class="nft-img img-fluid" src="../assets/images/dashboard-2/category/1.png"
                                            alt="nft">
                                        <div>
                                            <a class="f-14 f-w-500 d-block" href="#">Periode Akademik</a>
                                            <span class="f-light f-12 f-w-500">tahun periode</span>
                                        </div>
                                    </div>
                                    <div class="project-data">
                                        <img class="nft-img img-fluid" src="../assets/images/dashboard-2/category/1.png"
                                            alt="nft">
                                        <div>
                                            <a class="f-14 f-w-500 d-block" href="#">Nama Kegiatan</a>
                                            <span class="f-light f-12 f-w-500">tahun periode</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 box-col-6">
                            <div class="projectlist-card">
                                <div class="projectlist">
                                    <div class="project-data">
                                        <img class="nft-img img-fluid" src="../assets/images/dashboard-2/category/1.png"
                                            alt="nft">
                                        <div>
                                            <a class="f-14 f-w-500 d-block" href="#">Unit</a>
                                            <span class="f-light f-12 f-w-500">tahun periode</span>
                                        </div>
                                    </div>
                                    <div class="project-data">
                                        <img class="nft-img img-fluid" src="../assets/images/dashboard-2/category/1.png"
                                            alt="nft">
                                        <div>
                                            <a class="f-14 f-w-500 d-block" href="#">Instansi/Kelompok</a>
                                            <span class="f-light f-12 f-w-500">tahun periode</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Trigger alert -->
            @if (session('success'))
                <div class="col-sm-12">
                    <div class="alert alert-success dark" role="alert">
                        <p><i class="icon-check"></i>{{ session('success') }}</p>
                    </div>
                </div>
            @endif
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border mb-4">
                        <div class="card-header-right">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('rincian-kegiatan.create') }}" class="btn btn-outline-primary mr-2"><i
                                        class="icon-plus"></i> Tambah</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive custom-scrollbar">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tgl. Kegiatan</th>
                                        <th>Pembimbing</th>
                                        <th>Penulis</th>
                                        <th>Topik</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rincianKegiatan as $index => $row)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $row->tanggal_kegiatan }}</td>
                                            <td>{{ $row->pembimbing }}</td>
                                            <td>{{ $row->user?->name }}</td>
                                            <td>{{ $row->topik }}</td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit">
                                                        <a href="{{ route('rincian-kegiatan.edit', $row->id) }}"
                                                            data-original-title="edit">
                                                            <i class="icon-pencil-alt"></i>
                                                        </a>
                                                    </li>
                                                    <li class="delete">
                                                        <form action="{{ route('rincian-kegiatan.destroy', $row->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-link p-0"><i
                                                                    class="icon-trash"></i></button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Zero Configuration  Ends-->
        </div>
    </div>
@endsection

@push('css')
    <!-- datatables css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/datatables.css') }}">
    <!-- datatables css end -->
@endpush

@push('js')
    <!-- datatables js-->
    <script src="{{ asset('admin') }}/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/datatable/datatables/datatable.custom.js"></script>
    <!-- datatables js end -->
    <script src="{{ asset('admin') }}/assets/js/height-equal.js"></script>
    <script src="{{ asset('admin') }}/assets/js/tooltip-init.js"></script>
    <script src="{{ asset('admin') }}/assets/js/modalpage/validation-modal.js"></script>
@endpush
