<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
	$(document).ready(function() {
		$("#dtTable").DataTable({
			"processing": true,
			"ajax": {
				"url": "<?= base_url('data/tahun/list_data/') ?>",
				"type": "POST"
			}
		});
		$('#FrmTA').submit(function(e) {
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
						url: "<?= base_url('data/tahun/simpan/') ?>",
						data: $("#FrmTA").serialize(),
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
		var form = $("#FrmTA");
		$(document).on('click','#edit',function() {
			jQuery.ajax({
				type: "POST",
				url: "<?= base_url('data/tahun/get_data/') ?>",
				dataType: 'json',
				data: {
					tahun_ajaran_id: $(this).attr("data")
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
		$(document).on('click','#aktif',function() {
			swal({
				title: "Anda Yakin Ingin Mengaktifkan Data?",
				text: "",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((Oke) => {
				if(Oke) {
					$.ajax({
						type: "POST",
						url: "<?= base_url('data/tahun/aktifkan/') ?>",
						data: {
							tahun_ajaran_id: $(this).attr("data")
						},
						timeout: 5000,
						success: function(response) {
							swal("Data Telah Aktif!", response, "success").then((value) => {
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
		$(document).on('click','#nonaktif',function() {
			swal({
				title: "Anda Yakin Ingin Menonaktifkan Data?",
				text: "",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((Oke) => {
				if(Oke) {
					$.ajax({
						type: "POST",
						url: "<?= base_url('data/tahun/nonaktifkan/') ?>",
						data: {
							tahun_ajaran_id: $(this).attr("data")
						},
						timeout: 5000,
						success: function(response) {
							swal("Data Telah Aktif!", response, "success").then((value) => {
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
						url: "<?= base_url('data/tahun/hapus/') ?>",
						data: {
							tahun_ajaran_id: $(this).attr("data")
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