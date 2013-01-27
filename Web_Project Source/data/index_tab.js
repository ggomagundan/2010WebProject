$(function($){
     
     var tab = $('.Maintab');
    tab.find("div").hide();
      
    $(".Maintab div:first").addClass('active');
    
      
    
      tab.find('li>a.title').mouseover(function(){
            $(".Maintab>ul>li").removeClass('selected');
            $(this).parent().addClass('selected');
            tab.find(".active").hide();
            $(".active").removeClass('active');
            $(this).parent().find('div').addClass('active');
            $(".active").show();      
            
      });
      $(".Maintab li>a:first").mouseover();
});