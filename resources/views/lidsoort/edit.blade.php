<x-layout>
  <x-slot:title>
    Soort lid bewerken
  </x-slot>
  <div class="p-4 flex flex-col items-center grow">
    <form method="POST" action="/lidsoort/{{$lidsoort->id}}" class="flex flex-col gap-y-4 text-xs w-full max-w-md">
      @csrf
      @method('PUT')
      <span class="uppercase font-medium text-sm">soort lid bewerken</span>
      <div class="flex items-center gap-x-2">
        <label class="font-medium capitalize w-24" for="id">id</label>
        <input type="text" class="border border-theme-purple rounded px-2 h-10 grow" id="id" name="id" value="{{$lidsoort->id}}" readonly required />
      </div>
      <div class="flex items-center gap-x-2">
        <label class="font-medium capitalize w-24" for="omschrijving">omschrijving</label>
        <input type="text" class="border border-theme-purple rounded px-2 h-10 grow" id="omschrijving" name="omschrijving" value="{{$lidsoort->omschrijving}}" required />
      </div>
      <button class="bg-theme-purple flex justify-center items-center text-white rounded-lg h-10 uppercase w-full">bevestigen</button>
    </form>
  </div>
</x-layout>