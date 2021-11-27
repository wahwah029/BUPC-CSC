<?php
    session_start();
    include('../conn.php');

     // correct timezone
    date_default_timezone_set("Asia/Manila");
    $uploadDate =date("D M d, Y");
    if (isset($_POST['upload'])) {
        $sYear = $_POST['sYear'];
        $sem = $_POST['sem'];
        $report = $_FILES["report"]["name"];
        $uploadDate =date("D M d, Y");
        $target_dir = "./files/";
        $target_file = $target_dir . basename($report);
        if($_FILES['report']['size'] > 20000000) {
            $msg = "Image size should not be greated than 200Kb";
            $msg_class = "alert-danger";
        }
        if(file_exists($target_file)) {
            $msg = "File already exists";
            $msg_class = "alert-danger";
        }
        // if the input file has a value
        if (empty($error)) {
            if(move_uploaded_file($_FILES["report"]["tmp_name"], $target_file)) {
                    mysqli_query($db, "INSERT INTO otherReports (report) VALUES ('$report')");
            } else {
                $error = "There was an error uploading the file";
                $msg = "alert-danger";
            }
        }
        // and if no value
        // the variable picture include here because if it has a image attach, it will insert to database
        $query = "INSERT INTO otherreports (sYear, sem, report, uploadDate) VALUES ('$sYear', '$sem', '$report', '$uploadDate')";
        mysqli_query($db, $query);

        // echo '<script>window.location="../home.php"</script>';'
         header("location: ../otherreport");
         $_SESSION['status'] = "Woo hoo!";
          $_SESSION['text'] = "Report added successfully!";
        $_SESSION['status_code'] = "success";
    }


           if (isset($_GET['del'])) {
            $id = $_GET['del'];
             mysqli_query($db, "DELETE FROM otherreports WHERE id=$id");
            header('location: ../otherReport');
            $_SESSION['status'] = "Woo hoo!";
            $_SESSION['text'] = "Report deleted successfully!";
            $_SESSION['status_code'] = "success";
        }


?>