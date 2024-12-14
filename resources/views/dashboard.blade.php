<x-layout>
    <x-slot:title>
        Dashboard
    </x-slot>
    <div class="flex flex-col">
            <div class="bg-theme-light-purple flex flex-col sm:flex-row sm:items-center sm:gap-x-4">
                <div class="flex gap-x-4 items-center py-4 border-b border-gray-300 sm:border-none">
                    <span class="border-[0.1rem] border-gray-300 text-3xl h-16 w-16 rounded-full flex justify-center items-center ml-4 sm:ml-8">20</span>
                    <div class="flex flex-col uppercase">
                        <span>zaterdag,</span>
                        <span>april</span>
                    </div>
                </div>
                <span class="hidden sm:flex border-b border-gray-300 grow h-fit"></span>
                <a href="/family" class="flex items-center gap-x-2 bg-theme-purple text-white text-sm w-fit px-6 py-4 my-4 ml-4 sm:ml-0 sm:mr-8 rounded-3xl sm:rounded-[2rem]">
                    <img src="/images/add icon.png"/>
                    <span class="uppercase">voeg nieuwe familie toe</span>
                </a>
            </div>
            <div class="px-4 sm:px-8 flex flex-col pb-8 bg-theme-light-purple">
                <span class="uppercase text-sm text-gray-500">overzicht</span>
                <span class="uppercase text-lg">er zijn <span class="text-theme-purple font-medium">24 geregistreerde</span> families</span>
            </div>
        <table class="text-sm border-collapse w-full">
            <thead class="bg-theme-light-purple">
                <tr>
                    <th class="hidden sm:table-cell pl-8 py-2 text-left font-medium">ID</th>
                    <th class="pl-4 sm:pl-0 py-2 text-left font-medium">Familie</th>
                    <th class="py-2 text-center sm:text-left font-medium">Contributie</th>
                    <th class="pr-4 sm:pr-8 py-2 text-right font-medium sm:w-32">Acties</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($families as $familie)
                <tr class="border-b border-gray-300 last:border-b-0">
                    <td class="hidden sm:table-cell pl-8 py-2 text-left">1234567890</td>
                    <td class="pl-4 sm:pl-0 py-4">{{$familie->naam}}</td>
                    <td class="py-4 text-center sm:text-left">€600</td>
                    <td class="pr-4 sm:pr-8 py-4 flex justify-end">
                        <a href="/family" class="sm:flex sm:gap-x-1 sm:bg-gray-200 sm:p-2 sm:rounded-lg">
                            <img src="/images/edit icon.png" />
                            <span class="hidden sm:block">Bewerk</span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</x-layout>