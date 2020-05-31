<?php include("templates/header.php"); ?>


	<!-- Page Info -->
	<div class="page-info-section page-info">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="index.php">Home</a> /
				<span>Contact</span>
			</div>
			<img src="assets/img/page-info-art.png" alt="" class="page-info-art">
		</div>
	</div>
	<!-- Page Info end -->


	<!-- Page -->
	<div class="page-area contact-page">
		<div class="container spad">
			<div class="text-center">
				<h4 class="contact-title">Get in Touch</h4>
			</div>
			<form class="contact-form">
				<div class="row">
					<div class="col-md-6">
						<input type="text" placeholder="First Name *">
					</div>
					<div class="col-md-6">
						<input type="text" placeholder="Last Name *">
					</div>
					<div class="col-md-12">
						<input type="text" placeholder="Subject">
						<textarea placeholder="Message"></textarea>
						<div class="text-center">
							<button class="site-btn">Send Message</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="container contact-info-warp">
			<div class="contact-card">
				<div class="contact-info">
					<h4>Shipping & Returnes</h4>
					<p>Phone: +53 345 7953 32453</p>
					<p>Email: yourmail@gmail.com</p>
				</div>
				<div class="contact-info">
					<h4>Informations</h4>
					<p>Phone: +53 345 7953 32453</p>
					<p>Email: yourmail@gmail.com</p>
				</div>
			</div>
		</div>
		<div class="map-area">
			<div class="map" id="map-canvas">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15680.254977096798!2d106.6930756!3d10.729567!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfae94aca5709003f!2sRMIT%20University!5e0!3m2!1svi!2s!4v1590854355252!5m2!1svi!2s" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
		</div>
	</div>
	<!-- Page end -->

<?php include("templates/footer.php"); ?>