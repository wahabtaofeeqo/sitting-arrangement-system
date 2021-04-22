(function($) {
	
	"use strict";

	if (exist(".owl-carousel")) {
		$(".owl-carousel").owlCarousel({
			animateOut: 'slideOutDown',
			animateIn: 'slideInUp',
			margin:10,
			stagePadding:30,
			smartSpeed:450,
			dots: false
		});
	}

	// newsletter
	$("#newsletter").submit(function(e) {
		e.preventDefault();

		var form = $(this);
		var formData = $(form).serialize();

		$.ajax({
			url: $(form).attr("action"),
			type: $(form).attr("method"),
			data: formData,
			dataType: 'json',
			success: function(response) {
				if (response['error']) {
					$.toast(response['errorMessage']);
				}
				else {

					// Clear form
					$.toast(response['message']);
					$(form).reset();
				}
			},
			error: function(error) {
				log(error);
			}
		})
	}); // End 


	// Admin Products
	if (exist("#table-products")) {
		$("#table-products").DataTable();
	}


	// newsletter
	$("#addItemForm").submit(function(e) {
		e.preventDefault();

		var form = $(this);
		var formData = $(form).serialize();

		$.ajax({
			url: $(form).attr("action"),
			type: $(form).attr("method"),
			data: formData,
			dataType: 'json',
			success: function(response) {
				if (response['error']) {
					$.toast(response['errorMessage']);
				}
				else {

					// Clear form
					$.toast(response['message']);
					
					setTimeout(function() {
						location.href = "home";
					}, 5000)
				}
			},
			error: function(error) {
				log(error);
			}
		})
	}); // End 

	// Testimonial Carousel
	$(".testimonial-carousel").owlCarousel({
		animateOut: 'slideOutDown',
		animateIn: 'flipInX',
		items:1,
		margin:30,
		stagePadding:30,
		smartSpeed:450,
		loop: true
	});

	// Testimonial Carousel
	$(".admin-testimonial-carousel").owlCarousel({
		items:1,
		margin:30,
		smartSpeed:450,
		loop: true,
	    margin:10
	});


	// Button Testimonial
	$(".btn-testimonial").click(function(e) {
		e.preventDefault();

		var form = $(this).parents("form"),
			formData = $(form).serialize();

		$.ajax({
			url: $(form).attr("action"),
			type: $(form).attr("method"),
			data: formData,
			dataType: 'json',
			success: function(response) {
				if (response == 'done') {

					// Clear form
					$(form).reset();
				
					// Hide modal
					$("#testimonialModel").modal('hide');

					
					alert(response);
				}
			},
			error: function(error) {
				log(error);
			}
		})
	}); // End Testimonial 

	// Newsletter
	$(".btn-newsletter").click(function(e) {
		e.preventDefault();

		var form = $(this).parents('form');
		newsLetter(form);
	}); // End newsletter


	// Like Design
	$(".link-like").click(function(e) {
		e.preventDefault();

		likeDesign($(this));
	});// End


	// About us update button
	$("#admin-about-us-btn").click(function(e) {
		e.preventDefault();

		var 
			oldAboutUs = $(this).parent().siblings('p').text(),
			newAboutUs = $(this).parent().find('textarea').val(),
			form = $(this).parent(),
			formData = $(form).serialize();


		if (newAboutUs == "")
			return;

		if (newAboutUs == oldAboutUs) {
			alert('You have not make any changes');
			return;
		}

		$.ajax({
			url: $(form).attr('action'),
			type: $(form).attr('method'),
			data: formData,
			dataType: 'json',
			success: function(response) {

				alert(response);

				$(form).reset();
			},
			error: function(error) {
				log(error);
			}
		});
	});  // End about us update


	// Update website policy
	$("#admin-policy-btn").click(function(e) {
		e.preventDefault();

		var 
			form = $(this).parent(),
			formData = $(form).serialize(),
			oldPolicy = $(form).siblings('p').text(),
			newPolicy = $(form).find('textarea').val();

		if (newPolicy == "")
			return;

		if (newPolicy == oldPolicy) {
			alert('You have not make any changes: ' + oldPolicy);
			return;
		}

		$.ajax({
			url: $(form).attr('action'),
			type: $(form).attr('method'),
			data: formData,
			dataType: 'json',
			success: function(response) {

				alert(response);

				$(form).reset();
			},
			error: function(error) {
				log(error);
			}
		});
	}); // End policy update


	// Contact us section
	$(document).ready(function() {

		$(".btn-contact").click(function(e) {

			e.preventDefault();

			var form = $(this).parents("form"),
				formData = $(form).serialize(),
				errorMsg = "";

			$.ajax({
				url: $(form).attr('action'),
				type: $(form).attr('method'),
				data: formData,
				dataType: 'json',
				success: function(response) {

					if (typeof response === 'object') {

						if (response['name'] != "") {
							errorMsg = response['name'];

							$(form).find('small.error-msg-name').text(errorMsg);
						}

						if (response['email'] != "") {
							errorMsg = response['email'];

							$(form).find('small.error-msg-email').text(errorMsg);
						}

						if (response['subject'] != "") {
							errorMsg = response['subject'];

							$(form).find('small.error-msg-sub').text(errorMsg);
						}

						if (response['phone'] != "") {
							errorMsg = response['phone'];

							$(form).find('small.error-msg-phone').text(errorMsg);
						}

						if (response['message'] != "") {
							errorMsg = response['message'];

							$(form).find('small.error-msg-text').text(errorMsg);
						}
					}
					else if (response == "sent") {
						alert("Thank you for contacting us. We will get back to you soon.");
						$(form).reset();
					}
					else {
						alert(response);
						$(form).reset();
					}
				},
				error: function(error) {
					alert("Error occur while processing your request");
					log(error);
				}
			})
		});
	})// End contact us

	// Toggle the side navigation
	 $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
	    $("body").toggleClass("sidebar-toggled");
	    $(".sidebar").toggleClass("toggled");
	    if ($(".sidebar").hasClass("toggled")) {
	      $('.sidebar .collapse').collapse('hide');
	    };
	});

	// Close any open menu accordions when window is resized below 768px
	$(window).resize(function() {
	    if ($(window).width() < 768) {
	      $('.sidebar .collapse').collapse('hide');
	    };
	});

	// Prevent the content wrapper from scrolling when the fixed side navigation hovered over
	$('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
	    if ($(window).width() > 768) {
	      var e0 = e.originalEvent,
	        delta = e0.wheelDelta || -e0.detail;
	      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
	      e.preventDefault();
	    }
	});

	// Scroll to top button appear
	$(document).on('scroll', function() {
	    var scrollDistance = $(this).scrollTop();
	    if (scrollDistance > 100) {
	      $('.scroll-to-top').fadeIn();
	    } else {
	      $('.scroll-to-top').fadeOut();
	    }
	});

	// Smooth scrolling using jQuery easing
	$(document).on('click', 'a.scroll-to-top', function(e) {
	    var $anchor = $(this);
	    $('html, body').stop().animate({
	      scrollTop: ($($anchor.attr('href')).offset().top)
	    }, 1000, 'easeInOutExpo');
	    
	    e.preventDefault();
	});

}) (jQuery);


