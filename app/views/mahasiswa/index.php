<div class="p-5 d-flex flex-column row-gap-3">
    <?php Flasher::flash(); ?>
    <!-- New mahasiswa modal -->
    <!-- Trigger -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#mahasiswa-modal" id="mahasiswaNewButton">
        + Tambah mahasiswa
    </button>

    <!-- Content -->
    <div class="modal" tabindex="-1" id="mahasiswa-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mahasiswaModalTitle">Tambah mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASE_URL; ?>/mahasiswa/new" method="POST" id="mahasiswaModalForm">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama mahasiswa</label>
                            <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="nrp" class="form-label">NRP</label>
                            <input type="number" class="form-control" id="nrp" name="nrp" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">NRP harus terdiri dari 8 digit angka</div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <select name="jurusan" id="jurusan" class="form-select" aria-label="Default select example">
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                                <option value="Teknik Industri">Teknik Industri</option>
                            </select>
                        </div>
                        <div class="modal-footer px-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" name="new-mahasiswa" id="mahasiswaModalSubmit">Tambah</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- end of New mahasiswa modal -->

    <div class="container">
        <h1>Daftar Mahasiswa:</h1>
        <p>Data ini diambil dari database</p>
        <form action="<?= BASE_URL; ?>/mahasiswa/search" method="POST">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari berdasarkan nama..." aria-label="Cari mahasiswa berdasarkan nama" aria-describedby="button-addon2" name="keyword">
                <button class="btn btn-outline-secondary" type="submit" name="search">Cari</button>
            </div>
        </form>
        <ul class="list-group">
            <?php foreach ($data['mahasiswa'] as $mahasiswa) : ?>
                <li class="list-group-item d-flex justify-content-between align-items-center over">
                    <?= $mahasiswa['nama'] ?>
                    <div>
                        <a class="btn btn-primary ms-auto" href="<?= BASE_URL; ?>/mahasiswa/detail/<?= $mahasiswa['id'] ?>">Detail</a>
                        <a class="btn btn-success ms-auto mahasiswaEditButton" data-bs-toggle="modal" data-bs-target="#mahasiswa-modal" data-id="<?= $mahasiswa['id'] ?>">Ubah</a>
                        <a class="btn btn-danger ms-auto" href="<?= BASE_URL; ?>/mahasiswa/delete/<?= $mahasiswa['id'] ?>" onclick="return confirm('Yakin ingin menghapus mahasiswa?')">Hapus</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>