<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<style>
    /* Styles spécifiques pour le header */
    header {
        background-color: #000;
        color: #fff;
        padding: 30px 20px;
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
    }
    
    .header-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }
    
    .logo {
        font-size: 24px;
        font-weight: 700;
        color: #fff;
        text-decoration: none;
    }
    
    .logo span {
        color: #ff4757;
    }
    
    nav {
        display: flex;
        align-items: center;
    }
    
    nav a {
        color: #fff;
        text-decoration: none;
        margin-left: 25px;
        font-size: 16px;
        font-weight: 500;
        transition: all 0.3s ease;
        position: relative;
    }
    
    nav a:hover,
    nav a.active {
        color: #ff4757;
    }
    
    nav a.active::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #ff4757;
    }
    
    /* Specific style for user icon underline */
    nav a.icon-link.active::after {
        width: 20px; /* Adjust to match icon width */
        left: 80%;
        transform: translateX(-50%);
    }
    
    nav i {
        font-size: 18px;
        margin-left: 25px;
        transition: all 0.3s ease;
    }
    
    nav i:hover {
        color: #ff4757;
        transform: translateY(-3px);
    }
    
    /* Menu responsive */
    .menu-toggle {
        display: none;
        cursor: pointer;
        font-size: 24px;
    }
    
    @media (max-width: 768px) {
        .menu-toggle {
            display: block;
        }
        
        nav {
            position: fixed;
            top: 80px;
            left: -100%;
            width: 100%;
            height: calc(100vh - 80px);
            background-color: #000;
            flex-direction: column;
            align-items: center;
            padding: 40px 0;
            transition: all 0.5s ease;
        }
        
        nav.active {
            left: 0;
        }
        
        nav a {
            margin: 15px 0;
        }
        
        nav i {
            margin: 15px 0;
        }
    }
</style>

<header>
    <div class="header-container">
        <div class="logo">POWER<span>GYM</span> Fitness</div>
        
        <div class="menu-toggle">
            <i class="fas fa-bars"></i>
        </div>
        
        <nav id="main-nav">
            <a href="index.php" class="<?= ($current_page === 'index.php') ? 'active' : '' ?>">HOME</a>
            <a href="about.php" class="<?= ($current_page === 'about.php') ? 'active' : '' ?>">ABOUT US</a>
            <a href="classes.php" class="<?= ($current_page === 'classes.php') ? 'active' : '' ?>">CLASSES</a>
            <a href="schedules.php" class="<?= ($current_page === 'schedules.php') ? 'active' : '' ?>">SCHEDULES</a>
            <a href="contact.php" class="<?= ($current_page === 'contact.php') ? 'active' : '' ?>">CONTACT</a>
            <a href="signup.php" class="<?= ($current_page === 'signup.php') ? 'active' : '' ?> icon-link"><i class="fas fa-user"></i></a>
        </nav>
    </div>
</header>

<script>
    document.querySelector('.menu-toggle').addEventListener('click', function() {
        document.getElementById('main-nav').classList.toggle('active');
    });
    
    document.querySelectorAll('#main-nav a').forEach(link => {
        link.addEventListener('click', function() {
            document.getElementById('main-nav').classList.remove('active');
        });
    });
</script>