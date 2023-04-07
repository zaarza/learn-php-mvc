<div class="container p-5">
    <h1>Daftar Mahasiswa:</h1>
    <p>Data ini diambil dari database</p>
    <ul class="list-group">
        <?php foreach($data['mahasiswa'] as $mahasiswa) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?= $mahasiswa['nama'] ?>
                <a class="btn btn-primary ms-auto" href="<?= BASE_URL; ?>/mahasiswa/detail/<?= $mahasiswa['id'] ?>">Detail</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>