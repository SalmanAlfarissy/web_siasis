@extends("layouts.siswa.layout2")
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
                            <img src="{{ asset('gambar/siswa/'.session('siswa.foto_siswa')) }}" alt="AdminBSB - Profile Image" width="60%" height="40%"/>
                        </div>
                        <div class="content-area">
                            <h3>{{ session('siswa.nama') }}</h3>
                            <p>{{ $siswa->jurusan }}</p>
                            <p>{{ $siswa->kelas }}</p>
                            <p>{{ session('siswa.status') }}</p>
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
                                            <label class="col-sm-2 control-label" >Tempat, Tanggal Lahir</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $siswa->tempat_lahir }}, {{ $siswa->tgl_lahir }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $siswa->gender }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Alamat Lengkap</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $siswa->alamat }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Email</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $siswa->email }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Jurusan</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ (empty($siswa->jurusan)) ? '-' : $siswa->jurusan }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Status</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $siswa->status }}" required disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                    <form class="form-horizontal" method="POST" action="{{ route('siswa.updateprofile',session('siswa.id')) }}" enctype="multipart/form-data">
                                        @csrf
                                        {{ method_field('PUT') }}

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Nama</label>
                                            <div class="col-sm-10">
                                                <div class="form-line @error('nama') focused error @enderror">
                                                    <input type="text" class="form-control" value="{{ $siswa->nama }}" required name="nama">
                                                </div>
                                                @error('nama')
                                                    <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="radio" name="gender" id="pria" value="pria" class="with-gap" {{ ($siswa->gender === 'pria')  ? 'checked' : ''  }}>
                                                    <label for="pria">pria</label>
                                                    <input type="radio" name="gender" id="wanita" value="wanita" class="with-gap" {{ ($siswa->gender === 'wanita')  ? 'checked' : '' }}>
                                                    <label for="wanita" class="m-l-20">wanita</label>
                                                        @error('gender')
                                                            <label class="error">{{ $message }}</label>
                                                        @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="InputExperience" class="col-sm-2 control-label">Alamat Lengkap</label>

                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <textarea class="form-control" id="InputExperience" name="alamat" rows="3">{{ $siswa->alamat }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Email</label>
                                            <div class="col-sm-10">
                                                <div class="form-line @error('email') focused error @enderror">
                                                    <input type="text" class="form-control" value="{{ $siswa->email }}" name="email" required>
                                                </div>
                                                @error('email')
                                                <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Tempat Lahir</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" value="{{ $siswa->tempat_lahir }}" name="tempat_lahir" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Tanggal Lahir</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control datepicker" value="{{ $siswa->tgl_lahir }}" name="tgl_lahir" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <input type="file" id="foto_siswa" name="foto_siswa" value="{{ asset('gambar/siswa/'.$siswa->foto_siswa) }}">
                                                @error('foto_siswa')
                                                    <label class="error">{{ $message }}</label>
                                                @enderror
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
                                    <form class="form-horizontal" method="POST" action="{{ route('siswa.changepass',session('siswa.id')) }}">
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
                                            <label class="col-sm-2 control-label" >Tempat, Tanggal Lahir</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $siswa->tempat_lahir }}, {{ $siswa->tgl_lahir }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $siswa->gender }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Alamat Lengkap</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $siswa->alamat }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Email</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $siswa->email }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Jurusan</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ (empty($siswa->jurusan)) ? '-' : $siswa->jurusan }}" required disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Status</label>
                                            <div class="col-sm-10">
                                                <div class="form">
                                                    <input type="text" class="form-control" value="{{ $siswa->status }}" required disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                    <form class="form-horizontal" method="POST" action="{{ route('siswa.updateprofile',session('siswa.id')) }}" enctype="multipart/form-data">
                                        @csrf
                                        {{ method_field('PUT') }}

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Nama</label>
                                            <div class="col-sm-10">
                                                <div class="form-line @error('nama') focused error @enderror">
                                                    <input type="text" class="form-control" value="{{ $siswa->nama }}" required name="nama">
                                                </div>
                                                @error('nama')
                                                    <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="radio" name="gender" id="pria" value="pria" class="with-gap" {{ ($siswa->gender === 'pria')  ? 'checked' : ''  }}>
                                                    <label for="pria">pria</label>
                                                    <input type="radio" name="gender" id="wanita" value="wanita" class="with-gap" {{ ($siswa->gender === 'wanita')  ? 'checked' : '' }}>
                                                    <label for="wanita" class="m-l-20">wanita</label>
                                                        @error('gender')
                                                            <label class="error">{{ $message }}</label>
                                                        @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="InputExperience" class="col-sm-2 control-label">Alamat Lengkap</label>

                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <textarea class="form-control" id="InputExperience" name="alamat" rows="3" >{{ $siswa->alamat }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Email</label>
                                            <div class="col-sm-10">
                                                <div class="form-line @error('email') focused error @enderror">
                                                    <input type="text" class="form-control" value="{{ $siswa->email }}" name="email" required>
                                                </div>
                                                @error('email')
                                                <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Tempat Lahir</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" value="{{ $siswa->tempat_lahir }}" name="tempat_lahir" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" >Tanggal Lahir</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control datepicker" value="{{ $siswa->tgl_lahir }}" name="tgl_lahir" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <input type="file" id="foto_siswa" name="foto_siswa" value="{{ asset('gambar/siswa/'.$siswa->foto_siswa) }}">
                                                @error('foto_siswa')
                                                    <label class="error">{{ $message }}</label>
                                                @enderror
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
                                    <form class="form-horizontal" method="POST" action="{{ route('siswa.changepass',session('siswa.id')) }}">
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

