@extends('layouts.admin')
@section('title', 'Quản lí Danh Mục')

@section('contents')
    <div class="container px-6 mx-auto grid">
        @section('search-form')
        <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
            <div class="absolute inset-y-0 flex items-center pl-2">
                
            </div>
            <form action="{{ route('admin.categories.index') }}" method="GET" class="row col-6">
              <div class="absolute inset-y-0 flex items-center pl-2">
              <button><svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd"></path>
            </svg></button>
              </div>
            <input
                class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                type="text" placeholder="Search for projects" aria-label="Search" name="keyword"
                value="{{ old('keyword') }}" />
            </form>
        </div>
        @endsection
        <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                href="{{ route('admin.categories.create') }}">Thêm Danh Mục</a>
        </div>

        @if (!empty($data))
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <td class="px-4 py-4">Id</td>
                                <td class="px-4 py-4">Name</td>
                                <td class="px-4 py-4 " colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($data as $cate)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-4">{{ $cate->id }}</td>
                                    <td class="px-4 py-4">{{ $cate->name }}</td>
                                    <td><a class="flex items-center justify-between px-2 py-2  text-purple-600  "
                                            aria-label="Edit"
                                            href="{{ route('admin.categories.edit', ['cate' => $cate->id]) }}"><svg
                                                class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg></a>
                                    <td x-data="{show:false}" x-bind:class="{ 'model-open': show }"
                                        style="font-family:Roboto">
                                        <div>
                                            <button @click={show=true} type="button"
                                                class="flex items-center justify-between px-2 py-2 text-purple-600 rounded-lg "
                                                data-target="#confirm_delete_{{ $cate->id }}"><svg class="w-6 h-6"
                                                    aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg></Button>
                                        </div>
                                        <div x-show="show" tabindex="0"
                                            class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
                                            <div @click.away="show = false"
                                                class="z-50 relative p-3 mx-auto my-0 max-w-full" style="width: 600px;">
                                                <div
                                                    class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
                                                    <button @click={show=false}
                                                        class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold">&times;</button>
                                                    <div class="px-6 py-3 text-xl border-b font-bold">Xác nhận xóa thành
                                                        viên!
                                                    </div>
                                                    <div class="p-6 flex-grow">
                                                        <p>Bạn có chắc chắn muốn xóa ?
                                                    </div>
                                                    <div class="px-6 py-3 border-t">
                                                        <div class="flex justify-end">
                                                            <button @click={show=false} type="button"
                                                                class="bg-gray-700 text-gray-100 rounded px-4 py-2 mr-1">Đóng</Button>
                                                            <form method="POST"
                                                                action="{{ route('admin.categories.delete', ['cate' => $cate->id]) }}">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="bg-red-600 text-gray-200 rounded px-4 py-2">Xóa</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </td>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <h2>Không có dữ liệu</h2>
        @endif
    </div>
@endsection
