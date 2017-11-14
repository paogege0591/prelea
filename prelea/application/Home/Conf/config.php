<?php
return array(
	/* 默认设定 */
	'DEFAULT_MODULE'        =>  'Home',  // 默认模块
	'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
	'DEFAULT_ACTION'        =>  'index', // 默认操作名称
	
	/* 数据库设置 */
	'DB_TYPE'               =>  'mysqli', // 数据库类型
	'DB_HOST'               =>  'localhost', // 服务器地址
	'DB_NAME'               =>  'prelea',          // 数据库名
	'DB_USER'               =>  'root',      // 用户名
	'DB_PWD'                =>  'root',          // 密码
	'DB_PORT'               =>  '',        // 端口
	'DB_PREFIX'             =>  '',// 数据库表前缀
	'DB_FIELDTYPE_CHECK'    =>  false,       // 是否进行字段类型检查
	'DB_FIELDS_CACHE'       =>  false,        // 启用字段缓存
	'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
	'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
	'DB_RW_SEPARATE'        =>  false,       // 数据库读写是否分离 主从式有效
	'DB_MASTER_NUM'         =>  1, // 读写分离后 主服务器数量
	'DB_SLAVE_NO'           =>  '', // 指定从服务器序号
	'DB_SQL_BUILD_CACHE'    =>  false, // 数据库查询的SQL创建缓存
	'DB_SQL_BUILD_QUEUE'    =>  'file',   // SQL缓存队列的缓存方式 支持 file xcache和apc
	'DB_SQL_BUILD_LENGTH'   =>  20, // SQL缓存的队列长度
	'DB_SQL_LOG'            =>  false, // SQL执行日志记录
	'DB_BIND_PARAM'         =>  false, // 数据库写入数据自动参数绑定
	
    //系统提示信息页面
    'TMPL_ACTION_ERROR'     =>  'Public:success', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   =>  'Public:success', // 默认成功跳转对应的模板文件
    
	/* URL设置 */
	'URL_CASE_INSENSITIVE'  =>  true,   // 默认false 表示URL区分大小写 true则表示不区分大小写
	'URL_MODEL'             =>  1,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
	// 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
	'URL_PATHINFO_DEPR'     =>  '/',	// PATHINFO模式下，各参数之间的分割符号
	'URL_PATHINFO_FETCH'    =>  'ORIG_PATH_INFO,REDIRECT_PATH_INFO,REDIRECT_URL', // 用于兼容判断PATH_INFO 参数的SERVER替代变量列表
	'URL_REQUEST_URI'       =>  'REQUEST_URI', // 获取当前页面地址的系统变量 默认为REQUEST_URI
	'URL_HTML_SUFFIX'       =>  'html',  // URL伪静态后缀设置
	'URL_DENY_SUFFIX'       =>  'ico|png|gif|jpg', // URL禁止访问的后缀设置
	'URL_PARAMS_BIND'       =>  true, // URL变量绑定到Action方法参数
	'URL_PARAMS_BIND_TYPE'  =>  0, // URL变量绑定的类型 0 按变量名绑定 1 按变量顺序绑定
	'URL_PARAMS_FILTER'     =>  false, // URL变量绑定过滤
	'URL_PARAMS_FILTER_TYPE'=>  '', // URL变量绑定过滤方法 如果为空 调用DEFAULT_FILTER
	'URL_404_REDIRECT'      =>  '', // 404 跳转页面 部署模式有效
	'URL_ROUTER_ON'         =>  false,   // 是否开启URL路由
	'URL_ROUTE_RULES'       =>  array(), // 默认路由规则 针对模块
	'URL_MAP_RULES'         =>  array(), // URL映射定义规则
	
);