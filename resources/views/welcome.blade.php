@extends('layouts.app', [
    'namePage' => 'Welcome',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'welcome',
])

@section('content')
<div class="container">
  <h3 class="title-dashboard title">Monitoring Status Kebersihan Ruangan Gedung</h3>
  <h4 class="subtitle-dashboard title">{{date('d/m/Y')}}</h4>
  <div class="row">
    @foreach ($laporan as $L)
      <div class="col-3">
        <div class="card ruangan {{count($L->bukti)>0 ? 'ruangan-sudah':'ruangan-belum'}}">
          <div class="card-header text-white">
            <h5 class="card-title">{{$L->ruangan->name}}</h5>
          </div>
          <div class="card-body">
            
            <p class="card-text">{{$L->status ? 'SUDAH':'BELUM'}}</p>
          <p class="card-text">{{$L->CS->name}}</p>
            
          </div>
        </div>
      </div>
    @endforeach
    
  </div>
  {{$laporan->links()}}
</div>
@endsection
