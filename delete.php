<?php
    include('side_drawer.php');
?>
<html>
    <head>
        <link rel="stylesheet" href="delete.css">
    </head>
    <body>
        <div>
            <form id="srh" method="POST">
                <label id="txt1">PLEASE ENTER ID NUMBER</label><br><input type="text" pattern="[0-9]+" id="input_field" name="sid"><br>
                <button id="srh_btn" name="del">DELETE</button>
            </form>
        </div>
        <div id="out">
            <h4 id="result"></h4>
            <h2>STUDENT DETAILS</h2>
                <div id="space"></div><br>
                <span id="txt">STUDENT ID : </span><span class="input_fields" id="sid"></span><br><br>
                <span id="txt">FIRST NAME : </span><span class="input_fields" id="fname"></span>&nbsp&nbsp&nbsp&nbsp
                <span id="txt">LAST NAME : </span><span class="input_fields" id="lname"></span>&nbsp&nbsp&nbsp&nbsp
                <span id="txt">DOB : </span><span class="input_fields" id="dob"></span><br><br>
                <span id="txt">GENDER :</span><span class="input_fields" id="gender"></span>&nbsp&nbsp&nbsp&nbsp
                <span id="txt">EMAIL : </span><span class="input_fields" id="email"></span>&nbsp&nbsp&nbsp&nbsp
                <span id="txt">PHONE NUMBER : </span><span class="input_fields" id="ph"></span><br><br>
                <span id="txt">ADDRESS : </span><span class="input_fields" id="address"></span><br><br>
            <h2>ACADEMIC DETAILS</h2>
                <span id="txt">GRADE : </span><span class="input_fields" id="grade"></span>&nbsp&nbsp&nbsp&nbsp
                <span id="txt">SECTION : </span><span class="input_fields" id="section"></span>&nbsp&nbsp&nbsp&nbsp
                <span id="txt">BATCH YEAR : </span><span class="input_fields" id="year"></span><br><br>
                <span id="txt">FACULTY:</span>
                <span class="input_fields" id="faculty"></span><br><br>
            <h2>PARENT/GUARDIAN DETAILS</h2>
                <span id="txt">FATHER NAME : </span><span class="input_fields" id="father"></span>&nbsp&nbsp&nbsp&nbsp
                <span id="txt">MOTHER NAME : </span><span class="input_fields" id="mother"></span>&nbsp&nbsp&nbsp&nbsp
                <span id="txt">PHONE NUMBER : </span><span class="input_fields" id="parent_ph"></span><br><br>
                <span id="txt">GUARDIAN NAME : </span><span class="input_fields" id="guardian"></span>&nbsp&nbsp&nbsp&nbsp
                <span id="txt">PHONE NUMBER : </span><span class="input_fields" id="guardian_ph"></span>&nbsp&nbsp&nbsp&nbsp
                <span id="txt">RELATION TO STUDENT : </span><span class="input_fields" id="relation"></span><br><br>
            <h2>FEES & PAYMENT DETAILS</h2>
                <span id="txt">FEES:</span>
                <span class="input_fields" id="fees"></span>&nbsp&nbsp&nbsp&nbsp
                <span id="txt">REMARKS : </span><span class="input_fields" id="remarks"></span>
        </div>
    </body>
</html>
<?php
    if(isset($_POST["del"])){
        echo "<script>
            document.getElementById('result').innerHTML='';
        </script>";
        include('conn.php');
        $id=$_POST["sid"];
        $sql="SELECT * FROM records WHERE sid=$id";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            $count=1;
            while($row=$result->fetch_assoc()){
                echo "
                <img id='pp' src='" . $row["profile"] . "' width='150' height='150'>
                <script>
                    document.getElementById('sid').innerHTML=$row[sid];
                    document.getElementById('fname').innerHTML='".$row['fname']."';
                    document.getElementById('lname').innerHTML='".$row['lname']."';
                    document.getElementById('dob').innerHTML='".$row['dob']."';
                    document.getElementById('gender').innerHTML='".$row['gender']."';
                    document.getElementById('email').innerHTML='".$row['email']."';
                    document.getElementById('ph').innerHTML='".$row['ph']."';
                    document.getElementById('address').innerHTML='".$row['address']."';
                    document.getElementById('grade').innerHTML='".$row['grade']."';
                    document.getElementById('section').innerHTML='".$row['section']."';
                    document.getElementById('year').innerHTML='".$row['year']."';
                    document.getElementById('faculty').innerHTML='".$row['faculty']."';
                    document.getElementById('father').innerHTML='".$row['father']."';
                    document.getElementById('mother').innerHTML='".$row['mother']."';
                    document.getElementById('parent_ph').innerHTML='".$row['parent_ph']."';
                    document.getElementById('guardian').innerHTML='".$row['guardian']."';
                    document.getElementById('guardian_ph').innerHTML='".$row['guardian_ph']."';
                    document.getElementById('relation').innerHTML='".$row['relation']."';
                    document.getElementById('fees').innerHTML='".$row['fees']."';
                    document.getElementById('remarks').innerHTML='".$row['remarks']."';
                </script>";
            }
        }
        $sql="DELETE FROM records WHERE sid=$id";
        $conn->query($sql);
        if($count==1){
            echo "<script>
                document.getElementById('result').innerHTML='RECORD HAS BEEN DELETED SUCESSFULLY';
            </script>";
        }
        else{
            echo "<script>
                document.getElementById('result').innerHTML='RECORD NOT FOUND';
            </script>";
        }
    }
?>