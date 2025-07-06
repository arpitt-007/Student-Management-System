<html>
    <head>
        <title>SMS || login</title>
        <link rel="stylesheet" href="style.css">
        <script>
            function validate(){
                let uname,pass,valid;
                uname=document.getElementById('uname').value;
                pass=document.getElementById('pass').value;
                valid=true;
                document.getElementById('user').innerHTML = "";
                document.getElementById('vpass').innerHTML = "";
                document.getElementById('incorrect').innerHTML = "";
                if(uname===""){
                    document.getElementById('user').innerHTML="THIS FIELD IS REQUIRED";
                    valid=false;
                }
                if(pass===""){
                    document.getElementById('vpass').innerHTML="THIS FIELD IS REQUIRED";
                    valid=false;
                }
                return valid;
            }
        </script>
    </head>
    <body id="b1">
        <center>
        <div id="box">
            <h1 id="t1">Welcome Back!!!!</h1>
            <p id="t2">Please Enter the credentials required to login</p>
            <img id="logo" src="logo.png">
            <div id="cred">
            <form method="POST" onsubmit="return validate()">
                <label id="un">USERNAME</label><sup><label id="rqd">*</label></sup><br>
                <input type="text" class="uname" name="uname" id="uname"><br>
                <div id="user" class="valid"></div><br> 
                <label id="un">PASSWORD</label><sup><label id="rqd">*</label></sup><br>
                <input type="password" class="uname" name="pass" id="pass"><br>
                <div id="vpass" class="valid"></div>
                <b><button id="btn" name=check type="submit">LOG IN</button></b>
                <div id="incorrect" class="valid"></div>
            </form>
            </div>
            <h4 id="lnk">DON'T HAVE AN ACCOUNT? <a href="register.php">REGISTER HERE</a></h4>
        </div>
        </center>
    </body>
</html>
<?php
    if(isset($_POST["check"])){
        session_start();
        echo "<script>document.getElementById('incorrect').innerHTML = '';</script>";
        $user=$_POST['uname'];
        $pass=$_POST['pass'];
        $conn=new mysqli('localhost','root','','logindb');
        $sql="SELECT username,password,name,post FROM users";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                if($user==$row['username'] && $pass==$row['password']){
                    $_SESSION['name']=$row['name'];
                    $_SESSION['post']=$row['post'];
                    $_SESSION['username']=$row['username'];
                    $_SESSION['password']=$row['password'];
                    header("location: index2.php");    
                    exit();        
                }
                else{
                    echo "<script>
                            document.getElementById('incorrect').innerHTML='USERNAME OR PASSWORD INCORRECT';
                        </script>";
                }
            }
        }
    }
?>