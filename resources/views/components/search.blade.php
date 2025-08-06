<div class="search-bar">
	<form class="d-flex" action="{{ route('course.index') }}" method="GET">
		<input class="input input-bordered w-full max-w-xs" name="search" type="text" value="{{ request('search') }}"
			autocomplete="off" placeholder="Search..." required>
		<button class="btn btn-primary ml-2" type="submit">Search</button>
	</form>
</div>
