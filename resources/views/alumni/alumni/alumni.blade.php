@extends('layouts.alumni.layout')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                ALUMNI
            </h2>
            <div style='text-align:right;'> <a href="{{ route('alumni.home') }}"> Siswa</a>/Alumni  </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DAFTAR ALUMNI
                        </h2>
                    </div>
                    <div class="body">
                        <div class="bs-example" data-example-id="media-alignment">
                            @foreach ($siswa as $index=>$item)
                                <div class="media">
                                    <div class="media-left media-middle align-center">
                                        <a href="javascript:void(0);">
                                            <img class="media-object" src="{{ asset('gambar/alumni/'.$item->foto) }}" width="64" height="64">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{ $item->nama }}</h4>
                                        <p>
                                            <strong><a style="color: red">Lahir</a></strong> : {{ $item->tempat_lahir }},{{ date('d F Y', strtotime($item->tgl_lahir)) }}<br/>
                                            <strong><a style="color: red">Gender</a></strong> : {{ $item->gender }}<br/>
                                            <strong><a style="color: red">Alamat</a></strong> : {{ $item->alamat }}<br/>
                                            <strong><a style="color: red">Email</a></strong> : {{ $item->email }}<br/>
                                            <strong><a style="color: red">NoHp</a></strong> : {{ $item->nohp }}<br/>
                                            <strong><a style="color: red">Tahun Lulus</a></strong> : {{ $item->tahun_lulus }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
