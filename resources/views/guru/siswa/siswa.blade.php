@extends('layouts.guru.layout2')

@section('content')
@include('layouts.administrator.pageloader')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">

            <h2>
                SISWA
            </h2>
            <div style='text-align:right;'> <a href="{{ route('guru.home') }}"> Guru</a>/Siswa  </div>
        </div>

        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DAFTAR SISWA
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($siswa as $index=>$item)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $item->nis }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->email }}</td>
                                    </tr>
                                    @endforeach

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
