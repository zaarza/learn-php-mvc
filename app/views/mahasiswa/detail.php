    <div class="container p-5">
        <a href="<?= BASE_URL; ?>/mahasiswa" class="btn btn-primary">Kembali</a>

        <?php if (empty($data['mahasiswa'])) : ?>
            <div class="mt-5">
                Tidak ditemukan mahasiswa dengan id <?= $data['id'] ?>
            </div>
            <?= die; ?>
        <?php endif; ?>

        <div class="mt-5">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['mahasiswa']['nama'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?= $data['mahasiswa']['nrp'] ?></h6>
                    <p class="card-text"><?= $data['mahasiswa']['email'] ?></p>
                    <p class="card-text"><?= $data['mahasiswa']['jurusan'] ?></p>
                </div>
         </div>
        </div>
    </div>