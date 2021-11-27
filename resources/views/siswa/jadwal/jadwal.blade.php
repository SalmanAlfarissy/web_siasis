@extends('layouts.siswa.layout2')

@section('content')
@include('layouts.administrator.pageloader')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">


            <h2>
                JADWAL PELAJARAN
            </h2>
            <div style='text-align:right;'> <a href="{{ route('siswa.home') }}"> Siswa</a>/Jadwal  </div>
        </div>

        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DAFTAR JADWAL SISWA
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">

                                <thead>
                                    <tr>
                                        @foreach ($daftar as $hari=>$item)
                                        <th colspan="2"><center>{{ $hari }}</center></th>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach ($daftar as $hari=>$item)
                                        <th><center>Jam</center></th>
                                        <th><center>Pelajaran</center></th>
                                        @endforeach
                                    </tr>
                                </thead>

                                <tbody>

                                    @for($i = 0; $i < $maxcount; $i++)
                                    <tr>
                                        @foreach ($daftar as $hari=>$item)
                                        @if(!empty($item[$i]))
                                            <td>{{ $item[$i]->jadwal_masuk }} - {{ $item[$i]->jadwal_keluar }} </td>
                                            <td>{{ $item[$i]->nama_pelajaran }} ({{ $item[$i]->guru }}) </td>
                                        @else
                                            <td></td>
                                            <td></td>
                                        @endif


                                        @endforeach
                                    </tr>
                                    @endfor


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script language="JavaScript" type="text/javascript">
            function checkDelete(){
                return confirm('Are you sure delete this data?');
            }
            </script>
        <!-- #END# Basic Examples -->

@endsection
