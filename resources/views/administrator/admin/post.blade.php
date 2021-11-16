@extends("layouts.administrator.layout2")

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                ADMINISTRATOR
            </h2>
            <div style='text-align:right;'> <a href="{{ route('admin.home') }}"> Admin</a>/Staf/Administrator  </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="button-demo">
                        <a href="{{ route('admin.staf.admin') }}" class="btn bg-red waves-effect">
                            <i class="material-icons">forward</i>
                            <span>Kembali</span></a></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>ADD ADMINISTRATOR</h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" novalidate="novalidate" action="{{ route('admin.staf.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line @error('nip') focused error @enderror">
                                    <input type="text" class="form-control" name="nip" required value="{{ old('nip') }}">
                                    <label class="form-label">NIP</label>
                                </div>
                                @error('nip')
                                    <label class="error">{{ $message }}</label>
                                @enderror

                            </div>

                            <div class="form-group form-float">
                                <div class="form-line @error('nama') focused error @enderror">
                                    <input type="text" class="form-control" name="nama" required value="{{ old('nama') }}">
                                    <label class="form-label">Nama</label>
                                </div>
                                @error('nama')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="jabatan" required value="{{ old('jabatan') }}">
                                    <label class="form-label">Jabatan</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="pangkat_gol" required value="{{ old('pangkat_gol') }}">
                                    <label class="form-label">Pangkat/gol</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line @error('email') focused error @enderror">
                                    <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
                                    <label class="form-label">Email</label>
                                </div>
                                @error('email')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group">

                                <input type="radio" name="gender" id="pria" value="pria" class="with-gap" {{ (old('gender') === 'pria')  ? 'checked' : ''  }}>
                                <label for="pria">pria</label>

                                <input type="radio" name="gender" id="wanita" value="wanita" class="with-gap" {{ (old('gender') === 'wanita')  ? 'checked' : '' }}>
                                <label for="wanita" class="m-l-20">wanita</label>

                                @error('gender')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea name="alamat" cols="30" rows="5" class="form-control no-resize" required="" aria-required="true">{{ old('alamat') }}</textarea>
                                    <label class="form-label">Alamat</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line @error('password') focused error @enderror">
                                    <input type="password" class="form-control" name="password" id="inputPassword" required>
                                    <label class="form-label">Password</label>
                                </div>
                                @error('password')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                                <div class="form-group">
                                    <input type="checkbox" id="checkbox" name="checkbox" onclick="myFunction();">
                                    <label for="checkbox">Show Password</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="tempat_lahir" required value="{{ old('tempat_lahir') }}">
                                    <label class="form-label">Tempat Lahir</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control datepicker" name="tgl_lahir" required value="{{ old('tgl_lahir') }}">
                                    <label class="form-label">Tanggal Lahir</label>
                                </div>
                            </div>

                            <div class="form-group">
                                    <input type="file" id="foto_guru" name="foto_guru"  value="{{ old('foto_guru') }}">
                                    @error('foto_guru')
                                        <label class="error">{{ $message }}</label>
                                    @enderror
                            </div>

                            <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
