<?php
    include('side_drawer.php');
    include('conn.php');

    $sid = $fname = $lname = $dob = $gender = $email = $ph = $address = $profile = "";
    $grade = $section = $year = $faculty = $father = $mother = $parent_ph = "";
    $guardian = $guardian_ph = $relation = $fees = $remarks = "";

    if(isset($_POST["update"])){
        $id = $_POST["sid"];

        $id = mysqli_real_escape_string($conn, $id);

        $sql = "SELECT * FROM records WHERE sid='$id'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            
            $sid = $row["sid"];
            $fname = $row["fname"];
            $lname = $row["lname"];
            $dob = $row["dob"];
            $gender = $row["gender"];
            $email = $row["email"];
            $ph = $row["ph"];
            $address = $row["address"];
            $profile = $row["profile"];
            $grade = $row["grade"];
            $section = $row["section"];
            $year = $row["year"];
            $faculty = $row["faculty"];
            $father = $row["father"];
            $mother = $row["mother"];
            $parent_ph = $row["parent_ph"];
            $guardian = $row["guardian"];
            $guardian_ph = $row["guardian_ph"];
            $relation = $row["relation"];
            $fees = $row["fees"];
            $remarks = $row["remarks"];
        }
    }

    if(isset($_POST["submit"])){
        $sid = $_POST["sid"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];
        $email = $_POST["email"];
        $ph = $_POST["ph"];
        $address = $_POST["address"];
        $grade = $_POST["grade"];
        $section = $_POST["section"];
        $year = $_POST["year"];
        $faculty = $_POST["faculty"];
        $father = $_POST["father"];
        $mother = $_POST["mother"];
        $parent_ph = $_POST["parent_ph"];
        $guardian = $_POST["guardian"];
        $guardian_ph = $_POST["guardian_ph"];
        $relation = $_POST["relation"];
        $fees = $_POST["fees"];
        $remarks = $_POST["remarks"];

        if(isset($_FILES["profile"]) && $_FILES["profile"]["error"] == 0) {
            $target_dir = "profile_pictures/";
            $target_file = $target_dir . basename($_FILES["profile"]["name"]);
            move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);
        } else {
            $target_file = $profile;
        }

        $sql = "UPDATE records SET fname='$fname', lname='$lname', dob='$dob', gender='$gender',
                email='$email', ph='$ph', address='$address', profile='$target_file',
                grade='$grade', section='$section', year='$year', faculty='$faculty',
                father='$father', mother='$mother', parent_ph='$parent_ph',
                guardian='$guardian', guardian_ph='$guardian_ph', relation='$relation',
                fees='$fees', remarks='$remarks' WHERE sid='$sid'";

        if($conn->query($sql) === TRUE){
            echo "<script>alert('Record Updated Successfully');</script>";
        } else {
            echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
        }
    }
?>

<html>
<head>
    <link rel="stylesheet" href="update.css">
