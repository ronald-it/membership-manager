<x-layout>
  <x-slot:title>
    Edit family
  </x-slot>
  <div class="flex flex-col gap-y-6 lg:gap-y-16 p-4 sm:p-8 lg:p-16">
    <form class="flex justify-center" action="/family/{{$family->id}}" method="POST">
      @csrf
      @method('PUT')
      <div class="flex flex-col sm:flex-row sm:flex-wrap items-center gap-y-3 sm:gap-x-3 text-xs sm:text-sm w-full max-w-md sm:max-w-3xl lg:max-w-7xl">
        <span class="uppercase font-medium text-sm sm:text-base self-start sm:w-full">family</span>
        <div class="w-full sm:w-auto">
          <div class="grow flex items-center">
            <label class="font-medium w-10 sm:w-fit sm:mr-3 capitalize" for="id">
              id
            </label>
            <input type="number" value="{{$family->id}}" id="id" name="id" readonly="true" class="border border-theme-purple rounded grow p-2 sm:w-10 sm:py-0 sm:h-8"/>
          </div>
        </div>
        <div class="grow w-full sm:w-auto">
          <div class="grow flex items-center">
            <label class="font-medium w-10 sm:w-fit sm:mr-3 capitalize" for="name">
              name
            </label>
            <input type="text" value="{{$family->name}}" id="name" name="name" readonly="true" class="border border-theme-purple rounded grow p-2 sm:w-16 sm:py-0 sm:h-8"/>
          </div>
        </div>
        <div class="grow w-full sm:w-auto">
          <div class="grow flex items-center">
            <label class="font-medium w-10 sm:w-fit sm:mr-3 capitalize" for="address">
              address
            </label>
            <input type="text" value="{{$family->address}}" id="address" name="address" class="border border-theme-purple rounded grow p-2 sm:py-0 sm:h-8"/>
          </div>
        </div>
        <button type="submit" class="bg-theme-purple flex justify-center items-center text-white rounded-lg p-3 sm:py-0 sm:h-8 uppercase w-full sm:w-fit">confirm</button>
  
      </div>
    </form>

    <section class="flex justify-center">
      <div class="flex flex-col gap-y-3 w-full max-w-md sm:max-w-3xl lg:max-w-7xl">
        <div class="flex justify-between items-center">
          <span class="uppercase font-medium text-sm sm:text-base">family members</span>
          <form action="/family/{{$family->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-theme-red text-white p-2 text-xs sm:text-sm rounded uppercase flex items-center gap-x-2 text-nowrap">
              <img src='/images/delete icon.png'/>
              <span>delete family</span>
            </button>
          </form>
        </div>
        <table class="w-full text-xs sm:text-sm">
          <thead>
            <tr class="capitalize border-b border-gray-300">
              <th class="hidden sm:table-cell text-left">id</th>
              <th class="text-left py-4">name</th>
              <th class="hidden sm:table-cell text-left">date of birth</th>
              <th class="hidden sm:table-cell text-left">member type</th>
              <th class="text-center sm:text-left">contribution</th>
              <th class="text-right">actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($familyMembers as $familyMember)
            <tr class="border-b border-gray-300">
              <td class="hidden sm:table-cell">{{$familyMember->id}}</td>
              <td class="py-4">{{$familyMember->name}}</td>
              <td class="hidden sm:table-cell">{{$familyMember->date_of_birth}}</td>
              <td class="hidden sm:table-cell">{{$familyMember->member_type}}</td>
              <td class="text-center sm:text-left">€{{$familyMember->contribution}}</td>
              <td class="flex justify-end py-4">
                <form action="/family/{{$family->id}}/family-member/{{$familyMember->id}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-theme-red text-white p-1 sm:p-2 rounded sm:flex sm:items-center sm:gap-x-2 uppercase">
                    <img src="/images/delete icon.png"/>
                    <span class="hidden sm:block">delete</span>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>

    <form class="flex justify-center" action="/family/{{$family->id}}/family-member" method="POST">
      @csrf
      <div class="flex flex-col sm:flex-row sm:flex-wrap items-center gap-y-3 sm:gap-x-3 text-xs sm:text-sm w-full max-w-md sm:max-w-3xl lg:max-w-7xl">
        <span class="uppercase font-medium text-sm sm:text-base self-start sm:w-full">add new family member</span>
        <div class="w-full sm:w-auto grow">
          <div class="grow flex items-center">
            <label class="font-medium w-24 sm:w-fit sm:mr-3 capitalize" for="name">
              name
            </label>
            <input type="text" class="border border-theme-purple rounded grow p-2 sm:w-20 sm:py-0 sm:h-8" id="name" name="name"/>
          </div>
        </div>
        <div class="w-full sm:w-auto">
          <div class="grow flex items-center">
            <label class="font-medium w-24 sm:w-fit sm:mr-3 capitalize" for="date_of_birth">
              date of birth
            </label>
            <input type="date" class="border border-theme-purple rounded grow p-2 sm:py-0 sm:h-8 sm:w-28" id="date_of_birth" name="date_of_birth"/>
          </div>
        </div>
        <button class="bg-theme-purple flex justify-center items-center gap-x-2 text-white rounded-lg p-3 sm:py-0 sm:h-8 uppercase w-full sm:w-fit" type="submit">
          <img src="/images/add icon.png" class="sm:w-3"/>
          <span>add new member</span>
        </button>
  
      </div>
    </form>

  </div>
</x-layout>