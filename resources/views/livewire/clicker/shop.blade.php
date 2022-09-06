<div>
    <stats> CP: {{ $click_power }} | Money: {{ $money }}</stats>
    <header class="text-2xl mb-0 text-lime-500">Cursors</header>
    <info class="text-xs mb-3 text-sky-500">(Every cursor will incresse your clicking power)</info>
    @isset($message)
        <br>
        <message class="text-xl text-red-500">{{ $message }} </message>
    @endisset
    <div class="grid grid-cols-3 gap-4 divide-x">
        <div class="text-xl">
            <p class="text-amber-800">Bronze cursor</p>
            <p>+1$</p>
            <p>x{{ $b_cursor }}</p>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"  wire:click="cursor('b')">{{ $b_price }}$</button>
        </div>
        <div class="text-xl">
            <p class="text-slate-200">Silver cursor</p>
            <p>+20$</p>
            <p>x{{ $s_cursor }}</p>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"  wire:click="cursor('s')">{{ $s_price }}$</button>
        </div>
        <div class="text-xl">
            <p class="text-amber-300">Gold cursor</p>
            <p>+50$</p>
            <p>x{{ $g_cursor }}</p>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"  wire:click="cursor('g')">{{ $g_price }}$</button>
        </div>
    </div>
</div>
