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
                                                    <h6 class="font-extrabold mb-0">112</h6>
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
                                                    <h6 class="text-muted font-semibold">Pengunjung</h6>
                                                    <h6 class="font-extrabold mb-0">183</h6>
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
                                                    <h6 class="font-extrabold mb-0">80.000</h6>
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
                                            <a href="">Eksport data</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-lg">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Perusahaan</th>
                                                            <th>Jam Masuk</th>
                                                            <th>Jam Keluar</th>
                                                            <th>Keperluan</th>
                                                            <th>PIC</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>April</td>
                                                            <td>PT. Sentosa</td>
                                                            <td>12.00</td>
                                                            <td>14.30</td>
                                                            <td>Briefing</td>
                                                            <td>Anton</td>
                                                        </tr>
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
                                    <h4>Ruangan</h4>
                                </div>
                                <div class="card-content pb-4">
                                    <div class="recent-message d-flex px-4 py-3">
                                        <div class="stats-icon green rounded-circle text-light">
                                            <i class="bi-door-open"></i>
                                        </div>
                                        <div class="name ms-4">
                                            <h5 class="mb-1">Ruangan A</h5>
                                            <h6 class="text-muted mb-0">John</h6>
                                        </div>
                                    </div>
                                    <div class="recent-message d-flex px-4 py-3">
                                        <div class="stats-icon green rounded-circle text-light">
                                            <i class="bi-door-open"></i>
                                        </div>
                                        <div class="name ms-4">
                                            <h5 class="mb-1">Ruangan B</h5>
                                            <h6 class="text-muted mb-0">Dendi</h6>
                                        </div>
                                    </div>
                                    <div class="recent-message d-flex px-4 py-3">
                                        <div class="stats-icon red rounded-circle text-light">
                                            <i class="bi-door-closed"></i>
                                        </div>
                                        <div class="name ms-4">
                                            <h5 class="mb-1">Ruangan C <span class="h6">(closed)</span></h5>
                                            <h6 class="text-muted mb-0">Ihsan</h6>
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
                series: [{
                    name: 'Ruangan A',
                    data: [44, 55, 41, 67, 22, 43]
                }, {
                    name: 'Ruangan B',
                    data: [13, 23, 20, 8, 13, 27]
                }, {
                    name: 'Ruangan C',
                    data: [11, 17, 15, 15, 21, 14]
                }, {
                    name: 'Ruangan D',
                    data: [21, 7, 25, 13, 22, 8]
                }],
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
                    categories: ['01/01/2011 GMT', '01/02/2011 GMT', '01/03/2011 GMT', '01/04/2011 GMT',
                        '01/05/2011 GMT', '01/06/2011 GMT'
                    ],
                },
                legend: {
                    position: 'right',
                    offsetY: 40
                },
                fill: {
                    opacity: 1
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-penggunaan-ruangan"), options);
            chart.render();
        </script>
        <script>
            var options = {
                series: [44, 55, 13, 43, 22],
                chart: {
                    width: 260,
                    type: 'pie',
                },
                labels: ['Perusahaan A', 'Perusahaan B', 'Perusahaan C', 'Perusahaan D', 'Perusahaan E'],
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