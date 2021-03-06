<?php
/**
 * 微小区模块
 *
 * [晓锋] Copyright (c) 2013 qfinfo.cn
 */
/**
 * 后台短信设置
 */
global $_W,$_GPC;
$do = $_GPC['do'];
$method = $_GPC['method'] ? $_GPC['method'] : 'manage';
$GLOBALS['frames'] = $this->NavMenu($do,$method);
$xqmenu = $this->xqmenu();
$id = intval($_GPC['id']);
if (checksubmit('submit')) {
		$data = array(
				'uniacid' => $_W['uniacid'],
				'shopping_id' => $_GPC['shopping_id'],
				'property_id' => $_GPC['property_id'],
				'room_id' => $_GPC['room_id'],
				'sms_account' => $_GPC['sms_account'],
				'verify' => intval($_GPC['verify']),
				'businesscode' => intval($_GPC['businesscode']),
				'verifycode' => intval($_GPC['verifycode']),
				'report_type' => intval($_GPC['report_type']),
				'shopping_status' => intval($_GPC['shopping_status']),
				'property_status' => intval($_GPC['property_status']),
				'room_status' => intval($_GPC['room_status']),
				'reportid' => intval($_GPC['reportid']),
				'resgisterid' => intval($_GPC['resgisterid']),
			);
		if (empty($id)) {
			pdo_insert('xcommunity_wechat_smsid',$data);
		}else{
			pdo_update('xcommunity_wechat_smsid',$data,array('id' => $id));
		}
		message('提交成功',referer(),'success');
	}
	$settings = pdo_fetch("SELECT * FROM".tablename('xcommunity_wechat_smsid')."WHERE uniacid=:uniacid",array(":uniacid" => $_W['uniacid']));

include $this->template('web/set/sms');