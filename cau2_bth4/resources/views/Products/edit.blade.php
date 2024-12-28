@extends('welcome')

@section('main')
    <div class="container">
        <h1>Sửa sản phẩm</h1>

        <form action="{{ route('products.update', $products) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $products->name }}">
            </div>
            <div class="form-group">
                <label for="description">Thông tin chi tiết:</label>
                <textarea class="form-control" id="description" name="description" required>{{ $products->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Giá:</label>
                <textarea class="form-control" id="price" name="price">{{ $products->price }}</textarea>
            </div>
            <div class="form-group">
                <label for="quantity">Số lượng tồn:</label>
                <textarea class="form-control" id="quantity" name="quantity">{{ $products->quantity }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>

    </div>
@endsection
