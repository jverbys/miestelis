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
						<h4><i class="fa fa-angle-right"></i> Naujienų kategorijų sąrašas</h4>
						<hr>
						<thead>
							<tr>
								<th>#</th>
								<th>Pavadinimas</th>
								<th>Aprašymas</th>
								<th>Autorius</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($categories as $category)
								<tr>
									<td>{{ $category->id }}</td>
									<td>
										{{ $category->title }}
									</td>
									<td>{{ $category->description }}</td>
									<td>{{ $category->user->first_name . ' ' . $category->user->last_name }}</td>
									<td>
										<a href="{{ route ('admin.articles.categories.edit', $category->id) }}" class="btn btn-theme btn-xs mb-3">
											<i class="fas fa-edit"></i>
										</a>
										
										<form method="POST"
											action="{{ route('admin.articles.categories.destroy', $category->id) }}">
											@csrf
											@method('DELETE')
											<button onclick="return confirm('Ar tikrai norite ištrinti šią kategoriją?')" class="btn btn-theme04 btn-xs mt-3 prl-6-5">
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