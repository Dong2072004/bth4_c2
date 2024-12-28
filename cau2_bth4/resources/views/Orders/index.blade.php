@extends('welcome')

@section('title', 'Đơn hàng')

@section('main')
    <div style="float: right">
        <a href="{{ route('orders.create') }}" class="add btn btn-primary font-weight-bold todo-list-add-btn">Thêm thông tin đơn hàng</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Ngày đặt hàng</th>
            <th scope="col">Trạng thái đơn hàng</th>
            <th scope="col">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->customer->name }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    <!-- Nút xem chi tiết -->
                    <a href="#" class="bi bi-eye" data-bs-toggle="modal" data-bs-target="#orderDetailModal{{ $order->id }}"></a>

                    <!-- Modal chi tiết đơn hàng -->
                    <div class="modal fade" id="orderDetailModal{{ $order->id }}" tabindex="-1" aria-labelledby="orderDetailLabel{{ $order->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="orderDetailLabel{{ $order->id }}">Chi tiết đơn hàng #{{ $order->id }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Tên khách hàng:</strong> {{ $order->customer->name }}</p>
                                    <p><strong>Ngày đặt hàng:</strong> {{ $order->order_date }}</p>
                                    <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
                                    <hr>
                                    <h5>Sản phẩm</h5>
                                    <ul>
                                        @foreach($order->products as $product)
                                            <li>
                                                <strong>{{ $product->name }}</strong> - Số lượng: {{ $product->quantity }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Nút xóa -->
                    <a class="bi bi-trash3 ms-3" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $order->id }}"></a>

                    <!-- Modal xóa -->
                    <div class="modal fade" id="deleteModal{{ $order->id }}" tabindex="-1" aria-labelledby="deleteLabel{{ $order->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteLabel{{ $order->id }}">XÓA ĐƠN HÀNG {{ $order->id }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn chắc chắn muốn xóa không?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">OK</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
