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
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"  wire:click="cursor('b')">{{ $b_cprice }}$</button>
        </div>
        <div class="text-xl">
            <p class="text-slate-200">Silver cursor</p>
            <p>+20$</p>
            <p>x{{ $s_cursor }}</p>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"  wire:click="cursor('s')">{{ $s_cprice }}$</button>
        </div>
        <div class="text-xl">
            <p class="text-amber-300">Gold cursor</p>
            <p>+50$</p>
            <p>x{{ $g_cursor }}</p>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"  wire:click="cursor('g')">{{ $g_cprice }}$</button>
        </div>
    </div>

    <header class="text-2xl mb-0 mt-5 text-violet-700">Auto clickers</header>
    <info class="text-xs mb-3 text-sky-500">(Every auto clicker will increase your income per time)</info>
    @isset($autoclicker_message)
        <br>
        <message class="text-xl text-red-500">{{ $autoclicker_message }} </message>
    @endisset
    <div class="grid grid-cols-3 gap-4 divide-x">
        <div class="text-xl">
            <p class="text-amber-800">Bronze auto clicker</p>
            <p>+0,5$</p>
            <p>x{{ $b_autoClicker }}</p>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"  wire:click="autoClicker('b')">{{ $b_aprice }}$</button>
        </div>
        <div class="text-xl">
            <p class="text-slate-200">Silver auto clicker</p>
            <p>+2$</p>
            <p>x{{ $s_autoClicker }}</p>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"  wire:click="autoClicker('s')">{{ $s_aprice }}$</button>
        </div>
        <div class="text-xl">
            <p class="text-amber-300">Gold auto clicker</p>
            <p>+5$</p>
            <p>x{{ $g_autoClicker }}</p>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"  wire:click="autoClicker('g')">{{ $g_aprice }}$</button>
        </div>
    </div>
    <header class="text-2xl mb-0 mt-5 text-rose-300">Upgrades</header>
    @isset($upgrade_message )
        <br>
        <message class="text-xl text-red-500">{{ $upgrade_message }} </message>
    @endisset
    <div class="grid grid-cols-3 gap-4 divide-x">
        <div class="text-xl">
            <p class="text-fuchsia-600">Auto clicker timer</p>
            @if ($ac_timer_lvl != 'MAX')
                <p>-2sec</p>
            @endif
            <p>LV. {{ $ac_timer_lvl }}</p>
            @if ($ac_timer_lvl != 'MAX')
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"  wire:click="ac_timer">{{ $ac_timer_price }}$</button>
            @endif
        </div>
    </div>
</div>
