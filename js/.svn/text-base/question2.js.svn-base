$(function() {
  $(".question").live("click", function() {
    normal = $(this).hasClass('nav')
    try
    {
      $('#question'+select).addClass('nav');
      $('#question'+select).removeClass('navselected');

      $('#response'+select).hide();
      $('#response_color'+select).removeClass('text_select');
    }
    catch(e)
    {

    }
    
    id=$(this).attr('id');
    reponse_id=id.replace('question','response');
    
    now = id.replace('question','')
    
    if(now != select || normal == true)
    {
      $(this).addClass('navselected');
      $(this).removeClass('nav');
      $("#"+reponse_id).show();
      $('#response_color'+now).addClass('text_select');
    }
    select = id.replace('question','')
    return false;
  });
  select = 0


  $("#search_title").live("click", function() { toggle_panel_search()  });
  $("#vod_title").live("click", function() { toggle_panel_vod()  });
  $("#location_title").live("click", function() { toggle_panel_location()  });
  $("#plus_location").live("click", function() { toggle_panel_location()  });
  $("#plus_vod").live("click", function() { toggle_panel_vod()  });
  


});

function toggle_panel_search()
{
  $('#search_panel').toggle();
  $('#vod_panel').hide();
  $('#location_panel').hide();
  arrow()
}

function toggle_panel_vod()
{
  $('#vod_panel').toggle();
  $('#search_panel').hide();
  $('#location_panel').hide();
  arrow()
}

function toggle_panel_location()
{
  $('#location_panel').toggle();
  $('#vod_panel').hide();
  $('#search_panel').hide();
  arrow()
}
function arrow()
{
  if ($('#search_panel').css('display') == 'none')
  {    
    $('#search_title').parent('span').removeClass('active');
  }
  else
  {
    $('#search_title').parent('span').addClass('active');
  }
  if ($('#vod_panel').css('display') == 'none')
  {    
    $('#vod_title').parent('span').removeClass('active');
  }
  else
  {
    $('#vod_title').parent('span').addClass('active');
  }
  if ($('#location_panel').css('display') == 'none')
  {    
    $('#location_title').parent('span').removeClass('active');
  }
  else
  {
    $('#location_title').parent('span').addClass('active');
  }
  
}

function question_click()
{

}