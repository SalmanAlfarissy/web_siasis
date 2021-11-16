@extends("layouts.administrator.layout4")

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                JADWAL PELAJARAN
            </h2>
            <div style='text-align:right;'> <a href="{{ route('admin.home') }}"> Admin</a>/Pelajaran/Jadwal  </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="button-demo">
                        <a href="{{ route('admin.staf.jadwal') }}" class="btn bg-red waves-effect">
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
                        <h2>UPDATE JADWAL PELAJARAN</h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" novalidate="novalidate" action="{{ route('admin.staf.updatejadwal',$edtpelajaran->id) }}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}

                            <div class="row clearfix">
                                <div class="col-sm-12 @error('staf_id') focused error @enderror">
                                    <select class="form-control show-tick" name="staf_id">
                                        <option value="{{ $edtpelajaran->staf_id }}">{{ $edtpelajaran->guru }}</option>
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
                                <div class="col-sm-12 @error('kelas_id') focused error @enderror">
                                    <select class="form-control show-tick" name="kelas_id">
                                        <option value="{{ $edtpelajaran->kelas_id }}">{{ $edtpelajaran->kelas }}</option>
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
                                <div class="col-sm-12 @error('matpel_id') focused error @enderror">
                                    <select class="form-control show-tick" name="matpel_id">
                                        <option value="{{ $edtpelajaran->matpel_id }}">{{ $edtpelajaran->nama_pelajaran }}</option>
                                        @foreach ($matpel as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_pelajaran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('matpel_id')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>


                            <div class="row clearfix">
                                <div class="col-sm-12 @error('semester_id') focused error @enderror">
                                    <select class="form-control show-tick" name="semester_id">
                                        <option value="{{ $edtpelajaran->semester_id }}">{{ $edtpelajaran->semester }}</option>
                                        @foreach ($semester as $item)
                                        <option value="{{ $item->id }}">{{ $item->semester }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('semester_id')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line @error('kkm') focused error @enderror">
                                    <input type="number" class="form-control" name="kkm" required value="{{ $edtpelajaran->kkm }}">
                                    <label class="form-label">KKM</label>
                                </div>
                                @error('kkm')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12 @error('hari') focused error @enderror">
                                    <select class="form-control show-tick" name="hari">
                                        <option value="{{ $edtpelajaran->hari }}">{{ $edtpelajaran->hari }}</option>
                                        <option value="Senen">Senen</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                    </select>
                                </div>
                                @error('hari')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="demo-masked-input">
                                <div class="row clearfix">

                                    <div class="col-md-6">
                                        <b>Jadwal Masuk</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">access_time</i>
                                            </span>
                                            <div class="form-line @error('jadwal_masuk') focused error @enderror">
                                                <input type="text" class="form-control time24" name="jadwal_masuk" placeholder="23:59" value="{{ $edtpelajaran->jadwal_masuk }}">
                                            </div>
                                            @error('jadwal_masuk')
                                                <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Jadwal Keluar</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">access_time</i>
                                            </span>
                                            <div class="form-line @error('jadwal_keluar') focused error @enderror">
                                                <input type="text" class="form-control time24" name="jadwal_keluar" placeholder="23:59" value="{{ $edtpelajaran->jadwal_keluar }}">
                                            </div>
                                            @error('jadwal_keluar')
                                                <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
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
