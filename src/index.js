import "../css/style.scss"

import Search from "./modules/Search"
import FormSubmit from "./modules/FormSubmit"

const search = new Search()
const formSubmit = new FormSubmit()




//section 6 Animation
var items = document.querySelectorAll(".timeline li");

function isElementInViewport(el) {
  var rect = el.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

function callbackFunc() {
  for (var i = 0; i < items.length; i++) {
    if (isElementInViewport(items[i])) {
      if(!items[i].classList.contains("in-view")){
        items[i].classList.add("in-view");
      }
    } else if(items[i].classList.contains("in-view")) {
        items[i].classList.remove("in-view");
    }
  }
}

window.addEventListener("load", callbackFunc);
window.addEventListener("scroll", callbackFunc);


 
(function($) {
  $(document).ready(function () {
    $('.skill-icons').children('.active').each(function(i) {
      var row = $(this);
      setTimeout(function() {
        row.css('background','#f1f3f9');
      }, 100*i);
    });
  });
})( jQuery );

