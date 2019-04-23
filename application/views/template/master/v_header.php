<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title><?= $Title ?> | <?= $this->session->userdata('appname') ?> Systems</title>
<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.min.css') ?>">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="<?= base_url('assets/datatables/css/dataTables.bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/dist/css/AdminLTE.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/dist/css/skins/_all-skins.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/select2/css/select2.min.css') ?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/datatables/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?= base_url('assets/jquery/jquery.slimscroll.min.js') ?>"></script>
<script src="<?= base_url('assets/fastclick/fastclick.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
<script src="<?= base_url('assets/select2/js/select2.full.min.js') ?>"></script>
<script>
	$.ajaxSetup( {
		data: {
			'<?= $this->security->get_csrf_token_name() ?>': '<?= $this->security->get_csrf_hash() ?>'
		}
	});
</script>