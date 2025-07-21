<x-layout>

	@if (session('course-saved'))
		<div class="alert alert-success">
			{{ session('course-saved') }}
		</div>
	@endif

	<div class="container">
		<div class="row">
			<div class="col">
				<h1> Edit Course</h1>
			</div>
		</div>

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

						<form method="POST" action="/course/update/{{ $course->id }}">
							@method('PUT')
							@csrf

							<div class="mb-3">
								<label class="form-label" for="name">Name</label>
								<input class="form-control @error('nameInput') bg-danger @enderror" id="name" name="name" type="text"
									value="{{ old('name', $course->name) }}" required>
								@error('nameInput')
									<span class="text-danger text-sm">{{ $message }}</span>
								@enderror
							</div>
							<button type="submit">Update</button>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

</x-layout>
