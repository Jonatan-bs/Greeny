/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/app.js":
/*!********************!*\
  !*** ./src/app.js ***!
  \********************/
/*! no static exports found */
/***/ (function(module, exports) {

var $ = jQuery;

function updateCartAmount(amount) {
  $('header.greeny .add-to-cart.symbol .qty').show().html(amount);
  $('#mobile-menu .add-to-cart.symbol .qty').show().html(amount);
} //Update amount when cart is updated


$(document.body).on('updated_cart_totals', function () {
  // Get the formatted cart total
  var amount = Array.from($('input.qty')).reduce(function (accumulator, currentValue) {
    return accumulator + Number(currentValue.value);
  }, 0);
  updateCartAmount(amount);
});
document.addEventListener('click', function (e) {
  // Open Mobile Menu
  if (e.target.closest('.burger-menu')) {
    $('#mobile-nav').toggleClass('active');
  } // Add product to cart


  if (e.target.closest('.add-to-cart-button')) {
    var button = e.target.closest('.add-to-cart-button'); // Button add to cart button

    var id = button.dataset.id;
    $(button).children().animate({
      "opacity": .1
    }, 100); // Show spinner

    var spinner = document.createElement('img');
    spinner.classList.add('spinner');
    var spinnerSrc = button.classList.contains('light') ? '/spinner-light.svg' : '/spinner.svg';
    spinner.src = attr.imageurl + spinnerSrc;
    button.appendChild(spinner);
    fetch('/?add-to-cart=' + button.dataset.id).then(function () {
      var tick = document.createElement('img');
      tick.classList.add('tick');
      var tickSrc = button.classList.contains('light') ? '/tick-light.svg' : '/tick.svg';
      tick.src = attr.imageurl + tickSrc;
      button.replaceChild(tick, spinner);
      updateCartAmount(++attr.cartQty);
      setTimeout(function () {
        tick.parentNode.removeChild(tick);
        $(button).children().animate({
          "opacity": 1
        }, 300);
      }, 1000);
    })["catch"](function (e) {
      console.log('error');
      console.log(e);
    });
  }
}); // Animate in

function checkPosition() {
  var windowHeight = window.innerHeight;
  var elements = document.querySelectorAll('.animate:not(.activated):not(.animating)');
  var array = [];

  for (var i = 0; i < elements.length; i++) {
    var element = elements[i];
    var positionFromTop = elements[i].getBoundingClientRect().top;

    if (positionFromTop - windowHeight <= -150) {
      if (element.classList.contains('sequence')) {
        element.classList.add('animating');
        array.push(element);
      } else {
        element.classList.add('activated');
      }
    }
  }

  if (array.length) {
    array.forEach(function (elm, i) {
      setTimeout(function () {
        elm.classList.add('activated');
      }, i * 100);
    });
  }
}

document.querySelector('body').addEventListener('scroll', checkPosition);
window.addEventListener('resize', checkPosition);
checkPosition();

/***/ }),

/***/ "./src/app.scss":
/*!**********************!*\
  !*** ./src/app.scss ***!
  \**********************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./src/editor.scss":
/*!*************************!*\
  !*** ./src/editor.scss ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***********************************************************!*\
  !*** multi ./src/app.js ./src/app.scss ./src/editor.scss ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/jonatanshoshan/Library/Mobile Documents/com~apple~CloudDocs/htdocs /Greeny/wp-content/themes/greeny-theme/src/app.js */"./src/app.js");
__webpack_require__(/*! /Users/jonatanshoshan/Library/Mobile Documents/com~apple~CloudDocs/htdocs /Greeny/wp-content/themes/greeny-theme/src/app.scss */"./src/app.scss");
module.exports = __webpack_require__(/*! /Users/jonatanshoshan/Library/Mobile Documents/com~apple~CloudDocs/htdocs /Greeny/wp-content/themes/greeny-theme/src/editor.scss */"./src/editor.scss");


/***/ })

/******/ });