  @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                    @endif
                      @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                    @endif

 <div class="col-md-9 col-sm-9">
         <table class="table table-bordered table-responsive table-striped">  
    <tr>
        <th >ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Quanty</th>
        <th>Action</th>
        <th>
            ToTal
        </th>
    </tr>
   
    @foreach($cartItems as $car)
         <tr>
            <td>{{$car->id}}</td>
            <td>{{$car->name}}</td>
            <td>     
                <img src="source/image/product/{{$car->options->img}}" width="100px" height="50px">
               
            </td>
            <td>{{number_format($car->price)}} VNĐ</td>
           
            <form action="cap-nhat-gio/{{$car->rowId}}"  method="GET">
              <input type="hidden" name="_token" value="{!!csrf_token()!!}">
              
             <td class="cart_quantity" width="80px">
                <input type="hidden" id="rowId" name="rowId" value="{{$car->rowId}}">
                <input type="hidden" id="proId" name="proId" value="{{$car->id}}">
                <input class="qty" id="upcart" type="number"  value="{{$car->qty}}" min="1" max="10" name="qty" size="3">
                              
                         
             </td>
            <td class="action">
                <a class="updatecart" id="{{$car->rowId}}"><span class="glyphicon glyphicon-refresh" style="color: blue;"></span></a>   
                <a href="cart/removeCart/{{$car->rowId}}" ><span class="glyphicon glyphicon-remove" style="color: red;"></span></a>        
             </td>
            </form>
            <td>
              {{$car->total()}}
            </td>
                
        </tr><!--end dong 1-->
        <tr>
            
        </tr>
        @endforeach  
    </table>
    </div><!--menu left sp mua-->
    <div class="col-md-3 col-sm-3">
        <h4 id="custom">Thông tin đơn hàng</h4>
        <div>
            <span>Tạm tính: {{Cart::subtotal()}} VND</span>
            
        </div>
        <div>
            <span>Tổng tiền (đã gồm VAT): {{Cart::subtotal()}} vnđ</span>
            <!--number_format($cartItems->subtotal-->
        </div>

    </div><!--menu right bill total-->
   
</div>
<br>
@section('script')
<script type="text/javascript" src="/source/assets/dest/js/cart.js"></script>
@endsection