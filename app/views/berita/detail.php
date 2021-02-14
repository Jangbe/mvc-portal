<div class="card">
  <div class="card-body">
    <h5 class="card-title py-2"><?= $berita->judul_berita ?></h5>
    <h6 class="card-subtitle mb-2 text-muted">
        <span><?= $berita->tgl_berita ?></span><br>
    </h6>
    <p class="card-subtitle">Dibuat oleh <b><?= $berita->nama_user ?></b></p>
    <p class="card-text">
        <?= $berita->isi_berita ?>
    </p>
    <a href="<?= url() ?>" class="btn btn-primary">Kembali</a>
  </div>
</div>