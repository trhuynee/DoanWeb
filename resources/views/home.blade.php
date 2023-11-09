@extends('layouts.app')

@section('title','Home')

@section('header')
    @parent
@endsection

@section('content')
    <a href="{{route('products.index')}}"style="text-align: center; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:50px">Danh sách sản phẩm</a>
@endsection
