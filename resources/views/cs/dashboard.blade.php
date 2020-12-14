@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'sidebar-mini',
    'activePage' => 'home',
])

@section('content')
  <div class="container">
    <h3 class="title-dashboard title">Monitoring Status Kebersihan Ruangan Gedung</h3>
    <h4 class="subtitle-dashboard title">{{date('d/m/Y')}}</h4>
    <div class="row">
      @foreach ($laporan as $L)
        <div class="col-3">
          <div class="card ruangan {{$L->status ? 'ruangan-sudah':'ruangan-belum'}}">
            <div class="card-header text-white">
              <h5 class="card-title">{{$L->ruangan->name}}</h5>
            </div>
            <div class="card-body">
              
              <p class="card-text">{{$L->status ? 'SUDAH':'BELUM'}}</p>
            <p class="card-text">{{$L->CS->name}}</p>
            <a href="#" class="btn btn-primary btn-bukti" data-val = "{{$L->id}}" data-target = '#updateStatusModal' type="submit" data-toggle="modal"  data-backdrop="static" data-keyboard="false">Update Status</a>
            </div>
          </div>
        </div>
      @endforeach
      
    </div>
    {{$laporan->links()}}
  </div>
  <div class="modal fade" id="updateStatusModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background: orange">
                <h4 class="modal-title" id="myModalLabel" style="color: whitesmoke;">{{$L->ruangan->name}}</h4>
            </div>            <!-- Modal Body -->
            <div class="modal-body">
                <div>
                    Payment Option
                </div>
                <form id="frm-donation" name="frm-donation">
                    <div class="header-btn">
                        <div id="div-physical">
                            <label>
                                <input id="rdb_physical" name="rdb_donation" value="0" type="radio" checked="" class="validate[required]" data-errormessage-value-missing="Donation Type is required!">
                                Physical Entity Donation
                            </label>
                        </div>
                </form>
                <div class="modal-body">
                  <div id = 'teks'></div>
                    <div class="modal-footer" id="modal_footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ion-android-close">Close</span></button>
                        <!--<input id="btnSubmit" name="btnSubmit" value="Donate" class="btn btn-default-border-blk" type="submit">-->
                        <a id="btnDonate" class="btn btn-default-border-blk">Donate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection