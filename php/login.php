<?php  
if (isset($_SESSION['username'])) {
    header("location: List_all_Services.php");
}
$error_msg = "";
if (isset($_POST['btn_login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ret2 = $link->query("Select * From `tblclient` Where `Username` = '$username' AND `Password` = '$password'");
    $rows = mysqli_num_rows($ret2);
    if ($rows >= 1) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        echo "<script type='text/javascript'>window.location.href = 'index.php'</script>";
    }
    else {
        $error_msg = "Invalid username or password!";
    }
}
?>