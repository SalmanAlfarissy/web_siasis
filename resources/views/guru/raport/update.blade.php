@extends("layouts.guru.layout4")

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                RAPORT
            </h2>
            <div style='text-align:right;'> <a href="{{ route('guru.home') }}"> Administrator Siasis Mobile </a>/ </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="button-demo">
                        <a href="{{ route('guru.raport') }}" class="btn bg-red waves-effect">Daftar Siswa</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Nama : {{ $siswa->nama }}<br/>
                            NIS  : {{ $siswa->nis }}
                        </h2>

                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" novalidate="novalidate" action="{{ route('guru.update',$siswa->id) }}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}

                            <input type="hidden" value="{{ $siswa->id }}" name="siswa">

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <b>Mata Pelajaran</b>
                                </div>

                                <div class="col-md-6">
                                    <b>Nilai</b>
                                </div>

                                @foreach ($raport as $index=>$item)
                                <input type="hidden" value="{{ $item->raport_id }}" name="raport_id[]">
                                <input type="hidden" value="{{ $item->pelajaran_id }}" name="pelajaran[]">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="{{ $item->pelajaran }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="nilai[]" value="{{ $item->nilai }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
