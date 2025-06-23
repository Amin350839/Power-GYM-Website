<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POWER_GYM Fitness</title>
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        main {
            padding: 40px 0;
            min-height: calc(100vh - 150px);
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 120px 0;
            background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url('https://images.unsplash.com/photo-1571902943202-507ec2618e8f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
            color: white;
            position: relative;
            overflow: hidden;
            border-bottom: 4px solid #ff4757;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255, 71, 87, 0.1), rgba(0, 0, 0, 0.2));
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            animation: fadeIn 1s ease-out;
        }
        .hero p {
            font-size: 20px;
            color: #ccc;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }
        .hero h1 {
            font-size: 50px;
            font-weight: 700;
            margin: 0 0 20px;
            line-height: 1.2;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }
        .buttons {
            margin-top: 30px;
        }
        .btn {
            display: inline-block;
            padding: 14px 35px;
            margin: 0 10px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .primary {
            background: linear-gradient(45deg, #ff4757, #e63946);
            color: white;
            border: none;
        }
        .secondary {
            background: transparent;
            color: #fff;
            border: 2px solid #ff4757;
        }
        .primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(255, 71, 87, 0.4);
            background: linear-gradient(45deg, #e63946, #ff4757);
        }
        .secondary:hover {
            transform: translateY(-5px);
            background: #ff4757;
            color: white;
            border-color: transparent;
            box-shadow: 0 10px 20px rgba(255, 71, 87, 0.4);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Footer */
        footer {
            background: #222;
            color: #ccc;
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
            border-top: 2px solid #ff4757;
        }


    </style>
</head>
<body>
<?php include 'header.php'; ?>
    
    <main>
        <div class="hero">
            <div class="hero-content">
                <p>New Way to Build a Healthy Lifestyle!</p>
                <h1>Upgrade Your Body at<br>POWER_GYM Fitness</h1>
                <div class="buttons">
                    <a href="contact.php" class="btn primary">Get Started</a>
                    <a href="about.php" class="btn secondary">Learn More</a>
                </div>
            </div>
        </div>
    </main>

<?php include 'footer.php'; ?>
</body>
</html>