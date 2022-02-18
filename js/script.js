window.addEventListener('orientationchange', checkOrientationChange);

function checkOrientationChange() {
	let screenOrientation = window.orientation;
	console.log(screenOrientation);
	switch (screenOrientation) {
		case 0:
			console.log('you are in portrait-primary mode');
			break;
		case 90:
			goFullScreen();
			break;
		case 180:
			goFullScreen();
			break;
		case 270:
			goFullScreen();
			break;
		default:
			console.log('implementation of screen orientation');
	}
}

// function to request full screen of device browser
function goFullScreen() {
	var elem = document.querySelector('html');
	if (elem.requestFullscreen) {
		elem.requestFullscreen().then(data => {
			lockScreenOrientation();
		}, err => {
			console.log('no');
		});
	} else if (elem.mozRequestFullScreen) { /* Firefox */
		elem.mozRequestFullScreen().then(data => {
			lockScreenOrientation();
		}, err => {
			console.log('Full Screen request failed');
		});
	} else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
		elem.webkitRequestFullscreen().then(data => {
			lockScreenOrientation();
		}, err => {
			console.log('Full Screen request failed');
		});
	} else if (elem.msRequestFullscreen) { /* IE/Edge */
		elem.msRequestFullscreen().then(data => {
			lockScreenOrientation();
		}, err => {
			console.log('Full Screen request failed');
		});
	}
}

//function to lock the screen. in this case the screen will be locked in portrait-primary mode.

function lockScreenOrientation() {
	window.lockOrientationUniversal = screen.lockOrientation || screen.mozLockOrientation || screen.msLockOrientation;

	if (window.lockOrientationUniversal("landscape-primary")) {
		console.log('Orientation was locked');
	} else {
		console.log('Orientation lock failed');
	}
}


VANTA.NET({
	el: "#Visual",
	mouseControls: true,
	touchControls: true,
	gyroControls: false,
	minHeight: 200.00,
	minWidth: 200.00,
	scale: 1.00,
	scaleMobile: 1.00,
	color: 0xFFD561,
	backgroundColor: 0xFF000000,
	points: 6.00,
	maxDistance: 22.00,
	spacing: 20.00
});
// VANTA.NET({
// 	el: "#Visual2",
// 	mouseControls: true,
// 	touchControls: true,
// 	gyroControls: false,
// 	minHeight: 200.00,
// 	minWidth: 200.00,
// 	scale: 1.00,
// 	scaleMobile: 1.00,
// 	color: 0xFFD561,
// 	backgroundColor: 0xFF000000,
// 	points: 8.00,
// 	maxDistance: 30.00,
// 	spacing: 30.00
// });

function detectMobile() {
	let match = window.matchMedia || window.msMatchMedia;
	if (match) {
		let mq = match("(pointer:coarse)");
		return mq.matches;
	}
	return false;
}

let isMobile = detectMobile();


//Меню бургер
const burgerMenu = document.querySelector('.header__burger');
var headerMenu;
var headerLogoWhite;
var headerLogoDark;
var headerMenuLeft;
var body;
if (burgerMenu) {
	headerMenu = document.querySelector('.header__menu');
	headerLogoWhite = document.querySelector('.header__img_color_white');
	headerLogoDark = document.querySelector('.header__img_color_dark');
	headerMenuLeft = document.querySelector('.header__menu-left');
	body = document.querySelector('html');
	burgerMenu.addEventListener("click", function (e) {
		burgerMenu.classList.toggle('_active');
		headerMenu.classList.toggle('_active');
		headerLogoWhite.classList.toggle('_active');
		headerLogoDark.classList.toggle('_active');
		headerMenuLeft.classList.add('_active');
		body.classList.toggle('_lock');
	});
}

let advantageBoxes = document.getElementsByClassName("advantage__box");
let flipCards = document.getElementsByClassName("flip-card");

function anyPriceListCardFlipped() {
	for (let j = 0; j < flipCards.length; j++)
		if (flipCards[j].dataset.active === "active")
			return true;
	return false;
}


