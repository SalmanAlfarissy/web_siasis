<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <form action="{{ route('staf.logout') }}" method="get">
            @csrf
            <div class="user-info">
                <div class="image">
                    <img src="{{ asset('gambar/administrator/'.session('guru.foto_guru')) }}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ session('guru.nama') }}</div>
                    <div class="email">{{ session('guru.email') }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a><button type="submit" style="border:none; background-color: transparent; "><i class="material-icons">logout</i>Sign Out</button></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
            <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="{{ ($page == 'home') ? 'active' : '' }}">
                    <a href="{{ route('guru.home') }}">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="{{ ($page == 'Siswa') ? 'active' : '' }}">
                    <a href="{{ route('guru.siswa') }}">
                        <i class="material-icons">people</i>
                        <span>Siswa</span>
                    </a>
                </li>
                <li class="{{ ($page == 'JadwalPelajaran') ? 'active' : '' }}">
                    <a href="{{ route('guru.pelajaran') }}">
                        <i class="material-icons">event</i>
                        <span>Jadwal</span>
                    </a>
                </li>

                <li class="{{ ($page == 'Raport') ? 'active' : '' }}">
                    <a href="{{ route('guru.raport') }}">
                        <i class="material-icons">assessment</i>
                        <span>Raport</span>
                    </a>
                </li>

                <li class="{{ ($page == 'Alumni') ? 'active' : '' }}">
                    <a href="{{ route('guru.alumni') }}">
                        <i class="material-icons">school</i>
                        <span>Alumni</span>
                    </a>
                </li>

                <li class="{{ ($page == 'Guru') ? 'active' : '' }}">
                    <a href="{{ route('guru.guru') }}">
                        <i class="material-icons">account_balance_wallet</i>
                        <span>Guru</span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- #Menu -->
        <!-- Footer -->
        @include('layouts.administrator.footer')
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->

</section>
