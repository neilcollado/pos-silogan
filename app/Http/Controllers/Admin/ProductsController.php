<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $sortColumnName = 'created_at';

    public $sortDirection = 'desc';

    public function __construct()
    {
        $this->middleware('isAdmin')->except('index','show');
    }

    public function index()
    {
        $products = Products::orderBy($this->sortColumnName, $this->sortDirection)->paginate(10);

        return view('admin.products.index')
        ->with('products', $products);
    }

    public function sortBy($columnName)
    {
        dd("clicked");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Products;
        $product->ProdName = request('prodname');
        $product->ProdDescription = request('desc');
        $product->UnitPrice = request('unitprice');
        $product->category_id = request('category');

        if($request->hasFile('prodpicture')) {
            $file = $request->file('prodpicture');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/products', $filename);
            $product->ProdPicture = $filename;
        } 

        $product->save();

        $request->session()->flash('success', 'Created Successfully');
        return redirect(route('admin.products.index'));
    }  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.products.show', ['product' => Products::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        $category = Category::find($product->category_id);

        return view('admin.products.edit', ['product' => $product, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        $product->ProdName = request('prodname');
        $product->ProdDescription = request('desc');
        $product->UnitPrice = request('unitprice');
        $product->category_id = request('category');
        $product->isAvailable = request('isAvailable');

        if($request->hasFile('prodpicture')) {
            $file = $request->file('prodpicture');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/products', $filename);
            $product->ProdPicture = $filename;
        } else {
            $product->ProdPicture = $product->ProdPicture;
        }
        $product->save();

        $request->session()->flash('success', 'Updated Successfully');
        return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Products::destroy($id);

        $request->session()->flash('success', 'Deleted Successfully');
        return redirect(route('admin.products.index'));
    }
}
