@extends('layouts.alumni.layout')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                GURU
            </h2>

            <div style='text-align:right;'> <a href="{{ route('alumni.home') }}"> Siswa</a>/Guru  </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DAFTAR GURU
                        </h2>
                        {{ $guru->links() }}
                    </div>
                    <div class="body">
                        <div class="bs-example" data-example-id="media-alignment">
                            @foreach ($guru as $index=>$item)
                                <div class="media">
                                    <div class="media-left media-middle align-center">
                                        <a href="javascript:void(0);">
                                            <img class="media-object" src="{{ asset('gambar/administrator/'.$item->foto_guru) }}" width="64" height="64">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{ $item->nama }}</h4>
                                        <p>
                                            <strong><a style="color: red">Lahir</a></strong> : {{ $item->tempat_lahir }},{{ date('d F Y', strtotime($item->tgl_lahir)) }}<br/>
                                            <strong><a style="color: red">Gender</a></strong> : {{ $item->gender }}<br/>
                                            <strong><a style="color: red">Jabatan</a></strong> : {{ $item->jabatan }}<br/>
                                            <strong><a style="color: red">Pangkat/Gol</a></strong> : {{ $item->pangkat_gol }}<br/>
                                            {{-- <strong><a style="color: red">Alamat</a></strong> : {{ $item->alamat }}<br/> --}}
                                            <strong><a style="color: red">Email</a></strong> : {{ $item->email }}
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
