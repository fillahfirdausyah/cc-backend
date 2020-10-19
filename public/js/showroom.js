//navbar Mobile
var coll = document.getElementsByClassName("icon_btn");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      	content.style.display = "none";
    } else {
      	content.style.display = "table";
    }
  });
}


// scrolling navbar
window.onscroll = function() {myFunction()};

function myFunction() {
	if (document.body.scrollTop > 5 || document.documentElement.scrollTop > 5) {
	   document.getElementById("navigation").style.height = "70px";
	   document.getElementById("navigation").style.boxShadow = "1px 1px 5px #444444";
	} else {
	   document.getElementById("navigation").style.boxShadow = "none";
	   document.getElementById("navigation").style.height = "80px";
	}
}

// Update terbaru
$('#recipeCarousel').carousel({
  interval: 10000
})

$('.carousel .carousel-item').each(function(){
    var minPerSlide = 3;
    var next = $(this).next();
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
    
    for (var i=0;i<minPerSlide;i++) {
        next=next.next();
        if (!next.length) {
        	next = $(this).siblings(':first');
      	}
        
        next.children(':first-child').clone().appendTo($(this));
      }
});

// SlideShow
var slideIndex = 1;
showSlides(slideIndex);

function currentSlide(n) {
  	showSlides(slideIndex = n);
}

function showSlides(n) {
	var i;
	var slides = document.getElementsByClassName("mySlide");
  	var dots = document.getElementsByClassName("dot");
  	if (n > slides.length) {slideIndex = 1}    
  	if (n < 1) {slideIndex = slides.length}
  	for (i = 0; i < slides.length; i++) {
      	slides[i].style.display = "none";  
  	}
  	for (i = 0; i < dots.length; i++) {
      	dots[i].className = dots[i].className.replace(" active", "");
  	}
  	slides[slideIndex-1].style.display = "block";  
  	dots[slideIndex-1].className += " active";
}

//search
$(document).ready(function(){
  
  $('#search').keyup(function(){
    var query = $(this).val();     
    var _token = $('input[name="_token"]').val();
    if(query != ''){
      $.ajax({
        url:"/search",
        method:"POST",
        data:{query:query, _token:_token},
        success:function(data){
        $('#result').html(data);  
        }
      });
    }else{  
        $('#result').html('');
    }
  });
});


function direction(ID){
  setTimeout(function(){
    window.location.href = '#'+ ID;
    window.fadeIn();
  },500)
}
