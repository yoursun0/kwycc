;(function($) {
	
	/* global variables */
	var scrollbarNumber = 0;
	var sliderMin = 0;
	var xScrollDistance = 0;
	var yScrollDistance = 0;
	var scrollIntervalTime = 10;
	var scrollbarDistance = 0;
	var isTouch = 'ontouchstart' in window;
	var supportsOrientationChange = 'onorientationchange' in window;
	var isWebkit = false;
	var isIe7 = false;
	var isIe8 = false;
	var isIe9 = false;
	var isIe = false;
	var isGecko = false;
	var grabOutCursor = 'pointer';
	var grabInCursor = 'pointer';
	var onChangeEventLastFired = new Array();
	var autoiosSliderTimeouts = new Array();
	var iosSliderrs = new Array();
	var iosSliderrSettings = new Array();
	var isEventCleared = new Array();
	var slideTimeouts = new Array();
	var activeChildOffsets = new Array();
	var touchLocks = new Array();
	
	/* private functions */
	var helpers = {
    
        showScrollbar: function(settings, scrollbarClass) {
			
			if(settings.scrollbarHide) {
				$('.' + scrollbarClass).css({
					opacity: settings.scrollbarOpacity,
					filter: 'alpha(opacity:' + (settings.scrollbarOpacity * 100) + ')'
				});
			}
			
		},
		
		hideScrollbar: function(settings, scrollTimeouts, j, distanceOffsetArray, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollMargin, scrollBorder) {
			
			if(settings.scrollbar && settings.scrollbarHide) {
					
				for(var i = j; i < j+25; i++) {
					
					scrollTimeouts[scrollTimeouts.length] = helpers.hideScrollbarIntervalTimer(scrollIntervalTime * i, distanceOffsetArray[j], ((j + 24) - i) / 24, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollMargin, scrollBorder, settings);
					
				}
			
			}
			
		},
		
		hideScrollbarInterval: function(newOffset, opacity, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollMargin, scrollBorder, settings) {
			
			scrollbarDistance = (newOffset * -1) / (sliderMax) * (stageWidth - scrollMargin - scrollBorder - scrollbarWidth);
			
			helpers.setiosSliderrOffset('.' + scrollbarClass, scrollbarDistance);
			
			$('.' + scrollbarClass).css({
				opacity: settings.scrollbarOpacity * opacity,
				filter: 'alpha(opacity:' + (settings.scrollbarOpacity * opacity * 100) + ')'
			});
			
		},
		
		slowScrollHorizontalInterval: function(node, newOffset, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, activeChildOffset, childrenOffsets, infiniteiosSliderrWidth, infiniteiosSliderrOffset, numberOfiosSliders, sliderNumber, settings) {
	
			newChildOffset = helpers.calcActiveOffset(settings, newOffset, 0, childrenOffsets, sliderMax, stageWidth, infiniteiosSliderrOffset, activeChildOffset);
			if((newChildOffset != activeChildOffsets[sliderNumber]) && (settings.oniosSliderChange != '')) {
				settings.oniosSliderChange(new helpers.args(settings, node, $(node).children(':eq(' + activeChildOffset + ')'), activeChildOffset%infiniteiosSliderrOffset));
			}
			activeChildOffsets[sliderNumber] = newChildOffset;
						
			newOffset = Math.floor(newOffset);
			
			helpers.setiosSliderrOffset(node, newOffset);

			if(settings.scrollbar) {
				
				scrollbarDistance = Math.floor((newOffset * -1) / (sliderMax) * (scrollbarStageWidth - scrollMargin - scrollbarWidth));
				var width = scrollbarWidth - scrollBorder;
				
				if(newOffset >= sliderMin) {
					
					width = scrollbarWidth - scrollBorder - (scrollbarDistance * -1);
					
					helpers.setiosSliderrOffset($('.' + scrollbarClass), 0);
					
					$('.' + scrollbarClass).css({
						width: width + 'px'
					});
				
				} else if(newOffset <= ((sliderMax * -1) + 1)) {
					
					width = scrollbarStageWidth - scrollMargin - scrollBorder - scrollbarDistance;
					
					helpers.setiosSliderrOffset($('.' + scrollbarClass), scrollbarDistance);
					
					$('.' + scrollbarClass).css({
						width: width + 'px'
					});
					
				} else {
					
					helpers.setiosSliderrOffset($('.' + scrollbarClass), scrollbarDistance);
					
					$('.' + scrollbarClass).css({
						width: width + 'px'
					});
				
				}
				
			}
			
		},
		
		slowScrollHorizontal: function(node, scrollTimeouts, sliderMax, scrollbarClass, xScrollDistance, yScrollDistance, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, childrenOffsets, sliderNumber, infiniteiosSliderrOffset, infiniteiosSliderrWidth, numberOfiosSliders, currentEventNode, settings) {
			
			var distanceOffsetArray = new Array();
			var nodeOffset = helpers.getiosSliderrOffset(node, 'x');
			var snapDirection = 0;
			var maxiosSliderVelocity = 25 / 1024 * stageWidth;
			var changeiosSliderFired = false;
			frictionCoefficient = settings.frictionCoefficient;
			elasticFrictionCoefficient = settings.elasticFrictionCoefficient;
			snapFrictionCoefficient = settings.snapFrictionCoefficient;
			snapToChildren = settings.snapToChildren;
				
			if((xScrollDistance > 5) && snapToChildren) {
				snapDirection = 1;
			} else if((xScrollDistance < -5) && snapToChildren) {
				snapDirection = -1;
			}
			
			if(xScrollDistance < (maxiosSliderVelocity * -1)) {
				xScrollDistance = maxiosSliderVelocity * -1;
			} else if(xScrollDistance > maxiosSliderVelocity) {
				xScrollDistance = maxiosSliderVelocity;
			}
			
			if(!($(node)[0] === $(currentEventNode)[0])) {
				snapDirection = snapDirection * -1;
				xScrollDistance = xScrollDistance * -2;
			}
			
			var testNodeOffsets = helpers.getAnimationSteps(settings, xScrollDistance, nodeOffset, sliderMax, sliderMin, childrenOffsets);
			var newChildOffset = helpers.calcActiveOffset(settings, testNodeOffsets[testNodeOffsets.length-1], snapDirection, childrenOffsets, sliderMax, stageWidth, infiniteiosSliderrOffset, activeChildOffsets[sliderNumber]);
			
			if(settings.infiniteiosSliderr) {
	
				if(childrenOffsets[newChildOffset] > (childrenOffsets[numberOfiosSliders + 1] + stageWidth)) {
					newChildOffset = newChildOffset + numberOfiosSliders;
				}
				
				if(childrenOffsets[newChildOffset] < (childrenOffsets[(numberOfiosSliders * 2 - 1)] - stageWidth)) {
					newChildOffset = newChildOffset - numberOfiosSliders;
				}
				
			}
			
			if(((testNodeOffsets[testNodeOffsets.length-1] < childrenOffsets[newChildOffset]) && (snapDirection < 0)) || ((testNodeOffsets[testNodeOffsets.length-1] > childrenOffsets[newChildOffset]) && (snapDirection > 0)) || (!snapToChildren)) {
				
				while((xScrollDistance > 1) || (xScrollDistance < -1)) {
			
					xScrollDistance = xScrollDistance * frictionCoefficient;
					nodeOffset = nodeOffset + xScrollDistance;
					
					if((nodeOffset > sliderMin) || (nodeOffset < (sliderMax * -1))) {
						xScrollDistance = xScrollDistance * elasticFrictionCoefficient;
						nodeOffset = nodeOffset + xScrollDistance;
					}
					
					distanceOffsetArray[distanceOffsetArray.length] = nodeOffset;
			
				}
				
			}
			
			if(snapToChildren || (nodeOffset > sliderMin) || (nodeOffset < (sliderMax * -1))) {
	
				while((nodeOffset < (childrenOffsets[newChildOffset] - 0.5)) || (nodeOffset > (childrenOffsets[newChildOffset] + 0.5))) {
					
					nodeOffset = ((nodeOffset - (childrenOffsets[newChildOffset])) * snapFrictionCoefficient) + (childrenOffsets[newChildOffset]);
					distanceOffsetArray[distanceOffsetArray.length] = nodeOffset;
					
				}
				
				distanceOffsetArray[distanceOffsetArray.length] = childrenOffsets[newChildOffset];
	
			}
			
			var jStart = 1;
			if((distanceOffsetArray.length%2) != 0) {
				jStart = 0;
			}
			
			var lastTimeoutRegistered = 0;
			var count = 0;
			
			if(settings.infiniteiosSliderr) {
				newChildOffset = (newChildOffset%numberOfiosSliders) + numberOfiosSliders;
			}
			
			for(var j = 0; j < scrollTimeouts.length; j++) {
				clearTimeout(scrollTimeouts[j]);
			}
			
			var lastCheckOffset = 0;
			for(var j = jStart; j < distanceOffsetArray.length; j = j + 2) {
				
				if(settings.infiniteiosSliderr) {
					if(distanceOffsetArray[j] < (childrenOffsets[(numberOfiosSliders * 2)] + stageWidth)) {
						distanceOffsetArray[j] = distanceOffsetArray[j] - (childrenOffsets[numberOfiosSliders]);
					}
				}
				
				if((j == jStart) || (Math.abs(distanceOffsetArray[j] - lastCheckOffset) > 1) || (j >= (distanceOffsetArray.length - 2))) {
				
					lastCheckOffset	= distanceOffsetArray[j];
					
					scrollTimeouts[scrollTimeouts.length] = helpers.slowScrollHorizontalIntervalTimer(scrollIntervalTime * j, node, distanceOffsetArray[j], sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, newChildOffset, childrenOffsets, infiniteiosSliderrWidth, infiniteiosSliderrOffset, numberOfiosSliders, sliderNumber, settings);
				
				}
				
			}
			
			scrollTimeouts[scrollTimeouts.length] = helpers.oniosSliderCompleteTimer(scrollIntervalTime * (j + 1), settings, node, $(node).children(':eq(' + newChildOffset + ')'), newChildOffset%infiniteiosSliderrOffset, sliderNumber);
			
			slideTimeouts[sliderNumber] = scrollTimeouts;
			
			helpers.hideScrollbar(settings, scrollTimeouts, j, distanceOffsetArray, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollMargin, scrollBorder);
				
		},
		
		oniosSliderComplete: function(settings, node, slideNode, newChildOffset, sliderNumber) {
			
			if((onChangeEventLastFired[sliderNumber] != newChildOffset) && (settings.oniosSliderComplete != '')) {
			
				settings.oniosSliderComplete(new helpers.args(settings, $(node), slideNode, newChildOffset));
			
			}
			
			onChangeEventLastFired[sliderNumber] = newChildOffset;
		
		},
		
		getiosSliderrOffset: function(node, xy) {

			var sliderOffset = 0;
			if(xy == 'x') {
				xy = 4;
			} else {
				xy = 5;
			}
			
			if(isTouch && isWebkit) {
			
				var webkitTransformArray = $(node).css('-webkit-transform').split(',');
				sliderOffset = parseInt(webkitTransformArray[xy], 10);
					
			} else {
			
				sliderOffset = parseInt($(node).css('left'), 10);
			
			}
			
			return sliderOffset;
		
		},
		
		setiosSliderrOffset: function(node, sliderOffset) {
			
			if(isTouch && isWebkit) {
			
				$(node).css({
					webkitTransform: 'matrix(1,0,0,1,' + sliderOffset + ',0)'
				});
			
			} else {

				$(node).css({
					left: sliderOffset + 'px'
				});
			
			}
						
		},
		
		setBrowserInfo: function() {

			if(navigator.userAgent.match('WebKit') != null) {
				isWebkit = true;
				grabOutCursor = '-webkit-grab';
				grabInCursor = '-webkit-grabbing';
			} else if(navigator.userAgent.match('Gecko') != null) {
				isGecko = true;
				grabOutCursor = 'move';
				grabInCursor = '-moz-grabbing';
			} else if(navigator.userAgent.match('MSIE 7') != null) {
				isIe7 = true;
				isIe = true;
			} else if(navigator.userAgent.match('MSIE 8') != null) {
				isIe8 = true;
				isIe = true;
			} else if(navigator.userAgent.match('MSIE 9') != null) {
				isIe9 = true;
				isIe = true;
			}
			
		},
		
		getAnimationSteps: function(settings, xScrollDistance, nodeOffset, sliderMax, sliderMin, childrenOffsets) {
			
			var offsets = new Array();
			
			if((xScrollDistance <= 1) && (xScrollDistance >= 0)) {
			
				xScrollDistance = -2;
			
			} else if((xScrollDistance >= -1) && (xScrollDistance <= 0)) {
			
				xScrollDistance = 2;
			
			}
			
			while((xScrollDistance > 1) || (xScrollDistance < -1)) {
				
				xScrollDistance = xScrollDistance * settings.frictionCoefficient;
				nodeOffset = nodeOffset + xScrollDistance;
				
				if((nodeOffset > sliderMin) || (nodeOffset < (sliderMax * -1))) {
					xScrollDistance = xScrollDistance * settings.elasticFrictionCoefficient;
					nodeOffset = nodeOffset + xScrollDistance;
				}
				
				offsets[offsets.length] = nodeOffset;
		
			}
			
			activeChildOffset = 0;
			
			return offsets;
			
		},

        calcActiveOffset: function(settings, offset, snapDirection, childrenOffsets, sliderMax, stageWidth, infiniteiosSliderrOffset, activeChildOffset) {
			
			var isFirst = false;
			var arrayOfOffsets = new Array();
			var newChildOffset;
			
			for(var i = 0; i < childrenOffsets.length; i++) {
				
				if((childrenOffsets[i] <= offset) && (childrenOffsets[i] > (offset - stageWidth))) {
					
					if(!isFirst && (childrenOffsets[i] != offset)) {
						
						arrayOfOffsets[arrayOfOffsets.length] = childrenOffsets[i-1];
						
					}
					
					arrayOfOffsets[arrayOfOffsets.length] = childrenOffsets[i];
					
					isFirst = true;
						
				}
			
			}
			
			if(arrayOfOffsets.length == 0) {
				arrayOfOffsets[0] = childrenOffsets[childrenOffsets.length - 1];
			}
			
			var distance = stageWidth;
			var closestChildOffset = 0;
			
			for(var i = 0; i < arrayOfOffsets.length; i++) {
				
				var newDistance = Math.abs(offset - arrayOfOffsets[i]);
				
				if(newDistance < distance) {
					closestChildOffset = arrayOfOffsets[i];
					distance = newDistance;
				}
				
			}
			
			for(var i = 0; i < childrenOffsets.length; i++) {
				
				if(closestChildOffset == childrenOffsets[i]) {
					
					newChildOffset = i;
					
				}
				
			}
			
			if((snapDirection < 0) && (newChildOffset%infiniteiosSliderrOffset == activeChildOffset%infiniteiosSliderrOffset)) {
				
				newChildOffset = activeChildOffset + 1;
			
				if(newChildOffset >= childrenOffsets.length) newChildOffset = childrenOffsets.length - 1;
				
			} else if((snapDirection > 0) && (newChildOffset%infiniteiosSliderrOffset == activeChildOffset%infiniteiosSliderrOffset)) {
				
				newChildOffset = activeChildOffset - 1;
				
				if(newChildOffset < 0) newChildOffset = 0;
				
			}
			
			return newChildOffset;
		
		},
		
		changeiosSlider: function(slide, node, scrollTimeouts, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, childrenOffsets, scrollbarNumber, infiniteiosSliderrOffset, infiniteiosSliderrWidth, numberOfiosSliders, settings) {

			helpers.autoiosSliderPause(scrollbarNumber);
			
			for(var j = 0; j < scrollTimeouts.length; j++) {
				clearTimeout(scrollTimeouts[j]);
			}
			
			var steps = Math.ceil(settings.autoiosSliderTransTimer / 10) + 1;
			var startOffset = helpers.getiosSliderrOffset(node, 'x');
			if(settings.infiniteiosSliderr) {
				if((startOffset > (childrenOffsets[numberOfiosSliders + 1] + stageWidth)) && (slide == (numberOfiosSliders * 2 - 2))) {
					startOffset = startOffset - infiniteiosSliderrWidth;
				}
			}
			var endOffset = childrenOffsets[slide];
			var offsetDiff = endOffset - startOffset;
			var stepArray = new Array();
			var t;
			var nextStep;
			
			helpers.showScrollbar(settings, scrollbarClass);

			for(var i = 0; i <= steps; i++) {

				t = i;
				t /= steps;
				t--;
				nextStep = startOffset + offsetDiff*(Math.pow(t,5) + 1);
				
				if(settings.infiniteiosSliderr) {
					
					if(nextStep > (childrenOffsets[numberOfiosSliders + 1] + stageWidth)) {
						nextStep = nextStep - infiniteiosSliderrWidth;
					}
					
					if(nextStep < (childrenOffsets[numberOfiosSliders * 2 - 1] - stageWidth)) {
						nextStep = nextStep + infiniteiosSliderrWidth;
					}
				
				}
				
				stepArray[stepArray.length] = nextStep;
				
			}
			
			if(settings.infiniteiosSliderr) {
				slide = (slide%numberOfiosSliders) + numberOfiosSliders;
			} 
			
			var lastCheckOffset = 0;
			for(var i = 0; i < stepArray.length; i++) {
				
				if(settings.infiniteiosSliderr) {
					if(stepArray[i] < (childrenOffsets[(numberOfiosSliders * 2)] + stageWidth)) {
						stepArray[i] = stepArray[i] - (childrenOffsets[numberOfiosSliders]);
					}
				}
				
				if((i == 0) || (Math.abs(stepArray[i] - lastCheckOffset) > 1) || (i >= (stepArray.length - 2))) {

					lastCheckOffset	= stepArray[i];
					
					scrollTimeouts[i] = helpers.slowScrollHorizontalIntervalTimer(scrollIntervalTime * (i + 1), node, stepArray[i], sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, slide, childrenOffsets, infiniteiosSliderrWidth, infiniteiosSliderrOffset, numberOfiosSliders, scrollbarNumber, settings);
						
				}
				
				if((i == 0) && (settings.oniosSliderStart != '')) {
					settings.oniosSliderStart(new helpers.args(settings, node, $(node).children(':eq(' + slide + ')'), slide%infiniteiosSliderrOffset));
				}
					
			}
			
			if(offsetDiff != 0) {
				scrollTimeouts[scrollTimeouts.length] = helpers.oniosSliderCompleteTimer(scrollIntervalTime * (i + 1), settings, node, $(node).children(':eq(' + slide + ')'), slide%infiniteiosSliderrOffset, scrollbarNumber);
			}
			
			slideTimeouts[scrollbarNumber] = scrollTimeouts;
			
			helpers.hideScrollbar(settings, scrollTimeouts, i, stepArray, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollMargin, scrollBorder);
			
			helpers.autoiosSlider(node, scrollTimeouts, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, childrenOffsets, scrollbarNumber, infiniteiosSliderrOffset, infiniteiosSliderrWidth, numberOfiosSliders, settings);
			
		},
		
		autoiosSlider: function(scrollerNode, scrollTimeouts, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, childrenOffsets, sliderNumber, infiniteiosSliderrOffset, infiniteiosSliderrWidth, numberOfiosSliders, settings) {
			
			if(!settings.autoiosSlider) return false;
			
			helpers.autoiosSliderPause(sliderNumber);

			autoiosSliderTimeouts[sliderNumber] = setTimeout(function() {
				
				if(!settings.infiniteiosSliderr && (activeChildOffsets[sliderNumber] > childrenOffsets.length-1)) {
					activeChildOffsets[sliderNumber] = activeChildOffsets[sliderNumber] - numberOfiosSliders;
				}
				
				var nextiosSlider = settings.infiniteiosSliderr ? activeChildOffsets[sliderNumber] + 1 : (activeChildOffsets[sliderNumber] + 1) % numberOfiosSliders;
				helpers.changeiosSlider(nextiosSlider, scrollerNode, scrollTimeouts, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, childrenOffsets, sliderNumber, infiniteiosSliderrOffset, infiniteiosSliderrWidth, numberOfiosSliders, settings);
				
				helpers.autoiosSlider(scrollerNode, scrollTimeouts, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, childrenOffsets, sliderNumber, infiniteiosSliderrOffset, infiniteiosSliderrWidth, numberOfiosSliders, settings);
				
			}, settings.autoiosSliderTimer + settings.autoiosSliderTransTimer);
			
		},
		
		autoiosSliderPause: function(sliderNumber) {
			
			clearTimeout(autoiosSliderTimeouts[sliderNumber]);

		},
		
		isUnselectable: function(node, settings) {

			if(settings.unselectableSelector != '') {
				if($(node).closest(settings.unselectableSelector).size() == 1) return true;
			}
			
			return false;
			
		},
		
		/* timers */
		slowScrollHorizontalIntervalTimer: function(scrollIntervalTime, node, step, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, slide, childrenOffsets, infiniteiosSliderrWidth, infiniteiosSliderrOffset, numberOfiosSliders, sliderNumber, settings) {
		
			var scrollTimeout = setTimeout(function() {
				helpers.slowScrollHorizontalInterval(node, step, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, slide, childrenOffsets, infiniteiosSliderrWidth, infiniteiosSliderrOffset, numberOfiosSliders, sliderNumber, settings);
			}, scrollIntervalTime);
			
			return scrollTimeout;
		
		},
		
		oniosSliderCompleteTimer: function(scrollIntervalTime, settings, node, slideNode, slide, scrollbarNumber) {
			
			var scrollTimeout = setTimeout(function() {
				helpers.oniosSliderComplete(settings, node, slideNode, slide, scrollbarNumber);
			}, scrollIntervalTime);
			
			return scrollTimeout;
		
		},
		
		hideScrollbarIntervalTimer: function(scrollIntervalTime, newOffset, opacity, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollMargin, scrollBorder, settings) {
		
			var scrollTimeout = setTimeout(function() {
				helpers.hideScrollbarInterval(newOffset, opacity, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollMargin, scrollBorder, settings);
			}, scrollIntervalTime);
		
			return scrollTimeout;
		
		},
						
		args: function(settings, node, activeiosSliderNode, newChildOffset) {
			this.settings = settings;
			this.data = $(node).parent().data('iosslider');
			this.sliderObject = node;
			this.sliderContainerObject = $(node).parent();
			this.currentiosSliderObject = activeiosSliderNode;
			this.currentiosSliderNumber = newChildOffset;
			this.currentiosSliderrOffset = helpers.getiosSliderrOffset(node, 'x') * -1;
		},
		
		preventDrag: function(event) {
			event.preventDefault();
		},
		
		preventClick: function(event) {
			event.stopImmediatePropagation();
			return false;
		},
		
		enableClick: function() {
			return true;
		}
        
    }
    
    helpers.setBrowserInfo();
    
    var methods = {
		
		init: function(options, node) {
			
			var settings = $.extend(true, {
				'elasticPullResistance': 0.6, 		
				'frictionCoefficient': 0.92,
				'elasticFrictionCoefficient': 0.6,
				'snapFrictionCoefficient': 0.92,
				'snapToChildren': false,
				'startAtiosSlider': 1,
				'scrollbar': false,
				'scrollbarDrag': false,
				'scrollbarHide': true,
				'scrollbarLocation': 'top',
				'scrollbarContainer': '',
				'scrollbarOpacity': 0.4,
				'scrollbarHeight': '4px',
				'scrollbarBorder': '0',
				'scrollbarMargin': '5px',
				'scrollbarBackground': '#000',
				'scrollbarBorderRadius': '100px',
				'scrollbarShadow': '0 0 0 #000',
				'scrollbarElasticPullResistance': 0.9,
				'desktopClickDrag': false,
				'keyboardControls': false,
				'responsiveiosSliderContainer': true,
				'responsiveiosSliders': true,
				'naviosSliderSelector': '',
				'navPrevSelector': '',
				'navNextSelector': '',
				'autoiosSliderToggleSelector': '',
				'autoiosSlider': false,
				'autoiosSliderTimer': 5000,
				'autoiosSliderTransTimer': 750,
				'infiniteiosSliderr': false,
				'stageCSS': {
					position: 'relative',
					position: 'absolute',
					top: '0',
					left: '0',
					overflow: 'hidden',
					zIndex: 1
				},
				'sliderCSS': {
					overflow: 'hidden'
				},
				'unselectableSelector': '',
				'oniosSliderrLoaded': '',
				'oniosSliderStart': '',
				'oniosSliderChange': '',
				'oniosSliderComplete': ''
			}, options);
			
			if(node == undefined) {
				node = this;
			}
			
			return $(node).each(function(i) {
				
				scrollbarNumber++;
				var sliderNumber = scrollbarNumber;
				var scrollTimeouts = new Array();
				iosSliderrSettings[sliderNumber] = settings;
				var sliderMax;
				var minTouchpoints = 0;
				var xCurrentScrollRate = new Array(0, 0);
				var yCurrentScrollRate = new Array(0, 0);
				var scrollbarBlockClass = 'scrollbarBlock' + scrollbarNumber;
				var scrollbarClass = 'scrollbar' + scrollbarNumber;
				var scrollbarNode;
				var scrollbarBlockNode;
				var scrollbarStageWidth;
				var scrollbarWidth;
				var containerWidth;
				var containerHeight;
				var stageNode = $(this);
				var stageWidth;
				var stageHeight;
				var slideWidth;
				var scrollMargin;
				var scrollBorder;
				var lastTouch;
				activeChildOffsets[sliderNumber] = settings.startAtiosSlider-1;
				var newChildOffset = -1;
				var webkitTransformArray = new Array();
				var childrenOffsets;
				var scrollbarStartOpacity = 0;
				var xScrollStartPosition = 0;
				var yScrollStartPosition = 0;
				var currentTouches = 0;
				var scrollerNode = $(this).children(':first-child');
				var slideNodes;
				var numberOfiosSliders = $(scrollerNode).children().not('script').size();
				var xScrollStarted = false;
				var lastChildOffset = 0;
				var isMouseDown = false;
				var currentiosSliderr = undefined;
				var sliderStopLocation = 0;
				var infiniteiosSliderrWidth;
				var infiniteiosSliderrOffset = numberOfiosSliders;
				var isFirstInit = true;
				onChangeEventLastFired[sliderNumber] = -1;
				var isAutoiosSliderToggleOn = false;
				iosSliderrs[sliderNumber] = stageNode;
				isEventCleared[sliderNumber] = false;
				var currentEventNode;
				var intermediateChildOffset = -1;
				var preventXScroll = false;
				touchLocks[sliderNumber] = false;
				slideTimeouts[sliderNumber] = new Array();
				if(settings.scrollbarDrag) {
					settings.scrollbar = true;
					settings.scrollbarHide = false;
				}
				var $this = $(this);
				var data = $this.data('iosslider');	
				if(data != undefined) return true;
           		
           		$(this).find('img').bind('dragstart.iosSliderrEvent', function(event) { event.preventDefault(); });

				if(settings.infiniteiosSliderr) {
		
					settings.scrollbar = false;
					$(scrollerNode).children().clone(true, true).prependTo(scrollerNode).clone(true, true).appendTo(scrollerNode);
					infiniteiosSliderrOffset = numberOfiosSliders;
					
				}
						
				if(settings.scrollbar) {
					
					if(settings.scrollbarContainer != '') {
						$(settings.scrollbarContainer).append("<div class = '" + scrollbarBlockClass + "'><div class = '" + scrollbarClass + "'></div></div>");
					} else {
						$(scrollerNode).parent().append("<div class = '" + scrollbarBlockClass + "'><div class = '" + scrollbarClass + "'></div></div>");
					}
				
				}
				
				if(!init()) return true;
				
				if(settings.infiniteiosSliderr) {
					
					activeChildOffsets[sliderNumber] = activeChildOffsets[sliderNumber] + infiniteiosSliderrOffset;
					helpers.setiosSliderrOffset(scrollerNode, childrenOffsets[activeChildOffsets[sliderNumber]]);
					
				}
				
				$(this).find('a').bind('mousedown', helpers.preventDrag);
				$(this).find("[onclick]").bind('click', helpers.preventDrag).each(function() {
					
					$(this).data('onclick', this.onclick);
				
				});
				
				if(settings.oniosSliderrLoaded != '') {
					settings.oniosSliderrLoaded(new helpers.args(settings, scrollerNode, $(scrollerNode).children(':eq(' + activeChildOffsets[sliderNumber] + ')'), activeChildOffsets[sliderNumber]%infiniteiosSliderrOffset));
				}
				
				onChangeEventLastFired[sliderNumber] = activeChildOffsets[sliderNumber]%infiniteiosSliderrOffset;
				
				function init() {
					
					helpers.autoiosSliderPause(sliderNumber);
					
					$(stageNode).css('width', '');
					$(stageNode).css('height', '');
					$(scrollerNode).css('width', '');
					slideNodes = $(scrollerNode).children().not('script');
					$(slideNodes).css('width', '');
					
					sliderMax = 0;
					childrenOffsets = new Array();
					containerWidth = $(stageNode).parent().width();
					stageWidth = $(stageNode).outerWidth(true);
					
					if(settings.responsiveiosSliderContainer) {
						stageWidth = ($(stageNode).outerWidth(true) > containerWidth) ? containerWidth : $(stageNode).outerWidth(true);
					}
					
					$(stageNode).css({
						position: settings.stageCSS.position,
						top: settings.stageCSS.top,
						left: settings.stageCSS.left,
						overflow: settings.stageCSS.overflow,
						zIndex: settings.stageCSS.zIndex,
						'webkitPerspective': 1000,
						'webkitBackfaceVisibility': 'hidden',
						width: stageWidth
					});
					
					$(settings.unselectableSelector).css({
						cursor: 'default'
					});
					
					if(settings.responsiveiosSliders) {
						
						$(slideNodes).each(function(j) {

							var thisiosSliderWidth = $(this).outerWidth(true);

							if(thisiosSliderWidth > stageWidth) {
								
								thisiosSliderWidth = stageWidth + ($(this).outerWidth(true) - $(this).width()) * -1;
							
							} else {
								
								thisiosSliderWidth = $(this).width();
								
							}
							
							$(this).css({
								width: thisiosSliderWidth
							});
						
						});
					
					}
	
					$(slideNodes).each(function(j) {
						
						$(this).css({
							'float': 'left'
						});

						childrenOffsets[j] = sliderMax * -1;
						
						sliderMax = sliderMax + $(this).outerWidth(true);
						
					});
					
					for(var i = 0; i < childrenOffsets.length; i++) {
						
						if(childrenOffsets[i] <= ((sliderMax - stageWidth) * -1)) {
							break;
						}
						
						lastChildOffset = i;
						
					}
					
					childrenOffsets.splice(lastChildOffset + 1, childrenOffsets.length);
		
					childrenOffsets[childrenOffsets.length] = (sliderMax - stageWidth) * -1;

					sliderMax = sliderMax - stageWidth;
					
					$(scrollerNode).css({
						position: 'relative',
						overflow: settings.sliderCSS.overflow,
						cursor: grabOutCursor,
						'webkitPerspective': 1000,
						'webkitBackfaceVisibility': 'hidden',
						width: sliderMax + stageWidth + 'px'
					});
					
					containerHeight = $(stageNode).parent().outerHeight(true);
					stageHeight = $(stageNode).height();
					
					if(settings.responsiveiosSliderContainer) {
						stageHeight = ($(stageNode).height() > containerHeight) ? containerHeight : $(stageNode).height();
					}
					
					$(stageNode).css({
						height: stageHeight
					});
					
					helpers.setiosSliderrOffset(scrollerNode, childrenOffsets[activeChildOffsets[sliderNumber]]);
					
					if(sliderMax <= 0) {
						
						$(scrollerNode).css({
							cursor: 'default'
						});
						
						return false;
					}
					
					if(!isTouch && !settings.desktopClickDrag) {
						
						$(scrollerNode).css({
							cursor: 'default'
						});
						
					}
					
					if(settings.scrollbar) {
						
						$('.' + scrollbarBlockClass).css({ 
							margin: settings.scrollbarMargin,
							overflow: 'hidden',
							display: 'none'
						});
						
						$('.' + scrollbarBlockClass + ' .' + scrollbarClass).css({ 
							border: settings.scrollbarBorder
						});
						
						scrollMargin = parseInt($('.' + scrollbarBlockClass).css('marginLeft')) + parseInt($('.' + scrollbarBlockClass).css('marginRight'));
						scrollBorder = parseInt($('.' + scrollbarBlockClass + ' .' + scrollbarClass).css('borderLeftWidth'), 10) + parseInt($('.' + scrollbarBlockClass + ' .' + scrollbarClass).css('borderRightWidth'), 10);
						scrollbarStageWidth = (settings.scrollbarContainer != '') ? $(settings.scrollbarContainer).width() : stageWidth;
						scrollbarWidth = (scrollbarStageWidth - scrollMargin) / numberOfiosSliders;
		
						if(!settings.scrollbarHide) {
							scrollbarStartOpacity = settings.scrollbarOpacity;
						}
						
						$('.' + scrollbarBlockClass).css({ 
							position: 'absolute',
							left: 0,
							width: scrollbarStageWidth - scrollMargin + 'px',
							margin: settings.scrollbarMargin
						});
						
						if(settings.scrollbarLocation == 'top') {
							$('.' + scrollbarBlockClass).css('top', '0');
						} else {
							$('.' + scrollbarBlockClass).css('bottom', '0');
						}
						
						$('.' + scrollbarBlockClass + ' .' + scrollbarClass).css({ 
							borderRadius: settings.scrollbarBorderRadius,
							background: settings.scrollbarBackground,
							height: settings.scrollbarHeight,
							width: scrollbarWidth - scrollBorder + 'px',
							minWidth: settings.scrollbarHeight,
							border: settings.scrollbarBorder,
							'webkitPerspective': 1000,
							'webkitBackfaceVisibility': 'hidden',
							'position': 'relative',
							opacity: scrollbarStartOpacity,
							filter: 'alpha(opacity:' + (scrollbarStartOpacity * 100) + ')',
							boxShadow: settings.scrollbarShadow
						});
						
						helpers.setiosSliderrOffset($('.' + scrollbarBlockClass + ' .' + scrollbarClass), Math.floor((childrenOffsets[activeChildOffsets[sliderNumber]] * -1) / (sliderMax) * (scrollbarStageWidth - scrollMargin - scrollbarWidth)));
		
						$('.' + scrollbarBlockClass).css({
							display: 'block'
						});
						
						scrollbarNode = $('.' + scrollbarBlockClass + ' .' + scrollbarClass);
						scrollbarBlockNode = $('.' + scrollbarBlockClass);
						
					}
					
					if(settings.scrollbarDrag) {
						$('.' + scrollbarBlockClass + ' .' + scrollbarClass).css({
							cursor: grabOutCursor
						});
					}
					
					if(settings.infiniteiosSliderr) {
					
						infiniteiosSliderrWidth = (sliderMax + stageWidth) / 3;
						
					}
					
					if(settings.naviosSliderSelector != '') {
								
						$(settings.naviosSliderSelector).each(function(j) {
							
							$(this).css({
								cursor: 'pointer'
							});
							
							$(this).unbind('click.iosSliderrEvent').bind('click.iosSliderrEvent', function() {
								
								var goToiosSlider = j;
								if(settings.infiniteiosSliderr) {
									goToiosSlider = j + infiniteiosSliderrOffset;
								}
								
								helpers.changeiosSlider(goToiosSlider, scrollerNode, scrollTimeouts, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, childrenOffsets, sliderNumber, infiniteiosSliderrOffset, infiniteiosSliderrWidth, numberOfiosSliders, settings);
							});
						
						});
								
					}	
					
					if(settings.navPrevSelector != '') {
						
						$(settings.navPrevSelector).css({
							cursor: 'pointer'
						});
						
						$(settings.navPrevSelector).unbind('click.iosSliderrEvent').bind('click.iosSliderrEvent', function() {					
							if((activeChildOffsets[sliderNumber] > 0) || settings.infiniteiosSliderr) {
								helpers.changeiosSlider(activeChildOffsets[sliderNumber] - 1, scrollerNode, scrollTimeouts, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, childrenOffsets, sliderNumber, infiniteiosSliderrOffset, infiniteiosSliderrWidth, numberOfiosSliders, settings);
							} 
						});
					
					}
					
					if(settings.navNextSelector != '') {
						
						$(settings.navNextSelector).css({
							cursor: 'pointer'
						});
						
						$(settings.navNextSelector).unbind('click.iosSliderrEvent').bind('click.iosSliderrEvent', function() {
							if((activeChildOffsets[sliderNumber] < childrenOffsets.length-1) || settings.infiniteiosSliderr) {
								helpers.changeiosSlider(activeChildOffsets[sliderNumber] + 1, scrollerNode, scrollTimeouts, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, childrenOffsets, sliderNumber, infiniteiosSliderrOffset, infiniteiosSliderrWidth, numberOfiosSliders, settings);
							}
						});
					
					}
					
					if(settings.autoiosSlider) {
						
						if(settings.autoiosSliderToggleSelector != '') {
						
							$(settings.autoiosSliderToggleSelector).css({
								cursor: 'pointer'
							});
							
							$(settings.autoiosSliderToggleSelector).unbind('click.iosSliderrEvent').bind('click.iosSliderrEvent', function() {
								
								if(!isAutoiosSliderToggleOn) {
								
									helpers.autoiosSliderPause(sliderNumber);
									isAutoiosSliderToggleOn = true;
									
									$(settings.autoiosSliderToggleSelector).addClass('on');
									
								} else {
									
									helpers.autoiosSlider(scrollerNode, scrollTimeouts, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, childrenOffsets, sliderNumber, infiniteiosSliderrOffset, infiniteiosSliderrWidth, numberOfiosSliders, settings);
									
									isAutoiosSliderToggleOn = false;
									
									$(settings.autoiosSliderToggleSelector).removeClass('on');
									
								}
							
							});
						
						}
						
						if(!isAutoiosSliderToggleOn) {
							helpers.autoiosSlider(scrollerNode, scrollTimeouts, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, childrenOffsets, sliderNumber, infiniteiosSliderrOffset, infiniteiosSliderrWidth, numberOfiosSliders, settings);
						}
	
						if(!isTouch) {
							
							$(stageNode).bind('mouseenter.iosSliderrEvent', function() {
								helpers.autoiosSliderPause(sliderNumber);
							});
							
							$(stageNode).bind('mouseleave.iosSliderrEvent', function() {
								if(!isAutoiosSliderToggleOn) {
									helpers.autoiosSlider(scrollerNode, scrollTimeouts, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, childrenOffsets, sliderNumber, infiniteiosSliderrOffset, infiniteiosSliderrWidth, numberOfiosSliders, settings);
								}
							});
						
						} else {
							
							$(stageNode).bind('touchend.iosSliderrEvent', function() {
							
								if(!isAutoiosSliderToggleOn) {
									helpers.autoiosSlider(scrollerNode, scrollTimeouts, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, childrenOffsets, sliderNumber, infiniteiosSliderrOffset, infiniteiosSliderrWidth, numberOfiosSliders, settings);
								}
							
							});
						
						}
					
					}
					
					$(stageNode).data('iosslider', {
						obj: $this,
						settings: settings,
						scrollerNode: scrollerNode,
						numberOfiosSliders: numberOfiosSliders,
						sliderNumber: sliderNumber,
						childrenOffsets: childrenOffsets,
						sliderMax: sliderMax,
						scrollbarClass: scrollbarClass,
						scrollbarWidth: scrollbarWidth, 
						scrollbarStageWidth: scrollbarStageWidth,
						stageWidth: stageWidth, 
						scrollMargin: scrollMargin, 
						scrollBorder: scrollBorder, 
						infiniteiosSliderrOffset: infiniteiosSliderrOffset, 
						infiniteiosSliderrWidth: infiniteiosSliderrWidth
					});
					
					isFirstInit = false;
					
					return true;
				
				}
				
				if(iosSliderrSettings[sliderNumber].responsiveiosSliders || iosSliderrSettings[sliderNumber].responsiveiosSliderContainer) {
					
					var orientationEvent = supportsOrientationChange ? 'orientationchange' : 'resize';
					
					$(window).bind(orientationEvent + '.iosSliderrEvent', function() {
							
						if(!init()) return true;
						
					});
					
				}
				
				if(settings.keyboardControls) {
					
					$(document).bind('keydown.iosSliderrEvent', function(e) {
						
						if((!isIe7) && (!isIe8)) {
							var e = e.originalEvent;
						}
						
						switch(e.keyCode) {
							
							case 37:
								
								if((activeChildOffsets[sliderNumber] > 0) || settings.infiniteiosSliderr) {
									helpers.changeiosSlider(activeChildOffsets[sliderNumber] - 1, scrollerNode, scrollTimeouts, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, childrenOffsets, sliderNumber, infiniteiosSliderrOffset, infiniteiosSliderrWidth, numberOfiosSliders, settings);
								} 
								
							break;
							
							case 39:
								
								if((activeChildOffsets[sliderNumber] < childrenOffsets.length-1) || settings.infiniteiosSliderr) {
									helpers.changeiosSlider(activeChildOffsets[sliderNumber] + 1, scrollerNode, scrollTimeouts, sliderMax, scrollbarClass, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, childrenOffsets, sliderNumber, infiniteiosSliderrOffset, infiniteiosSliderrWidth, numberOfiosSliders, settings);
								}
								
							break;
							
						}
					
					});
					
				}
					
				if(isTouch || settings.desktopClickDrag) {
					
					var touchStartEvent = isTouch ? 'touchstart.iosSliderrEvent' : 'mousedown.iosSliderrEvent';
					var touchSelection = $(scrollerNode);
					var touchSelectionMove = $(scrollerNode);
					var preventDefault = null;
					var isUnselectable = false;
					
					if(settings.scrollbarDrag) {
					
						touchSelection = touchSelection.add(scrollbarNode);
						touchSelectionMove = touchSelectionMove.add(scrollbarBlockNode);
						
					} 
					
					$(touchSelection).bind(touchStartEvent, function(e) {
						
						if(touchLocks[sliderNumber]) return true;
						
						isUnselectable = helpers.isUnselectable(e.target, settings);
						
						if(isUnselectable) return true;
						
						currentEventNode = ($(this)[0] === $(scrollbarNode)[0]) ? scrollbarNode : scrollerNode;

						if((!isIe7) && (!isIe8)) {
							var e = e.originalEvent;
						}

						helpers.autoiosSliderPause(sliderNumber);
						
						if(!isTouch) {
							
							if (window.getSelection) {
								if (window.getSelection().empty) {
									window.getSelection().empty();
								} else if (window.getSelection().removeAllRanges) {
									window.getSelection().removeAllRanges();
								}
							} else if (document.selection) {
								document.selection.empty();
							}
							
							eventX = e.pageX;
							eventY = e.pageY;
							
							isMouseDown = true;
							currentiosSliderr = scrollerNode;

							$(this).css({
								cursor: grabInCursor
							});
							
						} else {
						
							eventX = e.touches[0].pageX;
							eventY = e.touches[0].pageY;

						}
						
						xCurrentScrollRate = new Array(0, 0);
						yCurrentScrollRate = new Array(0, 0);
						xScrollDistance = 0;
						xScrollStarted = false;
						
						for(var j = 0; j < scrollTimeouts.length; j++) {
							clearTimeout(scrollTimeouts[j]);
						}
						
						var scrollPosition = helpers.getiosSliderrOffset(scrollerNode, 'x');
						
						intermediateChildOffset = activeChildOffsets[sliderNumber];
						
						if(settings.infiniteiosSliderr) {
							
							if(activeChildOffsets[sliderNumber]%numberOfiosSliders == 0) {
								
								$(scrollerNode).children().each(function(i) {
									
									if((i%numberOfiosSliders == 0) && (i != activeChildOffsets[sliderNumber])) {
										$(this).replaceWith(function() {
											return $(scrollerNode).children(':eq(' + activeChildOffsets[sliderNumber] + ')').clone(true);
										});
									}
									
								});
								
							}
							
						}
						
						if(scrollPosition > sliderMin) {
						
							scrollPosition = sliderMin;
							
							helpers.setiosSliderrOffset($('.' + scrollbarClass), scrollPosition);
							
							$('.' + scrollbarClass).css({
								width: (scrollbarWidth - scrollBorder) + 'px'
							});
							
						} else if(scrollPosition < (sliderMax * -1)) {
						
							scrollPosition = sliderMax * -1;
							
							helpers.setiosSliderrOffset(scrollerNode, scrollPosition);
							
							helpers.setiosSliderrOffset($('.' + scrollbarClass), (scrollbarStageWidth - scrollMargin - scrollbarWidth));
							
							$('.' + scrollbarClass).css({
								width: (scrollbarWidth - scrollBorder) + 'px'
							});
							
						} 
						
						xScrollStartPosition = (helpers.getiosSliderrOffset(this, 'x') - eventX) * -1;
						yScrollStartPosition = (helpers.getiosSliderrOffset(this, 'y') - eventY) * -1;

						xCurrentScrollRate[1] = eventX;
						yCurrentScrollRate[1] = eventY;
						
					});
					
					var touchMoveEvent = isTouch ? 'touchmove.iosSliderrEvent' : 'mousemove.iosSliderrEvent';
					
					$(touchSelectionMove).bind(touchMoveEvent, function(e) {
						
						if((!isIe7) && (!isIe8)) {
							var e = e.originalEvent;
						}
						
						if(isUnselectable) return true;
						
						var edgeDegradation = 0;

						if(!isTouch) {
							
							if (window.getSelection) {
								if (window.getSelection().empty) {
									window.getSelection().empty();
								} else if (window.getSelection().removeAllRanges) {
									window.getSelection().removeAllRanges();
								}
							} else if (document.selection) {
								document.selection.empty();
							}
							
						}
						
						if(isTouch) {
							eventX = e.touches[0].pageX;
							eventY = e.touches[0].pageY;
						} else {
							eventX = e.pageX;
							eventY = e.pageY;
							
							if(!isMouseDown) {
								return false;
							}
						}
						
						if(settings.infiniteiosSliderr) {
	
							if(helpers.getiosSliderrOffset(scrollerNode, 'x') > (childrenOffsets[numberOfiosSliders + 1] + stageWidth)) {
								xScrollStartPosition = xScrollStartPosition + infiniteiosSliderrWidth;
							}
							
							if(helpers.getiosSliderrOffset(scrollerNode, 'x') < (childrenOffsets[numberOfiosSliders * 2 - 1] - stageWidth)) {
								xScrollStartPosition = xScrollStartPosition - infiniteiosSliderrWidth;
							}
							
						}
						
						xCurrentScrollRate[0] = xCurrentScrollRate[1];
						xCurrentScrollRate[1] = eventX;
						xScrollDistance = (xCurrentScrollRate[1] - xCurrentScrollRate[0]) / 2;
						
						yCurrentScrollRate[0] = yCurrentScrollRate[1];
						yCurrentScrollRate[1] = eventY;
						yScrollDistance = (yCurrentScrollRate[1] - yCurrentScrollRate[0]) / 2;
						
						if(!xScrollStarted) {
							
							if(settings.oniosSliderStart != '') {
								settings.oniosSliderStart(new helpers.args(settings, scrollerNode, $(scrollerNode).children(':eq(' + activeChildOffsets[sliderNumber] + ')'), activeChildOffsets[sliderNumber]%infiniteiosSliderrOffset));
							}
							
						}
						
						if(((yScrollDistance > 3) || (yScrollDistance < -3)) && ((xScrollDistance < 3) && (xScrollDistance > -3)) && (isTouch) && (!xScrollStarted)) {
							preventXScroll = true;
						}
						
						if(((xScrollDistance > 5) || (xScrollDistance < -5)) && (isTouch)) {
						
							e.preventDefault();
							xScrollStarted = true;
							
						} else if(!isTouch) {
							
							xScrollStarted = true;
							
						}
						
						if(xScrollStarted && !preventXScroll) {
							
							var scrollPosition = helpers.getiosSliderrOffset(scrollerNode, 'x');
							var scrollbarMultiplier = ($(this)[0] === $(scrollbarBlockNode)[0]) ? (-1 * (sliderMax) / (scrollbarStageWidth - scrollMargin - scrollbarWidth)) : 1;
							var elasticPullResistance = ($(this)[0] === $(scrollbarBlockNode)[0]) ? settings.scrollbarElasticPullResistance : settings.elasticPullResistance;
							
							if(isTouch) {
								if(currentTouches != e.touches.length) {
									xScrollStartPosition = (scrollPosition * -1) + eventX;
								}
								
								currentTouches = e.touches.length;
							}
								
							if(scrollPosition > sliderMin) {
										
								edgeDegradation = ((xScrollStartPosition - eventX) * scrollbarMultiplier) * elasticPullResistance / scrollbarMultiplier;
								
							}
							
							if(scrollPosition < (sliderMax * -1)) {
								
								edgeDegradation = (sliderMax + ((xScrollStartPosition - eventX) * -1 * scrollbarMultiplier)) * elasticPullResistance * -1 / scrollbarMultiplier;
											
							}

							helpers.setiosSliderrOffset(scrollerNode, (xScrollStartPosition - eventX - edgeDegradation) * -1 * scrollbarMultiplier);

							if(settings.scrollbar) {
								
								helpers.showScrollbar(settings, scrollbarClass);
								
								scrollbarDistance = Math.floor((xScrollStartPosition - eventX - edgeDegradation) / (sliderMax) * (scrollbarStageWidth - scrollMargin - scrollbarWidth) * scrollbarMultiplier);
								
								var width = scrollbarWidth;
								
								if(scrollPosition >= sliderMin) {
									
									width = scrollbarWidth - scrollBorder - (scrollbarDistance * -1);
									
									helpers.setiosSliderrOffset($('.' + scrollbarClass), 0);
									
									$('.' + scrollbarClass).css({
										width: width + 'px'
									});
									
								} else if(scrollPosition <= ((sliderMax * -1) + 1)) {
																		
									width = scrollbarStageWidth - scrollMargin - scrollBorder - scrollbarDistance;
									
									helpers.setiosSliderrOffset($('.' + scrollbarClass), scrollbarDistance);
									
									$('.' + scrollbarClass).css({
										width: width + 'px'
									});
									
								} else {
									
									helpers.setiosSliderrOffset($('.' + scrollbarClass), scrollbarDistance);
									
								}
								
							}
							
							if(isTouch) {
								lastTouch = e.touches[0].pageX;
							}
							
							newChildOffset = helpers.calcActiveOffset(settings, (xScrollStartPosition - eventX - edgeDegradation) * -1, 0, childrenOffsets, sliderMax, stageWidth, infiniteiosSliderrOffset, undefined);
							if((newChildOffset != activeChildOffsets[sliderNumber]) && (settings.oniosSliderChange != '')) {
								activeChildOffsets[sliderNumber] = newChildOffset;
								settings.oniosSliderChange(new helpers.args(settings, scrollerNode, $(scrollerNode).children(':eq(' + newChildOffset + ')'), newChildOffset%infiniteiosSliderrOffset));	
							}
							
						}
						
					});
					
					$(touchSelection).bind('touchend.iosSliderrEvent', function(e) {
						
						var e = e.originalEvent;
						
						if(isUnselectable) return true;
						
						if(e.touches.length != 0) {
							
							for(var j = 0; j < e.touches.length; j++) {
								
								if(e.touches[j].pageX == lastTouch) {
									helpers.slowScrollHorizontal(scrollerNode, scrollTimeouts, sliderMax, scrollbarClass, xScrollDistance, yScrollDistance, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, childrenOffsets, sliderNumber, infiniteiosSliderrOffset, infiniteiosSliderrWidth, numberOfiosSliders, currentEventNode, settings);
								}
								
							}
							
						} else {
							
							helpers.slowScrollHorizontal(scrollerNode, scrollTimeouts, sliderMax, scrollbarClass, xScrollDistance, yScrollDistance, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, childrenOffsets, sliderNumber, infiniteiosSliderrOffset, infiniteiosSliderrWidth, numberOfiosSliders, currentEventNode, settings);
							
						}
						
						preventXScroll = false;
						
					});
					
					if(!isTouch) {

						var eventObject = $(window);
	
						if(isIe8 || isIe7) {
							var eventObject = $(document); 
						}
						
						$(eventObject).bind('mouseup.iosSliderrEvent', function(e) {
							
							if(xScrollStarted) {
								$(scrollerNode).children(':eq(' + activeChildOffsets[sliderNumber] + ')').find('a').unbind('click.disableClick').bind('click.disableClick', helpers.preventClick);
							} else {
								$(scrollerNode).children(':eq(' + activeChildOffsets[sliderNumber] + ')').find('a').unbind('click.disableClick').bind('click.disableClick', helpers.enableClick);
							}
							
							$(scrollerNode).children(':eq(' + activeChildOffsets[sliderNumber] + ')').find("[onclick]").each(function() {
								
								this.onclick = function(event) {
									if(xScrollStarted) { 
										return false;
									}
								
									$(this).data('onclick').call(this, event || window.event);
								}
								
							});
							
							if(parseFloat($().jquery) >= 1.6) {
							
								$(scrollerNode).children(':eq(' + activeChildOffsets[sliderNumber] + ')').find('*').each(function() {
													
									var clickObject = $(this).data('events');

									if(clickObject != undefined) {
										if(clickObject.click != undefined) {

											if(clickObject.click[0].namespace != 'iosSliderrEvent') {
												
												if(!xScrollStarted) { 
													return false;
												}
											
												$(this).one('click.disableClick', helpers.preventClick);
											    var handlers = $(this).data('events').click;
											    var handler = handlers.pop();
											    handlers.splice(0, 0, handler);
												
											}
											
										}
									}
									
								});
							
							}
							
							if(!isEventCleared[sliderNumber]) {
								
								$(touchSelection).css({
									cursor: grabOutCursor
								});
								
								isMouseDown = false;
								
								if(currentiosSliderr == undefined) {
									return false;
								}

								helpers.slowScrollHorizontal(currentiosSliderr, scrollTimeouts, sliderMax, scrollbarClass, xScrollDistance, yScrollDistance, scrollbarWidth, stageWidth, scrollbarStageWidth, scrollMargin, scrollBorder, childrenOffsets, sliderNumber, infiniteiosSliderrOffset, infiniteiosSliderrWidth, numberOfiosSliders, currentEventNode, settings);
								
								currentiosSliderr = undefined;
							
							}
							
							preventXScroll = false;
							
						});
						
					} 
				
				}
				
			});	
			
		},
		
		destroy: function(clearStyle, node) {
			
			if(node == undefined) {
				node = this;
			}
			
			return $(node).each(function() {
			
				var $this = $(this);
				var data = $this.data('iosslider');
				if(data == undefined) return false;
				
				if(clearStyle == undefined) {
		    		clearStyle = true;
		    	}
		    	
	    		helpers.autoiosSliderPause(data.sliderNumber);
		    	isEventCleared[data.sliderNumber] = true;
		    	$(window).unbind('.iosSliderrEvent');
		    	$(document).unbind('.iosSliderrEvent');
		    	$(this).unbind('.iosSliderrEvent');
	    		$(this).children(':first-child').unbind('.iosSliderrEvent');
	    		$(this).children(':first-child').children().unbind('.iosSliderrEvent');
		    	
		    	if(clearStyle) {
	    			$(this).attr('style', '');
		    		$(this).children(':first-child').attr('style', '');
		    		$(this).children(':first-child').children().attr('style', '');
		    		
		    		$(data.settings.naviosSliderSelector).attr('style', '');
		    		$(data.settings.navPrevSelector).attr('style', '');
		    		$(data.settings.navNextSelector).attr('style', '');
		    		$(data.settings.autoiosSliderToggleSelector).attr('style', '');
		    		$(data.settings.unselectableSelector).attr('style', '');
	    		}
	    		
	    		if(data.settings.infiniteiosSliderr) {
	    			$(this).children(':first-child').html();
	    			$(this).children(':first-child').html($(this).children(':first-child').children(':nth-child(-n+' + data.numberOfiosSliders + ')').clone(true));
	    		}
	    		
	    		if(data.settings.scrollbar) {
	    			$('.scrollbarBlock' + data.sliderNumber).remove();
	    		}
	    		
	    		var scrollTimeouts = slideTimeouts[data.sliderNumber];
	    		
	    		for(var i = 0; i < scrollTimeouts.length; i++) {
					clearTimeout(scrollTimeouts[i]);
				}
	    		
	    		$this.removeData('iosslider');
		    	
			});
		
		},
		
		update: function(node) {
			
			if(node == undefined) {
				node = this;
			}
			
			return $(node).each(function() {

				var $this = $(this);
				var data = $this.data('iosslider');
				if(data == undefined) return false;
				
				methods.destroy(false, this);
				data.settings.startAtiosSlider = activeChildOffsets[data.sliderNumber] + 1;
				methods.init(data.settings, this);
		    	
			});
		
		},
		
		addiosSlider: function(slideNode, slidePosition) {

			return this.each(function() {
				
				var $this = $(this);
				var data = $this.data('iosslider');
				if(data == undefined) return false;
				
				if(slidePosition <= data.numberOfiosSliders) {
					$(data.scrollerNode).children(':eq(' + (slidePosition - 1) + ')').before(slideNode);
				} else {
					$(data.scrollerNode).children(':eq(' + (slidePosition - 2) + ')').after(slideNode);
				}
				
				if(activeChildOffsets[data.sliderNumber] > (slidePosition - 2)) {
					activeChildOffsets[data.sliderNumber]++;
				}
				methods.update(this);
			
			});
		
		},
		
		removeiosSlider: function(slideNumber) {
		
			return this.each(function() {
			
				var $this = $(this);
				var data = $this.data('iosslider');
				if(data == undefined) return false;

				$(data.scrollerNode).children(':eq(' + (slideNumber - 1) + ')').remove();
				if(activeChildOffsets[data.sliderNumber] > (slideNumber - 1)) {
					activeChildOffsets[data.sliderNumber]--;
				}
				methods.update(this);
			
			});
		
		},
		
		goToiosSlider: function(slide, node) {
			
			if(node == undefined) {
				node = this;
			}
			
			return $(node).each(function() {
					
				var $this = $(this);
				var data = $this.data('iosslider');
				if(data == undefined) return false;
					
				slide = (slide - 1)%data.numberOfiosSliders;
				if(data.settings.infiniteiosSliderr) {
					
					var middle = data.numberOfiosSliders * 0.5;
					var half = (middle + activeChildOffsets[data.sliderNumber]) % data.numberOfiosSliders;
					var direction = (slide < half) ? 1 : -1;
					slide = slide + data.infiniteiosSliderrOffset;
					
					if((direction < 0) && ((activeChildOffsets[data.sliderNumber]%data.numberOfiosSliders) < middle)) {
						slide = slide - data.infiniteiosSliderrOffset;
					}
					
					if((direction > 0) && ((activeChildOffsets[data.sliderNumber]%data.numberOfiosSliders) > middle)) {
						slide = slide + data.infiniteiosSliderrOffset;
					}
				}

				helpers.changeiosSlider(slide, $(data.scrollerNode), slideTimeouts[data.sliderNumber], data.sliderMax, data.scrollbarClass, data.scrollbarWidth, data.stageWidth, data.scrollbarStageWidth, data.scrollMargin, data.scrollBorder, data.childrenOffsets, data.sliderNumber, data.infiniteiosSliderrOffset, data.infiniteiosSliderrWidth, data.numberOfiosSliders, data.settings);
				
				activeChildOffsets[data.sliderNumber] = slide;

			});
			
		},
		
		/* Locks the slider. Temporarily disabling touch events within the slider without unbinding them. */
		lock: function() {
			
			return this.each(function() {
			
				var $this = $(this);
				var data = $this.data('iosslider');
				if(data == undefined) return false;

				touchLocks[data.sliderNumber] = true;
			
			});
			
		},
		
		/* Unlocks the slider. Enables touch events previously disabled by the lock method. */
		unlock: function() {
		
			return this.each(function() {
			
				var $this = $(this);
				var data = $this.data('iosslider');
				if(data == undefined) return false;

				touchLocks[data.sliderNumber] = false;
			
			});
		
		}
	
	}
	
	/* public functions */
	$.fn.iosSlider = function(method) {

		if(methods[method]) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if (typeof method === 'object' || !method) {
			return methods.init.apply(this, arguments);
		} else {
			$.error('invalid method call!');
		}
	
    };

}) (jQuery);