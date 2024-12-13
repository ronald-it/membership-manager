<x-layout>
    <x-slot:title>
        Dashboard
    </x-slot>
    <div class="flex flex-col">
        <div class="px-4 flex flex-col pb-8 bg-theme-light-purple">
            <a href="/family" class="flex items-center gap-x-2 bg-theme-purple text-white text-sm w-fit px-6 py-4 rounded-3xl my-8">
                <img src="/images/add icon.png"/>
                <span class="uppercase">voeg nieuwe familie toe</span>
            </a>
            <span class="uppercase text-sm text-gray-500">overzicht</span>
            <span class="uppercase text-lg">er zijn <span class="text-theme-purple font-medium">24 geregistreerde</span> families</span>
        </div>
        <table class="text-sm border-collapse w-full">
            <thead class="bg-theme-light-purple">
                <tr>
                    <th class="pl-4 py-2 text-left font-medium">Familie</th>
                    <th class="py-2 text-center font-medium">Contributie</th>
                    <th class="pr-4 py-2 text-right font-medium">Bewerk</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($families as $familie)
                <tr class="border-b border-gray-300 last:border-b-0">
                    <td class="pl-4 py-4">{{$familie->naam}}</td>
                    <td class="py-4 text-center">€600</td>
                    <td class="pr-4 py-4 flex justify-end">
                        <a href="/family">
                            <img src="/images/edit icon.png" />
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</x-layout>