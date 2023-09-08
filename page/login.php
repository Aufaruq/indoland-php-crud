<section id="login">
  <div class="container">
    <div class="row area center">
      <h1 class="master-title" style="margin-bottom:20px">LOGIN</h1>
      <form method="POST" action="">
        <input class="form-box" type="text" name="username" placeholder="username">
        <input class="form-box" type="password" name="password" placeholder="Password">
        <input class="form-button" type="submit" name="login" value="LOGIN">
      </form>
      <a href="index.php?" style=
      "background-color: #04AA6D;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      text-align:center;
      display:block;
      margin-top:20px;"
      >Back to Home</a>
      <!-- text-align:center; display:block; margin-top:20px;  -->
    </div>
  </div>
</section>

<?php

require_once "core/connection.php";

$i=$_POST;
  if(isset($i['login'])){
    $username = $i['username'];
    $password = $i['password'];

    $query = "SELECT * FROM aufa_users WHERE username='$username' && password = '$password'";
    $result = $conn->query($query);

    if($result->num_rows > 0){
      session_start();
      $fetch = $result->fetch_assoc();

      $_SESSION['name'] = $fetch['name'];
      $_SESSION['level'] = $fetch['level'];
      $_SESSION['id'] = $fetch['id'];

      header("Location: index.php?");
    }else{
      echo "<script>alert('Username / Password Salah!');</script>";
    }
  }

 ?>
