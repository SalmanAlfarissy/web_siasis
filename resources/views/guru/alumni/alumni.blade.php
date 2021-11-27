@extends('layouts.guru.layout')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                ALUMNI
            </h2>
            <div style='text-align:right;'> <a href="{{ route('guru.home') }}"> Guru</a>/Alumni  </div>
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
                                            <img class="media-object" src="{{ asset('gambar/siswa/'.$item->foto_siswa) }}" width="64" height="64">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{ $item->nama }}</h4>
                                        <p>
                                            <strong><a style="color: red">Pekerjaan</a></strong> : {{ $item->pekerjaan }}<br/>
                                            <strong><a style="color: red">Nama Instansi</a></strong> : {{ $item->nama_univ_kantor }}<br/>
                                            <strong><a style="color: red">Jurusan</a></strong> : {{ $item->jurusan }}<br/>
                                            <strong><a style="color: red">Jabatan</a></strong> : {{ $item->jabatan }}<br/>
                                            <strong><a style="color: red">Tahun Mulai - Selesai</a></strong> : {{ $item->tahun_mulai }} - {{ $item->tahun_selesai }}<br/>
                                            <strong><a style="color: red">Alamat Instansi</a></strong> : {{ $item->alamat_kantor }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div style="text-align: right; margin-right: 10px">{{ $siswa->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
