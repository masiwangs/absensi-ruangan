<x-app>
    <x-slot name="title">Dashboard Admin</x-slot>

    <div id="app">
        <div id="main" class="layout-horizontal">
            <x-header></x-header>

            <div class="content-wrapper container">

                <div class="page-heading">
                    <h3>Dashboard</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-12 col-lg-9">
                            <div class="row">
                                <div class="col-6 col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon purple">
                                                        <i class="bi-door-open"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Ruangan</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $count_ruangan }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon blue">
                                                        <i class="bi-person"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Kunjungan</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $count_visitor }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon green">
                                                        <i class="bi-person-badge-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">PIC</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $count_pic }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Penggunaan Ruangan</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="chart-penggunaan-ruangan"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <h4>Log Terakhir</h4>
                                            <a class="text-primary" href="{{ route('admin.log.index') }}"><i class="bi bi-eye"></i> Lihat semua</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-lg" style="font-size: .8rem">
                                                    <thead>
                                                        <tr>
                                                            <th>Tanggal</th>
                                                            <th>Nama</th>
                                                            <th>Perusahaan</th>
                                                            <th>Jam Masuk</th>
                                                            <th>Jam Keluar</th>
                                                            <th>Keperluan</th>
                                                            <th>PIC</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($last_five_logs as $log)
                                                        <tr>
                                                            <td>{{ date('d M Y', strtotime($log->jam_masuk)) }}</td>
                                                            <td>{{ $log->nama_visitor }}</td>
                                                            <td>{{ $log->nama_perusahaan }}</td>
                                                            <td>{{ date('H:i', strtotime($log->jam_masuk)) }}</td>
                                                            <td>{{ $log->jam_keluar ? date('H:i', strtotime($log->jam_keluar)) : '-' }}</td>
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
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card">
                                <div class="card-body py-4 px-5">
                                    <div class="d-flex align-items-center">
                                        <div class="stats-icon red rounded-circle text-light">
                                            A
                                        </div>
                                        <div class="ms-3 name">
                                            <h5 class="font-bold">Hi, Admin!</h5>
                                            <h6 class="text-muted mb-0">Super Admin</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Visitors Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-visitors-profile"></div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Ruangan</h4>
                                </div>
                                <div class="card-content pb-4">
                                    @foreach ($ruangans as $ruangan)
                                    <div class="recent-message d-flex px-4 py-3">
                                        <div class="stats-icon {{ $ruangan->tersedia == 1 ? 'green' : 'red' }} rounded-circle text-light">
                                            <i class="bi-door-{{ $ruangan->tersedia == 1 ? 'open' : 'closed' }}"></i>
                                        </div>
                                        <div class="name ms-4">
                                            <h5 class="mb-1">{{ $ruangan->nama }}</h5>
                                            <h6 class="text-muted mb-0">{{ $ruangan->kapasitas }}</h6>
                                        </div>
                                    </div>
                                    @endforeach
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
    
    <x-slot name="foot">
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            var options = {
                series: [
                    @php
                        foreach($log_data as $log){
                            echo "{
                                name: 'Ruangan ".$log['ruangan']."',
                                data: ".json_encode($log['data'])."
                            }, ";
                        }
                    @endphp
                ],
                chart: {
                    type: 'bar',
                    height: 350,
                    stacked: true,
                    toolbar: {
                        show: true
                    },
                    zoom: {
                        enabled: true
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        legend: {
                            position: 'bottom',
                            offsetX: -10,
                            offsetY: 0
                        }
                    }
                }],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        borderRadius: 10
                    },
                },
                xaxis: {
                    type: 'datetime',
                    categories: @json($log_label),
                },
                legend: {
                    position: 'bottom',
                },
                fill: {
                    opacity: 1
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-penggunaan-ruangan"), options);
            chart.render();
        </script>
        @php
            $visitor_profile_label = [];
            $visitor_profile_value = [];
            foreach ($visitor_profile_data as $data) {
                array_push($visitor_profile_label, $data->nama_perusahaan);
                array_push($visitor_profile_value, $data->jumlah);
            }
        @endphp
        <script>
            var options = {
                series: @json($visitor_profile_value),
                chart: {
                    width: 260,
                    type: 'pie',
                },
                labels: @json($visitor_profile_label),
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                legend: {
                    show: false
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-visitors-profile"), options);
            chart.render();
        </script>
    </x-slot>
</x-app>