@extends('layouts.app', [
'namePage' => 'Bukti Ruangan',
'class' => 'sidebar-mini',
'activePage' => 'home',
])

@section('content')
    <div class="container">
        @include('alerts.errors')
        <h3 class="title-dashboard title">Upload Bukti Ruangan</h3>
        <h4 class="title">Ruangan: {{$laporan->ruangan->name}}</h4>
        <h4 class="title">Tanggal:  {{ \carbon\Carbon::parse($laporan->tanggal)->isoFormat('dddd') }}, {{ \carbon\Carbon::parse($laporan->tanggal)->isoFormat('DD MMMM YYYY') }}</h4>
        <h4 class="title">Nama Petugas: {{ $laporan->cs->name }}</h4>
        @if(count($laporan->bukti )<5)
        {!! Form::open(['action' => ['App\\Http\\Controllers\\BuktiController@store',"id=$laporan->id"], 'method' => 'POST', 'enctype' =>
        'multipart/form-data', 'files' => true,'class'=>'form-upload']) !!}
        @csrf
        <div class="form-group">
            <div class="custom-file">
                {{ Form::file('bukti', ['class' => 'custom-file-input', 'aria-describedby' => 'inputGroupFileAddon01','id'=>'inputGroupFile01' ]) }}
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
        
       <a href="/dashboard" class="btn btn-danger">Kembali</a>
        {{ Form::submit('Upload', ['class' => 'btn btn-primary']) }}
        
        {!! Form::close() !!}
        @else
        <h3>Jumlah bukti ruangan maksimal adalah 5, hapus salah satu bukti untuk mengupload bukti baru</h3>
        @endif
        <h3 class="title-dashboard title">Bukti Ruangan</h3>
        @if(count($laporan->bukti )>0)
        <div class="row row-cols-5" >
        @foreach ($laporan->bukti as $b)
           
                <div class="col">
                    <div class="card">
                        @if (in_array($b->getType($b->bukti), ['png','jpeg','jpg','bmp','svg']) )
                        <img src="/storage/bukti/{{$b->bukti}}" class="card-img-top foto-bukti rounded float-start" alt="gambar bukti">
                        @else
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item foto" src="/storage/bukti/{{$b->bukti}}" allowfullscreen></iframe>
                          </div>
                        @endif
                        <div class="card-body">
                            <form action="{{ url("/bukti/" . $b->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Hapus" class="btn btn-danger btn-md" onclick="return confirm('Yakin akan menghapus bukti?')">
                            </form>
                        </div>
                    </div>
                </div>
            
            
            
        @endforeach
        @else
        <h3>Tidak Ada Bukti Ruangan</h3>
        @endif
    </div>
    </div>
@endsection
