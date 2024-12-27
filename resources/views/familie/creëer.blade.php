<x-layout>
  <x-slot:title>
    Familie aanmaken
  </x-slot>
  <form class="p-4 flex flex-col sm:justify-center items-center grow" method="POST" action="/familie">
    @csrf
    <div class="flex flex-col gap-y-4 sm:gap-y-6 w-full max-w-md">
      <span class="uppercase font-medium w-full text-center text-lg sm:text-xl lg:text-3xl">familie aanmaken</span>
      <div class="flex items-center gap-x-2">
        <label class="w-12 lg:w-16 font-medium capitalize lg:text-lg" for="naam">naam</label>
        <input type="text" class="border border-theme-purple rounded px-2 h-10 grow" id="naam" name="naam" required />
      </div>
      <div class="flex items-center gap-x-2">
        <label class="w-12 lg:w-16 font-medium capitalize lg:text-lg" for="adres">adres</label>
        <input type="text" class="border border-theme-purple rounded px-2 h-10 grow" id="adres" name="adres" required />
      </div>
      <button class="bg-theme-purple flex justify-center items-center text-white rounded-lg h-10 uppercase w-full lg:text-lg" type="submit">bevestigen</button>
    </div>
  </form>
</x-layout>