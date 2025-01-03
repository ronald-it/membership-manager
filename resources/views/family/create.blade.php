<x-layout>
  <x-slot:title>
    Create family
  </x-slot>
  <form class="p-4 flex flex-col sm:justify-center items-center grow" method="POST" action="/family">
    @csrf
    <div class="flex flex-col gap-y-4 sm:gap-y-6 w-full max-w-md">
      <span class="uppercase font-medium w-full text-center text-lg sm:text-xl lg:text-3xl">create family</span>
      <div class="flex items-center gap-x-2">
        <label class="w-14 lg:w-16 font-medium capitalize lg:text-lg" for="name">name</label>
        <input type="text" class="border border-theme-purple rounded px-2 h-10 grow" id="name" name="name" required />
      </div>
      <div class="flex items-center gap-x-2">
        <label class="w-14 lg:w-16 font-medium capitalize lg:text-lg" for="address">address</label>
        <input type="text" class="border border-theme-purple rounded px-2 h-10 grow" id="address" name="address" required />
      </div>
      <button class="bg-theme-purple flex justify-center items-center text-white rounded-lg h-10 uppercase w-full lg:text-lg" type="submit">confirm</button>
      @if (session('error'))
      <span class="text-theme-red font-bold text-center">{{session('error')}}</span>
      @endif
    </div>
  </form>
</x-layout>