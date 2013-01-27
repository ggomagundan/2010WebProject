 $(function($){
       
      var tab1 = $('#navigation');
      tab1.find("div").hide();
      
      $('#navigation>ul>li>a').mouseover(function(){
            $("#navigation>ul>li").removeClass('select');
            $(this).parent().addClass('select');
            tab1.find(".actives").hide();
            $(".actives").removeClass('actives');
            $(this).parent().find('div').addClass('actives');
            $(".actives").slideDown('slow');      
            
      });
      
      
    /*  $('body').mouseout(function(){
            
           tab1.find(".actives").slideUp('slow');
             
            
      });*/
});
