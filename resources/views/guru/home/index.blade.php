@extends('layouts.guru.layout')

@section('content')
<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card-image" style="margin-bottom: 10px;"  >
                    <div class="body" align="center">
                        <div id="carousel-example-generic_2" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->

                            <ol class="carousel-indicators">
                                @for ($i=0; $i<3; $i++)
                                @php
                                    if(empty($informasi[$i])) break;
                                @endphp
                                <li data-target="#carousel-example-generic_2" data-slide-to="{{ $i }}" @if($i==0) class="active" @endif></li>
                                @endfor
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                @for ($i=0; $i<3; $i++)
                                @php
                                    if(empty($informasi[$i])) break;
                                @endphp
                                <div class="item @if($i==0) active @endif">
                                    <img src="{{ asset('gambar/informasi/'.$informasi[$i]->gambar_info) }}" />
                                    <div class="carousel-caption">
                                        <h3>{{ $informasi[$i]->judul_info }}</h3>
                                    </div>
                                </div>
                                @endfor
                            </div>
                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic_2" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic_2" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="header">
                        <h2>
                            LIST EVENT
                        </h2>
                    </div>

                    <div class="body">
                        @foreach ($informasi as $item)
                        <div class="bs-example" data-example-id="media-alignment">
                            <div class="media">
                                <div class="media-left">
                                    <a href="javascript:void(0);">
                                        <img class="media-object" src="{{ asset('gambar/informasi/'.$item->gambar_info) }}" width="64" height="64">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $item->judul_info }}</h4>
                                    <p > {!! substr($item->isi_info,0,200) !!}...<a href="" style="text-decoration:none; color: red;">Selanjutnya</a>
                                    </p>

                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
