<?php
require_once 'config.php';

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $class = sanitizeInput($_POST['class']);
    $message = sanitizeInput($_POST['message']);

    // Validation
    if (empty($name)) $errors[] = "Name is required";
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    if (empty($class)) $errors[] = "Class selection is required";
    if (empty($message)) $errors[] = "Message is required";

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO contacts (name, email, class, message) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $email, $class, $message]);
            $success = "Your message has been sent successfully!";
            // Réinitialiser les champs après succès
            $name = $email = $class = $message = '';
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
    <title>Contact Us - POWER_GYM</title>
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
        main {
            flex: 1;
            padding: 40px 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .section-title {
            text-align: center;
            margin-bottom: 60px;
            animation: fadeIn 1s ease-out;
        }
        .section-title h1 {
            font-size: 3rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 15px;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }
        .section-title p {
            color: #ccc;
            font-size: 1.3rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .section-title::after {
            content: '';
            display: block;
            width: 200px;
            height: 4px;
            background: linear-gradient(90deg, #ff4757, #e63946);
            margin: 10px auto;
            border-radius: 2px;
        }
        .contact-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
            margin-top: 30px;
        }
        .contact-info, .contact-form {
            flex: 1;
            min-width: 300px;
            background: linear-gradient(180deg, #222, #1a1a1a);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            border: 1px solid #ff4757;
        }
        .info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }
        .info-icon {
            font-size: 1.8rem;
            color: #ff4757;
            margin-right: 20px;
            margin-top: 5px;
            transition: transform 0.3s ease;
        }
        .info-item:hover .info-icon {
            transform: scale(1.2);
        }
        .info-content h3 {
            font-size: 1.3rem;
            margin-bottom: 5px;
            color: #fff;
        }
        .info-content p {
            color: #ccc;
            font-size: 1rem;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #fff;
        }
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #444;
            border-radius: 5px;
            font-size: 1rem;
            background: #333;
            color: #fff;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #ff4757;
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 71, 87, 0.3);
        }
        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }
        .btn {
            display: inline-block;
            background: linear-gradient(45deg, #ff4757, #e63946);
            color: #fff;
            border: none;
            padding: 14px 30px;
            border-radius: 50px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            text-align: center;
        }
        .btn:hover {
            background: linear-gradient(45deg, #e63946, #ff4757);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(255, 71, 87, 0.4);
        }
        .btn i {
            margin-right: 8px;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 1rem;
        }
        .alert-success {
            background: rgba(46, 204, 113, 0.1);
            color: #2ecc71;
            border-left: 4px solid #2ecc71;
        }
        .alert-danger {
            background: rgba(255, 71, 87, 0.1);
            color: #ff4757;
            border-left: 4px solid #ff4757;
        }
        .signup-link {
            text-align: center;
            margin-top: 20px;
        }
        .signup-link a {
            color: #ff4757;
            text-decoration: none;
            font-weight: 600;
        }
        .signup-link a:hover {
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
        @media (max-width: 768px) {
            .section-title h1 {
                font-size: 2rem;
            }
            .section-title p {
                font-size: 1.1rem;
            }
            .contact-container {
                flex-direction: column;
            }
            .info-icon {
                font-size: 1.5rem;
            }
            .info-content h3 {
                font-size: 1.1rem;
            }
            .btn {
                padding: 12px 25px;
            }
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <div class="container">
            <div class="section-title">
                <h1>Contact Us</h1>
                <p>Have Questions? We're Here to Help!</p>
            </div>
            
            <div class="contact-container">
                <div class="contact-info">
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h3>Location</h3>
                            <p>123 Fitness Street, Sport City</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="info-content">
                            <h3>Phone</h3>
                            <p>+1 234 567 890</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h3>Email</h3>
                            <p>info@powergym.com</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-content">
                            <h3>Working Hours</h3>
                            <p>Monday - Friday: 6:00 AM - 10:00 PM</p>
                            <p>Saturday - Sunday: 8:00 AM - 8:00 PM</p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form">
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <?php foreach ($errors as $error): ?>
                                <p><?= $error ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($success): ?>
                        <div class="alert alert-success"><?= $success ?></div>
                    <?php endif; ?>
                    
                    <form method="POST">
                        <div class="form-group">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Your name" 
                                   value="<?= isset($name) ? htmlspecialchars($name) : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Your email" 
                                   value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="class" class="form-label">Select Class</label>
                            <select id="class" name="class" class="form-control">
                                <option value="">-- Choose a class --</option>
                                <option value="judo" <?= (isset($class) && $class === 'judo') ? 'selected' : '' ?>>Judo</option>
                                <option value="jujitsu" <?= (isset($class) && $class === 'jujitsu') ? 'selected' : '' ?>>Jujitsu</option>
                                <option value="boxing" <?= (isset($class) && $class === 'boxing') ? 'selected' : '' ?>>Boxing</option>
                                <option value="cardio" <?= (isset($class) && $class === 'cardio') ? 'selected' : '' ?>>Cardio</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea id="message" name="message" class="form-control" placeholder="Your message here..."><?= isset($message) ? htmlspecialchars($message) : '' ?></textarea>
                        </div>
                        <button type="submit" class="btn">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                        <div class="signup-link">
                            <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>