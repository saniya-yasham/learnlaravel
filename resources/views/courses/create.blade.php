<x-layout>


    Request : POST /course/store
	<form method="POST" action="/course/store">

        @csrf

		<label for="name">Name: </label>
		<input id="name" name="name" type="text">

		<br>

		<button type="submit">Create</button>
	</form>


</x-layout>
