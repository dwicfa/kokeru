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
                            <a href="#" class="btn btn-primary btn-bukti" data-val="{{ $L->id }}"
                                data-target='#updateStatusModal' type="submit" data-toggle="modal" data-backdrop="static"
                                data-keyboard="false">Update Status</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        {{ $laporan->links() }}
    </div>
    <div class="modal fade" id="updateStatusModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="background: orange">
                    <h4 class="modal-title" id="myModalLabel" style="color: whitesmoke;">Update Status</h4>
                </div> <!-- Modal Body -->
                <div class="modal-body">
                    
                  {!! Form::open(['action' => ['App\\Http\\Controllers\\BuktiController@store','id='.{{$L->id}}], 'method'=>'POST','enctype'=>'multipart/data']) !!}
                  {{-- {{Input::hidden('id', test) --}}
                  <div class="form-group">
                    <div class="custom-file">
                      {{Form::file('bukti',['class'=>'custom-file-input','aria-describedby'=>"inputGroupFileAddon01"])}}
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                  </div>
                  
                        <div class="modal-body">
                            <div id='teks'></div>
                            <div class="modal-footer" id="modal_footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" ><span
                                        aria-hidden="true" class="ion-android-close">Close</span></button>
                                <!--<input id="btnSubmit" name="btnSubmit" value="Donate" class="btn btn-default-border-blk" type="submit">-->
                                {{Form::submit('Update',['class'=>'btn btn-primary'])}}
                            </div>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
