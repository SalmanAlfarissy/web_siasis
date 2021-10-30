@extends("layouts.administrator.layout5")

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                INFORMASI
            </h2>
            <div style='text-align:right;'> <a href="{{ route('admin.home') }}"> Administrator Siasis Mobile </a>/ </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="button-demo">
                        <a href="{{ route('admin.staf.informasi') }}" class="btn bg-red waves-effect">Daftar Informasi</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>ADD INFORMASI</h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" novalidate="novalidate" action="{{ route('admin.staf.updateinformasi',$edtinformasi->id) }}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}

                            <div class="form-group form-float">
                                <div class="form-line @error('judul_info') focused error @enderror">
                                    <input type="text" class="form-control" name="judul_info" required value="{{ $edtinformasi->judul_info }}">
                                    <label class="form-label">Judul</label>
                                </div>
                                @error('judul_info')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>

                        <!-- CKEditor -->
                        <textarea id="ckeditor" name="isi_info"><?= $edtinformasi->isi_info ?>
                        </textarea>
                        <!-- #END# CKEditor --><br/>
                            <div class="form-group">
                                    <input type="file" id="gambar_info" name="gambar_info"  value="{{ asset('gambar/informasi/'.$edtinformasi->gambar_info) }}">
                                    @error('gambar_info')
                                        <label class="error">{{ $message }}</label>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('gambar/informasi/'.$edtinformasi->gambar_info)}}" height="10%" width="20%" alt="" srcset="">
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
