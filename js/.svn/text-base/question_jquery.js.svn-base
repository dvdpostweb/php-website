$(function() {
  $('.question').live("click", function() { 
    if($(this).attr('class') == 'question  nav'){
      try
      {
        $('#question'+select).addClass('nav');
        $('#question'+select).removeClass('nav_select');
    
        $('#response'+select).hide();
        $('#response_color'+select).removeClass('text_select');
      }
      catch(e)
      {

      }

      id=$(this).attr('id');
      $(this).addClass('nav_select');
      $(this).removeClass('nav');
      reponse_id=id.replace('question','response');
      select = id.replace('question','')
      $('#response_color'+select).addClass('text_select');
  
  
      $("#"+reponse_id).show();  
    }
    else
    {
      id=$(this).attr('id');
      $(this).addClass('nav');
      $(this).removeClass('nav_select');
      reponse_id=id.replace('question','response');
      select = id.replace('question','')
      $('#response_color'+select).removeClass('text_select');
       $("#"+reponse_id).hide();  
    }
  });
});