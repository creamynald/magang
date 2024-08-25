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
                    <div class="card-header pb-0 card-no-border">
                        <h4>Zero Configuration</h4><span>DataTables has most features enabled by default, so all you need to
                            do to use it with your own tables is to call the construction
                            function:<code>$().DataTable();</code>.</span><span>Searching, ordering and paging goodness will
                            be immediately added to the table, as shown in this example.</span>

                        <div class="card-header-right">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('bidang-instansi.create') }}" class="btn btn-outline-primary mr-2"><i
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
                                        <th>Instansi</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataBidInstansi as $index => $row)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $row->instansi->nama }} <br>{{ $row->nama }}</td>
                                            <td>{{ $row->nama_penanggung_jawab }}
                                                <br>
                                                <span class="badge rounded-pill badge-primary">NIP.
                                                    {{ $row->nip }}</span>
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
                                                        <a href="{{ route('bidang-instansi.edit', $row->id) }}"
                                                            data-original-title="edit">
                                                            <i class="icon-pencil-alt"></i>
                                                        </a>
                                                    </li>
                                                    <li class="delete">
                                                        <form action="{{ route('bidang-instansi.destroy', $row->id) }}"
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
        @include('template.admin.settings.bidangInstansi.modal')
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
