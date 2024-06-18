@auth
<x-layout>
    <x-slot:tittle>{{ $tittle }}</x-slot:tittle>
    <x-slot:nama>{{ auth()->user()->nama_lengkap }}</x-slot:nama>


    <!-- Page Heading -->

    <h1 class="h3 mb-0 text-gray-800">Welcome back, {{ auth()->user()->nama_lengkap }}</h1>
    <hr>
</x-layout>
@endauth