@extends("layouts.alumni.layout2")
@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-3">
                <div class="card profile-card">

                    @if (session()->has('success'))
                        <div class="alert bg-green alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="media image-area">
                            <img src="{{ asset('gambar/siswa/'.session('alumni.foto_siswa')) }}" alt="AdminBSB - Profile Image" width="60%" height="40%"/>
                        </div>
                        <div class="content-area">
                            <h3>{{ session('alumni.nama') }}</h3>
                            <p>{{ $siswa->jurusan }}</p>
                            <p>{{ $siswa->kelas }}</p>
                            <p>{{ session('alumni.status') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                @if (session()->has('error'))
                                    <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Profile</a></li>
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation" class="active"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                @else
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Profile</a></li>
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>

                                @endif

                            </ul>

                            <div class="tab-content">
                                @if (session()->has('error'))
                                <div role="tabpanel" class="tab-pane fade in" id="home">

                                    <form class="form-horizontal">

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Nama</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $siswa->nama }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >NIS</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $siswa->nis }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Pekerjaan</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $alumni->pekerjaan }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Jabatan</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $alumni->jabatan }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Nama Instansi</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $alumni->nama_univ_kantor }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Jurursan</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $alumni->jurusan }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Tahun Mulai - Selesai</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $alumni->tahun_mulai }} - {{ $alumni->tahun_selesai }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Alamat Instansi</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $alumni->alamat_kantor }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                    <form class="form-horizontal" method="POST" action="{{ route('alumni.updateprofile',session('alumni.id')) }}" enctype="multipart/form-data">
                                        @csrf
                                        {{ method_field('PUT') }}

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Pekerjaan</label>
                                            <div class="col-sm-10">
                                                <div class="form-line @error('pekerjaan') focused error @enderror">
                                                    <input type="text" class="form-control" value="{{ $alumni->pekerjaan }}" required name="pekerjaan">
                                                </div>
                                                @error('pekerjaan')
                                                    <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Nama Instansi</label>
                                            <div class="col-sm-10">
                                                <div class="form-line @error('nama_univ_kantor') focused error @enderror">
                                                    <input type="text" class="form-control" value="{{ $alumni->nama_univ_kantor }}" required name="nama_univ_kantor">
                                                </div>
                                                @error('nama_univ_kantor')
                                                    <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Jurusan</label>
                                            <div class="col-sm-10">
                                                <div class="form-line @error('jurusan') focused error @enderror">
                                                    <input type="text" class="form-control" value="{{ $alumni->jurusan }}" required name="jurusan">
                                                </div>
                                                @error('jurusan')
                                                    <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Jabatan</label>
                                            <div class="col-sm-10">
                                                <div class="form-line @error('jabatan') focused error @enderror">
                                                    <input type="text" class="form-control" value="{{ $alumni->jabatan }}" required name="jabatan">
                                                </div>
                                                @error('jabatan')
                                                    <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Tahun Mulai</label>
                                            <div class="col-sm-10">
                                                <div class="form-line @error('tahun_mulai') focused error @enderror">
                                                    <input type="text" class="form-control" value="{{ $alumni->tahun_mulai }}" required name="tahun_mulai">
                                                </div>
                                                @error('tahun_mulai')
                                                    <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Tahun Selesai</label>
                                            <div class="col-sm-10">
                                                <div class="form-line @error('tahun_selesai') focused error @enderror">
                                                    <input type="text" class="form-control" value="{{ $alumni->tahun_selesai }}" required name="tahun_selesai">
                                                </div>
                                                @error('tahun_selesai')
                                                    <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="InputExperience" class="col-sm-2 control-label">Alamat Instansi</label>

                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <textarea class="form-control" id="InputExperience" name="alamat_kantor" rows="3">{{ $alumni->alamat_kantor }}</textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">SUBMIT</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade in active" id="change_password_settings">
                                    <form class="form-horizontal" method="POST" action="{{ route('alumni.changepass',session('alumni.id')) }}">
                                        @csrf
                                        {{ method_field('PUT') }}

                                        <div class="form-group">
                                            <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Old Password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="New Password (Confirm)" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-danger">SUBMIT</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @else

                                <div role="tabpanel" class="tab-pane fade in active" id="home">

                                    <form class="form-horizontal">

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Nama</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $siswa->nama }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >NIS</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $siswa->nis }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Pekerjaan</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $alumni->pekerjaan }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Jabatan</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $alumni->jabatan }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Nama Instansi</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $alumni->nama_univ_kantor }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Jurursan</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $alumni->jurusan }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Tahun Mulai - Selesai</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $alumni->tahun_mulai }} - {{ $alumni->tahun_selesai }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Alamat Instansi</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $alumni->alamat_kantor }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                    <form class="form-horizontal" method="POST" action="{{ route('alumni.updateprofile',session('alumni.id')) }}" enctype="multipart/form-data">
                                        @csrf
                                        {{ method_field('PUT') }}

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Pekerjaan</label>
                                            <div class="col-sm-10">
                                                <div class="form-line @error('pekerjaan') focused error @enderror">
                                                    <input type="text" class="form-control" value="{{ $alumni->pekerjaan }}" required name="pekerjaan">
                                                </div>
                                                @error('pekerjaan')
                                                    <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Nama Instansi</label>
                                            <div class="col-sm-10">
                                                <div class="form-line @error('nama_univ_kantor') focused error @enderror">
                                                    <input type="text" class="form-control" value="{{ $alumni->nama_univ_kantor }}" required name="nama_univ_kantor">
                                                </div>
                                                @error('nama_univ_kantor')
                                                    <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Jurusan</label>
                                            <div class="col-sm-10">
                                                <div class="form-line @error('jurusan') focused error @enderror">
                                                    <input type="text" class="form-control" value="{{ $alumni->jurusan }}" required name="jurusan">
                                                </div>
                                                @error('jurusan')
                                                    <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Jabatan</label>
                                            <div class="col-sm-10">
                                                <div class="form-line @error('jabatan') focused error @enderror">
                                                    <input type="text" class="form-control" value="{{ $alumni->jabatan }}" required name="jabatan">
                                                </div>
                                                @error('jabatan')
                                                    <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Tahun Mulai</label>
                                            <div class="col-sm-10">
                                                <div class="form-line @error('tahun_mulai') focused error @enderror">
                                                    <input type="text" class="form-control" value="{{ $alumni->tahun_mulai }}" required name="tahun_mulai">
                                                </div>
                                                @error('tahun_mulai')
                                                    <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Tahun Selesai</label>
                                            <div class="col-sm-10">
                                                <div class="form-line @error('tahun_selesai') focused error @enderror">
                                                    <input type="text" class="form-control" value="{{ $alumni->tahun_selesai }}" required name="tahun_selesai">
                                                </div>
                                                @error('tahun_selesai')
                                                    <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="InputExperience" class="col-sm-2 control-label">Alamat Instansi</label>

                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <textarea class="form-control" id="InputExperience" name="alamat_kantor" rows="3">{{ $alumni->alamat_kantor }}</textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">SUBMIT</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                    <form class="form-horizontal" method="POST" action="{{ route('alumni.changepass',session('alumni.id')) }}">
                                        @csrf
                                        {{ method_field('PUT') }}

                                        <div class="form-group">
                                            <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Old Password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="New Password (Confirm)" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-danger">SUBMIT</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

