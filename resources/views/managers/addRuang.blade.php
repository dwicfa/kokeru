@extends('layouts.app', [
'namePage' => 'Tambah Data Ruangan',
'class' => 'sidebar-mini',
'activePage' => 'ruangan',
])


@section('content')
@include('alerts.errors')
@include('alerts.success')
    <h3 class="title-dashboard title">Tambah Data Ruangan</h3>
    <hr>
    <div class="container">
        {{ Form::open(['action' => ['App\\Http\\Controllers\\RuanganController@store'], 'method' => 'POST']) }}
        <div class="form-group">
            {{ Form::label('nama_ruang', 'Nama Ruang: ', ['class' => 'form-label']) }}
            {{ Form::text('nama_ruang', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('nama_cs', 'Nama CS: ', ['class' => 'form-label']) }}
            <select class="browser-default custom-select"  name = 'id_cs'>
                @foreach ($cs as $c)
            <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
              </select>
        </div>

        {{ Form::submit('Tambah', ['class' => 'btn btn-primary']) }}
        <a href="/manager/ruangan" class="btn btn-danger">Kembali</a>
        {{ Form::close() }}
    </div>
@endsection
