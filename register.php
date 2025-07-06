<html>
    <head>
        <title>SMS || login</title>
        <link rel="stylesheet" href="register.css">
        <script>
            function validate(){
                let name,post,uname,pass,valid;
                name=document.getElementById('name').value;
                post=document.getElementById('post').value;
                uname=document.getElementById('uname').value;
                pass=document.getElementById('pass').value;
                valid=true;
                document.getElementById('name').innerHTML = "";
                document.getElementById('post_valid').innerHTML = "";
                document.getElementById('user').innerHTML = "";
                document.getElementById('vpass').innerHTML = "";
                document.getElementById('incorrect').innerHTML = "";
                if(name===""){
                    document.getElementById('user').innerHTML="THIS FIELD IS REQUIRED";
                    valid=false;
                }
                if(post===""){
                    document.getElementById('post_valid').innerHTML="THIS FIELD IS REQUIRED";
                    valid=false;
                }
                if(uname===""){
                    document.getElementById('username').innerHTML="THIS FIELD IS REQUIRED";
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
            <h1 id="t1">Welcome</h1>
            <p id="t2">Please Enter the credentials required to create a account</p>
            <img id="logo" src="logo.png">
            <div id="cred">
            <form method="POST" onsubmit="return validate()">
                <label id="un2">NAME</label><sup><label id="rqd">*</label></sup><br>
                <input type="text" class="uname" name="name" id="name"><br>
                <div id="user" class="valid"></div><br> 
                <label id="un2">POST</label><sup><label id="rqd">*</label></sup><br>
                <input type="text" class="uname" name="post" id="post"><br>
                <div id="post_valid" class="valid"></div><br> 
                <label id="un">USERNAME</label><sup><label id="rqd">*</label></sup><br>
                <input type="text" class="uname" name="uname" id="uname"><br>
                <div id="username" class="valid"></div><br> 
                <label id="un">PASSWORD</label><sup><label id="rqd">*</label></sup><br>
                <input type="password" class="uname" name="pass" id="pass"><br>
                <div id="vpass" class="valid"></div>
                <b><button id="btn" name=check type="submit">LOG IN</button></b>
                <div id="incorrect" class="valid"></div>
            </form>
            </div>
            <h4 id="lnk">ALREADY HAVE AN ACCOUNT? <a href="login.php">LOGIN HERE</a></h4>
        </div>
        </center>
    </body>
</html>
<?php
    if(isset($_POST["check"])){
        $name=$_POST['name'];
        $post=$_POST['post'];
        $user=$_POST['uname'];
        $pass=$_POST['pass'];
        $conn=new mysqli('localhost','root','','logindb');
        $sql="INSERT INTO users (name,post,username,password) VALUES ('$name','$post','$user','$pass')";
        if($conn->query($sql)===TRUE){
            echo "<script>document.getElementById('incorrect').innerHTML = 'ACCOUNT CREATED SUCCESFULLY';</script>";
        }
    }
?>