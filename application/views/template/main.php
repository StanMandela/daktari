<?php
$this->load->view("template/header");
$this->load->view("template/sidebar");
?>

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
	<div id="loading">
		<img id="loading-image" src="<?php echo base_url() ?>assets/img/preloader.gif"
			 alt="Loading..."/>
	</div>
	<div class="layout-px-spacing">
		<?php
		if(!empty($view)) {
			$this->load->view($view);
		}
		?>
	</div>
	<!--Content Area closed on footer @Stanley-->
	<?php
	$this->load->view("template/footer");
	?>
