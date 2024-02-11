<div class="table-responcive overflow-x-auto">
  <table id="example" class="table table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Catalogue Name</th>
            <th>Product Name</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Notes</th>
            <th>Order Date</th>
          
        </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
      <tr>
        <td>{{$product->catname}}</td>
        <td> {{$product->name}} </td>
        <td> <img src="{{ asset('product_images/' . $product->product_themlin) }}" alt="" width="60px"></td>
        <td> {{$product->quantity}} </td>
        <td> {{$product->total_amount}} </td>
        <td> {{$product->discount}}% </td>
        <td> {{$product->notes}} </td>
        <td> {{date('j M Y', strtotime($product->orderdate))}} </td>
  
    </tr> 
      @endforeach
    </tfoot>
</table>
</div>
<script>
      $(document).ready(function() {
    $('#example').DataTable();
});
</script>