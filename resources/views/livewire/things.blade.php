<div>
    <ul class="overflow-hidden divide-y rounded shadow">
        @foreach ($things as $thing )
                <li wire:key='{{$thing['id']}}' class="w-64 p-4">

                </li>
        @endforeach
    </ul>
</div>
