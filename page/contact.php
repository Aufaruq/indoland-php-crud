<?php require_once "header.php"; ?>

<section id="login">
  <div class="container">
    <div class="row area center">
      <h1 class="master-title" style="margin-bottom:20px">Kirim Pesan-mu!</h1>

      <form method="POST" action="">
        <input class="form-box" type="text" name="namalu" placeholder="Namalu">
        <input class="form-box" type="text" name="title" placeholder="Judul Pesan">
        <textarea name="message" rows="10" cols="100" class="text-area" placeholder="Isikan pesan kamu!"></textarea>
        <input class="form-button" type="submit" name="submit" value="Kirim Pesan">
      </form>

      <a href="index.php?" style="text-align:center; display:block; margin-top:20px;">Cancel</a>
    </div>
  </div>
</section>

<style media="screen">
  .form-box{
    width: 730px;
    margin: 0 auto;
    margin-bottom: 10px;
  }

  .photo-area{
    display: block;
    margin: 0 auto;
    margin-bottom: 20px;
  }

  .text-area{
    border: 2px solid #000;
    display: block;
    margin-bottom: 20px;
  }
</style>

<?php
require_once "core/connection.php";

$i=$_POST;

  if(isset($i['submit']) ){
        $namalu = $i['namalu'];
        $title = $i['title'];
        $message   = $i['message'];

        $query = "INSERT INTO aufa_contact(nama,title,message) VALUES('$namalu','$title','$message')";
        $result = $conn->query($query);

        if($result){
          echo "<script>alert('Pesan berhasil dikirim!');</script>";
        }else{
          echo "Gagal";
        }


  }
?>

<?php require_once "footer.php"; ?>
