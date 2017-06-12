/*https://www.youtube.com/watch?v=mYVl4lUadcs&t=4s
$("#ciudad").change(function(event){
   
   $.get("barrios/"+event.target.value+"",function(response,ciudad){
      for(i=0;i<response.length;i++){
        $("#barrio").append("<option value='"+response[i].id+"'>"+response[i].name+"</option>");
      }
   });
});*/