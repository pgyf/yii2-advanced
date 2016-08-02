参考1 http://my.oschina.net/u/587974/blog/74341

递归增加目录下所有文件改变
git add . 

查看git状态
git status

撤销 add .操作
git reset . 

增加备注
git commit -m "项目第一次提交"  

删除远程分支
git push origin --delete <branchName>

删除tag
git push origin --delete tag <tagname>

克隆项目
git clone http://myrepo.xxx.com/project/.git

创建分支
git branch mybranch

切换分支
git checkout mybranch

创建并切换分支
git checkout -b mybranch

更新master主线上的东西到该分支上
git rebase master