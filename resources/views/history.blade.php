<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>History</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Date</th>
            <th>Time</th>
            <th>Transfer Amount</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($data as $key => $d)
                <td>{{ $d->account_name }}</td>
                <td>{{ $d->phone_number }}</td>
                <td>{{ $d->email }}</td>
                <td>{{ $d->date }}</td>
                <td>{{ $d->time }}</td>
                <td id="amount"></td>
            @endforeach
        </tr>
    </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script>
    
    function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return 'Rp. ' + ribuan;
    }

    @foreach($data as $key => $d)
        var balance = {{ $d->amount }};
        document.getElementById('amount').innerHTML = formatRupiah(balance);
    @endforeach

    $(document).ready( function () {
        $('#myTable').DataTable();
    });

</script>
</body>
</html>
