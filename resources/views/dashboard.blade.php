<x-layout>
    <x-slot:title>
        Dashboard
    </x-slot>
    <div class="flex flex-col">
        <div class="flex flex-col lg:flex-row gap-y-6 lg:gap-x-8 py-6 bg-theme-light-purple sm:px-8 lg:justify-between">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-y-6 sm:gap-x-6">
                <div class="flex items-center gap-x-4 h-16 px-4 sm:px-0">
                    <span class="border border-gray-300 bg-white h-full w-16 flex justify-center items-center rounded-full text-3xl">{{$dayOfMonth}}</span>
                    <div class="flex flex-col uppercase">
                        <span>{{$weekday}}</span>
                        <span>{{$month}}</span>
                    </div>
                </div>
                <span class="border-b border-gray-300 sm:grow lg:h-16 lg:border-b-0 lg:border-l"></span>
                <a href="/family" class="bg-theme-purple h-16 flex items-center gap-x-2 px-6 text-white rounded-[2rem] w-fit ml-4 sm:ml-0 text-nowrap">
                    <img src="/images/add icon.png"/>
                    <span class="uppercase">add a new family</span>
                </a>
            </div>
            <div class="flex flex-col uppercase px-4 sm:px-0 lg:max-w-52 xl:max-w-full">
                <span class="text-sm sm:text-base text-gray-500">overview</span>
                <span class="text-lg sm:text-2xl">there are <span class="text-theme-purple font-medium">{{count($families)}} registered</span> families</span>
            </div>
        </div>
        <table class="text-sm border-collapse w-full">
            <thead class="bg-theme-light-purple">
                <tr>
                    <th class="hidden sm:table-cell pl-8 py-2 text-left font-medium">ID</th>
                    <th class="pl-4 sm:pl-0 py-2 text-left font-medium">Family</th>
                    <th class="hidden lg:table-cell text-left font-medium">Address</th>
                    <th class="py-2 text-center sm:text-left font-medium">Contribution</th>
                    <th class="pr-4 sm:pr-8 py-2 text-right font-medium sm:w-32">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($families as $family)
                <tr class="border-b border-gray-300 last:border-b-0">
                    <td class="hidden sm:table-cell pl-8 py-2 text-left">{{$family->id}}</td>
                    <td class="pl-4 sm:pl-0 py-4">{{$family->name}}</td>
                    <td class="hidden lg:table-cell lg:w-1/2 xl:w-5/12 2xl:w-4/12">{{$family->address}}</td>
                    <td class="py-4 text-center sm:text-left">€{{$family->contribution}}</td>
                    <td class="pr-4 sm:pr-8 py-4 flex justify-end">
                        <a href="/family/{{$family->id}}" class="sm:flex sm:gap-x-1 sm:bg-gray-200 sm:p-2 sm:rounded-lg">
                            <img src="/images/edit icon.png" />
                            <span class="hidden sm:block">Edit</span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</x-layout>