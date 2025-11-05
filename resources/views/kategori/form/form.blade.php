@if ($errors->any())
    <div style="color: red; margin-bottom: 15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" enctype="multipart/form-data">
    @csrf
    

    <div class="form-group">
        <label>Nama Kategori</label>
        <input type="text" class="form-control" name="nama" required  value="{{$item->nama ?? ''}}">
    </div>

    <div class="form-group">
        <label>Kode Kategori</label>
        <input type="text" class="form-control" name="kode" required  value="{{$item->kode ?? ''}}">
    </div>
    <button class="btn btn-primary mt-3">Submit</button>

</form>