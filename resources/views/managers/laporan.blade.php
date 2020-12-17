@extends('layouts.app', [
    'namePage' => 'Laporan Harian',
    'class' => 'sidebar-mini',
    'activePage' => 'laporan',
])

@section('content')
<div class="container">
	<h3 class="title-dashboard">Laporan Harian Kebersihan dan Kerapihan Ruangan Gedung Bersama Maju <br> Hari {{ $reportDate->isoFormat('dddd') }} Tanggal {{ $reportDate->isoFormat('DD MMMM YYYY') }} </h3>
		<h5 style="text-align: center"><i>&lt;&lt;Tanggal Cetak {{ $now->isoFormat('DD MMMM YYYY') }} Jam {{ $now->isoFormat('HH:mm') }} WIB&gt;&gt;</i></h5>
  {{ Form::open(['action' => ['App\\Http\\Controllers\\ManagerController@pilihTanggal'], 'method' => 'GET']) }}
  {{Form::label('Tanggal')}}
  {{Form::date('tanggal', $reportDate,['class' => 'form-control'])}}
  {{Form::label('Status')}}
   {{Form::select('status', array('semua' => 'semua', 'sudah' => 'sudah','belum' => 'belum'),$status,['class'=>'browser-default custom-select'])}}
   {{ Form::submit('Tampil', ['class' => 'btn btn-primary']) }}
  {{ Form::close() }}
	<div class="mt-4">
        <p class="text-right">
			<form action="{{ url("manager/laporan/excel/" . $reportDate."/".$status) }}" method="GET">
				<input type="submit" value="Excel" class="btn btn-success pull-right">
			</form>
			<form action="{{ url("manager/laporan/pdf/" . $reportDate."/".$status) }}" method="GET">
				<input type="submit" value="pdf" class="btn btn-danger pull-right">
			</form>
		</p>
		<br>
        
    <table class="table table-hover">
			<thead class="thead-dark">
				<tr>
				    <th scope="col">No</th>
				    <th scope="col">Ruang</th>
				    <th scope="col">Nama Cs</th>
				    <th scope="col">Status</th>
				</tr>
			</thead>
			<tbody>
        <?php $i = 0?>
        
				@foreach($laporan as $l)
				<tr>
            <?php $i = $i+1?>
				    <th><?php echo $i?></th>
				    <td>{{ $l->ruangan->name }}</td>
				    <td>{{ $l->CS->name }}</td>
				    <td>{{$l->status ? 'SUDAH':'BELUM'}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		
    </div>
</div>
  @endsection