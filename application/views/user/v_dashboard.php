<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-aqua"><i class="fa fa-graduation-cap"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Siswa Aktif</span>
				<span class="info-box-number"><span id="siswa">0</span> Siswa</span>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-yellow"><i class="fa fa-chalkboard-teacher"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Pengajar Aktif</span>
				<span class="info-box-number"><span id="pengajar">0</span> Pengajar</span>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-green"><i class="fa fa-calendar-alt"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Tahun Ajaran</span>
				<span class="info-box-number"><span id="tahun_ajaran">-</span></span>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-red"><i class="fa fa-school"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Kehadiran</span>
				<span class="info-box-number"><span id="kehadiran">0</span>%</span>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">List Kelas</h3>
			</div>
			<div class="box-body">
				<table id="dtSiswa" class="table table-bordered table-striped">
					<thead>
						<th>Kelas</th>
						<th>Total Siswa</th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">List Pengajar</h3>
			</div>
			<div class="box-body">
				<table id="dtPengajar" class="table table-bordered table-striped">
					<thead>
						<th>Nama</th>
						<th>Mata Pelajaran</th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('user/js/js_page_dashboard') ?>