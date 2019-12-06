$(document).ready(function () {

  // slides to roll on every 15 second
  $("#myCarousel").carousel({interval: 15000});


  $('ul.nav li.dropdown').hover(function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
  }, function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);


  });

  window.onload = function() {
    window.setTimeout(fadeout, 4000); //4 seconds
  }
  
  // function fadeout() {
  //   document.getElementById('name').style.opacity = '0';
  // }


  //* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}



// function openNav(){
//   document.getElementsByClassName("openbtn").style.display = "none";
//   document.getElementsByClassName("sidebar").style.display = "display";

// }

// if (window.matchMedia("(max-width: 800px)").matches) {
//   document.getElementsByClassName("openbtn").style.display = "display";
//   document.getElementsByClassName("sidebar").style.display = "none";

// }

  // $('.legislation').hover(function(){    
  //   $('.jeffCity, .events, .memberSuccess').stop(true,true).fadeOut(1000);
  //   $('.legislation').css({'width':'700px'});
  //   $('.legislation').css({'height':'65vw'});
  //   },
  // function(){
  //   $('.legislation').css({'width': 'initial', 'height':'400px'});
  //   $('.events, .memberSuccess, .jeffCity').stop(true, true).delay(400).fadeIn(100);

  // });

  $("#legis").click(function(){
    $('.jeffCity, .events, .memberSuccess, #legis, #jeff, #member').hide();
    $('.legislation').css({'width':'800px', 'height':'50vw'});
    $('#legisNo').css({'visibility':'visible'});
  });

    $('#legisNo').click(function(){
      $('#legisNo').css({'visibility':'hidden'});
      $('.legislation').css({'width': 'initial', 'height':'400px'});      
    $('.jeffCity, .events, .memberSuccess, #legis, #jeff, #member').show();
    });


  $("#jeff").click(function(){
    $('.legislation, .events, .memberSuccess, #legis, #jeff, #member').hide();
    $('.jeffCity').css({'width':'800px', 'height':'50vw'});
    $('#jeffLe').css({'visibility':'visible'});
  });

    $('#jeffLe').click(function(){
      $('#jeffLe').css({'visibility':'hidden'});
      $('.jeffCity').css({'width': 'initial', 'height':'650px'});      
    $('.legislation, .events, .memberSuccess, #legis, #jeff, #member').show();
    });

    $("#member").click(function(){
      $('.legislation, .events, .jeffCity, #legis, #jeff, #member').hide();
      $('.memberSuccess').css({'width':'800px', 'height':'50vw'});
      $('#memberLe').css({'visibility':'visible'});
    });

      $('#memberLe').click(function(){
        $('#memberLe').css({'visibility':'hidden'});
        $('.memberSuccess').css({'width': 'initial', 'height':'400px'});      
      $('.legislation, .events, .jeffCity, #legis, #jeff, #member').show();
      });


  $('#jeff').click(function () {
    $('.textIn').css({ 'display': 'none' });
    $('#newShow, #jeffCity, #extraJeff,#jeffLe').css({ 'display': 'block' });
  });

  $('#jeffLe').click(function () {
    $('#newShow, #jeffCity,#extraJeff').css({ 'display': 'none' });
    $('.textIn').css({ 'display': 'block' });
  });

  $('#legis').click(function () {
    $('.textIn').css({ 'display': 'none' });
    $('#newShow, #legislation, #legisLe, #extraLegis').css({ 'display': 'block' });
  });

  $('#legisLe').click(function () {
    $('#newShow, #legislation, #extraLegis').css({ 'display': 'none' });
    $('.textIn').css({ 'display': 'block' });
  });

  $('#member').click(function () {
    $('.textIn').css({ 'display': 'none' });
    $('#newShow, #memberSuccess, #memberLe, #extraMember').css({ 'display': 'block' });
  });

  $('#memberLe').click(function () {
    $('#newShow, #memberSuccess, #extraMember').css({ 'display': 'none' });
    $('.textIn').css({ 'display': 'block' });
  });

  // $('#pdf').click(function() {
  //   var options = {
  //     };
  //   var pdf = new jsPDF('p', 'pt', 'a4');
  //   pdf.fromHTML($('#jeffCity'), 15, 15, options, function() {
  //     pdf.save('jeffCity.pdf');
  //   });
  // });


  var doc = new jsPDF();

  var specialElementHandlers = {
    '#editor': function (element, renderer) {
      return true;
    }
  };

  $('#pdfJeff').click(function () {
    doc.fromHTML($('#jeffCity').html(), 15, 15, {
      'width': 170,
      'elementHandlers': specialElementHandlers
    });
    doc.save('jeffCity.pdf');
  });

  $('#pdfLegis').click(function () {
    doc.fromHTML($('#legislation').html(), 15, 15, {
      'width': 170,
      'elementHandlers': specialElementHandlers
    });
    doc.save('Legislation.pdf');
  });

  $('#pdfMember').click(function () {
    doc.fromHTML($('#memberSuccess').html(), 15, 15, {
      'width': 170,
      'elementHandlers': specialElementHandlers
    });
    doc.save('Member.pdf');
  });
  
});
/* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.getElementById("openBtn").style.display = "none";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
  document.getElementById("openBtn").style.display = "block";
}

function copyFunction() {
  var copyText = document.getElementById("copyText");
  copyText.select();
  document.execCommand("copy");
}
