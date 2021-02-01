var burgerbtn = document.querySelector("#burger-btn");
var header = document.querySelector('.header');
var body = document.querySelector('body');
var overlay = document.querySelector('.overlay');
var fadeElements = document.querySelectorAll('.has-fade');

burgerbtn.addEventListener('click', function(){

  if(header.classList.contains('open')){
    body.classList.remove('noscroll');
    header.classList.remove('open');
    fadeElements.forEach(function(element){
      element.classList.remove('fade-in');
      element.classList.add('fade-out');
    })
  }
  else {
    body.classList.add('noscroll');
    header.classList.add('open');
    fadeElements.forEach(function(element){
      element.classList.remove('fade-out');
      element.classList.add('fade-in');
    })
  }
})