@extends("layouts.administrator.layout2")

@section("content")

<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <h2>
                MATA PELAJARAN
            </h2>
            <div style='text-align:right;'> <a href="{{ route('admin.home') }}"> Administrator Siasis Mobile </a>/  </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="button-demo">
                        <a href="{{ route('admin.staf.matpel') }}" class="btn bg-red waves-effect">Daftar Mata Pelajaran</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>UPDATE MATA PELAJARAN</h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" novalidate="novalidate" action="{{ route('admin.staf.updatematpel',$edtmatpel->id) }}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}

                            <div class="form-group form-float">
                                <div class="form-line @error('nama_pelajaran') focused error @enderror">
                                    <input type="text" class="form-control" name="nama_pelajaran" required value="{{ $edtmatpel->nama_pelajaran }}">
                                    <label class="form-label">nama_pelajaran</label>
                                </div>
                                @error('nama_pelajaran')
                                    <label class="error">{{ $message }}</label>
                                @enderror
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
