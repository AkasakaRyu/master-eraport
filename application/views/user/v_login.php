<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('template/login/v_header') ?>
	</head>
	<body class="hold-transition login-page">
		<div class="login-box" style="margin-top:0;padding-top:10%">
			<div class="login-logo">
				<h2 style="margin-top: 0">
					<b><?= $AppName->app_info_name ?> </b>SYSTEM<br />
					<small>
						<?= $Instansi->instansi_nama ?><br />
						<small><?= $Instansi->instansi_alamat ?></small>	
					</small>
				</h2>
			</div>
			<div class="login-box-body">
				<p class="login-box-msg">Please provide your identification or ask creators for support</p>
				<form id="FrmLogin" action="#" method="post">
					<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
					<div class="form-group has-feedback">
						<?php
							$data = array(
								'id' => 'user_name',
								'name' => 'user_name',
								'class' => 'form-control',
								'placeholder' => 'Username',
								'required' => 'true',
								'autocomplete' => 'off'
							);
							echo form_input($data);
						?>
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<?php
							$data = array(
								'id' => 'user_pass',
								'name' => 'user_pass',
								'class' => 'form-control',
								'type' => 'password',
								'placeholder' => 'Password',
								'required' => 'true',
								'autocomplete' => 'off'
							);
							echo form_input($data);
						?>
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<button type="submit" class="btn btn-success btn-block btn-flat">Sign In</button>
						</div>
					</div>
				</form>
				<br />
				<p class="text-center">2018 &copy; <br />Developed with <i class="fa fa-heart" style="color:red"></i> Untuk Adik Kecil Tercinta</p>
			</div>
		</div>
		<?php $this->load->view('template/login/js/js_page_login') ?>
	</body>
</html>