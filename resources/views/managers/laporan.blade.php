@extends('layouts.app', [
    'namePage' => 'Laporan Harian',
    'class' => 'sidebar-mini',
    'activePage' => 'laporan',
])

@section('content')
<div class="container">
  {{ Form::open(['action' => ['App\\Http\\Controllers\\ManagerController@pilihTanggal'], 'method' => 'GET']) }}
  {{Form::label('Tanggal')}}
  {{Form::date('tanggal', $reportDate,['class' => 'form-control'])}}
  {{Form::label('Status')}}
   {{Form::select('status', array('semua' => 'semua', 'sudah' => 'sudah','belum' => 'belum'),null,['class'=>'browser-default custom-select','placeholder'=>$status])}}
   {{ Form::submit('Tampil', ['class' => 'btn btn-primary']) }}
  {{ Form::close() }}
  
	{{-- <form method="GET" action="">
		<div class="form-group">
	        <label for="date">Tanggal</label>
	            <input
	                class="form-control report"
	                id="date"
	                type="date"
	                name="date"
	                value="{{ $reportDate->toDateString() }}"
	            />
	    </div>
		<div class="form-group">
			<label for="status">Status</label>
			<select class="browser-default custom-select" id="status" name="status">
		    	<option value="semua" {{ $status == 'semua' ? 'selected' : '' }}>Semua</option>
		    	<option value="sudah" {{ $status == 'sudah' ? 'selected' : '' }}>Sudah</option>
		    	<option value="belum" {{ $status == 'belum' ? 'selected' : '' }}>Belum</option>
			</select>
		</div>
		<button type="submit" class="btn btn-primary mb-2">Tampil</button>
	</form> --}}
	<div class="mt-4">
        <p class="text-right">
            <a href="{{ URL::to('/laporan/pdf') }}" class="btn btn-secondary">PDF</a>
            <a href="{{ URL::to('/laporan/excel') }}" class="btn btn-primary">Excel</a>
        </p>
        <h3 style="text-align: center">Laporan Harian Kebersihan dan Kerapihan Ruangan Gedung Bersama Maju <br> Hari {{ $reportDate->isoFormat('dddd') }} Tanggal {{ $reportDate->isoFormat('DD MMMM YYYY') }} </h3>
		<h5 style="text-align: center"><i>&lt;&lt;Tanggal Cetak {{ $now->isoFormat('DD MMMM YYYY') }} Jam {{ $now->isoFormat('HH:mm') }} WIB&gt;&gt;</i></h5>
    <table class="table table-dark table-hover">
			<thead>
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