<!-- <?php
        include "banner.php"
    ?>    
<center><img src="https://i.ibb.co/XfBph9y/logologin.png" class="img-fluid" alt="..."></center> -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Magicomputer Sintang adalah sebuah toko komputer yang menjual laptop dan berbagai macam elektronik lainnya">
  <meta name="keywords" content="magicomputer sintang,magicomputer website, website magicomputer, magicomputer informasi,magicomputer produk, magicomputer barang, magicomputer barang, barang magicomputer, magicomputer web">
  <meta name="author" content="Magicomputer">
  <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
  <meta name="blog-name" content="Magicomputer Sintang" />
  <link rel="icon" href="https://i.ibb.co/k65mJsJ/icon-mgc-removebg-preview.png">

  <title>MagiComputer</title>
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <script src="../assets/dist/js/rm-banner.js"></script>
  <style>
    /* body {
      background-color: rgba(108, 108, 108, 0.5);
    } */

    .navbar {
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .welcome {
      background-image: url('assets/image/bg-home.jpg');
      background-size: cover;
      background-position: center;
      height: 94vh;
      display: flex;
      margin-top: flex;
      justify-content: center;
      align-items: center;
    }
    
    .content {
      padding-top: 0px; /* Memberikan ruang untuk navbar */
    }
  </style>
</head>
<body>

  <div id="welcomeSection" class="welcome">
    <div class="text-center text-white">
      <h1>Selamat Datang Pada Magicomputer Sintang</h1>
      <p>Magicomputer Sintang dapat memberikan solusi komputer terbaik untuk Anda.</p>
      <button id="learnMoreButton" style="background-color: yellow; border: 1px solid black; border-radius: 10px;">Produk</button>
    </div>
  </div>
  <div class="container">
    
  <!-- <div id="isiSection" class="container content">
    <div class="row align-items-center">
      <div class="col-md-6 text-md-start">
        <h1>MagiComputer Sintang</h1>
        <p>
          It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
        </p>
      </div>
      <div class="col-md-6 text-md-end">
        <img src="https://cdn.pixabay.com/photo/2016/10/05/17/17/smartphone-1717177_1280.png" alt="MagiComputer" class="img-fluid" width="400px" height="400px">
      </div>
    </div>
  </div> -->
  </div>

  <!-- <script>
    var learnMoreButton = document.getElementById('learnMoreButton');

    learnMoreButton.addEventListener('click', function() {
      var targetElement = document.getElementById('isiSection');
      targetElement.scrollIntoView({ behavior: 'smooth' });
    });
  </script> -->
  <script>
document.getElementById("learnMoreButton").addEventListener("click", function() {
    window.location.href = "/magicomputer/produk";
});
</script>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  -->
</body>
</html>
