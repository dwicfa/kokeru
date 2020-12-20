@extends('layouts.app', [
    'namePage' => 'Data Cleaning Service',
    'class' => 'sidebar-mini',
    'activePage' => 'dataCS',
])

@section('content')

<div class="container">
  <h3 class="title-dashboard title">Data Cleaning Service</h3>
  <hr>
  {{ Form::open(['action' => ['App\\Http\\Controllers\\CSController@tambahCS'], 'method' => 'GET']) }}
  {{ Form::submit('Tambah CS', ['class' => 'btn btn-primary']) }}
  {{ Form::close() }}
  <table class="table table-hover">
    <thead class="thead-dark">
      <tr>
          <th scope="col">No</th>
          <th scope="col">Nama CS</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 0?>
      
      @foreach($cs as $c)
      <tr>
          <?php $i = $i+1?>
          <th><?php echo $i?></th>
          <td>{{ $c->name }}</td>
          <td>{{ $c->email }}</td>
          <td class="text-center">
            <div class="row">
                <form action="{{ url('manager/dataCS/edit/' . $c->id) }}" method="GET">
                    <input type="submit" value="Edit" class="btn btn-secondary">
                </form>

                {{ Form::open(['action' => ['App\\Http\\Controllers\\CSController@destroy', $c->id], 'method' => 'DELETE']) }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger','onclick'=>"return confirm('Apakah anda yakin akan menghapus CS?')"]) }}
                {{ Form::close() }}
            </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection