@extends('layouts.guru.layout2')

@section('content')
@include('layouts.administrator.pageloader')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">


            <h2>
                JADWAL PELAJARAN
            </h2>
            <div style='text-align:right;'> <a href="{{ route('guru.home') }}"> Administrator Siasis Mobile </a>/  </div>
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
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">

                                <thead>
                                    <tr>
                                        <th><center>Hari</center></th>
                                        <th><center>Jadwal</b></center></th>
                                        <th><center>Pelajaran</center></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    {{ $_data="" }}
                                    @for ($i = 0; $i < count($pelajaran); $i++)
                                    <tr>

                                        <td><center><b>{{ ($pelajaran[$i]->hari == $_data) ? '' : $pelajaran[$i]->hari }}</b></center></td>
                                        <td><center>{{ $pelajaran[$i]->jadwal_masuk }} - {{ $pelajaran[$i]->jadwal_keluar }}</center></td>
                                        <td><center>{{ $pelajaran[$i]->nama_pelajaran }}</center></td>
                                        @php
                                            $_data=$pelajaran[$i]->hari;
                                        @endphp

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
