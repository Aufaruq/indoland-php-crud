<?php
require_once "header.php";
require_once "core/connection.php";

@$level = $_SESSION['level'];

if($level != 'admin'){
  header("Location: index.php?");
}

$query = "SELECT * FROM aufa_users";
$result = $conn->query($query);

?>

 <section id="main-title">
   <div class="container">
     <div class="row area">

       <div class="col-12">
         <h1 class="master-title">User List</h1>
         <p class="main-title-desc"><b>Berikut adalah user yang tersedia di database.</b></p>
         </p>
       </div>
     </div>

     <div class="col-12">
       <table>
         <tr>
           <th>ID</th>
           <th>Name</th>
           <th>Username</th>
           <th>Password</th>
           <th>Biodata</th>
           <th>Level</th>
           <th>Aksi</th>
         </tr>
         <?php if($result->num_rows > 0){
            while($user = $result->fetch_assoc()){
         ?>
             <tr>
               <td><?= $user['id']; ?></td>
               <td><?= $user['name']; ?></td>
               <td><?= $user['username']; ?></td>
               <td><?= $user['password']; ?></td>
               <td><?= $user['biodata']; ?></td>
               <td><?= $user['level']; ?></td>
               <td>
                 <div class="action">
                   <a href="?page=profile&action=edit&id=<?=$user['id'];?>">Edit</a> ||
                   <a href="?page=profile&action=delete&id=<?=$user['id'];?>">Hapus</a>
                 </div>
               </td>
             </tr>
        <?php }} ?>
       </table>

       <div class="col-12">
         <p class="main-title-desc"><b><a href="?page=profile&action=add">Tambah User</a></b></p>
       </div>
     </div>

     </div>
   </div>
 </section>

 <section id="gallery">
   <div class="container">
     <div class="row">

       <div class="col-12">
         <h1 class="master-title">Fitur List</h1>
         <p class="main-title-desc"><b>Berikut adalah foto yang telah ter-upload ke database.</b></p>
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
             <td><b>Aksi</b></td>
             <td>:</td>
             <td>
               <a href="?page=photo&action=edit&id=<?=$photo['id'];?>">EDIT</a> ||
               <a href="?page=photo&action=delete&id=<?=$photo['id'];?>">HAPUS</a>
             </td>
           </tr>
         </table>
       </div>
       <?php } }?>

     </div>
   </div>
 </section>


   <?php
  $query3 = "SELECT * FROM aufa_contact";
  $result3 = $conn->query($query3);
   ?>

 <section id="Message">
   <div class="container">
     <div class="row">

       <div class="col-12">
         <h1 class="master-title">Pesan Terbaru</h1>
         <p class="main-title-desc"><b>Berikut adalah pesan terbaru.</b></p>
         <p class="main-title-desc">
       </div>
     </div>

     <div class="col-12">
       <table style="text-align: center;">
         <tr>
           <th>No</th>
           <th>Nama</th>
           <th>Judul Pesan</th>
           <th>Isi Pesan</th>
           <th>Aksi</th>
         </tr>

          <?php
          if($result3->num_rows > 0){
            while($message = $result3->fetch_assoc() ){
          ?>
             <tr>
               <td><?= $message['id']; ?></td>
               <td><?= $message['nama']; ?></td>
               <td><?= $message['title']; ?></td>
               <td><?= $message['message']; ?></td>
               <td>
                 <div class="action">
                   <a href="?page=messageDelete&id=<?=$message['id'];?>">Hapus</a>
                 </div>
               </td>
             </tr>
        <?php }} ?>
       </table>
     </div>

     </div>
   </div>
 </section>


 <?php require_once "footer.php"; ?>


 <style media="screen">
  table{
    border-collapse: collapse;
    border: 1px solid #dddddd;
    width: 100%;
  }
  td,th{
    padding: 5px;
  }

  tr:nth-child(even){
    /* background: #dddddd; */
  }

  .action{
    display: block;
    margin: 0 auto;
    text-align: center;
  }

 </style>
