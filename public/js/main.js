$(document).ready(function(){

  $('ul.nav li.dropdown').hover(function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
  }, function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
  });


  // $('.legislation').hover(function(){    
  //   $('.jeffCity, .events, .memberSuccess').stop(true,true).fadeOut(1000);
  //   $('.legislation').css({'width':'700px'});
  //   $('.legislation').css({'height':'65vw'});
  //   },
  // function(){
  //   $('.legislation').css({'width': 'initial', 'height':'400px'});
  //   $('.events, .memberSuccess, .jeffCity').stop(true, true).delay(400).fadeIn(100);
 
  // });

  // $("#legis").click(function(){
  //   $('.jeffCity, .events, .memberSuccess, #legis, #jeff, #member').hide();
  //   $('.legislation').css({'width':'800px', 'height':'50vw'});
  //   $('#legisNo').css({'visibility':'visible'});
  // });

  //   $('#legisNo').click(function(){
  //     $('#legisNo').css({'visibility':'hidden'});
  //     $('.legislation').css({'width': 'initial', 'height':'400px'});      
  //   $('.jeffCity, .events, .memberSuccess, #legis, #jeff, #member').show();
  //   });

    
  // $("#jeff").click(function(){
  //   $('.legislation, .events, .memberSuccess, #legis, #jeff, #member').hide();
  //   $('.jeffCity').css({'width':'800px', 'height':'50vw'});
  //   $('#jeffLe').css({'visibility':'visible'});
  // });

  //   $('#jeffLe').click(function(){
  //     $('#jeffLe').css({'visibility':'hidden'});
  //     $('.jeffCity').css({'width': 'initial', 'height':'650px'});      
  //   $('.legislation, .events, .memberSuccess, #legis, #jeff, #member').show();
  //   });

  //   $("#member").click(function(){
  //     $('.legislation, .events, .jeffCity, #legis, #jeff, #member').hide();
  //     $('.memberSuccess').css({'width':'800px', 'height':'50vw'});
  //     $('#memberLe').css({'visibility':'visible'});
  //   });
  
  //     $('#memberLe').click(function(){
  //       $('#memberLe').css({'visibility':'hidden'});
  //       $('.memberSuccess').css({'width': 'initial', 'height':'400px'});      
  //     $('.legislation, .events, .jeffCity, #legis, #jeff, #member').show();
  //     });


    $('#jeff').click(function(){
      $('.textIn').css({'display':'none'});
      $('#newShow, #jeffCity, #jeffLe').css({'display':'block'});
    });

    $('#jeffLe').click(function(){
        $('#newShow, #jeffCity').css({'display':'none'});
        $('.textIn').css({'display':'block'});
    });

    $('#legis').click(function(){      
      $('.textIn').css({'display':'none'});
      $('#newShow, #legislation, #legisLe').css({'display':'block'});
    });

    $('#legisLe').click(function(){
      $('#newShow, #legislation').css({'display':'none'});      
      $('.textIn').css({'display':'block'});
    });

    $('#member').click(function(){      
      $('.textIn').css({'display':'none'});
      $('#newShow, #memberSuccess, #memberLe').css({'display':'block'});
    });

    $('#memberLe').click(function(){
      $('#newShow, #memberSuccess').css({'display':'none'});      
      $('.textIn').css({'display':'block'});
    });

    $('#pdf').click(function() {
      var options = {
        };
      var pdf = new jsPDF('p', 'pt', 'a4');
      pdf.addHTML($('#jeffCity'), 15, 15, options, function() {
        pdf.save('jeffCity.pdf');
      });
    });
  });

