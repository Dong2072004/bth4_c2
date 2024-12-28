@extends('welcome')

@section('main')
    <div class="container">
        <h1>Thêm </h1>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="author">Thông tin chi tiết:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="category">Giá:</label>
                <textarea class="form-control" id="price" name="price" required></textarea>
            </div>
            <div class="form-group">
                <label for="quantity">Số lượng tồn:</label>
                <textarea class="form-control" id="quantity" name="quantity" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">THÊM</button>
        </form>

    </div>
@endsection
