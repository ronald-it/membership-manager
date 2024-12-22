<x-layout>
  <x-slot:title>
    Familie bewerken
  </x-slot>
  <div class="flex flex-col gap-y-6 lg:gap-y-16 p-4 sm:p-8 lg:p-16">
    <form class="flex justify-center" action="/familie/{{$familie->id}}" method="POST">
      @csrf
      @method('PUT')
      <div class="flex flex-col sm:flex-row sm:flex-wrap items-center gap-y-3 sm:gap-x-3 text-xs sm:text-sm w-full max-w-md sm:max-w-3xl lg:max-w-7xl">
        <span class="uppercase font-medium text-sm sm:text-base self-start sm:w-full">familie</span>
        <div class="w-full sm:w-auto">
          <div class="grow flex items-center">
            <label class="font-medium w-10 sm:w-fit sm:mr-3 capitalize" for="id">
              id
            </label>
            <input type="number" value="{{$familie->id}}" id="id" name="id" readonly="true" class="border border-theme-purple rounded grow p-2 sm:w-10 sm:py-0 sm:h-8"/>
          </div>
        </div>
        <div class="grow w-full sm:w-auto">
          <div class="grow flex items-center">
            <label class="font-medium w-10 sm:w-fit sm:mr-3 capitalize" for="naam">
              naam
            </label>
            <input type="text" value="{{$familie->naam}}" id="naam" name="naam" readonly="true" class="border border-theme-purple rounded grow p-2 sm:w-16 sm:py-0 sm:h-8"/>
          </div>
        </div>
        <div class="grow w-full sm:w-auto">
          <div class="grow flex items-center">
            <label class="font-medium w-10 sm:w-fit sm:mr-3 capitalize" for="adres">
              adres
            </label>
            <input type="text" value="{{$familie->adres}}" id="adres" name="adres" class="border border-theme-purple rounded grow p-2 sm:py-0 sm:h-8"/>
          </div>
        </div>
        <button type="submit" class="bg-theme-purple flex justify-center items-center text-white rounded-lg p-3 sm:py-0 sm:h-8 uppercase w-full sm:w-fit">bevestigen</button>
  
      </div>
    </form>

    <section class="flex justify-center">
      <div class="flex flex-col gap-y-3 w-full max-w-md sm:max-w-3xl lg:max-w-7xl">
        <div class="flex justify-between items-center">
          <span class="uppercase font-medium text-sm sm:text-base">familieleden</span>
          <form action="/familie/{{$familie->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-theme-red text-white p-2 text-xs sm:text-sm rounded uppercase flex items-center gap-x-2 text-nowrap">
              <img src='/images/delete icon.png'/>
              <span>familie verwijderen</span>
            </button>
          </form>
        </div>
        <table class="w-full text-xs sm:text-sm">
          <thead>
            <tr class="capitalize border-b border-gray-300">
              <th class="hidden sm:table-cell text-left">id</th>
              <th class="text-left py-4">naam</th>
              <th class="hidden sm:table-cell text-left">geboortedatum</th>
              <th class="hidden sm:table-cell text-left">lidsoort</th>
              <th class="text-center sm:text-left">contributie</th>
              <th class="text-right">acties</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($familieleden as $familielid)
            <tr class="border-b border-gray-300">
              <td class="hidden sm:table-cell">{{$familielid->id}}</td>
              <td class="py-4">{{$familielid->naam}}</td>
              <td class="hidden sm:table-cell">{{$familielid->geboortedatum}}</td>
              <td class="hidden sm:table-cell">{{$familielid->lidsoort}}</td>
              <td class="text-center sm:text-left">€{{$familielid->contributie}}</td>
              <td class="flex justify-end py-4">
                <form action="/familie/{{$familie->id}}/familielid/{{$familielid->id}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-theme-red text-white p-1 sm:p-2 rounded sm:flex sm:items-center sm:gap-x-2 uppercase">
                    <img src="/images/delete icon.png"/>
                    <span class="hidden sm:block">verwijderen</span>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>

    <form class="flex justify-center">
      <div class="flex flex-col sm:flex-row sm:flex-wrap items-center gap-y-3 sm:gap-x-3 text-xs sm:text-sm w-full max-w-md sm:max-w-3xl lg:max-w-7xl">
        <span class="uppercase font-medium text-sm sm:text-base self-start sm:w-full">nieuwe familielid toevoegen</span>
        <div class="w-full sm:w-auto grow">
          <div class="grow flex items-center">
            <label class="font-medium w-24 sm:w-fit sm:mr-3 capitalize">
              naam
            </label>
            <input type="text" class="border border-theme-purple rounded grow p-2 sm:w-20 sm:py-0 sm:h-8"/>
          </div>
        </div>
        <div class="w-full sm:w-auto">
          <div class="grow flex items-center">
            <label class="font-medium w-24 sm:w-fit sm:mr-3 capitalize">
              geboortedatum
            </label>
            <input type="date" class="border border-theme-purple rounded grow p-2 sm:py-0 sm:h-8 sm:w-28 "/>
          </div>
        </div>
        <button class="bg-theme-purple flex justify-center items-center gap-x-2 text-white rounded-lg p-3 sm:py-0 sm:h-8 uppercase w-full sm:w-fit">
          <img src="/images/add icon.png" class="sm:w-3"/>
          <span>voeg nieuwe lid toe</span>
        </button>
  
      </div>
    </form>

  </div>
</x-layout>