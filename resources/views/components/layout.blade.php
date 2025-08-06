<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
	<title>Courses</title>

	@vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<div class="container">
			<a class="navbar-brand" href="#">Courses</a>
			<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" type="button"
				aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>


			<div class="bg-gray-100 px-4 py-2">Authenticated user: {{ Auth::user()->name ?? null }}</div>



			<div class="" id="navbarNavAltMarkup">
				<div class="navbar">

					<x-nav-li name="Courses" link="/" />
					<x-nav-li name="Create" link="/courses/create" />
					<x-nav-li name="Edit" link="/courses/edit" />
				</div>
			</div>
			<x-search />
		</div>
	</nav>

	{{-- <h1>{{ $heading }}</h1> --}}

	<main>
		{{ $slot }}
	</main>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
	</script>

</body>

</html>
