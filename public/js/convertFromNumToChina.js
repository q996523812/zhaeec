;
(function($, window, document, undefined) {
	//插件名称
	var pluginName = "convert";
	// var EVENT_CHANGE = 'change.' + pluginName;
	var EVENT_CHANGE = 'change';
	//默认参数
	var defaults = {
		outputid: '',//转换后的中文输出标签的ID
		chnNumChar : ["零","壹","贰","叁","肆","伍","陆","柒","捌","玖"],
	    chnUnitSection : ["","万","亿","万亿","亿亿"],
	    chnUnitChar : ["","拾","百","千"],
		chnUnitPoint : ["角","分"]
	};
	//构造方法
	function Convert(element, options){
		this.element = element;
		this.settings = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;
        this.version = 'v1.0.0';
        this.init();
	};
	Convert.prototype = {
		//初始化方法，核心逻辑代码
		init : function(){
			this.bind(this.element,this.settings.outputid);
			this.reset();
		},
		output : function(element,outputid){
			var _element = element;
			var _outputid = outputid;
			$('#'+_outputid).val(this.getChn(_element.val()));
		},
		getChn : function(num){
			if(num == null){
				return null;
			}
			else if(num == 0){
				return '零元';
			}
			num = Math.round(num * 100)/100;
			var fractional = this.fractionalPart(num);
			var integral = this.integralPart(num);
			return integral+fractional;
		},
		//定义在每个小节的内部进行转化的方法，其他部分则与小节内部转化方法相同
		sectionToChinese : function(section){
			var chnNumChar = this.settings.chnNumChar;
			var chnUnitChar = this.settings.chnUnitChar;
			var str = '', chnstr = '',zero= false,count=0;   //zero为是否进行补零， 第一次进行取余由于为个位数，默认不补零
			while(section>0){
				var v = section % 10;  //对数字取余10，得到的数即为个位数
				if(v ==0){                    //如果数字为零，则对字符串进行补零
					if(zero){
						zero = false;        //如果遇到连续多次取余都是0，那么只需补一个零即可
						chnstr = chnNumChar[v] + chnstr; 
					}      
				}else{
					zero = true;           //第一次取余之后，如果再次取余为零，则需要补零
					str = chnNumChar[v];
					str += chnUnitChar[count];
					chnstr = str + chnstr;
				}
				count++;
				section = Math.floor(section/10);
			}
			return chnstr;
		},
		//处理整数部分
		integralPart : function(num){
			var chnNumChar = this.settings.chnNumChar;
			var chnUnitSection = this.settings.chnUnitSection;
			
			num = Math.floor(num);
			var unitPos = 0;
			var strIns = '', chnStr = '';
			var needZero = false;

			if(num === 0){
				return chnNumChar[0];
			} 
			while(num > 0){
				var section = num % 10000;
				if(needZero){
				  chnStr = chnNumChar[0] + chnStr;
				}
				strIns = this.sectionToChinese(section);
				strIns += (section !== 0) ? chnUnitSection[unitPos] : chnUnitSection[0];
				chnStr = strIns + chnStr;
				needZero = (section < 1000) && (section > 0);
				num = Math.floor(num / 10000);
				unitPos++;
			}
			return chnStr+"元";
		},
		//处理小数部分
		fractionalPart : function(num){
			var chnNumChar = this.settings.chnNumChar;
			var chnUnitPoint = this.settings.chnUnitPoint;

			var index =  num.toString().indexOf(".");
			if(index != -1){
				var str = num.toString().slice(index+1);
				var a = "";
				for(var i=0;i<str.length;i++){
				    a += chnNumChar[parseInt(str[i])]+chnUnitPoint[i];
				}
				return a ;
			}else{
				return "整";
			}
		},
		//绑定事件
		bind : function(element,outputid){
			this.element.on(EVENT_CHANGE, ( $.proxy(function () {
				this.output(element,outputid);
			}, this)));

		},
		//取消绑定事件
		unbind : function(){
			this.element.off(EVENT_CHANGE, this._changeProvince);
		},
		reset : function(){
			this.output(this.element,this.settings.outputid);
		},
		//删除插件
		destroy: function () {
		  this.unbind();
		  this.$element.removeData(NAMESPACE);
		}
	};

	$.fn.convert = function(options) {
		var a = new Convert(this, options);
	};

})(jQuery, window, document);