<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

<style>
    .navbar {
        list-style-type: none;
        overflow: hidden;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        position: fixed;
        z-index: 1;
    }

    /* Remove the underscore between the stars */
    .rating-stars {
        text-decoration: none;
    }

    /* Remove the underline from the link */
    .mycard-link {
        text-decoration: none;
        color: black;
    }

    /* Add hover state for .mycard-link */
    .mycard-link:hover {
        color: black;
    }

    /* Apply 3 columns on small screens */
    @media (max-width: 600px) {
        #mycard .col-md-2 {
            flex-basis: 48.33%;
            max-width: 48.33%;
        }
    }


    /* Center the stars horizontally */
    .rating-stars {
        display: flex;
        justify-content: center;
    }

    /* Add spacing between stars */
    .rating-stars .fas {
        margin-right: 2px;
    }

    /* Equal height cards */
    #mycard .card {
        height: 100%;
    }

    /* Fix image height */
    .card-img-top {
        height: 140px;
        width: 180px;
        object-fit: cover;
        display: block;
        margin: 0 auto;
        margin-top: 2px;
    }

    /* Flexbox to vertically align card content */
    .card-body {
        display: flex;
        flex-direction: column;
        /* justify-content: space-between; */
        height: 100%;
    }

    #filter {
        margin-top: 50px;
        /* Add margin to position it below the navbar */
    }
</style>
<script>
function filterCards() {
    const categorySelect = document.getElementById("category-select");
    const selectedCategory = categorySelect.value;
    const filterInput = document.getElementById("filter");
    const filterValue = filterInput.value.toLowerCase();
    const cards = document.querySelectorAll(".card");

    cards.forEach((card) => {
        const cardCategory = card.querySelector(".card-title-category").textContent.trim();
        const cardSold = parseInt(card.querySelector(".card-title-sold").textContent, 10);

        if (
            (selectedCategory === "Select a category" || selectedCategory === cardCategory) &&
            !(selectedCategory === "terlaris" && cardSold >= 5)
        ) {
            if (filterValue === "" || cardCategory.toLowerCase().includes(filterValue)) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        } else if (selectedCategory === "terlaris" && cardSold >= 5) {
            // Ini adalah kondisi khusus untuk menampilkan elemen "terlaris"
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}


</script>

<div class="col-lg-5 mx-auto my-4 d-flex justify-content-lg-center">
    <input id="filter" type="search" placeholder="Search" aria-label="Search" autocomplete="off" class="form-control">
</div>
<div class="col-lg-5 mx-auto my-4 d-flex justify-content-lg-center">
<select class="form-select" id="category-select" aria-label="Select a category" onchange="filterCards()">
    <option selected>Select a category</option>
    <?php
    include('koneksi.php');
    
    // Query untuk mendapatkan kategori dari tabel products
    $query = "SELECT DISTINCT kategori FROM produk";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $category = $row['kategori'];
            echo '<option value="' . $category . '">' . $category . '</option>';
        }
        mysqli_free_result($result);
    }

    // Tambahkan opsi "barang terlaris" secara manual
    echo '<option value="terlaris">Barang Terlaris</option>';
    ?>
</select>

</div>

<div class="container-fluid">
    <div class="row justify-content-lg-center" id="mycard"> <!-- Added the "id" attribute to the container -->
        <?php
        // Your existing code to display products goes here
        include('koneksi.php');
        $conn = mysqli_query($conn, "select * from produk");
        while ($h = mysqli_fetch_array($conn)) {
        ?>
            <!--card1-->
            <div class="col-6 col-md-2 mb-2 card mx-1"> <!-- Added the "card" class here -->
               
                    <a href="produk_detail.php?product_id=<?= $h['id_produk']; ?>" class="mycard-link">
                        <img class="card-img-top img-fluid" src="../assets/image/<?= $h['gambar']; ?>" alt="img">
                        <div class="card-body text-center nav-text-mycss">
                            <h6 class="card-title mb-2"><?= substr($h['nama_produk'], 0, 17); ?> ...</h6>
                            <h6 class="card-title-sold" style="display: none;"><?= $h['terjual']; ?></h6> <!-- Hidden sold field -->
                            <h6 class="card-title-category" style="display: none;"><?= $h['kategori']; ?></h6> <!-- Hidden category field -->
                            <p><b><?= "Rp" . number_format($h['harga']); ?></b></p>
                            <p style="color:orange;" class="m-1 rating-stars">
                                <!-- <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i> -->
                            </p>
                            <div class="my-2">
                                <a href="produk_detail.php?product_id=<?= $h['id_produk']; ?>" class="btn btn-primary" style="color: white; font-weight: bold; text-decoration: none;">Detail</a>
                            </div>
                        </div>
                    </a>
             
            </div>
            <!--card1-->
        <?php
        }
        ?>
    </div>
</div>



<!-- </section> -->

<script type="text/javascript">
    $("#filter").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#mycard > div").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
</script>