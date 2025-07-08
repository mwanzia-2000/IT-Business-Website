<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: ../");
    exit;
}

include '../../config.php';
$query = new Database();

if (isset($_COOKIE['username']) && isset($_COOKIE['session_token'])) {

    if (session_id() !== $_COOKIE['session_token']) {
        session_write_close();
        session_id($_COOKIE['session_token']);
        session_start();
    }

    $username = $_COOKIE['username'];
    $result = $query->select('users', '*', "WHERE username = '$username'");

    if (!empty($result)) {
        $user = $result[0];

        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $user['id'];

        header("Location: ../");
        exit;
    }
}

if (isset($_POST['submit'])) {
    $username = strtolower($_POST['username']);
    $input_password = $_POST['password'];

    $user = $query->login($username, $input_password, 'users');

    if ($user) {
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $user[0]['id'];
        $_SESSION['username'] = $user[0]['username'];

        setcookie('username', $username, time() + (86400 * 30), "/", "", true, true);
        setcookie('session_token', session_id(), time() + (86400 * 30), "/", "", true, true);
        ?>

        <script>
            window.onload = function () {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Login successful',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = '../';
                });
            };
        </script>

        <?php
    } else {
        ?>

        <script>
            window.onload = function () {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Invalid credentials',
                    text: 'The login or password is incorrect',
                    showConfirmButton: true
                });
            };
        </script>

        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="../../favicon.ico" rel="icon">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon.ico">
    <script src="../../assets/js/sweetalert2.js"></script>
    <link rel="stylesheet" href="../../assets/css/login_signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <div class="container">

        <h1>ADMIN LOGIN</h1>

        <form method="post" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required maxlength="30">
                <small id="username-error" style="color: red;"></small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" required maxlength="255">
                    <button type="button" id="toggle-password" class="password-toggle"><i
                            class="fas fa-eye"></i></button>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" id="submit" disabled>Login</button>
            </div>
        </form>

        

    </div>

    <script src="../src/js/sweetalert2.js"></script>
    <script>
        const usernameField = document.getElementById('username');
        const usernameError = document.getElementById('username-error');
        const submitButton = document.getElementById('submit');

        function validateForm() {
            const username = usernameField.value;
            const usernamePattern = /^[a-zA-Z0-9_]+$/;
            if (!usernamePattern.test(username)) {
                usernameError.textContent = "Username can only contain letters, numbers, and underscores!";
                submitButton.disabled = true;
            } else {
                usernameError.textContent = "";
                submitButton.disabled = false;
            }
        }

        usernameField.addEventListener('input', validateForm);

        document.getElementById('toggle-password').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const toggleIcon = this.querySelector('i');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        });
    </script>


</html>
