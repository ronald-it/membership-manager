<x-layout>
  <x-slot:title>
    Contributions
  </x-slot>
  <div class="flex flex-col items-center lg:justify-center grow p-4 sm:p-8 text-xs sm:text-sm">
    <div class="flex flex-col w-full max-w-lg sm:max-w-3xl">
      <span class="uppercase font-medium text-sm sm:text-base w-full text-center">contribution</span>
      <table>
        <thead>
          <tr class="border-b border-gray-300 [&>*]:first-letter:uppercase">
            <th class="text-left">id</th>
            <th class="text-left">age</th>
            <th class="text-left">member type</th>
            <th class="text-left">amount</th>
            <th class="text-left">fiscal year</th>
            <th class="py-4 lg:py-8 text-right">actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($contributions as $contribution)
          <tr class="border-b border-gray-300 last:border-none">
            <td>{{$contribution->id}}</td>
            <td>{{$contribution->age}}</td>
            <td>{{$contribution->member_type_description}}</td>
            <td>{{$contribution->amount}}</td>
            <td>{{$contribution->fiscal_year}}</td>
            <td class="py-4 lg:py-8 flex justify-end">
              <a href="/contribution/{{$contribution->id}}" class="sm:flex sm:gap-x-1 sm:bg-gray-200 sm:p-2 sm:rounded-lg">
                <img src="/images/edit icon.png"/>
                <span class="hidden sm:block">Edit</span>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</x-layout>