<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
   <!-- Bootsrap -->
   <link rel="stylesheet" href="<?= base_url() ?>asset/vendor/bootstrap/css/bootstrap.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-Fv4CkVyz4ckGeW8T9Y0okjhg5WcwjgBR2w6WwzMFx5fn2v18OcykSACFy9g8gpx5t+2/K72zE92TP/Wi6syWsg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!--Custom Css -->
   <link rel="stylesheet" href="<?= base_url('asset/css/style.css') ?>">
	
	

	<!-- Icon -->
	<link rel="icon" href="" type="image/png">
   <title><?= $title ?> - SMK PGRI 1 KARAWANG</title>
   
   <!-- CSS untuk posisi logo WhatsApp -->
   <style>
        .whatsapp {
            position: fixed;
            bottom: 20px; /* Sesuaikan dengan jarak dari bawah */
            right: 20px; /* Sesuaikan dengan jarak dari kanan */
            z-index: 9999; /* Pastikan ikon selalu muncul di atas konten lain */
            text-decoration: none; /* Menghilangkan garis bawah pada teks */
        }

        /* CSS untuk ukuran gambar WhatsApp */
        .whatsapp img {
            width: 60px; /* Sesuaikan dengan lebar gambar yang diinginkan */
            height: auto; /* Biarkan tinggi gambar disesuaikan secara otomatis */
            margin-right: 10px; /* Memberikan jarak antara teks dan ikon */
        }
    </style>
</head>
<body>

	<!-- Navbar -->
	<?php $this->load->view('front/layouts/_navbar'); ?>
   <!-- End of Navbar -->

	<!-- Content -->
	<?php $this->load->view('front/pages/' . $page); ?>
	<!-- End of Content -->
	
	<!-- Footer -->
	<?php $this->load->view('front/layouts/_footer'); ?>
   <!-- End of Footer -->

   <!-- WhatsApp Logo -->
   <a href="<?= $wa?>" class="whatsapp" target="_blank">
       <img src="<?=base_url('img/icon/').'wa.png'?>" alt="WhatsApp">
   </a>

   <!-- Jquery -->
	<script src="<?= base_url() ?>asset/vendor/jquery/jquery.min.js"></script>
   <script src="<?= base_url() ?>asset/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
