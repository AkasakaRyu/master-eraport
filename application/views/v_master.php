<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('template/master/v_header') ?>
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<header class="main-header">
				<?php $this->load->view('template/master/v_main_header') ?>
			</header>
			<aside class="main-sidebar">
				<section class="sidebar">
					<?php $this->load->view('template/master/v_main_sidebar') ?>
				</section>
			</aside>
			<div class="content-wrapper">
				<section class="content-header">
					<h1>
						<?= $Title ?>
					</h1>
					<ol class="breadcrumb">
						<?php if(count($Breadcrumb)>1) : ?> 
							<?php foreach($Breadcrumb as $Brc) : ?>
								<li><?= $Brc ?></li>
							<?php endforeach ?>
						<?php else : ?>
							<li><i class="fa fa-dashboard"></i> Home</li>
						<?php endif ?>
					</ol>
				</section>
				<section class="content">
					<?php $this->load->view($Konten) ?>
				</section>
			</div>
			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					<b>Version</b> 1.1812.<?= CI_VERSION ?>
				</div>
				<strong>Copyright &copy; 2018.</strong> Developed with <i class="fa fa-heart" style="color:red"></i> Untuk Adik Kecil Tercinta.
			</footer>
		</div>
		<?php $this->load->view('template/master/js/js_page_master') ?>
	</body>
</html>
