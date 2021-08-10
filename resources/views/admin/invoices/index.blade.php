@extends('layouts.admin')
@section('title', 'Quản lý đơn hàng')
@section('contents')
    <div class="container px-6 mx-auto grid">
        <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Quản lí đơn hàng</p>
        @if (!empty($data))
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table  class="w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-4">#</th>
                                <th class="px-4 py-4">Username</th>
                                <th class="px-4 py-4">Number</th>
                                <th class="px-4 py-4">Address</th>
                                <th class="px-4 py-4">Total Price</th>
                                <th class="px-4 py-4">Invoice Details.no</th>
                                <th class="px-4 py-4">Status</th>
                                <th class="px-4 py-4" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                            @foreach ($data as $invoice)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-4">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-4">
                                        <a href="{{ route('admin.invoices.show', ['id' => $invoice->id]) }}"
                                            class="text-decoration-none">{{ $invoice->user->name }}</a>
                                    </td>
                                    <td class="px-4 py-4">{{ $invoice->number }}</td>
                                    <td class="px-4 py-4">{{ $invoice->address }}</td>
                                    <td class="px-4 py-4">{{ $invoice->total_price }}</td>
                                    <td class="px-4 py-4">{{ $invoice->invoiceDetails->count() }}</td>
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

                                    <td><a class="flex items-center justify-between px-2 py-2  text-purple-600  "
                                        aria-label="Edit"
                                        href="{{ route('admin.invoices.show', ['id' => $invoice->id]) }}"><svg
                                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
                                                clip-rule="evenodd" />
                                        </svg></a>
                                <td x-data="{show:false}" x-bind:class="{ 'model-open': show }"
                                    style="font-family:Roboto">
                                    <div>
                                        <button @click={show=true} type="button"
                                            class="flex items-center justify-between px-2 py-2 text-purple-600 rounded-lg "
                                            data-target="#confirm_delete_{{ $invoice->id }}"><svg class="w-6 h-6"
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
                                                            action="{{ route('admin.invoices.delete', ['id' => $invoice->id]) }}">
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
            <h2>Not Found</h2>
        @endif
        {{ $data->links() }}
    </div>
@endsection
