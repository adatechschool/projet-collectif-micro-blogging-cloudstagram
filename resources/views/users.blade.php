<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users list') }}
        </h2>
    </x-slot>

    <table class='border-separate border-8 border-double border-black'>
        <thead class='border-4 border-black'>
            <tr>
            @foreach (array_keys($users->first()) as $key)
                <th class='border border-black'>{{ $key }}</th>
            @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                @foreach ($user as $key=>$value)
                    <td class='border border-black'>{{ $value }}</td>
                @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>