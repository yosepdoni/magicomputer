<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<br>
<br>
<br>
<style>
    .login-card {
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.10);
        /* Add shadow */
        background-color: rgba(169, 169, 169, 0.7);
        /* Transparent gray background */
        color: black;
        /* Text color */
        margin-top: 180px;
        margin: auto;
        max-width: 500px;
    }
</style>
<?php
include('koneksi.php');
if (isset($_POST['register'])) {
    $email = filter_input(INPUT_POST, 'surel', FILTER_VALIDATE_EMAIL);
    $convert = $_POST['pwd'];
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $md5 = md5($convert);
    $telp = "+62" . $_POST['telepon'];
    $provinsi = filter_input(INPUT_POST, 'provinsi', FILTER_SANITIZE_STRING);
    $kota = filter_input(INPUT_POST, 'kota', FILTER_SANITIZE_STRING);
    $kecamatan = filter_input(INPUT_POST, 'kecamatan', FILTER_SANITIZE_STRING);
    $kelurahan = filter_input(INPUT_POST, 'kelurahan', FILTER_SANITIZE_STRING);
    $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
    $joinalamat = "$provinsi, $kota, $kecamatan, $kelurahan, $alamat";
    $level = $_POST['level'];
    //script validasi data
    $cek = mysqli_num_rows(mysqli_query($conn, " SELECT * FROM pengguna WHERE surel='$email'"));
    if ($cek > 0) {
        echo "<script>window.alert('Maaf email yang sudah ada!')
                        window.location='route.php?p=register'</script>";
    } else {

        if (!preg_match("/^\+628[1-9][0-9]+$/", $telp) || strlen($telp) < 14 || strlen($telp) > 15) {
            echo "<script>alert('Nomor telepon tidak valid');</script>";
        } else {
            //script untuk proses registrasi
            mysqli_query($conn, "INSERT INTO pengguna VALUES('','$email','$md5','$nama','$telp','$joinalamat','$level')");
            // echo "<script>alert('$telp');</script>";
            echo "<script>window.alert('Registrasi Berhasil!')
                        window.location='/magicomputer/login'</script>";
        }
    }
}
?>


<div class="container">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4 login-card">

            <h4 class="text-center">Form Registrasi</h4>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="surel" class="form-control" id="email" placeholder="Email" required>
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <!-- <div class="mb-3"> -->
                <!-- <label for="pwd" class="form-label">Password</label> -->
                <!-- <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Password" required> -->
                <!-- </div> -->
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Password" required>
                        <input type="hidden" name="level" class="form-control" id="level" value="user" required>
                        <div class="input-group-append p-1">
                            <span class="input-group-text" id="eyeIcon">
                                <i class="fa fa-eye"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="nama" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" required>
                </div>
                <div class="mb-3">
                    <label for="telp" class="form-label">Telepon</label>
                    <div class="input-group">
                        <span class="input-group-text">+62</span>
                        <input type="text" name="telepon" class="form-control" id="telp" placeholder="xxxxxxxxxxxx" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <div class="d-flex">
                        <select class="form-select me-2" aria-label="Default select example" name="provinsi" id="provinsi" required>
                            <option>Pilih Provinsi</option>
                        </select>

                        <select class="form-select me-2" aria-label="Default select example" name="kota" id="kota" required>
                            <option>Pilih Kabupaten/kota</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex">
                        <select class="form-select me-2" aria-label="Default select example" name="kecamatan" id="kecamatan" required>
                            <option>Pilih Kecamatan</option>
                        </select>
                        <select class="form-select me-2" aria-label="Default select example" name="kelurahan" id="kelurahan" required>
                            <option>Pilih Kelurahan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <textarea name="alamat" id="keterangan" class="form-control" placeholder="Detail Alamat" style="width: 100%; height: 100px; padding: 10px; resize: none;"></textarea>
                </div>

                <div class="mb-3">
                    <button id="tombolregis" type="submit" class="btn btn-primary" name="register" disabled><i class="fa fa-sign-in-alt"> Registrasi</i></button>
                </div>
                <div class="mb-3">
                    Sudah punya akun?<a href="/magicomputer/login" style="text-decoration:none; color:blue;"> <i>Login</i></a>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- <script language="javascript" type="text/javascript">
function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    }
}
</script> -->

