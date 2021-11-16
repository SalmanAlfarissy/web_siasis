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
                            <span>Kembali</span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>UPDATE ADMINISTRATOR</h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" novalidate="novalidate" action="{{ route('admin.staf.updateguru',$edtstaf->id) }}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}

                            <div class="form-group form-float">
                                <div class="form-line @error('nis') focused error @enderror">
                                    <input type="text" class="form-control" name="nip" required value="{{ $edtstaf->nip }}" disabled>
                                    <label class="form-label">NIS</label>
                                </div>
                                @error('nip')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line @error('nama') focused error @enderror">
                                    <input type="text" class="form-control" name="nama" required value="{{ $edtstaf->nama }}">
                                    <label class="form-label">Nama</label>
                                </div>
                                @error('nama')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="jabatan" required value="{{ $edtstaf->jabatan }}">
                                    <label class="form-label">Jabatan</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="pangkat_gol" required value="{{ $edtstaf->pangkat_gol }}">
                                    <label class="form-label">Pangkat/gol</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line @error('email') focused error @enderror">
                                    <input type="email" class="form-control" name="email" required value="{{ $edtstaf->email }}">
                                    <label class="form-label">Email</label>
                                </div>
                                @error('email')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group">

                                <input type="radio" name="gender" id="pria" value="pria" class="with-gap" {{ ($edtstaf->gender === 'pria')  ? 'checked' : ''  }}>
                                <label for="pria">pria</label>

                                <input type="radio" name="gender" id="wanita" value="wanita" class="with-gap" {{ ($edtstaf->gender === 'wanita')  ? 'checked' : '' }}>
                                <label for="wanita" class="m-l-20">wanita</label>

                                @error('gender')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea name="alamat" cols="30" rows="5" class="form-control no-resize" required aria-required="true">{{ $edtstaf->alamat }}</textarea>
                                    <label class="form-label">Alamat</label>
                                </div>
                            </div>
                            {{-- <div class="form-group form-float">
                                <div class="form-line @error('password') focused error @enderror">
                                    <input type="password" class="form-control" name="password" id="inputPassword" required value="{{ $decrypted }}">
                                    <label class="form-label">Password</label>
                                </div>
                                @error('password')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                                <div class="form-group">
                                    <input type="checkbox" id="checkbox" name="checkbox" onclick="myFunction();">
                                    <label for="checkbox">Show Password</label>
                                </div>
                            </div> --}}

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="tempat_lahir" required value="{{ $edtstaf->tempat_lahir }}">
                                    <label class="form-label">Tempat Lahir</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control datepicker" name="tgl_lahir" required value="{{ $edtstaf->tgl_lahir }}">
                                    <label class="form-label">Tanggal Lahir</label>
                                </div>
                            </div>

                            <div class="form-group">
                                    <input type="file" id="foto_guru" name="foto_guru"  value="{{ asset('gambar/administrator/'.$edtstaf->foto_guru) }}">
                                    @error('foto_guru')
                                        <label class="error">{{ $message }}</label>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <img src="{{ asset('gambar/administrator/'.$edtstaf->foto_guru)}}" height="10%" width="20%" alt="" srcset="">
                            </div>

                            <button class="btn btn-primary waves-effect" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
