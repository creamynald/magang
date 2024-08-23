@extends('template.admin.partials.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h4>Zero Configuration</h4><span>DataTables has most features enabled by default, so all you need to
                            do to use it with your own tables is to call the construction
                            function:<code>$().DataTable();</code>.</span><span>Searching, ordering and paging goodness will
                            be immediately added to the table, as shown in this example.</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive custom-scrollbar">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Instansi</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataInstansi as $index => $row)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $row->nama }}</td>
                                            <td>{{ $row->alamat }}</td>
                                            <td>
                                                <span class="badge rounded-pill badge-success">Aktif</span>
                                            </td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#viewModal"
                                                            data-original-title="detail">
                                                            <i class="icon-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li class="edit">
                                                        <a href="#"><i class="icon-pencil-alt"></i></a>
                                                    </li>
                                                    <li class="delete">
                                                        <a href="#"><i class="icon-trash"></i></a>
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
    @include('template.admin.settings.instansi.modal')
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
