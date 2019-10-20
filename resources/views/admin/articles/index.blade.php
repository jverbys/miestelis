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
					<table class="table table-striped table-advance table-hover">
						<h4><i class="fa fa-angle-right"></i> Straipsnių sąrašas <span class="fsize-15">(spustelkite ant pavadinimo, norint peržiūrėti)</span></h4>
						<hr>
						<thead>
							<tr>
								<th>#</th>
								<th>Pavadinimas</th>
								<th>Kategorija</th>
								<th>Autorius</th>
								<th>Data</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($articles as $article)
								<tr>
									<td>{{ $article->id }}</td>
									<td class="clickable" onclick="window.location='{{ route('admin.articles.show', $article->id) }}'">
										{{ $article->title }}
									</td>
									<td>{{ $article->category->title }}</td>
									<td>{{ $article->user->first_name . ' ' . $article->user->last_name }}</td>
									<td>{{ $article->created_at }}</td>
									<td>
										<a href="{{ route ('admin.articles.edit', $article->id) }}" class="btn btn-theme btn-xs">
											<i class="fas fa-edit"></i>
										</a>
										
										<form method="POST" action="{{ route('admin.articles.destroy', $article->id) }}">
											@csrf
											@method('DELETE')
											<button onclick="return confirm('Ar tikrai norite ištrinti šį straipsnį?')" class="btn btn-theme04 btn-xs">
												<i class="fas fa-trash"></i>
											</button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div><!-- /content-panel -->
			</div><!-- /col-md-12 -->
		</div><!-- /row -->
	</section><!-- /wrapper -->
</section><!-- /MAIN CONTENT -->

@endsection