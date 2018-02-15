$(function($) {
   $(".more").each(function(){
    $(this).on('click', function(event) {        
      event.preventDefault();
      $(this).parent().find('.more_to_read').toggleClass('oppen');
   });
  });
   
   $(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 50; 
    var eqExpand = 200;
    var showCharModule = 150; // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Läs mer >";
    var lesstext = "Visa mindre...";
    

    $('.more').each(function() {
        var content = $(this).html();
        if(content.length > showChar) {
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>'; 
            $(this).html(html);
        } 
    });
    $('.moremodule').each(function() {
        var content = $(this).html();
        if(content.length > showCharModule) {
            var c = content.substr(0, showCharModule);
            var h = content.substr(showCharModule, content.length - showCharModule);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>'; 
            $(this).html(html);
        } 
    });
    $('.moreEQ').each(function() {
        var content = $(this).html();
        if(content.length > eqExpand) {
            var c = content.substr(0, eqExpand);
            var h = content.substr(eqExpand, content.length - eqExpand);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;<br><br></span><span class="morecontent"><span>' + h + '<br><br></span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>'; 
            $(this).html(html);
        } 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});
});
