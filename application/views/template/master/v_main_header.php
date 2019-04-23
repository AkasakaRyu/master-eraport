<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<a href="<?= base_url() ?>" class="logo">
	<span class="logo-mini"><b>S</b>YS</span>
	<span class="logo-lg"><b><?= $this->session->userdata('appname') ?></b> SYSTEM</span>
</a>
<nav class="navbar navbar-static-top">
	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</a>
	<div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
			<li class="dropdown user user-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<span class="fa fa-caret-down"></span>
					<span class="hidden-xs"><?= $this->session->userdata('nama') ?></span>
				</a>
				<ul class="dropdown-menu">
					<li class="user-header">
						<p>
							<?= $this->session->userdata('nama') ?> - <?= $this->session->userdata('level') ?>
							<small>Member since <?= $this->session->userdata('created') ?></small>
						</p>
					</li>
					<li class="user-footer">
						<a href="<?= base_url('user/dashboard/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</nav>