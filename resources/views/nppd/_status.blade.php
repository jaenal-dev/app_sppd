@foreach ($nppds as $nppd)
    <div class="modal fade" id="verticalCenter{{ $nppd->id }}" tabindex="-1" aria-labelledby="verticalCenterLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Ubah Status Surat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('status', $nppd) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <select name="status" id="status" class="form-select">
                                    <option value="">Pilih Status</option>
                                    <option value="1">Setuju</option>
                                    <option value="2">Tolak</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan" cols="30" aria-valuetext="{{ old('keterangan') }}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
