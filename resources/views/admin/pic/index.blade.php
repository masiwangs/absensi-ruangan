<x-app>
    <x-slot name="title">Manajemen PIC TSI</x-slot>

    <div id="app">
        <div id="main" class="layout-horizontal">
            <x-header></x-header>

            <div class="content-wrapper container">

                <div class="page-heading">
                    <h3>Manajemen PIC TSI</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-12 col-lg-9">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h4 class="h4">Daftar PIC TSI</h4>
                                    <a href="{{ route('admin.pic.baru') }}" class="btn my-auto text-primary"><i class="bi bi-plus"></i> PIC TSI Baru</a>
                                </div>
                                <div class="card-body">
                                    @if(\Session::has('success'))
                                    <div class="alert alert-success mb-4" role="alert">
                                        {{ \Session::get('success') }}
                                    </div>
                                    @endif
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama PIC TSI</th>
                                                    <th>Email</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pics as $pic)
                                                <tr>
                                                    <td>{{ $pic->name }}</td>
                                                    <td>{{ $pic->email }}</td>
                                                    <td>
                                                        <a href="/admin/{{ $pic->id }}}/reset-password" class="btn btn-primary btn-sm">Reset Password</a>
                                                    </td>
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
                                    <h4 class="h4">Pencarian PIC TSI</h4>
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

        </div>
    </div>
</x-app>