<?php require_once "header.php";
require_once "core/connection.php";
$id = $_GET['id'];

$query = "SELECT * FROM aufa_users WHERE id='$id'";
$result = $conn->query($query);

if($result->num_rows > 0){
  $fetch = $result->fetch_assoc();
?>


<section id="profile">
  <div class="container">
    <div class="row area" style="padding-top:100px;">
      <div class="col-6">
        <img src="asset/img/profile/<?= $fetch['photoProfile']; ?>" class="box-photo">
      </div>
      <div class="col-6">
        <table>
          <tr>
            <td><b>Nama</b></td>
            <td>:</td>
            <td><?= $fetch['name']; ?></td>
          </tr>
          <tr>
            <td><b>Biodata</b></td>
            <td>:</td>
            <td> <?= $fetch['biodata'];?></td>
          </tr>
          <tr>
            <td><a href="index.php?">KEMBALI</a></td>
          </tr>
        </table>
      </div>

    </div>

  </div>
</section>


<?php
}

require_once "footer.php";

 ?>
