<x-app>
    <x-slot name="title">Dashboard Admin</x-slot>

    <div id="app">
        <div id="main" class="layout-horizontal">
            <x-header></x-header>

            <div class="content-wrapper container">

                <div class="page-heading">
                    <h3>Manajemen PIC</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-12 col-lg-9">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h4 class="h4">Daftar PIC</h4>
                                    <a href="{{ route('admin.ruangan.baru') }}" class="btn my-auto text-primary"><i class="bi bi-plus"></i> Ruangan Baru</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama PIC</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pics as $pic)
                                                <tr>
                                                    <td>{{ $pic->name }}</td>
                                                    <td>{{ $pic->email }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="h4">Pencarian PIC</h4>
                                </div>
                                <div class="card-body">
                                    <form action="" method="get">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nama PIC</label>
                                            <input type="text" name="name" id="" class="form-control" value="{{ request()->name ?? '' }}">
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <input type="submit" value="Cari" class="btn btn-primary">
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