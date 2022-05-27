$(window).scroll(function(){
    var wScroll = $(this).scrollTop();

    // console.log(wScroll);

    if( wScroll > $('.most-picked').offset().top - 350){
        console.log('ok');
        $('.most-picked .parallax').addClass('on');
    }

    if( wScroll > $('.hotel').offset().top - 380){
        console.log('ok');
        $('.hotel .parallax').addClass('on');
    }

    if( wScroll > $('.house').offset().top - 410){
        console.log('ok');
        $('.house .parallax').addClass('on');
    }

    if( wScroll > $('.apart').offset().top - 440){
        console.log('ok');
        $('.apart .parallax').addClass('on');
    }

})