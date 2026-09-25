<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Roti - Membership</title>
    <!-- Link ke file CSS eksternal -->
    <link rel="stylesheet" href="<?php echo base_url('assets/styles.css'); ?>">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .hero-image {
            background-image: url('<?php echo base_url('assets/tampilan.png'); ?>');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 90vh;
        }
        header {
            background-color: #ffeed7;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        header .logo img {
            height: 80px; /* Tinggi logo */
            width: auto; /* Lebar akan mengikuti proporsi gambar */
            max-width: 100%; /* Memastikan tidak melampaui container */
        }
        header nav {
            display: flex;
            gap: 15px; /* Memberikan jarak antar menu */
        }
        header nav a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            font-weight: 600;
            background-color: #AD3C03; /* Warna latar belakang menu */
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        header nav a:hover {
            background-color: #d38f60; /* Warna latar belakang saat hover */
            color: #fff; /* Warna teks saat hover */
        }
        .membership {
            padding: 50px 20px;
            background-color: #ffeed7;
            text-align: center;
        }
        .membership h2 {
            color: #AD3C03;
        }
        .membership h2 .line1 {
            font-size: 36px;
            font-weight: bold;
        }
        .membership h2 .line2 {
            font-size: 20px;
            font-style: italic;
        }
        .membership h2 .line3 {
            font-size: 40px;
            font-weight: bold;
            color: #FF7F32;
        }
        .membership p {
            font-size: 18px;
            color: #5c2d1d;
        }
        .membership .btn {
            padding: 10px 20px;
            background-color: #AD3C03;
            color: white;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .membership .btn:hover {
            background-color: #d38f60;
        }
        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #AD3C03;
            color: #fff;
        }

        /* Tombol Scroll To Top */
        #scrollToTop {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #AD3C03;
            color: white;
            border: none;
            padding: 15px;
            font-size: 18px; /* Ukuran lebih besar */
            border-radius: 50%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            display: none;
            z-index: 1000;
        }
        #scrollToTop:hover {
            background-color: #d38f60;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <img src="<?php echo base_url('assets/logo_bakery.png'); ?>" alt="Logo Bakery">
        </div>
        <nav>
            <a href="<?php echo site_url('adminpanel/tampilan2'); ?>">Home</a>
            <a href="<?php echo site_url('adminpanel/login'); ?>">Login</a>
            <a href="<?php echo site_url('adminpanel/tampilan1'); ?>">Register</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-image"></div>
    </section>

    <!-- Tombol Scroll to Top -->
    <button id="scrollToTop" onclick="scrollToTop()">▲</button>

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Bakery. All Rights Reserved.</p>
    </footer>

    <!-- JavaScript -->
    <script>
        // Tampilkan tombol ketika scroll
        window.onscroll = function() {
            const scrollButton = document.getElementById('scrollToTop');
            if (document.documentElement.scrollTop > 200) {
                scrollButton.style.display = 'block';
            } else {
                scrollButton.style.display = 'none';
            }
        };

        // Fungsi scroll ke atas
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
</body>
</html>
