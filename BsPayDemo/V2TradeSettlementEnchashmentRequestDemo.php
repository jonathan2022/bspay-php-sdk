<?php

/**
 * 取现接口 - 示例
 *
 * @author sdk-generator
 * @Description
 */
namespace BsPayDemo;

// 1. 资源及配置加载
require_once dirname(__FILE__) . "/loader.php";
require_once  dirname(__FILE__). "/../BsPaySdk/request/V2TradeSettlementEnchashmentRequest.php";

use BsPaySdk\core\BsPayClient;
use BsPaySdk\request\V2TradeSettlementEnchashmentRequest;

// 2.组装请求参数
$request = new V2TradeSettlementEnchashmentRequest();
// 请求日期
$request->setReqDate(date("Ymd"));
// 请求流水号
$request->setReqSeqId(date("YmdHis").mt_rand());
// 取现金额
$request->setCashAmt("0.01");
// 取现方ID号
$request->setHuifuId("6666000021291985");
// 到账日期类型
$request->setIntoAcctDateType("T0");
// 取现卡序列号
$request->setTokenNo("10004053462");

// 设置非必填字段
$extendInfoMap = getExtendInfos();
$request->setExtendInfo($extendInfoMap);

// 3. 发起API调用
$client = new BsPayClient();
$result = $client->postRequest($request);
if (!$result || $result->isError()) {  //失败处理
    var_dump($result -> getErrorInfo());
} else {    //成功处理
    var_dump($result);
}

/**
 * 非必填字段
 *
 */
function getExtendInfos() {
    // 设置非必填字段
    $extendInfoMap = array();
    // 异步通知地址
    $extendInfoMap["notify_url"]= "http://www.gangcai.com";
    // 备注
    // $extendInfoMap["remark"]= "";
    // 账户号
    // $extendInfoMap["acct_id"]= "";
    return $extendInfoMap;
}


