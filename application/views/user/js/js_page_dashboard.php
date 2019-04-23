<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
	$(document).ready(function() {
		$("#dtSiswa").DataTable({
			"processing": true,
			"ajax": {
				"url": "<?= base_url('user/dashboard/list_kelas/') ?>",
				"type": "POST"
			}
		});
		$("#dtPengajar").DataTable({
			"processing": true,
			"ajax": {
				"url": "<?= base_url('user/dashboard/list_pengajar/') ?>",
				"type": "POST"
			}
		});
		$.ajax({
			url: "<?= base_url('user/dashboard/total_siswa/') ?>",
			type: "GET",
			dataType: "json",
			success:function(data) {
				$("#siswa").text(data);
			}
		});
		$.ajax({
			url: "<?= base_url('user/dashboard/total_pengajar/') ?>",
			type: "GET",
			dataType: "json",
			success:function(data) {
				$("#pengajar").text(data);
			}
		});
		$.ajax({
			url: "<?= base_url('user/dashboard/tahun_ajaran/') ?>",
			type: "GET",
			dataType: "json",
			success:function(data) {
				$("#tahun_ajaran").text(data);
			}
		});
		$.ajax({
			url: "<?= base_url('user/dashboard/persentase_kehadiran/') ?>",
			type: "GET",
			dataType: "json",
			success:function(data) {
				$("#kehadiran").text(data);
			}
		});
	});
</script>