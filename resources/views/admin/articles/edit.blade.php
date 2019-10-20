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
			<div class="col-lg-12">
				<div class="form-panel">
					<h4 class="mb"><i class="fa fa-angle-right"></i> Straipsnio redagavimas</h4>

					<form class="form-horizontal style-form" method="POST" action="{{ route('admin.articles.update', $article->id) }}">
						@method('PATCH')
						@csrf

						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Pavadinimas</label>
							<div class="col-sm-10">
							<input type="text" name="title" class="form-control" required value="{{ $article->title }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Aprašymas</label>
							<div class="col-sm-10">
								<textarea name="description" class="form-control txt-minh200-resizev" required>{{
									$article->description
								}}</textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Kategorija</label>
							<div class="col-sm-10">
								<select name="category_id" class="form-control" required>
									<option value="{{ $article->category->id }}" selected>
										{{ $article->category->title }}
									</option>
									@foreach ($categories as $category)
										<option value="{{ $category->id }}">{{ $category->title }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<button type="submit" class="btn btn-theme btn-block">
							<i class="fas fa-save"></i> Išsaugoti
						</button>
					</form>
				</div>
			</div><!-- col-lg-12-->      	
		</div><!-- /row -->

	</section><!-- /wrapper -->
</section><!-- /MAIN CONTENT -->

@endsection