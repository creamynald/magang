@extends('template.admin.partials.master')

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form theme-form" method="POST" action="{{ route('data-kegiatan.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>Nama</label>
                                        <input class="form-control" type="text" value="{{ auth()->user()->name }}"
                                            disabled>
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>Instansi</label>
                                        <select class="form-select" name="instansi_id" required>
                                            <option value="">Pilih Instansi</option>
                                            @foreach ($instansi as $row)
                                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>Tanggal Mulai</label>
                                        <input class="datepicker-here form-control" type="text" data-language="en"
                                            name="tanggal_mulai">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>Tanggal Selesai</label>
                                        <input class="datepicker-here form-control" type="text" data-language="en"
                                            name="tanggal_selesai">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control" name="keterangan" rows="3" placeholder="Masukkan ketertarikan/hobi (tidak wajib)"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="dok_pengajuan">Surat Permohonan</label>
                                        <input class="form-control" id="dok_pengajuan" type="file" name="dok_pengajuan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="text-end">
                                        <button class="btn btn-primary" type="submit">Ajukan!</button>
                                        <a href="{{ url()->previous() }}" class="btn btn-danger">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/dropzone.css') }}">
@endpush

@push('js')
    <script src="{{ asset('admin/assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('admin/assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('admin/assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dropzone/dropzone-script.js') }}"></script>
    <script src="{{ asset('admin/assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('admin/assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('admin/assets/js/typeahead-search/typeahead-custom.js') }}"></script>
@endpush
