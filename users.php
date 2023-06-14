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
    <title>NewApp</title>

    <link rel="icon" href="https://i.pinimg.com/736x/cb/f9/b1/cbf9b13467d15911a17db8c00dc3382e.jpg">

    <link rel="stylesheet" href="./css/users.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />


    <link rel="canonical" href="https://codepen.io/electerious/pen/qPjbGm" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="mask-icon" type="image/x-icon"
        href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-b4b4269c16397ad2f0f7a01bcdf513a1994f4c94b8af2f191c09eb0d601762b1.svg"
        color="#111" />
    <link rel="apple-touch-icon" type="image/png"
        href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />



    <style>
        #cb {
            position: relative;
            top: 30px;
            left: 1200px;
        }

        .button {
            --offset: 10px;
            --border-size: 2px;
            display: block;
            position: relative;
            padding: 15px 10px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border: 0;
            background: transparent;
            color: #e55743;
            text-transform: uppercase;
            letter-spacing: 0.25em;
            outline: none;
            cursor: pointer;
            font-weight: bold;
            border-radius: 0;
            box-shadow: inset 0 0 0 var(--border-size) currentcolor;
            transition: background 0.8s ease;
        }


        .button__horizontal,
        .button__vertical {
            position: absolute;
            top: var(--horizontal-offset, 0);
            right: var(--vertical-offset, 0);
            bottom: var(--horizontal-offset, 0);
            left: var(--vertical-offset, 0);
            transition: transform 0.8s ease;
            will-change: transform;
        }

        .button__horizontal::before,
        .button__vertical::before {
            content: "";
            position: absolute;
            border: inherit;
        }

        .button__horizontal {
            --vertical-offset: calc(var(--offset) * -1);
            border-top: var(--border-size) solid currentcolor;
            border-bottom: var(--border-size) solid currentcolor;
        }

        .button__horizontal::before {
            top: calc(var(--vertical-offset) - var(--border-size));
            bottom: calc(var(--vertical-offset) - var(--border-size));
            left: calc(var(--vertical-offset) * -1);
            right: calc(var(--vertical-offset) * -1);
        }

        .button:hover .button__horizontal {
            transform: scaleX(0);
        }

        .button__vertical {
            --horizontal-offset: calc(var(--offset) * -1);
            border-left: var(--border-size) solid currentcolor;
            border-right: var(--border-size) solid currentcolor;
        }

        .button__vertical::before {
            top: calc(var(--horizontal-offset) * -1);
            bottom: calc(var(--horizontal-offset) * -1);
            left: calc(var(--horizontal-offset) - var(--border-size));
            right: calc(var(--horizontal-offset) - var(--border-size));
        }

        .button:hover .button__vertical {
            transform: scaleY(0);
        }
    </style>

    <script>
        window.console = window.console || function (t) { };
    </script>
</head>

<body>

    

    <header>
        <div class="content">
            <?php 
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql) > 0){
                     $row = mysqli_fetch_assoc($sql);
                }
             ?>
        </div>
        
        <div id="cb">
            <button class="button">
                <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>">Log Out</a>
                
                <div class="button__horizontal"></div>
                <div class="button__vertical"></div>
            </button>
        </div>
       
    </header>

    <div class="sb">
        <img src="./img/bg.jpg" class="bg">
    </div>


    <div class="wrapper">
        <section class="users">
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>

            <!-- lista de usuarios del chat -->
            <div class="users-list">
            </div>
        </section>
    </div>

    <script src="javascript/users.js"></script>

</body>

</html>