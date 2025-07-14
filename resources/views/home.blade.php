<x-layout>

	<div class="container mt-5">
		<div class="row">
			@foreach ($courses as $course)
				<div class="col-md-4 mb-4">
					<div class="card">
						<div class="card-body">
							<img class="card-img-top mb-3" src="https://placehold.co/600x400" alt="Course Image">
							<h5 class="card-title">{{ $course->name }}</h5>
							<p class="card-text">{{ $course->description }}</p>
							<p class="card-text">Price: ${{ $course->price }}</p>
							<p class="card-text">Discount: {{ $course->discount_percent }}%</p>
							<p class="card-text">Rating: {{ $course->rating }}</p>
							<p class="card-text">Level: {{ $course->level }}</p>
							<p class="card-text">Tags: {{ $course->tags }}</p>
							<p class="card-text">Category ID: {{ $course->category_id }}</p>
							<p class="card-text">Tutors: {{ $course->tutors }}</p>
							<p class="card-text"><small class="text-muted">Created at: {{ $course->created_at }}</small></p>
							<a class="btn btn-primary" href="#">View Course</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>


</x-layout>
