<?php $this->load->view('template/header'); ?>

<!-- Page Title
		============================================= -->
<section id="page-title">

	<div class="container clearfix">
		<h1>Breast Cancer:</h1><h3>What we all need to know</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
			<li class="breadcrumb-item"><a href="<?php echo base_url() ?>news">News</a></li>
			<li class="breadcrumb-item active" aria-current="page">Book</li>
		</ol>
	</div>

</section><!-- #page-title end -->

<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">

			<div class="row">

				<!-- Portfolio Single Image
				============================================= -->
				<div class="col-lg-8 portfolio-single-image">
					<a href="#"><img src="<?php echo base_url() ?>/assets/imgs/book_frnt_page.jpeg" alt="Image"  style="height: fit-content; width: fit-content;"></a>

				</div><!-- .portfolio-single-image end -->

				<!-- Portfolio Single Content
				============================================= -->
				<div class="col-lg-4 portfolio-single-content">

					<!-- Portfolio Single - Description
					============================================= -->
					<div class="fancy-title title-bottom-border">
						<h2>Book Info:</h2>
					</div>

					<p>Professor Wasike’s area of interest is Breast Surgery including Oncoplastic Breast Surgery,
						training and teaching Post Graduate students in General Surgery and Health Education in breast cancer.
						He has written a book entitled Breast Cancer, all you need to know. After training in breast fellowship
						at the University of Alberta, he became the first Breast Surgeon in Kenya and the East African Region.
						He has subsequently trained five more breast surgeons in Kenya working with the different institutions.
						He has supervised 16 post graduate residents on different topics related to breast cancer.
						He won the first Avon foundation for women scholarship for Global Clinical Breast Cancer
						Scholars where he was attached at the Emory University Atlanta Georgia in the USA. </p>
				<!-- Portfolio Single - Description End -->

					<div class="line"></div>

					<!-- Portfolio Single - Meta
					============================================= -->
					<ul class="portfolio-meta bottommargin">
						<li><span><i class="icon-user"></i>Written by:</span> Prof. Ronald Wasike</li>
						<li><span><i class="icon-calendar3"></i>Released on:</span> 17th March 2021</li>
						<li><span><i class="icon-lightbulb"></i>Fields:</span>Breast Cancer</li>
					</ul>
					<!-- Portfolio Single - Meta End -->



				</div><!-- .portfolio-single-content end -->

			</div>

			<div class="divider divider-center"><i class="icon-circle"></i></div>


		</div>
	</div>
</section><!-- #content end -->

<?php $this->load->view('template/footer'); ?>
