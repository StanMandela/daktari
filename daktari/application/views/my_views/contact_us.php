<?php $this->load->view('template/header'); ?>

<section id="page-title" class="page-title-parallax" style="background-image: url('assets/imgs/page-title-bg.jpg'); background-position: bottom center; background-size: cover; padding: 80px 0;">

	<div class="container clearfix">
		<h1>Appointment</h1>
		<span>A Short Page Title Tagline</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Appointment</li>
		</ol>
	</div>

</section><!-- #page-title end -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">

			<div class="heading-block center border-bottom-0 mb-0">
				<h3>Book an Appointment.</h3>
<!--				<span>Get a session with Dr Wasike to </span>-->
			</div>

		</div>

		<div class="section mb-0 parallax" style="background: url('assets/imgs/bg.jpg') top center no-repeat / cover;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px 200px;">
			<div class="container">
				<div class="row">
					<div class="col-lg-5">
						<div class="d-none d-lg-block" style="position: relative;" data-height-xl="413" >
							<img src="assets/imgs/doctor1.png" alt="Image" style="position: absolute; bottom: -65px;">
						</div>
					</div>

					<div class="col-lg-7">
<!--						<div class="form-result"></div>-->
							<div class="row checkout-form-billing">
								<div class="intro_form_container">
									<div class="intro_form_title">Make an appointment</div>
									<form action="https://formspree.io/f/xyyopkjn" class="input-form" id="appointmentForm" method="POST">
										<div class="d-flex flex-row align-items-start justify-content-between flex-wrap ">
											<input type="text" name="Patient Name" id="checkout-form-billing-phone" class="intro_input required" value="" placeholder="Your Name">
											<input type="email" name="Email" id="checkout-form-billing-phone" class="intro_input required" value="" placeholder="Your Email">
											<input type="tel" name="Phone" id="checkout-form-billing-phone" class="intro_input required" value="" placeholder="Your Phone">
											<input type="date" name="Date of Birth" id="checkout-form-billing-phone" class="intro_input required" value="" placeholder="Date of Birth">
											<input type="date" name="Appointment Date" id="checkout-form-billing-phone" class="intro_input required" value="" placeholder="Date of Appointment">

										</div>
										<div class="">
											<textarea type="textarea" name="Message from Patient" id="date-picker"  class="intro_input tox-textarea " value="" hint=" Enter your Message"></textarea>

										</div>

										<button class="button button_1 intro_button trans_200">Make an appointment</button>

									</form>
								</div>
							</div>

<!--						<form class="row mb-0" id="template-medical-form" name="template-medical-form" action="https://formspree.io/f/xyyopkjn" method="post">-->
<!--							<div class="form-process">-->
<!--								<div class="css3-spinner">-->
<!--									<div class="css3-spinner-scaler"></div>-->
<!--								</div>-->
<!--							</div>-->
<!--							<div class="col-md-8 form-group">-->
<!--								<label for="template-medical-name">Name:</label>-->
<!--								<input type="text" id="template-medical-name" name="Patient Name" class="form-control not-dark required" value="">-->
<!--							</div>-->
<!--							<div class="col-md-4 form-group">-->
<!--								<label for="template-medical-phone">Phone:</label>-->
<!--								<input type="text" id="template-medical-phone" name="Phone" class="form-control not-dark required" value="">-->
<!--							</div>-->
<!--							<div class="w-100"></div>-->
<!--							<div class="col-md-8 form-group">-->
<!--								<label for="template-medical-email">Email Address:</label>-->
<!--								<input type="email" id="template-medical-email" name="Email" class="form-control not-dark required" value="">-->
<!--							</div>-->
<!--							<div class="col-md-4 form-group">-->
<!--								<label for="template-medical-dob">Date of Birth:</label>-->
<!--								<input type="text" id="template-medical-dob" name="Date of Birth" class="form-control not-dark required" value="" placeholder="DD/MM/YYYY">-->
<!--							</div>-->
<!--							<div class="w-100"></div>-->
<!--							<div class="col-md-5">-->
<!--								<div class="row">-->
<!--									<div class="col-12 form-group">-->
<!--										<label for="template-medical-appoint-date">Appointment Date:</label>-->
<!--										<input type="text" id="template-medical-appoint-date" name="Appointment Date" class="form-control not-dark required" value="" placeholder="DD/MM/YYYY">-->
<!--									</div>-->
<!---->
<!--								</div>-->
<!--							</div>-->
<!--							<div class="col-md-7 form-group">-->
<!--								<label for="template-medical-message">Message:</label>-->
<!--								<textarea id="template-medical-message" name="Booking Message" class="form-control not-dark " cols="30" rows="5"></textarea>-->
<!--							</div>-->
<!--							<div class="w-100"></div>-->
<!--							<div class="col-12 form-group text-end">-->
<!--								<button class="button button-rounded m-0" >Confirm Booking</button>-->
<!--							</div>-->
<!--						</form>-->

					</div>
				</div>
			</div>
		</div>

<!--		<div class="section m-0">-->
<!--			<div class="container clearfix">-->
<!--				<div class="heading-block center border-bottom-0 bottommargin-lg">-->
<!--					<h3>Questions Before Booking</h3>-->
<!--					<span></span>-->
<!--				</div>-->
<!--				<div id="faqs" class="faqs row">-->
<!--					<div class="col-lg-6">-->
<!---->
<!--						<h4><strong class="color">Q.</strong> How do I become an author?</h4>-->
<!--						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</p>-->
<!---->
<!--						<div class="line line-sm"></div>-->
<!---->
<!---->
<!--					</div>-->
<!---->
<!--					<div class="col-lg-6">-->
<!---->
<!--						<h4><strong class="color">Q.</strong> What Images, Videos, Code or Music Can I Use in my Items?</h4>-->
<!--						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad odio ab quis architecto recusandae doloremque incidunt! Eius, quidem, pariatur necessitatibus commodi aliquid deleniti repudiandae accusantium nemo voluptate ullam natus illum magnam alias nobis doloremque delectus ipsa dicta repellat maxime dignissimos eveniet quae debitis ratione assumenda tempore officiis fugiat dolor. Saepe iusto praesentium ullam aliquam impedit.</p>-->
<!---->
<!--						<div class="line line-sm"></div>-->
<!---->
<!---->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->

		<div class="promo promo-dark promo-full promo-uppercase bg-color footer-stick p-5">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-12 col-lg">
						<h3 style="letter-spacing: 2px;">Get the Best Care for your Loved Ones</h3>
						<span class="nott">We strive to provide Our Customers with Top Notch Support to make their Theme</span>
					</div>
					<div class="col-12 col-lg-auto mt-4 mt-lg-0">
						<a href="#" class="button button-large button-border button-rounded button-light button-white m-0">Contact Us</a>
					</div>
				</div>
			</div>
		</div>

	</div>
</section><!-- #content end -->



<?php $this->load->view('template/footer'); ?>
