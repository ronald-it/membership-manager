<x-layout>
  <x-slot:title>
    Edit member type
  </x-slot>
  <div class="p-4 sm:p-8 flex flex-col items-center sm:justify-center grow">
    <form method="POST" action="/member-type/{{$memberType->id}}" class="flex flex-col gap-y-4 sm:gap-y-6 text-xs sm:text-sm lg:text-lg w-full max-w-md">
      @csrf
      @method('PUT')
      <span class="uppercase font-medium text-sm sm:text-base lg:text-3xl text-center">edit member type</span>
      <div class="flex items-center gap-x-2">
        <label class="font-medium capitalize w-24 lg:w-28" for="id">id</label>
        <input type="number" class="border border-theme-purple rounded px-2 h-10 grow" id="id" name="id" value="{{$memberType->id}}" readonly required />
      </div>
      <div class="flex items-center gap-x-2">
        <label class="font-medium capitalize w-24 lg:w-28" for="description">description</label>
        <input type="text" class="border border-theme-purple rounded px-2 h-10 grow" id="description" name="description" value="{{$memberType->description}}" required />
      </div>
      <button class="bg-theme-purple flex justify-center items-center text-white rounded-lg h-10 uppercase w-full" type="submit">confirm</button>
    </form>
  </div>
</x-layout>