</head>
<body>
    <div>
        <form id="update_form" method="POST">
            <label id="txt1">PLEASE ENTER ID NUMBER</label><br>
            <input type="text" pattern="[0-9]+" id="input_field" name="sid" required><br>
            <button type="submit" id="update_btn" name="update">SEARCH</button>
        </form>
    </div>

    <div>
        <form id="inp" method="post" enctype="multipart/form-data">
            <h2>STUDENT DETAILS</h2>
            <label id="txt">STUDENT ID : </label>
            <input type="text" pattern="[0-9]+" required class="input_fields" name="sid" value="<?= $sid; ?>"><br><br>

            <label id="txt">FIRST NAME : </label>
            <input type="text" required class="input_fields" name="fname" value="<?= $fname; ?>">&nbsp&nbsp&nbsp&nbsp
            <label id="txt">LAST NAME : </label>
            <input type="text" required class="input_fields" name="lname" value="<?= $lname; ?>">&nbsp&nbsp&nbsp&nbsp
            <label id="txt">DOB : </label>
            <input type="date" required class="input_fields" name="dob" value="<?= $dob; ?>"><br><br>

            <label id="txt">GENDER :</label>
            <input type="radio" value="MALE" name="gender" required <?= ($gender == 'MALE') ? 'checked' : ''; ?>>MALE
            <input type="radio" value="FEMALE" name="gender" required <?= ($gender == 'FEMALE') ? 'checked' : ''; ?>>FEMALE<br><br>

            <label id="txt">EMAIL : </label>
            <input type="email" required class="input_fields" name="email" value="<?= $email; ?>">&nbsp&nbsp&nbsp&nbsp
            <label id="txt">PHONE NUMBER : </label>
            <input type="text" pattern="[0-9]+" required class="input_fields" name="ph" value="<?= $ph; ?>">&nbsp&nbsp&nbsp&nbsp
            <label id="txt">ADDRESS : </label>
            <input type="text" required class="input_fields" name="address" value="<?= $address; ?>"><br><br>

            <label id="txt">PROFILE PICTURE : </label>
            <input type="file" class="input_fields" name="profile">
            <br><br>
            <?php if ($profile) { ?>
                <img src="<?= $profile; ?>" width="150" height="150">
            <?php } ?>

            <h2>ACADEMIC DETAILS</h2>
            <label id="txt">GRADE : </label>
            <input type="text" pattern="[0-9]+" required class="input_fields" name="grade" value="<?= $grade; ?>">&nbsp&nbsp&nbsp&nbsp
            <label id="txt">SECTION : </label>
            <input type="text" required class="input_fields" name="section" value="<?= $section; ?>">&nbsp&nbsp&nbsp&nbsp
            <label id="txt">BATCH YEAR : </label>
            <input type="text" pattern="[0-9]+" required class="input_fields" name="year" value="<?= $year; ?>"><br><br>
            <label id="txt">FACULTY:</label>
            <select class="input_fields" name="faculty">
                <option value="science">SCIENCE</option>
                <option value="management">MANAGEMENT</option>
                <option value="alevel">A-LEVELS</option>
            </select><br><br>
            <h2>PARENT/GUARDIAN DETAILS</h2>
            <label id="txt">FATHER NAME : </label><input type="text" required class="input_fields" name="father" value="<?= $father; ?>">&nbsp&nbsp&nbsp&nbsp
            <label id="txt">MOTHER NAME : </label><input type="text" required class="input_fields" name="mother" value="<?= $mother; ?>">&nbsp&nbsp&nbsp&nbsp
            <label id="txt">PHONE NUMBER : </label><input type="text" pattern="[0-9]+" required class="input_fields" name="parent_ph" value="<?= $parent_ph; ?>"><br><br>
            <label id="txt">GUARDIAN NAME : </label><input type="text" class="input_fields" name="guardian" value="<?= $guardian; ?>">&nbsp&nbsp&nbsp&nbsp
            <label id="txt">PHONE NUMBER : </label><input type="text" pattern="[0-9]+"  class="input_fields" name="guardian_ph" value="<?= $guardian_ph; ?>">&nbsp&nbsp&nbsp&nbsp
            <label id="txt">RELATION TO STUDENT : </label><input type="text" class="input_fields" name="relation" value="<?= $relation; ?>"><br><br>
            <h2>FEES & PAYMENT DETAILS</h2>
            <label id="txt">FEES:</label>
            <select class="input_fields" name="fees">
            <option value="paid">PAID</option>
            <option value="pending">PENDING</option>
            </select>&nbsp&nbsp&nbsp&nbsp
            <label id="txt">REMARKS : </label><input type="text" class="input_fields" name="remarks" value="<?= $remarks; ?>"><br><br><br><br>

            <button type="reset" id="btn">RESET</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <button type="submit" id="btn" name="submit">UPDATE</button>
        </form>
    </div>
</body>
</html>
