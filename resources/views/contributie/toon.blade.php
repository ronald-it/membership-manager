<x-layout>
  <x-slot:title>
    Contributies
  </x-slot>
  <div class="flex flex-col items-center lg:justify-center grow p-4 sm:p-8 text-xs sm:text-sm">
    <div class="flex flex-col w-full max-w-lg sm:max-w-3xl">
      <span class="uppercase font-medium text-sm sm:text-base w-full text-center">contributies</span>
      <table>
        <thead>
          <tr class="border-b border-gray-300 capitalize">
            <th class="text-left">id</th>
            <th class="text-left">leeftijd</th>
            <th class="text-left">soort lid</th>
            <th class="text-left">bedrag</th>
            <th class="text-left">boekjaar id</th>
            <th class="py-4 lg:py-8 text-right">acties</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($contributies as $contributie)
          <tr class="border-b border-gray-300 last:border-none capitalize">
            <td>{{$contributie->id}}</td>
            <td>{{$contributie->leeftijd}}</td>
            <td>{{$contributie->lidsoort_omschrijving}}</td>
            <td>{{$contributie->bedrag}}</td>
            <td>{{$contributie->boekjaar}}</td>
            <td class="py-4 lg:py-8 flex justify-end">
              <a href="/contributie/{{$contributie->id}}" class="sm:flex sm:gap-x-1 sm:bg-gray-200 sm:p-2 sm:rounded-lg">
                <img src="/images/edit icon.png"/>
                <span class="hidden sm:block">Bewerk</span>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</x-layout>