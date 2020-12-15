@extends('layouts.app', [
'namePage' => 'Bukti Ruangan',
'class' => 'sidebar-mini',
'activePage' => 'home',
])

@section('content')
    <div class="container">
        @include('alerts.errors')
        <h3 class="title-dashboard title">Bukti Ruangan</h3>
        <h4 class="title">Ruangan: {{ $laporan->ruangan->name }}</h4>
        <h4 class="title">Tanggal: {{ $laporan->tanggal }}</h4>
        <h4 class="title">Nama CS: {{ $laporan->cs->name }}</h4>

        @if (count($laporan->bukti) > 0)
            <div class="row row-cols-5">
                @foreach ($laporan->bukti as $b)

                    <div class="col">
                        <div class="card">
                            @if (in_array($b->getType($b->bukti), ['png', 'jpeg', 'jpg', 'bmp', 'svg']))
                                <img src="/storage/bukti/{{ $b->bukti }}"
                                    class="card-img-top foto-bukti rounded float-start" alt="gambar bukti">
                            @else
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item foto" src="/storage/bukti/{{ $b->bukti }}"
                                        allowfullscreen></iframe>
                                </div>
                            @endif

                        </div>
                    </div>



                @endforeach
            </div>
        @else
            <h3>Tidak Ada Bukti Ruangan</h3>
        @endif
        <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a>
    </div>
    
    </div>
@endsection
