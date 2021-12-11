@csrf
<input placeholder="Product Name" type="text" class="@error('name') is-invalid @enderror" name="prodname" value="{{ old('prodname') }}@isset($product){{$product->ProdName}}@endisset" required autocomplete="prodname" autofocus>
        @error('prodname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

<input placeholder="Product Description" type="text" class="@error('desc') is-invalid @enderror" name="desc" value="{{ old('desc') }}@isset($product){{$product->ProdDescription}}@endisset">
        @error('desc')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

<input placeholder="Unit Price" type="number"  min="0" max="100000" step="1" name="unitprice" class="@error('unitprice') is-invalid @enderror" value="{{ old('unitprice') }}@isset($product){{ $product->UnitPrice }}@endisset" required>
        @error('unitprice')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

<select name="category" class="@error('category') is-invalid @enderror" required>
        @isset($product)
            <option value="{{ $product->category_id }}">{{ $category->CategoryName }}</option>
        @endisset
            <option value="1">Silog</option>
            <option value="2">Beverages</option>
            <option value="3">Add-On</option>
        @error('category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
</select>

<div>
    @isset($product)
        <label for="isAvailable">Availability:</label>
        @if ($product->isAvailable == 1)
        <div style="white-space: nowrap">
            <div style="width: 60%">   
                <input type="radio" name="isAvailable" id="isAvailable1" value="1" checked>
                <label for="isAvailable1" style="margin-left:-60px">
                    Available
                </label>
            </div>
            <div style="width: 60%">
                <input type="radio" name="isAvailable" id="isAvailable1" value="0">
                <label for="isAvailable1" style="margin-left:-60px">
                    Unavailable
                </label>
            </div>
        </div>
        @else
        <div style="white-space: nowrap">
            <div style="width: 60%">
                <input type="radio" name="isAvailable" id="isAvailable1" value="1">
                <label for="isAvailable1" tyle="margin-left:-60px">
                    Available
                </label>
            </div>
            <div style="width: 60%">
                <input type="radio" name="isAvailable" id="isAvailable1" value="0" checked>
                <label for="isAvailable1" tyle="margin-left:-60px">
                    Unavailable
                </label>
            </div>
        </div>
        @endif
    @endisset
</div>

<div class="form-group row">
    {{-- Product picture --}}
    <label for="prodpicture" class="col-md-4 col-form-label text-md-right" >Image</label>
    @isset($product)
    <div class="img-box">
        <img src="{{ asset('uploads/products/' . $product->ProdPicture) }}" alt="product image" 
        class="img-thumbnail w-75" style="max-width: 40vh">
    </div>
    @endisset

    <div class="col-md-12 col-form-label text-center">
        <input id="prodpicture" type="file" class="btn btn-sm @error('prodpicture') is-invalid @enderror" 
        name="prodpicture">
        @error('prodpicture')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>                                           
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        @if (isset($product))
        <button type="submit" class="btn btn-warning" style="white-space:nowrap; margin-left: -100px; height:50px">Edit</button>    
        @else
        <button type="submit" class="btn btn-success" style="white-space:nowrap; margin-left: -100px; height:50px">Add Product</button>   
        @endif
        <a href="{{ route('admin.products.index') }}" type="button" class="btn btn-danger" style="height:50px; padding-top:12px">Cancel</a>
    </div>
</div>