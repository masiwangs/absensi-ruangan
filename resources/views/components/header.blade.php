<header class="mb-5">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a class="h4" href="index.html">Absensi Ruangan</a>
            </div>
            <div class="header-top-right">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
        </div>
    </div>
    @if($without != 'navbar')
    <nav class="main-navbar">
        <div class="container">
            <ul>
                <li class="menu-item  ">
                    <a href="/admin" class='menu-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-item  has-sub">
                    <a href="#" class='menu-link'>
                        <i class="bi bi-list-columns-reverse"></i>
                        <span>Log</span>
                    </a>
                    <div class="submenu ">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">
                                <li class="submenu-item ">
                                    <a href="#" class='submenu-link'>Semua Log</a> 
                                </li>
                                <li class="submenu-item ">
                                    <a href="/" class='submenu-link'>Log Baru</a> 
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="menu-item active has-sub">
                    <a href="#" class='menu-link'>
                        <i class="bi bi-door-open"></i>
                        <span>Ruangan</span>
                    </a>
                    <div class="submenu ">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">
                                <li class="submenu-item  ">
                                    <a href="#" class='submenu-link'>Manajemen Ruangan</a> 
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="menu-item  has-sub">
                    <a href="#" class='menu-link'>
                        <i class="bi bi-person-badge-fill"></i>
                        <span>PIC</span>
                    </a>
                    <div class="submenu ">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">
                                <li class="submenu-item  ">
                                    <a href="#" class='submenu-link'>Manajemen PIC</a> 
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    @endif
</header>