function anyAdvantageCardFlipped() {
	for (let j = 0; j < advantageBoxes.length; j++)
		if (advantageBoxes[j].dataset.active === "active")
			return true;
	return false;
}

document.querySelector('body').addEventListener(isMobile ? 'touchstart' : 'click', function (event) {
	if (anyAdvantageCardFlipped()) {
		for (let j = 0; j < advantageBoxes.length; j++)
			if (event.target !== advantageBoxes[j])
				advantageBoxes[j].dataset.active = "inactive";
	}

	if (event.target.classList.contains('advantage__box')) {
		event.target.dataset.active = event.target.dataset.active === "active" ? "inactive" : "active";
	}
});

if (isMobile)
	document.querySelector('body').addEventListener('mouseup', function (event) {
		if (isMobile) {
			if (anyPriceListCardFlipped()) {
				for (var j = 0; j < flipCards.length; j++)
					if (event.target !== flipCards[j])
						flipCards[j].dataset.active = "inactive";
			}

			if (event.target.classList.contains('flip-card')) {
				event.target.dataset.active = event.target.dataset.active === "active" ? "inactive" : "active";
			}
		}
	});


// Инициализируем Swiper
new Swiper('.block1__content-slider_mobile', {
	slidesPerView: 2.2,
	centeredSlides: true,
	spaceBetween: 30,
	pagination: {
		el: ".swiper-pagination",
		clickable: true,
	},
	autoplay: {
		delay: 8000,
		disableOnInteraction: false,
	},
	loop: true,
	slidesPerGroup: 1,
	freeMode: false,
	breakpoints: {
		450: {
			slidesPerView: 2.2,
			spaceBetween: 60,
		},
		380: {
			slidesPerView: 2,
			spaceBetween: 50,
		},
		350: {
			slidesPerView: 1.75,
			spaceBetween: 40,
		},
		100: {
			slidesPerView: 1.5,
			spaceBetween: 30,
		}
	}
});
new Swiper('.block2__content-slider', {
	slidesPerView: 1,
	slidesPerGroup: 1,
	effect: "coverflow",
	spaceBetween: 30,
	grabCursor: true,
	centeredSlides: true,
	slidesPerView: "auto",
	loop: true,
	coverflowEffect: {
		rotate: 50,
		stretch: 0,
		depth: 100,
		modifier: 1,
		slideShadows: false,
	},
	pagination: {
		el: ".swiper-pagination",
		clickable: true,
	},
	autoplay: {
		delay: 4000,
		disableOnInteraction: false,
	},
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
});

const smoothLinks = document.querySelectorAll('a[href^="#"]');
for (let smoothLink of smoothLinks) {
	smoothLink.addEventListener('click', function (e) {
		e.preventDefault();
		const od = smoothLink.getAttribute('href').replace('#', '');
		const pxTop = '150';
		const blockOffset = document.getElementById(od).getBoundingClientRect().top + window.pageYOffset - pxTop;
		window.scrollTo({top: blockOffset, behavior: 'smooth'});
		console.log(window.pageYOffset);
		if (burgerMenu.classList.contains('_active')) {
			burgerMenu.classList.toggle('_active');
			headerMenu.classList.toggle('_active');
			headerLogoWhite.classList.toggle('_active');
			headerLogoDark.classList.toggle('_active');
			body.classList.toggle('_lock');
		}
	});
}

let popupRevealButtons = document.getElementsByClassName('popupButton');
let popupForm = document.getElementById('popupForm');
let popupShadow = document.getElementById("shadow");
for (let i = 0; i < popupRevealButtons.length; i++) {
	popupRevealButtons[i].addEventListener('click', function (e) {
		popupForm.classList.toggle('popup_to_button-active');
		popupShadow.classList.toggle('shadow');
		body.style.overflow = "hidden";
	})
}

function hideCountriesDropdown() {
	popupShadow.classList.toggle('shadow');
	body.style.overflow = "";
	popupForm.classList.toggle('popup_to_button-active');
}

popupShadow.addEventListener("click", e => hideCountriesDropdown());