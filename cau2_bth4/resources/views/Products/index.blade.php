@extends('welcome')
@section('main')
    <div class="container">
        <a href="{{ route('products.create') }}" class="add btn btn-primary font-weight-bold todo-list-add-btn" style="float: right;">Thêm sản phẩm</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Tên sách</th>
                <th scope="col">Thông tin chi tiết</th>
                <th scope="col">Giá bán</th>
                <th scope="col">Số lượng bản sao</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td style="max-width: 800px">{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td >
                        <a href="{{ route( 'products.edit', $product->id) }}"><i class="bi bi-pencil me-3"></i></a>
                        <!-- Button trigger modal -->
                        <a class="bi bi-trash3 ms-3" data-bs-toggle="modal" data-bs-target="#{{$product->id}}"></a>

                        <!-- Modal -->
                        <div class="modal fade" id="{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">XOA BAI VIET {{$product->id}}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ban co chac chan muon xoa quyen sach "{{$product->name}}" khong?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">huy</button>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">xac nhan</button>

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
    </div>
@endsection