<script>
    // Simpan elemen-elemen select, elemen "keterangan", dan tombol "Register" dalam variabel
    var provinsiSelect = document.getElementById("provinsi");
    var kotaSelect = document.getElementById("kota");
    var kecamatanSelect = document.getElementById("kecamatan");
    var kelurahanSelect = document.getElementById("kelurahan");
    var keteranganInput = document.getElementById("keterangan");
    var registerButton = document.getElementById("tombolregis");

    // Tambahkan event listener pada elemen-elemen select dan elemen "keterangan"
    provinsiSelect.addEventListener("change", validateInputs);
    kotaSelect.addEventListener("change", validateInputs);
    kecamatanSelect.addEventListener("change", validateInputs);
    kelurahanSelect.addEventListener("change", validateInputs);
    keteranganInput.addEventListener("input", validateInputs);

    // Fungsi untuk memvalidasi elemen-elemen select dan elemen "keterangan", dan menonaktifkan/mengaktifkan tombol "Register"
    function validateInputs() {
        if (anyOptionIsPilih() || keteranganIsEmpty()) {
            registerButton.setAttribute("disabled", "true");
        } else {
            registerButton.removeAttribute("disabled");
        }
    }

    // Fungsi untuk memeriksa apakah salah satu opsi adalah "Pilih"
    function anyOptionIsPilih() {
        return (
            provinsiSelect.value === "Pilih Provinsi" ||
            kotaSelect.value === "Pilih Kabupaten/Kota" ||
            kecamatanSelect.value === "Pilih Kecamatan" ||
            kelurahanSelect.value === "Pilih Kelurahan"
        );
    }

    // Fungsi untuk memeriksa apakah elemen "keterangan" kosong
    function keteranganIsEmpty() {
        return keteranganInput.value.trim() === "";
    }
</script>


<script type="text/javascript">
    var lihat = document.getElementById('pwd');
    var eyeIcon = document.getElementById('eyeIcon');

    eyeIcon.addEventListener('click', function() {
        if (lihat.type === 'password') {
            lihat.type = 'text';
            eyeIcon.innerHTML = '<i class="fa fa-eye-slash"></i>';
        } else {
            lihat.type = 'password';
            eyeIcon.innerHTML = '<i class="fa fa-eye"></i>';
        }
    });
</script>
<script>
    fetch(`https://yosepdoni.github.io/api-wilayah-indonesia/api/provinces.json`)
        .then((response) => response.json())
        .then((provinces) => {
            var data = provinces;
            var tampung = `<option>Pilih Provinsi</option>`;
            data.forEach((element) => {
                tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
            });
            document.getElementById("provinsi").innerHTML = tampung;
        });
</script>
<script>
    const selectProvinsi = document.getElementById('provinsi');
    const selectKota = document.getElementById('kota');
    const selectKecamatan = document.getElementById('kecamatan');
    const selectKelurahan = document.getElementById('kelurahan');

    selectProvinsi.addEventListener('change', (e) => {
        var provinsi = e.target.options[e.target.selectedIndex].dataset.prov;
        fetch(`https://yosepdoni.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
            .then((response) => response.json())
            .then((regencies) => {
                var data = regencies;
                var tampung = `<option>Pilih Kabupaten/Kota</option>`;
                document.getElementById('kota').innerHTML = '<option>Pilih Kabupaten/Kota</option>';
                document.getElementById('kecamatan').innerHTML = '<option>Pilih Kecamatan</option>';
                document.getElementById('kelurahan').innerHTML = '<option>Pilih Kelurahan</option>';
                data.forEach((element) => {
                    tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById("kota").innerHTML = tampung;
            });
    });

    selectKota.addEventListener('change', (e) => {
        var kota = e.target.options[e.target.selectedIndex].dataset.prov;
        fetch(`https://yosepdoni.github.io/api-wilayah-indonesia/api/districts/${kota}.json`)
            .then((response) => response.json())
            .then((districts) => {
                var data = districts;
                var tampung = `<option>Pilih Kecamatan</option>`;
                document.getElementById('kecamatan').innerHTML = '<option>Pilih Kecamatan</option>';
                document.getElementById('kelurahan').innerHTML = '<option>Pilih kelurahan</option>';
                data.forEach((element) => {
                    tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById("kecamatan").innerHTML = tampung;
            });
    });
    selectKecamatan.addEventListener('change', (e) => {
        var kecamatan = e.target.options[e.target.selectedIndex].dataset.prov;
        fetch(`https://yosepdoni.github.io/api-wilayah-indonesia/api/villages/${kecamatan}.json`)
            .then((response) => response.json())
            .then((villages) => {
                var data = villages;
                var tampung = `<option>Pilih Kelurahan</option>`;
                document.getElementById('kelurahan').innerHTML = '<option>Pilih Kelurahan</option>';
                data.forEach((element) => {
                    tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById("kelurahan").innerHTML = tampung;
            });
    });
</script>