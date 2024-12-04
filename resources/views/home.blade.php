<x-layout>
    <x-slot:title>
        Home
    </x-slot>
    <div class="px-4 flex flex-col">
        <x-hero-section/>
        <button class="w-fit">Voeg familie toe</button>
        <span>Overzicht</span>
        <span>Er zijn xx geregistreerde families</span>
        <section class="border-2 border-red-500">
                <table>
                    <thead>
                        <tr>
                            <th>Familie</th>
                            <th>Contributie</th>
                            <th>Acties</th>
                        </tr>
                    </thead>
                </table>
        </section>
    </div>
</x-layout>