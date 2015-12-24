function Mask()
{
    this.canPress           = true;
    this.canUp              = false;
    this.isAllowedNumber    = false;

    this.isCompleteMask     = false;
	this.isUpdateMaskValue 	= false;
	this.maskCode     		= '';
	this.maxLength         	= 14;

    this.valCount;
    this.value;
	
	this.priorityLang1 = 'regionUa';
	this.priorityLang2 = 'regionRu';
	this.priorityLang3 = 'regionBy';
	
	this.prioritySelect = '';
	
	this.flagClicking = false;
	
	this.blockHeight = 0;
	
	this.animateProcess = false;
	
	this.formRetry = false;
	
	this.key = 0;

    this.checkIsAction = function(object, key)
    {
        if (!object.canPress)
        {
            return false;
        }

		if (object.isCompleteMask == true)
		{
			object.isUpdateMask(object);
		}

		if ((object.isCompleteMask == true) && (object.isUpdateMaskValue == false))
		{
			return true;
		}

		var currentValueLength = $('input.phoneWidgetClass[keyattr=' + object.key + ']').val().length;
		
		if ((currentValueLength >= object.maxLength) && (((key > 47) && (key < 58)) || ((key > 95) && (key < 106))))
		{
            object.allowedPress(object, false);
			return false;			
		}

        object.value = $('input.phoneWidgetClass[keyattr=' + object.key + ']').val();

        if (((key > 47) && (key < 58)) || ((key > 95) && (key < 106)))
        {
            object.canPress = false;
        }

        if ((key == 32) || (key == 61) || (key == 0))
        {
            object.allowedPress(object, false);
			return false;
        }		

        if (key < 65)
        {
            object.allowedPress(object, true);
			return true;
        }

        if ((key > 64) && (key < 91))
        {
            object.allowedPress(object, false);
			return false;
        }

        if (key > 105)
        {
            object.allowedPress(object, false);
			return false;
        }

        object.allowedPress(object, true);
		
		return true;
    }

    this.maskPhone = function(object, key)
    {
        object.canPress = true;

        if (object.canUp)
        {
            var value = $('input.phoneWidgetClass[keyattr=' + object.key + ']').val();

            object.isAllowedNumber = false;

            object.checkIsAllowedNumber(object, value);

            if (object.isAllowedNumber == false)
            {				
                object.setValue(object, object.value);
            }
			else
			{
				object.showNeededRegions(object);
			}
        }
    }

    this.checkIsAllowedNumber = function(object, value)
    {
        if (value == '')
        {
			var html = '<div class="countryFlag" keyattr=' + object.key + '>&nbsp;</div>' +  '<div class="register-arrow-down">&nbsp;</div>';
            $('div#countryFlagWrapper_' + object.key).html(html);
			object.prioritySelect = '';
            object.isAllowedNumber = true;
        }

		var checked = false;
		
        if (object.isAllowedNumber != true)
        {
            var codes;

			if (object.prioritySelect != '')
			{
				$.each($('li.countryList[keyattr=' + object.key + ']'), function(){
					codes = $(this).attr('paramCode');

					if ((codes != undefined) && (codes != '') && ((codes == value) || (codes.indexOf(value) == 0) || (value.indexOf(codes) == 0)) && ($(this).attr('paramClass') == object.prioritySelect))
					{
						object.setCorrectCountryFlag(object, $(this).attr('paramClass'));
						object.isCompleteMask = true;
						object.maskCode = value;
						object.isAllowedNumber = true;
						checked = true;
						return;
					}
				});
			}
			
			if (!checked)
			{			
				$.each($('li.countryList[keyattr=' + object.key + ']'), function(){
					codes = $(this).attr('paramCode');

					if ((codes != undefined) && (codes != '') && (codes == value) && (($(this).attr('paramClass') == object.priorityLang1) || ($(this).attr('paramClass') == object.priorityLang2) || ($(this).attr('paramClass') == object.priorityLang3)))
					{
						object.setCorrectCountryFlag(object, $(this).attr('paramClass'));
						object.isCompleteMask = true;
						object.maskCode = value;
						object.isAllowedNumber = true;
						checked = true;
						return;
					}
				});			
			}
			
			if (!checked)
			{
				$.each($('li.countryList[keyattr=' + object.key + ']'), function(){
					codes = $(this).attr('paramCode');

					if ((codes != undefined) && (codes != '') && (codes == value))
					{
						object.setCorrectCountryFlag(object, $(this).attr('paramClass'));
						object.isCompleteMask = true;
						object.maskCode = value;
						object.isAllowedNumber = true;
						checked = true;
						return;
					}
				});			
			}

			if (!checked)
			{
				if (object.isAllowedNumber != true)
				{
					codes = '';

					$.each($('li.countryList[keyattr=' + object.key + ']'), function(){
						codes = $(this).attr('paramCode');

						if ((codes != undefined) && (codes != '') && (codes.indexOf(value) == 0) && (($(this).attr('paramClass') == object.priorityLang1) || ($(this).attr('paramClass') == object.priorityLang2) || ($(this).attr('paramClass') == object.priorityLang3)))
						{
							object.setCorrectCountryFlag(object, $(this).attr('paramClass'));
							object.isAllowedNumber = true;
							checked = true;
							return;
						}
					});
				}			
			
				if ((object.isAllowedNumber != true) && (!checked))
				{
					codes = '';

					$.each($('li.countryList[keyattr=' + object.key + ']'), function(){
						codes = $(this).attr('paramCode');

						if ((codes != undefined) && (codes != '') && (codes.indexOf(value) == 0))
						{
							object.setCorrectCountryFlag(object, $(this).attr('paramClass'));
							object.isAllowedNumber = true;
							checked = true;
							return;
						}
					});
				}
			}
			
			if (!checked)
			{
				if ((object.isAllowedNumber != true) && ((object.isCompleteMask == true) || (object.formRetry == true)))
				{
					codes = '';

					$.each($('li.countryList[keyattr=' + object.key + ']'), function(){
						codes = $(this).attr('paramCode');

						if ((codes != undefined) && (codes != '') && (value.indexOf(codes) == 0) && (($(this).attr('paramClass') == object.priorityLang1) || ($(this).attr('paramClass') == object.priorityLang2) || ($(this).attr('paramClass') == object.priorityLang3)))
						{
							object.setCorrectCountryFlag(object, $(this).attr('paramClass'));
							object.isAllowedNumber = true;
							checked = true;
							object.isCompleteMask = true;
							return;
						}
					});
				}
			
				if ((object.isAllowedNumber != true) && ((object.isCompleteMask == true) || (object.formRetry == true)) && (!checked))
				{
					codes = '';

					$.each($('li.countryList[keyattr=' + object.key + ']'), function(){
						codes = $(this).attr('paramCode');

						if ((codes != undefined) && (codes != '') && (value.indexOf(codes) == 0))
						{
							object.setCorrectCountryFlag(object, $(this).attr('paramClass'));
							object.isAllowedNumber = true;
							checked = true;
							object.isCompleteMask = true;
							return;
						}
					});
				}
			}			
			
        }
    }

    this.allowedPress = function(object, allowed)
    {
        if (allowed)
        {
            object.canUp = true;
            object.valCount = $('input.phoneWidgetClass[keyattr=' + object.key + ']').val().length;
            return true;
        }
        object.canUp = false;
    }

    this.setValue = function(object, value)
    {
        $('input.phoneWidgetClass[keyattr=' + object.key + ']').val(value);
    }

    this.setCorrectCountryFlag = function(object, classRegion)
    {
        if (classRegion == '' || classRegion == undefined)
        {
	        var html = '<div class="countryFlag regionBackground regionRu" keyattr=' + object.key + '></div>' +  '<div class="register-arrow-down">&nbsp;</div>';
	        $('div#countryFlagWrapper_' + object.key).html(html);
	        return;
        }

        var html = '<div class="countryFlag regionBackground ' + classRegion + '" keyattr=' + object.key + '></div>' +  '<div class="register-arrow-down">&nbsp;</div>';
        $('div#countryFlagWrapper_' + object.key).html(html);
    }
	
	this.isUpdateMask = function(object)
	{
		var codes = '';
		var value = $('input.phoneWidgetClass[keyattr=' + object.key + ']').val();
		if (value == '')
		{
			object.isUpdateMaskValue = true;
		}
		else
		{
			if (value.indexOf(object.maskCode) == 0)
			{
				object.isUpdateMaskValue = true;
			}
			else
			{
				$.each($('li.countryList[keyattr=' + object.key + ']'), function(){
					codes = $(this).attr('paramCode');

					if ((codes != undefined) && (codes != '') && (codes == value) && (codes != object.maskCode))
					{
						object.maskCode = value;
						object.isUpdateMaskValue = true;
						object.setCorrectCountryFlag($(this).attr('paramClass'));
						object.isAllowedNumber = true;
					}
				});					
			}

		}
		return true;
	}

	this.checkContryShow = function(object)
	{
		var hiding = $('ul.countriesList[keyattr=' + object.key + ']').css('display');
	
		if (object.animateProcess)
		{
			return;
		}
	
		object.animateProcess = true;
		
		if (hiding == 'none')
		{
			$(this).removeClass('heightBlock');
			$('ul.countriesList[keyattr=' + object.key + ']').show();
			
			if (object.blockHeight > 0)
			{
				$('ul.countriesList[keyattr=' + object.key + ']').animate({minHeight : "50px", height : object.blockHeight + 'px'}, 400, function(){
					object.flagClicking = true;
					object.animateProcess = false;
				});			
			}
			else
			{
				$('ul.countriesList[keyattr=' + object.key + ']').animate({minHeight : "50px"}, 400, function(){
					object.flagClicking = true;
					object.animateProcess = false;
				});
			}
		}
		else
		{
			$('ul.countriesList[keyattr=' + object.key + ']').animate({minHeight : "0", height : "0"}, 300, function(){
				$(this).hide();
				$(this).addClass('heightBlock');
				object.flagClicking = false;
				object.animateProcess = false;
			});
		}
	}

	this.showNeededRegions = function(object)
	{
		var value = $('input.phoneWidgetClass[keyattr=' + object.key + ']').val();

		var codes = '';

		$('li.countryList[keyattr=' + object.key + ']').hide();

		var maxHeight = parseInt($('ul.countriesList[keyattr=' + object.key + ']').css('maxHeight'));
		var countBlocks = 0;
		var totalHeight = 0;
		
		if (value == '')
		{
			$('li.countryList[keyattr=' + object.key + ']').show();
			totalHeight = maxHeight;
		}
		else
		{
			$.each($('li.countryList[keyattr=' + object.key + ']'), function(){
				codes = $(this).attr('paramCode');

				if ((codes != undefined) && (codes != '') && (codes.indexOf(value) == 0))
				{
					$(this).show();
					countBlocks++;
				}
			});

			$.each($('li.countryList[keyattr=' + object.key + ']'), function(){
				codes = $(this).attr('paramCode');

				if ((codes != undefined) && (codes != '') && (value.indexOf(codes) == 0))
				{
					$(this).show();
					countBlocks++;
				}
			});
			
			totalHeight = countBlocks * 26;
			if (totalHeight > maxHeight)
			{
				totalHeight = maxHeight;
			}
		}

		object.blockHeight = totalHeight;

		$('ul.countriesList[keyattr=' + object.key + ']').css('height', totalHeight + 'px');
	}
	
	this.checkByList = function(object, li)
	{
		var clickRegion = $(li).attr('paramClass');
		var clickCode = $(li).attr('paramCode');
		object.setCorrectCountryFlag(object, clickRegion);
		object.setValue(object, clickCode);
		object.isCompleteMask = true;	
		object.showNeededRegions(object);
		object.checkContryShow(object);
		object.prioritySelect = $(li).attr('paramClass');
		$('.phoneWidgetClass[keyattr=' + object.key + ']').focus();
	}
	
	this.pasteProcess = function(object, value, old)
	{
		var pasteLength = value.length;
		
		if (pasteLength > object.maxLength)
		{
			value = value.substr(0, object.maxLength);
			object.setValue(object, value);
		}
		
		var checkIsInt = parseInt(value);
		if (value != checkIsInt)
		{
			object.setValue(object, old);
			return;
		}
		
		object.isAllowedNumber = false;

		object.checkIsAllowedNumber(object, value);
		
		if (object.isAllowedNumber == false)
		{				
			object.setValue(object, old);
			return;
		}
		
		object.showNeededRegions(object);
		
	}
}

