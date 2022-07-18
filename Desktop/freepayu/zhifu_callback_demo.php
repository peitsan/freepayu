<?php
$merchantNum = '78590077533814784'; // 商户号, 商户后台的商户信息页面查看
$secret = "6fe0ad4a94f7f5250dd7b75fadb1a298"; //密钥
/**
 * md5(付款成功状态state的值+商户号merchantNum的值+商户订单号orderNo的值+订单金额amount的值+商户秘钥)
 * +表示字符串拼接
 */

write_log ( http_build_query($_GET));
$sign = sign ( array (
		$_GET ['state'],
		$merchantNum,
		$_GET ['orderNo'],
		$_GET ['amount'],
		$secret
) );

// 对比签名
// write_log('sign'.$sign);
if ($merchantNum == $_GET ['merchantNum'] && $sign == $_GET ['sign']) {
	//TODO: 检查对应业务数据的状态，判断该通知是否已经处理过，如果没有处理过再进行处理，如果处理过直接返回结果成功暨字符串success

	//TODO: 业务数据入库更新订单状态等

	write_log ( '我要返回success啦' );
	echo 'success';
} else {
	write_log ( '我签名没通过啊' );
	echo 'fail';
	exit ();
}
;
function sign($data_arr) {
	write_log ( join ( '+', $data_arr ) . "== MD5sign ==> " . md5 ( join ( '', $data_arr ) ) );
	return md5 ( join ( '', $data_arr ) );
}
;
/**
 * write_log 写入日志,调试或者记录用,上线后可以删除也可以按需保留部分
 * Class中调用方式 $this->write_log(...)
 * @param [type] $data    	[写入的数据]
 * @return [type] [description]
 */
function write_log($data) {
	$years = date ( 'Y-m' );
	// 设置路径目录信息
	$url = './zhifufm/' . $years . '/' . date ( 'Ymd' ) . '_request_log.txt';
	$dir_name = dirname ( $url );
	// 目录不存在就创建
	if (! file_exists ( $dir_name )) {
		// iconv防止中文名乱码
		$res = mkdir ( iconv ( "UTF-8", "GBK", $dir_name ), 0777, true );
	}
	$fp = fopen ( $url, "a" ); // 打开文件资源通道 不存在则自动创建
	fwrite ( $fp, date ( "[Y-m-d H:i:s] " ) . var_export ( $data, true ) . "\r\n" ); // 写入文件
	fclose ( $fp ); // 关闭资源通道
}

?>
