<?php
    session_start();
    $name=$_SESSION['name'];
    $post=$_SESSION['post'];
    $username=$_SESSION['username'];
    $password=$_SESSION['password'];
?>
<html>
    <head>
        <title>SMS || dashboard</title>
        <link rel="stylesheet" href="page2.css">
    </head>
    <body>      
        <div id="tbar">
            <h1 id="tle">WELCOME, <?php echo $name; ?></h1>
            <a href="login.php" ><button id="logout" name="logout">LOG OUT</button></a>
        </div> 
        <div id="drawer">
            <br>
            <h1 id="menu">MENU</h1>
            <a href="search.php" ><button id="search">SEARCH RECORD</button></a>
            <a href="add.php" ><button id="add">ADD RECORD</button></a>
            <a href="update.php" ><button id="update">UPDATE RECORD</button></a>
            <a href="delete.php" ><button id="delete">DELETE RECORD</button></a>
            <a href="index2.php"><img id="logo" src="logo2.png"></a>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['logout'])){
        session_destroy(); 
        header("Location: login.php");
        exit();
    }
?>