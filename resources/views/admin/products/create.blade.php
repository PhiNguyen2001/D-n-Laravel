@extends("layouts.admin")

@section('title', 'Thêm Sản Phẩm')
@section('contents')
    <div class="container px-6 mx-auto grid">
        <h1 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Thêm Sản Phẩm</h1>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="block text-sm">
                        <span class="text-base text-gray-800 dark:text-gray-400"> Tên sản phẩm : </span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="text" name="name" value="{{ old('name')}}" />
                        @error('name')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div>
                    <label class="block mt-4 text-sm">
                        <span class="text-base text-gray-800 dark:text-gray-400"> Giá sản phẩm : </span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="number" name="price" value="{{ old('price')}}" />
                        @error('price')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div>
                    <label class="block mt-4 text-sm">
                        <span class="text-base text-gray-800 dark:text-gray-400"> Ảnh sản phẩm : </span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input "
                            type='file' name="image" value="{{ old('image')}}"/>
                        @error('image')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div>
                    <label class="block mt-4 text-sm">
                        <span class="text-base text-gray-800 dark:text-gray-400"> Số lượng : </span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="number" name="quantity" value="{{ old('quantity')}}" />
                        @error('quantity')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div>
                    <label class="block text-sm">
                        <span class="text-base text-gray-800 dark:text-gray-400"> Mô tả : </span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="text" name="description" value="{{ old('description')}}"/>
                        @error('description')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div>
                    <label class="block mt-4 text-sm"> <span class="text-base text-gray-800 dark:text-gray-400">
                            Category_ID :
                        </span>
                        <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="category_id">
                            @foreach ($listCate as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <button class="mt-6 bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Thêm
                    Mới</button>
            </form>
        </div>
    </div>
@endsection
