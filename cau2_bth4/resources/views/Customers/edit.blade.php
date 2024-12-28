@extends('welcome')
@section('title', 'Form sửa khách hàng')

@section('main')
    <div class="container">
        <h1></h1>

        <form action="{{ route('customers.update', $customers) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên khách hàng:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $customers->name }}">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <textarea class="form-control" id="address" name="address" required>{{ $customers->address }}</textarea>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <textarea class="form-control" id="phone" name="phone">{{ $customers->phone }}</textarea>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <textarea class="form-control" id="email" name="email">{{ $customers->email }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>

    </div>
@endsection
