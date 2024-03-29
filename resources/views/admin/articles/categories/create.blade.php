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
					<h4 class="mb"><i class="fa fa-angle-right"></i> Nauja kategorija</h4>

					<form class="form-horizontal style-form" method="POST"
						action="{{ route('admin.articles.categories.store') }}">
						@csrf

						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Pavadinimas</label>
							<div class="col-sm-10">
							<input type="text" name="title" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Aprašymas</label>
							<div class="col-sm-10">
								<input type="text" name="description" class="form-control" required>
							</div>
						</div>

						<button type="submit" class="btn btn-theme btn-block"><i class="fas fa-save"></i> Sukurti naują</button>
					</form>
				</div>
			</div><!-- col-lg-12-->      	
		</div><!-- /row -->

	</section><!-- /wrapper -->
</section><!-- /MAIN CONTENT -->

@endsection