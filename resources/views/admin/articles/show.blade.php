@extends('admin.layouts.app')

@section('content')

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
	<section class="wrapper site-min-height">
		<h3><i class="fa fa-angle-right"></i> Naujienos</h3>

		<div class="row mt">
			<div class="col-md-12">
				<div class="content-panel">
					<h4 class="mb"><i class="fa fa-angle-right"></i> Straipsnio peržiūra</h4>

					<div class="row ms-0">
						<div class="col-lg-12">
							<form method="POST" action="{{ route('admin.articles.destroy', $article->id) }}">
								<div class="btn-group btn-group-justified">
									<div class="btn-group">
										<a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-theme">
											<i class="fas fa-edit"></i> Redaguoti
										</a>
									</div>

									<div class="btn-group">
										@csrf
										@method('DELETE')
										<button onclick="return confirm('Ar tikrai norite ištrinti šį straipsnį?')" class="btn btn-theme04">
											<i class="fas fa-trash"></i> Ištrinti
										</button>
									</div>
								</div>
							</form>
						</div>

						<div class="row ms-0">
							<div class="col-md-1">
								<h5 class="mt">ID</h5>
								<p>{{ $article->id }}</p>
							</div>

							<div class="col-md-11">
								<h5 class="mt">Pavadinimas</h5>
								<p>{{ $article->title }}</p>
							</div>
						</div>

						<div class="col-md-12">
							<h5 class="mt">Aprašymas</h5>
							<p>{{ $article->description }}</p>
						</div>

						<div class="row ms-0">
							<div class="col-md-6">
								<h5 class="mt">Kategorija</h5>
								<p>{{ $article->category->title }}</p>
							</div>

							<div class="col-md-6">
								<h5 class="mt">Autorius</h5>
								<p>{{ $article->user->first_name . ' ' . $article->user->last_name }}</p>
							</div>
						</div>

						<div class="row ms-0">
							<div class="col-md-6">
								<h5 class="mt">Paskelbta</h5>
								<p>{{ $article->created_at }}</p>
							</div>

							<div class="col-md-6">
								<h5 class="mt">Paskutinį kartą redaguota</h5>
								<p>{{ $article->updated_at }}</p>
							</div>
						</div>

						<div class="row ms-0">
							<div class="col-md-12">
								<h5 class="mt">Nuotraukos</h5>
								<div class="img-grid">
									@foreach ($images as $image)
										<div class="img-grid-item">
											@if ($image->is_main)
												<span>Pagrindinė</span>
											@endif
											<a href="/storage/articles/{{ $image->title }}" target="_blank"><img src="/storage/articles/{{ $image->title }}"></a>
											@if (!$image->is_main)
												<form method="POST" action="{{ route('admin.articles.image.update', ['article' => $article->id, 'image' => $image->id]) }}">
													@csrf
													@method('PATCH')
													<div class="buttonHolder">
														<button class="btn btn-theme">Padaryti pagrindine</button>
													</div>
												</form>
											@endif
										</div>
									@endforeach
								</div>

							</div>
						</div>
					</div>
				</div>
			</div><!-- col-lg-12-->      	
		</div><!-- /row -->

	</section><!-- /wrapper -->
</section><!-- /MAIN CONTENT -->

@endsection