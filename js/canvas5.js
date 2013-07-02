$(function() {
  $(".language_btn").live("click", function() {
    html_item = $(this).parent();
    content = html_item.html();
    /*html_item.html("Loading...");*/
    step = $(this).parent().parent().attr('id')
    if(step == 'step1')
    {
      next = '#step2'
      cycle = 1
    }
    else
    {
      next ='#step3'
      cycle = 2
    }
    root_item = html_item.parent();
    $.ajax({dataType: 'html',
      url: $(this).attr('href'),
      type: 'GET',
      data: {},
      success: function(data) {
        $(next).html(data);
        $container.cycle(cycle),200;
      },
      error: function() {
        html_item.html(content);
      }
    });
    return false;
  });
  var $container = $('#choice_new').cycle({ 
      fx:     'scrollHorz', 
      speed:   300, 
      timeout: 0 
  });
  $("#change_step2").live("click", function() {
    $container.cycle(0)
    return false;
  });
  $("#change_step3").live("click", function() {
    $container.cycle(1)
    return false;
  });
  
  $('.btn_play').live("click", function(){
    $.ajax({dataType: 'html',
      url: $(this).attr('href'),
      type: 'GET',
      data: {},
      success: function(data) {
        $('#presentation').html(data);
      },
      error: function() {
        html_item.html(content);
      }
    })
    return false;
  })
  $('#sub').live("click", function(){
    email = $('#input_email').val()
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(regex.test(email))
    {
      $('.error').hide();
      
      var url = "/promotions/email.php"; // the script where you handle the form input.

          $.ajax({
                 type: "POST",
                 url: url,
                 data: $("#sub_email").serialize(), // serializes the form's elements.
                 success: function(data)
                 {
                   console.log(data)
                   if(data=='ok')
                   {
                     $('#facebox').hide(); // show response from the php script.
                     $('#facebox_overlay').hide();
                   }
                   else
                   {
                     console.log('#'+data)
                     $('#'+data).show()
                   }
                 }
               });
    }
    else
    {
      $('.error').hide();
      $('#error3').show();
      $('#input_email').focus()
    }
    return false
  })
});