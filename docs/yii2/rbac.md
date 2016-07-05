生成用户表
yii migrate --migrationPath=@console/migrations

生成数据库前请先配置authManager组件(可以配置到common中)
'authManager' => [
    'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
    'defaultRoles' => ['?'],
    //'cache' => 'cache',   // this enables RBAC caching
],


yii migrate --migrationPath=@yii/rbac/migrations

创建migrate
yii migrate/create create_news_table
https://github.com/yiisoft/yii2/blob/master/docs/guide/db-migrations.md#transactional-migrations-