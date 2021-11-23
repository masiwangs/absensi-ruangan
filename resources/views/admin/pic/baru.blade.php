<x-app>
    <x-slot name="title">PIC TSI Baru</x-slot>

    <div id="app">
        <div id="main" class="layout-horizontal">
            <x-header></x-header>

            <div class="content-wrapper container">

                <div class="page-heading">
                    <h3>PIC TSI Baru</h3>
                </div>
                <div class="page-content">
                    <section>
                        <div class="card">
                            <div class="card-body">
                                <form method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nama</label>
                                        <input type="text" name="name" required id="" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Email</label>
                                        <input type="email" name="email" required id="" class="form-control">
                                        @error('email') <small class="text-danger"><i class="bi bi-exclamation-triangle-fill"></i> {{ $message }}</small> @enderror
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