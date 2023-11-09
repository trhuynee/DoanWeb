@extends('layouts.app')

@section('title','Product List')

@section('header')
    @parent
    &gt; <a href="{{route('products.index');}}">Products</a>
@endsection


@section('content')
    <h1 style="text-align: center; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:50px">Danh sách sản phẩm</h1>
    <a class="btn btn-primary" style="text-align: center" href="{{route('products.create')}}"><i class='fa fa-plus'></i> Thêm</a>
    <br><br>

    <div class="row">
        @foreach ($lst as $p )
            <div class="col-md-3 mb-2"  style="font-size: 20px; text-align: center;">
                <div class="card" >
                    <img style="width:400px;max-height:300px;object-fit:contain; margin-top:30px;" src="{{$p->image}}">
                    <a href="{{route('products.show',['product'=>$p])}}">{{$p->name}}</a>
                </div>
            </div>

        @endforeach

    </div>
@endsection
