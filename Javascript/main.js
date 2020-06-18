function myFunction(elem) {
  var x = document.getElementById("js-description");
  var description = elem.getAttribute('data-description');
  x.innerHTML = description;

  var button = document.getElementsByClassName('js-button');

  for (var i = 0; i < button.length; i++) {
    button[i].classList.remove('active-button');
  }

  elem.classList.add('active-button');
}


function toggleUtil(util) {
  $(".utilities").hide();
  $("#" + util).show();
}


function myFunction() {
  alert("You clicked the coffee cup!");
}
