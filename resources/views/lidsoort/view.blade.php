<x-layout>
  <x-slot:title>
    Soort leden
  </x-slot>
  <div class="flex flex-col items-center lg:justify-center grow p-4 sm:p-8 text-xs sm:text-sm">
    <div class="flex flex-col w-full max-w-sm sm:max-w-2xl">
      <span class="uppercase font-medium text-sm sm:text-base w-full text-center">soort leden</span>
      <table>
        <thead>
          <tr class="border-b border-gray-300 capitalize">
            <th class="text-left w-1/3">id</th>
            <th class="w-1/3">omschrijving</th>
            <th class="py-4 lg:py-8 text-right w-1/3">acties</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($lidsoorten as $lidsoort)
          <tr class="border-b border-gray-300 last:border-none capitalize">
            <td>{{$lidsoort->id}}</td>
            <td class="text-center">{{$lidsoort->omschrijving}}</td>
            <td class="py-4 lg:py-8 flex justify-end">
              <a href="/lidsoort/{{$lidsoort->id}}">
                <img src="/images/edit icon.png"/>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</x-layout>