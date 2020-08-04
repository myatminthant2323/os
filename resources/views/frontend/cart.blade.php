@extends('frontendtemplate')

@section('title' , 'Cart Page')

@section('content')
	<!-- <div class="container">
		<h4>Cart Page</h4>
	</div> -->
	<div class="container animated animatedFadeInUp fadeInUp cart_container">

    <h3 class="pt-5 text-center">Shopping Cart</h3>
    <div class="row shadow my-5 mx-5">
      <div class="col-lg-12">
        <div class="row px-5 product_table_row">
          <table class="text-center" style="border: none;" cellpadding="30px;" cellspacing="10px">
            <thead>
              <tr>
                <th>No.</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>SubTotal</th>
              </tr>
            </thead>
            <tbody class="product_list">

            </tbody>

          </table>

        </div>
      </div>
    </div>
    
   <hr>

  </div>

@endsection

@section('script')
	<script type="text/javascript" src="{{asset('frontendtemplate/js/custom.js')}}">
		
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			showTable();
			$(".product_list").on('click','.btn_plus',function(){
            // alert('plus');
            var id = $(this).data('id');
           // alert(id);
           change_product_quantity(1,id);


         })
          $(".product_list").on('click','.btn_minus',function(){
            // alert('minus');
            var id = $(this).data('id');
            change_product_quantity(2,id);
          });

          function change_product_quantity(type,id){
            var my_cart = localStorage.getItem('my_cart');
            var my_cart_obj = JSON.parse(my_cart);
            $(my_cart_obj.product_list).each(function(i,v){
              if(v.id == id){
                if(type == 1){
                  v.quantity++;
                  $(".product_count").html(v.quantity);
                }else{
                  if(v.quantity == 1){
                    var ans = confirm('Are You Sure to delete?');
                    if(ans){
                      my_cart_obj.product_list.splice(i, 1);
                    }
                  }else{
                    v.quantity--;
                    $(".product_count").html(v.quantity);
                  }
                }
              }
            });

            localStorage.setItem('my_cart',JSON.stringify(my_cart_obj));
            showTable();
            show_product_count();
            
          }

          function showTable(){
            var my_cart = localStorage.getItem('my_cart');
            if(my_cart){
              var my_cart_obj = JSON.parse(my_cart);
              if(my_cart_obj.product_list){
                if(my_cart_obj.product_list.length){
                  var html=''; var j=1; var total=0;
                  $(my_cart_obj.product_list).each(function(i,v){
                    var id = v.id;
                    var name = v.name;
                    var photo = v.photo;
                    var price = v.price;
                    var quantity = v.quantity;
                    var subtotal = quantity*price;
                    total+=subtotal;
                    html = html+`<tr>
                    <td>${j}</td>
                    <td><img src="${photo}" width=100 height=100></td>
                    <td>${name}</td>
                    <td>${price}</td>
                    <td><button class='btn btn-danger btn_minus mx-3' data-id=${id}>-</button>${quantity}<button class='btn btn-warning btn_plus mx-3 text-white'  data-id=${id}>+</button></td>
                    <td>${subtotal}</td>
                    </tr>`;
                    j++;
                  });
                  html = html+`<tr><td colspan=5 class='text-center'>Total</td><td>${total}</td></tr>`;
                  $(".product_list").html(html);
                  

                }else{
                  $(".product_table_row").html('<h3 class="my-5">Your Cart is Empty</h3>');
                  $(".btn_order").hide();
                }
              }else{
                $(".product_table_row").html('<h3 class="my-5">Your Cart is Empty</h3>');
                $(".btn_order").hide();
              }
            }else{
              $(".product_table_row").html('<h3 class="my-5">Your Cart is Empty</h3>');
              $(".btn_order").hide();
            }
          }
		});



		
	</script>
@endsection