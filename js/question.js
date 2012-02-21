function start(){
  $$('.question').each(function(p){
  		Event.observe(p,"click",this.question_click.bind(p));
  });

  
  
}
function question_click()
{
  try
  {
    $('question'+select).addClassName('nav');
    $('question'+select).removeClassName('nav_select');
    
    $('response'+select).hide();
    $('response_color'+select).removeClassName('text_select');
  }
  catch(e)
  {

  }
  this.addClassName('nav_select');
  this.removeClassName('nav');
  id=this.getAttribute('id');
  reponse_id=id.replace('question','response');
  select = id.replace('question','')
  $('response_color'+select).addClassName('text_select');
  
  
  $(reponse_id).show();

}
Event.observe(window,"load",start);