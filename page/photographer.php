<?php
require_once "header.php";
require_once "core/connection.php";

$query = "SELECT * FROM aufa_users WHERE level='member'";
$result = $conn->query($query);
?>

 <section id="profile">
   <div class="container">

     <?php if($result->num_rows > 0){
       while($fetch = $result->fetch_assoc()){
     ?>

     <div class="row area" style="padding-top:100px;">
       <div class="col-8">
         <a href="?page=profile&action=guest&id=<?= $fetch['id']; ?>"><img src="asset/img/profile/<?= $fetch['photoProfile']; ?>" class="box-photo"></a>
       </div>
       <div class="col-4">
         <table>
           <tr>
             <td><b><a href="?page=profile&action=guest&id=<?= $fetch['id']; ?>">Nama</a></b></td>
             <td>:</td>
             <td><?= $fetch['name']; ?></td>
           </tr>
         </table>
       </div>

     </div>

      <?php } }?>

   </div>
 </section>

 <style media="screen">
   a{
     text-decoration: none;
     color: #000;
   }
 </style>


 <?php require_once "footer.php"; ?>
