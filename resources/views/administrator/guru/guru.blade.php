@extends('layouts.administrator.layout2')

@section('content')
@include('layouts.administrator.pageloader')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">

            @if (session()->has('success'))
            <div class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                {{ session('success') }}
            </div>
            @endif

            <h2>
                GURU
            </h2>
            <div style='text-align:right;'> <a href="{{ route('admin.home') }}"> Admin</a>/Staf/Guru  </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="button-demo">
                        <a href="{{ route('admin.staf.createguru') }}" class="btn bg-red waves-effect">
                            <i class="material-icons">person_add</i>
                            <span>Add Guru</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DAFTAR GURU
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($guru as $index=>$item)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $item->nip }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->level }}</td>

                                        <td>
                                                {{-- <a type="button" class="btn bg-deep-orange btn-circle waves-effect waves-circle waves-float">
                                                    <i class="material-icons">print</i>
                                                </a> --}}
                                                    <form method="POST" novalidate="novalidate" action="{{ route('admin.staf.deleteguru', $item->id) }}">
                                                        @csrf
                                                        {{ method_field('DELETE') }}

                                                        <a href="{{ route('admin.staf.editguru', $item->id) }}" class="btn bg-light-blue btn-circle waves-effect waves-circle waves-float">
                                                            <i class="material-icons">edit</i>
                                                        </a>

                                                        <button class="btn bg-red btn-circle waves-effect waves-circle waves-float" type="submit" onclick="return checkDelete()">
                                                        <i class="material-icons">delete</i></button>
                                                    </form>
                                        </td>
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
