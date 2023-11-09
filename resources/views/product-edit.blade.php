@extends('layouts.app')

@section('title', 'Edit product')

@section('header')
    @parent
    &gt; <a href="{{ route('products.index') }}">Products</a>
@endsection

@section('content')
    <form method="post" action="{{ route('products.update',['product'=>$p])}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Tên sản phẩm:</label>
        <input name="name" value="{{ old('name',$p->name) }}"><br>
        @if ($errors->has('name')){{ $errors->first('name') }} <br>@endif

        <label>Giá:</label>
        <input name="price" value="{{ old('price',$p->price) }}"><br>

        @if ($errors->has('price')) {{ $errors->first('price') }} <br>@endif

        <label>Loại sản phẩm:</label><br>
        <select name="category">
            <option value=''>--Chọn loại ---</option>
            @foreach ($lst as $cat)
                <option value="{{ $cat->id }}" @if ($cat->id == old('category',$p->category_id)) selected @endif>{{ $cat->name }}
                </option>
            @endforeach
        </select><br>

        @if ($errors->has('category')){{ $errors->first('category') }}<br> @endif
        <br>
        <br>
        <label>Mô tả: </label><textarea name="desc">{{old('desc',$p->desc)}}</textarea> <br>
        @if ($errors->has('desc')){{ $errors->first('desc') }} <br>@endif

        <label>Hình: </label> <br>
        <img style="width:300px;max-height:300px;object-fit:contain;" src="{{$p->image}}" ><br>
        <input type="file" accept="image/*" name="image"><br>
        @if ($errors->has('image')) {{ $errors->first('image') }} <br>@endif
        <input type="submit">
        <br>
        <br>
    </form>
@endsection
