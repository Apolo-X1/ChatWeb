<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>NewApp</title>

  <link rel="icon" href="https://i.pinimg.com/736x/cb/f9/b1/cbf9b13467d15911a17db8c00dc3382e.jpg">
  <link rel="stylesheet" href="./css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
  <div class="leaves">
    <div class="set">
      <div><img src="./img/leaf_01.png" style="width: 100px; height: 100px;"></div>
      <div><img src="./img/leaf_02.png" style="width: 100px; height: 100px;"></div>
      <div><img src="./img/leaf_03.png" style="width: 100px; height: 100px;"></div>
      <div><img src="./img/leaf_04.png" style="width: 100px; height: 100px;"></div>
      <div><img src="./img/leaf_01.png" style="width: 100px; height: 100px;"></div>
      <div><img src="./img/leaf_02.png" style="width: 100px; height: 100px;"></div>
      <div><img src="./img/leaf_03.png" style="width: 100px; height: 100px;"></div>
      <div><img src="./img/leaf_04.png" style="width: 100px; height: 100px;"></div>
    </div>
  </div>

  <div class="sb">
    <img src="./img/bg2.jpg" class="bg">
  </div>


  <div class="wrapper">
    <section class="form login">
      <header>Log In</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>

        <div class="field input" id="fi">
          <label>Email Address</label>
          <input id="ph3" type="text" name="email" placeholder="Enter your email" required>
        </div>

        <div class="field input" id="fip">
          <label>Password</label>
          <input id="ph4" type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>

        <div class="field button" id="sb">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>

</html>