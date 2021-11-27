<?php

    session_start();
  include "../../conn.php";
//   use PHPMailer\PHPMailer\PHPMailer;

//         require_once("./PHPMailer/src/PHPMailer.php");
//         require_once("./PHPMailer/src/SMTP.php");
//         require_once("./PHPMailer/src/Exception.php");

    //   $rec = mysqli_query($db, "SELECT * FROM studentsacc ");

  if(isset($_POST['save'])){
        $id = $_POST['id'];
        $user = $_POST['user'];
        $eName = $_POST['eName'];
        $eDescription = $_POST['eDescription'];
        $eObjectives = $_POST['eObjectives'];
        $rules = $_POST['rules'];
        $eLocation = $_POST['eLocation'];
        $startdate = $_POST['startdate'];
        $startime = $_POST['startime'];
        $enddate = $_POST['enddate'];
        $endtime = $_POST['endtime'];
        $fbpost = $_POST['fbpost'];
        $form = $_POST['form'];
        $eval = $_POST['eval'];

    //     $body = "
    //     <h1>Good Day, We have a new event !!</h1>
    //     <p><b>Event: </b> $eName</p>
    //     <p>$eDescription</p>
    //     <p><b>Information: </b>$eObjectives</p>
    //     <p>This event is <b>$rules</b></p>
    //     <p><b>Date:</b> $startdate</p>
    //     <p><b>Time:</b> $startime</p>
    //     <p><b>Venue:</b> $eLocation</p>
        
    //     <p>Thank you so much, we expect you to join this event :)</p>
    // ";
        $rec = mysqli_query($db, "SELECT * FROM studentsAcc WHERE setEmails=1");

        $query = "INSERT INTO events (eName, eDescription, eObjectives, rules, eLocation, startdate, startime, enddate, endtime, addby, fbpost, form, eval) VALUES ('$eName', '$eDescription', '$eObjectives', '$rules', '$eLocation', '$startdate', '$startime', '$enddate', '$endtime', '$user', '$fbpost', '$form', '$eval')";
        mysqli_query($db, $query);
        
        // $mail = new PHPMailer();

        // //SMTP Settings
        // $mail->isSMTP();
        // $mail->Host = "smtp.gmail.com";
        // $mail->SMTPAuth = true;
        // $mail->Username = "collegestudent.council1@gmail.com"; //enter you email address
        // $mail->Password = 'CSCpassword'; //enter you email password
        // $mail->Port = 465;
        // $mail->SMTPSecure = "ssl";
       
        // $mail->From = "admin.collegestudent.council1@bicol-u.edu.ph";
        // $mail->FromName = "BUPC College Student Council 2021";
        // while ($row=mysqli_fetch_assoc($rec)) {
        //     $mail->addAddress($row['buEmail']);
        // }
        // $mail->isHTML(true);
        // $mail->Subject = "Event: $eName";
        // $mail->Body = $body;
        // $mail->AltBody = "This is the plain text version of the email content";
       
       
        //             if (!$mail->send()) {
        //                 echo "Mailer Error";
        //             }else{
        //             echo '<script type="text/javascript">window.location="../index.php"</script>';
        //             }
        header("location: ../");
        $_SESSION['status'] = "Woo hoo!";
        $_SESSION['text'] = "New event added successfully!";
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $user = $_POST['user'];
        $eName = $_POST['eName'];
        $eDescription = $_POST['eDescription'];
        $eObjectives = $_POST['eObjectives'];
        $rules = $_POST['rules'];
        $eLocation = $_POST['eLocation'];
        $startdate = $_POST['startdate'];
        $startime = $_POST['startime'];
        $enddate = $_POST['enddate'];
        $endtime = $_POST['endtime'];
        $fbpost = $_POST['fbpost'];

        mysqli_query($db, "UPDATE events SET eName='$eName', eDescription='$eDescription', eObjectives='$eObjectives', rules='$rules', eLocation='$eLocation', startdate='$startdate', startime='$startime', enddate='$enddate', endtime='$endtime', editby='$user', fbpost='$fbpost' WHERE id=$id");
        header('location: ../');
         $_SESSION['status'] = "Woo hoo!";
        $_SESSION['text'] = "Event details updated successfully!";
        }

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM events WHERE id=$id");
        header('location: ../');
        $_SESSION['status'] = "Woo hoo!";
        $_SESSION['text'] = "Event deleted successfully!";
    }