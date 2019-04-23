<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
	$(document).ready(function() {
		$("#dtTable").DataTable({
			"processing": true,
			"ajax": {
				"url": "<?= base_url('user/siswa/list_data/') ?>",
				"type": "POST"
			}
		});
		$("#jenis_kelamin").select2({
			placeholder: "-- PILIH JENIS KELAMIN --"
		});
		$("#kelas_id").select2({
			placeholder: "-- PILIH KELAS --"
		});
		$.ajax({
			type: "GET",
			url: "<?= base_url('data/kelas/options/') ?>",
			success: function(data){
				var opts = $.parseJSON(data);
				$.each(opts, function(i, d) {
					$("#kelas_id").append('<option value="'+d.id+'">'+d.text+'</option>');
				});
			}
		});
		$('#FrmSiswa').submit(function(e) {
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
						url: "<?= base_url('user/siswa/simpan/') ?>",
						data: $("#FrmSiswa").serialize(),
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
		var form = $("#FrmSiswa");
		$(document).on('click','#edit',function() {
			jQuery.ajax({
				type: "POST",
				url: "<?= base_url('user/siswa/get_data/') ?>",
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
						url: "<?= base_url('user/siswa/hapus/') ?>",
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