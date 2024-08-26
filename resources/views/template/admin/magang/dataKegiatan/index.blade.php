@extends('template.admin.partials.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
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
                                <a href="{{ route('data-kegiatan.create') }}" class="btn btn-outline-primary mr-2"><i
                                        class="icon-plus"></i> Pengajuan Magang</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive custom-scrollbar">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Instansi</th>
                                        <th>Mulai</th>
                                        <th>Selesai</th>
                                        <th>Status</th>
                                        <th>File</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataKegiatan as $index => $row)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $row->instansi?->nama }}</td>
                                            <td>{{ $row->tanggal_mulai }}</td>
                                            <td>{{ $row->tanggal_selesai }}</td>
                                            <td class="action"> <a class="pdf" href="{{ $row->dok_pengajuan }}"
                                                    target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                            <td>
                                                @if ($row->status == '0')
                                                    <span class="badge rounded-pill badge-success">
                                                        Diajukan
                                                    </span>
                                                @elseif($row->status == '1')
                                                    <span class="badge rounded-pill badge-primary">
                                                        Disetujui
                                                    </span>
                                                @elseif($row->status == '2')
                                                    <span class="badge rounded-pill badge-danger">
                                                        Ditolak
                                                    </span>
                                                @elseif($row->status == '3')
                                                    <span class="badge rounded-pill badge-warning">
                                                        Selesai
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit">
                                                        <a href="{{ route('data-kegiatan.edit', $row->id) }}"
                                                            data-original-title="edit">
                                                            <i class="icon-pencil-alt"></i>
                                                        </a>
                                                    </li>
                                                    <li class="delete">
                                                        <form action="{{ route('data-kegiatan.destroy', $row->id) }}"
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
