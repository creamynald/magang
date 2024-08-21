<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-toggle-wrapper">
                    <h5>Detail data <strong class="txt-danger">{{ $row->nama }}</strong></h5>
                    <div class="container mt-4">
                        <div class="col mb-2">
                            <label class="form-label" for="nama">Nama</label>
                            <input class="form-control" id="nama" type="text" placeholder="{{ $row->nama }}"
                                readonly>
                        </div>
                        <div class="col mb-2">
                            <label class="form-label" for="alamat">Alamat</label>
                            <input class="form-control" id="alamat" type="text" placeholder="{{ $row->alamat }}"
                                readonly>
                        </div>
                        <div class="col mb-2">
                            <label class="form-label" for="link">Laman Web</label>
                            <input class="form-control" id="link" type="text" placeholder="{{ $row->laman_web }}"
                                readonly>
                        </div>
                        <div class="col mb-2">
                            <label class="form-label" for="email">Laman Web</label>
                            <input class="form-control" id="email" type="text" placeholder="{{ $row->surel }}"
                                readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
