<!-- Area slider administración
============================================ -->
<div class="page-banner-area overlay overlay-black overlay-70">
	<div class="container">
		<div class="row">
			<div class="page-banner text-center col-12">
				@if (Request::is('login'))
					<h1>conectar usuario</h1>
					<ul>
						<li><a href="/">inicio</a></li>
						<li><span>conectar usuario</span></li>
					</ul>	
				@elseif(auth()->user())
					<h1>Hola {{ auth()->user()->name }} </h1>
					<ul>
						<li><a href="/">inicio</a></li>
						@if (auth()->user()->id == 1)
							<li><span>zona de administración</span></li>	
						@else
							<li><span>tu zona</span></li>
						@endif
					</ul>	
				@endif	
			</div>
		</div>
	</div>
</div>