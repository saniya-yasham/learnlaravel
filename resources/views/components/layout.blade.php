<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Home</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

	<ul>
		<x-nav-li name="Home" href="/home" />
		<x-nav-li  href="/contact" />
		<x-nav-li name="About" href="/about" />
	</ul>

	{{ $slot }}

</body>

</html>
