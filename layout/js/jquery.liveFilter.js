/***********************************************************/
/*                    LiveFilter Plugin                    */
/*                      Version: 1.3                       */
/*                      Mike Merritt                       */
/*             	   Updated: Mar 04, 2011                   */
/***********************************************************/

(function($){
	$.fn.liveFilter = function (options) {

		// Default settings
		var defaults = {
			delay: 0,
			defaultText: '',
			hideDefault: false,
			zebra: false,
			zBase: false,
			addInputs: false

		};

		// Overwrite default settings with user provided ones.
		var options = $.extend({}, defaults, options);
		
		// Cache our wrapper element and determine what target we are going to be filtering,
		// also declare a couple more vars for global use.
		var wrap = $(this);
		var filterTarget = wrap.find('ul, ol, table');
		var keyDelay;
		var filter;
		var child;

		// Determine what sub elements we are going to be showing/hiding depending on 
		// what our filter target is.
		if (filterTarget.is('ul') || filterTarget.is('ol')) {
			child = 'li';
		} else if (filterTarget.is('table')) {
			child = 'tbody tr';
		}

		// Hide the list/table by default. If not being hidden apply zebra striping if needed.
		if (options.hideDefault === true) {
			$(filterTarget).find(child).hide()
		} else if (options.hideDefault === false && options.zebra != false) {
			zebraStriping();
		}

		// Cache all of our list/table elements so we don't have to select them over and over again.
		var cache = $(filterTarget).find(child);
		
		// Text input keyup event
		wrap.find('input[type="text"]').keyup(function() {

			// For use in the following callback.
			var input = $(this);

			// Used to reset the timeout so we can start over again if another key is pressed
			// before our current timeout has expired.
			clearTimeout(keyDelay);

			// Adding a timeout before we do any iterating or showing/hiding to help with performance
			// when the user types very quickly.
			
			if($(this).val()=='') {
					
					var filterTarget = wrap.find('ul, ol, table');
					var child;		
					child = 'li';
					$(filterTarget).find(child).show();
			
			}
			else{
				keyDelay = setTimeout(function () { 

					// Getting the text to filter.
					filter = input.val().toLowerCase();
					
					// Iterate through our cache of elements and match our supplied filter to the text of the element.
					var count = 0;
					cache.each(function(i) {
					
						
							text = $(this).text().toLowerCase();
							if (text.indexOf(filter) >= 0 && count <5) {
								{$(this).show();
								count = count + 1;
								}
							} else {
								$(this).hide();
							}
						
					});

					if(options.zebra != false) {
						zebraStriping();
					}

					clearTimeout(keyDelay);

				}, options.delay);
			}

		});
		
		wrap.find('ul.filtered_content li').blur(function() {
		
			alert('hello');
		
		});

		// Used to reset our text input and show all items in the filtered list
		wrap.find('input[type="reset"]').click(function() {

			if (options.defaultText === false) {

				wrap.find('input[type="text"]').attr('value', '');

				if (options.hideDefault === false) {
					cache.each(function(i) {
						$(this).show();
					});
				} else if (options.hideDefault === true) {
					cache.each(function(i) {
						$(this).hide();
					});
				}

			} else {

				wrap.find('input[type="text"]').attr('value', options.defaultText);

				if (options.hideDefault === false) {
					cache.each(function(i) {
						$(this).show();
					});
				} else if (options.hideDefault === true) {
					cache.each(function(i) {
						$(this).hide();
					});
				}

			}
			
			return false;

		});
		

// Used to reset our text input and show all items in the filtered list
		wrap.find('ul.filtered_content li').click(function() {
						
			
				//var mylistobj = $(this).parent().parent().parent().parent().find('ul.unfiltered_list').css("background-color","yellow");
				var mylistobj = $(this).parent().parent().parent().parent().find('ul.unfiltered_list');
				var stringName = $(this).find('p').text().split('(')[0];
				var span = "("+$(this).find('p').text().split('(')[1];
								
				//Check if it already exits
				var exists = 0;
				mylistobj.find("li").each(function() {
						tempName = $(this).find('label').text();
						if(tempName.trim() == (stringName+span).trim() )
							{
								if($(this).parent().attr('class') == "inner-content")
								{
									var innerContentObj = $(this).parent();
										innerContentObj.show();
								   if(innerContentObj.next().text() == "Show more..")			   
										innerContentObj.next().html("Show less..");
								}
								$(this).after( "<li><input type=\"checkbox\" checked=\"true\"><label class=\"selected\">"+stringName+"<span>"+span+"</span></label></li>" );								;								
								$(this).remove();
								exists = 1;
								return false;
								
							}
							
				});				
								
			
				//Append the selected checkbox after the All element
				if( exists == 0)
					mylistobj.find("li").filter(":first").after( "<li><input type=\"checkbox\" checked=\"true\"><label class=\"selected\">"+stringName+"<span>"+span+"</span></label></li>" );								;
								

								
				//Uncheck the All element
				mylistobj.find("li").filter(":first").find(":checkbox").attr("checked",false);		
				mylistobj.find("li").filter(":first").find(":checkbox").next().removeClass("selected");
				
			
			if (options.defaultText === false) {

				wrap.find('input[type="text"]').attr('value', '');

				if (options.hideDefault === false) {
					cache.each(function(i) {
						$(this).show();
					});
				} else if (options.hideDefault === true) {
					cache.each(function(i) {
						$(this).hide();
					});
				}

			} else {

				wrap.find('input[type="text"]').attr('value', options.defaultText);

				if (options.hideDefault === false) {
					cache.each(function(i) {
						$(this).show();
					});
				} else if (options.hideDefault === true) {
					cache.each(function(i) {
						$(this).hide();
					});
				}

			}
						
			
			return false;

		});


		// Used to set the default text of the text input if there is any
		if (options.defaultText != false) {
			var input = wrap.find('input[type="text"]');

			input.attr('value', options.defaultText);

			input.focus(function() {
				
				var curVal = $(this).attr('value');

				if (curVal === options.defaultText) {
					$(this).attr('value', '');
				}

			});

			wrap.find('input[type="text"]').blur(function() {
			
				$(this).css({'background-color':'red'});			
				alert('hello');
				
				/*var curVal = $(this).attr('value');				
								
				if (curVal === '') {
					$(this).attr('value', options.defaultText);										
				}
				*/
				
			});

		}
		
			wrap.find('input[type="text"]').blur(function() {
			
				if (options.defaultText === false) {
				

				if (options.hideDefault === false) {
					cache.each(function(i) {
						$(this).show();
					});
				} else if (options.hideDefault === true) {
					cache.each(function(i) {
						$(this).hide();
					});
				}

			} else {
				

				if (options.hideDefault === false) {
					cache.each(function(i) {
						$(this).show();
					});
				} else if (options.hideDefault === true) {
					cache.each(function(i) {
						$(this).hide();
					});
				}

			}
				
				
				/*var curVal = $(this).attr('value');				
								
				if (curVal === '') {
					$(this).attr('value', options.defaultText);										
				}
				*/
				
			});

		// Used to add inputs to the wrapping div if set to true.
		if (options.addInputs === true) {
			var markup = '<input class="filter" type="text" value="" /><input class="reset" type="reset" value="Reset!" />';
			wrap.prepend(markup);
		}

		// Used for zebra striping list/table.
		function zebraStriping() {

			$(filterTarget).find(child + ':visible:odd').css({ background: options.zebra });
			$(filterTarget).find(child + ':visible:even').css({ background: options.zBase });
		}

	}
})(jQuery);