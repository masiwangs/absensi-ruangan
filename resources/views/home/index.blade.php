<x-app>
    <x-slot name="title">Log Baru</x-slot>

    <div id="app">
        <div id="main" class="layout-horizontal">
            <x-header without="navbar"></x-header>

            <div class="content-wrapper container">

                <div class="page-heading d-flex justify-content-center">
                    <h4 class="h4">Data Center Log Indonesia Eximbank</h4>
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
                                                        @foreach ($ruangans as $ruangan)
                                                        <option value="{{ $ruangan->id }}">{{ $ruangan->nama }}</option>
                                                        @endforeach
                                                      </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">PIC</label>
                                                    <input name="pic" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Ketik untuk mencari...">
                                                    <datalist id="datalistOptions">
                                                        @foreach ($pics as $pic)
                                                        <option value="{{ $pic->name }}"></option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Tanggal</label>
                                                    <input type="date" name="tanggal" value="{{ Date::now()->format('Y-m-d') }}" class="form-control">
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <label for="" class="form-label">Jam Masuk</label>
                                                        <input type="time" name="jam_masuk" value="{{ Date::now()->format('H:i:s') }}" class="form-control">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="" class="form-label">Jam Keluar</label>
                                                        <input type="time" name="jam_keluar" id="" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Nama Visitor</label>
                                                    <input type="text" name="nama_visitor" id="" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Perusahaan</label>
                                                    <input type="text" name="nama_perusahaan" id="" class="form-control">
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-12 col-lg-6">
                                                        <label for="" class="form-label">Nomor KTP</label>
                                                        <input type="text" name="ktp" id="" class="form-control">
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <label for="" class="form-label">Nomor HP</label>
                                                        <input type="text" name="hp" id="" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="" class="form-label">Keperluan</label>
                                                    <textarea name="keperluan" id="" rows="3" class="form-control"></textarea>
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

            <footer>
                <div class="container">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2021 &copy; Your company</p>
                        </div>
                        <div class="float-end">
                            <p>This is footer <span class="text-danger"><i class="bi bi-heart"></i></span></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

</x-app>