(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory(require('jquery')) :
        typeof define === 'function' && define.amd ? define(['jquery'], factory) :
            (global.photoviewer = factory(global.jQuery));
}(this, (function ($$1) { 'use strict';

    $$1 = $$1 && $$1.hasOwnProperty('default') ? $$1['default'] : $$1;

    var DEFAULTS = {
        // Enable modal to drag
        draggable: true,
        // Enable modal to resize
        resizable: true,
        // Enable image to move
        movable: true,
        // Enable keyboard navigation
        keyboard: true,
        // Shows the title
        title: true,
        // Min width of modal
        modalWidth: 320,
        // Min height of modal
        modalHeight: 320,
        // Enable the page content fixed
        fixedContent: true,
        // Disable the modal size fixed
        fixedModalSize: false,
        // Disable the image viewer maximized on init
        initMaximized: false,
        // Threshold of modal to browser window
        gapThreshold: 0.02,
        // Threshold of image ratio
        ratioThreshold: 0.1,
        // Min ratio of image when zoom out
        minRatio: 0.1,
        // Max ratio of image when zoom in
        maxRatio: 16,
        // Toolbar options in header
        headToolbar: ['maximize', 'close'],
        // Toolbar options in footer
        footToolbar: ['zoomIn', 'zoomOut', 'prev', 'fullscreen', 'next', 'actualSize', 'rotateRight'],
        // Customize button icon
        icons: {
            minimize: 'fa fa-window-minimize',
            maximize: 'fa fa-window-maximize',
            close: 'fa fa-close',
            zoomIn: 'fa fa-search-plus',
            zoomOut: 'fa fa-search-minus',
            prev: 'fa fa-arrow-left',
            next: 'fa fa-arrow-right',
            fullscreen: 'fa fa-photo',
            actualSize: 'fa fa-arrows-alt',
            rotateLeft: 'fa fa-rotate-left',
            rotateRight: 'fa fa-rotate-right'
        },
        // Customize language of button title
        i18n: {
            minimize: 'کوچکترین',
            maximize: 'بزرگترین',
            close: 'بستن',
            zoomIn: 'زوم بیشتر(+)',
            zoomOut: 'زوم کمتر(-)',
            prev: 'قبلی',
            next: 'بعدی',
            fullscreen: 'تمام صفحه',
            actualSize: 'اندزه واقعی(Ctrl+Alt+0)',
            rotateLeft: 'چرخش به چپ (Ctrl+,)',
            rotateRight: 'چرخش به راست (Ctrl+.)'
        },
        // Enable multiple instances
        multiInstances: true,
        // Enable animation
        initAnimation: true,
        // Disable modal position fixed when change images
        fixedModalPos: false,
        // Modal z-index
        zIndex: 1090,
        // Selector of drag handler
        dragHandle: false,
        // Callback events
        callbacks: {
            beforeOpen: $.noop,
            opened: $.noop,
            beforeClose: $.noop,
            closed: $.noop,
            beforeChange: $.noop,
            changed: $.noop
        },
        // Start images index
        index: 0
    };

    /**
     * [getImgSrc]
     * @param {[Object]}  el    [description]
     */
    function getImgSrc(el) {
        // Get data-src as image src at first
        var src = $(el).attr('data-src') ? $(el).attr('data-src') : $(el).attr('href');
        return src;
    }
    /**
     * [throttle]
     * @param  {Function} fn    [description]
     * @param  {[Number]} delay [description]
     * @return {Function}       [description]
     */

    function throttle(fn, delay) {
        var timer = null;
        return function () {
            var context = this,
                args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
                fn.apply(context, args);
            }, delay);
        };
    }
    /**
     * [preloadImg]
     * @param  {[String]}  src      [image src]
     * @param  {Function}  success  [callbacks]
     * @param  {Function}  error    [callbacks]
     */

    function preloadImg(src, success, error) {
        var img = new Image();

        img.onload = function () {
            success(img);
        };

        img.onerror = function () {
            error(img);
        };

        img.src = src;
    }
    /**
     * [requestFullscreen]
     * @param  {[type]} element [description]
     */

    function requestFullscreen(element) {
        if (element.requestFullscreen) {
            element.requestFullscreen();
        } else if (element.mozRequestFullScreen) {
            element.mozRequestFullScreen();
        } else if (element.webkitRequestFullscreen) {
            element.webkitRequestFullscreen();
        } else if (element.msRequestFullscreen) {
            element.msRequestFullscreen();
        }
    }
    /**
     * [getImageNameFromUrl]
     * @param  {[String]} url [description]
     * @return {[String]}     [description]
     */

    function getImageNameFromUrl(url) {
        var reg = /^.*?\/*([^/?]*)\.[a-z]+(\?.+|$)/ig,
            txt = url.replace(reg, '$1');
        return txt;
    }
    /**
     * [getNumFromCSSValue]
     * @param  {[String]} value [description]
     * @return {[Number]}       [description]
     */

    function getNumFromCSSValue(value) {
        var reg = /\d+/g,
            arr = value.match(reg),
            num = parseFloat(arr[0]);
        return num;
    }
    /**
     * [hasScrollbar]
     * @return {[Boolean]}       [description]
     */

    function hasScrollbar() {
        return document.body.scrollHeight > (window.innerHeight || document.documentElement.clientHeight);
    }
    /**
     * [getScrollbarWidth]
     * @return {[Number]}       [description]
     */

    function getScrollbarWidth() {
        var scrollDiv = document.createElement('div');
        scrollDiv.style.cssText = 'width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;';
        document.body.appendChild(scrollDiv);
        var scrollbarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth;
        document.body.removeChild(scrollDiv);
        return scrollbarWidth;
    }
    /**
     * [setGrabCursor]
     * @param {[Object]}  imageData    [description]
     * @param {[Object]}  stageData    [description]
     * @param {[Object]}  stage        [description]
     * @param {[Boolean]} isRotate     [description]
     */

    function setGrabCursor(imageData, stageData, stage, isRotated) {
        var imageWidth = !isRotated ? imageData.w : imageData.h,
            imageHeight = !isRotated ? imageData.h : imageData.w;

        if (imageHeight > stageData.h || imageWidth > stageData.w) {
            stage.addClass('is-grab');
        }

        if (imageHeight <= stageData.h && imageWidth <= stageData.w) {
            stage.removeClass('is-grab');
        }
    }
    /**
     * [supportTouch]
     * @return {[Boolean]}     [description]
     */

    function supportTouch() {
        return !!('ontouchstart' in window || window.DocumentTouch && document instanceof DocumentTouch);
    }

    var $W = $(window);
    var $D = $(document);
    var CLICK_EVENT = 'click';
    var RESIZE_EVENT = 'resize';
    var KEYDOWN_EVENT = 'keydown';
    var WHEEL_EVENT = 'wheel mousewheel DOMMouseScroll';
    var TOUCH_START_EVENT = supportTouch() ? 'touchstart' : 'mousedown';
    var TOUCH_MOVE_EVENT = supportTouch() ? 'touchmove' : 'mousemove';
    var TOUCH_END_EVENT = supportTouch() ? 'touchend' : 'mouseup';
    var NS = 'photoviewer';
    var CLASS_NS = '.' + NS;
    var EVENT_NS = '.' + NS;
    var PUBLIC_VARS = {
        // image moving flag
        isMoving: false,
        // modal resizing flag
        isResizing: false,
        // modal z-index setting
        zIndex: DEFAULTS.zIndex
    };

    var draggable = {
        /**
         * [draggable]
         * @param  {[Object]} modal       [the modal element]
         * @param  {[Object]} dragHandle  [the handle element when dragging]
         * @param  {[Object]} dragCancel  [the cancel element when dragging]
         */
        draggable: function draggable(modal, dragHandle, dragCancel) {
            var self = this;
            var isDragging = false;
            var startX = 0,
                startY = 0,
                left = 0,
                top = 0;

            var dragStart = function dragStart(e) {
                e = e || window.event; // Must be removed
                // e.preventDefault();

                if (self.options.multiInstances) {
                    modal.css('z-index', ++PUBLIC_VARS['zIndex']);
                } // Get clicked button


                var elemCancel = $(e.target).closest(dragCancel); // Stop modal moving when click buttons

                if (elemCancel.length) {
                    return true;
                }

                isDragging = true;
                startX = e.type === 'touchstart' ? e.originalEvent.targetTouches[0].pageX : e.clientX;
                startY = e.type === 'touchstart' ? e.originalEvent.targetTouches[0].pageY : e.clientY;
                left = $(modal).offset().left;
                top = $(modal).offset().top;
                $D.on(TOUCH_MOVE_EVENT + EVENT_NS, dragMove).on(TOUCH_END_EVENT + EVENT_NS, dragEnd);
            };

            var dragMove = function dragMove(e) {
                e = e || window.event;
                e.preventDefault();

                if (isDragging && !PUBLIC_VARS['isMoving'] && !PUBLIC_VARS['isResizing'] && !self.isMaximized) {
                    var endX = e.type === 'touchmove' ? e.originalEvent.targetTouches[0].pageX : e.clientX,
                        endY = e.type === 'touchmove' ? e.originalEvent.targetTouches[0].pageY : e.clientY,
                        relativeX = endX - startX,
                        relativeY = endY - startY;
                    $(modal).css({
                        left: relativeX + left + 'px',
                        top: relativeY + top + 'px'
                    });
                }
            };

            var dragEnd = function dragEnd() {
                $D.off(TOUCH_MOVE_EVENT + EVENT_NS, dragMove).off(TOUCH_END_EVENT + EVENT_NS, dragEnd);
                isDragging = false;
            };

            $(dragHandle).on(TOUCH_START_EVENT + EVENT_NS, dragStart);
        }
    };

    var ELEMS_WITH_GRABBING_CURSOR = "html,body,." + NS + "-modal,." + NS + "-stage,." + NS + "-button,." + NS + "-resizable-handle";
    var movable = {
        /**
         * --------------------------------------
         * 1.no movable
         * 2.vertical movable
         * 3.horizontal movable
         * 4.vertical & horizontal movable
         * --------------------------------------
         *
         * [image movable]
         * @param  {[Object]} stage   [the stage element]
         * @param  {[Object]} image   [the image element]
         */
        movable: function movable(stage, image) {
            var self = this;
            var isDragging = false;
            var startX = 0,
                startY = 0,
                left = 0,
                top = 0,
                widthDiff = 0,
                heightDiff = 0,
                lbs = 0;

            var dragStart = function dragStart(e) {
                e = e || window.event;
                e.preventDefault();
                var imageWidth = $(image).width(),
                    imageHeight = $(image).height(),
                    stageWidth = $(stage).width(),
                    stageHeight = $(stage).height();
                startX = e.type === 'touchstart' ? e.originalEvent.targetTouches[0].pageX : e.clientX;
                startY = e.type === 'touchstart' ? e.originalEvent.targetTouches[0].pageY : e.clientY; // lbs is the difference between image width and height

                lbs = !self.isRotated ? 0 : (imageWidth - imageHeight) / 2; // Width or height difference can be use to limit image right or top position

                widthDiff = !self.isRotated ? imageWidth - stageWidth : imageHeight - stageWidth;
                heightDiff = !self.isRotated ? imageHeight - stageHeight : imageWidth - stageHeight; // Modal can be dragging if image is smaller to stage

                isDragging = widthDiff > 0 || heightDiff > 0 ? true : false;
                PUBLIC_VARS['isMoving'] = widthDiff > 0 || heightDiff > 0 ? true : false; // Reclac the element position when mousedown
                // Fixed the issue of stage with a border

                left = $(image).position().left - lbs;
                top = $(image).position().top + lbs; // Add grabbing cursor

                if (stage.hasClass('is-grab')) {
                    $(ELEMS_WITH_GRABBING_CURSOR).addClass('is-grabbing');
                }

                $D.on(TOUCH_MOVE_EVENT + EVENT_NS, dragMove).on(TOUCH_END_EVENT + EVENT_NS, dragEnd);
            };

            var dragMove = function dragMove(e) {
                e = e || window.event;
                e.preventDefault();

                if (isDragging) {
                    var endX = e.type === 'touchmove' ? e.originalEvent.targetTouches[0].pageX : e.clientX,
                        endY = e.type === 'touchmove' ? e.originalEvent.targetTouches[0].pageY : e.clientY,
                        relativeX = endX - startX,
                        relativeY = endY - startY,
                        newLeft = relativeX + left,
                        newTop = relativeY + top; // vertical limit

                    if (heightDiff > 0) {
                        if (relativeY + top > lbs) {
                            newTop = lbs;
                        } else if (relativeY + top < -heightDiff + lbs) {
                            newTop = -heightDiff + lbs;
                        }
                    } else {
                        newTop = top;
                    } // horizontal limit


                    if (widthDiff > 0) {
                        if (relativeX + left > -lbs) {
                            newLeft = -lbs;
                        } else if (relativeX + left < -widthDiff - lbs) {
                            newLeft = -widthDiff - lbs;
                        }
                    } else {
                        newLeft = left;
                    }

                    $(image).css({
                        left: newLeft + 'px',
                        top: newTop + 'px'
                    }); // Update image initial data

                    $.extend(self.imageData, {
                        left: newLeft,
                        top: newTop
                    });
                }
            };

            var dragEnd = function dragEnd() {
                $D.off(TOUCH_MOVE_EVENT + EVENT_NS, dragMove).off(TOUCH_END_EVENT + EVENT_NS, dragEnd);
                isDragging = false;
                PUBLIC_VARS['isMoving'] = false; // Remove grabbing cursor

                $(ELEMS_WITH_GRABBING_CURSOR).removeClass('is-grabbing');
            };

            $(stage).on(TOUCH_START_EVENT + EVENT_NS, dragStart);
        }
    };

    var ELEMS_WITH_RESIZE_CURSOR = "html,body,." + NS + "-modal,." + NS + "-stage,." + NS + "-button";
    var resizable = {
        /**
         * ------------------------------
         * 1.modal resizable
         * 2.keep image in stage center
         * 3.other image limitations
         * ------------------------------
         *
         * [resizable]
         * @param  {[Object]} modal       [the modal element]
         * @param  {[Object]} stage       [the stage element]
         * @param  {[Object]} image       [the image element]
         * @param  {[Number]} minWidth    [the option of modalWidth]
         * @param  {[Number]} minHeight   [the option of modalHeight]
         */
        resizable: function resizable(modal, stage, image, minWidth, minHeight) {
            var self = this;
            var resizableHandleE = $("<div class=\"" + NS + "-resizable-handle " + NS + "-resizable-handle-e\"></div>"),
                resizableHandleW = $("<div class=\"" + NS + "-resizable-handle " + NS + "-resizable-handle-w\"></div>"),
                resizableHandleS = $("<div class=\"" + NS + "-resizable-handle " + NS + "-resizable-handle-s\"></div>"),
                resizableHandleN = $("<div class=\"" + NS + "-resizable-handle " + NS + "-resizable-handle-n\"></div>"),
                resizableHandleSE = $("<div class=\"" + NS + "-resizable-handle " + NS + "-resizable-handle-se\"></div>"),
                resizableHandleSW = $("<div class=\"" + NS + "-resizable-handle " + NS + "-resizable-handle-sw\"></div>"),
                resizableHandleNE = $("<div class=\"" + NS + "-resizable-handle " + NS + "-resizable-handle-ne\"></div>"),
                resizableHandleNW = $("<div class=\"" + NS + "-resizable-handle " + NS + "-resizable-handle-nw\"></div>");
            var resizableHandles = {
                'e': resizableHandleE,
                's': resizableHandleS,
                'se': resizableHandleSE,
                'n': resizableHandleN,
                'w': resizableHandleW,
                'nw': resizableHandleNW,
                'ne': resizableHandleNE,
                'sw': resizableHandleSW
            };
            $(modal).append(resizableHandleE, resizableHandleW, resizableHandleS, resizableHandleN, resizableHandleSE, resizableHandleSW, resizableHandleNE, resizableHandleNW);
            var isDragging = false;
            var startX = 0,
                startY = 0,
                modalData = {
                    w: 0,
                    h: 0,
                    l: 0,
                    t: 0
                },
                stageData = {
                    w: 0,
                    h: 0,
                    l: 0,
                    t: 0
                },
                imageData = {
                    w: 0,
                    h: 0,
                    l: 0,
                    t: 0
                },
                // lbs is the difference between image width and height
                lbs = 0,
                imgWidth = 0,
                imgHeight = 0,
                direction = 'rtl'; // modal CSS options

            var getModalOpts = function getModalOpts(dir, offsetX, offsetY) {
                // Modal should not move when its width to the minwidth
                var modalLeft = -offsetX + modalData.w > minWidth ? offsetX + modalData.l : modalData.l + modalData.w - minWidth,
                    modalTop = -offsetY + modalData.h > minHeight ? offsetY + modalData.t : modalData.t + modalData.h - minHeight;
                var opts = {
                    'e': {
                        width: Math.max(offsetX + modalData.w, minWidth) + 'px'
                    },
                    's': {
                        height: Math.max(offsetY + modalData.h, minHeight) + 'px'
                    },
                    'se': {
                        width: Math.max(offsetX + modalData.w, minWidth) + 'px',
                        height: Math.max(offsetY + modalData.h, minHeight) + 'px'
                    },
                    'w': {
                        width: Math.max(-offsetX + modalData.w, minWidth) + 'px',
                        left: modalLeft + 'px'
                    },
                    'n': {
                        height: Math.max(-offsetY + modalData.h, minHeight) + 'px',
                        top: modalTop + 'px'
                    },
                    'nw': {
                        width: Math.max(-offsetX + modalData.w, minWidth) + 'px',
                        height: Math.max(-offsetY + modalData.h, minHeight) + 'px',
                        top: modalTop + 'px',
                        left: modalLeft + 'px'
                    },
                    'ne': {
                        width: Math.max(offsetX + modalData.w, minWidth) + 'px',
                        height: Math.max(-offsetY + modalData.h, minHeight) + 'px',
                        top: modalTop + 'px'
                    },
                    'sw': {
                        width: Math.max(-offsetX + modalData.w, minWidth) + 'px',
                        height: Math.max(offsetY + modalData.h, minHeight) + 'px',
                        left: modalLeft + 'px'
                    }
                };
                return opts[dir];
            }; // image CSS options


            var getImageOpts = function getImageOpts(dir, offsetX, offsetY) {
                // Image should not move when modal width to the min width
                // The minwidth is modal width, so we should clac the stage minwidth
                var widthDiff = offsetX + modalData.w > minWidth ? stageData.w - imgWidth + offsetX - lbs : minWidth - (modalData.w - stageData.w) - imgWidth - lbs,
                heightDiff = offsetY + modalData.h > minHeight ? stageData.h - imgHeight + offsetY + lbs : minHeight - (modalData.h - stageData.h) - imgHeight + lbs,
                widthDiff2 = -offsetX + modalData.w > minWidth ? stageData.w - imgWidth - offsetX - lbs : minWidth - (modalData.w - stageData.w) - imgWidth - lbs,
                heightDiff2 = -offsetY + modalData.h > minHeight ? stageData.h - imgHeight - offsetY + lbs : minHeight - (modalData.h - stageData.h) - imgHeight + lbs; // Get image position in dragging

                var imgLeft = (widthDiff > 0 ? $(image).position().left : $(image).position().left < 0 ? $(image).position().left : 0) - lbs,
                imgTop = (heightDiff > 0 ? $(image).position().top : $(image).position().top < 0 ? $(image).position().top : 0) + lbs,
                imgLeft2 = (widthDiff2 > 0 ? $(image).position().left : $(image).position().left < 0 ? $(image).position().left : 0) - lbs,
                imgTop2 = (heightDiff2 > 0 ? $(image).position().top : $(image).position().top < 0 ? $(image).position().top : 0) + lbs;
                var opts = {
                    'e': {
                        right: widthDiff >= -lbs ? (widthDiff - lbs) / 2 + 'px' : imgLeft > widthDiff ? imgLeft + 'px' : widthDiff + 'px'
            },
                's': {
                    top: heightDiff >= lbs ? (heightDiff + lbs) / 2 + 'px' : imgTop > heightDiff ? imgTop + 'px' : heightDiff + 'px'
                },
                'se': {
                    top: heightDiff >= lbs ? (heightDiff + lbs) / 2 + 'px' : imgTop > heightDiff ? imgTop + 'px' : heightDiff + 'px',
                        right: widthDiff >= -lbs ? (widthDiff - lbs) / 2 + 'px' : imgLeft > widthDiff ? imgLeft + 'px' : widthDiff + 'px'
                },
                'w': {
                    right: widthDiff2 >= -lbs ? (widthDiff2 - lbs) / 2 + 'px' : imgLeft2 > widthDiff2 ? imgLeft2 + 'px' : widthDiff2 + 'px'
                },
                'n': {
                    top: heightDiff2 >= lbs ? (heightDiff2 + lbs) / 2 + 'px' : imgTop2 > heightDiff2 ? imgTop2 + 'px' : heightDiff2 + 'px'
                },
                'nw': {
                    top: heightDiff2 >= lbs ? (heightDiff2 + lbs) / 2 + 'px' : imgTop2 > heightDiff2 ? imgTop2 + 'px' : heightDiff2 + 'px',
                        right: widthDiff2 >= -lbs ? (widthDiff2 - lbs) / 2 + 'px' : imgLeft2 > widthDiff2 ? imgLeft2 + 'px' : widthDiff2 + 'px'
                },
                'ne': {
                    top: heightDiff2 >= lbs ? (heightDiff2 + lbs) / 2 + 'px' : imgTop2 > heightDiff2 ? imgTop2 + 'px' : heightDiff2 + 'px',
                        right: widthDiff >= -lbs ? (widthDiff - lbs) / 2 + 'px' : imgLeft > widthDiff ? imgLeft + 'px' : widthDiff + 'px'
                },
                'sw': {
                    top: heightDiff >= lbs ? (heightDiff + lbs) / 2 + 'px' : imgTop > heightDiff ? imgTop + 'px' : heightDiff + 'px',
                        right: widthDiff2 >= -lbs ? (widthDiff2 - lbs) / 2 + 'px' : imgLeft2 > widthDiff2 ? imgLeft2 + 'px' : widthDiff2 + 'px'
                }
            };
                return opts[dir];
            };

            var dragStart = function dragStart(dir, e) {
                e = e || window.event;
                e.preventDefault();
                isDragging = true;
                PUBLIC_VARS['isResizing'] = true;
                startX = e.type === 'touchstart' ? e.originalEvent.targetTouches[0].pageX : e.clientX;
                startY = e.type === 'touchstart' ? e.originalEvent.targetTouches[0].pageY : e.clientY; // Reclac the modal data when mousedown

                modalData = {
                    w: $(modal).width(),
                    h: $(modal).height(),
                    l: $(modal).offset().left,
                    t: $(modal).offset().top
                };
                stageData = {
                    w: $(stage).width(),
                    h: $(stage).height(),
                    l: $(stage).offset().left,
                    t: $(stage).offset().top
                };
                imageData = {
                    w: $(image).width(),
                    h: $(image).height(),
                    l: $(image).position().left,
                    t: $(image).position().top
                }; // lbs is the difference between image width and height

                lbs = !self.isRotated ? 0 : (imageData.w - imageData.h) / 2;
                imgWidth = !self.isRotated ? imageData.w : imageData.h;
                imgHeight = !self.isRotated ? imageData.h : imageData.w;
                direction = dir; // Add resizable cursor

                $(ELEMS_WITH_RESIZE_CURSOR).css('cursor', dir + '-resize');
                $D.on(TOUCH_MOVE_EVENT + EVENT_NS, dragMove).on(TOUCH_END_EVENT + EVENT_NS, dragEnd);
            };

            var dragMove = function dragMove(e) {
                e = e || window.event;
                e.preventDefault();

                if (isDragging && !self.isMaximized) {
                    var endX = e.type === 'touchmove' ? e.originalEvent.targetTouches[0].pageX : e.clientX,
                        endY = e.type === 'touchmove' ? e.originalEvent.targetTouches[0].pageY : e.clientY,
                        relativeX = endX - startX,
                        relativeY = endY - startY;
                    var modalOpts = getModalOpts(direction, relativeX, relativeY);
                    $(modal).css(modalOpts);
                    var imageOpts = getImageOpts(direction, relativeX, relativeY);
                    $(image).css(imageOpts);
                }
            };

            var dragEnd = function dragEnd() {
                $D.off(TOUCH_MOVE_EVENT + EVENT_NS, dragMove).off(TOUCH_END_EVENT + EVENT_NS, dragEnd); // Set grab cursor

                if (PUBLIC_VARS['isResizing']) {
                    setGrabCursor({
                        w: imgWidth,
                        h: imgHeight
                    }, {
                        w: $(stage).width(),
                        h: $(stage).height()
                    }, stage);
                }

                isDragging = false;
                PUBLIC_VARS['isResizing'] = false; // Remove resizable cursor

                $(ELEMS_WITH_RESIZE_CURSOR).css('cursor', '');
            };

            $.each(resizableHandles, function (dir, handle) {
                handle.on(TOUCH_START_EVENT + EVENT_NS, function (e) {
                    dragStart(dir, e);
                });
            });
        }
    };

    /**
     * PhotoViewer Class
     */

    var PhotoViewer =
        /*#__PURE__*/
        function () {
            function PhotoViewer(items, options, el) {
                var self = this;
                this.options = $$1.extend(true, {}, DEFAULTS, options);

                if (options && $$1.isArray(options.footToolbar)) {
                    this.options.footToolbar = options.footToolbar;
                }

                if (options && $$1.isArray(options.headToolbar)) {
                    this.options.headToolbar = options.headToolbar;
                } // Store element of clicked


                this.$el = $$1(el); // As we have multiple instances,
                // so every instance has following variables.
                // modal open flag

                this.isOpened = false; // modal maximize flag

                this.isMaximized = false; // image rotate 90*(2n+1) flag

                this.isRotated = false; // image rotate angle

                this.rotateAngle = 0; // Store image data in every instance

                this.imageData = {}; // Store modal data in every instance

                this.modalData = {
                    width: null,
                    height: null,
                    left: null,
                    top: null
                };
                this.init(items, self.options, el);
            }

            var _proto = PhotoViewer.prototype;

            _proto.init = function init(items, opts, el) {
                this.groupData = items;
                this.groupIndex = opts['index']; // Get image src

                var imgSrc = items[this.groupIndex]['src'];
                this.open();
                this.loadImg(imgSrc); // draggable & movable & resizable

                if (opts.draggable) {
                    this.draggable(this.$photoviewer, this.dragHandle, CLASS_NS + '-button');
                }

                if (opts.movable) {
                    this.movable(this.$stage, this.$image);
                }

                if (opts.resizable) {
                    this.resizable(this.$photoviewer, this.$stage, this.$image, opts.modalWidth, opts.modalHeight);
                }
            };

            _proto._creatBtns = function _creatBtns(toolbar, btns) {
                var btnsStr = '';
                $$1.each(toolbar, function (index, item) {
                    btnsStr += btns[item];
                });
                return btnsStr;
            };

            _proto._creatTitle = function _creatTitle() {
                return this.options.title ? "<div class=\"" + NS + "-title\"></div>" : '';
            };

            _proto._creatDOM = function _creatDOM() {
                var btnsTpl = {
                    minimize: "<button class=\"" + NS + "-button " + NS + "-button-minimize\" title=\"" + this.options.i18n.minimize + "\">\n                    <i class=\"" + this.options.icons.minimize + "\" aria-hidden=\"true\"></i>\n                  </button>",
                    maximize: "<button class=\"" + NS + "-button " + NS + "-button-maximize\" title=\"" + this.options.i18n.maximize + "\">\n                    <i class=\"" + this.options.icons.maximize + "\" aria-hidden=\"true\"></i>                  </button>",
                    close: "<button class=\"" + NS + "-button " + NS + "-button-close\" title=\"" + this.options.i18n.close + "\">                <i class=\"" + this.options.icons.close + "\" aria-hidden=\"true\"></i>              </button>",
                    zoomIn: "<button class=\"" + NS + "-button " + NS + "-button-zoom-in\" title=\"" + this.options.i18n.zoomIn + "\">                  <i class=\"" + this.options.icons.zoomIn + "\" aria-hidden=\"true\"></i>                </button>",
                    zoomOut: "<button class=\"" + NS + "-button " + NS + "-button-zoom-out\" title=\"" + this.options.i18n.zoomOut + "\">                  <i class=\"" + this.options.icons.zoomOut + "\" aria-hidden=\"true\"></i>                </button>",
                    prev: "<button class=\"" + NS + "-button " + NS + "-button-prev\" title=\"" + this.options.i18n.prev + "\">                <i class=\"" + this.options.icons.prev + "\" aria-hidden=\"true\"></i>              </button>",
                    next: "<button class=\"" + NS + "-button " + NS + "-button-next\" title=\"" + this.options.i18n.next + "\">                <i class=\"" + this.options.icons.next + "\" aria-hidden=\"true\"></i>              </button>",
                    fullscreen: "<button class=\"" + NS + "-button " + NS + "-button-fullscreen\" title=\"" + this.options.i18n.fullscreen + "\">                    <i class=\"" + this.options.icons.fullscreen + "\" aria-hidden=\"true\"></i>                  </button>",
                    actualSize: "<button class=\"" + NS + "-button " + NS + "-button-actual-size\" title=\"" + this.options.i18n.actualSize + "\">                      <i class=\"" + this.options.icons.actualSize + "\" aria-hidden=\"true\"></i>                    </button>",
                    rotateLeft: "<button class=\"" + NS + "-button " + NS + "-button-rotate-left\" title=\"" + this.options.i18n.rotateLeft + "\">                      <i class=\"" + this.options.icons.rotateLeft + "\" aria-hidden=\"true\"></i>                    </button>",
                    rotateRight: "<button class=\"" + NS + "-button " + NS + "-button-rotate-right\" title=\"" + this.options.i18n.rotateRight + "\">                      <i class=\"" + this.options.icons.rotateRight + "\" aria-hidden=\"true\"></i>                    </button>"
                }; // photoviewer base HTML

                var photoviewerHTML = "<div class=\"" + NS + "-modal\">\n                            <div class=\"" + NS + "-inner\">\n                              <div class=\"" + NS + "-header\">\n                                <div class=\"" + NS + "-toolbar " + NS + "-toolbar-head\">\n                                  " + this._creatBtns(this.options.headToolbar, btnsTpl) + "\n                                </div>\n                                " + this._creatTitle() + "\n                              </div>\n                              <div class=\"" + NS + "-stage\">\n                                <img class=\"" + NS + "-image\" src=\"\" alt=\"\" />\n                              </div>\n                              <div class=\"" + NS + "-footer\">\n                                <div class=\"" + NS + "-toolbar " + NS + "-toolbar-foot\">\n                                  " + this._creatBtns(this.options.footToolbar, btnsTpl) + "\n                                </div>\n                              </div>\n                            </div>\n                          </div>";
                return photoviewerHTML;
            };

            _proto.build = function build() {
                // Create photoviewer HTML string
                var photoviewerHTML = this._creatDOM(); // Make photoviewer HTML string to jQuery element


                var $photoviewer = $$1(photoviewerHTML); // Get all photoviewer element

                this.$photoviewer = $photoviewer;
                this.$header = $photoviewer.find(CLASS_NS + '-header');
                this.$headToolbar = $photoviewer.find(CLASS_NS + '-toolbar-head');
                this.$footer = $photoviewer.find(CLASS_NS + '-footer');
                this.$footToolbar = $photoviewer.find(CLASS_NS + '-toolbar-foot');
                this.$stage = $photoviewer.find(CLASS_NS + '-stage');
                this.$title = $photoviewer.find(CLASS_NS + '-title');
                this.$image = $photoviewer.find(CLASS_NS + '-image');
                this.$close = $photoviewer.find(CLASS_NS + '-button-close');
                this.$maximize = $photoviewer.find(CLASS_NS + '-button-maximize');
                this.$minimize = $photoviewer.find(CLASS_NS + '-button-minimize');
                this.$zoomIn = $photoviewer.find(CLASS_NS + '-button-zoom-in');
                this.$zoomOut = $photoviewer.find(CLASS_NS + '-button-zoom-out');
                this.$actualSize = $photoviewer.find(CLASS_NS + '-button-actual-size');
                this.$fullscreen = $photoviewer.find(CLASS_NS + '-button-fullscreen');
                this.$rotateLeft = $photoviewer.find(CLASS_NS + '-button-rotate-left');
                this.$rotateRight = $photoviewer.find(CLASS_NS + '-button-rotate-right');
                this.$prev = $photoviewer.find(CLASS_NS + '-button-prev');
                this.$next = $photoviewer.find(CLASS_NS + '-button-next'); // Add class before image loaded

                this.$stage.addClass('stage-ready');
                this.$image.addClass('image-ready'); // Reset modal z-index with multiple instances

                this.$photoviewer.css('z-index', PUBLIC_VARS['zIndex']); // Set handle element of draggable

                if (!this.options.dragHandle || this.options.dragHandle === CLASS_NS + '-modal') {
                    this.dragHandle = this.$photoviewer;
                } else {
                    this.dragHandle = this.$photoviewer.find(this.options.dragHandle);
                }
            };

            _proto.open = function open() {
                if (!this.options.multiInstances) {
                    $$1(CLASS_NS + '-modal').eq(0).remove();
                } // Fixed modal position bug


                if (!$$1(CLASS_NS + '-modal').length && this.options.fixedContent) {
                    $$1('html').css({
                        'overflow': 'hidden'
                    });

                    if (hasScrollbar()) {
                        var scrollbarWidth = getScrollbarWidth();

                        if (scrollbarWidth) {
                            $$1('html').css({
                                'padding-right': scrollbarWidth
                            });
                        }
                    }
                }

                this.build();

                this._triggerHook('beforeOpen', this.$el); // Add PhotoViewer to DOM


                $$1('body').append(this.$photoviewer);
                this.addEvents();
                this.setModalPos(this.$photoviewer);

                this._triggerHook('opened', this.$el);
            };

            _proto.close = function close() {
                this._triggerHook('beforeClose', this.$el); // Remove instance


                this.$photoviewer.remove();
                this.isOpened = false;
                this.isMaximized = false;
                this.isRotated = false;
                this.rotateAngle = 0;
                var zeroModal = !$$1(CLASS_NS + '-modal').length; // Fixed modal position bug

                if (zeroModal && this.options.fixedContent) {
                    $$1('html').css({
                        'overflow': '',
                        'padding-right': ''
                    });
                } // Reset zIndex after close


                if (zeroModal && this.options.multiInstances) {
                    PUBLIC_VARS['zIndex'] = this.options.zIndex;
                } // off events


                if (!$$1(CLASS_NS + '-modal').length) {
                    $D.off(KEYDOWN_EVENT + EVENT_NS);
                    $W.off(RESIZE_EVENT + EVENT_NS);
                }

                this._triggerHook('closed', this.$el);
            };

            _proto.setModalPos = function setModalPos(modal) {
                var winWidth = $W.width(),
                    winHeight = $W.height(),
                    scrollLeft = $D.scrollLeft(),
                    scrollTop = $D.scrollTop();
                var modalWidth = this.options.modalWidth,
                    modalHeight = this.options.modalHeight; // Set modal maximized when init

                if (this.options.initMaximized) {
                    modal.addClass(NS + '-maximize');
                    modal.css({
                        width: '100%',
                        height: '100%',
                        left: 0,
                        top: 0
                    });
                    this.isOpened = true;
                    this.isMaximized = true;
                } else {
                    // Make the modal in windows center
                    modal.css({
                        width: modalWidth,
                        height: modalHeight,
                        left: (winWidth - modalWidth) / 2 + scrollLeft + 'px',
                        top: (winHeight - modalHeight) / 2 + scrollTop + 'px'
                    });
                }
            };

            _proto.setModalSize = function setModalSize(img) {
                var self = this,
                    winWidth = $W.width(),
                    winHeight = $W.height(),
                    scrollLeft = $D.scrollLeft(),
                    scrollTop = $D.scrollTop(); // stage css value

                var stageCSS = {
                    left: this.$stage.css('left'),
                    right: this.$stage.css('right'),
                    top: this.$stage.css('top'),
                    bottom: this.$stage.css('bottom'),
                    borderLeft: this.$stage.css('border-left-width'),
                    borderRight: this.$stage.css('border-right-width'),
                    borderTop: this.$stage.css('border-top-width'),
                    borderBottom: this.$stage.css('border-bottom-width')
                }; // Modal size should calc with stage css value

                var modalWidth = img.width + getNumFromCSSValue(stageCSS.left) + getNumFromCSSValue(stageCSS.right) + getNumFromCSSValue(stageCSS.borderLeft) + getNumFromCSSValue(stageCSS.borderRight),
                    modalHeight = img.height + getNumFromCSSValue(stageCSS.top) + getNumFromCSSValue(stageCSS.bottom) + getNumFromCSSValue(stageCSS.borderTop) + getNumFromCSSValue(stageCSS.borderBottom);
                var gapThreshold = (this.options.gapThreshold > 0 ? this.options.gapThreshold : 0) + 1,
                    // modal scale to window
                    scale = Math.min(winWidth / (modalWidth * gapThreshold), winHeight / (modalHeight * gapThreshold), 1);
                var minWidth = Math.max(modalWidth * scale, this.options.modalWidth),
                    minHeight = Math.max(modalHeight * scale, this.options.modalHeight);
                minWidth = this.options.fixedModalSize ? this.options.modalWidth : Math.round(minWidth);
                minHeight = this.options.fixedModalSize ? this.options.modalHeight : Math.round(minHeight);
                var modalCSSObj = {
                    width: minWidth + 'px',
                    height: minHeight + 'px',
                    left: (winWidth - minWidth) / 2 + scrollLeft + 'px',
                    top: (winHeight - minHeight) / 2 + scrollTop + 'px'
                }; // Add modal init animation

                if (this.options.initAnimation) {
                    this.$photoviewer.animate(modalCSSObj, function () {
                        self.setImageSize(img);
                    });
                } else {
                    this.$photoviewer.css(modalCSSObj);
                    this.setImageSize(img);
                }

                this.isOpened = true;
            };

            _proto.setImageSize = function setImageSize(img) {
                var stageData = {
                    w: this.$stage.width(),
                    h: this.$stage.height()
                }; // image scale to stage

                var scale = 1;

                if (!this.isRotated) {
                    scale = Math.min(stageData.w / img.width, stageData.h / img.height, 1);
                } else {
                    scale = Math.min(stageData.w / img.height, stageData.h / img.width, 1);
                }

                this.$image.css({
                    width: Math.ceil(img.width * scale) + 'px',
                    height: Math.ceil(img.height * scale) + 'px',
                    right: (stageData.w - Math.ceil(img.width * scale)) / 2 + 'px',
                    top: (stageData.h - Math.ceil(img.height * scale)) / 2 + 'px'
                }); // Store image initial data

                $$1.extend(this.imageData, {
                    width: img.width * scale,
                    height: img.height * scale,
                    right: (stageData.w - img.width * scale) / 2,
                    top: (stageData.h - img.height * scale) / 2
                }); // Set grab cursor

                setGrabCursor({
                    w: this.$image.width(),
                    h: this.$image.height()
                }, {
                    w: this.$stage.width(),
                    h: this.$stage.height()
                }, this.$stage, this.isRotated); // loader end

                this.$photoviewer.find(CLASS_NS + '-loader').remove(); // Add image init animation

                if (this.options.initAnimation) {
                    this.$image.fadeIn();
                }
            };

            _proto.loadImg = function loadImg(imgSrc) {
                var self = this;
                var loaderHTML = "<div class=\"" + NS + "-loader\"></div>"; // loader start

                this.$photoviewer.append(loaderHTML);

                if (this.options.initAnimation) {
                    this.$image.hide();
                }

                this.$image.attr('src', imgSrc);
                preloadImg(imgSrc, function (img) {
                    // Store original data
                    self.imageData = {
                        originalWidth: img.width,
                        originalHeight: img.height
                    };

                    if (self.isMaximized || self.isOpened && self.options.fixedModalPos) {
                        self.setImageSize(img);
                    } else {
                        self.setModalSize(img);
                    }

                    self.$stage.removeClass('stage-ready');
                    self.$image.removeClass('image-ready');
                }, function () {
                    // loader end
                    self.$photoviewer.find(CLASS_NS + '-loader').remove();
                });

                if (this.options.title) {
                    this.setImgTitle(imgSrc);
                }
            };

            _proto.setImgTitle = function setImgTitle(url) {
                var caption = this.groupData[this.groupIndex].caption,
                    captionTxt = caption ? caption : getImageNameFromUrl(url);
                this.$title.text(captionTxt);
            };

            _proto.jump = function jump(index) {
                this.groupIndex = this.groupIndex + index;
                this.jumpTo(this.groupIndex);
            };

            _proto.jumpTo = function jumpTo(index) {
                index = index % this.groupData.length;

                if (index >= 0) {
                    index = index % this.groupData.length;
                } else if (index < 0) {
                    index = (this.groupData.length + index) % this.groupData.length;
                }

                this.groupIndex = index;

                this._triggerHook('beforeChange', index);

                this.loadImg(this.groupData[index].src);

                this._triggerHook('changed', index);
            };

            _proto.wheel = function wheel(e) {
                e.preventDefault();
                var delta = 1;

                if (e.originalEvent.deltaY) {
                    delta = e.originalEvent.deltaY > 0 ? 1 : -1;
                } else if (e.originalEvent.wheelDelta) {
                    delta = -e.originalEvent.wheelDelta / 120;
                } else if (e.originalEvent.detail) {
                    delta = e.originalEvent.detail > 0 ? 1 : -1;
                } // ratio threshold


                var ratio = -delta * this.options.ratioThreshold; // mouse point position relative to stage

                var pointer = {
                    x: e.originalEvent.clientX - this.$stage.offset().left + $D.scrollLeft(),
                    y: e.originalEvent.clientY - this.$stage.offset().top + $D.scrollTop()
                };
                this.zoom(ratio, pointer, e);
            };

            _proto.zoom = function zoom(ratio, origin, e) {
                // zoom out & zoom in
                ratio = ratio < 0 ? 1 / (1 - ratio) : 1 + ratio;

                if (ratio > 0.95 && ratio < 1.05) {
                    ratio = 1;
                }

                ratio = this.$image.width() / this.imageData.originalWidth * ratio; // min image size

                ratio = Math.max(ratio, this.options.minRatio); // max image size

                ratio = Math.min(ratio, this.options.maxRatio);
                this.zoomTo(ratio, origin, e);
            };

            _proto.zoomTo = function zoomTo(ratio, origin, e) {
                var $image = this.$image,
                    $stage = this.$stage,
                    imgData = {
                        w: this.imageData.width,
                        h: this.imageData.height,
                        x: this.imageData.left,
                        y: this.imageData.top
                    }; // image stage position
                // We will use it to calc the relative position of image

                var stageData = {
                    w: $stage.width(),
                    h: $stage.height(),
                    x: $stage.offset().left,
                    y: $stage.offset().top
                };
                var newWidth = this.imageData.originalWidth * ratio,
                    newHeight = this.imageData.originalHeight * ratio,
                    // Think about it for a while ~~~
                    newLeft = origin.x - (origin.x - imgData.x) / imgData.w * newWidth,
                    newTop = origin.y - (origin.y - imgData.y) / imgData.h * newHeight; // lbs is the difference between image new width and new height

                var lbs = !this.isRotated ? 0 : (newWidth - newHeight) / 2,
                    imgNewWidth = !this.isRotated ? newWidth : newHeight,
                    imgNewHeight = !this.isRotated ? newHeight : newWidth;
                var offsetX = stageData.w - newWidth,
                    offsetY = stageData.h - newHeight; // zoom out & zoom in condition
                // It's important and it takes me a lot of time to get it
                // The conditions with image rotate 90 degree drive me crazy alomst!

                if (imgNewHeight <= stageData.h) {
                    newTop = (stageData.h - newHeight) / 2;
                } else {
                    newTop = newTop > lbs ? lbs : newTop > offsetY - lbs ? newTop : offsetY - lbs;
                }

                if (imgNewWidth <= stageData.w) {
                    newLeft = (stageData.w - newWidth) / 2;
                } else {
                    newLeft = newLeft > -lbs ? -lbs : newLeft > offsetX + lbs ? newLeft : offsetX + lbs;
                }

                $image.css({
                    width: Math.round(newWidth) + 'px',
                    height: Math.round(newHeight) + 'px',
                    left: Math.round(newLeft) + 'px',
                    top: Math.round(newTop) + 'px'
                }); // Update image initial data

                $$1.extend(this.imageData, {
                    width: newWidth,
                    height: newHeight,
                    left: newLeft,
                    top: newTop
                }); // Set grab cursor

                setGrabCursor({
                    w: Math.round(imgNewWidth),
                    h: Math.round(imgNewHeight)
                }, {
                    w: stageData.w,
                    h: stageData.h
                }, this.$stage);
            };

            _proto.rotate = function rotate(angle) {
                this.rotateAngle = this.rotateAngle + angle;

                if (this.rotateAngle / 90 % 2 === 0) {
                    this.isRotated = false;
                } else {
                    this.isRotated = true;
                }

                this.rotateTo(this.rotateAngle);
            };

            _proto.rotateTo = function rotateTo(angle) {
                this.$image.css({
                    transform: 'rotate(' + angle + 'deg)'
                });
                this.setImageSize({
                    width: this.imageData.originalWidth,
                    height: this.imageData.originalHeight
                }); // Remove grab cursor when rotate

                this.$stage.removeClass('is-grab');
            };

            _proto.resize = function resize() {
                var self = this;
                var resizeHandler = throttle(function () {
                    if (self.isOpened) {
                        if (self.isMaximized) {
                            self.setImageSize({
                                width: self.imageData.originalWidth,
                                height: self.imageData.originalHeight
                            });
                        } else {
                            self.setModalSize({
                                width: self.imageData.originalWidth,
                                height: self.imageData.originalHeight
                            });
                        }
                    }
                }, 500);
                return resizeHandler;
            };

            _proto.maximize = function maximize() {

                if (!this.isMaximized) {
                    // Store modal data before maximize
                    this.modalData = {
                        width: this.$photoviewer.width(),
                        height: this.$photoviewer.height(),
                        left: this.$photoviewer.offset().left,
                        top: this.$photoviewer.offset().top
                    };
                    this.$photoviewer.addClass(NS + '-maximize');
                    this.$photoviewer.css({
                        width: '100%',
                        height: '100%',
                        left: 0,
                        top: 0
                    });
                    this.isMaximized = true;
                } else {
                    this.$photoviewer.removeClass(NS + '-maximize');
                    this.$photoviewer.css({
                        width: this.modalData.width ? this.modalData.width : this.options.modalWidth,
                        height: this.modalData.height ? this.modalData.height : this.options.modalHeight,
                        left: this.modalData.left ? this.modalData.left : ($W.width() - this.options.modalWidth) / 2 + $D.scrollLeft(),
                        top: this.modalData.top ? this.modalData.top : ($W.height() - this.options.modalHeight) / 2 + $D.scrollTop()
                    });
                    this.isMaximized = false;
                }

                this.setImageSize({
                    width: this.imageData.originalWidth,
                    height: this.imageData.originalHeight
                });
            };

            _proto.fullscreen = function fullscreen() {
                requestFullscreen(this.$photoviewer[0]);
            };

            _proto.keydown = function keydown(e) {
                var self = this;

                if (!this.options.keyboard) {
                    return false;
                }

                var keyCode = e.keyCode || e.which || e.charCode,
                    ctrlKey = e.ctrlKey || e.metaKey,
                    altKey = e.altKey || e.metaKey;

                switch (keyCode) {
                    // â†
                    case 37:
                        self.jump(-1);
                        break;
                    // â†’

                    case 39:
                        self.jump(1);
                        break;
                    // +

                    case 187:
                        self.zoom(self.options.ratioThreshold * 3, {
                            x: self.$stage.width() / 2,
                            y: self.$stage.height() / 2
                        }, e);
                        break;
                    // -

                    case 189:
                        self.zoom(-self.options.ratioThreshold * 3, {
                            x: self.$stage.width() / 2,
                            y: self.$stage.height() / 2
                        }, e);
                        break;
                    // + Firefox

                    case 61:
                        self.zoom(self.options.ratioThreshold * 3, {
                            x: self.$stage.width() / 2,
                            y: self.$stage.height() / 2
                        }, e);
                        break;
                    // - Firefox

                    case 173:
                        self.zoom(-self.options.ratioThreshold * 3, {
                            x: self.$stage.width() / 2,
                            y: self.$stage.height() / 2
                        }, e);
                        break;
                    // ctrl + alt + 0

                    case 48:
                        if (ctrlKey && altKey) {
                            self.zoomTo(1, {
                                x: self.$stage.width() / 2,
                                y: self.$stage.height() / 2
                            }, e);
                        }

                        break;
                    // ctrl + ,

                    case 188:
                        if (ctrlKey) {
                            self.rotate(-90);
                        }

                        break;
                    // ctrl + .

                    case 190:
                        if (ctrlKey) {
                            self.rotate(90);
                        }

                        break;

                    default:
                }
            };

            _proto.addEvents = function addEvents() {
                var self = this;
                this.$close.off(CLICK_EVENT + EVENT_NS).on(CLICK_EVENT + EVENT_NS, function (e) {
                    self.close();
                });
                this.$stage.off(WHEEL_EVENT + EVENT_NS).on(WHEEL_EVENT + EVENT_NS, function (e) {
                    self.wheel(e);
                });
                this.$zoomIn.off(CLICK_EVENT + EVENT_NS).on(CLICK_EVENT + EVENT_NS, function (e) {
                    self.zoom(self.options.ratioThreshold * 3, {
                        x: self.$stage.width() / 2,
                        y: self.$stage.height() / 2
                    }, e);
                });
                this.$zoomOut.off(CLICK_EVENT + EVENT_NS).on(CLICK_EVENT + EVENT_NS, function (e) {
                    self.zoom(-self.options.ratioThreshold * 3, {
                        x: self.$stage.width() / 2,
                        y: self.$stage.height() / 2
                    }, e);
                });
                this.$actualSize.off(CLICK_EVENT + EVENT_NS).on(CLICK_EVENT + EVENT_NS, function (e) {
                    self.zoomTo(1, {
                        x: self.$stage.width() / 2,
                        y: self.$stage.height() / 2
                    }, e);
                });
                this.$prev.off(CLICK_EVENT + EVENT_NS).on(CLICK_EVENT + EVENT_NS, function () {
                    self.jump(-1);
                });
                this.$fullscreen.off(CLICK_EVENT + EVENT_NS).on(CLICK_EVENT + EVENT_NS, function () {
                    self.fullscreen();
                });
                this.$next.off(CLICK_EVENT + EVENT_NS).on(CLICK_EVENT + EVENT_NS, function () {
                    self.jump(1);
                });
                this.$rotateLeft.off(CLICK_EVENT + EVENT_NS).on(CLICK_EVENT + EVENT_NS, function () {
                    self.rotate(-90);
                });
                this.$rotateRight.off(CLICK_EVENT + EVENT_NS).on(CLICK_EVENT + EVENT_NS, function () {
                    self.rotate(90);
                });
                this.$maximize.off(CLICK_EVENT + EVENT_NS).on(CLICK_EVENT + EVENT_NS, function () {
                    self.maximize();
                });
                $D.off(KEYDOWN_EVENT + EVENT_NS).on(KEYDOWN_EVENT + EVENT_NS, function (e) {
                    self.keydown(e);
                });
                $W.on(RESIZE_EVENT + EVENT_NS, self.resize());
            };

            _proto._triggerHook = function _triggerHook(e, data) {
                if (this.options.callbacks[e]) {
                    this.options.callbacks[e].apply(this, $$1.isArray(data) ? data : [data]);
                }
            };

            return PhotoViewer;
        }();
    /**
     * Add methods to PhotoViewer
     */


    $$1.extend(PhotoViewer.prototype, draggable, movable, resizable);
    /**
     * Add PhotoViewer to globle
     */

    window.PhotoViewer = PhotoViewer;
    /**
     * jQuery plugin
     */

    var jqEl = null,
        getImgGroup = function getImgGroup(list, groupName) {
            var items = [];
            $$1(list).each(function () {
                var src = getImgSrc(this);
                items.push({
                    src: src,
                    caption: $$1(this).attr('data-caption'),
                    groupName: groupName
                });
            });
            return items;
        };

    $$1.fn.photoviewer = function (options) {
        jqEl = $$1(this);
        options = options ? options : {}; // Convert a numeric string into a number

        for (var key in options) {
            if (typeof options[key] === 'string' && !isNaN(options[key])) {
                options[key] = parseFloat(options[key]);
            }
        } // Get init event, 'click' or 'dblclick'


        var opts = $$1.extend(true, {}, DEFAULTS, options); // We should get zIndex of options before plugin's init.

        PUBLIC_VARS['zIndex'] = opts.zIndex;

        if (typeof options === 'string') ; else {
            jqEl.off(CLICK_EVENT + EVENT_NS).on(CLICK_EVENT + EVENT_NS, function (e) {
                e.preventDefault(); // This will stop triggering data-api event

                e.stopPropagation(); // Get image group

                var items = [],
                    currentGroupName = $$1(this).attr('data-group'),
                    groupList = $D.find('[data-group="' + currentGroupName + '"]');

                if (currentGroupName !== undefined) {
                    items = getImgGroup(groupList, currentGroupName);
                    options['index'] = $$1(this).index('[data-group="' + currentGroupName + '"]');
                } else {
                    items = getImgGroup(jqEl.not('[data-group]'));
                    options['index'] = $$1(this).index();
                }

                $$1(this).data(NS, new PhotoViewer(items, options, this));
            });
        }

        return jqEl;
    };
    /**
     * PhotoViewer DATA-API
     */


    $D.on(CLICK_EVENT + EVENT_NS, '[data-' + NS + ']', function (e) {
        jqEl = $$1('[data-' + NS + ']');
        e.preventDefault(); // Get image group

        var items = [],
            currentGroupName = $$1(this).attr('data-group'),
            groupList = $D.find('[data-group="' + currentGroupName + '"]');

        if (currentGroupName !== undefined) {
            items = getImgGroup(groupList, currentGroupName);
            DEFAULTS['index'] = $$1(this).index('[data-group="' + currentGroupName + '"]');
        } else {
            items = getImgGroup(jqEl.not('[data-group]'));
            DEFAULTS['index'] = $$1(this).index();
        }

        $$1(this).data(NS, new PhotoViewer(items, DEFAULTS, this));
    });

    return PhotoViewer;

})));
//# sourceMappingURL=photoviewer.js.map
