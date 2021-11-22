<x-app>
    <x-slot name="title">Login</x-slot>

    <x-slot name="auth">
        <link rel="stylesheet" href="/assets/css/pages/auth.css">
    </x-slot>

    <div id="auth">
        <div class="row h-100">
            <div class="offset-lg-4 col-lg-4 col-12 d-flex align-items-center">
                <div class="w-100">
                    <h1 class="h1">Login.</h1>
                    <p class="auth-subtitle mb-5">Masuk ke akun anda.</p>

                    <form action="" method="POST">
                        @csrf
                        <div class="mb-4">
                            <div class="form-group position-relative has-icon-left">
                                <input type="email" name="email" required class="form-control form-control-xl" placeholder="Email">
                                <div class="form-control-icon">
                                    <i class="bi bi-envelope"></i>
                                </div>
                            </div>
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <div class="form-group position-relative has-icon-left">
                                <input type="password" name="password" required class="form-control form-control-xl" placeholder="Password">
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="remember-me" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">Keep me logged in</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app>