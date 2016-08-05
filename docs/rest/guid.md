1、新建app表、app版本表、app授权表
    app授权表
    app表外键、app_id、app_secret、app_type（ios 或者 android）、描述、创建日期，创建人

2、客户端请求
    签名参数（不需要所有参数都签名）
    $appId = '56789'; //appID
    $appSecret = 'SDFSDFSWEDSF';//授权密匙
    $appVersion = '1.0.1';
    $nonceStr = ''; //随机字符串
    $timestamp =   //时间戳
    $signType = "MD5"; //加密方式 SHA1  MD5  RSA

    计算sign密文  默认md5
    //(signType == 'md5'){

         参考支付宝或者微信中的签名方式  ksort后生成查询字符串后追加秘钥再md5或者sha1加密 所有字符串转大写
         $sign =  '';

    //}
    //请求参数(不能带秘钥)
    $requestParams = [
       'app_id' => $appId,
       'app_version' => $appVersion,
       'nonce_str' => $nonceStr,
       'timestamp' => $timestamp,
       'sign_type' => $signType,
       'sign' => $sign,
       $ip = '',
       ..............
    ];

3、服务端处理
    获取参数app_id  sign.....
    判断版本是否可用
    通过app_id获得app_secret
    通过和2相同的签名后 判断签名是否一致
    成功：继续处理请求
    失败：授权签名不正确，请检查请求参数
     
