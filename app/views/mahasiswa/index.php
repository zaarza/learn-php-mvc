<div class="container p-5">
    <h1>Daftar Mahasiswa:</h1>
    <ul>
        <?php foreach($data['mahasiswa'] as $mahasiswa) : ?>
            <li>
                <ul>
                    <li>Nama: <?= $mahasiswa['nama'] ?></li>
                    <li>Nama: <?= $mahasiswa['nrp'] ?></li>
                    <li>Nama: <?= $mahasiswa['email'] ?></li>
                    <li>Nama: <?= $mahasiswa['jurusan'] ?></li>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</div>