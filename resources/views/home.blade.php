<x-layout>
    <x-slot:title>
        Home
    </x-slot>
    <div class="flex flex-col">
        <div class="px-4 flex flex-col mb-8">
            <button class="flex items-center gap-x-2 bg-theme-purple text-white text-sm w-fit px-6 py-4 rounded-3xl my-8">
                <img src="/images/add icon.png"/>
                <span class="uppercase">voeg nieuwe familie toe</span>
            </button>
            <span class="uppercase text-sm text-gray-500">overzicht</span>
            <span class="uppercase text-lg">er zijn <span class="text-theme-purple font-medium">24 geregistreerde</span> families</span>
        </div>
        <table class="text-sm border-collapse w-full">
            <thead>
                <tr>
                    <th class="pl-4 py-2 text-left font-medium">Familie</th>
                    <th class="py-2 text-center font-medium">Contributie</th>
                    <th class="pr-4 py-2 text-right font-medium">Acties</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <tr class="border-b border-gray-300">
                    <td class="pl-4 py-4">De Jong</td>
                    <td class="py-4 text-center">€500</td>
                    <td class="pr-4 py-4 text-right">V E D</td>
                </tr>
                <tr class="border-b border-gray-300">
                    <td class="pl-4 py-4">De Vries</td>
                    <td class="py-4 text-center">€600</td>
                    <td class="pr-4 py-4 text-right">V E D</td>
                </tr>
            </tbody>
        </table>
        
    </div>
</x-layout>