<x-layout>
  <x-slot:title>
    Soort lid bewerken
  </x-slot>
  <div class="p-4 sm:p-8 flex flex-col items-center sm:justify-center grow">
    <form method="POST" action="/lidsoort/{{$lidsoort->id}}" class="flex flex-col gap-y-4 sm:gap-y-6 text-xs sm:text-sm lg:text-lg w-full max-w-md">
      @csrf
      @method('PUT')
      <span class="uppercase font-medium text-sm sm:text-base lg:text-3xl text-center">soort lid bewerken</span>
      <div class="flex items-center gap-x-2">
        <label class="font-medium capitalize w-24 lg:w-28" for="id">id</label>
        <input type="text" class="border border-theme-purple rounded px-2 h-10 grow" id="id" name="id" value="{{$lidsoort->id}}" readonly required />
      </div>
      <div class="flex items-center gap-x-2">
        <label class="font-medium capitalize w-24 lg:w-28" for="omschrijving">omschrijving</label>
        <input type="text" class="border border-theme-purple rounded px-2 h-10 grow" id="omschrijving" name="omschrijving" value="{{$lidsoort->omschrijving}}" required />
      </div>
      <button class="bg-theme-purple flex justify-center items-center text-white rounded-lg h-10 uppercase w-full">bevestigen</button>
    </form>
  </div>
</x-layout>