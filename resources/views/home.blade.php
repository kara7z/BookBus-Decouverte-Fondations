<x-layout title='hello in home page' pageName='Home Page is this?' kae='Ach ka dir'>
  
   <h1>Home Page</h1>
   
       <h2>names count is {{ count($names) }}</h2
       <p>{{ $na }}</p>
      @foreach($names as $n)
   <x-card style="font-size: 1rem;margin: 1rem;">
       <h1>I'm new here My name is {{ $n }}</h1>
      
   </x-card>
      @endforeach
  

</x-layout>