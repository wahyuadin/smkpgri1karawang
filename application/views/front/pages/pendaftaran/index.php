<!--================Home Banner Area =================-->
<div class="jumbotron banner_area jumbotron-fluid" style="background-image: url(<?= base_url('img/banner_area/bg.jpg') ?>); ">
	<div class="container">
		<h1 class="display-4 my-auto text-light text-center">Pendaftaran</h1>
	</div>
</div>
<!--================End Home Banner Area =================-->
<style>
        /* CSS untuk loading spinner */
        .spinner-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 50vh;
        }
        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
<!-- Content -->
<div class="spinner-container">
        <h5 style="text-align: center;">Silahkan Tunggu...</h5>
        <div class="spinner"></div>
    </div>
	<div>
		<?php 
		 echo '<script>
            setTimeout(function() {
                window.location.href = "'.$content->link.'";
            }, 3000);
          </script>';
		?>
    <!-- Isi konten Anda di sini -->
</div>
<!-- End of Content -->
<script>
    setTimeout(function() {
        var contentPosition = document.getElementById('content').offsetTop;
        window.scrollTo({
            top: contentPosition,
            behavior: 'smooth'
        });
    }, 3000);
</script>
