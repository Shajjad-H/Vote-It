function hoverBtns() {
  let cards = $('.hover-btns');
  cards.mouseenter(function (evt) {    
    $(this).children('.btns').collapse('show');
  }).mouseleave(function (evt) {
    $(this).children('.btns').collapse('hide');
  })
}

