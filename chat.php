<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>NewChat</title>


  <!-- emojis -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.css">

  <!-- icon -->
  <link rel="icon" href="https://i.pinimg.com/736x/cb/f9/b1/cbf9b13467d15911a17db8c00dc3382e.jpg">

  <link rel="stylesheet" href="./css/chat.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span>
            <?php echo $row['fname']. " " . $row['lname'] ?>
          </span>
          <p>
            <?php echo $row['status']; ?>
          </p>
        </div>
      </header>
      
      <div class="chat-box">
      </div>

      <form action="#" class="typing-area">
        <button id="b_uno"><ion-icon name="send-outline"></ion-icon></button>
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="write here..." autocomplete="off">

        <button id="b_tres" onclick="abrirGestorArchivos()"><ion-icon name="attach-outline"></ion-icon></button>
        <input type="file" id="fileInput" style="display: none;">
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <script>
    function abrirGestorArchivos() {
      document.getElementById('fileInput').click();
    }
  </script>

  <!-- emojis -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.js"></script>

    <script>
        $(document).ready(function() {
            $(".input-field").emojioneArea();
        });
    </script>

</body>

</html>