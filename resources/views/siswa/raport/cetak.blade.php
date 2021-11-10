
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ request()->semester }} ({{ request()->tahun }}/{{ request()->tahun+1 }})</title>
</head>
<body>
    <?php
    function penyebut($nilai) {
            $nilai = abs($nilai);
            $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
            $temp = "";
            if ($nilai < 12) {
                $temp = " ". $huruf[$nilai];
            } else if ($nilai <20) {
                $temp = penyebut($nilai - 10). " Belas";
            } else if ($nilai < 100) {
                $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
            } else if ($nilai < 200) {
                $temp = " Seratus" . penyebut($nilai - 100);
            } else if ($nilai < 1000) {
                $temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
            } else if ($nilai < 2000) {
                $temp = " Seribu" . penyebut($nilai - 1000);
            } else if ($nilai < 1000000) {
                $temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
            } else if ($nilai < 1000000000) {
                $temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
            } else if ($nilai < 1000000000000) {
                $temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
            } else if ($nilai < 1000000000000000) {
                $temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
            }
            return $temp;
        }

        function terbilang($nilai) {
            if($nilai<0) {
                $hasil = "Minus ". trim(penyebut($nilai));
            } else {
                $hasil = trim(penyebut($nilai));
            }
            return $hasil;
        }
    ?>



    <div>
        <div>
            <div>
                <table style="margin-left:auto;margin-right:auto" width="100%">
                    <tr>
                        <th style="text-align: left">Nama: {{ $siswa->nama }}</th>
                        <th width="40%"></th>
                        <th style="text-align: left">Kelas/Semester: {{ $semester->kelas }}/{{ substr($semester->semester,9) }}</th>
                    </tr>
                    <tr>
                        <th style="text-align: left">NIS: {{ $siswa->nis }}</th>
                        <th></th>
                        <th style="text-align:left">Tahun Pelajaran: {{ $semester->tahun }} / {{ $semester->tahun+1 }}</th>
                    </tr>
                </table>
            </div>
        </div>
        <div style="align-content: center;"><br/>
            <table style="margin-left:auto;margin-right:auto" border="1" width="100%">
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

        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>

        <table style="margin-left:auto;margin-right:auto;" width="100%">
            <tr>
                <th></th>
                <th></th>
                <th>Sicincin,{{ date('d F Y', strtotime($raport[0]->created_at)) }}</th>

            </tr>
            <tr>
                <th></th>
                <th></th>
                <th>Mengetahui</th>
            </tr>
            <tr>
                <th>Orang Tua/Wali,</th>
                <th>Wali Kelas,</th>
                <th>Kepala Sekolah,</th>
            </tr>
            <tr>
                <th>(.......................................)</th>
                <th>{{ $guru->nama_walikelas }}</th>
                <th height='20%'>Sri Astuti, S.Pd,MM</th>
            </tr>
        </table>
    </div>
</body>
</html>


