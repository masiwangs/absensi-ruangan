<x-app>
    <x-slot name="title">Export Log</x-slot>

    <div id="app">
        <div id="main" class="layout-horizontal">
            <x-header></x-header>

            <div class="content-wrapper container">

                <div class="page-heading">
                    <h3>Export Log Penggunaan Ruangan</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-12 col-lg-9">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h4 class="h4">Preview Export</h4>
                                    <form action="" method="POST">
                                        @csrf
                                        <input type="hidden" name="ruangan" value="{{ request()->ruangan }}">
                                        <input type="hidden" name="date" value="{{ request()->date }}">
                                        <button type="submit" class="btn btn-sm btn-primary my-auto"><i class="bi bi-plus"></i> Export sekarang</button>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover" style="font-size: .8rem">
                                            <thead>
                                                <tr>
                                                    <td colspan="9" class="text-center" style="font-size: 1rem; border: 0">Data Center Log Indonesia Eximbank</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9" class="text-center" style="font-size: 1rem; border:0">
                                                        @if (request()->ruangan)
                                                        Ruang {{ $ruangan->nama }}
                                                        @else
                                                        Semua ruangan
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9" class="text-center" style="font-size: 1rem">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>No.KTP</th>
                                                    <th>Nama</th>
                                                    <th>No. HP</th>
                                                    <th>Perusahaan/Institusi</th>
                                                    <th>Jam Masuk</th>
                                                    <th>Jam Keluar</th>
                                                    <th>Keperluan</th>
                                                    <th>PIC TSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($logs as $log)
                                                <tr>
                                                    <td class="text-nowrap">{{ date('d M Y', strtotime($log->tanggal)) }}</td>
                                                    <td>{{ $log->ktp }}</td>
                                                    <td>{{ $log->nama_visitor }}</td>
                                                    <td>{{ $log->hp }}</td>
                                                    <td>{{ $log->nama_perusahaan }}</td>
                                                    <td>{{ $log->jam_masuk }}</td>
                                                    <td>{{ $log->jam_keluar }}</td>
                                                    <td>{{ $log->keperluan }}</td>
                                                    <td>{{ $log->pic->name }}</td>
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
                                    <h4 class="h4">Pilih Data</h4>
                                </div>
                                <div class="card-body">
                                    <form method="GET">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nama Ruangan</label>
                                            <input name="ruangan" value="{{ request()->ruangan }}" class="form-control form-control-sm" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                                            <datalist id="datalistOptions">
                                                @foreach ($ruangans as $ruangan)
                                                <option value="{{ $ruangan->nama }}">
                                                @endforeach
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Tanggal</label>
                                            <input type="date" name="date" value="{{ request()->date }}" class="form-control form-control-sm">
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('admin.log.export') }}" class="btn me-2 btn-light btn-sm">Reset</a>
                                            <input type="submit" value="Preview" class="btn btn-sm btn-primary">
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