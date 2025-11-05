<div id="filter-container">
    <h4>Filter</h4>
    <div class="row">
        <div class="col-4">
            <div class="form-group" id="filter-container">
                @php $selected = $item->kode_kategori ?? ''; @endphp
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" required name="kode_kategori" id="filter-kategori">
                        <option @if ($selected == '') selected @endif value="">--Pilih--</option>
                        @foreach ($kategoris as $kategori)
                            <option @if ($selected == $kategori->kode) selected @endif value="{{ $kategori->kode }}">
                                {{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group" id="filter-container">
                <label>Nama</label>
                <input type="text" class="form-control" id="filter-nama">
            </div>
        </div>
        <div class="col-2">
            <div class="form-group" id="filter-container">
                <label>Harga Min</label>
                <input type="number" class="form-control" id="filter-harga-min">
            </div>
        </div>
        <div class="col-2">
            <div class="form-group" id="filter-container">
                <label>Harga Max</label>
                <input type="number" class="form-control" id="filter-harga-max">
            </div>
        </div>
    </div>
    <button class="btn btn-primary mt-1 btn-get-data">Filter</button>
    <span id="loading-filter" style="display: none;">Loading...</span>
</div>
