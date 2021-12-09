@extends('layouts.master_secondry')
@section('content')
<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title mb-4">General Settings</h4>

				@include('components.form_errors')
				{{ csrf_field() }}
				<div class="row">
					<div class="col-lg-12">
						<div class="mb-3">
							<label for="first_name"
							class="form-label required">Title</label>
							<input type="text"
							class="form-control"
							id=""
							name="first_name">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="mb-3">
							<label for="first_name"
							class="form-label required">Logo</label>
							<input type="file"
							class="form-control"
							id=""
							name="">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="mb-3">
							<label for="first_name"
							class="form-label ">icon</label>
							<input type="file"
							class="form-control"
							id=""
							name="">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="mb-3">
							<label for="first_name"
							class="form-label ">Items per page</label>
							<input type="number"
							class="form-control"
							id=""
							name="">
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection