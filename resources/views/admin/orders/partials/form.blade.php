@csrf

<div class="d-flex justify-content-between">
  <div class="col-md-9">
    <div class="card">
      <div class="card-header"><b>Create Order</b></div>
      <div class="card-body">
        {{-- Add order --}}
        <div class="input-group mb-3" id="inputField0">
          <select class="custom-select inputGroup" id="order">
            @include('admin.orders.partials.loop');
          </select>
          <button class="btn btn-md btn-success mb-3 mx-2 text-center" id="addOrder" type="button">ADD</button>
        </div>
    
        <div class="form-group row mb-0 px-3">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="orderType" value="dine-in" checked>
            <label class="form-check-label">
              Dine-in
            </label>
          </div>
          <div class="form-check ml-3">
            <input class="form-check-input" type="radio" name="orderType" value="take-out">
            <label class="form-check-label">
              Take-out
            </label>
          </div>
    
          <table class="table">
            <thead>
              <tr>
                <th scope="col" class="text-center">ID#</th>
                <th scope="col" class="text-center">Product</th>
                <th scope="col" class="text-center">Qty</th>
                <th scope="col" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody id="orderList">
              {{-- orders here --}}
            </tbody>
          </table>
        </div>
        <input type="hidden" name="queueCount" id="queueCount" value="1">
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary mx-3">Create Order</button>
      <a href="{{ route('admin.orders.index') }}" type="button" class="btn btn-danger">Cancel</a>
    </div>
  </div>
</div>