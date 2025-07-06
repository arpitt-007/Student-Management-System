<?php
    include('side_drawer.php');
?>
<html>
    <head>
        <link rel="stylesheet" href="add.css">
    </head>
    <body>
        <div>
            <form id="inp" method="post" enctype="multipart/form-data">
                <h2>STUDENT DETAILS</h2>
                <label id="txt">STUDENT ID : </label><input type="text" pattern="[0-9]+" required id="input_fields" name="sid"><br><br>
                <label id="txt">FIRST NAME : </label><input type="text" required id="input_fields" name="fname">&nbsp&nbsp&nbsp&nbsp
                <label id="txt">LAST NAME : </label><input type="text" required id="input_fields" name="lname">&nbsp&nbsp&nbsp&nbsp
                <label id="txt">DOB : </label><input type="date" required id="input_fields" name="dob"><br><br>
                <label id="txt">GENDER :</label>&nbsp&nbsp&nbsp&nbspMALE<input type="radio" value="MALE" name="gender" required id="gender">&nbsp&nbsp&nbsp&nbsp
                FEMALE<input type="radio" value="FEMALE" name="gender" required id="gender"><br><br>
                <label id="txt">EMAIL : </label><input type="email" required id="input_fields" name="email">&nbsp&nbsp&nbsp&nbsp
                <label id="txt">PHONE NUMBER : </label><input type="text" pattern="[0-9]+" required id="input_fields" name="ph">&nbsp&nbsp&nbsp&nbsp
                <label id="txt">ADDRESS : </label><input type="text" required id="input_fields" name="address"><br><br>
                <label id="txt">PROFILE PICTURE : </label><input type="file" required id="input_fields" name="profile"><br><br>
                <h2>ACADEMIC DETAILS</h2>
                <label id="txt">GRADE : </label><input type="text" pattern="[0-9]+" required id="input_fields" name="grade">&nbsp&nbsp&nbsp&nbsp
                <label id="txt">SECTION : </label><input type="text" required id="input_fields" name="section">&nbsp&nbsp&nbsp&nbsp
                <label id="txt">BATCH YEAR : </label><input type="text" pattern="[0-9]+" required id="input_fields" name="year"><br><br>
                <label id="txt">FACULTY:</label>
                <select id="input_fields" name="faculty">
                    <option value="science">SCIENCE</option>
                    <option value="management">MANAGEMENT</option>
                    <option value="alevel">A-LEVELS</option>
                </select><br><br>
                <h2>PARENT/GUARDIAN DETAILS</h2>
                <label id="txt">FATHER NAME : </label><input type="text" required id="input_fields" name="father">&nbsp&nbsp&nbsp&nbsp
                <label id="txt">MOTHER NAME : </label><input type="text" required id="input_fields" name="mother">&nbsp&nbsp&nbsp&nbsp
                <label id="txt">PHONE NUMBER : </label><input type="text" pattern="[0-9]+" required id="input_fields" name="parent_ph"><br><br>
                <label id="txt">GUARDIAN NAME : </label><input type="text" id="input_fields" name="guardian">&nbsp&nbsp&nbsp&nbsp
                <label id="txt">PHONE NUMBER : </label><input type="text" pattern="[0-9]+"  id="input_fields" name="guardian_ph">&nbsp&nbsp&nbsp&nbsp
                <label id="txt">RELATION TO STUDENT : </label><input type="text" id="input_fields" name="relation"><br><br>
                <h2>FEES & PAYMENT DETAILS</h2>
                <label id="txt">FEES:</label>
                <select id="input_fields" name="fees">
                    <option value="paid">PAID</option>
                    <option value="pending">PENDING</option>
                </select>&nbsp&nbsp&nbsp&nbsp
                <label id="txt">REMARKS : </label><input type="text" id="input_fields" name="remarks"><br><br><br><br>
                <button type="reset" id="btn">RESET</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <button type="submit" id="btn" name="submit">SUBMIT</button>
                <h4 id="result"></h4>
            </form>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['submit'])){
        include('conn.php');
        extract($_POST);
        $target_dir="profile_pictures/";
        $target_file=$target_dir.basename($_FILES["profile"]["name"]);
        if(move_uploaded_file($_FILES["profile"]["tmp_name"],$target_file)){
            $sql="INSERT into records values ('$sid','$fname','$lname','$dob','$gender','$email','$ph','$address','$target_file','$grade','$section','$year','$faculty','$father','$mother','$parent_ph','$guardian','$guardian_ph','$relation','$fees','$remarks')";
            if($conn->query($sql)===TRUE){
                echo "<script>
                        document.getElementById('result').innerHTML='DATA INSERTED SUCCESSFULLY';
                    </script>";
            }
            else{
                echo "<script>
                        document.getElementById('result').innerHTML='ERROR INSERTING SUCCESSFULLY';
                    </script>";
            }
        }
    }
?>