<x-layout>
  <x-slot:title>
    Soort leden
  </x-slot>
  <div class="flex flex-col items-center grow p-4 text-xs">
    <div class="flex flex-col w-full max-w-sm">
      <span class="uppercase font-medium text-sm w-full text-center">soort leden</span>
      <table>
        <thead>
          <tr class="border-b border-gray-300 capitalize">
            <th class="text-left w-1/3">id</th>
            <th class="w-1/3">omschrijving</th>
            <th class="py-4 text-right w-1/3">acties</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($lidsoorten as $lidsoort)
          <tr class="border-b border-gray-300 last:border-none capitalize">
            <td>{{$lidsoort->id}}</td>
            <td class="text-center">{{$lidsoort->omschrijving}}</td>
            <td class="py-4 flex justify-end">
              <img src="/images/edit icon.png"/>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</x-layout>