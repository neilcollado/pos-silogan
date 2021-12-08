<script>
  $(document).ready(function(){
    var count = 0;

    $("#addOrder").click(function() {
      $orderName = $("#order").find(":selected").text();
      $orderid = $("#order").find(":selected").val();
      $qty = $("#orderQty").val();

      count++;
      var tr = $('<tr></tr>');
      var th = $('<th scope"row" class="text-center">' + $orderid +'</th>');
      var td1 = $('<td class="text-center"></td>');
      var td2 = $('<td class="text-center"></td>');
      var td3 = $('<td class="text-center"></td>');

      tr.append(th);

      //Product Name
      // var placeholder = $('<input type="text" name="order'+ count +'" value="' + $orderName +'" disabled>');
      var placeholder = $('<input type="text" name="orders[]" value="' + $orderName +'" disabled>');
      // var hidden = $('<input type="hidden" name="order'+ count +'" value="' + $orderid +' ">');
      var hidden = $('<input type="hidden" name="orders[]" value="' + $orderid +' ">');
      td1.append(placeholder);
      td1.append(hidden);
      tr.append(td1);

      //Product Qty
      var qty = $('<input type="number" name="orderQty[]" id="orderQty'+ count +'" value="1" style="width:50px; height: 33px" class="text-center" readonly="readonly">');
      var decBtn = $('<button class="btn btn-md btn-danger decrement mx-2" type="button">-</button>');
      var incBtn = $('<button class="btn btn-md btn-success increment mx-2" type="button">+</button>');
      td2.append(decBtn);
      td2.append(qty);
      td2.append(incBtn);
      tr.append(td2);
      
      //Delete Queue
      var btn = $('<button class="btn btn-md btn-danger removeField" type="button">X</button>');
      td3.append(btn);
      tr.append(td3);
          
      $('#orderList').append(tr);
      $("#queueCount").val(count);
    });

    $(document).on('click', '.removeField', function(){
      $(this).parent().parent().remove();
      count--;
      $("#queueCount").val(count);  
    });

    $(document).on('click', '.increment', function(){
      var val = $(this).prev().val();
      $(this).prev().val(++val);
    });

    $(document).on('click', '.decrement', function(){
      var val = $(this).next().val();
      if(val != 1) {
        $(this).next().val(--val);
      }
    });
  });
</script>

