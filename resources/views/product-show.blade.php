@extends('layouts.app')

@section('title', 'Product details')

@section('header')
    @parent
    &gt; <a href="{{ route('products.index') }}">Products</a>
    &gt; {{ $p->name }}
@endsection


@section('content')

    <a href="{{ route('products.edit', ['product' => $p]) }}" class="btn btn-primary">Sửa</a>
    <form method="post" action="{{ route('products.destroy', ['product' => $p]) }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="xóa" class="btn btn-warning">
    </form>


    <br>
    <div class="col-md-3 mb-2">
        <div class="card" style="font-size: 20px">
            <img style="width:500px;max-height:300px;object-fit:contain;margin-top:10px;" src="{{ $p->image }}" />
            <h1 style="text-align: center">{{ $p->name }}</h1>
            <span>Loại: {{ $p->category->name }}</span>
            <span>Giá: {{ $p->price }}</span>
            <span>Mô tả: {{ $p->desc }}</span>
            <div style="margin-bottom: 10px;text-align: center ">
                <button class="btn btn-success">Thêm vào giỏ hàng</button>
            </div>
        </div>
    </div>
@endsection
