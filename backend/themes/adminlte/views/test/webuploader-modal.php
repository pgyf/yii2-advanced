<?php
    //$this->params['body-class'] = '';
?>
<style>
    
    
html,body,h1,h2,h3{font-family:arial, 'Hiragino Sans GB', 'Microsoft Yahei', '微软雅黑', '宋体', \5b8b\4f53, Tahoma, Arial, Helvetica, STHeiti}
.ng-cloak{display:none;}
body{overflow-y:scroll;background:#f9f9f9;overflow-x: hidden;}
a:hover{text-decoration:none;}
a:focus{outline:none; -moz-outline:none}
.list-group .list-group-item.active{background-color:#428bca;border-color:#428bca;}
.list-group .list-group-item a{color:#555;}
.list-group .list-group-item a:hover{text-decoration:none;}
.list-group .list-group-item.active a{color:#fff;}
.row .row, .form-group .form-group{margin-left:auto;margin-right:auto;}
.row.row-fix, .form-group.form-group-fix{margin-left:-15px;margin-right:-15px;}
.breadcrumb{background:#F9F9F9;}
/*登录注册*/
.login,.register{background:#3a3a3a url('../images/gw-bg.jpg') no-repeat fixed; background-size:cover; -webkit-background-size:cover; -o-background-size:cover;padding-top:5em;}
.login .logo,.register .logo{width:100%; text-align:center; margin-bottom:2em;}
.login .logo a,.register .logo a{background:url('../images/gw-logo.png') no-repeat; display:inline-block;width:420px;height:95px;margin-left:0 !important;}
.login .panel,.register .panel{padding:30px 15px;}
.login i,.register i{color:#999999;}
.login .footer,.register .footer{padding:2em 0;}
.login .footer,.register .footer,.login .footer a,.register .footer a{color:#ffffff;}
/*首页*/
.home .panel{border-radius:0;}
.home .panel-default{border-color:#EEE;}
.home .content h4{border-bottom:1px #E9E9E9 solid; padding:15px 15px 15px 25px; margin:0; font-weight:normal; font-size:18px;}
.home .content h6{font-size:16px; color:#333;}
.home .content .con .panel-body .row{text-align:center;}
.home .content .con .panel-body .row>div{overflow:hidden; text-align:center;}
.home .content .con .panel-body .row p{color:#666;}
.home .content .con .panel-body .system-announcement{margin:0 10px;}
.home .content .con .panel-body .system-announcement li{margin:15px 0; height:40px; line-height:40px; background:#f7f7f9;}
.home .content .con .panel-body .system-announcement li a{display:block; float:left; text-align:left; padding:0 15px; color:#666;}
.home .content .con .panel-body .system-announcement li span{display:inline-block; float:left; color:#FFF; width:50px;}
.home .content .con .panel-body .system-announcement li span.style-1{background:#6592df;}
.home .content .con .panel-body .system-announcement li span.style-2{background:#60bc6a;}
.home .content .con .panel-body .system-info>div{display:inline-block; margin:20px 0;}
.home .content .con .panel-body .system-info .icon{display:inline-block; width:100px; height:100px; border-radius:50%; background:#4eacea;}
.home .content .con .panel-body .system-info .icon i{font-size:50px; color:#FFF; margin-top:25px;}
.home .content .con .panel-body .module-info>div{display:inline-block; margin:20px 0;}
.home .content .con .panel-body .module-info .icon img{width:62px; height:62px;}
.home .content .contact .info{font-size:16px;}
.home #head{position:absolute; z-index:1; text-align:center; width:100%; top:10%;}
.home #head .logo{display:inline-block; background:url('../images/gw-logo.png') no-repeat; width:420px; height:95px;}
.home #head .advertisement{font-size:50px; color:#FFF; margin:5% 0 10% 0;}
.home #head .btns .btn{margin:0 10px;}
.home #banner{width:100%; margin:0 auto;}
.home #banner .item{width:100%; background-size:cover; background-position:50% 50%;}
.home #banner .carousel-indicators .fa{color:#FFF; font-size:50px; background:none !important;}
.home .content .banner{background-image:url('../images/banner-bg.png'); background-size: 990px 380px; background-position: center 15px; border-top: 1px solid #EEEEEE; border-bottom: 1px solid #EEEEEE; background-repeat: no-repeat; height:380px; background-color:#FFFFFF; min-width: 1014px; min-height: 180px;}
.home .content .con{padding-top:20px;}
.home .footer{height:50px; line-height:25px; margin-bottom:30px; color:#666;}
.home .footer a{color:#666;}
.home .footer a:hover{color:#428bca; text-decoration:none;}

.navbar-inverse ul li i{display:inline-block; margin-right:5px;}
.nav.navbar-nav .dropdown{z-index:1001;}
.welcome-container .shortcut a{display:block;float:left;text-align:center;margin-right:1.2em;padding:8px 5px;width:7em;height:7em;overflow:hidden;color:#333;}
.welcome-container .shortcut a:hover{text-decoration:none;background:#eee;border-radius:3px;padding:7px 4px;border:1px solid #d5d5d5;}
.welcome-container .shortcut a i{display:block;font-size:3em;margin:.28em .2em;}
.welcome-container .shortcut a img{display:block;height:3em;margin:.85em auto;}
.welcome-container .shortcut a span{display:block;font-size:1em;overflow:hidden;white-space:nowrap;}
.welcome-container .account img{width:6em;height:6em;}
.nav.nav-tabs{margin-bottom:20px; border-color:#428bca;}
.nav-tabs>li>a:hover{border-color:#eee #eee #428bca #eee;}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus{color:#FFF; background-color:#428bca; border-color:#428bca;}
.page-header{padding-bottom:0;}
.page-header:first-child{margin-top:0;}
.gw-logo{background:url('../images/gw-logo.png') no-repeat;display:inline-block;width:420px;height:95px;margin-left:0 !important;}
.gw-container .footer{font-size:1.1em;padding:2em 0;}
.gw-container{background:#3a3a3a url('../images/gw-bg.jpg') no-repeat fixed; background-size:cover; -webkit-background-size:cover; -o-background-size:cover;}
.gw-container .page-header{border:none; border-left:0.3em #333 solid; padding-left:1em;}
.gw-container .tile{display:block; float:left; margin:0.4em;padding:.2em 1em .5em 1em; width:8em; text-align:center; background:#EEE; color:#333; text-decoration:none;}
.gw-container .tile.tile-2x{width:10em;margin-top: 0.5em}
.gw-container .tile.tile-3x{width:15em;}
.gw-container .tile:hover{background:#7dacdd; color:#FFF;}
.gw-container .tile > i{display:block; font-size:2em; margin:0.3em auto 0 auto;}
.gw-container .tile > span{display:block;}
.gw-container .navbar-toggle {border-color: #ddd;}
.gw-container .navbar-toggle .icon-bar{background-color: #ccc;}
.gw-container .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {background-color: #ddd;}
.gw-container .navbar-nav.navbar-right:last-child {margin-right: 0;}
.gw-container .navbar-nav .tile{background:#31b8ef; color:#FFF; box-shadow:0 2px 4px rgba(0, 0, 0, 0.05);}
.gw-container .navbar-nav .tile:hover{background:#4ccafd;}
.gw-container .navbar-nav .tile.active{background:#1e95c9;}
.gw-container .well .breadcrumb{padding-left:0;padding-right:0;}
.gw-container .breadcrumb{margin-bottom:0.5em; background:#F5F5F5;}
.gw-container .breadcrumb a{color:#333;}
.gw-container .footer, .gw-container .footer a{color:#fff;}
.gw-container .well .account{margin:15px 0;}

.gw-container .well .account .panel-heading{border-bottom:1px solid #E9E9E9; background:#FFF;}
.gw-container .well .account .panel-heading a{display:inline-block; color:#66667C; text-align:center; font-size:14px; padding:0 6px; font-weight:bold;}
.gw-container .well .account .panel-heading a i{margin-right:5px;}
.gw-container .well .account .panel-heading a:focus{text-decoration:none;}
.gw-container .well .account .panel-heading a.manage{color:#d9534f;}
.gw-container .well .account .panel-heading .manage{color:#d9534f;}
.gw-container .well .account .panel-body{padding:0 15px;}
.gw-container .well .account .panel-body li{padding:0;}
.gw-container .well .account .panel i{display:inline-block;}
.gw-container .well .account .panel .list-group-bottom{height:40px; line-height:40px; background:#f5f5f5;}
.gw-container .well .account .panel .list-group-bottom-left > span{display:inline-block; color:#999;}
.gw-container .well .account .panel .list-group-bottom-right > a{color:#999; padding:0 6px;}
.gw-container .well .account .panel .list-group-bottom-right > a i{margin-right:5px;}
.table-responsive.panel-body{overflow:auto;}
.table{table-layout:fixed;}
.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{vertical-align:middle;}
.table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{white-space:nowrap; overflow:hidden; text-overflow:ellipsis;}
.table>thead>tr>th{border-top:none;}
.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th{border-top:none;}
@media screen and (max-width:767px){.tpl-calendar>div,.tpl-district-container>div{margin-bottom:10px;}}
/*左侧菜单*/
.big-menu .panel{margin-bottom:0; border-bottom:0; border-top-width:0; border-top-left-radius:0; border-top-right-radius:0; border-radius:0;}
.big-menu .panel .panel-heading{border-top-left-radius:0; border-top-right-radius:0; position:relative; overflow:hidden; padding-right:50px;}
.big-menu .panel .panel-heading .panel-title,.big-menu .panel .list-group-item{overflow:hidden; white-space:nowrap; text-overflow:clip;}
.big-menu .panel>.list-group:last-child .list-group-item:last-child{border-bottom-right-radius:0; border-bottom-left-radius:0; border-bottom:1px #DDD solid;}
.big-menu .panel:first-child{border-top-width:1px; border-top-left-radius:3px; border-top-right-radius:3px;}
.big-menu .panel:first-child .panel-heading{border-top-left-radius:3px; border-top-right-radius:3px;}
.big-menu .panel:last-child{margin-bottom:10px; border-bottom-right-radius:4px; border-bottom-left-radius:4px;}
.big-menu .panel:last-child>.list-group:last-child .list-group-item:last-child{border-bottom-right-radius:3px; border-bottom-left-radius:3px;}
.big-menu .panel .panel-collapse{width:50px; height:38px; line-height:38px; position:absolute; top:0; right:0; color:#CCC; text-align:center; background:#EEE; border-left:1px #DDD solid;}
.big-menu .btn-group{width:100%;}
.big-menu .btn-group>.btn{border-radius:0; width:33.5%; text-align:center; border-top:0;}
/*更新提醒*/
.upgrade-tips{width:100%; position:absolute; top:0; text-align:center; z-index:99999;}
.upgrade-tips a{display:inline-block; margin:0 auto; height:25px; line-height:25px; padding:0 5px; color:#FFF; background:#EE5023; }
.upgrade-tips a.module{background:#3C9D40;}
.upgrade-tips span{display:inline-block; height:25px; line-height:25px; background:#328233; padding:0 10px; color:#FFF; cursor:pointer;}

/*多图上传*/
.multi-img-details{margin-top:.5em;}
.multi-img-details .multi-item{height: 150px; max-width: 150px; position:relative; float: left; margin-right: 18px;}
.multi-img-details .multi-item img{max-width: 150px; max-height: 150px;}
.multi-img-details .multi-item em{position:absolute; top: 0; right: -14px;}

.modal-dialog .avatar-browser{min-height:480px;line-height:0;color:#428bca;}
.modal-dialog .avatar-browser .thumbnail{display:block;float:left;width:100px;height:100px;margin-right:13px;cursor:pointer;overflow:hidden;}
.modal-dialog .avatar-browser .thumbnail:hover{border-color:#428bca;}

.modal-dialog .avatar-browser{min-height:480px;line-height:0;color:#428bca;}
.modal-dialog .avatar-browser .thumbnail{display:block;float:left;width:100px;height:100px;margin-right:13px;cursor:pointer;overflow:hidden;}
.modal-dialog .avatar-browser .thumbnail:hover{border-color:#428bca;}
.pagination { margin:0;}

.history .img-list { margin: 4px; display: block; clear: both; list-style: outside none none; padding:0px;}
.history .img-list .img-item { float: left; padding: 1px; cursor: pointer; position: relative;}
.history .img-list .img-item .img-container { position: relative; width:75px; height:75px; text-align:center; background-color:#eee; background-size: contain; background-repeat: no-repeat; background-position: 50% 50%;}
.history .img-list .img-item .img-container:hover .img-meta{display:none; }
.history .img-list .img-item .img-container .img-meta { width:100%; position: absolute; bottom: 0; z-index:1; background:rgba(0,0,0,0.5); color:#eee;}
.history .img-list .img-item .img-container .select-status {display:inline-block; width:50px; height:50px; position: absolute; bottom:0; right:0; z-index:2;}
.history .img-list .img-item-selected .img-container .select-status {display:inline-block; width:50px; height:50px; position: absolute; bottom:0; right:0; background: url('../images/success-small.png') no-repeat right bottom; z-index:2;}
.history .img-list .img-item-selected .img-container .img-meta {display:none;}
.history .img-list .img-item .btnClose{text-align:right; position:absolute; top:-10px; right:-5px; display:none; z-index:10;}
.history .img-list .img-item:hover .btnClose{display:block;}
.history .img-list .img-item .btnClose a{display:inline-block; width:20px; height:20px; text-align:center; line-height:20px; color:#fff; background:rgba(0,0,0,.3); border-radius:50%;}
.history .img-list .img-item .btnClose a i.fa-times{font-size:14px; padding:3px;margin-top: 0;}
.history .img-list .img-item .btnClose a:hover{background:rgba(0,0,0,1);}
.pagination { margin:0;}

/*图文回复列表样式*/
.reply .panel-group .panel:first-child{margin:0; border-bottom-left-radius:0; border-bottom-right-radius:0;}
.reply .panel-group .panel:first-child .img{overflow:hidden; position:relative; height:160px; background-color:#ececec; color:#c0c0c0; text-align:center; line-height:132px;}
.reply .panel-group .panel:first-child .img img{max-height:160px; max-width:100%; vertical-align:middle;}
.reply .panel-group .panel:first-child .img span{display:block; position:absolute; bottom:0; left:0; height:28px; line-height:28px; width:100%; background:rgba(0,0,0,0.7); color:#fff; padding:0 10px;}
.reply .panel-group .panel+.panel{border-radius:0; margin-top:0; border-top:0;}
.reply .panel-group .panel+.panel .panel-body{height:104px; padding-right:105px; position:relative; overflow:hidden;}
.reply .panel-group .panel+.panel .img{float:right; position:absolute; right:15px; top:12px; height:80px; width:80px; background-color:#ececec; color:#c0c0c0; line-height:80px; text-align:center; overflow:hidden;}
.reply .panel-group .panel+.panel .img img{max-width:80px; max-height:80px; vertical-align:middle; border:0;}
.reply .panel-group .panel+.panel .text h4{word-break:break-all; font-size:14px; line-height:1.5em; height:54px; overflow:hidden; text-overflow:ellipsis;}
.reply .panel-group .panel-body .mask{position:absolute; width:100%; height:100%; line-height:104px; left:0; top:0; z-index:999; background-color:rgba(229, 229, 229, 0.85) !important; text-align:center; display:none;}
.reply .panel-group .panel:first-child .panel-body .mask{line-height:160px;}
.reply .panel-group .panel-body .mask a{color:#333; display:inline-block; margin:0 3px; cursor:pointer;}
.reply .panel-group .panel-body:hover .mask{display:block;}
.reply .panel-group .panel-body .default{ font-style:normal; font-size:16px;}
.reply .panel-group .panel:last-child{margin-bottom:20px; border-bottom-left-radius:4px; border-bottom-right-radius:4px;}
.reply .panel-group .panel:last-child .panel-body{padding:15px;}
.reply .panel-group .panel-body .add{border:3px dotted #b8b8b8; height:72px; line-height:72px; text-align:center; cursor:pointer; border-radius:5px;}
.reply .panel-group img{position:absolute; left:0; top:0; display:inline-block; width:100%; height:100%;}
.reply .panel-group{clear: both;margin-bottom: 20px; position: relative;}
.reply .panel-group .del,.panel-group .no{position: absolute; top:-10px; width:20px; height:20px; color:#fff; background:rgba(0,0,0,0.3); text-align:center; line-height:20px; cursor:pointer; border-radius:100%;}
.reply .panel-group .del{right:-10px;}
.reply .panel-group .no{left:-10px;background: #3071a9}
.reply .panel-group .del:hover{background:rgba(0,0,0,0.7);}
.reply .panel-group .panel:last-child{margin-bottom: 0;}

/*素材回复列表样式*/
.material .panel-group{position:relative; cursor:pointer;}
.material .panel-group .panel:first-child{margin:0; border-bottom-left-radius:0; border-bottom-right-radius:0;}
.material .panel-group .panel:first-child .img{overflow:hidden; position:relative; height:160px; background-color:#ececec; color:#c0c0c0; text-align:center; line-height:132px;}
.material .panel-group .panel:first-child .img img{max-height:160px; max-width:100%; vertical-align:middle;}
.material .panel-group .panel:first-child .img span{display:block; position:absolute; bottom:0; left:0; height:28px; line-height:28px; width:100%; background:rgba(0,0,0,0.7); color:#fff; padding:0 10px;}
.material .panel-group .panel+.panel{border-radius:0; margin-top:0; border-top:0;}
.material .panel-group .panel+.panel .panel-body{height:104px; padding-right:105px; position:relative; overflow:hidden;}
.material .panel-group .panel+.panel .img{float:right; position:absolute; right:15px; top:12px; height:80px; width:80px; background-color:#ececec; color:#c0c0c0; line-height:80px; text-align:center; overflow:hidden;}
.material .panel-group .panel+.panel .img img{max-width:80px; max-height:80px; vertical-align:middle; border:0;}
.material .panel-group .panel+.panel .text h4{word-break:break-all; font-size:14px; line-height:1.5em; height:54px; overflow:hidden; text-overflow:ellipsis;}
.material .panel-group .panel-body .default{ font-style:normal; font-size:16px;}
.material .panel-group .panel:last-child{margin-bottom:0px; border-bottom-left-radius:20px; border-bottom-right-radius:4px;}
.material .panel-group .panel:last-child .panel-body{padding:15px;}
.material .panel-group img{position:absolute; left:0; top:0; display:inline-block; width:100%; height:100%;}
.material .panel-group .mask{position:absolute; width:100%; height:100%; left:0; top:0; z-index:10; background-color:rgba(0,0,0,0.6 ) !important; text-align:center; display:none; border-radius:4px;}
.material .panel-group:hover .mask,.panel-group.selected .mask{display:block;}
.material .panel-group>i{display:none; width:46px; height:46px; color:#fff; text-align:center; line-height:46px; z-index:20; position:absolute; top:50%; left:50%; margin-top:-23px; margin-left:-23px; font-size:46px; font-weight:200;}
.material .panel-group.selected>i{display:inline-block}

/*图文回复编辑样式*/
.reply .aside{}
.reply .aside .card{position:relative;}
.reply .aside .panel-body{min-height:50px;}
.reply .aside .arrow-left,.reply .aside .arrow-left:after{width: 0; height: 0; border-style: solid; border-width: 8px 10px 8px 0; border-color: transparent #d1d1d1 transparent transparent; position: absolute; left: -10px; top: 15px;}
.reply .aside .arrow-left:after{content: ""; border-right-color: #fff; left: 1px; top: -8px;}
.reply .aside .img{height:92px; text-align:center; position:relative; overflow:hidden; padding:0;}
.reply .aside .img img{display:inline-block; max-width:100%; vertical-align:middle; margin:0; border:0;}
.reply .aside .img h3{position:absolute; bottom:0; left:0; width:100%; text-align:center; z-index:2; color:#fff; background:rgba(51,51,51,0.5); padding:5px 15px; font-size:14px; line-height:1.5em; margin:0; cursor:pointer;}
.reply .aside .img>span{display:block; border:1px solid #eee; height:100%; text-align:center; line-height:92px; cursor:pointer;}
.reply .aside .img>span i{color:green;}

/*导航栏公告样式*/
.topbar-notice{cursor: pointer;}
.topbar-notice .dropdown-menu{width:440px; left:-183px; padding:0;}
.topbar-notice .topbar-notice-arrow,.topbar-notice .topbar-notice-arrow:after{width: 0; height: 0; border-style: solid; position: absolute; border-width: 0 8px 10px 8px; border-color:transparent transparent rgba(0,0,0,.4) transparent; left: 50%; top:-11px; margin-left:-9px;}
.topbar-notice .topbar-notice-arrow:after{content: ""; border-bottom-color:#eaedf1; left:1px; top:1px;}
.topbar-notice .topbar-notice-head{height:50px; padding:0 15px; font-size:14px; line-height:50px; background:#eaedf1; color:#333; border-top-left-radius:4px; border-top-right-radius:4px;}
.topbar-notice .topbar-notice-body ul{margin:0; padding:0; list-style:none; height:305px; overflow-y:auto; background:#fff;}
.topbar-notice .topbar-notice-body ul li{border-bottom:1px solid #eaedf1;}
.topbar-notice .topbar-notice-body ul li a{display:table; width:100%; padding:10px; overflow:hidden; background-color:#fff;}
.topbar-notice .topbar-notice-body ul li:hover a{background-color:#f2f2f2;}
.topbar-notice .topbar-notice-body ul li a div{display:table-cell; }
.topbar-notice .topbar-notice-body ul li a div:first-child{width:20px; vertical-align:middle; font-size:10px}
.topbar-notice .topbar-notice-body ul li a div:first-child i.new{color:#ff9900}
.topbar-notice .topbar-notice-body ul li a div:first-child i.old{color:#d5d5d5}
.topbar-notice .topbar-notice-body ul li a h3{font-size:14px; max-width:300px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; height:20px; line-height:20px; margin:0;}
.topbar-notice .topbar-notice-body ul li a .date{color:#333;}
.topbar-notice .topbar-notice-body ul li a div:nth-of-type(3){width:60px; text-align:right; vertical-align:middle; height:10px;}
.topbar-notice .topbar-notice-footer{height:50px; line-height:50px; text-align:center;}

/*新闻公告页面样式*/
.notice-show .breadcrumb{padding-left:0;}
.notice-show .category-btn{margin-bottom:10px;}
.notice-show .panel{padding:0 50px;}
.notice-show .panel .panel-heading{background-color:#fff; padding-left:0;}
.notice-show h5{color:#428BCA; border-left:3px solid #428BCA; padding-left:15px;}
.notice-show .small span{display:inline-block; margin:0 10px 0 0;}
.notice-show .panel ul{list-style:none; padding:0; margin:0;}
.notice-show .panel ul li{height:30px; line-height:30px; white-space:nowrap; overflow:hidden; padding-right:150px; position:relative;}
.notice-show .panel ul li a{display:inline-block; width:100%; overflow:hidden; text-overflow:ellipsis;}
.notice-show .date{ position:absolute; right:0;}
.notice-show h6{font-size:24px;}

/*图片弹出框*/
#modal-webuploader{z-index:1000000000}

/*表单验证插件*/
.bv-form .help-block{margin-bottom: 0}
.has-error .help-text, .has-success .help-text{color:#737373}

/*系统弹窗模态框*/
#modal-message{z-index:10000000000}
#map-dialog{z-index:10000000001}

/*优惠券列表*/
#counpon-Modal .table td, #counpon-Modal .table th{text-align:center;}
#counpon-Modal .coupon-content .info{height:100px; line-height:100px; text-align:center; font-size:22px; font-weight:normal}

/*素材列表*/
#material-Modal #wxcard .table td, #material-Modal #wxcard .table th{text-align:center;}
#material-Modal .material-content .info{height:100px; line-height:100px; text-align:center; font-size:22px; font-weight:normal}

/*工具类*/
.padding-b-0{padding-bottom:0;}

/*计划任务日志弹出框*/
.mass-log:hover{cursor:wait;}
.table-cron.table{margin-bottom:0}
.table-cron.table tr td{white-space:normal; overflow:auto}
.table-cron.table tr:first-child td{border-top:none}

/*菜单样式*/
.menu .page-header{border:none; border-left:0.3em #333 solid; padding-left:1em;}
.menu .tile{display:block; float:left; margin:0.4em;padding:.2em 1em .5em 1em; width:8em; text-align:center; background:#EEE; color:#333; text-decoration:none;}
.menu .tile:hover{background:#7dacdd; color:#FFF;}
.menu .tile > i{display:block; font-size:2em; margin:0.3em auto 0 auto;}
.menu .tile > span{display:block;}

.module .thumbnails{padding:0; margin:0 0 0 -15px;}
.module li{position:relative; margin-left:15px; float:left;}
.module-priority{vertical-align:middle; height:30px; line-height:30px;cursor:pointer;}
span.module-priority{cursor:default;}
.module-priority select{vertical-align:middle; width:inherit; margin:0;}
.module-pic{width:100%;min-height:135px; overflow:hidden;position:relative;}
.module-pic > img{display:block; width:100%; height:147px; margin:0 auto;}
.module-pic .official{position:absolute; top:5px; right:5px;}
.module-button{padding:9px 0; height:30px; line-height:30px; box-sizing:content-box;}
.module-button .popover{width:auto;left:auto;top:auto;bottom:0;right:0;margin:0;margin-bottom:55px;line-height:20px;}
.module-button .popover-content {padding:5px 10px; overflow:hidden;}
.module-button .popover .arrow{left:85%;}
.module-button .popover select{width:100%;}
.module-detail{position:absolute;bottom:0;filter:Alpha(opacity=70);background:#000;background:rgba(0, 0, 0, 0.7);width:100%;font-family:arial,宋体b8b\4f53,sans-serif;}
.module-detail p{padding:0 9px; margin:0;}
.module-detail h5{color:#FFF;font-weight:normal;padding:0 9px;}
.module-detail h5 small,.module-detail p{color:#CCC;}
p.module-brief{margin-bottom:10px; font-size:12px;}
p.module-description{display:block;padding:3px 10px;}

.require{color:red; margin-right:5px}

.deskmenu .cover{display : none;position: absolute;background : #000000;opacity: 0.5;width: 111px;height: 21px;}
.deskmenu .edit{color : #FFF;position: absolute;display: none;}
.deskmenu .del{color : #FFF;position: absolute;display: none;}
/*卡券*/
.marbot0{margin-bottom:0}
.clear{width:100%;height:0;clear:both;}
.form-area{margin:1px 0;padding:10px 15px;background:#F5F5F5;}
.card-title{background: url("../images/card.png") no-repeat scroll 0 -84px rgba(0, 0, 0, 0);color: #ffffff;font-size: 17px;height: 62px;line-height: 85px;text-align: center;}
.shop-panel{padding:21px 12px 12px;color:#FFF;position: relative}
.logo-area{margin-bottom:7px;}
.logo-area .logo{width:38px;height: 38px;padding-top: 0;margin-right: 7px;border-radius: 22px;border: 1px solid #d3d3d3;}
.logo-area .logo img{width:38px;height: 38px;border-radius: 22px;}
.msg-area{}
.tick-msg{text-align: center;margin-bottom: 6px;color:#fff;}
.tick-msg b{font-weight: normal;font-size:24px;color:#fff}
.tick-time{text-align: center;color:#fff}
.deco{position:absolute;bottom: -1px;left: 0;width: 100%;height: 5px;background: url(../images/card_tpl.png) repeat-x;}
.card-dispose{padding:15px 0;border-bottom: 1px solid #e7e7eb;margin-bottom: 15px;background: #fff;position: relative}
.unset{height:30px;line-height:30px;padding-left:15px;display: none;}
.barcode{width:320px;height:71px;margin:0 auto;background:url("../images/card.png") 27px -156px no-repeat}
.qrcode{width:320px;height:174px;margin:0 auto;background:url("../images/card.png") 70px -237px no-repeat}
.sn-area{text-align: center;font-size:25px;color:#000;}
.code_num{font-size:15px;text-align: center;margin-bottom: 10px;}
.list{border-top:1px solid #e7e7eb;border-bottom:1px solid #e7e7eb;background: #fff;padding:0;}
.list li{padding-left:15px;list-style: none;position: relative}
.li-panel{padding:11px 30px 11px 0;display:block;border-bottom: 1px solid #e7e7eb;}
.ricon{position: absolute;right:20px;top:15px}
.cicon{position: absolute;left:50%;top:25%;display:none;}
.hover{background: #E9E9E9;opacity:0.8}
.arrow_in{position: absolute;width:0;height:0;border-width: 12px;border-style: dashed;border-color: transparent;top:120px;left:-13px;border-left-width: 0;border-right-color: #f4f5f9;border-right-style: solid;}
.code_preview{display: none}

/*
 
    #modal-webuploader {
    z-index: 1000000000;
   }
   reply .aside .img {
    height: 92px;
    text-align: center;
    position: relative;
    overflow: hidden;
    padding: 0;
   }
   reply .aside .img>span {
    display: block;
    border: 1px solid #eee;
    height: 100%;
    text-align: center;
    line-height: 92px;
    cursor: pointer;
} */




/*webuploader/style.css*/
.uploader .queueList{margin:10px}.element-invisible{position:absolute!important;clip:rect(1px 1px 1px 1px);clip:rect(1px,1px,1px,1px)}.uploader .placeholder{border:3px dashed #e6e6e6;min-height:350px;padding-top:150px;text-align:center;background:url(./image.png) center 80px no-repeat;color:#ccc;font-size:18px;position:relative}.uploader .placeholder .webuploader-pick{font-size:18px;background:#00b7ee;border-radius:3px;line-height:44px;padding:0 30px;color:#fff;display:inline-block;margin:35px auto;cursor:pointer;box-shadow:0 1px 1px rgba(0,0,0,.1)}.uploader .placeholder .webuploader-pick-hover{background:#00a2d4}.uploader .placeholder .flashTip{color:#666;font-size:12px;position:absolute;width:100%;text-align:center;bottom:20px}.uploader .placeholder .flashTip a{color:#0785d1;text-decoration:none}.uploader .placeholder .flashTip a:hover{text-decoration:underline}.uploader .placeholder.webuploader-dnd-over{border-color:#999}.uploader .placeholder.webuploader-dnd-over.webuploader-dnd-denied{border-color:red}.uploader .filelist{list-style:none;margin:0;padding:0;max-height:350px;overflow-y:auto}.uploader .filelist:after{content:'';display:block;width:0;height:0;overflow:hidden;clear:both}.uploader .filelist li{width:98px;height:98px;background:url(./bg.png) no-repeat;text-align:center;margin:0 8px 20px 0;position:relative;display:inline;float:left;overflow:hidden;font-size:12px}.uploader .filelist li p.log{position:relative;top:-45px}.uploader .filelist li p.title{position:absolute;left:0;width:100%;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;top:5px;text-indent:5px;text-align:left}.uploader .filelist li p.progress{position:absolute;width:100%;bottom:0;left:0;height:8px;overflow:hidden;z-index:50}.uploader .filelist li p.progress span{display:none;overflow:hidden;width:0;height:100%;background:url(./progress.png) repeat-x #1483d8;-webit-transition:width .2s linear;-moz-transition:width .2s linear;-o-transition:width .2s linear;-ms-transition:width .2s linear;transition:width .2s linear;-webkit-animation:progressmove 2s linear infinite;-moz-animation:progressmove 2s linear infinite;-o-animation:progressmove 2s linear infinite;-ms-animation:progressmove 2s linear infinite;animation:progressmove 2s linear infinite;-webkit-transform:translateZ(0)}@-webkit-keyframes progressmove{0%{background-position:0 0}100%{background-position:17px 0}}@-moz-keyframes progressmove{0%{background-position:0 0}100%{background-position:17px 0}}@keyframes progressmove{0%{background-position:0 0}100%{background-position:17px 0}}.uploader .filelist li p.imgWrap{position:relative;z-index:2;line-height:110px;vertical-align:middle;overflow:hidden;width:110px;height:110px;-webkit-transform-origin:50% 50%;-moz-transform-origin:50% 50%;-o-transform-origin:50% 50%;-ms-transform-origin:50% 50%;transform-origin:50% 50%;-webit-transition:.2s ease-out;-moz-transition:.2s ease-out;-o-transition:.2s ease-out;-ms-transition:.2s ease-out;transition:.2s ease-out}.uploader .filelist li img{width:100%}.uploader .filelist li p.error{background:#f43838;color:#fff;position:absolute;bottom:0;left:0;height:28px;line-height:28px;width:100%;z-index:100}.uploader .filelist li .success{display:block;position:absolute;left:0;bottom:0;height:40px;width:100%;z-index:200;background:url(./success.png) right bottom no-repeat}.uploader .filelist div.file-panel{position:absolute;height:0;filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr='#80000000', endColorstr='#80000000')\9;background:rgba(0,0,0,.5);width:100%;top:0;left:0;overflow:hidden;z-index:300}.uploader .filelist div.file-panel span{width:24px;height:24px;display:inline;float:right;text-indent:-9999px;overflow:hidden;background:url(./icons.png) no-repeat;margin:5px 1px 1px;cursor:pointer}.uploader .filelist div.file-panel span.rotateLeft{background-position:0 -24px}.uploader .filelist div.file-panel span.rotateLeft:hover{background-position:0 0}.uploader .filelist div.file-panel span.rotateRight{background-position:-24px -24px}.uploader .filelist div.file-panel span.rotateRight:hover{background-position:-24px 0}.uploader .filelist div.file-panel span.cancel{background-position:-48px -24px}.uploader .filelist div.file-panel span.cancel:hover{background-position:-48px 0}.uploader .statusBar{height:63px;border-top:1px solid #dadada;padding:0 20px;line-height:63px;vertical-align:middle;position:relative}.uploader .statusBar .progress{border:1px solid #1483d8;width:198px;background:#fff;height:18px;display:inline-block;text-align:center;line-height:20px;color:#6dbfff;position:relative;margin-right:10px}.uploader .statusBar .progress span.percentage{width:0;height:100%;left:0;top:0;background:#1483d8;position:absolute}.uploader .statusBar .progress span.text{position:relative;z-index:10}.uploader .statusBar .info{display:inline-block;font-size:14px;color:#666}.uploader .statusBar .btns{position:absolute;top:10px;right:20px;line-height:40px}#filePicker2,#wechat-filePicker2{display:inline-block;float:left}#filePicker2 .webuploader-pick,#wechat-filePicker2 .webuploader-pick{font-size:70px;width:100%}.uploader .statusBar .btns .uploadBtn,.uploader .statusBar .btns .uploadBtn.state-paused,.uploader .statusBar .btns .uploadBtn.state-uploading,.uploader .statusBar .btns .webuploader-pick{color:#fff;display:inline-block;border-radius:3px;margin-left:10px;cursor:pointer;font-size:14px;float:left}.uploader .statusBar .btns .uploadBtn{color:#fff;border-color:transparent}.uploader .statusBar .btns .uploadBtn:hover{background:#00a2d4}.uploader .statusBar .btns .uploadBtn.disabled{pointer-events:none;opacity:.6}.app .placeholder{min-height:0;padding-top:0}.app .placeholder .webuploader-pick{margin:15px auto}
</style>
<link rel="stylesheet" type="text/css" href="/webuploader/ex_src/css/webuploader.css" />
<!--<link rel="stylesheet" type="text/css" href="/webuploader/ex_src/css/style.css" />-->
https://github.com/fex-team/webuploader/issues/142
 
<div class="row clearfix reply">
    
   
    <div class="form-group aside">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">封面</label>
            <div class="col-sm-9 col-xs-12 ">
               <div class="col-xs-3 img">
                        <span ng-click="context.changeItem(context.activeItem)"><i class="fa fa-plus-circle green"></i>&nbsp;添加图片</span>
                </div>
                <div class="col-xs-3 img ng-scope" >
		<h3 ng-click="context.changeItem(context.activeItem)">重新上传</h3>
		<img ng-src="http://pro.we7.cc/attachment/images/5522/2016/09/gfu48p7F9zQ6XrVxX92KXy4YzYRj64.jpg" src="http://pro.we7.cc/attachment/images/5522/2016/09/gfu48p7F9zQ6XrVxX92KXy4YzYRj64.jpg">
		</div>
            </div>

        </div>
   
</div>




<div>
    <div class="btn btn-primary" data-toggle="modal" data-target="#modal-webuploader"  style="margin-bottom: 20px">选择图片</div>
</div>




<div id="modal-webuploader" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-dialog" style="width:660px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<ul class="nav nav-pills" role="tablist">
					<li id="li_upload" class="active" role="presentation"><a href="#upload" aria-controls="upload" role="tab" data-toggle="tab" onclick="$('#select').hide();" aria-expanded="true">上传图片</a></li>
					<li id="li_upload_perm" class="hide" data-mode="perm" role="presentation"><a href="#upload" aria-controls="upload" role="tab" data-toggle="tab" onclick="$('#select').hide();">上传</a></li>
					<li id="li_upload_temp" class="hide" data-mode="temp" role="presentation"><a href="#upload" aria-controls="upload" role="tab" data-toggle="tab" onclick="$('#select').hide();">上传</a></li>
					<li id="li_network" class="" role="presentation"><a href="#network" aria-controls="network" role="tab" data-toggle="tab" onclick="$('#select').hide();" aria-expanded="false">提取网络图片</a></li>
					<li id="li_history_image" class="" role="presentation"><a href="#history_image" aria-controls="history_image" role="tab" data-toggle="tab" onclick="$('#select').show();" aria-expanded="false">浏览图片</a></li>
					<li id="li_history_audio" class="hide" role="presentation"><a href="#history_audio" aria-controls="history_audio" role="tab" data-toggle="tab" onclick="$('#select').hide();">浏览音频</a></li>
					<li id="li_history_video" class="hide" role="presentation"><a href="#history_video" aria-controls="history_video" role="tab" data-toggle="tab">浏览视频</a></li>
				</ul>
			</div>
				<div id="select" style="margin: 10px 0px -10px 15px; padding-left: 7px; display: none;">					<div id="select-year" style="margin-bottom:10px;">						<div class="btn-group">							<a href="javascript:;" data-id="0" data-type="year" class="btn btn-default btn-select">不限</a>							<a href="javascript:;" data-id="2016" data-type="year" class="btn btn-default btn-select btn-info">2016年</a>							<a href="javascript:;" data-id="2015" data-type="year" class="btn btn-default btn-select">2015年</a>							<a href="javascript:;" data-id="2014" data-type="year" class="btn btn-default btn-select">2014年</a>							<a href="javascript:;" data-id="2013" data-type="year" class="btn btn-default btn-select">2013年</a>						</div>					</div>					<div id="select-month">						<div class="btn-group">							<a href="javascript:;" data-id="0" data-type="month" class="btn btn-default btn-select">不限</a>							<a href="javascript:;" data-id="1" data-type="month" class="btn btn-default btn-select">1</a>							<a href="javascript:;" data-id="2" data-type="month" class="btn btn-default btn-select">2</a>							<a href="javascript:;" data-id="3" data-type="month" class="btn btn-default btn-select">3</a>							<a href="javascript:;" data-id="4" data-type="month" class="btn btn-default btn-select">4</a>							<a href="javascript:;" data-id="5" data-type="month" class="btn btn-default btn-select">5</a>							<a href="javascript:;" data-id="6" data-type="month" class="btn btn-default btn-select">6</a>							<a href="javascript:;" data-id="7" data-type="month" class="btn btn-default btn-select">7</a>							<a href="javascript:;" data-id="8" data-type="month" class="btn btn-default btn-select">8</a>							<a href="javascript:;" data-id="9" data-type="month" class="btn btn-default btn-select btn-info">9</a>							<a href="javascript:;" data-id="10" data-type="month" class="btn btn-default btn-select">10</a>							<a href="javascript:;" data-id="11" data-type="month" class="btn btn-default btn-select">11</a>							<a href="javascript:;" data-id="12" data-type="month" class="btn btn-default btn-select">12</a>						</div>					</div>				</div>			<div class="modal-body tab-content"><div role="tabpanel" class="tab-pane network" id="network">
	<div style="margin-top: 10px;">
		<form>
			<div class="form-group">
				<input type="url" class="form-control" id="networkurl" placeholder="请输入网络图片地址">
				<input type="hidden" name="network_attachment" value="">
				<div id="network-img" class="network-img" style="background-image:url('{php echo tomedia('images/global/nopic.jpg');}')">
					<span class="network-img-sizeinfo" id="network-img-sizeinfo"></span>
				</div>
			</div>
		</form>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-primary">确认</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
	</div>
</div><div role="tabpanel" class="tab-pane history" id="history_image">
	<div class="history-content" style="height: 310px; text-align: center;"><ul class="img-list clearfix">
 
<li class="img-item" attachid="4775" title="14688916931491.jpg">
	<div class="img-container" style="background-image: url('http://pro.we7.cc/attachment/images/5522/2016/09/gfu48p7F9zQ6XrVxX92KXy4YzYRj64.jpg');">
		<div class="select-status"><span></span></div>
	</div>
	<div class="btnClose" data-id="4775"><a href=""><i class="fa fa-times"></i></a></div>
</li>

</ul></div>
	<div class="modal-footer">
		<div style="float: left;">
			<nav id="image-list-pager"></nav>
		</div>
		<div style="float: right;">
		<button style="display:none;" type="button" class="btn btn-primary">确认</button>
		</div>
	</div>
</div><div role="tabpanel" class="tab-pane upload active" id="upload">
	<div id="uploader" class="uploader">
		<div class="queueList">
			<div id="dndArea" class="placeholder">
				<div id="filePicker" class="webuploader-container"><div class="webuploader-pick">点击选择图片</div><div id="rt_rt_1atr72rgn16oiic1rqhget1v6c1a" style="position: absolute; top: 35px; left: 217px; width: 168px; height: 44px; overflow: hidden; bottom: auto; right: auto;"><input type="file" name="file" class="webuploader-element-invisible" accept="image/*"><label style="opacity: 0; width: 100%; height: 100%; display: block; cursor: pointer; background: rgb(255, 255, 255);"></label></div></div>
<p id="">或将照片拖到这里</p>
			</div>
		<ul class="filelist"><li class="fileinput-button js-add-image webuploader-container" id="filePicker2" style="display:none;"><div class="webuploader-pick">+</div><div id="rt_rt_1atr72rgsau0175gvt8etpokt1d" style="position: absolute; top: 0px; left: 0px; width: 1px; height: 1px; overflow: hidden;"><input type="file" name="file" class="webuploader-element-invisible" accept="image/*"><label style="opacity: 0; width: 100%; height: 100%; display: block; cursor: pointer; background: rgb(255, 255, 255);"></label></div></li></ul></div>
		<div class="statusBar">
			<div class="infowrap">
				<div class="progress" style="display: none;">
					<span class="text">0%</span>
					<span class="percentage" style="width: 0%;"></span>
				</div>
				<div class="info">共0张（0B），已上传0张</div>
				<div class="accept"></div>
			</div>
			<div class="btns">
				<div class="uploadBtn btn btn-primary state-pedding" style="margin-top: 4px;">确定使用</div>
				<div class="modal-button-upload" style="float: right; margin-left: 5px;">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
</div></div>
		</div>
	</div>
</div>



<?php $this->beginBlock('block_footer') ?>
<script type="text/javascript" src="/webuploader/ex_src/js/webuploader.js"></script>
<script type="text/javascript" src="/webuploader/ex_src/js/md5.js"></script>
<script type="text/javascript" src="/webuploader/ex_src/js/jquery.cookie.js"></script>
 <script type="text/javascript" src="/webuploader/ex_src/js/upload.js"></script>
<?php $this->endBlock(); ?>