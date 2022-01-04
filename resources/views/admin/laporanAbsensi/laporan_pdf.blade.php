<!DOCTYPE html>
<html>
<head>
	<title>Laporan Absensi {{ $user->pesertadata['nama_peserta'] }}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h4>Laporan Absensi PKL
			{{ $user->pesertadata['nama_peserta'] }}
		</h4>
		<h5>
			@php
			$namaBulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
			if ($b == 0) {
				echo "Semua Data";
			}else {
			echo "Bulan ".$namaBulan [$b];
				// code...
			}
			@endphp
			{{ $t }}
		</h5>
	</center>

	<table class='table table-bordered'>
    <thead>
      <tr class="text-center">
        <th>no</th>
        <th>Tanggal</th>
        <th>Waktu</th>
        <th>Absensi</th>
        <th>Keterangan</th>
        <th>Alasan</th>
        <th>Kegiatan Harian</th>
      </tr>
    </thead>
    <tbody>
      @php
        $nomor = 1;
      @endphp
      @foreach ($absensi as $a)
      <tr class="text-center">
          <td>{{ $nomor++}}</td>
          <td>{{ $a['tanggal'] }}</td>
          <td>{{ $a['jam'] }}</td>
          <td>{{ $a['status_absensi'] }}</td>
          <td>{{ $a['status'] }}</td>
					<td>@if ( $a['keterangan_absensi'] == null)
						-
					@else
						{{ $a['keterangan_absensi'] }}
					@endif</td>
					<td>@if ( $a['kegiatan'] == null)
						-
					@else
						{{ $a['kegiatan'] }}
					@endif</td>

      </tr>
    @endforeach
    </tbody>
	</table>

</body>
</html>
