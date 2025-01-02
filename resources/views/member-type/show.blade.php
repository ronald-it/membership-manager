<x-layout>
  <x-slot:title>
    Member types
  </x-slot>
  <div class="flex flex-col items-center lg:justify-center grow p-4 sm:p-8 text-xs sm:text-sm">
    <div class="flex flex-col w-full max-w-sm sm:max-w-2xl">
      <span class="uppercase font-medium text-sm sm:text-base w-full text-center">member types</span>
      <table>
        <thead>
          <tr class="border-b border-gray-300 capitalize">
            <th class="text-left w-1/3">id</th>
            <th class="w-1/3">description</th>
            <th class="py-4 lg:py-8 text-right w-1/3">actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($memberTypes as $memberType)
          <tr class="border-b border-gray-300 last:border-none capitalize">
            <td>{{$memberType->id}}</td>
            <td class="text-center">{{$memberType->description}}</td>
            <td class="py-4 lg:py-8 flex justify-end">
              <a href="/member-type/{{$memberType->id}}" class="sm:flex sm:gap-x-1 sm:bg-gray-200 sm:p-2 sm:rounded-lg">
                <img src="/images/edit icon.png"/>
                <span class="hidden sm:block">edit</span>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</x-layout>