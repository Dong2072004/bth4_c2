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
                    <a href="{{ route('orders.show', $order->id) }}"><i class="bi bi-eye"></i></a>


                    <a class="bi bi-trash3 ms-3" data-bs-toggle="modal" data-bs-target="#{{$order->id}}"></a>
                    <div class="modal fade" id="{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">XÓA ĐƠN HÀNG {{$order->id}}</h1>
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
