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
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _js_cart__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./js/cart */ "./src/js/cart.js");
/* harmony import */ var _js_cart__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_js_cart__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _js_menu__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./js/menu */ "./src/js/menu.js");
/* harmony import */ var _js_menu__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_js_menu__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _js_animate__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./js/animate */ "./src/js/animate.js");
/* harmony import */ var _js_animate__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_js_animate__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _js_loadMore__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./js/loadMore */ "./src/js/loadMore.js");
/* harmony import */ var _js_loadMore__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_js_loadMore__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _js_variants__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./js/variants */ "./src/js/variants.js");
/* harmony import */ var _js_variants__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_js_variants__WEBPACK_IMPORTED_MODULE_4__);






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

/***/ "./src/js/animate.js":
/*!***************************!*\
  !*** ./src/js/animate.js ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports) {

// Animate in
function animateInViewport() {
  var windowHeight = window.innerHeight;
  var elements = document.querySelectorAll('.animate:not(.activated):not(.animating)');
  var array = [];

  for (var i = 0; i < elements.length; i++) {
    var element = elements[i];
    var positionFromTop = elements[i].getBoundingClientRect().top;

    if (positionFromTop - windowHeight <= -150 || element.classList.contains('run')) {
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

document.addEventListener('scroll', animateInViewport);
window.addEventListener('resize', animateInViewport);
animateInViewport();

/***/ }),

/***/ "./src/js/cart.js":
/*!************************!*\
  !*** ./src/js/cart.js ***!
  \************************/
/*! no static exports found */
/***/ (function(module, exports) {

jQuery(function ($) {
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
    // Add product to cart
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
      var variationID = button.dataset.variationid ? '&variation_id=' + button.dataset.variationid : '';
      fetch('/?add-to-cart=' + button.dataset.id + variationID).then(function () {
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
  });
});

/***/ }),

/***/ "./src/js/loadMore.js":
/*!****************************!*\
  !*** ./src/js/loadMore.js ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports) {

//// Load more functionality
jQuery(function ($) {
  $('.loadmore').click(function () {
    var button = $(this),
        data = {
      'action': 'loadmore',
      'query': attr.posts,
      'page': attr.current_page
    };
    var initialText = button.text();
    $.ajax({
      // you can also use $.post here
      url: attr.ajaxurl,
      // AJAX handler
      data: data,
      type: 'POST',
      beforeSend: function beforeSend(xhr) {
        button.text('Loading...'); // change the button text, you can also add a preloader image
      },
      success: function success(data) {
        if (data) {
          $('.loadMoreTarget').append(data); // insert new posts

          attr.current_page++;
          button.text(initialText);
          if (attr.current_page == attr.max_page) button.remove(); // if last page, remove the button
          // you can also fire the "post-load" event here if you use a plugin that requires it
          // $( document.body ).trigger( 'post-load' );
        } else {
          button.remove(); // if no data, remove the button as well
        }
      }
    });
  });
});

/***/ }),

/***/ "./src/js/menu.js":
/*!************************!*\
  !*** ./src/js/menu.js ***!
  \************************/
/*! no static exports found */
/***/ (function(module, exports) {

jQuery(function ($) {
  document.addEventListener('click', function (e) {
    // Toggle Mobile Menu
    if (e.target.closest('.burger-menu')) {
      $('#mobile-nav').toggleClass('active');
    } // Open Mobile Menu


    if (e.target.closest('#single-product .nav a')) {
      e.preventDefault();
      var button = e.target.closest('#single-product .nav a');
      if (button.classList.contains("active")) return;
      button.parentNode.querySelectorAll('a').forEach(function (a) {
        if (button === a) {
          a.classList.add('active');
          $('section.' + a.dataset.section).removeClass('hidden');
        } else {
          a.classList.remove('active');
          $('section.' + a.dataset.section).addClass('hidden');
        }
      });
    }

    ;
  });
});

/***/ }),

/***/ "./src/js/variants.js":
/*!****************************!*\
  !*** ./src/js/variants.js ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports) {

jQuery(function ($) {
  var _this = this;

  if (!$('#variants').length) {
    return;
  }

  $('#variants').change(function () {
    var is_purchasable = $(_this).find(':selected').attr('data-is_purchasable');
    var is_in_stock = $(_this).find(':selected').attr('data-is_in_stock');
    var id = $(_this).find(':selected').attr('data-id');
    var currency_symbol = $(_this).find(':selected').attr('data-currency_symbol');
    var onsale = $(_this).find(':selected').attr('data-sales-price');
    var salesPrice = onsale + currency_symbol;
    var price = $(_this).find(':selected').attr('data-price') + currency_symbol;

    if (onsale) {
      $('.price').addClass('onsale');
      $('.sales-price').removeClass('hidden');
      $('.sales-price').text(price);
      $('.displayPrice').text(salesPrice);
    } else {
      $('.sales-price').addClass('hidden');
      $('.price').removeClass('onsale');
      $('.displayPrice').text(price);
    }

    $('.add-to-cart-button').attr('data-variationId', id);
  });
  window.addEventListener('load', function () {
    $('#variants').trigger('change');
  });
});

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