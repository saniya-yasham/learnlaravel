<x-layout heading="Create Course">

	{{-- non-truthy - null, undefined, 0, null, [], "" --}}

	@if (session('course-saved'))
		<div class="alert alert-success">
			{{ session('course-saved') }}
		</div>
	@endif


	{{-- @dump($errors->all());
	<br>
	@dump(old()); --}}


	<div class="container">
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-header">
						Create Course
					</div>
					<div class="card-body">
						Request : POST /course/store

						<ul>
							@foreach ($errors->all() as $error)
								<li class="text-danger fw-bold">{{ $error }}</li>
							@endforeach
						</ul>

						<form method="POST" action="{{ route('course.store') }}">

							@csrf

							<div class="mb-3">
								<label class="form-label" for="name">Name</label>
								<input class="form-control @error('nameInput') bg-danger @enderror" id="name" name="name" type="text"
									required>
								@error('nameInput')
									<span class="text-danger text-sm">{{ $message }}</span>
								@enderror
							</div>









							{{-- <div class="mb-3">
								<label class="form-label" for="description">Description</label>
								<textarea class="form-control" id="description" name="description" minlength="10" maxlength="100"></textarea>
							</div>

							<div class="mb-3">
								<label class="form-label" for="price">Price</label>
								<input class="form-control" id="price" name="price" type="number" step="0.01">
							</div>

							<div class="mb-3">
								<label class="form-label" for="discount_percent">Discount Percent</label>
								<input class="form-control" id="discount_percent" name="discount_percent" type="number">
							</div>

							<div class="mb-3">
								<label class="form-label" for="rating">Rating</label>
								<input class="form-control" id="rating" name="rating" type="number" step="0.01">
							</div>

							<div class="mb-3">
								<label class="form-label" for="thumbnail">Thumbnail</label>
								<input class="form-control" id="thumbnail" name="thumbnail" type="text">
							</div>

							<div class="mb-3">
								<label class="form-label" for="level">Level</label>
								<input class="form-control" id="level" name="level" type="text">
							</div>

							<div class="mb-3">
								<label class="form-label" for="tags">Tags</label>
								<input class="form-control" id="tags" name="tags" type="text">
							</div>

							<div class="mb-3">
								<label class="form-label" for="tutors">Tutors</label>
								<input class="form-control" id="tutors" name="tutors" type="text">
							</div>

							<div class="mb-3">
								<label class="form-label" for="category_id">Category</label>
								<select class="form-select" id="category_id" name="category_id">

									@foreach ($categories as $category)
										<option value="{{ $category->id }}">{{ $category->name }}</option>
									@endforeach


								</select>
							</div> --}}

							<button type="submit">Create</button>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

</x-layout>
