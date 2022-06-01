<div>
    <ul drag-root="reorder" class="w-48 mx-20 my-20 text-sm font-medium text-gray-900 bg-white border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        @foreach ($things as $thing)
            <li drag-item="{{$thing['id']}}" draggable="true" wire:key='{{ $thing['id'] }}' class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                {{ $thing['title'] }}
            </li>
        @endforeach
    </ul>
</div>
