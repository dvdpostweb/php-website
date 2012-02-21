function start(){
  Event.observe($('search_title'),"click",this.toggle_panel_search.bind($('search_title')));
  Event.observe($('vod_title'),"click",this.toggle_panel_vod.bind($('vod_title')));
  Event.observe($('location_title'),"click",this.toggle_panel_location.bind($('location_title')));
  Event.observe($('plus_location'),"click",this.toggle_panel_location.bind($('plus_location')));
  Event.observe($('plus_vod'),"click",this.toggle_panel_vod.bind($('plus_vod')));
  
}
function toggle_panel_search()
{
  $('search_panel').toggle();
  $('vod_panel').hide();
  $('location_panel').hide();
  arrow()
}

function toggle_panel_vod()
{
  $('vod_panel').toggle();
  $('search_panel').hide();
  $('location_panel').hide();
  arrow()
}

function toggle_panel_location()
{
  $('location_panel').toggle();
  $('vod_panel').hide();
  $('search_panel').hide();
  arrow()
}
function arrow()
{
  if ($('search_panel').style.display == 'none')
  {    
    $('search_title').up('span').removeClassName('active');
  }
  else
  {
    $('search_title').up('span').addClassName('active');
  }
  if ($('vod_panel').style.display == 'none')
  {    
    $('vod_title').up('span').removeClassName('active');
  }
  else
  {
    $('vod_title').up('span').addClassName('active');
  }
  if ($('location_panel').style.display == 'none')
  {    
    $('location_title').up('span').removeClassName('active');
  }
  else
  {
    $('location_title').up('span').addClassName('active');
  }
  
}
function question_click()
{
  normal = this.hasClassName('nav')
  try
  {
    $('question'+select).addClassName('nav');
    $('question'+select).removeClassName('navselected');
    
    $('response'+select).hide();
    $('response_color'+select).removeClassName('text_select');
  }
  catch(e)
  {

  }
  
  id=this.getAttribute('id');
  now = id.replace('question','');
  reponse_id=id.replace('question','response');
  if(now != select || normal == true){
    this.addClassName('navselected');
    this.removeClassName('nav');
    $('response_color'+now).addClassName('text_select');
    $(reponse_id).show();
  }
  select = id.replace('question','')
  
}
Event.observe(window,"load",start);