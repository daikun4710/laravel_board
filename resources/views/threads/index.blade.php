<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('掲示板') }}
      </h2>
      <div>
        <a href="{{ route('threads.create') }}">{{ __('新しく掲示板を作成する') }}</a>
      </div>
    </div>
  </x-slot>

  <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8 grid gap-y-2">
    @if ($threads->count())
        @foreach ($threads as $thread)
            <x-thread-card :thread="$thread" />
        @endforeach
    @else
        掲示板が作成されていません
    @endif
  </div>
</x-app-layout>