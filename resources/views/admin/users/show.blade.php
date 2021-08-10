@extends('layouts.admin')

@section('title', 'Thông tin người dùng')

@section('contents')
    <div class="container px-6 mx-auto grid">
        <div class="my-6  font-semibold text-gray-700 dark:text-gray-400">
            <div class="col-12 ">
                <div class="col-6">
                    <div class="col-3">Họ và tên : {{ $user->name }}</div>

                </div>
            </div>
            <div class="col-12">
                <div class="col-6">
                    <div class="col-10">Email : {{ $user->email }}</div>
                </div>
            </div>
            <div class="col-12">
                <div class="col-6">
                    <div class="col-10">Address : {{ $user->address }}</div>
                </div>
            </div>
            <div class="col-12">
                <div class="col-6">
                    <div class="col-3">Gender : {{ $user->gender == config('common.user.gender.male') ? 'Nam' : 'Nữ' }}
                    </div>
                </div>
            </div>

        </div>
        <hr>
        <div>
            <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Lịch sử mua hàng</p>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <td class="px-4 py-4">Id</td>
                                <td class="px-4 py-4">Name</td>
                                <td class="px-4 py-4">Number</td>
                                <td class="px-4 py-4">Address</td>
                                <td class="px-4 py-4">Price</td>
                                <td class="px-4 py-4">Invoice Status</td>
                                <td class="px-4 py-4">Create At</td>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($user->invoices as $invoice)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-4">{{ $invoice->id }}</td>
                                    <td class="px-4 py-4">{{ $user->name }}</td>
                                    <td class="px-4 py-4">{{ $invoice->number }}</td>
                                    <td class="px-4 py-4">{{ $invoice->address }}</td>
                                    <td class="px-4 py-4">{{ $invoice->total_price }}</td>
                                    <td class="px-4 py-4">
                                        @if ($invoice->status == config('common.invoice.status.cho_duyet'))
                                            <span class="text-danger">Chờ duyệt</span>
                                        @elseif($invoice->status == config('common.invoice.status.dang_xu_ly'))
                                            <span class="text-danger">Đang xử lý</span>
                                        @elseif($invoice->status == config('common.invoice.status.dang_giao_hang'))
                                            <span class="text-danger">Đang giao hàng</span>
                                        @elseif($invoice->status == config('common.invoice.status.da_giao_hang'))
                                            <span class="text-danger">Đã giao hàng</span>
                                        @elseif($invoice->status == config('common.invoice.status.da_huy'))
                                            <span class="text-danger">Đã hủy</span>
                                        @elseif($invoice->status == config('common.invoice.status.chuyen_hoan'))
                                            <span class="text-danger">Chuyển hoàn</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4">{{ $invoice->created_at }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
