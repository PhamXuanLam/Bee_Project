$(document).ready(function(){
    $(window).scroll (function(){
        if($('html,body').scrollTop() >200){
            $('#btn-scroll-top').css('display','block')
    }  else{
            $('#btn-scroll-top').css('display','none')
    }
    })

    $('#btn-scroll-top').click(function(event){
        $('html,body').animate({scrollTop : 0},300)
    });

    $(".navigation").click(function(){
        $('.drop-down').toggle(300);
    });
    $(".drop-down_close").click(function(){
        $(".drop-down").toggle(300);
    });
});