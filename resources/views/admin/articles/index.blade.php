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
						<h4><i class="fa fa-angle-right"></i> Straipsnių sąrašas</h4>
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
									<td>{{ $article->title }}</td>
									<td>{{ $article->category->title }}</td>
									<td>{{ $article->user->first_name . ' ' . $article->user->last_name }}</td>
									<td>{{ $article->created_at }}</td>
									<td>
										<button class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></button>
										<button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
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