var index;
var indexCurrentSlide = 0;
var indexNextSlide;
var indexPrevSlide;
var imageUrl;
var caption;
var totalSlides;
var width = 100;
var duration = 5000;
var durationAnimation = 750;
var direction;


$(document).ready(function() {

// Slideshow behaviour
// Assign the images to the slideshow
totalSlides = $('#RBSlideshow > ul > li').length - 1;

	bullets();
	assignCurrentSlide();
	assignNextPrevSlides();
	$('#slideshow').on('swipeleft', function(e) {

			direction = nextSlide();
			resetInterval();
	
		});
	$('#slideshow').on("swiperight", function(e) {

			direction = prevSlide();
			resetInterval();

		});

});


// Switch to next slide

function nextSlide() {

	if ( !$('#slides').is(':animated') ) {

		animateToNext();
		setTimeout(function() {

			increaseCurrentIndex();
			assignCurrentSlide();
			animateToCurrent();
			assignNextPrevSlides();

		}, durationAnimation + 10);

	}

	else {

		return;

	}
	
};


// Switch to prev slide

function prevSlide() {

	if ( !$('#slides').is(':animated') ) {

		animateToPrev();
		setTimeout(function () {

			reduceCurrentIndex();
			assignCurrentSlide();
			animateToCurrent();
			assignNextPrevSlides();

		}, durationAnimation + 10);

	}

};


// Calculate index prev/next slide

function calculateIndex() {

	if ( indexCurrentSlide < totalSlides ) {

 		indexNextSlide = indexCurrentSlide + 1;
	}

	else {

 		indexNextSlide = 0;

	}

	if ( indexCurrentSlide > 0 ) {

 	indexPrevSlide = indexCurrentSlide - 1;

 	}

	else {

		indexPrevSlide = totalSlides;
	}

};


// Increase currentIndex of 1 (not exceding totalSlides)

function increaseCurrentIndex() {

	if ( indexCurrentSlide < totalSlides ) {

		indexCurrentSlide = indexCurrentSlide + 1;
	
	}

	else {

		indexCurrentSlide = 0;
	}

};


// Reduce the currentIndex of 1

function reduceCurrentIndex() {

	if ( indexCurrentSlide > 0 ) {

		indexCurrentSlide = indexCurrentSlide - 1;

	}

	else {
		
		indexCurrentSlide = totalSlides;
	
	}

};



// Take the src at the given index

function takeSource() {

	imageUrl = $('#RBSlideshow > ul > li > img').eq(index).attr('src');
	caption = $('#RBSlideshow > ul > li > img').eq(index).attr('data-caption');

};



// Assign the current slide

function assignCurrentSlide() {

	index = indexCurrentSlide;
	takeSource();
	$('#currentSlide').css('background-image', 'url(' + imageUrl + ')');
	$('#currentSlide > p').text(caption);
	selectedBullet();

};



// Assign the next and previous slides

function assignNextPrevSlides() {

 	calculateIndex();

	index = indexNextSlide;
 	takeSource();
	$('#nextSlide').css('background-image', 'url(' + imageUrl + ')');
	$('#nextSlide > p').text(caption);



	index = indexPrevSlide;
	takeSource();
	$('#prevSlide').css('background-image', 'url(' + imageUrl + ')');
	$('#prevSlide > p').text(caption);


};


// Animate to the next slide

function animateToNext() {

	$('#slides').animate({'left': -200 + 'vw'}, durationAnimation);

};


// Animate to the previous slide

function animateToPrev() {

	$('#slides').animate({'left': 0 + 'vw'}, durationAnimation);

};


// Animate to the current slide

function animateToCurrent() {

	$('#slides').animate({'left': -100 + 'vw'}, 0);

};


// Change slide at a given time

var nextSlideAutomatically = setInterval(nextSlide, duration + durationAnimation);

function resetInterval() {

    clearInterval(nextSlideAutomatically);
    direction;
    nextSlideAutomatically = setInterval(nextSlide, duration + durationAnimation);

};


// Create bullets

function bullets() {

	$('#slideshow').append('<div id="bullets">' + '<ul>' + '</ul>' + '</div>');	

	for ( i = 0; i <= totalSlides; i++ ) {

		$('#bullets > ul').append('<li>' + '</li>');
		$('#bullets > ul > li').click(function () {

			
			index = $('#bullets > ul > li').index(this);

			if ( indexCurrentSlide < index ) {

				indexCurrentSlide = index - 1;
				assignNextPrevSlides();
				nextSlide();

			}

			else if ( indexCurrentSlide > index ) {

				indexCurrentSlide = index + 1;
				assignNextPrevSlides();
				prevSlide();

			}

			resetInterval();

		});

	}

};
 

function selectedBullet() {

	$('#bullets > ul > li').css('background', '');
	$('#bullets > ul > li').eq(indexCurrentSlide).css('background', 'white');

 };



// apply arrow keys behaviour

$(window).keydown(function(e) {

	switch(e.which) {

		case 37:
			resetInterval();
			prevSlide();
			break;

		case 39:
			resetInterval();
			nextSlide();
			break;

		default:
			return;
			break;

	}

	e.preventDefault();

});
