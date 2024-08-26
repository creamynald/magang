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
                                <a href="{{ route('kegiatan.create') }}" class="btn btn-outline-primary mr-2"><i
                                        class="icon-plus"></i> Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive custom-scrollbar">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Instansi</th>
                                        <th>Periode</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataKegiatan as $index => $row)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $row->nama }}
                                            <td>{{ $row->instansi?->nama ?? 'deleted' }}</td>
                                            <td class="text-center">
                                                {{ $row->periode_akademik }} <br>
                                                {{ \Carbon\Carbon::parse($row->tanggal_mulai)->format('d/m/Y') }} -
                                                {{ \Carbon\Carbon::parse($row->tanggal_selesai)->format('d/m/Y') }}
                                            </td>
                                            <td>
                                                @if ($row->is_active == 1)
                                                    <span class="badge rounded-pill badge-success">
                                                        Aktif
                                                    </span>
                                                @else
                                                    <span class="badge rounded-pill badge-danger">
                                                        Tidak Aktif
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit">
                                                        <a href="{{ route('kegiatan.edit', $row->id) }}"
                                                            data-original-title="edit">
                                                            <i class="icon-pencil-alt"></i>
                                                        </a>
                                                    </li>
                                                    <li class="delete">
                                                        <form action="{{ route('kegiatan.destroy', $row->id) }}"
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
