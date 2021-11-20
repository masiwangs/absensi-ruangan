<x-app>
    <x-slot name="title">Dashboard Admin</x-slot>

    <div id="app">
        <div id="main" class="layout-horizontal">
            <x-header></x-header>

            <div class="content-wrapper container">

                <div class="page-heading">
                    <h3>Ruangan</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-12 col-lg-9">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h4 class="h4">Daftar Ruangan</h4>
                                    <a href="{{ route('admin.ruangan.baru') }}" class="btn my-auto text-primary"><i class="bi bi-plus"></i> Ruangan Baru</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover" style="font-size: .8rem">
                                            <thead>
                                                <tr>
                                                    <th>Nama Ruangan</th>
                                                    <th>Ketersediaan</th>
                                                    <th>Penggunaan Semua Waktu</th>
                                                    <th>Bulan Ini</th>
                                                    <th>Minggu Ini</th>
                                                    <th>Hari Ini</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ruangans as $ruangan)
                                                <tr>
                                                    <td>{{ $ruangan->nama }}</td>
                                                    <td>
                                                        @if($ruangan->tersedia === 1)
                                                        <span class="text-success">
                                                            <i class="bi bi-check-circle-fill"></i>
                                                        </span>
                                                        @else
                                                        <span class="text-danger">
                                                            <i class="bi bi-x-circle-fill"></i>
                                                        </span>
                                                        @endif
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <a href="{{ route('admin.ruangan.edit', ['id' => $ruangan->id]) }}" class="btn btn-secondary btn-sm my-auto py-0">Edit</a>
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
                                    <h4 class="h4">Pencarian Ruangan</h4>
                                </div>
                                <div class="card-body">
                                    <form method="GET">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nama Ruangan</label>
                                            <input type="text" name="nama" value="{{ request()->nama }}" id="" class="form-control">
                                        </div>
                                        <div class="mb-4">
                                            <label for="" class="form-label">Ketersediaan</label>
                                            <select class="form-select" name="tersedia" aria-label="Default select example">
                                                <option @if(request()->tersedia == '') selected @endif value="">Semua</option>
                                                <option @if(request()->tersedia == 'ya') selected @endif value="ya">Tersedia</option>
                                                <option @if(request()->tersedia == 'tidak') selected @endif value="tidak">Tidak Tersedia</option>
                                            </select>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('admin.ruangan.index') }}" class="btn btn-light me-2">Reset</a>
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