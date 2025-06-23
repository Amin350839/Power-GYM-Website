<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes - POWER_GYM</title>
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
        .subtitle {
            color: #ccc;
            font-size: 1.3rem;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .title {
            font-size: 3rem;
            font-weight: 700;
            color: #fff;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }
        .class-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        .class-card {
            background: linear-gradient(180deg, #222, #1a1a1a);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #ff4757;
        }
        .class-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 12px 25px rgba(255, 71, 87, 0.4);
        }
        .class-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-bottom: 3px solid #ff4757;
        }
        .card-content {
            padding: 20px;
            text-align: left;
        }
        .card-content h2 {
            font-size: 1.6rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #fff;
        }
        .trainer {
            color: #ccc;
            margin-bottom: 10px;
            font-size: 1rem;
        }
        .price {
            color: #ff4757;
            font-size: 1.7rem;
            font-weight: 700;
            margin-top: 10px;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
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
            .subtitle {
                font-size: 1.1rem;
            }
            .title {
                font-size: 2rem;
            }
            .class-card {
                max-width: 280px;
                margin: 0 auto;
            }
            .class-card img {
                height: 200px;
            }
            .card-content h2 {
                font-size: 1.4rem;
            }
            .price {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="container">
        <div class="content">
            <p class="subtitle">Get a Perfect Body</p>
            <h1 class="title">Our Training Classes</h1>
        </div>
        <div class="class-grid">
            <div class="class-card">
                <img src="assets/images/islam.jpg" alt="Judo Class">
                <div class="card-content">
                    <h2>Judo</h2>
                    <p class="trainer">Trained by - Coach Islem</p>
                    <div class="price">80dt</div>
                </div>
            </div>
            <div class="class-card">
                <img src="assets/images/chimaev2.webp" alt="Jujitsu Class">
                <div class="card-content">
                    <h2>Jujitsu</h2>
                    <p class="trainer">Trained by - Coach Hamza</p>
                    <div class="price">70dt</div>
                </div>
            </div>
            <div class="class-card">
                <img src="assets/images/merab.webp" alt="Cardio Class">
                <div class="card-content">
                    <h2>Cardio</h2>
                    <p class="trainer">Trained by - Coach Amir</p>
                    <div class="price">65dt</div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>