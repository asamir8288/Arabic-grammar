$(document).ready(function(){
   $('.submenu').hide();
   $('.sub').mouseover(function(event){
       event.preventDefault();
       event.stopPropagation();
       var menu_id = $(this).attr('menu_id');
       $('.submenu').hide();
       var submenu = $('#' + menu_id);
       submenu.show();
       submenu.css('top','22px');
       submenu.css('left', ($(this).position().left - 120) + 'px');
   });
   $('.submenu').mouseover(function(event){
       event.stopPropagation();
   });
   $(document).mouseover(function(){
       $('.submenu').hide();
   });
});