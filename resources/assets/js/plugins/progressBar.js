$(document).ready(function(){

            locale = $( "select[name='locale']" );
            changeLanguage = function() {
                if (locale.val() == 'en') {
                    $('#module').hide();
                    $('.swe').hide();
                    $('#module1').show();
                    $('.eng').show();
                }
                else if (locale.val() == 'sv') {
                    $('#module').show();
                    $('.swe').show();
                    $('#module1').hide();
                    $('.eng').hide();
                }
            }
            changeLanguage();
            locale.change(function(){
                changeLanguage();
            });

            $('#congrats').hide();
            $('#submit').click(function(){
              $('#module').hide();
              $('#module1').hide();
              $('.rbuttons').hide();
              $('.lbutton').hide();
              $('#congrats').show();
              var update_data = $('#update_playTogether').val();
              
                $.ajax({
                    type:'GET',
                    url:'/update_playTogether/' + update_data,
                    data: update_data,
                    success:function(data){
                    
                    }
                });
            });
          $('.readmore').hide();
          $('.oppen').click(function(){
             $('.readmore').slideToggle(); 
          });
  
          var current = 1;
          var current1 = 1;
          
          widget      = $("#module > .step");
          widget1      = $("#module1 > .step");
          btnnext     = $(".next");
          btnback     = $(".back"); 
          btnsubmit   = $(".submit");
          // Init buttons and UI
          widget.not(':eq(0)').hide();
          widget1.not(':eq(0)').hide();
          hideButtons(current);
          setProgress(current);

          // Next button click action
          btnnext.click(function(){
            if(current < widget.length){
              widget.show();
              widget1.show();
              widget.not(':eq('+(current++)+')').hide();
              widget1.not(':eq('+(current1++)+')').hide();
              setProgress(current);
            }
            hideButtons(current);
          })

          // Back button click action
          btnback.click(function(){
            if(current > 1){
              current = current - 2;
              current1 = current1 - 2;
              btnnext.trigger('click');
            }
            hideButtons(current);
          })      
        });
        
        // Change progress bar action
        setProgress = function(currstep){
          var percent = parseFloat(100 / widget.length) * currstep;
          percent = percent.toFixed();
          $(".progress-bar").css("width",percent+"%").html(percent+"%");    
        }

        // Hide buttons according to the current step
        hideButtons = function(current){
          var limit = parseInt(widget.length); 

          $(".action-buttons").hide();

          if(current < limit) btnnext.show();
          if(current > 1) btnback.show();
          if (current == limit) { btnnext.hide(); btnsubmit.show(); }
        }