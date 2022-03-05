@extends('frontendtemplate')

@section('title' , 'Cart Page')

@section('content')
	<!-- <div class="container">
		<h4>Cart Page</h4>
	</div> -->
	<div class="container-fluid animated animatedFadeInUp fadeInUp cart_container">

    <h2 class="pt-5 pb-2 ml-5">Shopping Cart <span class="total_item" style="color:#ccbd0f;"></span></h2>
    <div class="row mx-4">
      <div class="col-md-8 cart_item">

      </div>
      <div class="col-md-4 order_summery">
        <div class="row ml-1">
          <div class="col-md-12 my-1 shadow">
            <h3 class="mb-2 mt-3">ORDER SUMMERY</h3>
            <hr>
            <div class="row">
              <div class="col-8 total-label">
                <p>Shipping cost</p>
              </div>
              <div class="col-4">
                <p class="text-right shipping-cost">FREE</p>
              </div>
            </div>
            <div class="row">
              <div class="col-8 total-label">
                <p>Estimated Tax</p>
              </div>
              <div class="col-4">
                <p class="text-right tax">0 MMK</p>
              </div>
            </div>
            <hr class="mt-0 pt-0">
            <div class="row">
              <div class="col-8 total-label">
                <p>Estimated Total</p>
              </div>
              <div class="col-4">
                <p class="text-right total"></p>
              </div>
            </div>
            <div class="row mt-2 mb-3">
              <div class="col-12">
                @auth
                <a href="#" class="btn btn-primary btn-block checkout" style="background-color: black;">
                  Checkout
                </a>
                @else
                <a href="{{route('login')}}" class="btn btn-primary btn-block checkout" style="background-color: black;">
                  Login to Checkout
                </a>
                @endauth
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <div class="row mt-2 mb-3 ml-1 continue_shopping">
          <a href="{{route('homepage')}}" class="btn btn-primary float-right" style="background-color: black;">
                  Continue Shopping
        </a>
        
        
      </div>
    </div>
    <hr>

  </div>

  <!-- <div class="container py-2">
    <a href="#" class="btn btn-success float-right checkout">Checkout</a>
  </div> -->



@endsection

