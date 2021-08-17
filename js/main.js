// var toTop = document.getElementById("js-to-top");
  
//   toTop.addEventListener("click", function(e){
//     e.preventDefault();
//     scrollToTop(300);
//   });
// function scrollToTop(scrollDuration) {
//     var scrollStep = -window.scrollY / (scrollDuration / 15),
//         scrollInterval = setInterval(function(){
//         if ( window.scrollY != 0 ) {
//             window.scrollBy( 0, scrollStep );
//         }
//         else clearInterval(scrollInterval); 
//     },15);
// }

// home - how it works switcher

// jQuery( document ).ready(function() {
  
//   jQuery("#hiw-switcher-button-1").click(function() {
//     jQuery(".hiw-switcher-button").removeClass("hiw-active");
//     jQuery("#hiw-switcher-button-1").addClass("hiw-active");
//     jQuery(".hiw-switcher-bullets").removeClass("d-flex");
//     jQuery(".hiw-switcher-bullets").addClass("d-none");
//     jQuery("#hiw-switcher-bullets-1").addClass("d-flex");
//   });

//   jQuery("#hiw-switcher-button-2").click(function() {
//     jQuery(".hiw-switcher-button").removeClass("hiw-active");
//     jQuery("#hiw-switcher-button-2").addClass("hiw-active");
//     jQuery(".hiw-switcher-bullets").removeClass("d-flex");
//     jQuery(".hiw-switcher-bullets").addClass("d-none");
//     jQuery("#hiw-switcher-bullets-2").addClass("d-flex")
//   });

//   jQuery("#hiw-switcher-button-3").click(function() {
//     jQuery(".hiw-switcher-button").removeClass("hiw-active");
//     jQuery("#hiw-switcher-button-3").addClass("hiw-active");
//     jQuery(".hiw-switcher-bullets").removeClass("d-flex");
//     jQuery(".hiw-switcher-bullets").addClass("d-none");
//     jQuery("#hiw-switcher-bullets-3").addClass("d-flex")
//   });
// });

jQuery(document).ready(function(){
  jQuery('.inner-green').click(function(){
      jQuery('.inner-green').toggleClass('active');
      jQuery('.label-from-to-green').toggleClass('active');
      jQuery('.bat-products-green').toggleClass('active'); 
  });
  jQuery('.label-from-to-green').click(function(){
    jQuery('.inner-green').toggleClass('active');
    jQuery('.label-from-to-green').toggleClass('active');
    jQuery('.bat-products-green').toggleClass('active'); 
  });
  jQuery('.inner-amber').click(function(){
    jQuery('.inner-amber').toggleClass('active');
    jQuery('.label-from-to-amber').toggleClass('active');
    jQuery('.bat-products-amber').toggleClass('active'); 
  });
  jQuery('.label-from-to-amber').click(function(){
    jQuery('.inner-amber').toggleClass('active');
    jQuery('.label-from-to-amber').toggleClass('active');
    jQuery('.bat-products-amber').toggleClass('active'); 
  });
});

// Typed.js code for discount banner
var options = {
  strings: ['16 purchases!'],
  typeSpeed: 100,
  startDelay: 1000,
  loop: true,
};

var typed = new Typed('.discountString', options);

//Copy over shipping to billing
jQuery(document).on('change', '#copy_to_billing', function() {
  if(this.checked) {
      jQuery("[name='shipping_first_name']").val(jQuery("[name='billing_first_name']").val());
      jQuery("[name='shipping_last_name']").val(jQuery("[name='billing_last_name']").val());
      jQuery("[name='shipping_address_1']").val(jQuery("[name='billing_address_1']").val());
      jQuery("[name='shipping_address_2']").val(jQuery("[name='billing_address_2']").val());
      jQuery("[name='shipping_city']").val(jQuery("[name='billing_city']").val());
      jQuery("[name='shipping_state']").val(jQuery("[name='billing_state']").val());
      jQuery("[name='shipping_postcode']").val(jQuery("[name='billing_postcode']").val());
      jQuery("[name='shipping_country']").val(jQuery("[name='billing_country']").val());
  }
});