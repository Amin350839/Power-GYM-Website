<?php
$current_year = date('Y');
?>

<style>
    /* Styles spécifiques pour le footer */
    footer {
        background-color: #111;
        color: #fff;
        padding: 50px 0 20px;
        font-family: 'Arial', sans-serif;
        position: relative;
        margin-top: 80px;
    }
    
    footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #ff4757, #bd1919);
    }
    
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    .footer-content {
        display: flex;
        justify-content: space-between;
        width: 100%;
        flex-wrap: wrap;
        margin-bottom: 30px;
    }
    
    .footer-section {
        flex: 1;
        min-width: 250px;
        margin-bottom: 30px;
        padding: 0 15px;
    }
    
    .footer-section h3 {
        color: #ff4757;
        margin-bottom: 20px;
        font-size: 18px;
        position: relative;
        padding-bottom: 10px;
    }
    
    .footer-section h3::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 2px;
        background-color: #ff4757;
    }
    
    .footer-section p {
        color: #bbb;
        line-height: 1.6;
        margin-bottom: 15px;
    }
    
    .footer-section a {
        color: #bbb;
        text-decoration: none;
        display: block;
        margin-bottom: 10px;
        transition: all 0.3s;
    }
    
    .footer-section a:hover {
        color: #ff4757;
        padding-left: 5px;
    }
    
    .social-links {
        display: flex;
        margin-top: 20px;
    }
    
    .social-links a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background-color: #222;
        border-radius: 50%;
        margin-right: 10px;
        color: #fff;
        transition: all 0.3s;
    }
    
    .social-links a:hover {
        background-color: #ff4757;
        transform: translateY(-5px);
    }
    
    .footer-bottom {
        text-align: center;
        padding-top: 20px;
        border-top: 1px solid #222;
        width: 100%;
    }
    
    .footer-bottom p {
        color: #bbb;
        font-size: 14px;
    }
    
    @media (max-width: 768px) {
        .footer-section {
            flex: 100%;
            text-align: center;
        }
        
        .footer-section h3::after {
            left: 50%;
            transform: translateX(-50%);
        }
        
        .social-links {
            justify-content: center;
        }
    }
</style>

<footer>
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>About Us</h3>
                <p>POWER_GYM is a premium fitness center dedicated to helping you achieve your fitness goals with state-of-the-art equipment and professional trainers.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Quick Links</h3>
                <a href="index.php">Home</a>
                <a href="about.php">About Us</a>
                <a href="classes.php">Classes</a>
                <a href="schedules.php">Schedules</a>
                <a href="contact.php">Contact</a>
            </div>
            
            <div class="footer-section">
                <h3>Contact Info</h3>
                <p><i class="fas fa-map-marker-alt"></i> 03 Boudreya, Tunis</p>
                <p><i class="fas fa-phone"></i> +216 54 014 626</p>
                <p><i class="fas fa-envelope"></i> info@powergym.com</p>
                <p><i class="fas fa-clock"></i> Mon-Fri: 6:00 AM - 10:00 PM</p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>© <?= $current_year ?> POWER_GYM Fitness. All rights reserved.</p>
        </div>
    </div>
</footer>