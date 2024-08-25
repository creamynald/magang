@extends('template.admin.partials.master')

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form theme-form" method="POST" action="{{ route('instansi.update', $instansi->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Nama Instansi</label>
                                        <input class="form-control" type="text" name="nama"
                                            placeholder="Nama Instansi" value="{{ $instansi->nama }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Alamat</label>
                                        <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ $instansi->alamat }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label>Kode POS</label>
                                        <input class="form-control" type="number" name="kode_pos" placeholder="Kode POS"
                                            value="{{ $instansi->kode_pos }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label>Laman Web</label>
                                        <input class="form-control" type="text" name="laman_web" placeholder="Laman Web"
                                            value="{{ $instansi->laman_web }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label>Surel</label>
                                        <input class="form-control" type="email" name="surel" placeholder="Surel"
                                            value="{{ $instansi->surel }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="text-end">
                                        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
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
