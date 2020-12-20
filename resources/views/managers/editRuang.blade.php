@extends('layouts.app', [
'namePage' => 'Edit Data Ruangan',
'class' => 'sidebar-mini',
'activePage' => 'ruangan',
])


@section('content')
@include('alerts.errors')
@include('alerts.success')
    <h3 class="title-dashboard title">Edit Data Ruangan</h3>
    <hr>
    <div class="container">
        {{ Form::open(['action' => ['App\\Http\\Controllers\\RuanganController@update', $ruangan->id], 'method' => 'PUT']) }}
        <div class="form-group">
            {{ Form::label('nama_ruang', 'Nama Ruang: ', ['class' => 'form-label']) }}
            {{ Form::text('nama_ruang', $ruangan->name, ['class' => 'form-control']) }}
        </div>
       
        <div class="form-group">
            {{ Form::label('nama_cs', 'Nama CS: ', ['class' => 'form-label']) }}
            <select class="browser-default custom-select"  name = 'id_cs'>
                @foreach ($cs as $c)
            <option {{$c->id==(empty($ruangan->laporan->where('tanggal', date('Y-m-d'))->first())?'1':
            $ruangan->laporan->where('tanggal', date('Y-m-d'))->first()->cs->id)?'selected':''}} value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
              </select>
        </div>

        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
        <a href="/manager/ruangan" class="btn btn-danger">Kembali</a>
        {{ Form::close() }}
    </div>
@endsection
