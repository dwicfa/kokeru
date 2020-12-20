@extends('layouts.app', [
'namePage' => 'Edit Data CS',
'class' => 'sidebar-mini',
'activePage' => 'dataCS',
])


@section('content')
@include('alerts.errors')
@include('alerts.success')
    <h3 class="title-dashboard title">Edit Data CS</h3>
    <hr>
    <div class="container">
        {{ Form::open(['action' => ['App\\Http\\Controllers\\CSController@update',$cs->id], 'method' => 'PUT']) }}
        <div class="form-group">
            {{ Form::label('nama_cs', 'Nama CS: ', ['class' => 'form-label']) }}
            {{ Form::text('nama_cs', $cs->name, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email: ', ['class' => 'form-label']) }}
            {{ Form::text('email', $cs->email, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Password: ', ['class' => 'form-label']) }}
            {{ Form::password('password',['class' => 'form-control'])}}
        </div>

        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
        <a href="/manager/dataCS" class="btn btn-danger">Kembali</a>
        {{ Form::close() }}
    </div>
@endsection
