<x-layout title="hello in this or" page-name='hello'>
	<form action="/home" method="post">
	@csrf
		<textarea placeholder="Descriptive text" name='descpription' rows="3"
		class="bg-black text-white border border-red-500" required></textarea>
		<br>
		<button type="submit" value="submit" style="cursor: pointer;background: black;color: whitesmoke;padding: .5rem;">submit</button>

	</form>
</x-layout>