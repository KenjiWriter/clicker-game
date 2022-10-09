<div class="content-center">
    Money: {{ $money }} <br>
    <span>LVL {{ $level }}</span> <br>
    <?php 
        $exp_percentages = round(($exp/$exp_needed)*100, 0);
    ?>
    <div class="w-full bg-gray-200 rounded-full">
        <div class="bg-green-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-l-full" style="width: {{ $exp_percentages }}%"> {{ $exp_percentages }}%</div>
    </div>
    <span>{{ $exp }}/{{ $exp_needed }}</span>
    <br><br>
    <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" wire:click="clickFunction">CLICK ME</button> <br>
    <small class="text-base font-light leading-relaxed mt-0 mb-4 text-green-800">
        @if ($clicker_skill_status == true)
            {{ $click_power*$clicker_skill_multiplier }}$ / Per click  <b>(x{{ $this->clicker_skill_multiplier }} | Time left {{ session()->get('clicker_active_timer') }})</b>
        @else
            {{ $click_power }}$ / Per click  
        @endif
        |
        @if ($pasive_skill_status == true)
            {{ $money_per_time * $pasive_skill_multiplier }}$ / {{ $clicker_timer }}s <b>(x{{ $this->pasive_skill_multiplier }} | Time left {{ session()->get('pasive_active_timer') }})</b>
        @else
            {{ $money_per_time }}$ / {{ $clicker_timer }}s
        @endif
    </small>
    <div wire:poll.{{ $clicker_timer }}s="auto_clicker"></div>
    @if ($clicker_skill_lvl >= 1 || $pasive_skill_lvl >= 1)
        <div class="relative flex py-5 items-center">
            <div class="flex-grow border-t border-gray-400"></div>
            <span class="flex-shrink mx-4 text-gray-400">SKILLS</span>
            <div class="flex-grow border-t border-gray-400"></div>
        </div>
        @if (session()->get('clicker_timer') != 0)
            <div wire:poll.1s="clicker_timer"></div>
        @endif
        @if (session()->get('pasive_timer') != 0)
            <div wire:poll.1s="pasive_timer"></div>
        @endif
        <div class="grid grid-cols-3 gap-4 divide-x">
            @if ($clicker_skill_lvl >= 1)
                <div class="text-m">
                    <p class="text-red-700">Clicker multiplier skill</p>
                    <p>LV. {{ $clicker_skill_lvl }}</p>
                    <p>Multiplier x{{ $clicker_skill_multiplier }}</p>
                    <p>TIME: @if (session()->get('clicker_timer') != 0)
                        {{ session()->get('clicker_timer') }}
                        </p>
                    @else
                        Ready to use
                        </p>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"  wire:click="skill('clicker')">ACTIVATE</button>
                    @endif
                </div>
            @endif
            @if ($pasive_skill_lvl >= 1)
                <div class="text-m">
                    <p class="text-red-700">Pasive income multiplier skill</p>
                    <p>LV. {{ $pasive_skill_lvl }}</p>
                    <p>Multiplier x{{ $pasive_skill_multiplier }}</p>
                    <p>TIME: @if (session()->get('pasive_timer') != 0)
                        {{ session()->get('pasive_timer') }}
                    </p>
                    @else
                        Ready to use
                    </p>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"  wire:click="skill('pasive')">ACTIVATE</button>
                    @endif
                </div>
            @endif
        </div>
    @endif
</div>
