<x-layout>
  <x-slot:title>
    Registration
  </x-slot>
  <div class="grow flex items-center justify-center p-4">
    <form class="bg-white shadow-theme rounded-lg flex flex-col gap-y-4 p-4 sm:p-8 w-full max-w-xs sm:max-w-md" action="/registration" method="POST">
      @csrf
      <span class="text-center uppercase font-medium text-xl">registration</span>
      <div class="flex flex-col gap-y-1">
        <label class="font-medium first-letter:uppercase" for="name">username</label>
        <input type="text" class="border border-theme-purple rounded px-2 h-10 " id="name" name="name" required />
      </div>
      <div class="flex flex-col gap-y-1">
        <label class="font-medium first-letter:uppercase" for="email">email address</label>
        <input type="email" class="border border-theme-purple rounded px-2 h-10 " id="email" name="email" required />
      </div>
        <div class="flex flex-col gap-y-1">
          <label class="font-medium first-letter:uppercase" for="password">password</label>
          <input type="password" class="border border-theme-purple rounded px-2 h-10 grow" id="password" name="password" required />
        </div>
      <button class="bg-theme-purple flex justify-center items-center text-white rounded-lg h-10 uppercase" type="submit">register</button>
      @if (session('error'))
        <span class="text-theme-red font-bold text-center">{{session('error')}}</span>
        @endif
    </form>
  </div>
</x-layout>