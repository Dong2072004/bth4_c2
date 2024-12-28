@extends('welcome')

@section('title', 'Thêm Đơn Hàng')

@section('main')
    <div class="container mt-4">
        <h1 class="mb-4">Thêm Đơn Hàng Mới</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="customer_id" class="form-label">Chọn Khách Hàng</label>
                <select name="customer_id" id="customer_id" class="form-select" required>
                    <option value="">-- Chọn Khách Hàng --</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }} - {{ $customer->phone }}</option>
                    @endforeach
                </select>
            </div>

            <h3 class="mt-4">Sản Phẩm</h3>
            <div id="product-list">
                <div class="row align-items-end mb-3 product-item">
                    <div class="col-md-6">
                        <label for="product_id" class="form-label">Sản Phẩm</label>
                        <select name="products[0][product_id]" class="form-select" required>
                            <option value="">-- Chọn Sản Phẩm --</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->price }} VND</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="quantity" class="form-label">Số Lượng</label>
                        <input type="number" name="products[0][quantity]" class="form-control" min="1" required>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-danger remove-product">Xóa</button>
                    </div>
                </div>
            </div>

            <!-- Dùng d-flex để căn chỉnh các nút trên một dòng -->
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-primary mb-3" id="add-product">Thêm Sản Phẩm</button>
                <button type="submit" class="btn btn-success mb-3">Tạo Đơn Hàng</button>
            </div>
        </form>
    </div>

    <script>
        let productIndex = 1;

        document.getElementById('add-product').addEventListener('click', function () {
            const productList = document.getElementById('product-list');
            const newProduct = document.createElement('div');
            newProduct.classList.add('row', 'align-items-end', 'mb-3', 'product-item');
            newProduct.innerHTML = `
            <div class="col-md-6">
                <label for="product_id" class="form-label">Sản Phẩm</label>
                <select name="products[${productIndex}][product_id]" class="form-select" required>
                    <option value="">-- Chọn Sản Phẩm --</option>
                    @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->price }} VND</option>
                    @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="quantity" class="form-label">Số Lượng</label>
            <input type="number" name="products[${productIndex}][quantity]" class="form-control" min="1" required>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-danger remove-product">Xóa</button>
            </div>
            `;
            productList.appendChild(newProduct);
            productIndex++;
        });

        document.getElementById('product-list').addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-product')) {
                e.target.closest('.product-item').remove();
            }
        });
    </script>
@endsection
