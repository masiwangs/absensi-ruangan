<x-app>
    <x-slot name="title">Log Baru</x-slot>

    <div id="app">
        <div id="main" class="layout-horizontal">
            <x-header without="navbar"></x-header>

            <div class="content-wrapper container">

                <div class="page-heading">
                    <h3>Log Baru</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-12 col-lg-4 offset-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <form action="">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Ruangan</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                              </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nama</label>
                                            <input type="text" name="" id="" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Perusahaan</label>
                                            <input type="text" name="" id="" class="form-control">
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label for="" class="form-label">Jam Masuk</label>
                                                <input type="time" name="" id="" class="form-control">
                                            </div>
                                            <div class="col-6">
                                                <label for="" class="form-label">Jam Keluar</label>
                                                <input type="time" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Keperluan</label>
                                            <textarea name="" id="" rows="3" class="form-control"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Ruangan</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                              </select>
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