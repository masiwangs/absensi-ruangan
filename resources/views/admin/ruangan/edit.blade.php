<x-app>
    <x-slot name="title">Edit Ruangan</x-slot>

    <div id="app">
        <div id="main" class="layout-horizontal">
            <x-header></x-header>

            <div class="content-wrapper container">

                <div class="page-heading">
                    <h3>Edit Ruangan</h3>
                </div>
                <div class="page-content">
                    <section>
                        <div class="card">
                            <div class="card-body">
                                <form method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nama Ruangan</label>
                                        <input type="text" name="nama" value="{{ $ruangan->nama }}" class="form-control">
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tersedia" id="flexCheckChecked" @if($ruangan->tersedia == 1) checked @endif>
                                            <label class="form-check-label" for="flexCheckChecked">
                                              Ruangan Tersedia
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('admin.ruangan.index') }}" class="btn btn-light me-3">Kembali</a>
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