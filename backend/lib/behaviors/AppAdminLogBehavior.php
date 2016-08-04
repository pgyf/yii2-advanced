<?php


namespace backend\lib\behaviors;

use Yii;
use yii\base\Application;
use yii\base\Behavior;
use yii\helpers\Url;
use yii\base\Event;
use yii\db\ActiveRecord;
use common\models\AdminLog;
use common\lib\helpers\Tools;


/**
 * Description of AdminLog
 *
 * @author     lyf <381296986@qq.com>
 * @date       2016-7-12
 */
class AppAdminLogBehavior extends Behavior{
    
    public function events()
    {
        return [
            Application::EVENT_BEFORE_REQUEST => 'handle'
        ];
    }
    
    public function handle()
    {
        Event::on(ActiveRecord::className(), ActiveRecord::EVENT_AFTER_UPDATE, [$this, 'log']);
    }
    
    public function log($event)
    {
        // 显示详情有待优化,不过基本功能完整齐全
        if(!empty($event->changedAttributes)) {
            $tableSchema = $event->sender->tableSchema;
            $desc = '';
            foreach($event->changedAttributes as $name => $value) {
                // 更新时间可不用记录
                if(!in_array($name, ['update_time','update_ip','update_user'])){
                    //判断数据类型
                    if(in_array($tableSchema->getColumn($name)->type, ['text'])){
                        $desc .= $name . ' : => ,';
                    }
                    else{
                        //判断是否变化
                        $newValue = $event->sender->getAttribute($name);
                        if($value != $newValue){
                            $desc .= $name . ' : ' . $value . '=>' . $event->sender->getAttribute($name) . ',';
                        }
                    }
                }
            }
            if($desc){
                $desc = substr($desc, 0, -1);
                $userName = Yii::$app->user->identity->username;
                $tableName = $tableSchema->name;
                $description = "%s修改了表%s %s:%s的%s";
                $description = sprintf($description, $userName, $tableName, $event->sender->primaryKey()[0], $event->sender->getPrimaryKey(), $desc);
                $route = Url::to();
                $userId = Yii::$app->user->id;
                $ip = Tools::getClientIP();;
                $data = [
                    'route' => $route,
                    'description' => $description,
                    //'user_id' => $userId,
                    //'ip' => $ip
                ];
                $model = new AdminLog();
                $model->setAttributes($data);
                $model->save();
            }
        }
    }
    
//    public static function handle($event)
//    {
//        // 显示详情有待优化,不过基本功能完整齐全
//        if(!empty($event->changedAttributes) && !Yii::$app->user->isGuest) {
//            $desc = '';
//            foreach($event->changedAttributes as $name => $value) {
//                $newValue = $event->sender->getAttribute($name);
//                if($value != $newValue){
//                    $desc .= $name . ' : ' . $value . '=>' . $newValue . ',';
//                }
//            }
//            if($desc){
//                $desc = substr($desc, 0, -1);
//                 $filedIdDesc = '';
//                 if(isset($event->sender->id)){
//                     $filedIdDesc = ' id:' . $event->sender->id;
//                 }
//                 else{
//                     $pkey = $event->sender->getPrimaryKey(true);
//                     if($pkey){
//                         foreach ($pkey as $k => $v) {
//                             $filedIdDesc .= " $k:" . $v;
//                         }
//                     }
//                 }
//                 $description = Yii::$app->user->identity->username . '修改了表' . $event->sender->tableSchema->name . $filedIdDesc . '的' . $desc;
//                 $route = Url::to();
//                 $userId = Yii::$app->user->id;
//                 $ip =  Tools::getClientIP();//ip2long(Yii::$app->request->userIP);
//                 $nowTime = Tools::getServerTime();
//                 $data = [
//                     'route' => $route,
//                     'description' => $description,
//                     'user_id' => $userId,
//                     'ip' => $ip,
//                     'create_time' => $nowTime,
//                 ];
//                 $model = new \common\models\AdminLog();
//                 $model->setAttributes($data);
//                 $model->save();
//            }
//        }
//    }
}
