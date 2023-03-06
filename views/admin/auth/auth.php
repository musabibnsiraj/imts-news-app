<?php
include __DIR__ . '/../../../helpers/AppManager.php';

$pm = AppManager::getPM();
$sm = AppManager::getSM();

$email = $_POST['email'];
$password = $_POST['password'];
if (empty($email) || empty($password)) {
    flash('register_error', 'All fields are required');
   
    header("Location: " . $_SERVER['HTTP_REFERER']);

} else {
    $param = array(':email' => $email);
    $user = $pm->run("SELECT * FROM users WHERE email = :email", $param, true);
    if ($user != null) {
        $correct = password_verify($password, $user['password']);
        if ($correct) {
            $sm->setAttribute("userId", $user['id']);
            // $_SESSION['user'] = $user['id'];
            $sm->setAttribute("username", $user['username']);
            
            header('location: ../../../admin.php');
        } else {
            // print('The password is wrong');
            flash('register_error', 'All fields are required');
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    } else {
        print('User not found!');
    }
}
