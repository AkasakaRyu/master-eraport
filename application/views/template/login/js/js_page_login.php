<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	$(document).ready(function() {
		$('#FrmLogin').submit(function(e) {
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "<?= base_url('portal/login') ?>",
				data: $("#FrmLogin").serialize(),
				timeout: 5000,
				success: function(response) {
					swal("Data Sampai ke Database!", response, "success").then((value) => {
						location.reload();
					})
				},
				error: function(xhr, status, error) {
					swal(error, "Please Ask Support or Refresh the Page!", "error").then((value) => {
						location.reload();
					})
				}
			})
		});
	})
</script>