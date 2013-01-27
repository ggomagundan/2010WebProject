$(function($){
     
     var tab = $('.Maintab');
     tab.find("div").hide();
      var tab1 = $('#navigation');
      tab1.find("div").hide();
    $(".Maintab div:first").addClass('active');
      
      $('#navigation>ul>li>a').mouseover(function(){
            $("#navigation>ul>li").removeClass('selected');
            $(this).parent().addClass('selected');
            tab1.find(".active").hide();
            $(".active").removeClass('active');
            $(this).parent().find('div').addClass('active');
            $(".active").slideDown();      
            
      });
      
      
      $('#right_center').mouseout(function(){
            
           tab1.find(".active").slideUp('slow');
             
            
          });
      
    
      tab.find('li>a').mouseover(function(){
            $(".Maintab>ul>li").removeClass('selected');
            $(this).parent().addClass('selected');
            tab.find(".active").hide();
            $(".active").removeClass('active');
            $(this).parent().find('div').addClass('active');
            $(".active").show();      
            
      });
      $(".Maintab li>a:first").mouseover();
});
/*
$(function() {

 //Default Action
 $(".tab_content").hide(); //Hide all content
 $("ul.tabs li:first").addClass("active").show(); //Activate first tab
 $(".tab_content:first").show(); //Show first tab content

 //On Click Event
 $("ul.tabs li").click(function() {
 $("ul.tabs li").removeClass("active"); //Remove any "active" class
 $(this).addClass("active"); //Add "active" class to selected tab
 $(".tab_content").hide(); //Hide all tab content
 var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
 $(activeTab).fadeIn(); //Fade in the active content
 return false;
 });

}); 
*/