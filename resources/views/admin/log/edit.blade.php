<x-app>
    <x-slot name="title">Edit Log</x-slot>

    <div id="app">
        <div id="main" class="layout-horizontal">
            <x-header></x-header>

            <div class="content-wrapper container">

                <div class="page-heading">
                    <h3>Edit Log</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-12 col-lg-8 offset-lg-2">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Ruangan</label>
                                                    <select class="form-select" name="ruangan" aria-label="Default select example">
                                                        <option>Pilih ruangan</option>
                                                        @foreach ($ruangans as $ruangan)
                                                        <option @if($log->ruangan_id == $ruangan->id) selected @endif value="{{ $ruangan->id }}">{{ $ruangan->nama }}</option>
                                                        @endforeach
                                                      </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">PIC</label>
                                                    <input name="pic" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Ketik untuk mencari..." value="{{ $log->pic->name }}">
                                                    <datalist id="datalistOptions">
                                                        @foreach ($pics as $pic)
                                                        <option value="{{ $pic->name }}"></option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Tanggal</label>
                                                    <input type="date" name="tanggal" value="{{ $log->tanggal }}" class="form-control">
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <label for="" class="form-label">Jam Masuk</label>
                                                        <input type="time" name="jam_masuk" value="{{ date('H:i', strtotime($log->jam_masuk)) }}" class="form-control">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="" class="form-label">Jam Keluar</label>
                                                        <input type="time" name="jam_keluar" value="{{ $log->jam_keluar ? date('H:i', strtotime($log->jam_keluar)) : null }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Nama Visitor</label>
                                                    <input type="text" name="nama_visitor" value="{{ $log->nama_visitor }}" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Perusahaan</label>
                                                    <input type="text" name="nama_perusahaan" value="{{ $log->nama_perusahaan }}" class="form-control">
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-lg-6">
                                                        <label for="" class="form-label">Nomor KTP</label>
                                                        <input type="text" name="ktp" value="{{ $log->ktp }}" class="form-control">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="" class="form-label">Nomor HP</label>
                                                        <input type="text" name="hp" value="{{ $log->hp }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="" class="form-label">Keperluan</label>
                                                    <textarea name="keperluan" id="" rows="3" class="form-control">{{ $log->keperluan }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        <div class="d-flex justify-content-end">
                                            <input type="submit" value="Simpan" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>

        </div>
    </div>

</x-app>