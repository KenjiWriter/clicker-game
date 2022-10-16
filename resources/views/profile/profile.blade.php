<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile '.$user->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 content-center">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center content-center bg-white border-b border-gray-200">
                    <img class="mx-auto w-50 h-50 rounded-full ring-2 ring-green-300" src="https://picsum.photos/200" alt="">
                    <br><br>
                    <span class="">Level: {{ $user->level }}</span> <br>
                    <br>
                    <span class="">Total money collected: {{ $money }}</span> <br>
                    <span class="">Total clicked: {{ $clicks }}</span> <br>
                    <br>
                    <span class="">CP: {{ $user->click_power }}</span> <br>
                    <span class="">CPS: {{ $user->money_per_time }}</span> <br>
                    <br>
                    <span class="pb-3">Dungeon floor: {{ $user->dungeon_lvl }}</span> <br><br>                  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
