<?php
require_once "header.php";
require_once "core/connection.php";

@$name = $_SESSION['name'];
@$level = $_SESSION['level'];
@$id     = $_SESSION['id'];

$query = "SELECT * FROM aufa_users WHERE name ='$name' ";
$result = $conn->query($query);

if($result->num_rows > 0){
  $fetch = $result->fetch_assoc();
?>

<section id="profile">
  <div class="container">
    <div class="row area">
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
            <td><b>Aksi</b></td>
            <td>:</td>
            <td><a href="?page=profile&action=edit&id=<?= $fetch['id'];?>">Edit Profile</a></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</section>
<?php } ?>
<?php require_once "footer.php"; ?>
