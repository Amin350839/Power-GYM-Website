<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - POWER_GYM</title>
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
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        .content {
            text-align: center;
            margin-bottom: 60px;
            animation: fadeIn 1s ease-out;
        }
        .content h1 {
            font-size: 3rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }
        .content p {
            color: #ccc;
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 1rem;
        }
        .content p strong {
            color: #ff4757;
            font-weight: 600;
        }
        .trainers {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 2rem;
        }
        .trainer-card {
            background: linear-gradient(180deg, #222, #1a1a1a);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            border-radius: 12px;
            overflow: hidden;
            width: 300px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #ff4757;
        }
        .trainer-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 12px 25px rgba(255, 71, 87, 0.4);
        }
        .trainer-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-bottom: 3px solid #ff4757;
        }
        .trainer-card h2 {
            font-size: 1.6rem;
            font-weight: 600;
            margin: 1rem 0 0.5rem;
            padding: 0 1rem;
            color: #fff;
        }
        .trainer-card p {
            color: #ccc;
            padding: 0 1rem;
            margin-bottom: 1rem;
            font-size: 1rem;
        }
        .social-links {
            display: flex;
            gap: 1.5rem;
            padding: 1rem;
            justify-content: center;
            background: #333;
        }
        .social-links a {
            color: #ff4757;
            font-size: 1.5rem;
            transition: color 0.3s ease, transform 0.3s ease;
        }
        .social-links a:hover {
            color: #e63946;
            transform: scale(1.2);
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
            .content h1 {
                font-size: 2rem;
            }
            .content p {
                font-size: 1rem;
            }
            .trainer-card {
                width: 100%;
                max-width: 280px;
            }
            .trainer-card img {
                height: 250px;
            }
            .trainer-card h2 {
                font-size: 1.4rem;
            }
            .social-links a {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <div class="container">
            <div class="content">
                <h1>Hello, We Are POWER_GYM</h1>
                <p>Welcome to <strong>POWER_GYM</strong> Fitness, Your Path to a Healthier Life!</p>
                <p>At POWER_GYM Fitness, we believe that a healthy lifestyle is the foundation of a happy and fulfilling life.</p>
                <p>Our state-of-the-art facility is designed to help you achieve your fitness goals.</p>
                <p>Join us today and start your journey!</p>
            </div>
            <div class="trainers">
                <div class="trainer-card">
                    <img src="assets/images/arthur.jpeg" alt="Arthur Beterbiev">
                    <h2>Arthur Beterbiev</h2>
                    <p>Boxing Coach</p>
                    <p>3x World Champion</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="trainer-card">
                    <img src="assets/images/cbum.webp" alt="CBUM">
                    <h2>CBUM</h2>
                    <p>Body Trainer</p>
                    <p>5x World Champion</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>