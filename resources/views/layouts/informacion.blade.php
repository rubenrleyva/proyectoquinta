<!-- Area de información
============================================ -->
<div id="course-area" class="course-area bg-gray pt-90 pb-60">
	@if (Request::is('/'))
		<div class="container">
			<!-- Sección de título -->
			<div class="row">
				<div class="section-title text-center col-12 mb-45">
					<h3 class="heading">¿Qué impartimos?</h3>
					<div class="excerpt">
						<p>Información sobre los permisos básicos, profesionales, cursos y titulaciones.</p>
					</div>
					<i class="icofont icofont-traffic-light"></i>
				</div>
			</div>
			<!-- Contenedor de los cursos -->
			<div class="course-wrapper row">
				<div class="col-md-3 col-sm-6 col-12 mb-30 fix">
					<div class="course-item text-center">
						<i class="icofont icofont-car-alt-4"></i>
						<h4>básicos</h4>
						<p>There are many variations of items passag LoIpsum available the majority ratomised </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-12 mb-30 fix">
					<div class="course-item text-center">
						<i class="icofont icofont-ambulance-cross"></i>
						<h4>profesionales</h4>
						<p>There are many variations of items passag LoIpsum available the majority ratomised </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-12 mb-30 fix">
					<div class="course-item text-center">
						<i class="icofont icofont-fast-delivery"></i>
						<h4>cursos</h4>
						<p>There are many variations of items passag LoIpsum available the majority ratomised </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-12 mb-30 fix">
					<div class="course-item text-center">
						<i class="icofont icofont-notebook"></i>
						<h4>titulaciones</h4>
						<p>There are many variations of items passag LoIpsum available the majority ratomised </p>
					</div>
				</div>
			</div>
		</div>
	@elseif(Request::is('info-permisos'))
		<div class="container">
			<!-- Sección de título -->
			<div class="row">
				<div class="section-title text-center col-12 mb-45">
					<h3 class="heading">permisos</h3>
					<div class="excerpt">
						<p>Información sobre los permisos básicos y profesionales.</p>
					</div>
					<i class="icofont icofont-traffic-light"></i>
				</div>
			</div>
			<!-- Filtro de galería -->
		<div class="gallery-filter text-center">
			<button class="active" data-filter="*">todos</button>
			<button data-filter=".b">b</button>
			<button data-filter=".am">am</button>
			<button data-filter=".a1a2">a1a2</button>
			<button data-filter=".btp">b.t.p</button>
			<button data-filter=".c1cd1d">c1/c/d1/d</button>
			<button data-filter=".e">e</button>
		</div>
		<!-- Galería de imágenes -->
		<div class="gallery-grid row">
			<div class="gallery-item b col-12 text-center bg-light">
				<p>El permiso B autoriza para conducir los siguientes vehículos:</p>
				<p class="text-justify">
					Automóviles cuya masa máxima autorizada no exceda de 3.500 kg que estén diseñados y construidos para el transporte de no más de 8 pasajeros además del conductor.
					Conjuntos de vehículos acoplados compuestos por un vehículo tractor de los que autoriza a conducir el permiso de la clase B y un remolque cuya masa máxima autorizada exceda de 750 kg, siempre que la masa máxima autorizada del conjunto no exceda de 4.250 kg, sin perjuicio de las disposiciones que las normas de aprobación de tipo establezcan para estos vehículos.
					Triciclos y cuatriciclos de motor.
				</p>
			</div>
			<div class="gallery-item am col-12 text-center bg-light">
				<p>
					El permiso A.M autoriza para conducir los siguientes vehículos:
				</p>
				<p class="text-justify-center">
					Ciclomotores de dos o tres ruedas y cuatriciclos ligeros
				</p>
			</div>
			<div class="gallery-item a1a2 col-12 text-center bg-light">
				<p>
					El permiso A1/A2 autoriza para conducir los siguientes vehículos:
				</p>
				<p class="text-justify">
					A1: motocicletas con una cilindrada máxima de 125 cm³ y potencia máxima de 11 kW.
					A2: motocicletas con una potencia máxima de 35 kW.
				</p>
			</div>
			<div class="gallery-item btp col-12 text-center bg-light">
				<p>
					El permiso B.T.P autoriza para conducir los siguientes vehículos:
				</p>
				<p class="text-justify">
					A1: motocicletas con una cilindrada máxima de 125 cm³ y potencia máxima de 11 kW.
					A2: motocicletas con una potencia máxima de 35 kW.
				</p>
			</div>
			<div class="gallery-item c1cd1d col-12 text-center bg-light">
				<p>
					El permiso C1/C/D1/D autoriza para conducir los siguientes vehículos:
				</p>
				<p class="text-justify">
					A1: motocicletas con una cilindrada máxima de 125 cm³ y potencia máxima de 11 kW.
					A2: motocicletas con una potencia máxima de 35 kW.
				</p>
			</div>
			<div class="gallery-item e col-12 text-center bg-light">
				<p>
					El permiso E autoriza para conducir los siguientes vehículos:
				</p class="text-justify">
				<p>
					A1: motocicletas con una cilindrada máxima de 125 cm³ y potencia máxima de 11 kW.
					A2: motocicletas con una potencia máxima de 35 kW.
				</p>
			</div>
		</div>
		</div>
	@endif
</div>


