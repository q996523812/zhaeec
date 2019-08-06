(function ($) {
	var NAMESPACE = 'checkbox';
	function Checkbox(element, options){
		this.$element = $(element);
	    this.options = $.extend({}, Checkbox.DEFAULTS, $.isPlainObject(options) && options);
	    this.placeholders = $.extend({}, Checkbox.DEFAULTS);
	    this.active = false;
	    this.init();
	}
	Checkbox.prototype = {
		constructor: Checkbox,
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
			var $checkboxes = this.$element;
			var districts = {};
			var data = [];
			var values = [];
			console.log("options="+options);
			districts = checkbox_datas[options.type];
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
			$checkboxes.html(this.getlist(options.type,data));
		},
		getlist: function(type,data){
			var list = [];
			$.each(data, function (i, n) {
				list.push(
					'<div><input type="checkbox" id="'+type+n.code+'" name="'+type+
					'" class="'+type+'" value="'+n.code+'"'+
					(n.checked ? ' checked' : '')+'>'+n.name+'</div>'
				);
			});
			return list.join('');
		}
	};
	Checkbox.DEFAULTS = {
		type: '',
		defaultvalue:''
	};

	Checkbox.setDefaults = function (options) {
		$.extend(Checkbox.DEFAULTS, options);
	};

	$.fn.checkbox = function (option) {
		var $this = $(this);
		var data = $this.data(NAMESPACE);
		var options;
		if (!data) {
			options = $.extend({}, $this.data(), $.isPlainObject(option) && option);
			data = new Checkbox(this, options);
		}
		return ;
	};

	$.fn.checkbox.Constructor = Checkbox;
	$.fn.checkbox.setDefaults = Checkbox.setDefaults;


})(jQuery);