@extends('layouts.app')

@section('title', 'Add product')

@section('header')
    @parent
    &gt; <a href="{{ route('products.index') }}">Products</a>
@endsection

@section('content')
    <h1 style="text-align: center; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:40px">Thêm sản phẩm</h1>
    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <label>Tên sản phẩm:</label>
        <input name="name" value="{{ old('name') }}">
        <br>
        @if ($errors->has('name'))
            {{ $errors->first('name') }}
            <br>
        @endif

        <label>Giá:</label>
        <input name="price" value="{{ old('price') }}">
        <br>
        @if ($errors->has('price'))
            {{ $errors->first('price') }}
        <br>
        @endif

        <label>Loại sản phẩm:</label><br>
        <select name="category">
            <option value=''>--Chọn loại--</option>
            @foreach ($lst as $cat)
                <option value="{{ $cat->id }}" @if ($cat->id == old('category')) selected @endif>{{ $cat->name }}</option>
            @endforeach
        </select>
        <br>

        @if ($errors->has('category')){{ $errors->first('category') }}<br>@endif
        <br>
        <br>
        <label>Mô tả: </label>
        <textarea name="desc"></textarea> <br>
        @if ($errors->has('desc'))
            {{ $errors->first('desc') }} <br>
        @endif

        <label>Hình: </label><input type="file" accept="image/*" name="image"><br>
        @if ($errors->has('image'))
            {{ $errors->first('image') }} <br>
        @endif
        <input type="submit">
        <br>
        <br>
    </form>



</form>
@endsection
