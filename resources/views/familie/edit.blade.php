<x-layout>
  <x-slot:title>
    Familie bewerken
  </x-slot>
  <div class="flex flex-col gap-y-6 p-4">
    <section class="flex justify-center">
      <div class="flex flex-col items-center gap-y-3 text-xs w-full max-w-md">
        <span class="uppercase font-medium text-base self-start">familie</span>
        <div class="w-full">
          <div class="grow flex items-center">
            <label class="font-medium w-10 capitalize">
              id
            </label>
            <input type="number" value="{{$familie->id}}" disabled="true" class="border border-theme-purple rounded grow p-2"/>
          </div>
        </div>
  
        <div class="w-full">
          <div class="grow flex items-center">
            <label class="font-medium w-10 capitalize">
              naam
            </label>
            <input type="text" value="{{$familie->naam}}" disabled="true" class="border border-theme-purple rounded grow p-2"/>
          </div>
        </div>
  
        <div class="w-full">
          <div class="grow flex items-center">
            <label class="font-medium w-10 capitalize">
              adres
            </label>
            <input type="text" value="{{$familie->adres}}" class="border border-theme-purple rounded grow p-2"/>
          </div>
        </div>
  
        <button class="bg-theme-purple flex justify-center items-center text-white rounded-lg p-3 uppercase w-full">bevestigen</button>
  
      </div>
    </section>

    <section class="flex justify-center">
      <div class="flex flex-col gap-y-3 w-full max-w-md">
        <div class="flex justify-between items-center">
          <span class="uppercase font-medium">familieleden</span>
          <button href='/familielid' class="bg-theme-purple flex items-center gap-x-2 p-3 text-white rounded-lg w-fit text-xs uppercase">
            <img src="/images/add icon.png"/>
            <span>voeg nieuwe lid toe</span>
          </button>
        </div>
    
        <table class="w-full text-xs">
          <thead>
            <tr class="capitalize border-b border-gray-300">
              <th class="hidden">id</th>
              <th class="text-left py-4">naam</th>
              <th class="hidden">geboortedatum</th>
              <th class="hidden">lidsoort</th>
              <th class="text-center">contributie</th>
              <th class="text-right">acties</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($familieleden as $familielid)
            <tr class="border-b border-gray-300 last:border-b-0">
              <td class="hidden">{{$familielid->id}}</td>
              <td class="py-4">{{$familielid->naam}}</td>
              <td class="hidden">{{$familielid->geboortedatum}}</td>
              <td class="hidden">{{$familielid->lidsoort}}</td>
              <td class="text-center">€{{$familielid->contributie}}</td>
              <td>
                <a class="flex justify-end">
                  <img src="/images/edit icon.png"/>
                  <span class="hidden">Bewerken</span>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>

  </div>
</x-layout>