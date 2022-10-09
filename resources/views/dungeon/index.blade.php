<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dungeon') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 content-center">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center bg-white border-b border-gray-200">
                    @if (session()->get('message') != null)
                        @if(session()->get('message') == 'fail')
                            <span class="text-red-600 text-4xl font-semibold">Failed!</span>
                        @else
                            <span class="text-green-600 text-4xl font-semibold">Congratulations! you have passed floor {{ auth()->user()->dungeon_lvl - 1 }}</span>
                        @endif
                    @endif
                    <h1 class="text-3xl text-stone-800">Dungeon</h1>
                    <h1 class="text-3xl text-stone-800">Floor {{ auth()->user()->dungeon_lvl }}</h1>

                    <div class="relative flex py-5 items-center">
                        <div class="flex-grow border-t border-gray-400"></div>
                        <span class="flex-shrink mx-4 text-gray-400">MONSTER INFO</span>
                        <div class="flex-grow border-t border-gray-400"></div>
                    </div>
                    <span class="text-2xl text-lime-700">{{ $monster[0]->name }}</span> <br>
                    <span class="text-2xl text-lime-700">{{ $monster[0]->hp }}HP</span> <br> <br>
                    <span class="text-2xl text-lime-700">{{ $monster[0]->reward }}$</span><br>
                    <span class="text-2xl text-lime-700">{{ $monster[0]->exp }}exp</span>
                    <br> <br>
                    @if (auth()->user()->level >= $monster[0]->req_lvl)
                        <form action="{{ route('dungeon.battle') }}" method="POST">
                            @csrf
                            <input type="submit" value="Enter" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        </form>
                    @else
                        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded opacity-50 cursor-not-allowed">
                            Enter
                        </button> <br>
                        <span class="text-red-700 text-base font-bold">(To enter this floor you need at least be level {{ $monster[0]->req_lvl }})</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>