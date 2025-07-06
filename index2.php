<?php 
    include("side_drawer.php");
?>
<?php  
    include('conn.php'); 
    $sql_total = "SELECT COUNT(*) AS total_students FROM records";
    $sql1 = "SELECT COUNT(*) AS science_student_count FROM records WHERE faculty = 'science'";
    $sql2 = "SELECT COUNT(*) AS management_student_count FROM records WHERE faculty = 'management'";
    $sql3 = "SELECT COUNT(*) AS alevel_student_count FROM records WHERE faculty = 'alevel'";
    $result_total=$conn->query($sql_total);
    $result1 = $conn->query($sql1);
    $result2 = $conn->query($sql2);
    $result3 = $conn->query($sql3);
    if ($result1->num_rows > 0 && $result2->num_rows > 0 && $result3->num_rows > 0 && $result_total->num_rows > 0 ){
        while($row = $result_total->fetch_assoc()){
            $total=$row['total_students'];
        }
        while($row = $result1->fetch_assoc()){
            $science=$row['science_student_count'];
        }
        while($row = $result2->fetch_assoc()){
            $management=$row['management_student_count'];
        }
        while($row = $result3->fetch_assoc()){
            $alevel=$row['alevel_student_count'];
        }
    } 
?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <style>
            #card1{
                position: absolute;
                height: 100px;
                width: 290px;
                background-color: whitesmoke;
                margin-top: 39px;
                margin-left: 324px;
                border-style: solid;
                border-radius: 10px;
                border-width: 3px;
                border-color: black;
                text-align: center;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 20px;
            }
            #card1:hover{
                transform: scale(1.1);
                transition-duration: 0.3s;
                cursor: pointer;
                border-style: solid;
                border-top: 0px;
                border-left: 0px;
                border-right: 0px;
                border-radius: 10px;
                border-width: 5px;
                border-color: black;
            }
            #num{
                font-size: 50px;
                margin-top: 8px;
            }
            #card2{
                position: absolute;
                height: 100px;
                width: 290px;
                background-color: whitesmoke;
                margin-top: 39px;
                margin-left: 707px;
                border-style: solid;
                border-radius: 10px;
                border-width: 3px;
                border-color: black;
                text-align: center;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 20px;
            }
            #card2:hover{
                transform: scale(1.1);
                transition-duration: 0.2s;
                cursor: pointer;
                border-style: solid;
                border-top: 0px;
                border-left: 0px;
                border-right: 0px;
                border-radius: 10px;
                border-width: 5px;
                border-color: black;
            }
            #card3{
                position: absolute;
                height: 100px;
                width: 290px;
                background-color: whitesmoke;
                margin-top: 39px;
                margin-left: 1093px;
                border-style: solid;
                border-radius: 10px;
                border-width: 3px;
                border-color: black;
                text-align: center;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 20px;
            }
            #card3:hover{
                transform: scale(1.1);
                transition-duration: 0.2s;
                cursor: pointer;
                border-style: solid;
                border-top: 0px;
                border-left: 0px;
                border-right: 0px;
                border-radius: 10px;
                border-width: 5px;
                border-color: black;
            }
            #card4{
                position: absolute;
                height: 100px;
                width: 290px;
                background-color: whitesmoke;
                margin-top: 39px;
                margin-left: 1481px;
                border-style: solid;
                border-radius: 10px;
                border-width: 3px;
                border-color: black;
                text-align: center;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 20px;
            }
            #card4:hover{
                transform: scale(1.1);
                transition-duration: 0.2s;
                cursor: pointer;
                border-style: solid;
                border-top: 0px;
                border-left: 0px;
                border-right: 0px;
                border-radius: 10px;
                border-width: 5px;
                border-color: black;
            }
            footer{
                background-color: #111;
                margin-left: -53px;
                width: 1965px;
                /* height: 200px; */
                margin-top: 38%;
                margin-bottom: 0px;
            }
            .footerContainer{
                width: 95%;
                padding: 70px 30px 20px;
            }
            .socialIcons{
                display: flex;
                justify-content: center;
                margin-top: -60px;
            }
            .socialIcons a{
                text-decoration: none;
                padding:  10px;
                background-color: white;
                margin: 20px;
                border-radius: 50%;
            }
            .socialIcons a i{
                font-size: 2em;
                color: black;
                opacity: 0,9;
            }
            /* Hover affect on social media icon */
            .socialIcons a:hover{
                background-color: #111;
                transition: 0.5s;
            }
            .socialIcons a:hover i{
                color: white;
                transition: 0.5s;
            }
            .footerNav{
                margin: 30px 0;
            }
            .footerNav ul{
                display: flex;
                justify-content: center;
                list-style-type: none;
            }
            .footerNav ul li a{
                color:white;
                margin: 20px;
                text-decoration: none;
                font-size: 1.3em;
                opacity: 0.7;
                transition: 0.5s;
            }
            .footerNav ul li a:hover{
                opacity: 1;
            }
            .footerBottom{
                background-color: #000;
                padding: 20px;
                text-align: center;
                height: 30px;
            }
            .footerBottom p{
                color: white;
            }
            .designer{
                opacity: 0.7;
                text-transform: uppercase;
                letter-spacing: 1px;
                font-weight: 400;
                margin: 0px 5px;
            }
            @media (max-width: 700px){
                .footerNav ul{
                    flex-direction: column;
                } 
                .footerNav ul li{
                    width:100%;
                    text-align: center;
                    margin: 10px;
                }
                .socialIcons a{
                    padding: 8px;
                    margin: 4px;
                }
            }
            #profile{
                position: absolute;
                margin-left: 335px;
                margin-top: 195px;
            }
            h2{
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                font-size: 30px;
                color: red;
            }
            #input_fields{
                height: 25px;
                width: 300px;
                background-color:rgb(255, 255, 206);
                border: none;
                font-size: 15px;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }
            #input_fields:focus {
                outline: none;
                border: solid;
                border-color: black;
                border-width: 2px; 
            }
            #txt{
                font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
                font-size: 20px;
            }
            #btn{
                width: 300px;
                height: 30px;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                font-size: 20px;
                background-color: rgb(238, 243, 248);
                border: none;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <div id="card1">
            TOTAL NUMBER OF STUDENTS<br><p id="num"><?php echo $total;?></p>
        </div>
        <div id="card2">
            SCIENCE STUDENTS<br><p id="num"><?php echo $science;?></p>
        </div>
        <div id="card3">
            MANAGEMENT STUDENTS<br><p id="num"><?php echo $management;?></p>
        </div>
        <div id="card4">
            A-LEVELS STUDENTS<br><p id="num"><?php echo $alevel;?></p>
        </div>
        <div id="profile">
            <h2>CHANGE USER DETAILS</h2><br>
            <form id="frm" method="POST">
                <label id="txt">NAME:</label><br><input type="text" id="input_fields" name="new_name" value="<?= $name;?>"><br><br>
                <label id="txt">POST:</label><br><input type="text" id="input_fields" name="new_post" value="<?= $post; ?>"><br><br>
                <label id="txt">USERNAME:</label><br><input type="text" id="input_fields" name="new_uname" value="<?= $username; ?>"><br><br>
                <label id="txt">CURRENT PASSWORD:</label><br><input type="text" id="input_fields" name="old_password"><br><br>
                <label id="txt">NEW PASSWORD:</label><br><input type="text" id="input_fields" name="new_password"><br><br>
                <button id="btn" name="save">SAVE</button>
                <h4 id="result"></h4>
            </form>
        </div>
        <footer>
            <div class="footerContainer">
                <div class="socialIcons">
                    <a href="https://www.facebook.com/jaguar.gaming.96742" target="_blank"><i class="fa-brands fa-facebook" ></i></a>
                    <a href="https://www.instagram.com/_arpitt_007/" target="_blank"><i class="fa-brands fa-instagram" ></i></a>
                    <a href="https://twitter.com/home" target="_blank"><i class="fa-brands fa-twitter" ></i></a>
                    <a href="https://www.youtube.com/channel/UC4WigaPUHo24r4uGElkCaig" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
            <div class="footerBottom">
                <p>Copyright &copy;2025; Designed by <span class="designer">ARPIT</span></p>
            </div>
        </footer>
    </body>
</html>
<?php
    if(isset($_POST["save"])){
        extract($_POST);
        $conn=new mysqli("localhost","root","","logindb");
        $sql="SELECT * FROM users WHERE username='$username'";
        $result=$conn->query($sql);   
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                if($row['password']==$old_password){
                    if($new_password==""){
                        $new_password=$old_password;
                    }
                    $sql="UPDATE USERS SET password='$new_password' ,name='$new_name' ,post='$new_post' ,username='$new_uname' WHERE password='$old_password'";
                    if($conn->query($sql)===TRUE){
                        echo "<script>
                            document.getElementById('result').innerHTML='DETAILS CHANGED SUCCESSFULLY';
                        </script>";
                    }
                    else{
                        echo "<script>
                            document.getElementById('result').innerHTML='ERROR CHANGING DETAILS';
                        </script>";
                    }
                }
            }
        }     
    }
?>