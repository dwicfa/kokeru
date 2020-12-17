@extends('layouts.app', [
'namePage' => 'Data Ruangan',
'class' => 'sidebar-mini',
'activePage' => 'ruangan',
])

@section('content')

    <div class="container">
        @include('alerts.errors')
        @include('alerts.success')
        <h3 class="title-dashboard title">Data Ruangan</h3>
        <hr>
        {{ Form::open(['action' => ['App\\Http\\Controllers\\ManagerController@tambahRuangan'], 'method' => 'GET']) }}
        {{ Form::submit('Tambah Ruangan', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Nama Ruangan</th>
                    <th scope="col" class="text-center">Nama CS</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($ruangan as $r)
                    <tr>
                        <?php $i = $i + 1; ?>
                        <th class="text-center"><?php echo $i; ?></th>
                        <td>{{ $r->name }}</td>
                        <td>{{ $r->laporan->where('tanggal', date('Y-m-d'))->first()->cs->name }}</td>
                        <td class="text-center">
                            <div class="row">
                                <form action="{{ url('manager/ruangan/edit/' . $r->id) }}" method="GET">
                                    <input type="submit" value="Edit" class="btn btn-secondary">
                                </form>

                                {{ Form::open(['action' => ['App\\Http\\Controllers\\RuanganController@destroy', $r->id], 'method' => 'DELETE']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
