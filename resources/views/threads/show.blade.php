<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center gap-x-4">
      <a href="{{ route('threads') }}">
        <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
          ⇦
        </button>
      </a>
      <div class="max-w-4xl">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">{{ $thread->title }}</h1>
      </div>
    </div>
  </x-slot>
  
  <div class="pt-6 max-w-4xl mx-auto grid bg-white mt-4">
    @if ($comments->count())
      @foreach ($comments as $comment)
      <x-comment-card :comment="$comment" />
      @endforeach
    @else
      コメントがありません
    @endif

    <form action="{{ route('comments.store', $thread) }}" method="POST" class="m-4">
      @csrf
      <label for="body">{{ __('コメント') }}</label>
      <textarea name="body" id="body" cols="30" rows="4" class="w-full rounded-lg border-2 bg-gray-100 @error('comment') border-red-500 @enderror"></textarea>
      <div class="mt-4">
        <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">{{ __('投稿') }}</button>
      </div>
    </form>

  </div>
</x-app-layout>