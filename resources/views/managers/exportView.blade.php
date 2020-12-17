<html lang="id">

<head>

    <title>
        Kokeru
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    {{-- <h3 style="text-align: center">Laporan Harian Kebersihan dan Kerapihan Ruangan
        Gedung Bersama Maju <br> Hari Tanggal </h3>
    <h5 style="text-align: center"><i>&lt;&lt;Tanggal Cetak Jam
            {{ \Carbon\Carbon::parse(date('Y-m-d h:i:s'))->isoFormat('HH:mm') }} WIB&gt;&gt;</i></h5>
    --}}
      <div class="containeer">
    <h3 style="text-align: center">Laporan Harian Kebersihan dan Kerapihan Ruangan Gedung Bersama Maju <br> Hari
        {{ \Carbon\Carbon::parse($tanggal)->isoFormat('dddd') }} Tanggal
        {{ \Carbon\Carbon::parse($tanggal)->isoFormat('DD MMMM YYYY') }} </h3>
    <h5 style="text-align: center"><i>&lt;&lt;Tanggal Cetak
            {{ \Carbon\Carbon::parse(date('Y-m-d h:i:s'))->isoFormat('DD MMMM YYYY') }} Jam
            {{ \Carbon\Carbon::parse(date('Y-m-d h:i:s'))->isoFormat('HH:mm') }} WIB&gt;&gt;</i></h5>
    <table class="table table-hover ">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Ruang</th>
                <th scope="col">Nama Cs</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>

            @foreach ($laporan as $l)
                <tr>
                    <?php $i = $i + 1; ?>
                    <th><?php echo $i; ?></th>
                    <td>{{ $l->ruangan->name }}</td>
                    <td>{{ $l->CS->name }}</td>
                    <td>{{ $l->status ? 'SUDAH' : 'BELUM' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p style="text-align: right">Approval
    <br><br><br>
    {{Auth::user()->name}} <br> manajer
    </p>
    

  </div>
</body>

</html>
