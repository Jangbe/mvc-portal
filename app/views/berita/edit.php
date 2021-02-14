<form action="<?= url('berita/edit') ?>" method="post" class="my-3">
  <input type="hidden" value="<?= $berita->id_berita ?>" name="id_berita">
  <h1 class="py-3">Edit Berita</h1>
  <div class="form-group">
    <label for="judulBerita">Judul Berita</label>
    <input type="text" class="form-control" id="judulBerita" name="judul_berita" value="<?= $berita->judul_berita ?>">
  </div>
  <div class="form-group">
    <label for="kategori">Kategori Berita</label>
    <select class="custom-select" id="kategori" name="id_kategori" value="<?= $berita->id_kategori ?>">
      <?php foreach($kategori as $kt) : ?>
        <?php if($kt->id_kategori == $berita->id_kategori) : ?>
          <option value="<?= $kt->id_kategori ?>" selected><?= $kt->nama_kategori ?></option>
        <?php else: ?>
          <option value="<?= $kt->id_kategori ?>"><?= $kt->nama_kategori ?></option>
        <?php endif; ?>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="pembuat">Nama Pembuat</label>
    <input type="text" class="form-control" id="pembuat" readonly name="id_user" value="<?= $berita->nama_user ?>">
  </div>
  <div class="form-group">
    <label for="isiBerita">Isi Berita</label>
    <textarea class="form-control" name="isi_berita" id="isiBerita" rows="3"><?= $berita->isi_berita ?></textarea>
  </div>
  <button class="btn btn-success" type="submit">Edit Berita</button>
</form>