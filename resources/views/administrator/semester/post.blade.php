@extends("layouts.administrator.layout3")

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                SEMESTER
            </h2>
            <div style='text-align:right;'> <a href="{{ route('admin.home') }}"> Administrator Siasis Mobile </a>/ </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="button-demo">
                        <a href="{{ route('admin.staf.semester') }}" class="btn bg-red waves-effect">Daftar Semester</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>ADD SEMESTER</h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" novalidate="novalidate" action="{{ route('admin.staf.storesemester') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line @error('tahun') focused error @enderror">
                                    <input type="text" class="form-control" name="tahun" required value="{{ old('tahun') }}">
                                    <label class="form-label">Tahun</label>
                                </div>
                                @error('tahun')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line @error('semester') focused error @enderror">
                                    <input type="text" class="form-control" name="semester" required value="{{ old('semester') }}">
                                    <label class="form-label">Semester</label>
                                </div>
                                @error('semester')
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
