<?php
include("dbconfig.php");
if(isset($_POST['register']))
{
    $teamName = $_POST['teamName'];
    $collegeName = $_POST['collegeName'];
    $teamLeaderName = $_POST['teamLeaderName'];
    $domain = $_POST['domain'];
    $projectTitle = $_POST['projectTitle'];
    $degree = $_POST['degree'];
    $department = $_POST['department'];
    $year = $_POST['year'];
    $emailAddress = $_POST['emailAddress'];
    $contactNumber = $_POST['contactNumber'];
    $teamMember1 = $_POST['teamMember1'];
    $teamMember2 = $_POST['teamMember2'];
    $teamMember3 = $_POST['teamMember3'];
    $upload = $_FILES['file']['name'];
    $upload_type = $_FILES['file']['type'];
    $upload_size = $_FILES['file']['size'];
    $upload_tem_loc = $_FILES['file']['tmp_name'];
    $upload_store = "ppt/".$upload;
    move_uploaded_file($upload_tem_loc,$upload_store);
    $query = mysqli_query($con,"SELECT * FROM `hackathon2k22` WHERE emailAddress='$emailAddress'");
    if(mysqli_num_rows($query)>0)
    {
        echo "<script>alert('Email Already Exists'); window.location.href='register.html';</script>";
    }
    elseif($teamName!="" && $collegeName!="" && $teamLeaderName!="" && $domain!="" && $projectTitle!="" && $degree!="" && $department!="" && $year!="" && $emailAddress!="" && $contactNumber!="" && $teamMember1!="" && $teamMember2!="" && $teamMember3!="" && $upload!="")
    {
        $sql = "INSERT INTO `hackathon2k22`(teamName,collegeName,teamLeaderName,domain,projectTitle,degree,department,year,emailAddress,contactNumber,teamMember1,teamMember2,teamMember3,upload)VALUES('$teamName','$collegeName','$teamLeaderName','$domain','$projectTitle','$degree','$department','$year','$emailAddress','$contactNumber','$teamMember1','$teamMember2','$teamMember3','$upload')";
        if($con->query($sql))
        {
            echo "<script>alert('Submitted Successfully'); window.location.href='main.html';</script>";
        }
        else{
            echo "<script>alert('Submitted Failed'); window.location.href='register.html';</script>";
        }
    }
    else{
        echo "<script>alert('All Fields are required');</script>";
    }

}
?>