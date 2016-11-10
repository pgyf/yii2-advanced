#yii2-advanced
YII2框架搭建多语言通用后台管理系统
![输入图片说明](http://git.oschina.net/uploads/images/2016/1107/220810_5f2c3d89_5211.png "在这里输入图片标题")


1、用git clone或者下载后 执行composer install   
2、修改.env.dist为.env并且配置数据库  
3、直接导入docs/sql下的sql文件  
4、修改apache目录到web/admin  访问/进入后台   或者配置目录到web  访问/admin 进入后台
   账号 admini/admin  密码111111


#注意
##composer
到项目根目录执行  
composer config -g repo.packagist composer https://packagist.phpcomposer.com  
composer self-update  
composer global require "fxp/composer-asset-plugin:~1.2.0"  
composer install  
遇到输入github网站token时可以执行  
composer config github-oauth.github.com 你的token




##apache vhosts.conf
```
<VirtualHost 127.0.0.2:80>
    ServerName test
    ServerAdmin webmaster@example.com
    DocumentRoot "E:\git\test\yii2-advanced\web\admin"
	<Directory "E:\git\test\yii2-advanced\web\admin">
		AllowOverride All
		Options FollowSymLinks 
		Require all granted
		Allow from all
	</Directory>
</VirtualHost>
```
## .env  
修改.env文件请用cmd命令修改如下  
ren   .env.dist   .env
