(function ($) {
	var select_datas = {
		//是否
		sf : {
			1: '是',
			2: '否'
		},
		//企业性质
		qyxz : {
			1 : '国有企业',
			2 : '非国有企业'
		},
		//所属集团
		ssjt : {
			1 : '珠海格力集团有限公司',
			2 : '珠海华发集团有限公司',
			3 : '珠海九洲控股集团有限公司',
			4 : '珠海市免税企业集团有限公司',
			5 : '珠海港控股集团有限公司',
			6 : '珠海公共交通运输集团有限公司',
			7 : '珠海水务集团有限公司',
			8 : '珠海城市建设集团有限公司',
			9 : '珠海投资控股有限公司',
			10 : '珠海交通集团有限公司',
			11 : '珠海航空城发展集团有限公司',
			12 : '珠海市会展集团有限公司',
			13 : '珠海金融投资控股集团有限公司',
			14 : '珠海市联晟资产托管有限公司',
			15 : '珠海保安集团有限公司',
			16 : '珠海市珠光集团控股有限公司',
			17 : '珠海市安居集团有限公司',
			18 : '珠海市农业投资控股集团有限公司'
		},
		//项目配置类型
		xmpz : {
			1 : '服务类',
			2 : '非服务类'
		},
		//交易方式
		jyfs : {
			1 : '网络竞价',
			2 : '公开招标',
			3 : '邀请招标',
			4 : '竞争性谈判',
			5 : '询价',
			6 : '单一来源'
		},
		//报价模式
		bjms : {
			1 : '一次报价',
			2 : '多次报价',
			3 : '反向一次报价',
			4 : '反向多次报价'
		},
		//项目(标的)意向
		bdyx : {
			1 : '购买服务',
			2 : '物资',
			3 : '工程'
		},
		//交易目的
		jymd : {
			1 : '资产租赁',
			2 : '经营权出让'
		},
		//资产类别
		zclb : {
			1 : '土地',
			2 : '房产',
			3 : '设备',
			4 : '权益类资产',
			5 : '其他'
		},
		//信息发布方式
		xxfbfs : {
			1 : '珠海产权交易中心网站',
			2 : '珠海产权交易中心微信',
			3 : '民营经济报',
			4 : '珠海特区报',
			5 : '阳江日报',
			6 : '其他'
		},
		//公告类型
		suspendtype : {
			1 : '中止公告',
			2 : '终结公告',
			3 : '竞价延期公告',
			4 : '澄清公告',
			5 : '答疑公告'
		},
		customertype :{
			1: '自然人',
			2: '法人或其他组织'
		},
		id_type :{
			1: {
				1:'身份证',
				2:'普通护照',
				3:'公务护照',
				4:'居民户口簿',
				5:'军官证',
				6:'港澳居民来往内地通行证',
				7:'台湾居民来往内地通行证',
				8:'外交护照',
				9:'因公普通护照',
				10:'临时身份证'
			},
			2: {
				1:'统一社会信用代码',
				2:'组织机构代码',
				3:'纳税人识别号'
			},
		},
		companytype : {
			1:'全民所有制企业',
			2:'有限责任公司',
			3:'股份有限公司',
			4:'集体所有制',
			5:'合伙企业',
			6:'其他'
		},
		//经济类型
		economytype : {
			1:'国资监管机构或政府部门',
			2:'国有独资或国有全资公司（企业）',
			3:'国有控股企业',
			4:'国有事业单位，国有社团等',
			5:'国有参股企业',
			6:'非国有企业',
			8:'外资企业',
			9:'其他'
		},
		//经营规模
		scale :{
			1:'大型',
			2:'中型',
			3:'小型',
			4:'微型'
		},
		//币种
		currency:{
			'AUD':'澳元',
			'CAD':'加元',
			'CNY':'人民币',
			'EUR':'欧元',
			'GBP':'英镑',
			'HKD':'港元',
			'JPY':'日元',
			'KRW':'韩元',
			'MOP':'澳门币',
			'USD':'美元'
		},
		//所属行业
		industry1 : {
			'A':'农、林、牧、渔业',
			'B':'采矿业',
			'C':'制造业',
			'D':'电力、热力、燃气及水生产和供应业',
			'E':'建筑业',
			'F':'批发和零售业',
			'G':'交通运输、仓储和邮政业',
			'H':'住宿和餐饮业',
			'I':'信息传输、软件和信息技术服务业',
			'J':'金融业',
			'K':'房地产业',
			'L':'租赁和商务服务业',
			'M':'科学研究和技术服务业',
			'N':'水利、环境和公共设施管理业',
			'O':'居民服务、修理和其他服务业',
			'P':'教育',
			'Q':'卫生和社会工作',
			'R':'文化、体育和娱乐业',
			'S':'公共管理、社会保障和社会组织',
			'T':'国际组织',
			'Z':'其他行业'
		},
		industry2 : {
			'A':{
				'01':'农业',
				'02':'林业',
				'03':'畜牧业',
				'04':'渔业',
				'05':'农、林、牧、渔服务业'
			},
			'B':{
				'06':'煤炭开采和洗选业',
				'07':'石油和天然气开采业',
				'08':'黑色金属矿采选业',
				'09':'有色金属矿采选业',
				'10':'非金属矿采选业',
				'11':'开采辅助活动',
				'12':'其他采矿业'
			},
			'C':{
				'13':'农副食品加工业',
				'14':'食品制造业',
				'15':'酒、饮料和精制茶制造业',
				'16':'烟草制品业',
				'17':'纺织业',
				'18':'纺织服装、服饰业',
				'19':'皮革、毛皮、羽毛及其制品和制鞋业',
				'20':'木材加工和木、竹、藤、棕、草制品业',
				'21':'家具制造业',
				'22':'造纸和纸制品业',
				'23':'印刷和记录媒介复制业',
				'24':'文教、工美、体育和娱乐用品制造业',
				'25':'石油加工、炼焦和核燃料加工业',
				'26':'化学原料和化学制品制造业',
				'27':'医药制造业',
				'28':'化学纤维制造业',
				'29':'橡胶和塑料制品业',
				'30':'非金属矿物制品业',
				'31':'黑色金属冶炼和压延加工业',
				'32':'有色金属冶炼和压延加工业',
				'33':'金属制品业',
				'34':'通用设备制造业',
				'35':'专用设备制造业',
				'36':'汽车制造业',
				'37':'铁路、船舶、航空航天和其他运输设备制造业',
				'38':'电气机械和器材制造业',
				'39':'计算机、通信和其他电子设备制造业',
				'40':'仪器仪表制造业',
				'41':'其他制造业',
				'42':'废弃资源综合利用业',
				'43':'金属制品、机械和设备修理业'
			},
			'D':{
				'44':'电力、 热力生产和供应业',
				'45':'燃气生产和供应业',
				'46':'水的生产和供应业'
			},
			'E':{
				'47':'房屋建筑业',
				'48':'土木工程建筑业',
				'49':'建筑安装业',
				'50':'建筑装饰、 装修和其他建筑业'
			},
			'F':{
				'51':'批发业',
				'52':'零售业'
			},
			'G':{
				'53':'铁路运输业 ',
				'54':'道路运输业',
				'55':'水上运输业',
				'56':'航空运输业',
				'57':'管道运输业',
				'58':'多式联运和运输代理业',
				'59':'装卸搬运和仓储业',
				'60':'邮政业'
			},
			'H':{
				'61':'住宿业',
				'62':'餐饮业'
			},
			'I':{
				'63':'电信、 广播电视和卫星传输服务',
				'64':'互联网和相关服务',
				'65':'软件和信息技术服务业'
			},
			'J':{
				'66':'货币金融服务',
				'67':'资本市场服务',
				'68':'保险业',
				'69':'其他金融业'
			},
			'K':{
				'70':'房地产业'
			},
			'L':{
				'71':'租赁业',
				'72':'商务服务业'
			},
			'M':{
				'73':'研究和试验发展',
				'74':'专业技术服务业',
				'75':'科技推广和应用服务业'
			},
			'N':{
				'76':'水利管理业',
				'77':'生态保护和环境治理业',
				'78':'公共设施管理业',
				'79':'土地管理业'
			},
			'O':{
				'80':'居民服务业',
				'81':'机动车、 电子产品和日用产品修理业',
				'82':'其他服务业'
			},
			'P':{
				'83':'教育'
			},
			'Q':{
				'84':'卫生',
				'85':'社会工作'
			},
			'R':{
				'86':'新闻和出版业',
				'87':'广播、 电视、 电影和录音制作业',
				'88':'文化艺术业',
				'89':'体育',
				'90':'娱乐业'
			},
			'S':{
				'91':'中国共产党机关',
				'92':'国家机构',
				'93':'人民政协、 民主党派',
				'94':'社会保障',
				'95':'群众团体、 社会团体和其他成员组织',
				'96':'基层群众自治组织'
			},
			'T':{
				'97':'国际组织'
			},
			'Z':{
				'98':'其他行业'
			}
		},
		//金融业分类
		finance_industry1:{
			'A':'银行',
			'B':'证券类公司',
			'C':'保险类公司',
			'D':'金融控股（集团）公司',
			'E':'投资基金（直接股权、创业投资、私募股权）公司',
			'F':'担保类公司',
			'G':'提供清算、货币印制等特殊金融服务的公司',
			'H':'其他金融机构'
		},
		finance_industry2:{
			'A':{
				'A01':'银行类金融机构',
				'A02':'非银行类金融机构'
			},
			'B':{
				'B01':'证券公司',
				'B02':'证券期货经营机构',
				'B03':'证券投资基金管理公司',
				'B04':'证券期货交易所',
				'B05':'证券资信评级机构',
				'B06':'证券登记结算公司',
				'B07':'期货公司',
				'B08':'证券期货投资咨询机构',
				'B09':'基金托管机构',
				'B10':'证券投资咨询公司',
				'B11':'证券直投公司',
				'B12':'其他证券类公司'
			},
			'C':{
				'C01':'政策性保险公司',
				'C02':'保险集团（控股）公司',
				'C03':'人身保险公司',
				'C04':'财产保险公司',
				'C05':'再保险公司',
				'C06':'保险资产管理公司',
				'C07':'保险代理公司',
				'C08':'保险经纪公司',
				'C09':'保险公估公司',
				'C10':'企业年金',
				'C11':'其他保险类公司'
			},
			'D':{
				'D01':'金融控股（集团）公司'
			},
			'E':{
				'E01':'投资基金（直接股权、创业投资、私募股权）公司'
			},
			'F':{
				'F01':'融资性担保公司',
				'F02':'非融资性担保公司',
				'F03':'其他担保类企业'
			},
			'G':{
				'G01':'提供清算、货币印制等特殊金融服务的公司'
			},
			'H':{
				'H01':'政府设立的投融资公司（平台公司）',
				'H02':'小额贷款公司',
				'H03':'典当行',
				'H04':'其他金融类机构'
			}
		},
		//产权隶属关系
		pauseText :{
			1:'央属',
			2:'省属',
			3:'市属',
			4:'区属',
			5:'集体',
			6:'联合挂牌',
			7:'其他公有',
			8:'民营类项目'
		},
		pubDealWay:{
			1:'网络竞价',
			2:'招投标',
			3:'拍卖',
			4:'其他'
		},
		bidmode:{
			1:'多次报价',
			2:'一次报价'
		},
		reporttype:{
			1:'年报',
			2:'季报',
			3:'月报'
		},
		innerAudit :{
			1:'董事会决议',
			2:'股东会决议',
			3:'总经理办公会决议',
			4:'其他类型'
		},
		//监管类型类型
		regulatortype:{
			1:'中央',
			2:'地方'
		},
		//国资监管机构
		regulator:{
			1:'国务院国资委监管',
			2:'财政部监管',
			3:'其他中央部委监管',
			4:'省级国资委监管',
			5:'省级财政部门监管',
			6:'省级其他部门监管',
			7:'地市级国资委监管',
			8:'地市级财政部门或金融办监管',
			9:'地市级其他部门监管',
			10:'区县级国资委监管',
			11:'区县级财政部门或金融办监管',
			13:'区县其他部门监管'
		},
		//批准机构类型
		permitCompType:{
			1:'财政部',
			2:'国务院国资委',
			3:'地方财政部门',
			4:'地方国资委',
			5:'地方金融办（局）',
			6:'集团（控股）公司',
			7:'其他'
		},
		date_type:{
			1:'工作日',
			2:'日历日'
		},
		proSource:{
			1:'企业实物资产',
			2:'行政事业单位实物资产',
			3:'其他'
		},
		//保证金交纳时间
		bailStartFlag:{
			1:'报名就交纳',
			2:'交易机构受让登记后交纳保证金',
			3:'经资格确认后交纳保证金'
		},
		//价款支付方式
		pubPayMode:{
			1:'一次性支付',
			2:'分期支付'
		},
		//资产类型
		proType:{
			1:'在建工程',
			2:'土地使用权',
			3:'实物房产',
			4:'出租',
			5:'机械设备',
			6:'其它资产',
			7:'专利',
			8:'产成品/原材料',
			9:'存货',
			10:'商标',
			11:'机动车',
			13:'农村产权',
			14:'废旧物资'
		}
	}
	if (typeof window !== 'undefined') {
	    window.select_datas = select_datas;
	}
})(jQuery);