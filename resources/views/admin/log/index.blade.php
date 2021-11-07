<x-app>
    <x-slot name="title">Dashboard Admin</x-slot>

    <div id="app">
        <div id="main" class="layout-horizontal">
            <x-header></x-header>

            <div class="content-wrapper container">

                <div class="page-heading">
                    <h3>Log Penggunaan Ruangan</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-12 col-lg-9">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h4 class="h4">Semua Log</h4>
                                    <a href="{{ route('home') }}" class="btn my-auto text-primary"><i class="bi bi-plus"></i> Log Baru</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover" style="font-size: .8rem">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Ruangan</th>
                                                    <th>Nama Pengguna</th>
                                                    <th>Perusahaan</th>
                                                    <th>Jam Masuk</th>
                                                    <th>Jam Keluar</th>
                                                    <th>Keperluan</th>
                                                    <th>PIC</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($logs as $log)
                                                <tr>
                                                    <td class="text-nowrap">{{ date('d F Y', strtotime($log->jam_masuk)) }}</td>
                                                    <td class="text-nowrap">{{ $log->ruangan->nama }}</td>
                                                    <td>{{ $log->nama_visitor }}</td>
                                                    <td>{{ $log->nama_perusahaan }}</td>
                                                    <td>{{ date('H:i:s', strtotime($log->jam_masuk)) }}</td>
                                                    <td>{{ $log->jam_keluar ? date('H:i:s', strtotime($log->jam_keluar)) : '-' }}</td>
                                                    <td style="min-width: 150px">{{ $log->keperluan }}</td>
                                                    <td class="text-nowrap">{{ $log->pic->name }}</td>
                                                    <td>
                                                        <p class="text-nowrap">
                                                            <a class="btn btn-sm my-auto py-0 px-1 btn-primary @if($log->jam_keluar) disabled @endif" href="{{ route('admin.log.keluar', ['id' => $log->id]) }}">Keluar</a>
                                                            <span> | </span>
                                                            <a class="btn btn-sm my-auto py-0 px-1 btn-secondary" href="{{ route('admin.log.edit', ['id' => $log->id]) }}">Edit</a>
                                                            <span> | </span>
                                                            <a class="btn btn-sm my-auto py-0 px-1 btn-danger" href="">Hapus</a>
                                                        </p>
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
                                    <h4 class="h4">Pencarian</h4>
                                </div>
                                <div class="card-body">
                                    <form method="GET">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nama Ruangan</label>
                                            <input name="ruangan" value="{{ request()->ruangan }}" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                                            <datalist id="datalistOptions">
                                                @foreach ($ruangans as $ruangan)
                                                <option value="{{ $ruangan->nama }}">
                                                @endforeach
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nama Pengguna</label>
                                            <input type="text" name="" id="" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nama PIC</label>
                                            <input type="text" name="" id="" class="form-control">
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