var h3Select = document.getElementsByClassName('cerrado');
var totalH3 = h3Select.length;

for (let i = 0; i < totalH3; i++) {

  h3Select[i].addEventListener('click', function() {

    var ele = document.querySelectorAll('.parts_menu ul');
    var eleAfter = document.querySelectorAll('.parts_menu h3');

    if ( ele[i].style.visibility == 'visible' ) {
      ele[i].style.visibility = 'hidden';
      ele[i].style.height = '0px';
    } else {
      ele[i].style.visibility = 'visible';
      ele[i].style.height = 'auto';
    }

  });

}
