<x-layout>
  <x-slot:title>
    Registratie
  </x-slot>
  <div class="bg-theme-light-purple grow flex items-center justify-center p-4">
    <form class="bg-white shadow-md rounded-lg flex flex-col gap-y-4 p-4 sm:p-8 w-full max-w-xs sm:max-w-md" action="/login" method="POST">
      @csrf
      <span class="text-center uppercase font-medium text-xl">registratie</span>
      <div class="flex flex-col gap-y-1">
        <label class="font-medium first-letter:uppercase" for="email">e-mailadres</label>
        <input type="number" class="border border-theme-purple rounded px-2 h-10 " id="email" name="email" required />
      </div>
        <div class="flex flex-col gap-y-1">
          <label class="font-medium first-letter:uppercase" for="gebruikersnaam">gebruikersnaam</label>
          <input type="number" class="border border-theme-purple rounded px-2 h-10 " id="gebruikersnaam" name="gebruikersnaam" required />
        </div>
        <div class="flex flex-col gap-y-1">
          <label class="font-medium first-letter:uppercase" for="wachtwoord">wachtwoord</label>
          <input type="number" class="border border-theme-purple rounded px-2 h-10 grow" id="wachtwoord" name="wachtwoord" required />
        </div>
      <button class="bg-theme-purple flex justify-center items-center text-white rounded-lg h-10 uppercase" type="submit">registreer</button>
    </form>
  </div>
</x-layout>