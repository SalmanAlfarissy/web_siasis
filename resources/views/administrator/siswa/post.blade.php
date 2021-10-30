@extends("layouts.administrator.layout3")

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                SISWA
            </h2>
            <div style='text-align:right;'> <a href="{{ route('admin.home') }}"> Administrator Siasis Mobile </a>/ </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="button-demo">
                        <a href="{{ route('admin.staf.siswa') }}" class="btn bg-red waves-effect">Daftar Siswa</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>ADD SISWA</h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" novalidate="novalidate" action="{{ route('admin.staf.storesiswa') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line @error('nis') focused error @enderror">
                                    <input type="text" class="form-control" name="nis" required value="{{ old('nis') }}">
                                    <label class="form-label">NIS</label>
                                </div>
                                @error('nis')
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

                            <div class="row clearfix">
                                <div class="col-sm-12 @error('jurusan') focused error @enderror">
                                    <select class="form-control show-tick" name="jurusan">
                                        <option value="">-- Please select jurusan --</option>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                    </select>
                                </div>
                                @error('jurusan')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12 @error('kelas_id') focused error @enderror">
                                    <select class="form-control show-tick" name="kelas_id">
                                        <option value="">-- Please select kelas --</option>
                                        @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('kelas_id')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12 @error('staf_id') focused error @enderror">
                                    <select class="form-control show-tick" name="staf_id">
                                        <option value="">-- Please select wali kelas --</option>
                                        @foreach ($staf as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @error('staf_id')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12 @error('status') focused error @enderror">
                                    <select class="form-control show-tick" name="status">
                                        <option value="">-- Please select status --</option>
                                        <option value="Siswa">Siswa</option>
                                        <option value="Alumni">Alumni</option>
                                    </select>
                                </div>
                                @error('status')
                                    <label class="error">{{ $message }}</label>
                                @enderror
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

                            <div class="form-group">
                                <input type="file" id="foto_siswa" name="foto_siswa"  value="{{ old('foto_siswa') }}">
                                @error('foto_siswa')
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
