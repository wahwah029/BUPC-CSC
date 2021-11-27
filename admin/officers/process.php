<?php


    session_start();
    include('../conn.php');

     if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $position = $_POST['position'];
        $fb = $_POST['fb'];
        $buEmail = $_POST['buEmail'];
        $course = $_POST['course'];
        $yearLevel = $_POST['yearLevel'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $picture = $_FILES["profileImage"]["name"];
        $target_dir = "./upload/";
        $target_file = $target_dir . basename($picture);
        if($_FILES['profileImage']['size'] > 200000) {
            $msg = "Image size should not be greated than 200Kb";
            $msg_class = "alert-danger";
        }
        if(file_exists($target_file)) {
            $msg = "File already exists";
            $msg_class = "alert-danger";
        }
        // if the input file has a value
        if (empty($error)) {
            if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
                    mysqli_query($db, "INSERT INTO officers (picture) VALUES ('$picture')");
            } else {
                $error = "There was an erro uploading the file";
                $msg = "alert-danger";
            }
        }
        // and if no value
        // the variable picture include here because if it has a image attach, it will insert to database
        $query = "INSERT INTO officers (name, position, fb, course, buEmail, yearLevel, picture, username, password) VALUES ('$name', '$position', '$fb', '$course', '$buEmail', '$yearLevel', '$picture','$username','$password')";
        mysqli_query($db, $query);

        // echo '<script>window.location="../home.php"</script>';
         header("location: ../officers/");
         $_SESSION['status'] = "Woo hoo!";
          $_SESSION['text'] = "New officer added successfully!";
        $_SESSION['status_code'] = "success";
    }

    
    if (isset($_POST['save'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $position = $_POST['position'];
        $course = $_POST['course'];
        $yearLevel = $_POST['yearLevel'];
        $buEmail = $_POST['buEmail'];
        $fb = $_POST['fb'];
         $username = $_POST['username'];
        $password = $_POST['password'];
        $picture = $_FILES["profileImage"]["name"];
        $target_dir = "./upload/";
        $target_file = $target_dir . basename($picture);
        // if($_FILES['profileImage']['size'] > 200000) {
        //     $msg = "Image size should not be greated than 200Kb";
        //     $msg_class = "alert-danger";
        // }
        // if(file_exists($target_file)) {
        //     $msg = "File already exists";
        //     $msg_class = "alert-danger";
        // }
        // // if the input file has a value
        // if (empty($error)) {
        if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
                mysqli_query($db, "UPDATE officers SET picture='$picture' WHERE id=$id");
        } else {
            $error = "There was an erro uploading the file";
            $msg = "alert-danger";
        }
        // }
        $query = "UPDATE officers SET name='$name', position='$position', course='$course', yearLevel='$yearLevel', buEmail='$buEmail', fb='$fb', username='$username', password='$password', picture='$picture' WHERE id=$id";
        mysqli_query($db, $query);
          header("location: ../officers/");
         $_SESSION['status'] = "Woo hoo!";
          $_SESSION['text'] = "Updated successfully!";
        $_SESSION['status_code'] = "success";
        header('location: ../officers/');
    }


           if (isset($_GET['del'])) {
            $id = $_GET['del'];
           mysqli_query($db, "DELETE FROM officers WHERE id=$id");
            header('location: ../officers/');
            $_SESSION['status'] = "Woo hoo!";
            $_SESSION['text'] = "Officer deleted successfully!";
            $_SESSION['status_code'] = "success";
        }


?>