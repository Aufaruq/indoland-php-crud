<?php
  require_once "header.php";
  require_once "core/connection.php";
?>
<section id="gallery">
  <div class="container">
    <div class="row area" style="padding-top:100px;">

<!-- LIST JOB INDOLAND -->
<?php
$fotoruq_query = "SELECT * FROM aufa_photo WHERE title ='fotoruq' && namalu >= 74 ";
$fotoruq_result = $conn->query($fotoruq_query);
?>
       <div class="col-12">
         <h1 class="master-title">Galery Indoland</h1>
         <p class="main-title-desc"><b>Berikut adalah foto" yang di uplod oleh member indoland.</b></p>
         <p class="main-title-desc">
         </p>
       </div>

      <?php
        $query2 ="SELECT * FROM aufa_photo";
        $result2 = $conn->query($query2);
        if($result2->num_rows > 0){
          while($photo = $result2->fetch_assoc()){
      ?>
       <div class="col-4">
         <h3 class="titlePhoto"><?= $photo['title']; ?></h3>
         <img src="asset/img/<?= $photo['photo']; ?>" class="box-photo" style="margin: auto; display:block;">
         <table>
           <tr>
             <td><b>Nama</b></td>
             <td>:</td>
             <td><?= $photo['namalu']; ?></td>
           </tr>
           <tr>
             <td><b>Tanggal Posting</b></td>
             <td>:</td>
             <td><?= $photo['date']; ?></td>
           </tr>
           <tr>
             <td><b>Deskripsi foto</b></td>
             <td>:</td>
             <td><?= $photo['descPhoto']; ?></td>
           </tr>
         </table>
       </div>
       <?php } }?>

     </div>
   </div>
 </section>

<style media="screen">
  a{
    text-decoration: none;
    color: #000;
  }
</style>

<?php require_once "footer.php" ?>
