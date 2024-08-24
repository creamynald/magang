<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-toggle-wrapper">
                    <h5>Detail data <strong class="txt-danger">{{ $row->nama }}</strong></h5>
                    <div class="container mt-4">
                        <div class="col mb-2">
                            <label class="form-label" for="instansi_id">Instansi</label>
                            <input class="form-control" id="instansi_id" type="text" placeholder="{{ $row->instansi->nama }}"
                                readonly>
                        </div>
                        <div class="col mb-2">
                            <label class="form-label" for="nama">Bidang</label>
                            <input class="form-control" id="nama" type="text" placeholder="{{ $row->nama }}"
                                readonly>
                        </div>
                        <div class="col mb-2">
                            <label class="form-label" for="nama_penanggung_jawab">Penanggung Jawab</label>
                            <input class="form-control" id="nama_penanggung_jawab" type="text"
                                placeholder="{{ $row->nama_penanggung_jawab }} (NIP. {{ $row->nip }})" readonly>
                        </div>
                        <div class="col mb-2">
                            <label class="form-label" for="telepon">Telepon</label>
                            <input class="form-control" id="telepon" type="number" placeholder="{{ $row->telepon }}"
                                readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
