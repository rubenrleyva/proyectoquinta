<!-- Area de contacto
============================================ -->
<div id="contact-area" class="contact-area bg-gray">
	<div class="container pb-90 pt-90">
		<!-- Section Title -->
		<div class="row">
			<div class="section-title text-center col-12 mb-45">
				<h3 class="heading">información</h3>
				<div class="excerpt">
					<p>Lorem ipsum dolor sit amet, consectetur maksu rez do eiusmod tempor magna aliqua</p>
				</div>
				<i class="icofont icofont-traffic-light"></i>
			</div>
		</div>
		<div class="row">
			<!-- Contact Info -->
			<div class="contact-info col-lg-4 col-sm-5 col-12">
				<div class="single-info text-left fix">
					<div class="icon"><i class="icofont icofont-phone"></i></div>
					<div class="content fix">
						<h5>Llámanos</h5>
						<p>+34 685881044</p>
						<br>
					</div>
				</div>
				<div class="single-info text-left fix">
					<div class="icon"><i class="icofont icofont-envelope"></i></div>
					<div class="content fix">
						<h5>Mandanos un email</h5>
						<p><a href="#">info@autoescuelaquintamarcha.com</a></p>
						<br>
					</div>
				</div>
				<div class="single-info text-left fix">
					<div class="icon"><i class="icofont icofont-location-pin"></i></div>
					<div class="content fix">
						<h5>Nos encontrarás en</h5>
						<p>C/ Paseo de la Ermita nº 3, <br />Churriana de la Vega, Granada.</p>
					</div>
				</div>
			</div>
			<!-- Contact Form -->
			<div class="contact-form form text-left col-lg-8 col-sm-7 col-12">
				<form id="contact-form" action="mail.php" method="post">
					<div class="input-2">
						<div class="input"><input type="text" name="name" placeholder="Nombre" /></div>
						<div class="input"><input type="email" name="email" placeholder="E-mail" /></div>
					</div>
					<div class="input"><input type="text" name="subject" placeholder="Tema" /></div>
					<div class="input textarea"><textarea name="message" placeholder="Mensaje"></textarea></div>
					<div class="input input-submit"><input type="submit" value="Enviar" /></div>
				</form>
				<p class="form-messege"></p>
			</div>
		</div>
	</div>
	<div id="contact-map"></div>
</div>
@push('scripts')
  	<!-- Google Map APi
	============================================ -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdWLY_Y6FL7QGW5vcO3zajUEsrKfQPNzI"></script>
	<script src="js/map.js"></script>
@endpush



