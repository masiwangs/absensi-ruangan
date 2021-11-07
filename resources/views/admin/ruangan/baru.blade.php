<x-app>
    <x-slot name="title">Dashboard Admin</x-slot>

    <div id="app">
        <div id="main" class="layout-horizontal">
            <x-header></x-header>

            <div class="content-wrapper container">

                <div class="page-heading">
                    <h3>Ruangan Baru</h3>
                </div>
                <div class="page-content">
                    <section>
                        <div class="card">
                            <div class="card-body">
                                <form method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nama Ruangan</label>
                                        <input type="text" name="nama" id="" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Kapasitas Ruangan</label>
                                        <input type="number" name="kapasitas" id="" class="form-control">
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tersedia" id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                              Ruangan Tersedia
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-light me-3">Batal</button>
                                        <input type="submit" value="Simpan" class="btn btn-primary">
                                    </div>
                                </form>
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