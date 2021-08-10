@extends("layouts.admin")

@section('title', 'Thêm Tài Khoản')
@section('contents')
    <div class="container px-6 mx-auto grid">
        <h1 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Thêm tài khoản</h1>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf
                <div>
                    <label class="block text-sm">
                        <span class="text-base text-gray-800 dark:text-gray-400"> Họ và Tên : </span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="text" name="name" value="{{ old('name') }}" />
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
                            type="text" name="email" value="{{ old('email') }}" />
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
                            type="text" name="address" value="{{ old('address') }}" />
                        @error('address')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div>
                    <label class="block mt-4 text-sm">
                        <span class="text-base text-gray-800 dark:text-gray-400"> Mật Khẩu : </span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="password" name="password" />
                        @error('password')
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
                            <option value="{{ config('common.user.gender.male') }}"
                                {{ old('gender'), config('common.user.gender.male') == config('common.user.gender.male') ? 'selected' : '' }}>
                                Male
                            </option>
                            <option value=" {{ config('commom.user.gender.female') }} "
                                {{ old('gender'), config('common.user.gender.male') == config('common.user.gender.female') ? 'selected' : '' }}>
                                Female
                            </option>
                        </select>
                    </label>
                </div>
                <div>
                    @error('gender')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block mt-4 text-sm"> <span class="text-base text-gray-800 dark:text-gray-400">
                            Phân quyền :
                        </span>
                        <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="role">
                            <option value="{{ config('common.user.role.user') }}"
                                {{ old('role'), config('common.user.gender.user') == config('common.user.gender.user') ? 'selected' : '' }}>
                                User
                            </option>
                            <option value=" {{ config('common.user.gender.female') }} "
                                {{ old('role'), config('common.user.gender.user') == config('common.user.gender.admin') ? 'selected' : '' }}>
                                Admin
                            </option>
                        </select>
                    </label>
                    <div>
                        @error('role')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button class="mt-6 bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Thêm
                    Mới</button>
            </form>
        </div>
    </div>
@endsection
