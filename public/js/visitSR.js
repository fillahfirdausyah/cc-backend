var coll = document.getElementsByClassName("tombol_reply");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
      $(".tombol_reply").css("display","none");
    }
  });
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//like
function like(){
  var like = 1;
  // var user_id = $("#user_id").val();
  var post_id = $("#post_id").val();
  $.ajax({
    url:"/like",
    method:"GET",
    data:{ like:like, post_id:post_id },
    success: function(data){
      $("#total_like").html(data);
    }
  });
}


function cancel(){
  $(".reply").css("display", "none");
	$(".tombol_reply").css("display", "block");
}

// Slideimage
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlide");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  slides[slideIndex-1].style.display = "block";  
}
