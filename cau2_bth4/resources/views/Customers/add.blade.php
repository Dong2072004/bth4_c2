@extends('welcome')
@section('title', 'Form thêm khách hàng')

@section('main')
    <div class="container">
        <h1>Thêm khách hàng</h1>

        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên khách hàng:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <textarea class="form-control" id="address" name="address" required></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <textarea class="form-control" id="phone" name="phone" required></textarea>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <textarea class="form-control" id="email" name="email" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">THÊM</button>
        </form>

    </div>
@endsection
