(function ($) {
	var NAMESPACE = 'radio';
	function Radio(element, options){
		this.$element = $(element);
	    this.options = $.extend({}, Radio.DEFAULTS, $.isPlainObject(options) && options);
	    this.placeholders = $.extend({}, Radio.DEFAULTS);
	    this.active = false;
	    this.init();
	}
	Radio.prototype = {
		constructor: Radio,
		init: function () {
			var options = this.options;
			var $select = this.$element;
			var data = {};

			$.extend(data, $(this).data());
			// Reset all the selects (after event binding)
			this.reset();

			this.active = true;
		},
		reset: function(){
			var options = this.options;
			var $radioes = this.$element;
			var districts = {};
			var data = [];
			var values = [];
			districts = select_datas[options.type];
			values = options.defaultvalue.split(',');

			if ($.isPlainObject(districts)) {
				$.each(districts, function (code, name) {
				  var checked = values.indexOf(code)===-1;
				  data.push({
				    code: code,
				    name: name,
				    checked: !checked
				  });
				});
			}
			$radioes.html(this.getlist(options.tabname,data));
		},
		getlist: function(tabname,data){
			var list = [];
			$.each(data, function (i, n) {
				list.push(
					'<input type="radio" id="'+tabname+n.code+'" name="'+tabname+
					'" class="'+tabname+'" value="'+n.code+'"'+
					(n.checked ? ' checked' : '')+'>'+n.name+'&nbsp;&nbsp;'
				);
			});
			return list.join('');
		}
	};
	Radio.DEFAULTS = {
		type: '',
		tabname: '',
		defaultvalue:''
	};

	Radio.setDefaults = function (options) {
		$.extend(Radio.DEFAULTS, options);
	};

	$.fn.radio = function (option) {
		var $this = $(this);
		var data = $this.data(NAMESPACE);
		var options;
		if (!data) {
			options = $.extend({}, $this.data(), $.isPlainObject(option) && option);
			data = new Radio(this, options);
		}
		return ;
	};

	$.fn.radio.Constructor = Radio;
	$.fn.radio.setDefaults = Radio.setDefaults;


})(jQuery);