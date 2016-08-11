jQuery(function($) {

	$(document).foundation();
	
	$('.nav-toggle').click(function( event ) {
		event.preventDefault();

	  $(this).toggleClass('open');
	  $('nav#main-menu').fadeToggle(100);
	});

	$('.menu-icon').toggle(
	  function() {
	    $('#searchform').animate({ marginTop: 164 }, 0);
	    $('.logo-img').hide();
	  },
	  function() {
	    $('#searchform').animate({ marginTop: 0 }, 0);
	    $('.logo-img').show();
	  }
	);

	$('.nav-snes li input').on('click', function(event) {
		event.preventDefault();

    $('.nav-snes li').removeClass('active');

    var $li = $(this).parent();
    $li.addClass('active');

   // var attribute = $li.data('myattribute');
    //alert(attribute);

  
  });

	$(document).scrollTop($("#my-anchor").offset().top);
	$('#my-anchor').animate({ marginTop: 50 }, 0);
});

