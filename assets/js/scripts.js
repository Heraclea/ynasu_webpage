function activeHeader(){
    if ($('body').scrollTop() >= $('#banner-home').height() - 80)
        $('header.scroll').addClass('active')
    else
        $('header.scroll').removeClass('active')
}

$(document).ready(function(){
    activeHeader();

    // Activate links
    var url = window.location.href;
    $('header a[href="'+window.location.href+'"], #nav-responsive a[href="'+window.location.href+'"]').parent('li').addClass('active');

    $(".owl-carousel").owlCarousel({
    	loop:true,
        autoplay: true,
        responsiveClass:true,
        responsive:{
            0:{
                items:3,
                nav:true,
                loop:true
            },
            600:{
                items:3,
                nav:true,
                loop:true
            },
            1000:{
                items:5,
                nav:true,
                loop:true
            }
        }
    });

    $('.testimonials').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
    });

    $('.relation-carousel').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 5000,
    });

    $('.article-carousel').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 5000,
    });

    $(document).on('click', '#toggle-responsive', function(event) {
        $('#nav-responsive').toggleClass('active');
    });

    $(document).mouseup(function (e){
        var container = $("#nav-responsive");

        if (!container.is(e.target)
            && container.has(e.target).length === 0) {
            container.removeClass('active')
        }
    }); 

    $('#banner-home img.arrow').click(function(event) {
        $('html,body').animate({
            scrollTop: $("#what-we-do").offset().top - 20},
        'slow');
    });

    $('.tabs span').click(function(event) {
        var target = $(this).data('target');

        $('.tabs span').removeClass('active');
        $(this).addClass('active');


        $('.row.content').removeClass('active');
        $('.row.content[data-self="'+target+'"]').addClass('active');
    });

    $('#association .tabs span').click(function(event) {
        var target = $(this).data('target');

        $('.tabs span').removeClass('active');
        $(this).addClass('active');

        var offset = 90
        if (target == "goals") offset = 140;

        $('html,body').animate({
            scrollTop: $('.self[data-self="'+target+'"]').offset().top - offset},
        'slow');
    });


    $('.content-popup.signup, .popup.signup').fadeIn('fast');

    $('.view-form-sample').click(function(event) {
        $('.content-popup.sample, .popup.sample').fadeIn('fast');
    });

     $('.content-popup:not(.signup)').click(function(event) {
        $('.content-popup, .popup').fadeOut('fast');
    });

    $('.go-products').click(function(event) {
        $('html,body').animate({
            scrollTop: $('h3[data-self="product info"]').offset().top - 90},
        'slow');
    });

    $('#works .items').click(function(event) {
        var target = $(this).data('target');

        $('html,body').animate({
        scrollTop: $(".item-context[data-self='"+target+"'").offset().top-70},
        'slow');
    });

    $("#comment-form").validationEngine();

    $("#comment-form button").click(function(event) {
        event.preventDefault();

        if ($("#comment-form").validationEngine('validate')) {
            var data = {};

            data['Association'] = $('#association-input').val();
            $("#comment-form .input-send").each(function(index, el) {
                data[ $(this).attr('name') ] = $(this).val();
            }); 

            $.ajax({
                method: "POST",
                url: $('#base_url').val()+'meet/send',
                data: data
            })
            .done(function( msg ) {
                $('#comment-form .input-send').val('');
                alert( msg );
            });
            
        }
    });


    $("#contact-form").validationEngine();

    $("#contact-form button").click(function(event) {
        event.preventDefault();

        if ($("#contact-form").validationEngine('validate')) {
            var data = {};

            data['Type'] = $('#select-type').find(":selected").text();
            $("#contact-form .input-send").each(function(index, el) {
                data[ $(this).attr('name') ] = $(this).val();
            }); 

            $.ajax({
                method: "POST",
                url: $('#base_url').val()+'contact/send',
                data: data
            })
            .done(function( msg ) {
                $('#contact-form .input-send').val('')
                alert( msg );
            });
            
        }
    });


    $("#order-a-simple-form").validationEngine();

    $("#order-a-simple-form button").click(function(event) {
        event.preventDefault();

        if ($("#order-a-simple-form").validationEngine('validate')) {
            var data = {};

            data['Delivery_method'] = $('#select-delivery-method').find(":selected").text();
            
            $("#order-a-simple-form .input-send").each(function(index, el) {
                data[ $(this).attr('name') ] = $(this).val();
            }); 

            $.ajax({
                method: "POST",
                url: $('#base_url').val()+'meet/order',
                data: data
            })
            .done(function( msg ) {
                $('#order-a-simple-form .input-send').val('');
                $('.content-popup.sample, .popup.sample').fadeOut('fast');
                alert( msg );
            });
            
        }
    });


    $("#signup-form button").click(function(event) {
        event.preventDefault();
            
        validate = true
        if (!$('#email_registered').val())
            validate = $("#signup-form").validationEngine('validate');
    
        if (validate) {
            var data = {};

            data['type_text'] = $('#signup-form select').find(":selected").text();
            $("#signup-form .input-send").each(function(index, el) {
                data[ $(this).attr('name') ] = $(this).val();
            });

            $.ajax({
                method: "POST",
                url: $('#base_url').val()+'meet/validate',
                data: data
            })
            .done(function( msg ) {
                $('#signup-form .input-send').val('')
                alert( msg );
                if (msg == "Thank you for registering your information." || msg == "Thank you for verifying your email.")
                    location.reload();
            });
            
        }
    });




    $('.search-form-input').keydown(function(e) {
        if (e.keyCode == 13) {
            $(this).parent().submit();
        }
    });
    
});

$(window).load(function() {
    $('.relation-carousel img').each(function(index, el) {
        var url = $(this).attr('src');
        $( this ).wrap( "<a href='"+url+"' rel='gallery1'></a>" );
    });

    $(".relation-carousel a").fancybox();
});

$(window).scroll(function(event) {
    activeHeader();
});