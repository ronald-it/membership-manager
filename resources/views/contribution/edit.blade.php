<x-layout>
  <x-slot:title>
    Edit contribution
  </x-slot>
  <div class="p-4 sm:p-8 flex flex-col items-center sm:justify-center grow">
    <form method="POST" action="/contribution/{{$contribution->id}}" class="flex flex-col gap-y-4 sm:gap-y-6 lg:text-lg w-full max-w-lg">
      @csrf
      @method('PUT')
      <span class="uppercase font-medium lg:text-3xl text-center">edit contribution</span>
      <div class="flex flex-col gap-x-2 gap-y-1">
        <label class="font-medium first-letter:uppercase" for="id">id</label>
        <input type="number" class="border border-theme-purple rounded px-2 h-10 grow" id="id" name="id" value="{{$contribution->id}}" readonly required />
      </div>
      <div class="flex flex-col gap-x-2 gap-y-1">
        <label class="font-medium first-letter:uppercase" for="leeftijd">age</label>
        <input type="number" class="border border-theme-purple rounded px-2 h-10 grow" id="age" name="age" value="{{$contribution->age}}" readonly required />
      </div>
      <div class="flex flex-col gap-x-2 gap-y-1">
        <label class="font-medium first-letter:uppercase" for="member_type">member type</label>
        <input type="text" class="border border-theme-purple rounded px-2 h-10 grow" id="member_type" name="member_type" value="{{$contribution->member_type_description}}" readonly required />
      </div>
      <div class="flex flex-col gap-x-2 gap-y-1">
        <label class="font-medium first-letter:uppercase" for="fiscal_year_id">fiscal year</label>
        <input type="number" class="border border-theme-purple rounded px-2 h-10 grow" id="fiscal_year_id" name="fiscal_year_id" value="{{$contribution->fiscal_year}}" readonly required />
      </div>
      <div class="flex flex-col gap-x-2 gap-y-1">
        <label class="font-medium first-letter:uppercase" for="amount">amount</label>
        <input type="number" class="border border-theme-purple rounded px-2 h-10 grow" id="amount" name="amount" value="{{$contribution->amount}}" required />
      </div>
      <button class="bg-theme-purple flex justify-center items-center text-white rounded-lg h-10 uppercase w-full" type="submit">confirm</button>
      @if (session('error'))
      <span class="text-theme-red font-bold text-center">{{session('error')}}</span>
      @endif
    </form>
  </div>
</x-layout>