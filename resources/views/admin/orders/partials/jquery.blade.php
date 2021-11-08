<script>
  $(document).ready(function(){
    var count = 1;

    $("#addOrder").click(function() {
      $orderName = $("#order").find(":selected").text();
      $orderid = $("#order").find(":selected").val();
      $qty = $("#orderQty").val();

      count++;
      var tr = $('<tr></tr>');
      var th = $('<th scope"row">' + $orderid +'</th>');
      var td1 = $('<td></td>');
      var td2 = $('<td></td>');
      var td3 = $('<td></td>');

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
      var qty = $('<input type="number" name="orderQty[]" id="orderQty'+ count +'" value="'+ $qty +'" readonly="readonly">');
      td2.append(qty);
      tr.append(td2);
      
      //Delete Queue
      var btn = $('<button class="btn btn-md btn-danger removeField" type="button">X</button>')
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
    


  });
</script>

