$(document).ready(function(){
  $("p#status").each(function (){
    if ($(this).text() === "not started") {
      $(this).addClass('bg2');
    } else if($(this).text() === "in progress") {
      $(this).addClass('bg1');
    } else if($(this).text() === "pending") {
      $(this).addClass('bg3');
    } else if($(this).text() === "done") {
      $(this).addClass('bg4');
      $(this).parent().prev('h1').addClass("th")
    } 
  })
  $("p#priority").each(function (){
    if ($(this).text() === "todo") {
      $(this).addClass('bg2-dark');
    } else if($(this).text() === "low") {
      $(this).addClass('bg1-dark');
    } else if($(this).text() === "high") {
      $(this).addClass('bg3-dark');
    } else if($(this).text() === "medium") {
      $(this).addClass('bg4-dark');
    } 
  })
})
