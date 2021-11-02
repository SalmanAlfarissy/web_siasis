@extends('layouts.guru.layout2')

@section('content')
@include('layouts.administrator.pageloader')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">

            <h2>
                RAPORT
            </h2>
            <div style='text-align:right;'> <a href="{{ route('guru.home') }}"> Administrator Siasis Mobile </a>/  </div>
        </div>

        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">

                            <div class="row clearfix justify-content-center">
                                <div class="col-sm-3">
                                    <select class="form-control show-tick" name="tahun">
                                        <option value="">-- Please select Tahun Pelajaran --</option>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control show-tick" name="jurusan">
                                        <option value="">-- Please select Semester --</option>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">search</i>
                                </button>
                            </div>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Tahun</th>
                                        <th>Semester</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($siswa as $index=>$item)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $item->nis }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->tahun }}</td>
                                        <td>{{ $item->semester }}</td>
                                        <td>
                                            <a href="{{ route('guru.create', $item->id) }}" class="btn bg-light-blue btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">archive</i>
                                            </a>
                                            <a href="{{ route('guru.update', $item->id) }}" class="btn bg-light-green btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#largeModal">
                                                <i class="material-icons">pageview</i>
                                            </a>

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
        @include('layouts.guru.modal')
@endsection
