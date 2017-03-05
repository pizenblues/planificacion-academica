$("#materia").on("change", function(){
  var materia = $(this).val()
  console.log(materia);
  $("#seccion")
    .find("option")
    .slice(1)
    .addClass("hidden")
    .filter("[data-materia="+materia+"]")
    .removeClass("hidden")
})