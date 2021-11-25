
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ request()->semester }} ({{ request()->tahun }}/{{ request()->tahun+1 }})</title>
    <style>
        .body{
            /* background-image: url(../public/images/logo.png); */
            background-size: 40%;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            height: 100%;
            padding: 0%;
        }
        .title{
            text-align: center;
            font-size: 2.5em;
            color: #000;
        }

    </style>
</head>
<body class="body">
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
            <table width="100%">
                <tr>
                <td width="25%" align="center"><img src="../public/images/logos.png" width="60%"></td>
                <td width="60%" align="center"><h2>Rapor {{ $semester->semester }}<br/>SMA Negeri 1 2x11 Enam Lingkung<br/>TA :{{ $semester->tahun }}/{{ $semester->tahun+1 }}</h2>
                </td>
                <td width="15%" align="center"><input hidden width="100%"></td>
                </tr>

            </table>
            <hr/>

        </div>

        <div style="align-content: center;"><br/>
            <table style="margin-left:auto;margin-right:auto" border="1" cellspacing="0" cellpadding="0" width="100%">
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
                        <td align="center">{{ $index+1 }}</td>
                        <td>{{ $item->pelajaran }}</td>
                        <td align="center">{{ $item->kkm }}</td>
                        <td align="center">{{ $item->nilai }}</td>
                        <td>{{ terbilang($item->nilai) }}</td>
                        <td align="center">
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
</body>
</html>


