<div class="fixed top-10 left-7 flex justify-center items-center h-screen lg:right-6  ">
    <div class="bg-dark-red bg-opacity-20 p-4 rounded-lg shadow-md w-80 lg:w-96  ">
        @if ($errorMessage)
            <div class="bg-gold text-red  rounded-md mb-4 text-center">{{ $errorMessage }}</div>
        @endif
        <form class="flex flex-col" wire:submit.prevent="handleSearch">
        @csrf
            <label for="name" class="mb-1 text-red">Nom:</label>
            <input class="p-2 mb-2 w-full rounded-md border border-red-500 text-red-500" wire:model="search" type="text" placeholder="Nom...">

            <label for="description" class="mb-1 text-red">Pays:</label>
            <input class="p-2 mb-2 w-full rounded-md border border-red-500 text-red-500" wire:model="description" id="description" type="text" placeholder="Pays...">

            <label for="priceMin" class="mb-1 text-red">Prix minimum:</label>
            <input class="p-2 mb-2 w-full rounded-md border border-red-500 text-red-500" wire:model="priceMin" type="number" placeholder="Prix minimum..." >

            <label for="priceMax" class="mb-1 text-red">Prix maximal:</label>
            <input class="p-2 mb-6 w-full rounded-md border border-red-500 text-red-500" wire:model="priceMax" type="number" placeholder="Prix maximal...">

            <button class="p-3 bg-red text-white font-bold rounded-md w-full cursor-pointer" wire:click="handleSearch">Recherche</button>
        </form>
    </div>
</div>
