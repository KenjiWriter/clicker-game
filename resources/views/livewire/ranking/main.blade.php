<div>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="Ranking('clicks')">Total clicks</button>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="Ranking('money')" >Total money</button>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="Ranking('cp')" >Click power</button>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="Ranking('dungeon')" >Dungeon</button>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="Ranking('level')" >Level</button>

    <div class="relative flex py-5 items-center">
        <div class="flex-grow border-t border-gray-400"></div>
        <span class="flex-shrink mx-4 text-gray-400">RANKING</span>
        <div class="flex-grow border-t border-gray-400"></div>
    </div>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    TOP
                </th>
                <th scope="col" class="py-3 px-6">
                    NAME
                </th>
                <th scope="col" class="py-3 px-6">
                    {{ $title }}
                </th>
                <th scope="col" class="py-3 px-6">
                    ACTION
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $top => $user)
                <tr class="bg-white border-b">
                        <th scope="row" class="py-4 px-6 @if ($top+1 == 1) text-yellow-400 font-extrabold @elseif($top+1 == 2) text-slate-600 font-extrabold @elseif($top+1 == 3) text-orange-900 font-extrabold @else text-gray-900 font-medium @endif whitespace-nowrap">
                            {{ $top+1 }}
                        </th>
                        <td class="py-4 px-6 @if ($top+1 == 1) text-yellow-400 font-extrabold @elseif($top+1 == 2) text-slate-600 font-extrabold @elseif($top+1 == 3) text-orange-900 font-extrabold @else text-gray-900 font-medium @endif">
                            {{ $user->name }}
                        </td>
                        <td class="py-4 px-6 @if ($top+1 == 1) text-yellow-400 font-extrabold @elseif($top+1 == 2) text-slate-600 font-extrabold @elseif($top+1 == 3) text-orange-900 font-extrabold @else text-gray-900 font-medium @endif">
                            @if ($score == 'total_money' || $score == 'total_clicks')
                                <?php 
                                    $converted_score = $this->num_convertion($user->$score);
                                ?>
                                {{ $converted_score }}
                            @else
                                {{ $user->$score }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('profile', $user->id) }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded cursor-pointer">
                                View profile    
                            </a>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
