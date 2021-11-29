@csrf

<div class="d-flex justify-content-between">
  <div class="col-md-9">
    <div class="card">
      <div class="card-header"><b>Create Order</b></div>
      <div class="card-body">
        {{-- Add order --}}
        <div class="input-group mb-3" id="inputField0">
          <button class="btn btn-md btn-success mb-3" id="addOrder" type="button">+</button>
          <select class="custom-select inputGroup" id="order">
            <option selected>Choose...</option>
            @include('admin.orders.partials.loop');
          </select>
          <input class="col-2" type="number" min="1" value="1" id="orderQty">
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
                <th scope="col">ID#</th>
                <th scope="col">Product</th>
                <th scope="col">Qty</th>
                <th scope="col">Action</th>
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
      <button type="submit" class="btn btn-primary">Create Order</button>
    </div>
  </div>
</div>