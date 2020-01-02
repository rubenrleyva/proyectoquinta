<!-- Area de principales ofertas
============================================ -->
<div id="pricing-area" class="pricing-area overlay overlay-black overlay-40 pt-90 pb-60">
	<div class="container">
		<!-- Section Title -->
		<div class="row">
			<div class="section-title title-white text-center col-12 mb-45">
				<h3 class="heading">Ofertas</h3>
				<div class="excerpt">
					<p>Nuestras mejores ofertas para ti.</p>
				</div>
				<i class="icofont icofont-traffic-light"></i>
			</div>
		</div>
		<div class="row multiple-items">
			@foreach($servicios as $servicio)
				@if ($servicio->oferta == 1)
					<div class="col-lg-3 col-md-6 col-12 mb-30">
						<div class="single-pricing text-center">
							<div class="pricing-head">
                                <h4>{{ $servicio->descripcion}}</h4>
							</div>
							<div class="pricing-price">
								<h2>{{ $servicio->precioiva }} €</h2>
							</div>
							<ul class="pricing-details">
								<li>Completo.</li>
								@if ( $servicio->clases > 0)
									<li>{{ $servicio->clases}} clases prácticas.</li>	
								@else
									<li>Sin clases prácticas.</li>
								@endif
							</ul>
							{{-- <a href="#" class="pricing-action"></a> --}}<a href="https://api.whatsapp.com/send?phone=34685881044&text=Hola%20quiero%20información sobre la oferta del {{ $servicio->descripcion }}." class="pricing-action">Elegir (Contacta)</a>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
</div>