@section('script')
	<script type="text/javascript" src="{{asset('frontendtemplate/js/custom.js')}}">
		
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			showTable();

      show_product_count();

      $(".cart_container").on('click','.btn_plus',function(){
            // alert('plus');
            var id = $(this).data('id');
           // alert(id);
           change_product_quantity(1,id);


         })
      $(".cart_container").on('click','.btn_minus',function(){
            // alert('minus');
            var id = $(this).data('id');
            change_product_quantity(2,id);
          });

      $(".cart_container").on('click','.remove',function(){
            // alert('minus');
            event.preventDefault();
            var id = $(this).data('id');
            var my_cart = localStorage.getItem('my_cart');
            var my_cart_obj = JSON.parse(my_cart);
            $(my_cart_obj.product_list).each(function(i,v){
              if(v.id == id){

                var ans = confirm('Are You Sure to delete?');
                if(ans){
                  // console.log(my_cart_obj.product_list[1]);
                  my_cart_obj.product_list.splice(i, 1);
                  // console.log(my_cart_obj.product_list[0]);
                  localStorage.setItem('my_cart',JSON.stringify(my_cart_obj));
                  showTable();
                  show_product_count();
                }
              }
            });
          });

      function change_product_quantity(type,id){
        var my_cart = localStorage.getItem('my_cart');
        var my_cart_obj = JSON.parse(my_cart);
        $(my_cart_obj.product_list).each(function(i,v){
          if(v.id == id){
            if(type == 1){
              v.quantity++;
            }else{
              if(v.quantity == 1){
                // swal({
                //   title: "Are you sure to delete?",
                //   text: "Are you sure to remove this item from your cart?",
                //   icon: "warning",
                //   buttons: true,
                //   dangerMode: true,
                // })
                // .then((willDelete) => {
                //   if (willDelete) {
                    
                //     my_cart_obj.product_list.splice(i, 1);
                    
                //   }
                // });
                var ans = confirm('Are You Sure to delete?');
                if(ans){
                  my_cart_obj.product_list.splice(i, 1);
                }
              }else{
                v.quantity--;

              }
            }
          }
        });

        localStorage.setItem('my_cart',JSON.stringify(my_cart_obj));
        // console.log(localStorage.getItem('my_cart'));
        showTable();
        show_product_count();

      }

      function showTable(){
        var my_cart = localStorage.getItem('my_cart');
        if(my_cart){
          var my_cart_obj = JSON.parse(my_cart);
          // var html = `<h2 class="py-5">Shopping Cart <span class="total_item" style="color:#ccbd0f;"></span></h2>`;
          // $(".cartbody").html(cart_detail_html);
          if(my_cart_obj.product_list){
            if(my_cart_obj.product_list.length){
              var html = ''; var total=0;
              $(my_cart_obj.product_list).each(function(i,v){
                var id = v.id;
                var codeno = v.codeno;
                var name = v.name;
                var photo = v.photo;
                var price = v.price;
                var quantity = v.quantity;
                var subtotal = quantity*price;
                total+=subtotal;
                

                

                html += `
      <div class="row px-5 pt-4 my-1 mr-1 shadow">
        <div class="col-md-4">
          <a href="/itemdetail/${id}">
            <img src='${photo}' class='img-fluid'>
          </a>
        </div>
        <div class="col-md-8">
          <a href="/itemdetail/${id}" style="color:#000;">
            <h3 class="mt-3">${name}</h3>
          </a>
          <table class="table borderless">
            <thead>
              <tr>
                <th style="border-bottom: 0; border-top: 0; padding-left: 0px; padding-right: 0px;">Item Number</th>
                <th style="border-bottom: 0; border-top: 0; padding-left: 0px; padding-right: 30px;">Price</th>
                <th style="border-bottom: 0; border-top: 0; padding-left: 0px; padding-right: 0px;">Quantity</th>
                <th style="border-bottom: 0; border-top: 0; padding-left: 0px; padding-right: 0px;">SubTotal</th>
                <th style="border-bottom: 0; border-top: 0; padding-left: 0px; padding-right: 0px;"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="border-bottom: 0; border-top: 0; padding-left: 0px; padding-right: 0px;">${codeno}</td>
                <td style="border-bottom: 0; border-top: 0; padding-left: 0px; padding-right: 0px;">${price}</td>
                <td style="border-bottom: 0; border-top: 0; padding-left: 0px; padding-right: 0px;"><button class='btn btn-danger btn-sm btn_minus mx-3' data-id=${id}>-</button>${quantity}<button class='btn btn-warning btn-sm  btn_plus mx-3 text-white'  data-id=${id}>+</button></td>
                <td style="border-bottom: 0; border-top: 0; padding-left: 0px; padding-right: 0px;">${subtotal}</td>
                <td style="border-bottom: 0; border-top: 0; padding-left: 10px; padding-right: 0px;"><a href="#" style="color:#000;" class="remove hvr-icon-pulse-grow" data-id=${id}><i class="fas fa-times hvr-icon"></i></a></td>
              </tr>
            </tbody>
          </table>
          <p class="mt-5"><a href="#" style="color:#000;">Save for later</a> | <a href="#" style="color:#000;" class="remove" data-id=${id}>Remove</a></p> 
        </div>
      </div>
                `;
              });
              // html = html+`<tr><td colspan=5 class='text-center'>Total</td><td>${total}</td></tr>`;
              $(".cart_item").html(html);

              $('.total').html(total+" MMK");

              var total_item = "("+my_cart_obj.product_list.length+" items)";
                $(".total_item").html(total_item);


            }else{
              $(".cart_item").html('<h3 class="my-5 ml-5">Your Cart is Empty</h3>');
              $(".order_summery").hide();
              $(".continue_shopping").hide();
            }
          }else{
            $(".cart_item").html('<h3 class="my-5">Your Cart is Empty</h3>');
            $(".order_summery").hide();
            $(".continue_shopping").hide();
          }
        }else{
          $(".cart_item").html('<h3 class="my-5">Your Cart is Empty</h3>');
          $(".order_summery").hide();
          $(".continue_shopping").hide();
        }
      }

      function show_product_count(){
            // get my_cart JSON from localStorage
            var my_cart = localStorage.getItem('my_cart');
            if(my_cart){

           // parse JSON to Obj
           var my_cart_obj = JSON.parse(my_cart);

           // initialize product_count
           var product_count = 0;

           // loop the product_list array to get total quantity
           if(my_cart_obj.product_list){
            $(my_cart_obj.product_list).each(function(i,v){
              product_count += v.quantity; 
            })
           // show product_count result in Badge
           $(".product_count").html(product_count);
         }
       }
     }

   });



		
 </script>
@endsection