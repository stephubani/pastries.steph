$(document).ready(function(){
  // function add_cart(){
 
  // }
  $('.add_cart').click(function(event){
      addToCart(event)
     
  });

  function addToCart(event){
    var product_details = $(event.target).closest('.product_details');
    var product_id = product_details.find(".product_id").val();
    // alert(product_id);
    // return;
    
     $.ajax({
         type: 'GET',
         url: 'process/process_add_tocart.php',
         data: {'product_id': product_id},
         success: function(response){
             // // Update the cart count 
  
             $('#cart_system').text(response);
             console.log(response);
         }
     });
  }
    
    // sorting category.

    function sorting(){
      var selectedSortType = $('#sort_type').val();
      var product = document.querySelector('input[name="product"]:checked')?.value;
      var flavour = document.querySelector('input[name="flavour"]:checked')?.value;
      $.ajax({
        type: 'POST',
        url:'process/process_category.php',
        data: {
          'sort_type': selectedSortType,
          'product':product,
          'flavour':flavour,
        },
        success : function(response){
          $('.sorted_product').html(response);
        
        }
      });
    }

    $('#sort_type').change(function() {
      sorting();
    })


    $('.js-product').click(function(){
      sorting();
    })

    $('.js-flavour').click(function(){
      sorting();
    })

  });