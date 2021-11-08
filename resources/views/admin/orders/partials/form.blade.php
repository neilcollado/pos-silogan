@csrf

<div class="input-group mb-3" id="inputField0">
  
  <button class="btn btn-md btn-success mb-3" id="addOrder" type="button">+</button>
  <select class="custom-select inputGroup" id="order">
    <option selected>Choose...</option>
    @include('admin.orders.partials.loop');
  </select>
  <input class="col-2" type="number" min="1" value="1" id="orderQty">
</div>

<div class="form-group row mb-0">
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
      <tr>
        <th scope="row">1</th>
        <td>
          <input type="text" name="orders[]" value="Porksilog" disabled>
          <input type="hidden" name="orders[]" value="1">
        </td>
        <td>
          <input type="number" name="orderQty[]" id="orderQty1" value="5" readonly="readonly">
        </td>
        <td>
          <button class="btn btn-md btn-danger removeField" type="button">X</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<input type="hidden" name="queueCount" id="queueCount" value="1">

<div class="form-group row mb-0">
  <div class="col-md-6 offset-md-4">
      <button type="submit" class="btn btn-primary">
        Create Order
      </button>
  </div>
</div>