function log(msg) {
	console.log(msg);
}

function exist(ele) {
	return $(ele).length > 0;
}

function newsLetter(form) {

	$email = $(form).find('input').val();

	if ($email == "" || $email == null) {
		alert("Pleaser Enter you Email");
		return;
	}

	$.ajax({
		url: $(form).attr('action'),
		type: 'POST',
		data: {email: $email},
		dataType: 'json',
		success: function(response) {

			if (response == 'Done') {
				alert('Thanks for subscribing.')
			}
			else if (response == 'error') {
				alert('Processing Error!');
			}
			else 
				alert(response);
		},
		error: function(error) {
			alert(error);
			log(error);
		}
	})
}


function likeDesign(obj) {

	var id = $(obj).data('id'),
		url = $(obj).data('url');

	$.ajax({
		url: url,
		type: 'POST',
		data: {id: id},
		dataType: 'json',
		success: function(response) {
			alert(response)
		},
		error: function(error) {
			alert(error);
			log(error);
		}
	})
}

$(document).ready(function(e) {
	$(".hall-delete").click(function(e) {
		e.preventDefault();

		id = $(this).attr('data-id');

		$.ajax({
			url: 'admin/delete',
			type: 'POST',
			data: {table: "hall", id: id},
			dataType: 'json',
			success: function(response) {
				alert(response);
				location.reload();
			},
			error: function(error) {
				alert(error);
				log(error);
			}
		})

	$(".student-delete").click(function(e) {
		e.preventDefault();

		id = $(this).attr('data-id');

		$.ajax({
			url: 'admin/delete',
			type: 'POST',
			data: {table: "students", id: id},
			dataType: 'json',
			success: function(response) {
				alert(response);
				location.reload();
			},
			error: function(error) {
				alert(error);
				log(error);
			}
		})

	$(".course-delete").click(function(e) {
		e.preventDefault();

		id = $(this).attr('data-id');

		$.ajax({
			url: 'admin/delete',
			type: 'POST',
			data: {table: "course", id: id},
			dataType: 'json',
			success: function(response) {
				alert(response);
				location.reload();
			},
			error: function(error) {
				alert(error);
				log(error);
			}
		})


	$(".examiner-delete").click(function(e) {
		e.preventDefault();

		id = $(this).attr('data-id');

		$.ajax({
			url: 'admin/delete',
			type: 'POST',
			data: {table: "invigilators", id: id},
			dataType: 'json',
			success: function(response) {
				alert(response);
				location.reload();
			},
			error: function(error) {
				alert(error);
				log(error);
			}
		})


	$(".admin-delete").click(function(e) {
		e.preventDefault();

		id = $(this).attr('data-id');

		if (confirm("Delete This Admin")) {
			$.ajax({
				url: 'admin/delete',
				type: 'POST',
				data: {table: "admins", id: id},
				dataType: 'json',
				success: function(response) {
					alert(response);
					location.reload();
				},
				error: function(error) {
					alert(error);
					log(error);
				}
			})
		}
	});

	if (exist("#seatingTable")) {
		$("#seatingTable").DataTable();
	}
})