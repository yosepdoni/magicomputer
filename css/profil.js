
window.addEventListener('load', function() {
    var hiddenSection = document.querySelector('.hidden-section');
    var hiddenSectionA = document.querySelector('.hidden-section-a');
    var toggleButton = document.getElementById('toggle-button');
    var toggleButtonA = document.getElementById('toggle-button-a');

    // Sembunyikan elemen saat halaman dimuat
    hiddenSection.style.display = 'none';
    hiddenSectionA.style.display = 'none';

    // Fungsi untuk mengubah ikon dan teks tombol
    function updateButtonContent(button, section, buttonText) {
        if (section.style.display === 'none') {
            button.innerHTML = '<i class="fas fa-eye"></i> ' + buttonText;
        } else {
            button.innerHTML = '<i class="fas fa-eye-slash"></i> ' + buttonText;
        }
    }

    // Tambahkan event listener pada tombol toggle Profil
    toggleButton.addEventListener('click', function() {
        // Toggle tampilan elemen (sembunyikan/jika ditampilkan, lalu sebaliknya)
        hiddenSection.style.display = hiddenSection.style.display === 'none' ? 'block' : 'none';

        // Panggil fungsi untuk mengubah ikon dan teks tombol Profil
        updateButtonContent(toggleButton, hiddenSection, 'Profil');
    });

    // Tambahkan event listener pada tombol toggle Password
    toggleButtonA.addEventListener('click', function() {
        // Toggle tampilan elemen (sembunyikan/jika ditampilkan, lalu sebaliknya)
        hiddenSectionA.style.display = hiddenSectionA.style.display === 'none' ? 'block' : 'none';

        // Panggil fungsi untuk mengubah ikon dan teks tombol Password
        updateButtonContent(toggleButtonA, hiddenSectionA, 'Password');
    });

    // Panggil fungsi untuk mengatur ikon dan teks tombol pada awalnya
    updateButtonContent(toggleButton, hiddenSection, 'Profil');
    updateButtonContent(toggleButtonA, hiddenSectionA, 'Password');
});
document.addEventListener('DOMContentLoaded', function() {
    const oldPasswordInput = document.getElementById('old_password_input');
    const newPasswordInput = document.getElementById('new_password_input');
    const confirmPasswordInput = document.getElementById('confirm_password_input');
    const toggleOldPassword = document.getElementById('toggle_old_password');
    const toggleNewPassword = document.getElementById('toggle_new_password');
    const toggleConfirmPassword = document.getElementById('toggle_confirm_password');
    const confirmPasswordLengthMessage = document.getElementById('confirm_password_length_message');
    const confirmPasswordMatchMessage = document.getElementById('confirm_password_match_message');
    const confirmPasswordMismatchMessage = document.getElementById('confirm_password_mismatch_message');

    toggleOldPassword.addEventListener('click', function() {
        togglePasswordVisibility(oldPasswordInput, 'toggle_old_password_icon');
    });

    toggleNewPassword.addEventListener('click', function() {
        togglePasswordVisibility(newPasswordInput, 'toggle_new_password_icon');
    });

    toggleConfirmPassword.addEventListener('click', function() {
        togglePasswordVisibility(confirmPasswordInput, 'toggle_confirm_password_icon');
    });

    function togglePasswordVisibility(inputField, iconId) {
        if (inputField.type === 'password') {
            inputField.type = 'text';
            document.getElementById(iconId).classList.remove('fa-eye');
            document.getElementById(iconId).classList.add('fa-eye-slash');
        } else {
            inputField.type = 'password';
            document.getElementById(iconId).classList.remove('fa-eye-slash');
            document.getElementById(iconId).classList.add('fa-eye');
        }
    }

    confirmPasswordInput.addEventListener('input', function() {
        if (confirmPasswordInput.value.length < 8) {
            confirmPasswordLengthMessage.style.display = 'block';
            confirmPasswordMatchMessage.style.display = 'none';
            confirmPasswordMismatchMessage.style.display = 'none';
        } else {
            confirmPasswordLengthMessage.style.display = 'none';
            if (newPasswordInput.value === confirmPasswordInput.value) {
                confirmPasswordMatchMessage.style.display = 'block';
                confirmPasswordMismatchMessage.style.display = 'none';
            } else {
                confirmPasswordMatchMessage.style.display = 'none';
                confirmPasswordMismatchMessage.style.display = 'block';
            }
        }
    });

    newPasswordInput.addEventListener('input', function() {
        if (newPasswordInput.value.length >= 8 && confirmPasswordInput.value.length >= 8 && newPasswordInput.value !== confirmPasswordInput.value) {
            confirmPasswordMismatchMessage.style.display = 'block';
            confirmPasswordMatchMessage.style.display = 'none';
        } else if (newPasswordInput.value.length >= 8 && confirmPasswordInput.value.length >= 8 && newPasswordInput.value === confirmPasswordInput.value) {
            confirmPasswordMatchMessage.style.display = 'block';
            confirmPasswordMismatchMessage.style.display = 'none';
        } else {
            confirmPasswordMismatchMessage.style.display = 'none';
            confirmPasswordMatchMessage.style.display = 'none';
        }
    });
});

    
 function logout(){
  Swal.fire({
  title: 'Apa kamu Yakin Ingin Logout?',
  text: "Kamu akan dialihkan ke halaman utama!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Logout!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = "../logout.php";
  }
})};
