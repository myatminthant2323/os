@extends('frontendtemplate')

@section('title' , 'Cart Page')

@section('content')
	<!-- <div class="container">
		<h4>Cart Page</h4>
	</div> -->
	<div class="container animated animatedFadeInUp fadeInUp cart_container">

    
        
<!--     <h2 class="py-5">Shopping Cart <span class="total_item"></span></h2>
    <div class="row">
      <div class="col-md-8 cart_item">

      </div>
      <div class="col-md-3 shadow">
        <h3 class="mb-2 mt-3">Order Summary</h3>
        <hr style="border: 1px solid black;">
        
      </div>
    </div> -->
      

    <hr>

  </div>

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
                    
                //     var f = my_cart_obj.product_list.splice(i, 1);
                //     console.log(f);
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
          var html = `<h2 class="py-5">Shopping Cart <span class="total_item"></span></h2>`;
          // $(".cartbody").html(cart_detail_html);
          if(my_cart_obj.product_list){
            if(my_cart_obj.product_list.length){
              var total=0;
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
                <div class="row px-5 pt-4 my-1 shadow">
                <div class="col-md-4">
                <img src='${photo}' class='img-fluid'>
                </div>
                <div class="col-md-8">
                <h3 class="mt-3">${name}</h3>

                <table class="table borderless">
                <thead>
                <tr>
                <th style="border-bottom: 0; border-top: 0; padding-left: 0px; padding-right: 0px;">Item Number</th>
                <th style="border-bottom: 0; border-top: 0; padding-left: 0px; padding-right: 30px;">Price</th>
                <th style="border-bottom: 0; border-top: 0; padding-left: 0px; padding-right: 0px;">Quantity</th>
                <th style="border-bottom: 0; border-top: 0; padding-left: 0px; padding-right: 0px;">SubTotal</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <td style="border-bottom: 0; border-top: 0; padding-left: 0px; padding-right: 0px;">${codeno}</td>
                <td style="border-bottom: 0; border-top: 0; padding-left: 0px; padding-right: 0px;">${price}</td>
                <td style="border-bottom: 0; border-top: 0; padding-left: 0px; padding-right: 0px;"><button class='btn btn-danger btn-sm btn_minus mx-3' data-id=${id}>-</button>${quantity}<button class='btn btn-warning btn-sm  btn_plus mx-3 text-white'  data-id=${id}>+</button></td>
                <td style="border-bottom: 0; border-top: 0; padding-left: 0px; padding-right: 0px;">${subtotal}</td>
                </tr>
                </tbody>
                </table>
                <p class="mt-5">Save for later | Remove</p> 
                </div>
                </div>
                `;
              });
              // html = html+`<tr><td colspan=5 class='text-center'>Total</td><td>${total}</td></tr>`;
              $(".cart_container").html(html);

              var total_item = "("+my_cart_obj.product_list.length+" items)";
                $(".total_item").html(total_item);


            }else{
              $(".cart_container").html('<h3 class="my-5">Your Cart is Empty</h3>');
              
            }
          }else{
            $(".cart_container").html('<h3 class="my-5">Your Cart is Empty</h3>');
            
          }
        }else{
          $(".cart_container").html('<h3 class="my-5">Your Cart is Empty</h3>');
          
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