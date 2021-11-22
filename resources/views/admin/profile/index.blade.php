<x-app>
    <x-slot name="title">Profile Admin</x-slot>

    <div id="app">
        <div id="main" class="layout-horizontal">
            <x-header></x-header>

            <div class="content-wrapper container">

                <div class="page-heading">
                    <h3>Profile</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-12 col-lg-9">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="h4">Informasi Profil</h4>
                                </div>
                                <div class="card-body">
                                    @if(\Session::has('success'))
                                    <div class="alert alert-success mb-4" role="alert">
                                        {{ \Session::get('success') }}
                                    </div>
                                    @endif
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nama</label>
                                            <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control form-control-sm" id="">
                                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Email</label>
                                            <input type="text" name="email" value="{{ auth()->user()->email }}" class="form-control form-control-sm" id="">
                                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <input type="submit" value="Simpan" class="btn btn-sm btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="h4">Menu Profil</h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-2">
                                        <a href="/admin/profile" class="text-primary">Informasi profil</a>
                                    </div>
                                    <div class="mb-2">
                                        <a href="/admin/profile/keamanan" class="text-primary">Keamanan</a>
                                    </div>
                                    <div class="mb-2">
                                        <a href="/logout" class="text-danger">Logout</a>
                                    </div>
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