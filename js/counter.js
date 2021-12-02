var count = document.getElementById('counter');
const btn = document.getElementById('form');

function getRandomValueBetween(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  numb = Math.floor(Math.random() * (max - min + 1)) + min;
  return numb;
}

Date.prototype.getWeek = function () {
  var target = new Date(this.valueOf());
  var dayNr = (this.getDay() + 6) % 7;
  target.setDate(target.getDate() - dayNr + 3);
  var firstThursday = target.valueOf();
  target.setMonth(0, 1);
  if (target.getDay() != 4) {
    target.setMonth(0, 1 + ((4 - target.getDay()) + 7) % 7);
  }
  return 1 + Math.ceil((firstThursday - target) / 604800000);
}

var d = new Date();

var map = {
  0: 20,
  1: 18,
  2: 17,
  3: 16,
  4: 18,
  5: 17,
  6: 14,
  7: 16,
  8: 15,
  9: 17,
  10: 19,
  11: 18,
  12: 16,
  13: 15,
  14: 14,
  15: 18,
  16: 19,
  17: 17,
  18: 18,
  19: 19,
  20: 20,
  21: 16,
  22: 15,
  23: 14,
  24: 18,
  25: 20,
  26: 19,
  27: 18,
  28: 17,
  29: 18,
  30: 19,
  31: 20,
  32: 17,
  33: 16,
  34: 15,
  35: 18,
  36: 17,
  37: 18,
  38: 16,
  39: 17,
  40: 18,
  41: 19,
  42: 20,
  43: 18,
  44: 19,
  45: 18,
  46: 17,
  47: 19,
  48: 20,
  49: 19,
  50: 16,
  51: 17,
  52: 16,
  53: 15,
  54: 19,
};

count.innerHTML = map[d.getWeek()] || 22;



// var image = document.getElementsByClassName('img_parallax');
// new simpleParallax(image);

//
//
// getCount(47 , 22);
// getCount(48 , 24);
// getCount(49 , 21);
// getCount(50 , 19);
// getCount(51 , 20);
// getCount(52 , 23);
// getCount(53 , 21);
// getCount(54 , 20);
// getCount(55 , 20);
// getCount(1 , 23);
// getCount(2 , 25);
// getCount(3 , 24);
// getCount(4 , 23);
// getCount(5 , 21);
// getCount(6 , 19);
// getCount(7 , 22);
// getCount(8 , 20);
// getCount(9 , 23);
// getCount(10 , 24);
// getCount(11 , 21);
// getCount(12 , 20);
// getCount(13 , 27);
// getCount(14 , 26);
// getCount(15 , 24);
// getCount(16 , 26);
// getCount(17 , 25);
// getCount(18 , 22);
// getCount(19 , 23);
// getCount(20 , 24);
// getCount(21 , 20);
// getCount(22 , 22);
// getCount(23 , 21);
// getCount(24 , 22);
// getCount(25 , 24);
// getCount(26 , 26);
// getCount(27 , 25);
// getCount(28 , 24);
// getCount(29 , 22);
// getCount(30 , 24);
// getCount(31 , 21);
// getCount(32 , 20);
// getCount(33 , 22);
// getCount(34 , 21);
// getCount(35 , 24);
// getCount(36 , 26);
// getCount(37 , 22);
// getCount(38 , 21);
// getCount(39 , 20);
// getCount(40 , 22);
// getCount(41 , 21);
// getCount(42 , 24);
// getCount(43 , 26);
// getCount(44 , 24);
// getCount(45 , 25);
// getCount(46 , 22);
