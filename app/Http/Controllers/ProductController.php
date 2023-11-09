<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected function fixImage(Product $p)
    {
        if ($p->image && storage::disk('public')->exists($p->image)) {
            $p->image = storage::url($p->image);
        } else {
            $p->image = '/img/no_image.png';
        }
    }
    public function index()
    {
        $lst = Product::all();
        foreach ($lst as $p) {
            $this->fixImage($p);
        }
        return view('product-index', ['lst' => $lst]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lst = Category::all();
        return view('product-create', ['lst' => $lst]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $p = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category,
            'desc' => $request->desc,
            //hình ảnh update sau khi có id sản phẩm
            'image' => ''
        ]);
        //đường dẫn lưu hình ảnh có id sản phẩm để dễ quản lí
        $path = $request->image->store('upload/product/' . $p->id, 'public');
        $p->image = $path;
        $p->save();
        //có thể tạo view cho route này nếu muốn, hoặc reditect về trang dssp
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $this->fixImage($product);
        return view('product-show', ['p' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $this->fixImage($product);
        $lst = Category::all();
        return view('product-edit', ['p' => $product, 'lst' => $lst]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //Kiểm tra có cập nhật hay không
        $path = $product->image;
        if ($request->hasFile('image') && $request->image->isValid()) {
            $path = $request->image->store('upload/product/' . $product->id, 'public');
        }
        $product->fill([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category,
            'desc' => $request->desc,
            'image' => $path
        ]);
        $product->save();
        //có thể tạo view cho route này nếu muốn, hoặc reditect về trang chi tiết sản phẩm
        return redirect()->route('products.show', ['product' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        //có thể tạo view cho route này nếu muốn, hoặc redirect về trang dssp
        return redirect()->route('products.index');
    }
}