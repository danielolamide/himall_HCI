var starsGroup, no_of_stars, stars, rating;
window.onload = function() {
  starsGroup = document.getElementById("star-group");
  no_of_stars = 5;
  stars = starsGroup.children;
  rating = 0;
};
function setRatingHandler(e) {
  rating = e.getAttribute("data");
  resetRating(no_of_stars, stars);
  for (var x = 0; x < rating; x++) {
    stars[x].classList.add("checked");
  }
  console.log(rating, "starzz rating");
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.onreadystatechange = function()
  {
      if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
      {
          alert(xmlHttp.responseText);
      }
  }
  xmlHttp.open("post", "postRating.php"); 
  xmlHttp.send(rating); 
}

function resetRating(no_of_stars, stars) {
  for (var x = 0; x < no_of_stars; x++) {
    if (stars[x].classList.contains("checked")) {
      stars[x].classList.remove("checked");
    }
  }
}
function resetHover(no_of_stars, stars) {
  for (var x = 0; x < no_of_stars; x++) {
    if (stars[x].classList.contains("hovered")) {
      stars[x].classList.remove("hovered");
    }
  }
}

function startHover(e) {
  rating = e.getAttribute("data");
  resetRating(no_of_stars, stars);
  for (var x = 0; x < rating; x++) {
    stars[x].classList.add("hovered");
  }
}

function endHover(e) {
  rating = e.getAttribute("data");
  resetHover(no_of_stars, stars);
}
