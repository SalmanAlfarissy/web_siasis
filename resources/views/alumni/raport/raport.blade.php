@extends('layouts.alumni.layout2')

@section('content')
@include('layouts.administrator.pageloader')
<?php
function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}
		return $temp;
	}

	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}
		return $hasil;
	}
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                RAPORT
            </h2>
            <div style='text-align:right;'> <a href="{{ route('alumni.home') }}"> Siswa</a>/Raport  </div>
        </div>

        <form class="button-demo" action="{{ route('alumni.cetak')}}" target="_blank">

            @foreach ($raport as $index=>$item)
                <input type="hidden" value="{{ $item->semester }}" name="semester">
                <input type="hidden" value="{{ $item->tahun }}" name="tahun">
            @endforeach

            <button type="submit" class="btn bg-cyan waves-effect">
                <i class="material-icons">print</i>
                <span>Cetak</span></button>

        </form>

        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">

                            <form class="row clearfix justify-content-center" action="{{ route('alumni.raport') }}">
                                <div class="col-sm-3">
                                    <select class="form-control show-tick" name="tahun">
                                        <option value="">Pilih Tahun</option>
                                        @foreach ($datasemester as $index=>$item)
                                        <option value="{{ $item->tahun }}" @if(request()->tahun == $item->tahun) selected @endif>{{ $item->tahun }} / {{ $item->tahun+1 }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control show-tick" name="semester">
                                        <option value="">Pilih Semester</option>
                                        @foreach ($datasemester as $index=>$item)
                                        <option value="{{ $item->semester }}" @if(request()->semester == $item->semester) selected @endif>{{ $item->semester }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">search</i>
                                </button>
                            </form>

                    </div>

                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Mata Pelajaran</th>
                                        <th>KKM</th>
                                        <th>Nilai</th>
                                        <th>Huruf</th>
                                        <th>Predikat</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($raport as $index=>$item)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $item->pelajaran }}</td>
                                        <td>{{ $item->kkm }}</td>
                                        <td>{{ $item->nilai }}</td>
                                        <td>{{ terbilang($item->nilai) }}</td>
                                        <td>
                                            @if($item->nilai < $item->kkm)
                                                Rendah
                                            @elseif ($item->nilai >= $item->kkm && $item->nilai <= 90)
                                                Sedang
                                            @else
                                                Tinggi
                                            @endif
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
@endsection
