<?php 
include '../../koneksi.php';

if(isset($_POST['simpan']))
    {
        $id=$_POST['id_produk'];   
        $i=$_FILES['image']['name'];
        $target_dir = "../../assets/image/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
        {
            $sql="UPDATE `produk` SET gambar='$i' WHERE id_produk='".$id."'";
            if(mysqli_query($conn,$sql))
            {
            echo "<script>alert('Gambar berhasil diupdate');window.location.href='../index.php?p=products'</script>";
            
            }
            else 
            {
                echo 'not updated';
            }
        }
    }
   ?>