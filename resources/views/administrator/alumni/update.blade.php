@extends("layouts.administrator.layout3")

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                ALUMNI
            </h2>
            <div style='text-align:right;'> <a href="{{ route('admin.home') }}"> Administrator Siasis Mobile </a>/ </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="button-demo">
                        <a href="{{ route('admin.staf.alumni') }}" class="btn bg-red waves-effect">Daftar Alumni</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>UPDATE ALUMNI</h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" novalidate="novalidate" action="{{ route('admin.staf.updatealumni',$edtalumni->id) }}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}

                            <div class="row clearfix">
                                <div class="col-sm-12 @error('siswa_id') focused error @enderror">
                                    <select class="form-control show-tick" name="siswa_id">
                                        <option value="{{ $edtalumni->siswa_id }}">{{ $edtalumni->nama }}</option>
                                        @foreach ($siswa as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('siswa_id')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line @error('pekerjaan') focused error @enderror">
                                    <input type="text" class="form-control" name="pekerjaan" required value="{{ $edtalumni->pekerjaan }}">
                                    <label class="form-label">Pekerjaan</label>
                                </div>
                                @error('pekerjaan')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line @error('jabatan') focused error @enderror">
                                    <input type="text" class="form-control" name="jabatan" required value="{{ $edtalumni->jabatan }}">
                                    <label class="form-label">Jabatan</label>
                                </div>
                                @error('jabatan')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line @error('tahun_lulus') focused error @enderror">
                                    <input type="text" class="form-control" name="tahun_lulus" required value="{{ $edtalumni->tahun_lulus }}">
                                    <label class="form-label">Tahun Lulus</label>
                                </div>
                                @error('tahun_lulus')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line @error('jurusan') focused error @enderror">
                                    <input type="text" class="form-control" name="jurusan" required value="{{ $edtalumni->jurusan }}">
                                    <label class="form-label">Jurusan</label>
                                </div>
                                @error('jurusan')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line @error('email') focused error @enderror">
                                    <input type="text" class="form-control" name="email" required value="{{ $edtalumni->email }}">
                                    <label class="form-label">Email</label>
                                </div>
                                @error('jurusan')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line @error('nohp') focused error @enderror">
                                    <input type="number" class="form-control" name="nohp" required value="{{ $edtalumni->nohp }}">
                                    <label class="form-label">NoHp</label>
                                </div>
                                @error('nohp')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line @error('nama_univ') focused error @enderror">
                                    <input type="text" class="form-control" name="nama_univ" required value="{{ $edtalumni->nama_univ }}">
                                    <label class="form-label">Nama Universitas</label>
                                </div>
                                @error('nama_univ')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea name="alamat" cols="30" rows="5" class="form-control no-resize" required="" aria-required="true">{{ $edtalumni->alamat}}</textarea>
                                    <label class="form-label">Alamat</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="file" id="foto" name="foto"  value="{{ old('foto') }}">
                                @error('foto')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                        </div>
                        <div class="form-group">
                            <img src="{{ asset('gambar/alumni/'.$edtalumni->foto)}}" height="10%" width="20%" alt="" srcset="">
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
