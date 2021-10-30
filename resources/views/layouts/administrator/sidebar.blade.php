<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <form action="{{ route('staf.logout') }}" method="get">
            @csrf
            <div class="user-info">
                <div class="image">
                    <img src="{{ asset('gambar/administrator/'.session('admin.foto_guru')) }}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ session('admin.nama') }}</div>
                    <div class="email">{{ session('admin.email') }}</div>
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
                    <a href="{{ route('admin.home') }}">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="{{ ($page == 'Administrator' || $page == 'Guru') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">view_list</i>
                        <span>Staf</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ ($page == 'Guru') ? 'active' : '' }}">
                            <a href="{{ route('admin.staf.guru') }}">Guru</a>
                        </li>
                        <li class="{{ ($page == 'Administrator') ? 'active' : '' }}">
                            <a href="{{ route('admin.staf.admin') }}">Administrator</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ ($page == 'Siswa') ? 'active' : '' }}">
                    <a href="{{ route('admin.staf.siswa') }}">
                        <i class="material-icons">people</i>
                        <span>Siswa</span>
                    </a>
                </li>

                <li class="{{ ($page == 'Kelas') ? 'active' : '' }}">
                    <a href="{{ route('admin.staf.kelas') }}">
                        <i class="material-icons">forum</i>
                        <span>Kelas</span>
                    </a>
                </li>

                <li class="{{ ($page == 'Semester' || $page == 'Matpel' || $page == 'JadwalPelajaran') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">event_note</i>
                        <span>Pelajaran</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ ($page == 'Semester') ? 'active' : '' }}">
                            <a href="{{ route('admin.staf.semester') }}">Semester</a>
                        </li>
                        <li class="{{ ($page == 'Matpel') ? 'active' : '' }}">
                            <a href="{{ route('admin.staf.matpel') }}">Mata Pelajaran</a>
                        </li>
                        <li class="{{ ($page == 'JadwalPelajaran') ? 'active' : '' }}">
                            <a href="{{ route('admin.staf.jadwal') }}">Jadwa Pelajaran</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ ($page == 'Informasi') ? 'active' : '' }}">
                    <a href="{{ route('admin.staf.informasi') }}">
                        <i class="material-icons">chrome_reader_mode</i>
                        <span>informasi</span>
                    </a>
                </li>

                <li class="{{ ($page == 'Alumni') ? 'active' : '' }}">
                    <a href="{{ route('admin.staf.alumni') }}">
                        <i class="material-icons">school</i>
                        <span>Data Alumni</span>
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
