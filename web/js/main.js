/*price range*/


	


 $('#sl2').slider();
 
       $('.catalog1').dcAccordion({
           speed:300
       });
	   
	   
	   $(function() {
		var offset = $("#fixed").offset();
		var topPadding = 80;
		$(window).scroll(function() {
			if ($(window).scrollTop() > offset.top) {
				$("#fixed").stop().animate({marginTop: $(window).scrollTop() - offset.top + topPadding});
			}
			else {$("#fixed").stop().animate({marginTop: 0});};});
	});
	   
	   function showAdminkomn(cart){
           $('#adminkomn .modal-body').html(cart);
           $('#adminkomn').modal();
       } 
	   
	    function showAdminkomm(cart){
           $('#adminkomm .modal-body').html(cart);
           $('#adminkomm').modal();
       } 
	   
	    function showAdminzemli(cart){
           $('#adminzemli .modal-body').html(cart);
           $('#adminzemli').modal();
       } 
	   
	   function showAdmindom(cart){
           $('#admindom .modal-body').html(cart);
           $('#admindom').modal();
       } 
	   
	    function showAdminproduct(cart){
           $('#adminproduct .modal-body').html(cart);
           $('#adminproduct').modal();
       } 
	   
	    function showAdminkvart(cart){
           $('#adminkvart .modal-body').html(cart);
           $('#adminkvart').modal();
       } 
	   
	    function showMany(cart){
           $('#many .modal-body').html(cart);
           $('#many').modal();
       } 
	   
	   function showReg(cart){
           $('#reg .modal-body').html(cart);
           $('#reg').modal();
       } 
	   
	    function showTel(cart){
           $('#tel .modal-body').html(cart);
           $('#tel').modal();
       } 
	   
	   function showMaps(cart){
           $('#maps .modal-body').html();
           $('#maps').modal();
       } 
	   
	    function showPodrobnee(cart){
           $('#podrobnee .modal-body').html(cart);
           $('#podrobnee').modal();
       } 
	   
	   function showUsers(cart){
           $('#users .modal-body').html(cart);
           $('#users').modal();
       } 
	   
	    function showReg1(cart){
           $('#reg1 .modal-body').html(cart);
           $('#reg1').modal();
       } 
	   
	   function showSearchavto(cart){
           $('#searchavto .modal-body').html(cart);
           $('#searchavto').modal();
       }
	   
	   function showKvart(cart){
           $('#kvart .modal-body').html(cart);
           $('#kvart').modal();
       }
	   
	   function showZemli(cart){
           $('#zemli .modal-body').html(cart);
           $('#zemli').modal();
       }
	   
	   function showKommerch(cart){
           $('#kommerch .modal-body').html(cart);
           $('#kommerch').modal();
       }
	   
	   function showKomnat(cart){
           $('#komnat .modal-body').html(cart);
           $('#komnat').modal();
       }
	   
	   function showPriceprod1(cart){
           $('#priceprod1 .modal-body').html(cart);
           $('#priceprod1').modal();
       }
	   
	   function showPriceprod2(cart){
           $('#priceprod2 .modal-body').html(cart);
           $('#priceprod2').modal();
       }
	   
	   function showPriceprod3(cart){
           $('#priceprod3 .modal-body').html(cart);
           $('#priceprod3').modal();
       }
	   
	   function showPriceprod4(cart){
           $('#priceprod4 .modal-body').html(cart);
           $('#priceprod4').modal();
       }
	   
	   function showPricedom(cart){
           $('#pricedom .modal-body').html(cart);
           $('#pricedom').modal();
       }
	   
	   function showKomnataren(cart){
           $('#komnataren .modal-body').html(cart);
           $('#komnataren').modal();
       }
	   
	   function showSearchleg(cart){
           $('#searchleg .modal-body').html(cart);
           $('#searchleg').modal();
       }
	   
	   function showSearchgruz(cart){
           $('#searchgruz .modal-body').html(cart);
           $('#searchgruz').modal();
       }  
	   
	   function showSearchspec(cart){
           $('#searchspec .modal-body').html(cart);
           $('#searchspec').modal();
       }
	   
	   function showSearchkomplekt(cart){
           $('#searchkomplekt .modal-body').html(cart);
           $('#searchkomplekt').modal();
       }
	   
	   function showSearchvodnik(cart){
           $('#searchvodnik .modal-body').html(cart);
           $('#searchvodnik').modal();
       }
	   
	   function showSearchbiznes(cart){
           $('#searchbiznes .modal-body').html(cart);
           $('#searchbiznes').modal();
       }
	   
	   function showSearchprod(cart){
           $('#searchprod .modal-body').html(cart);
           $('#searchprod').modal();
       }
	   
	   function showSearchsearch(cart){
           $('#searchsearch .modal-body').html(cart);
           $('#searchsearch').modal();
       }
	   
	    function showSearchned(cart){
           $('#searchned .modal-body').html(cart);
           $('#searchned').modal();
       }
	   
	    function showMessage(cart){
           $('#message .modal-body').html(cart);
           $('#message').modal();
       }
	   
	    function showMessag(cart){
           $('#messag .modal-body').html(cart);
           $('#messag').modal();
       }
	   
	    function showMessagg(cart){
           $('#messagg .modal-body').html(cart);
           $('#messagg').modal();
       }
	   
	   /* function showKvartcart(cart){  
            $('#searchkvart .modal-body').html(cart);
           $('#searchkvart').modal();  
       }  */
	   
	      $('.showSearchkvartt').on('click', function (){
           $.ajax({
              url: '/cart/kvart',
              success: function(res){
//                 if (!res) alert ('Ошибка, данной категории товаров нет!');

              showKvartcart (res);
              }, 
              error: function(){ 
                  alert ('Error (Ошибка) !');
              }    
           });
       }); 
	   
	    $('.showSearchdoma').on('click', function (){
           $.ajax({
              url: '/cart/dom',
              success: function(res){
//                 if (!res) alert ('Ошибка, данной категории товаров нет!');

              showDomcart (res);
              }, 
              error: function(){ 
                  alert ('Error (Ошибка) !');
              }    
           });
       }); 
	   
	  /*  function showSearchdoma(cart){
           $('#searchdoma').modal();
       } */
	   
	   function showSearchkomnati(cart){
           $('#searchkomnati').modal();
       }
	   
	    function showSearchkomm(cart){
           $('#searchkomm').modal();
       }
	   
	   function showSearchzemli(cart){
           $('#searchzemli').modal();
       }
	   
	   function showSearchgaragi(cart){
           $('#searchgaragi').modal();
       }
	   
	   function getSearchprod(){
		   alert(123);
	   }
       
       function showCart(cart){
           $('#cart .modal-body').html(cart);
           $('#cart').modal();
       }
	   
	   
       
       $('#cart .modal-body').on('click', '.del-item', function(){
         var id = $(this).data('id');
         
          $.ajax({
              url: '/cart/del-item',
              data: {id: id},
              type: 'GET',
              success: function(res){
               if (!res) alert ('Ошибка');

              showCart (res);
              }
       });
          
       });
       
       
        $('#cart .modal-body').on('click', '.del-itemavto', function(){
         var id = $(this).data('id');
         
          $.ajax({
              url: '/cart/del-itemavto',
              data: {id: id},
              type: 'GET',
              success: function(res){
               if (!res) alert ('Ошибка');

              showCart (res);
              }
       });
          
       });
       
        $('#cart .modal-body').on('click', '.del-itemgruz', function(){
         var id = $(this).data('id');
         
          $.ajax({
              url: '/cart/del-itemgruz',
              data: {id: id},
              type: 'GET',
              success: function(res){
               if (!res) alert ('Ошибка');

              showCart (res);
              }
       });
          
       });
	   
	     $('#messag .modal-body').on('click', '.del-itemmessage', function(){
         var id = $(this).data('id');
         
          $.ajax({
              url: '/cart/del-itemmessage',
              data: {id: id},
              type: 'GET',
              success: function(res){
               if (!res) alert ('Ошибка');

              showCart (res);
              }
       });
          
       });
	   
	     $('#messagg .modal-body').on('click', '.del-itemmessage', function(){
         var id = $(this).data('id');
         
          $.ajax({
              url: '/cart/del-itemmessage',
              data: {id: id},
              type: 'GET',
              success: function(res){
               if (!res) alert ('Ошибка');

              showCart (res);
              }
       });
          
       });
	   
	    $('#cart .modal-body').on('click', '.del-itemgruzz', function(){
         var id = $(this).data('id');
         
          $.ajax({
              url: '/cart/del-itemgruzz',
              data: {id: id},
              type: 'GET',
              success: function(res){
               if (!res) alert ('Ошибка');

              showCart (res);
              }
       });
          
       });
       
       
        $('#cart .modal-body').on('click', '.del-itemspec', function(){
         var id = $(this).data('id');
         
          $.ajax({
              url: '/cart/del-itemspec',
              data: {id: id},
              type: 'GET',
              success: function(res){
               if (!res) alert ('Ошибка');

              showCart (res);
              }
       });
          
       });
       
       
         $('#cart .modal-body').on('click', '.del-itemmoto', function(){
         var id = $(this).data('id');
         
          $.ajax({
              url: '/cart/del-itemmoto',
              data: {id: id},
              type: 'GET',
              success: function(res){
               if (!res) alert ('Ошибка');

              showCart (res);
              }
       });
          
       });
       
        $('#cart .modal-body').on('click', '.del-itemkompl', function(){
         var id = $(this).data('id');
         
          $.ajax({
              url: '/cart/del-itemkompl',
              data: {id: id},
              type: 'GET',
              success: function(res){
               if (!res) alert ('Ошибка');

              showCart (res);
              }
       });
          
       });
       
        $('#cart .modal-body').on('click', '.del-itemvoda', function(){
         var id = $(this).data('id');
         
          $.ajax({
              url: '/cart/del-itemvoda',
              data: {id: id},
              type: 'GET',
              success: function(res){
               if (!res) alert ('Ошибка');

              showCart (res);
              }
       });
          
       });
       
         $('#cart .modal-body').on('click', '.del-itemkvart', function(){
         var id = $(this).data('id');
         
          $.ajax({
              url: '/cart/del-itemkvart',
              data: {id: id},
              type: 'GET',
              success: function(res){
               if (!res) alert ('Ошибка');

              showCart (res);
              }
       });
          
       });
       
        $('#cart .modal-body').on('click', '.del-itemdoma', function(){
         var id = $(this).data('id');
         
          $.ajax({
              url: '/cart/del-itemdoma',
              data: {id: id},
              type: 'GET',
              success: function(res){
               if (!res) alert ('Ошибка');

              showCart (res);
              }
       });
          
       });
       
        $('#cart .modal-body').on('click', '.del-itemkomnati', function(){
         var id = $(this).data('id');
         
          $.ajax({
              url: '/cart/del-itemkomnati',
              data: {id: id},
              type: 'GET',
              success: function(res){
               if (!res) alert ('Ошибка');

              showCart (res);
              }
       });
          
       });
       
        $('#cart .modal-body').on('click', '.del-itemkommer', function(){
         var id = $(this).data('id');
         
          $.ajax({
              url: '/cart/del-itemkommer',
              data: {id: id},
              type: 'GET',
              success: function(res){
               if (!res) alert ('Ошибка');

              showCart (res);
              }
       });
          
       });
       
        $('#cart .modal-body').on('click', '.del-itemzemli', function(){
         var id = $(this).data('id');
         
          $.ajax({
              url: '/cart/del-itemzemli',
              data: {id: id},
              type: 'GET',
              success: function(res){
               if (!res) alert ('Ошибка');

              showCart (res);
              }
       });
          
       });
       
        $('#cart .modal-body').on('click', '.del-itemgaragi', function(){
         var id = $(this).data('id');
         
          $.ajax({
              url: '/cart/del-itemgaragi',
              data: {id: id},
              type: 'GET',
              success: function(res){
               if (!res) alert ('Ошибка');

              showCart (res);
              }
       });
          
       });
	   
	    $('#cart .modal-body').on('click', '.del-itembiznes', function(){
         var id = $(this).data('id');
         
          $.ajax({
              url: '/cart/del-itembiznes',
              data: {id: id},
              type: 'GET',
              success: function(res){
               if (!res) alert ('Ошибка');

              showCart (res);
              }
       });
          
       });
       
       
       function clearCart(){
            $.ajax({
              url: '/cart/clear',
              type: 'GET',
              success: function(res){
//                 if (!res) alert ('Ошибка, данной категории товаров нет!');

              showCart (res);
              }, 
       })
   }
   
       function getCart(){
        $.ajax({
              url: '/cart/show',
              type: 'GET',
              success: function(res){
                 if (!res) alert ('Ошибка, данной категории товаров нет!');

              showCart (res);
              }, 
              error: function(){ 
                  alert ('Error (Ошибка) !');
              }    
           });
       return false;
   }
       



       $('.add-to-cart').on('click', function (e){
           e.preventDefault();
           var id = $(this).data('id'),
           qty = $('#qty').val();
           $.ajax({
              url: '/cart/add',
              data: {id: id, qty: qty},
              type: 'GET',
              success: function(res){
//                 if (!res) alert ('Ошибка, данной категории товаров нет!');

              showCart (res);
              }, 
              error: function(){ 
                  alert ('Error (Ошибка) !');
              }    
           });
       });
       
       $('.add-to-cartavto').on('click', function (e){
           e.preventDefault();
           var id = $(this).data('id'),
           qty = $('#qty').val();
           $.ajax({
              url: '/cart/addavto',
              data: {id: id, qty: qty},
              type: 'GET',
              success: function(res){
//                 if (!res) alert ('Ошибка, данной категории товаров нет!');

              showCart (res);
              }, 
              error: function(){ 
                  alert ('Error (Ошибка) !');
              }    
           });
       });

  $('.add-to-cartgruz').on('click', function (e){
           e.preventDefault();
           var id = $(this).data('id'),
           qty = $('#qty').val();
           $.ajax({
              url: '/cart/addgruz',
              data: {id: id, qty: qty},
              type: 'GET',
              success: function(res){
//                 if (!res) alert ('Ошибка, данной категории товаров нет!');

              showCart (res);
              }, 
              error: function(){ 
                  alert ('Error (Ошибка) !');
              }    
           });
       });
       
        $('.add-to-cartspec').on('click', function (e){
           e.preventDefault();
           var id = $(this).data('id'),
           qty = $('#qty').val();
           $.ajax({
              url: '/cart/addspec',
              data: {id: id, qty: qty},
              type: 'GET',
              success: function(res){
//                 if (!res) alert ('Ошибка, данной категории товаров нет!');

              showCart (res);
              }, 
              error: function(){ 
                  alert ('Error (Ошибка) !');
              }    
           });
       });
       
       
       
       $('.add-to-cartmoto').on('click', function (e){
           e.preventDefault();
           var id = $(this).data('id'),
           qty = $('#qty').val();
           $.ajax({
              url: '/cart/addmoto',
              data: {id: id, qty: qty},
              type: 'GET',
              success: function(res){
//                 if (!res) alert ('Ошибка, данной категории товаров нет!');

              showCart (res);
              }, 
              error: function(){ 
                  alert ('Error (Ошибка) !');
              }    
           });
       });
       
       $('.add-to-cartkompl').on('click', function (e){
           e.preventDefault();
           var id = $(this).data('id'),
           qty = $('#qty').val();
           $.ajax({
              url: '/cart/addkompl',
              data: {id: id, qty: qty},
              type: 'GET',
              success: function(res){
//                 if (!res) alert ('Ошибка, данной категории товаров нет!');

              showCart (res);
              }, 
              error: function(){ 
                  alert ('Error (Ошибка) !');
              }    
           });
       });


        $('.add-to-cartvoda').on('click', function (e){
           e.preventDefault();
           var id = $(this).data('id'),
           qty = $('#qty').val();
           $.ajax({
              url: '/cart/addvoda',
              data: {id: id, qty: qty},
              type: 'GET',
              success: function(res){
//                 if (!res) alert ('Ошибка, данной категории товаров нет!');

              showCart (res);
              }, 
              error: function(){ 
                  alert ('Error (Ошибка) !');
              }    
           });
       });
       
        $('.add-to-cartkvart').on('click', function (e){
           e.preventDefault();
           var id = $(this).data('id'),
           qty = $('#qty').val();
           $.ajax({
              url: '/cart/addkvart',
              data: {id: id, qty: qty},
              type: 'GET',
              success: function(res){
//                 if (!res) alert ('Ошибка, данной категории товаров нет!');

              showCart (res);
              }, 
              error: function(){ 
                  alert ('Error (Ошибка) !');
              }    
           });
       });
       
        $('.add-to-cartdoma').on('click', function (e){
           e.preventDefault();
           var id = $(this).data('id'),
           qty = $('#qty').val();
           $.ajax({
              url: '/cart/adddoma',
              data: {id: id, qty: qty},
              type: 'GET',
              success: function(res){
//                 if (!res) alert ('Ошибка, данной категории товаров нет!');

              showCart (res);
              }, 
              error: function(){ 
                  alert ('Error (Ошибка) !');
              }    
           });
       });
       
       $('.add-to-cartkomnati').on('click', function (e){
           e.preventDefault();
           var id = $(this).data('id'),
           qty = $('#qty').val();
           $.ajax({
              url: '/cart/addkomnati',
              data: {id: id, qty: qty},
              type: 'GET',
              success: function(res){
//                 if (!res) alert ('Ошибка, данной категории товаров нет!');

              showCart (res);
              }, 
              error: function(){ 
                  alert ('Error (Ошибка) !');
              }    
           });
       });
       
        $('.add-to-cartkommer').on('click', function (e){
           e.preventDefault();
           var id = $(this).data('id'),
           qty = $('#qty').val();
           $.ajax({
              url: '/cart/addkommer',
              data: {id: id, qty: qty},
              type: 'GET',
              success: function(res){
//                 if (!res) alert ('Ошибка, данной категории товаров нет!');

              showCart (res);
              }, 
              error: function(){ 
                  alert ('Error (Ошибка) !');
              }    
           });
       });
       
         $('.add-to-cartzemli').on('click', function (e){
           e.preventDefault();
           var id = $(this).data('id'),
           qty = $('#qty').val();
           $.ajax({
              url: '/cart/addzemli',
              data: {id: id, qty: qty},
              type: 'GET',
              success: function(res){
//                 if (!res) alert ('Ошибка, данной категории товаров нет!');

              showCart (res);
              }, 
              error: function(){ 
                  alert ('Error (Ошибка) !');
              }    
           });
       });
       
        $('.add-to-cartgaragi').on('click', function (e){
           e.preventDefault();
           var id = $(this).data('id'),
           qty = $('#qty').val();
           $.ajax({
              url: '/cart/addgaragi',
              data: {id: id, qty: qty},
              type: 'GET',
              success: function(res){
//                 if (!res) alert ('Ошибка, данной категории товаров нет!');

              showCart (res);
              }, 
              error: function(){ 
                  alert ('Error (Ошибка) !');
              }    
           });
       });
	   
	   $('.add-to-cartbiznes').on('click', function (e){
           e.preventDefault();
           var id = $(this).data('id'),
           qty = $('#qty').val();
           $.ajax({
              url: '/cart/addbiznes',
              data: {id: id, qty: qty},
              type: 'GET',
              success: function(res){
//                 if (!res) alert ('Ошибка, данной категории товаров нет!');

              showCart (res);
              }, 
              error: function(){ 
                  alert ('Error (Ошибка) !');
              }    
           });
       });
	   
	   
	  
       
	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing 
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});


