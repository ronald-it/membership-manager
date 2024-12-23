<x-layout>
  <x-slot:title>
    Contributie bewerken
  </x-slot>
  <div class="p-4 sm:p-8 flex flex-col items-center sm:justify-center grow">
    <form method="POST" action="/contributie/{{$contributie->id}}" class="flex flex-col gap-y-4 sm:gap-y-6 text-xs sm:text-sm lg:text-lg w-full max-w-md">
      @csrf
      @method('PUT')
      <span class="uppercase font-medium text-sm sm:text-base lg:text-3xl text-center">contributie bewerken</span>
      <div class="flex items-center gap-x-2">
        <label class="font-medium capitalize w-24 lg:w-28" for="id">id</label>
        <input type="number" class="border border-theme-purple rounded px-2 h-10 grow" id="id" name="id" value="{{$contributie->id}}" readonly required />
      </div>
      <div class="flex items-center gap-x-2">
        <label class="font-medium capitalize w-24 lg:w-28" for="leeftijd">leeftijd</label>
        <input type="number" class="border border-theme-purple rounded px-2 h-10 grow" id="leeftijd" name="leeftijd" value="{{$contributie->leeftijd}}" readonly required />
      </div>
      <div class="flex items-center gap-x-2">
        <label class="font-medium capitalize w-24 lg:w-28" for="soort-lid">soort lid</label>
        <input type="text" class="border border-theme-purple rounded px-2 h-10 grow" id="soort-lid" name="soort-lid" value="{{$contributie->lidsoort_omschrijving}}" readonly required />
      </div>
      <div class="flex items-center gap-x-2">
        <label class="font-medium capitalize w-24 lg:w-28" for="boekhaar-id">boekjaar</label>
        <input type="number" class="border border-theme-purple rounded px-2 h-10 grow" id="boekjaar" name="boekjaar" value="{{$contributie->boekjaar}}" readonly required />
      </div>
      <div class="flex items-center gap-x-2">
        <label class="font-medium capitalize w-24 lg:w-28" for="bedrag">bedrag</label>
        <input type="number" class="border border-theme-purple rounded px-2 h-10 grow" id="bedrag" name="bedrag" value="{{$contributie->bedrag}}" required />
      </div>
      <button class="bg-theme-purple flex justify-center items-center text-white rounded-lg h-10 uppercase w-full" type="submit">bevestigen</button>
    </form>
  </div>
</x-layout>