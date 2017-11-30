
	<title>
		<?php
		session_start();
			include 'title.php';
		?>
	</title>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://dimsemenov-static.s3.amazonaws.com/dist/jquery.magnific-popup.min.js'></script>

        <script>
      $('.open-popup-link').magnificPopup({
    type: 'inline',
    midClick: true
});
$('button').magnificPopup({
    items: {
        src: '<div class="white-popup">Dynamically created popup</div>',
        type: 'inline'
    },
    closeBtnInside: true
});
    </script>


<?php

		include 'css/nav.html';
		//include 'css/button.html';
		//include 'css/popup.html';
		
		session_start();
		include 'includes/connect.php';
		include 'includes/functions.php';
		$my_id = $_SESSION['id'];
	?>
