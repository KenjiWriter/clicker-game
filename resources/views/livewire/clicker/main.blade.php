<div class="content-center">
    Money: {{ $money }} <br>
    <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" wire:click="clickFunction">CLICK ME</button> <br>
    <small class="text-base font-light leading-relaxed mt-0 mb-4 text-green-800">{{ $click_power }}$ / Per click  | {{ $money_per_time }}$ / {{ $clicker_timer }}s</small>
    <div wire:poll.{{ $clicker_timer }}s="auto_clicker"></div>
</div>
