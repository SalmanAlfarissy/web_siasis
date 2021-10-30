@extends("layouts.administrator.layout2")

@section("content")

<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <h2>
                KELAS
            </h2>
            <div style='text-align:right;'> <a href="{{ route('admin.home') }}"> Administrator Siasis Mobile </a>/  </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="button-demo">
                        <a href="{{ route('admin.staf.kelas') }}" class="btn bg-red waves-effect">Daftar Kelas</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>UPDATE KELAS</h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" novalidate="novalidate" action="{{ route('admin.staf.updatekelas',$edtstaf->id) }}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}

                            <div class="form-group form-float">
                                <div class="form-line @error('nama_kelas') focused error @enderror">
                                    <input type="text" class="form-control" name="nama_kelas" required value="{{ $edtstaf->nama_kelas }}">
                                    <label class="form-label">nama_kelas</label>
                                </div>
                                @error('nama_kelas')
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