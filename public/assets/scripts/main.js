const mahasiswaEditButton = Array.from(
  document.getElementsByClassName("mahasiswaEditButton")
);
const mahasiswaModalTitle = document.getElementById("mahasiswaModalTitle");
const mahasiswaNewButton = document.getElementById("mahasiswaNewButton");
const mahasiswaModalSubmit = document.getElementById("mahasiswaModalSubmit");
const mahasiswaModalForm = document.getElementById("mahasiswaModalForm");

const mahasiswaInputNama = document.getElementById("nama");
const mahasiswaInputNrp = document.getElementById("nrp");
const mahasiswaInputEmail = document.getElementById("email");
const mahasiswaInputJurusan = document.getElementById("jurusan");

mahasiswaNewButton.addEventListener("click", function () {
  mahasiswaModalTitle.innerHTML = "Tambah mahasiswa";
  mahasiswaModalSubmit.innerHTML = "Tambah";

  mahasiswaModalForm.setAttribute(
    "action",
    "http://localhost:81/learn-php-mvc/public/mahasiswa/new"
  );

  mahasiswaInputNama.value = "";
  mahasiswaInputNrp.value = "";
  mahasiswaInputEmail.value = "";
  mahasiswaInputJurusan.value = "";
});

mahasiswaEditButton.forEach((mahasiswa) => {
  mahasiswa.addEventListener("click", function (event) {
    const id = event.target.getAttribute("data-id");
    mahasiswaModalTitle.innerHTML = "Ubah data mahasiswa";
    mahasiswaModalSubmit.innerHTML = "Simpan perubahan";

    mahasiswaModalForm.setAttribute(
      "action",
      `http://localhost:81/learn-php-mvc/public/mahasiswa/update/${id}`
    );

    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const data = JSON.parse(xhr.response);

        mahasiswaInputNama.value = data.nama;
        mahasiswaInputNrp.value = data.nrp;
        mahasiswaInputEmail.value = data.email;
        mahasiswaInputJurusan.value = data.jurusan;
      }
    };

    xhr.open(
      "POST",
      `http://localhost:81/learn-php-mvc/public/mahasiswa/getDetailData/`
    );

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send(`id=${id}`);
  });
});
