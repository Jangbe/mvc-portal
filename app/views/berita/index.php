<div>
    <div class="col-md-6 col-8">
        <h2 class="py-2">Daftar Berita</h2>
        
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
            Tambahkan Berita
        </button>

        <ul class="list-group">
            <?php foreach($berita as $brt) : ?>
                <li class="list-group-item d-flex justify-content-between">
                    <?= $brt->judul_berita ?>
                    <a href="<?= url('berita/edit/').$brt->id_berita ?>" class="badge badge-success">Edit</a>
                </li>
            <?php endforeach; ?>
        </ul>    
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?= url('berita/tambah') ?>" method="post">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambahkan Berita</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="judulBerita">Judul Berita</label>
                <input type="text" class="form-control" id="judulBerita" name="judul_berita">
            </div>
            <div class="form-group">
                <label for="kategori">Kategori Berita</label>
                <select class="custom-select" id="kategori" name="id_kategori">
                <?php foreach($kategori as $kt) : ?>
                    <option value="<?= $kt->id_kategori ?>"><?= $kt->nama_kategori ?></option>
                <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="isiBerita">Isi Berita</label>
                <textarea class="form-control" name="isi_berita" id="isiBerita" rows="3"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </form>
  </div>
</div> 