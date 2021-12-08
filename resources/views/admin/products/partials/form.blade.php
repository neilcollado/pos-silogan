@csrf
<div class="form-group row">
    <label for="prodname" class="col-md-4 col-form-label text-md-right">Product Name:</label>

    <div class="col-md-6">
        <input id="prodname" type="text" class="form-control @error('prodname') is-invalid @enderror" name="prodname"
         value="{{ old('prodname') }}@isset($product){{$product->ProdName}}@endisset" required autocomplete="prodname" autofocus>

        @error('prodname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="desc" class="col-md-4 col-form-label text-md-right">Product Description:</label>

    <div class="col-md-6">
        <input id="desc" type="text" class="form-control @error('desc') is-invalid @enderror" name="desc"
         value="{{ old('desc') }}@isset($product){{$product->ProdDescription}}@endisset">

        @error('desc')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="unitprice" class="col-md-4 col-form-label text-md-right">Unit Price</label>

    <div class="col-md-2">
        <input id="unitprice" type="number" min="0" max="100000" step="1" value="{{ old('unitprice') }}@isset($product){{ $product->UnitPrice }}@endisset" class="form-control @error('unitprice') is-invalid @enderror" 
        name="unitprice" required>
        
        @error('unitprice')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

    <div class="col-md-3">
        <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" 
        required>
            @isset($product)
                <option value="{{ $product->category_id }}">{{ $category->CategoryName }}</option>
            @endisset
            <option value="1">Silog</option>
            <option value="2">Beverages</option>
            <option value="3">Add-On</option>
        </select>
        
        @error('category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    @isset($product)
        <label for="isAvailable" class="col-md-4 col-form-label text-md-right">Availability:</label>
        @if ($product->isAvailable == 1)
        <div class="col-md-6">
            <div class="form-check">   
                <input class="form-check-input" type="radio" name="isAvailable" id="isAvailable1" value="1" checked>
                <label class="form-check-label" for="isAvailable1">
                    Available
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="isAvailable" id="isAvailable1" value="0">
                <label class="form-check-label" for="isAvailable1">
                    Unavailable
                </label>
            </div>
        </div>
        @else
        <div class="col-md-6">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="isAvailable" id="isAvailable1" value="1">
                <label class="form-check-label" for="isAvailable1">
                    Available
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="isAvailable" id="isAvailable1" value="0" checked>
                <label class="form-check-label" for="isAvailable1">
                    Unavailable
                </label>
            </div>
        </div>
        @endif
    @endisset
</div>

<div class="form-group row">
    {{-- Product picture --}}
    <label for="prodpicture" class="col-md-4 col-form-label text-md-right" >Upload</label>
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
        <button type="submit" class="btn btn-warning">Edit</button>    
        @else
        <button type="submit" class="btn btn-success">Add Product</button>   
        @endif
        <a href="{{ route('admin.products.index') }}" type="button" class="btn btn-danger">Cancel</a>
    </div>
</div>