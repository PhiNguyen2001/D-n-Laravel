@extends("layouts.admin")

@section('title', 'Sửa Tài Khoản')
@section('contents')
    <div class="container px-6 mx-auto grid">
        <h1 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Sửa tài khoản</h1>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form method="POST"  action="{{ route('admin.users.update', [ 'user' => $user->id ]) }}">
                @csrf
                <div>
                    <label class="block text-sm">
                        <span class="text-base text-gray-800 dark:text-gray-400"> Họ và Tên : </span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="text" name="name" value="{{ $user->name }}" />
                        @error('name')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div>
                    <label class="block mt-4 text-sm">
                        <span class="text-base text-gray-800 dark:text-gray-400"> Email : </span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="text" name="email" value="{{ $user->email }}" />
                        @error('email')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div>
                    <label class="block mt-4 text-sm">
                        <span class="text-base text-gray-800 dark:text-gray-400"> Địa Chỉ : </span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="text" name="address" value="{{ $user->address }}" />
                        @error('address')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div>
                    <label class="block mt-4 text-sm"> <span class="text-base text-gray-800 dark:text-gray-400">
                            Giới Tính :
                        </span>
                        <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="gender">
                            <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>
                                Male
                            </option>
                            <option value="0" {{ $user->gender == 0 ? 'selected' : '' }}>
                                Female
                            </option>
                        </select>
                    </label>
                </div>
                <div>
                    <label class="block mt-4 text-sm"> <span class="text-base text-gray-800 dark:text-gray-400">
                            Phân quyền :
                        </span>
                        <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="role">
                            <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>
                                User
                            </option>
                            <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>
                                Admin
                            </option>
                        </select>
                    </label>
                </div>

                <button class="mt-6 bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Sửa </button>
            </form>
        </div>
    </div>
@endsection
