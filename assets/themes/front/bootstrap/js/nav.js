var sidebar = jQuery.noConflict();
sidebar(document).ready(function(){
  sidebar("#nav > li > a").on("click", function(e){
    if(sidebar(this).parent().has("ul")) {
      e.preventDefault();
    }
    
    if(!sidebar(this).hasClass("open")) {
      // hide any open menus and remove all other classes
      sidebar("#nav li ul").slideUp(350);
      sidebar("#nav li a").removeClass("open");
      
      // open our new menu and add the open class
      sidebar(this).next("ul").slideDown(350);
      sidebar(this).addClass("open");
    }
    
    else if(sidebar(this).hasClass("open")) {
      sidebar(this).removeClass("open");
      sidebar(this).next("ul").slideUp(350);
    }
  });
});