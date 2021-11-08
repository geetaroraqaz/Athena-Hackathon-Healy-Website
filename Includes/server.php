<?php
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}

$_SESSION['LAST_ACTIVITY'] = time();

$db = mysqli_connect('localhost', 'root', '', 'healy');

$email = "";
$username = "";
$errors = array();

//if user signup button
if (isset($_POST['signup'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {
        $errors['username'] = "Username is required";
    }
    if (empty($email)) {
        $errors['email'] = "Email is required";
    }
    if (empty($password)) {
        $errors['password'] = "Password is required";
    }
    if ($password != $cpassword) {
        $errors['password'] = "Passwords aren't matching!";
    }

    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    }

    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email = '$email' LIMIT 1";
    $res = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($res); 

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            $errors['username'] = "Username already exists";
        }

        if ($user['email'] === $email) {
            $errors['email'] = "Email already exists";
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) === 0) {
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $insert_data = "INSERT INTO users (username, email, password, role)
                        values('$username', '$email', '$encpass', 0)";
        $data_check = mysqli_query($db, $insert_data);

        if ($data_check) {            
            echo "<script type = \"text/javascript\">
                alert(\"User Registered Succesfully\");
                window.location = (\"/AthenaHack Healthcare/login.php\")
                </script>";
        } else {
            $errors['db-error'] = "Something went wrong! Please try later";
        }
    }
}

//if user click login button
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $check_email = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($db, $check_email);
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if (password_verify($password, $fetch_pass)){
            $_SESSION['email'] = $email;
            $qr = "SELECT * FROM users WHERE email = '$email'";
            $res = $db->query($qr);
            $rws = $res->fetch_assoc();
            $_SESSION['username'] = $rws['username'];
            $_SESSION['role'] = $rws['role'];
            $_SESSION['user_id'] = $rws['user_id'];
            if($rws['role'] == 0){
                header("location: /AthenaHack Healthcare/user_appointments.php");
            }
            else{
                header("location: /AthenaHack Healthcare/doctor_appointments.php");
            }
            
        } else {
            $errors['email'] = "Incorrect email or password!";
        }
    } else {
        $errors['email'] = "It's look like you're not yet a member! Click on the Sign-up link to get started!.";
    }
}