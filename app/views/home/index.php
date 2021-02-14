<div>
    <div class="col-md-6 col-8">
        <h2 class="py-3">Daftar Berita</h2>
        <ul class="list-group">
            <?php foreach($berita as $brt) : ?>
                <a href="<?= url('berita/detail/').$brt->id_berita ?>" class="list-group-item text-decoration-none text-dark"><?= $brt->judul_berita ?></a>
            <?php endforeach; ?>
        </ul>    
    </div>
</div>
