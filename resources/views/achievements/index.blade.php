<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 content-center">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center bg-white border-b border-gray-200">
                    <div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Achievement
                </th>
                <th scope="col" class="py-3 px-6">
                    Description
                </th>
                <th scope="col" class="py-3 px-6">
                    STAGE
                </th>
                <th scope="col" class="py-3 px-6">
                    REWARD
                </th>
                <th scope="col" class="py-3 px-6">
                    PROGRESS
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                    Clickomaniac
                </th>
                <td class="py-4 px-6">
                    Total amount of your clicks
                </td>
                <td class="py-4 px-6">
                    {{ $click_achievement+1}}
                </td>
                <td>
                    {{ $click_achievement_reward }}$
                </td>
                <td>
                    @if ($click_achievement_needed <= $total_clicks)
                        <form action="{{ route('achievement.reward', 'clicks') }}" method="POST">
                            @csrf
                            <input type="submit" value="Colect" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        </form>
                    @else
                        {{ $total_clicks }}/{{ $click_achievement_needed }} ({{ round(($total_clicks/$click_achievement_needed)*100,2) }}%)
                    @endif
                </td>
            </tr>
            <tr class="bg-white border-b">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                    Welthy man
                </th>
                <td class="py-4 px-6">
                    Total amount of your collected money
                </td>
                <td class="py-4 px-6">
                    {{ $money_achievement+1}}
                </td>
                <td>
                    {{ $money_achievement_reward }} CP
                </td>
                <td>
                    @if ($money_achievement_needed <= $total_money)
                        <form action="{{ route('achievement.reward', 'money') }}" method="POST">
                            @csrf
                            <input type="submit" value="Colect" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        </form>
                    @else
                        {{ $total_money }}/{{ $money_achievement_needed }} ({{ round(($total_money/$money_achievement_needed)*100, 2) }}%)
                    @endif
                </td>
            </tr>
            <tr class="bg-white border-b">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                    Maniac
                </th>
                <td class="py-4 px-6">
                    Total amount of your Click power
                </td>
                <td class="py-4 px-6">
                    {{ $cp_achievement+1}}
                </td>
                <td>
                    {{ $cp_achievement_reward }} CPS
                </td>
                <td>
                    @if ($cp_achievement_needed <= $cp)
                        <form action="{{ route('achievement.reward', 'cp') }}" method="POST">
                            @csrf
                            <input type="submit" value="Colect" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        </form>
                    @else
                        {{ $cp }}/{{ $cp_achievement_needed }} ({{ round(($cp/$cp_achievement_needed)*100, 2) }}%)
                    @endif
                </td>
            </tr>
            <tr class="bg-white border-b">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                    Working smart not hard
                </th>
                <td class="py-4 px-6">
                    Total amount of your CPS
                </td>
                <td class="py-4 px-6">
                    {{ $cps_achievement+1}}
                </td>
                <td>
                    {{ $cps_achievement_reward }}$
                </td>
                <td>
                    @if ($cps_achievement_needed <= $cps)
                        <form action="{{ route('achievement.reward', 'cps') }}" method="POST">
                            @csrf
                            <input type="submit" value="Colect" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        </form>
                    @else
                        {{ $cps }}/{{ $cps_achievement_needed }} ({{ round(($cps/$cps_achievement_needed)*100, 2) }}%)
                    @endif
                </td>
            </tr>
            <tr class="bg-white border-b">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                    Demon hunter
                </th>
                <td class="py-4 px-6">
                    Complited floors in dunegeon mode
                </td>
                <td class="py-4 px-6">
                    {{ $dungeon_achievement+1}}
                </td>
                <td>
                    {{ $dungeon_achievement_reward }}CP
                </td>
                <td>
                    @if ($dungeon_achievement_needed <= $dungeon)
                        <form action="{{ route('achievement.reward', 'dungeon') }}" method="POST">
                            @csrf
                            <input type="submit" value="Colect" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        </form>
                    @else
                        {{ $dungeon }}/{{ $dungeon_achievement_needed }} ({{ round(($dungeon/$dungeon_achievement_needed)*100, 2) }}%)
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
