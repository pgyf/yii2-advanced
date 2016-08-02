<?php


namespace backend\lib\listeners;
use Yii;
use yii\helpers\Url;
use common\lib\helpers\Tools;

/**
 * Description of AdminLog
 *
 * @author     lyf <381296986@qq.com>
 * @date       2016-7-12
 */
class AdminLogListener {
    
    public static function handle($event)
    {
        // 显示详情有待优化,不过基本功能完整齐全
        if(!empty($event->changedAttributes) && !Yii::$app->user->isGuest) {
            $desc = '';
            foreach($event->changedAttributes as $name => $value) {
                $newValue = $event->sender->getAttribute($name);
                if($value != $newValue){
                    $desc .= $name . ' : ' . $value . '=>' . $newValue . ',';
                }
            }
            if($desc){
                $desc = substr($desc, 0, -1);
                 $filedIdDesc = '';
                 if(isset($event->sender->id)){
                     $filedIdDesc = ' id:' . $event->sender->id;
                 }
                 else{
                     $pkey = $event->sender->getPrimaryKey(true);
                     if($pkey){
                         foreach ($pkey as $k => $v) {
                             $filedIdDesc .= " $k:" . $v;
                         }
                     }
                 }
                 $description = Yii::$app->user->identity->username . '修改了表' . $event->sender->tableSchema->name . $filedIdDesc . '的' . $desc;
                 $route = Url::to();
                 $userId = Yii::$app->user->id;
                 $ip =  Tools::getClientIP();//ip2long(Yii::$app->request->userIP);
                 $nowTime = Tools::getServerTime();
                 $data = [
                     'route' => $route,
                     'description' => $description,
                     'user_id' => $userId,
                     'ip' => $ip,
                     'create_time' => $nowTime,
                 ];
                 $model = new \common\models\AdminLog();
                 $model->setAttributes($data);
                 $model->save();
            }
        }
    }
}
