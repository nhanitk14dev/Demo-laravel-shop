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
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "./";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function($) {// Comment
function function_name() {}
function_name();

//  Run a jquery function on window events: load, resize, and scroll
$(window).on("load resize scroll", function (e) {
    function_name();
});
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(3)))

/***/ }),
/* 1 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 2 */
/***/ (function(module, exports) {

throw new Error("Module build failed: ModuleNotFoundError: Module not found: Error: Can't resolve './fonts/ElegantIcons.eot' in 'E:\\Xampp\\htdocs\\html\\assets\\less'\n    at factoryCallback (E:\\Xampp\\htdocs\\html\\node_modules\\webpack\\lib\\Compilation.js:264:39)\n    at factory (E:\\Xampp\\htdocs\\html\\node_modules\\webpack\\lib\\NormalModuleFactory.js:247:20)\n    at resolver (E:\\Xampp\\htdocs\\html\\node_modules\\webpack\\lib\\NormalModuleFactory.js:65:21)\n    at asyncLib.parallel.e (E:\\Xampp\\htdocs\\html\\node_modules\\webpack\\lib\\NormalModuleFactory.js:138:21)\n    at E:\\Xampp\\htdocs\\html\\node_modules\\webpack\\node_modules\\async\\dist\\async.js:3838:9\n    at E:\\Xampp\\htdocs\\html\\node_modules\\webpack\\node_modules\\async\\dist\\async.js:421:16\n    at iteratorCallback (E:\\Xampp\\htdocs\\html\\node_modules\\webpack\\node_modules\\async\\dist\\async.js:996:13)\n    at E:\\Xampp\\htdocs\\html\\node_modules\\webpack\\node_modules\\async\\dist\\async.js:906:16\n    at E:\\Xampp\\htdocs\\html\\node_modules\\webpack\\node_modules\\async\\dist\\async.js:3835:13\n    at resolvers.normal.resolve (E:\\Xampp\\htdocs\\html\\node_modules\\webpack\\lib\\NormalModuleFactory.js:130:23)\n    at onResolved (E:\\Xampp\\htdocs\\html\\node_modules\\enhanced-resolve\\lib\\Resolver.js:70:11)\n    at loggingCallbackWrapper (E:\\Xampp\\htdocs\\html\\node_modules\\enhanced-resolve\\lib\\createInnerCallback.js:31:19)\n    at afterInnerCallback (E:\\Xampp\\htdocs\\html\\node_modules\\enhanced-resolve\\lib\\Resolver.js:138:10)\n    at loggingCallbackWrapper (E:\\Xampp\\htdocs\\html\\node_modules\\enhanced-resolve\\lib\\createInnerCallback.js:31:19)\n    at Resolver.applyPluginsAsyncSeriesBailResult1 (E:\\Xampp\\htdocs\\html\\node_modules\\tapable\\lib\\Tapable.js:181:46)\n    at innerCallback (E:\\Xampp\\htdocs\\html\\node_modules\\enhanced-resolve\\lib\\Resolver.js:125:19)\n    at loggingCallbackWrapper (E:\\Xampp\\htdocs\\html\\node_modules\\enhanced-resolve\\lib\\createInnerCallback.js:31:19)\n    at E:\\Xampp\\htdocs\\html\\node_modules\\tapable\\lib\\Tapable.js:283:15\n    at E:\\Xampp\\htdocs\\html\\node_modules\\enhanced-resolve\\lib\\UnsafeCachePlugin.js:38:4\n    at loggingCallbackWrapper (E:\\Xampp\\htdocs\\html\\node_modules\\enhanced-resolve\\lib\\createInnerCallback.js:31:19)\n    at afterInnerCallback (E:\\Xampp\\htdocs\\html\\node_modules\\enhanced-resolve\\lib\\Resolver.js:138:10)\n    at loggingCallbackWrapper (E:\\Xampp\\htdocs\\html\\node_modules\\enhanced-resolve\\lib\\createInnerCallback.js:31:19)\n    at Resolver.applyPluginsAsyncSeriesBailResult1 (E:\\Xampp\\htdocs\\html\\node_modules\\tapable\\lib\\Tapable.js:181:46)\n    at innerCallback (E:\\Xampp\\htdocs\\html\\node_modules\\enhanced-resolve\\lib\\Resolver.js:125:19)\n    at loggingCallbackWrapper (E:\\Xampp\\htdocs\\html\\node_modules\\enhanced-resolve\\lib\\createInnerCallback.js:31:19)\n    at E:\\Xampp\\htdocs\\html\\node_modules\\tapable\\lib\\Tapable.js:283:15\n    at innerCallback (E:\\Xampp\\htdocs\\html\\node_modules\\enhanced-resolve\\lib\\Resolver.js:123:11)\n    at loggingCallbackWrapper (E:\\Xampp\\htdocs\\html\\node_modules\\enhanced-resolve\\lib\\createInnerCallback.js:31:19)\n    at E:\\Xampp\\htdocs\\html\\node_modules\\tapable\\lib\\Tapable.js:283:15\n    at resolver.doResolve.createInnerCallback (E:\\Xampp\\htdocs\\html\\node_modules\\enhanced-resolve\\lib\\DescriptionFilePlugin.js:44:6)");

/***/ }),
/* 3 */
/***/ (function(module, exports) {

module.exports = jQuery;

/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(0);
__webpack_require__(1);
module.exports = __webpack_require__(2);


/***/ })
/******/ ]);
