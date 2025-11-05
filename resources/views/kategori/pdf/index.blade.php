<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Kategori</title>
    <!-- Bootstrap 4 CSS (inline supaya DomPDF bisa render) -->
    <link rel="stylesheet" href="{{ public_path('css/bootstrap.min.css') }}">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: right;
            font-size: 10px;
            color: #555;
        }

        table th,
        table td {
            vertical-align: top;
        }

        h2,
        h4 {
            margin-bottom: 0;
        }

        .category-info {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="category-info">
            <h2>{{ $kategori->nama }}</h2>
            <h4>Kode: {{ $kategori->kode }}</h4>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Kode Item</th>
                    <th>Nama Item</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori->master_item as $i => $item)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $item->kode }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>
                            <img src="{{ public_path($item->image) }}" style="width:50px; height:auto; margin-right:2px;">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="footer">
        Dicetak pada: {{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}
    </div>

</body>

</html>
