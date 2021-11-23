<x-app>
    <x-slot name="title">Ruangan Baru</x-slot>

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

        </div>
    </div>
</x-app>