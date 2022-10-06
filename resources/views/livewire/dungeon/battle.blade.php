<div>
    <div wire:poll.1s="time"></div>
    <h1 class="text-3xl">TIME LEFT {{ session()->get('time') }}</h1>
    <br>
    <h1 class="text-xl ">{{ $monster->name }} HP</h1>
    <progress id="file" value="{{ session()->get('monster_hp') }}" max="{{ $monster->hp }}"></progress><br>
    <span class="text-xl">{{ session()->get('monster_hp') }}/{{ $monster->hp }} </span>
    <br><br>
    <button class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="clickFunction">{{ auth()->user()->click_power }}CP</button>
</div>
