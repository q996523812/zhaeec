;
(function($, window, document, undefined) {
	//插件名称
	var pluginName = "selectunion";
	var EVENT_CHANGE = 'change.' + pluginName;
	//默认参数
	var defaults = {
		type: '',//下拉框数据类型。值为sleects.data.js中的数据类型名称
		selectvalue: '—— ——',//默认值
		savetype: 1,//下拉框保存值。{code:name},1：保存name，2：保存code。
		selectchange:function(){},//额外的需要绑定到change事件的方法
		subid : '',//联动框ID
		subtype: '',//联动框数据类型.值为sleects.data.js中的数据类型名称
		subselectvalue:'—— ——',//联动框默认值
		subsavetype: 1//联动框保存值。{code:name},1：保存name，2：保存code。
	};
	//构造方法
	function SelectUnion(element, options){
		this.element = element;
		this.settings = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;
        this.version = 'v1.0.0';
        this.init();
	};
	SelectUnion.prototype = {
		//初始化方法，核心逻辑代码
		init : function(){console.log(111);
			this.bind(this.settings.selectchange);
			this.reset();
		},
		output : function(element,type,selectvalue,savetype){
			var _element = $(element);
			var _type = type;
			var _selectvalue = selectvalue;
			var _savetype = savetype;
			var _data = [];
			var _select_data = {};
			if(_type === this.settings.subtype){
				_select_data = select_datas[_type][this.element.find(':selected').data('code')];
			}
			else{
				_select_data = select_datas[_type];
			}
			

			if ($.isPlainObject(_select_data)) {
				$.each(_select_data, function (code, name) {
					var selected = name === _selectvalue;
					_data.push({
						code: code,
						name: name,
						selected: selected
					});
				});
			}
			_data.unshift({
				code: '',
				name: '—— ——',
				selected: false
			});
			_element.html(this.getlist(_data,_savetype));
		},
		getlist : function(data,savetype){
			var list = [];
			$.each(data, function (i, n) {
				var value = "";
				if(savetype===1){
					value = n.name && n.code ? n.name : '';
				}
				else{
					value = n.name && n.code ? n.code : '';
				}
				list.push(
					'<option' +
					' value="' + value + '"' +
					' data-code="' + (n.code || '') + '"' +
					(n.selected ? ' selected' : '') +
					'>' +
					(n.name || '') +
					'</option>'
				);
			});
			return list.join('');
		},
		//绑定事件
		bind : function(selectchange){
			this.element.on(EVENT_CHANGE, (this._changeProvince = $.proxy(function () {
				this.output($('#'+this.settings.subid)[0],this.settings.subtype,this.settings.subselectvalue,this.settings.subsavetype);
				selectchange();
			}, this)));

			// this.element.on(EVENT_CHANGE, this._changeProvince = function () {
			// 	this.output($('#'+this.settings.subid)[0],this.settings.subtype,this.settings.subselectvalue);
			// 	this.settings.selectchange();
			// });
		},
		//取消绑定事件
		unbind : function(){
			this.element.off(EVENT_CHANGE, this._changeProvince);
		},
		reset : function(){
			this.output(this.element,this.settings.type,this.settings.selectedvalue,this.settings.savetype);
			this.output($('#'+this.settings.subid)[0],this.settings.subtype,this.settings.subselectvalue,this.settings.subsavetype);
			// this.element.prop('selected', true).trigger(EVENT_CHANGE);
		},
		//删除插件
		destroy: function () {
		  this.unbind();
		  this.$element.removeData(NAMESPACE);
		}
	};
	$.fn.selectunion = function(options) {
		var a = new SelectUnion(this, options);
	};

})(jQuery, window, document);