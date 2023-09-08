<?php
require_once "header.php";
require_once "core/connection.php";

$id = $_GET['id'];
@$name = $_SESSION['name'];
@$level = $_SESSION['level'];

if(!$name){
  header("Location: index.php?");
}

$query = "SELECT * FROM aufa_users WHERE id ='$id' ";
$result = $conn->query($query);

if($result->num_rows > 0){
  $fetch = $result->fetch_assoc();
?>

<section id="profile">
  <div class="container">
    <div class="row area">
      <div class="col-4">
        <img src="asset/img/profile/<?= $fetch['photoProfile']; ?>" class="box-photo">
      </div>
      <div class="col-8">
        <form action="" method="POST" enctype="multipart/form-data">
          <table>
            <tr>
              <td><b>Nama</b></td>
              <td>:</td>
              <td><input type="text" name="name" value="<?= $fetch['name']; ?>" required></td>
            </tr>
            <tr>
              <td><b>Username</b></td>
              <td>:</td>
              <td><input type="text" name="username" value="<?= $fetch['username']; ?>" required></td>
            </tr>
            <tr>
              <td><b>Password</b></td>
              <td>:</td>
              <td><input type="text" name="password" value="<?= $fetch['password']; ?>" required></td>
            </tr>
            <tr>
              <td><b>Biodata</b></td>
              <td>:</td>
              <td><textarea name="biodata" rows="10" cols="100" required> <?= $fetch['biodata'];?> </textarea></td>
            </tr>
            <tr>
              <td><b>Foto</b></td>
              <td>:</td>
              <td><input type="file" name="photo" value=""></td>
            </tr>

            <?php if($level == 'admin'){?>
            <tr>
              <td><b>Level</b></td>
              <td>:</td>
              <td>
                <select name="level" required>
                  <option selected disabled>--Choose Level--</option>
                  <option value="admin">Admin</option>
                  <option value="member">Member</option>
                </select>
              </td>
            </tr>
            <?php }else{
              echo " ";
            }?>

          </table>
          <input class="form-button" type="submit" name="submit" value="SIMPAN DATA">
        </form>
      </div>
    </div>
  </div>
</section>
<?php } ?>

<?php
$i = $_POST;
  if(isset($i['submit']) ){
    $name = $i['name'];
    $username = $i['username'];
    $password = $i['password'];
    $biodata = $i['biodata'];
    $sumber = $_FILES['photo']['tmp_name'];
    $dir    = "asset/img/profile/";
    $photo  = $_FILES['photo']['name'];

    if(!$photo){
      $update = "UPDATE aufa_users SET name='$name', username='$username', password='$password', biodata='$biodata', level='$level' WHERE id='$id' ";
      $update_result = $conn->query($update);
              if($update_result){
                echo "<script>alert('Data Berhasil di Update');</script>";
              }else{
                echo "Error";
              }
    }elseif($photo){
      $moved = move_uploaded_file($sumber, $dir.$photo);
        if($moved){
          $update = "UPDATE aufa_users SET name='$name', username='$username', password='$password', 	photoProfile='$photo', biodata='$biodata', level='$level' WHERE id='$id' ";
          $update_result = $conn->query($update);
                if($update_result){
                  echo "<script>alert('Data Berhasil di Update');</script>";
                  header("Location: ?page=profile");
                }else{
                  echo "Error";
                }
        }
    }else{
      echo "GagalUpload!";
    }
  }



 ?>
