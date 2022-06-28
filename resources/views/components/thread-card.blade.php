@props(['thread' => $thread])

<a href="{{ route('threads.show', $thread) }}" class="p-4 block grid bg-white sm:rounded-lg border-1 shadow-sm">

    <div class="flex items-stretch">

        <div class="flex-1 px-4 py-2 m-2">
            <div p-1>
                <span>
                    {{ $thread->title }}
                </span>
            </div>

            <span class="text-gray-600 text-sm">
                {{ $thread->created_at->diffForHumans() }}
            </span>
        </div>

        @can('delete', $thread)
        <div class="flex-1 text-center px-4 py-2 m-2">
            <form action="{{ route('threads.destroy', $thread) }}" method="post" class="text-right">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500">{{ __('削除する') }}</button>
            </form>
        </div>
        @endcan


    </div>

</a>



