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
                                <div class="col-sm-4">
                                    <div class="mb-4">
                                        <label>Nama</label>
                                        <input class="form-control" type="text" value="{{ auth()->user()->name }}"
                                            disabled>
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label>Kegiatan</label>
                                        <select class="form-select" name="kegiatan_id" id="kegiatanSelect" required>
                                            <option value="">Pilih Kegiatan</option>
                                            @foreach ($kegiatan as $row)
                                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label>Instansi</label>
                                        <input class="form-control" type="text" id="instansiField" disabled>
                                        <input type="hidden" name="instansi_id" id="instansiId">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="mb-3">
                                        <label>Tanggal Mulai</label>
                                        <input class="datepicker-here form-control" type="text" data-language="en"
                                            name="tanggal_mulai" id="tanggalMulai" readonly>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="mb-3">
                                        <label>Tanggal Selesai</label>
                                        <input class="datepicker-here form-control" type="text" data-language="en"
                                            name="tanggal_selesai" id="tanggalSelesai" readonly>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="mb-3">
                                        <label class="form-label" for="dok_pengajuan">Surat Permohonan</label>
                                        <input class="form-control" id="dok_pengajuan" type="file" name="dok_pengajuan">
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
                                    <div class="text-end">
                                        <button class="btn btn-primary" type="submit">Ajukan</button>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('kegiatanSelect').addEventListener('change', function() {
                const kegiatanId = this.value;
                if (kegiatanId) {
                    fetch(`/get-kegiatan-details?kegiatan_id=${kegiatanId}`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('instansiField').value = data.instansi_nama;
                            document.getElementById('instansiId').value = data.instansi_id;
                            document.getElementById('tanggalMulai').value = data.tanggal_mulai;
                            document.getElementById('tanggalSelesai').value = data.tanggal_selesai;
                        })
                        .catch(error => console.error('Error fetching kegiatan details:', error));
                } else {
                    document.getElementById('instansiField').value = '';
                    document.getElementById('instansiId').value = '';
                    document.getElementById('tanggalMulai').value = '';
                    document.getElementById('tanggalSelesai').value = '';
                }
            });
        });
    </script>
@endpush
