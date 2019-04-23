<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
	$(document).ready(function() {
		$("#dtTable").DataTable({
			"processing": true,
			"ajax": {
				"url": "<?= base_url('raport/kehadiran/list_data/') ?>",
				"type": "POST"
			}
		});
		$("#siswa_id").select2({
			placeholder: "-- PILIH SISWA --"
		});
		$.ajax({
			type: "GET",
			url: "<?= base_url('user/siswa/options/') ?>",
			success: function(data){
				var opts = $.parseJSON(data);
				$.each(opts, function(i, d) {
					$("#siswa_id").append('<option value="'+d.id+'">'+d.text+'</option>');
				});
			}
		});
		$('#FrmKehadiran').submit(function(e) {
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
						url: "<?= base_url('raport/kehadiran/simpan/') ?>",
						data: $("#FrmKehadiran").serialize(),
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
		var form = $("#FrmKehadiran");
		$(document).on('click','#edit',function() {
			jQuery.ajax({
				type: "POST",
				url: "<?= base_url('raport/kehadiran/get_data/') ?>",
				dataType: 'json',
				data: {
					siswa_id: $(this).attr("data")
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
						url: "<?= base_url('raport/kehadiran/hapus/') ?>",
						data: {
							siswa_id: $(this).attr("data")
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
	});
</script>