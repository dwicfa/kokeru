@extends('layouts.app', [
'namePage' => 'Dashboard',
'class' => 'sidebar-mini',
'activePage' => 'home',
])

@section('content')
    <div class="container">
        @include('alerts.errors')
        
        <h3 class="title-dashboard title">Monitoring Status Kebersihan Ruangan Gedung</h3>
        <h4 class="subtitle-dashboard title">{{ date('d/m/Y') }}</h4>
        <div class="row">
            @foreach ($laporan as $L)
                <div class="col-3">
                    <div class="card ruangan {{ $L->status ? 'ruangan-sudah' : 'ruangan-belum' }}">
                        <div class="card-header text-white">
                            <h5 class="card-title">{{ $L->ruangan->name }}</h5>
                        </div>
                        <div class="card-body">

                            <p class="card-text">{{ $L->status ? 'SUDAH' : 'BELUM' }}</p>
                            <p class="card-text">{{ $L->CS->name }}</p>
                            <a href="/dashboard/upload/{{ $L->id }}" class="btn btn-primary btn-bukti">Update Status</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        {{ $laporan->links() }}
    </div>
@endsection
