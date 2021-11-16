@extends("layouts.administrator.layout2")

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                MATA PELAJARAN
            </h2>
            <div style='text-align:right;'> <a href="{{ route('admin.home') }}"> Admin</a>/Pelajaran/Mata Pelajaran  </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="button-demo">
                        <a href="{{ route('admin.staf.matpel') }}" class="btn bg-red waves-effect">
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
                        <h2>ADD MATA PELAJARAN</h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" novalidate="novalidate" action="{{ route('admin.staf.storematpel') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line @error('nama_pelajaran') focused error @enderror">
                                    <input type="text" class="form-control" name="nama_pelajaran" required value="{{ old('nama_pelajaran') }}">
                                    <label class="form-label">Mata Pelajaran</label>
                                </div>
                                @error('nama_pelajaran')
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
