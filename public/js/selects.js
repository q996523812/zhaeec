(function ($) {
	var NAMESPACE = 'selecter';
	var EVENT_CHANGE = 'change.' + NAMESPACE;
	
	function Selecter(element, options) {
	    this.$element = $(element);
	    this.options = $.extend({}, Selecter.DEFAULTS, $.isPlainObject(options) && options);
	    this.placeholders = $.extend({}, Selecter.DEFAULTS);
	    this.active = false;
	    this.init();
	}
  	Selecter.prototype = {
		constructor: Selecter,

		init: function () {
		  var options = this.options;
		  var $select = this.$element;
		  var data = {};

			$.extend(data, $(this).data());
		  this.bind();

		  // Reset all the selects (after event binding)
		  this.reset();

		  this.active = true;
		},

		bind: function () {
		  if (this.$select) {
		    this.$select.on(EVENT_CHANGE, (this._changeSelecter = $.proxy(function () {
		      
		    }, this)));
		  } 
		},

		unbind: function () {
		  if (this.$select) {
		    this.$select.off(EVENT_CHANGE, this._changeSelecter);
		  }
		},

		output: function (type) {
		  var options = this.options;
		  var placeholders = this.placeholders;
		  var $select = this.$element;
		  var districts = {};
		  var data = [];
		  var code;
		  var matched;
		  var value;

		  if (!$select || !$select.length) {
		    return;
		  }
		  value = options["selectvalue"];		 
		  districts = select_datas[options.type];
// console.log(districts);
		  if ($.isPlainObject(districts)) {
		    $.each(districts, function (code, address) {
		      // var selected = address === value;
		      var selected = null;
		      if(options.savetype == 2){
			  	selected = code === value;
			  }
			  else{
			  	selected = address === value;
			  }

		      if (selected) {
		        matched = true;
		      }

		      data.push({
		        code: code,
		        address: address,
		        selected: selected
		      });
		    });
		  }

		  if (!matched) {
		    if (data.length && (options.autoSelect || options.autoselect)) {
		      data[0].selected = true;
		    }

		    // Save the unmatched value as a placeholder at the first output
		    if (!this.active && value) {
		      placeholders["selectvalue"] = value;
		    }
		  }

		  // Add placeholder option
		  if (options.placeholder) {
		    data.unshift({
		      code: '',
		      address: placeholders["selectvalue"],
		      selected: false
		    });
		  }
		  if(options.savetype == 2){
		  	$select.html(this.getList2(data));
		  }
		  else{
		  	$select.html(this.getList(data));
		  }
		  // $select.html(this.getList(data));
		},

		getList: function (data) {
		  var list = [];
		  $.each(data, function (i, n) {
		    list.push(
		      '<option' +
		      ' value="' + (n.address && n.code ? n.address : '') + '"' +
		      ' data-code="' + (n.code || '') + '"' +
		      (n.selected ? ' selected' : '') +
		      '>' +
		        (n.address || '') +
		      '</option>'
		    );
		  });

		  return list.join('');
		},
		getList2: function (data) {
		  var list = [];
		  $.each(data, function (i, n) {
		    list.push(
		      '<option' +
		      ' value="' + n.code + '"' +
		      ' data-code="' + (n.code || '') + '"' +
		      (n.selected ? ' selected' : '') +
		      '>' +
		        (n.address || '') +
		      '</option>'
		    );
		  });
		  return list.join('');
		},

		reset: function (deep) {
		  if (!deep) {
		    this.output(this.$type);
		  } else{
		    this.$select.find(':first').prop('selected', true).trigger(EVENT_CHANGE);
		  }
		},

		destroy: function () {
		  this.unbind();
		  this.$element.removeData(NAMESPACE);
		}
	};	
	Selecter.DEFAULTS = {
		autoSelect: true,
		placeholder: true,
		type: '',
		savetype: 1,
		selectvalue: '——  ——'
	};

	Selecter.setDefaults = function (options) {
		$.extend(Selecter.DEFAULTS, options);
	};
  // Save the other distpicker
  Selecter.other = $.fn.Selecter;

  // Register as jQuery plugin
  $.fn.selecter = function (option) {
	var $this = $(this);
	var data = $this.data(NAMESPACE);
	var options;
	if (!data) {
		options = $.extend({}, $this.data(), $.isPlainObject(option) && option);
		data = new Selecter(this, options);
	}
	return ;
  };

  $.fn.selecter.Constructor = Selecter;
  $.fn.selecter.setDefaults = Selecter.setDefaults;

  // No conflict
  $.fn.selecter.noConflict = function () {
    $.fn.selecter = Selecter.other;
    return this;
  };

  $(function () {
    $('[data-toggle="selecter"]').selecter();
  });
})(jQuery);