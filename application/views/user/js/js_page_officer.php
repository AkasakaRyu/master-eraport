<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
	$(document).ready(function() {
		$("#level_id").select2({
			placeholder: "-- SELECT DIVISION --"
		});
		$.ajax({
			type: "GET",
			url: "<?= base_url('user/level/options/') ?>",
			success: function(data){
				var opts = $.parseJSON(data);
				$.each(opts, function(i, d) {
					$("#level_id").append('<option value="'+d.id+'">'+d.text+'</option>');
				});
			}
		});

		$("#dtTable").DataTable({
			"processing": true,
			"ajax": {
				"url": "<?= base_url('user/officer/list_data/') ?>",
				"type": "POST"
			}
		});

		$('#FrmOfficer').submit(function(e) {
			e.preventDefault();
			swal({
				title: "Anda Yakin Ingin Menyimpan Data?",
				text: "",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((Oke) => {
				if(Oke) {
					$.ajax({
						type: "POST",
						url: "<?= base_url('user/officer/simpan/') ?>",
						data: $("#FrmOfficer").serialize(),
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
				} else {
					swal("Poof!","Penyimpanan Data Dibatalkan", "error").then((value) => {
						location.reload();
					})
				}
			});
		});
		var form = $("#FrmOfficer");
		$(document).on('click','#edit',function() {
			jQuery.ajax({
				type: "POST",
				url: "<?= base_url('user/officer/get_data/') ?>",
				dataType: 'json',
				data: {
					user_id: $(this).attr("data")
				},
				success: function(data) {
					$.each(data, function(key, value) {
						var ctrl = $('[name='+key+']',form);
						switch(ctrl.prop("type")) {
							case "select-one":    
								ctrl.val(value).change();  
							break;  
							default:
								ctrl.val(value); 
						}
					});
				}
			});
		});
		$(document).on('click','#hapus',function() {
			swal({
				title: "Anda Yakin Ingin Menghapus Data?",
				text: "",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((Oke) => {
				if(Oke) {
					$.ajax({
						type: "POST",
						url: "<?= base_url('user/officer/hapus/') ?>",
						data: {
							user_id: $(this).attr("data")
						},
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
				} else {
					swal("Poof!","Penyimpanan Data Dibatalkan", "error").then((value) => {
						location.reload();
					})
				}
			})
		});
	})
</script>