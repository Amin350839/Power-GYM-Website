<?php
require_once 'config.php';

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitizeInput($_POST['username']);
    $email = sanitizeInput($_POST['email']);
    $password = $_POST['password'];

    if (empty($username)) $errors[] = "Username is required";
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    if (empty($password)) $errors[] = "Password is required";

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            
            if ($stmt->rowCount() > 0) {
                $errors[] = "Email already exists";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                $stmt->execute([$username, $email, $hashed_password]);
                $success = "Registration successful! You can now login.";
            }
        } catch (PDOException $e) {
            $errors[] = "Database error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - POWER_GYM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        body {
            background-color: #111;
            color: #fff;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .wrapper {
            margin: 40px auto;
            width: 100%;
            max-width: 1200px;
            min-height: calc(100vh - 200px);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .form-container {
            width: 100%;
            max-width: 600px;
            display: flex;
            background: linear-gradient(180deg, #222, #1a1a1a);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            border-radius: 12px;
            border: 1px solid #ff4757;
            overflow: hidden;
        }
        .col-left, .col-right {
            padding: 30px;
            display: flex;
            flex-direction: column;
        }
        .col-left {
            width: 50%;
            background: linear-gradient(45deg, #ff4757, #e63946);
            clip-path: polygon(0 0, 0% 100%, 100% 0);
        }
        .col-right {
            width: 50%;
            padding: 40px 30px;
        }
        .login-text {
            width: 100%;
            color: #fff;
            animation: fadeIn 1s ease-out;
        }
        .login-text h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }
        .login-text p {
            font-size: 1.1rem;
            color: #ccc;
            line-height: 1.8;
        }
        .login-form {
            width: 100%;
        }
        .login-form h2 {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #fff;
        }
        .login-form p {
            margin-bottom: 15px;
            color: #ccc;
            font-size: 1rem;
        }
        .login-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #fff;
        }
        .login-form label span {
            color: #ff4757;
            padding-left: 2px;
        }
        .login-form input {
            display: block;
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #444;
            border-radius: 5px;
            font-size: 1rem;
            background: #333;
            color: #fff;
            transition: all 0.3s ease;
        }
        .login-form input:focus {
            border-color: #ff4757;
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 71, 87, 0.3);
        }
        .login-form input[type=submit] {
            background: linear-gradient(45deg, #ff4757, #e63946);
            border: none;
            border-radius: 50px;
            padding: 14px 30px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }
        .login-form input[type=submit]:hover {
            background: linear-gradient(45deg, #e63946, #ff4757);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(255, 71, 87, 0.4);
        }
        .error-box {
            background: rgba(255, 71, 87, 0.1);
            color: #ff4757;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border-left: 4px solid #ff4757;
            font-size: 0.9rem;
        }
        .success-box {
            background: rgba(46, 204, 113, 0.1);
            color: #2ecc71;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border-left: 4px solid #2ecc71;
            font-size: 0.9rem;
        }
        .login-link {
            text-align: center;
            margin-top: 15px;
            font-size: 1rem;
        }
        .login-link a {
            color: #ff4757;
            text-decoration: none;
            font-weight: 600;
        }
        .login-link a:hover {
            color: #e63946;
            text-decoration: underline;
        }
        /* Footer Styles (aligned with index.php) */
        footer {
            background: #222;
            color: #ccc;
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
            border-top: 2px solid #ff4757;
        }
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        /* Responsive Design */
        @media (max-width: 600px) {
            .form-container {
                flex-direction: column;
                max-width: 100%;
            }
            .col-left, .col-right {
                width: 100%;
                clip-path: none;
            }
            .col-right {
                padding: 30px;
            }
            .login-text h2 {
                font-size: 1.8rem;
            }
            .login-form h2 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="wrapper">
        <div class="form-container">
            <div class="col-left">
                <div class="login-text">
                    <h2>Welcome to POWER_GYM!</h2>
                    <p>Start your fitness journey <br>with us today and <br>transform your <br>body and mind.</p>
                </div>
            </div>
            <div class="col-right">
                <div class="login-form">
                    <h2>Create Account</h2>
                    
                    <?php if (!empty($errors)): ?>
                        <div class="error-box">
                            <?php foreach ($errors as $error): ?>
                                <p><?= $error ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($success): ?>
                        <div class="success-box"><?= $success ?></div>
                    <?php endif; ?>

                    <form method="POST">
                        <p>
                            <label>Username<span>*</span></label> 
                            <input type="text" name="username" value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>" >
                        </p>
                        <p>
                            <label>Email<span>*</span></label> 
                            <input type="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" >
                        </p>
                        <p>
                            <label>Password<span>*</span></label> 
                            <input type="password" name="password" >
                        </p>
                        <p>
                            <input type="submit" value="Sign Up">
                        </p>
                    </form>
                    <p class="login-link">Already have an account? <a href="contact.php">Contact us</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>