<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                    <div class="row clearfix">
                                        <div class="col-sm-3">
                                            <b>Nama: Salman Alfarissy</b>
                                            <b>Nama: Salman Alfarissy</b>
                                        </div>

                                        <div class="col-sm-3">
                                            <b>Nama: Salman Alfarissy</b>
                                            <b>Nama: Salman Alfarissy</b>
                                        </div>

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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
