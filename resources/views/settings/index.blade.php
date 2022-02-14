@extends('layouts.master_secondry')
@section('content')

<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title mb-4">General Settings</h4>

				@include('components.form_errors')
				<form class="item_form" method="post" enctype="multipart/form-data" action="{{ route($route.'.store') }}">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-lg-12">
						<div class="mb-3">
							<label for="first_name"
							class="form-label required">Title</label>
							<input type="text"
							class="form-control"
							id="title"
							name="title" value="{{$data ? $data->title : ''}}">
                            <input type="hidden"
                                   class="form-control"
                                   id="id"
                                   name="id" value="{{$data ? $data->id : ''}}">
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
							id="logo"
							name="logo">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="mb-3">
							<label for="first_name"
							class="form-label ">Icon</label>
							<input type="file"
							class="form-control"
							id="logo_icon"
							name="logo_icon">
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
							id="item_per_page"
							name="item_per_page" value="{{$data ? $data->item_per_page : 0}}">
						</div>
					</div>
				</div>
				  @include('components.form_submit_btns')
            </form>

			</div>
		</div>
	</div>
</div>
@endsection
