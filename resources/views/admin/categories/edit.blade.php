@extends("layouts.admin")

@section('title', 'Sửa Danh Mục')
@section('contents')
    <div class="container px-6 mx-auto grid">
        <h1 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Sửa Danh Mục</h1>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form method="POST" action="{{ route('admin.categories.update', ['cate' => $cate->id]) }}">
                @csrf
                <div>
                    <label class="block text-sm">
                        <span class="text-base text-gray-800 dark:text-gray-400">Tên Danh Mục : </span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="text" name="name" value="{{ $cate->name }}" />
                        @error('name')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <button class="mt-6 bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Sửa </button>
            </form>
        </div>
    </div>
@endsection