var maskindex;

$(function(){

	var maskindex = [];
	var clickkey = 0;
	
	$.each($('input.phoneWidgetClass'), function(){

		var mask = new Mask();

		mask.key = $(this).attr('keyattr');

		mask.valCount = $(this).val().length;

		mask.value = $(this).val();		

		if (mask.value == '')
		{
			var defaultRegion = $('li.defaultRegion').attr('paramClass');
			var defaultCode = $('li.defaultRegion').attr('paramCode');

			mask.setCorrectCountryFlag(mask, defaultRegion);	

			mask.setValue(mask, defaultCode);

		}
		else
		{
			mask.formRetry = true;
			mask.checkIsAllowedNumber(mask, mask.value);
		}

		mask.isCompleteMask = true;

		mask.showNeededRegions(mask);

		maskindex.push(mask);
	
	});	
	
	$('input.phoneWidgetClass').bind('keydown', function(e) {
		var key = $(this).attr('keyattr');
		return maskindex[key].checkIsAction(maskindex[key], e.keyCode);
	});

	$('input.phoneWidgetClass').bind('keyup', function(e) {
		var key = $(this).attr('keyattr');
		maskindex[key].maskPhone(maskindex[key], e.keyCode);
	});	

/*	var width = 0;
	$.each($('input.phoneWidgetClass'), function(){
		width = $(this).width();
		$(this).css('width', (width - 32) + 'px');
	});
	
	var width = 0;
	$.each($('input.phoneWidgetClassNoMask'), function(){
		width = $(this).width();
		$(this).css('width', (width - 10) + 'px');
	});	*/

	$('div.countryFlagWrapper').bind('click', function() {
		var key = $(this).attr('keyattr');
		maskindex[key].checkContryShow(maskindex[key]);
	});	


	$('li.countryList').bind('click', function() {
		var key = $(this).attr('keyattr');
		maskindex[key].checkByList(maskindex[key], this);
	});
	
	$('.phoneWidgetClass').bind('paste', function(e){
		var key = $(this).attr('keyattr');
		var self = this;
		var oldValue = $(this).val();
		setTimeout(function(e) {
			maskindex[key].pasteProcess(maskindex[key], $(self).val(), oldValue);
		}, 0);	
	});	
	
	$('body').bind('click', function(e) {
		if (!$(e.target).is('.countriesList, .phoneWidgetClass')) 
		{
			clickkey = 0;
			$.each(maskindex, function(){
			
				var hiding = $('ul.countriesList[keyattr=' + clickkey + ']').css('display');
			
				if ((hiding != 'none') && (this.flagClicking))
				{
					this.checkContryShow(this);
				}
				
				clickkey++;
			});
			clickkey = 0;
		}
	});

	$('body').keydown(function(e) {
		if( e.keyCode === 27 ) 
		{
			clickkey = 0;
			$.each(maskindex, function(){
			
				var hiding = $('ul.countriesList[keyattr=' + clickkey + ']').css('display');
			
				if ((hiding != 'none') && (this.flagClicking))
				{
					this.checkContryShow(this);
				}
				
				clickkey++;
			});						
			clickkey = 0;
		}
	});	

})


