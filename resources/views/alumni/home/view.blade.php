@extends('layouts.alumni.layout')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card" style="margin-bottom: 10px;"  >
                    <div class="body">
                            <div class="carousel-inner" role="listbox" align="center">
                                <div class="item active">
                                    <img src="{{ asset('gambar/informasi/'.$event->gambar_info) }}" width="50%" height="50%" />
                                </div>
                            </div>
                            <p class="lead" align="center">
                                {!! $event->judul_info !!}
                            </p>
                            <p>
                                {!! $event->isi_info !!}
                            </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
