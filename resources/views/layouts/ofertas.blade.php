<!-- Area de principales ofertas
============================================ -->
<div id="pricing-area" class="pricing-area overlay overlay-black overlay-40 pt-90 pb-60">
	<div class="container">
		<!-- Section Title -->
		<div class="row">
			<div class="section-title title-white text-center col-12 mb-45">
				<h3 class="heading">Ofertas</h3>
				<div class="excerpt">
					<p>Aquí encontrarás nuestras ofertas para ti</p>
				</div>
				<i class="icofont icofont-traffic-light"></i>
			</div>
		</div>
		<div class="row">
			@foreach($permisos as $permiso)
				@if ($permiso->oferta == 1)
					<div class="col-lg-3 col-md-6 col-12 mb-30">
						<div class="single-pricing text-center">
							<div class="pricing-head">
                                <h4>{{ $permiso->descripcion}}
                                    @if ($permiso->clases > 0)
                                        {{ $permiso->clases }}
                                    @endif
                                </h4>
							</div>
							<div class="pricing-price">
								<h2>{{ $permiso->precioferta }} €</h2>
							</div>
							<ul class="pricing-details">
                                <li>Completo.</li>
                                {{-- <li>
                                    @if ($permiso->clases > 0)
                                        {{ $permiso->clases }} clases prácticas
                                    @endif
                                </li> --}}
								<li>{{ $permiso->clases}} clases prácticas.</li>
							</ul>
							{{-- <a href="#" class="pricing-action"></a> --}}<a href="https://api.whatsapp.com/send?phone=34685881044&text=Hola%20quiero%20información sobre la oferta del {{ $permiso->descripcion}}." class="pricing-action">Elegir (Contacta)</a>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
</div>
