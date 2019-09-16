

一、生成ssh key
1、打开Git bash
1、$ ssh-keygen -t rsa -C "q996523812"
	执行成功则返回:
	Generating public/private rsa key pair.
	Enter file in which to save the key(/Users/your username/.ssh/id_rsa):
2、回车
	以前有存储地址会返回：/User/your username/.ssh/id_rsa already exists.Overwrite(y/n)?
		输入y回车  
	以前没有存储地址会返回：Enter passphras(empty for no passphrase);
		直接回车
	两种情况回车后都会出现Enter same passphrase again
3、回车
	显示一长串内容，其中有..o..o oo .oS之类的代码，说明SSH key已经生成，位于：/User/your username/.ssh/id_rsa.pub

4、在文件夹/User/your username/.ssh/中，新建config文件（没有后缀），输入以下类容：
	Host github.com
	User q996523812
	Hostname ssh.github.com
	PreferredAuthentications publickey
	IdentityFile ~/.ssh/id_rsa
	Port 443

二、设置github
1、登陆github的设置页面：https://github.com/settings/keys
2、在SSH and GPG keys中，打开 New SSH key
3、将id_rsa.pub中的全部类容粘贴到key输入框中，然后点击Add SSH key保存
4、在git bash中输入：$ ssh -T git@github.com
	出现提示：Are you sure you want to continue connection(yes/no)?
  输入yes回车


三、下载项目
$ composer config -g repo.packagist composer https://packagist.phpcomposer.com
$ cd ~/Code
$ git clone git@github.com:q996523812/zhaeec.git
$ cd zhaeec
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate --seed
$ php artisan storage:link