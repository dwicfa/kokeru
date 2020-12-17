@extends('layouts.app', [
    'namePage' => 'Data Cleaning Service',
    'class' => 'sidebar-mini',
    'activePage' => 'dataCS',
])

@section('content')

<div class="container">
  <h3 class="title-dashboard title">Data Customer Service</h3>
  <hr>
  <table class="table table-hover">
    <thead class="thead-dark">
      <tr>
          <th scope="col">No</th>
          <th scope="col">Nama CS</th>
          <th scope="col">Email</th>
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
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection