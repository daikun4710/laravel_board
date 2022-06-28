<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <a href="{{ route('threads') }}">
        <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
          ⇦
        </button>
      </a>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('掲示板作成') }}
      </h2>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form action="{{ route('threads.create') }}" method="POST">
            @csrf
            <div>
              <label for="title">{{ __('掲示板タイトル') }}</label>
              <textarea name="title" id="title" cols="30" rows="2" class="w-full rounded-lg border-2 bg-gray-100 @error('title') border-red-500 @enderror"></textarea>

              @error('title')
              <div class="text-red-500 text-sm mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mt-4">
              <label for="body">{{ __('最初のコメント') }}</label>
              <textarea name="body" id="body" cols="30" rows="4" class="w-full rounded-lg border-2 bg-gray-100 @error('comment') border-red-500 @enderror"></textarea>

              @error('body')
              <div class="text-red-500 text-sm mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mt-4">
              <button type="submit" class="btn bg-blue-500 rounded font-medium px-4 py-2 text-white">{{ __('作成') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>