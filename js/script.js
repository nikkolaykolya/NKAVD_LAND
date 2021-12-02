window.addEventListener('orientationchange', checkOrientationChange);

function checkOrientationChange() {
	let screenOrientation = window.orientation;
	console.log(screenOrientation);
	switch (screenOrientation) {
		case 0: console.log('you are in portrait-primary mode');
			break;
		case 90: goFullScreen();
			break;
		case 180: goFullScreen();
			break;
		case 270: goFullScreen();
			break;
		default: console.log('implementation of screen orientation');
	}
}

// function to request full screen of device browser

function goFullScreen() {
	var elem = document.querySelector('body');
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
	screen.lockOrientationUniversal = screen.lockOrientation || screen.mozLockOrientation || screen.msLockOrientation;

	if (screen.lockOrientationUniversal("landscape-primary")) {
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

function detectMobile() {
	var match = window.matchMedia || window.msMatchMedia;
	if (match) {
		var mq = match("(pointer:coarse)");
		return mq.matches;
	}
	return false;
}

var isMobile = detectMobile();


//Меню бургер
const burgerMenu = document.querySelector('.header__burger');
var headerMenu;
var headerLogoWhite;
var headerLogoDark;
var body;
if (burgerMenu) {
	headerMenu = document.querySelector('.header__menu');
	headerLogoWhite = document.querySelector('.header__img_color_white');
	headerLogoDark = document.querySelector('.header__img_color_dark');
	body = document.querySelector('.body');
	burgerMenu.addEventListener("click", function (e) {
		burgerMenu.classList.toggle('_active');
		headerMenu.classList.toggle('_active');
		headerLogoWhite.classList.toggle('_active');
		headerLogoDark.classList.toggle('_active');
		body.classList.toggle('_lock');
	});
}

//Переворот
var header = document.getElementById("advantageContainer");
var btns = document.getElementsByClassName("advantage__box");

function anyCardFlipped() {
	for (var j = 0; j < btns.length; j++)
		if (btns[j].dataset.active == "active")
			return true;
	return false;
}

document.querySelector('body').addEventListener(isMobile ? 'touchstart' : 'click', function (event) {
	if (anyCardFlipped()) {
		for (var j = 0; j < btns.length; j++)
			if (event.target != btns[j])
				btns[j].dataset.active = "inactive";
	}
	if (event.target.classList.contains('advantage__box')) {
		event.target.dataset.active = event.target.dataset.active == "active" ? "inactive" : "active";
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
	loop: true,
	slidesPerGroup: 1,
	freeMode: false,
});

// Переход
const smoothLinks = document.querySelectorAll('a[href^="#"]');
for (let smoothLink of smoothLinks) {
	smoothLink.addEventListener('click', function (e) {
		e.preventDefault();
		const od = smoothLink.getAttribute('href').replace('#', '');
		const pxTop = '80';
		const blockOffset = document.getElementById(od).getBoundingClientRect().top + window.pageYOffset - pxTop;
		window.scrollTo({ top: blockOffset, behavior: 'smooth' });
		console.log(window.pageYOffset);
		if (burgerMenu.classList.contains('_active')) {
			burgerMenu.classList.toggle('_active');
			headerMenu.classList.toggle('_active');
			headerLogoWhite.classList.toggle('_active');
			headerLogoDark.classList.toggle('_active');
			body.classList.toggle('_lock');
		};
	});
};

var now = new Date();
var nowHour = now.getUTCHours();
var nowDay = now.getDay();
const formResult = document.getElementById('form_result');
const formResultText = document.getElementById('form_result_text');
const circleLoader = document.getElementById('circleLoader')
const checkMark = document.getElementById('checkmark')

document.addEventListener('DOMContentLoaded', function () {
	const form = document.getElementById('form');
	form.addEventListener('submit', formSend);

	async function formSend(e) {
		e.preventDefault();
		let error = formValidate(form);
	}

	function formValidate(form) {
		let error = 0;
		let formReq = document.querySelectorAll('input');
		let formMap = {};
		for (let index = 0; index < formReq.length; index++) {
			const input = formReq[index];
			formMap[input.name] = input.value;

			if (!input.classList.contains('_req'))
				continue;

			formRemoveError(input);

			if (input.classList.contains('_email')) {
				if (emailIsInvalid(input)) {
					formAddError(input);
					error++;
					console.log("Error email validation");

				}
			}
			else {
				if (input.value === '') {
					formAddError(input);
					error++;
					console.log("Error " + input.name + " validation");

				}
			}
		}

		if (error == 0) {
			console.log(formMap);
			formResult.style.display = "block";
			if (nowHour < 7 | nowHour > 16 | nowDay === 6 | nowDay === 0) {
				formResultText.innerHTML = "Наше рабочее время Пн - Пт с 9:00 до 18:00";
			} else {
				formResultText.innerHTML = "Наш менеджер свяжется с вами в течении 15-ти минут!";
			}
		}

	}
	function formAddError(input) {
		input.parentElement.classList.add('_error');
		input.classList.add('_error');
	}
	function formRemoveError(input) {
		input.parentElement.classList.remove('_error');
		input.classList.remove('_error');
	}
	function emailIsInvalid(input) {
		return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value);
	}


});
