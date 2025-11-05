<table id="table" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategoris as $kategori)
        <tr>
            <td>{{$kategori->kode}}</td>
            <td>{{$kategori->nama}}</td>
            <td>
                <a href="{{url('kategori/view/'.$kategori->kode)}}" class="btn btn-info">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>