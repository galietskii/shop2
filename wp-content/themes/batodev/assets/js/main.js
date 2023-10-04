$(function () {
    $(".menu").on("click", "li", function () {
        let is_active = false;

        if ($(this).hasClass('active')) { is_active = true; }

        $(".menu-item").removeClass('active');

        if (!is_active) { $(this).addClass('active'); }


    });
    /* Hamburger menu*/

    $('.hamburger').on('click', function () {
        $(this).toggleClass('is-active');
        $('.mobile-nav').toggleClass('is-active');
    })
    $('.header__right-search').on('click', function () {
        $('.search').css('display', 'flex');
        $('.h-menu').css('display', 'none');
    })
    $('.closes').on('click', function () {
        $('.search').css('display', 'none');
        $('.h-menu').css('display', 'block');
    })

    /** 
     * SLICK SLIDER FROM FEATURED PRODUCTS
     */

    $('.responsive').slick({
        dots: false,
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev-custom"><i class="fa-solid fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next-custom"><i class="fa-solid fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 1440,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 1,
                }
            },
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
              }
            },
            {
                breakpoint: 800,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                }
              },
          ]
    });

    $('body').on('click', '.plus', function () {
      var key = $(this).data('cart-item-key');
      var quantityInput = $('.quantity-input[data-cart-item-key="' + key + '"]');
      var newQuantity = parseInt(quantityInput.val()) + 1;
      quantityInput.val(newQuantity);
      updateCartItemQuantity(key, newQuantity);
  });

  $('body').on('click', '.minus', function () {
      var key = $(this).data('cart-item-key');
      var quantityInput = $('.quantity-input[data-cart-item-key="' + key + '"]');
      var newQuantity = parseInt(quantityInput.val()) - 1;
      if (newQuantity >= 1) {
          quantityInput.val(newQuantity);
          updateCartItemQuantity(key, newQuantity);
      }
  });

  function updateCartItemQuantity(key, quantity) {
      $.ajax({
          type: 'POST',
          dataType: 'json',
          url: wc_cart_params.ajax_url,
          data: {
              action: 'update_cart_item_quantity',
              cart_item_key: key,
              quantity: quantity
          },
          success: function (response) {
              if (response.success) {
                  $('.widget_shopping_cart_content').html(response.fragments['div.widget_shopping_cart_content']);
              }
          }
      });
  }

  // Function on click to cart and open mini-cart
  $('.add_to_cart_button').on('click', function() {
      $('.products__cart').css('transform', 'translate(0, 0px)');
      $('.main').addClass('active');
  })
  $('.header__right-det-cart').on('click', function() {
    $('.products__cart').css('transform', 'translate(0, 0px)');
    $('.main').addClass('active');
    
})
  $('.close-cart').on('click', function (){
    $('.products__cart').css('transform', 'translate(350px, 0px)');
    $('.main').removeClass('active');
  })
});

