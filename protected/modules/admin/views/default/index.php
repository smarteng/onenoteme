<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo app()->charset;?>" />
<title><?php echo app()->name;?> - 管理中心</title>
<link rel="stylesheet" type="text/css" href="<?php echo sbu('libs/bootstrap/css/bootstrap.min.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo sbu('styles/beta-admin.css');?>" />
<script type="text/javascript" src="<?php echo sbu('libs/jquery.min.js');?>"></script>
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container admin-nav-container">
            <a class="brand" href="<?php echo url('admin/default/welcome');?>" target="main">管理中心</a>
            <ul class="nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">文章管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo l('发表文章', url('admin/post/create'), array('target'=>'main'));?></li>
                        <li><?php echo l('审核文章', url('admin/post/verify'), array('target'=>'main'));?></li>
                        <li><?php echo l('搜索文章', url('admin/post/search'), array('target'=>'main'));?></li>
                        <li class="divider"></li>
                        <li><?php echo l('最新文章', url('admin/post/latest'), array('target'=>'main'));?></li>
                        <li><?php echo l('热门文章', url('admin/post/hottest'), array('target'=>'main'));?></li>
                        <li><?php echo l('编辑推荐', url('admin/post/recommend'), array('target'=>'main'));?></li>
                        <li><?php echo l('首页推荐', url('admin/post/homeshow'), array('target'=>'main'));?></li>
                        <li><?php echo l('置顶文章', url('admin/post/istop'), array('target'=>'main'));?></li>
                        <li class="divider"></li>
                        <li class="nav-header">附件</li>
                        <li><?php echo l('附件搜索', url('admin/upload/search'), array('target'=>'main'));?></li>
                        <li><?php echo l('附件列表', url('admin/upload/list'), array('target'=>'main'));?></li>
                        <li class="divider"></li>
                        <li><?php echo l('回收站', url('admin/post/trash'), array('target'=>'main'));?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">主题分类<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="nav-header"><?php echo t('post_topic', 'admin');?></li>
                        <li><?php echo l(t('create_topic', 'admin'), url('admin/topic/create'), array('target'=>'main'));?></li>
                        <li><?php echo l(t('topic_list_table', 'admin'), url('admin/topic/list'), array('target'=>'main'));?></li>
                        <!-- <li><?php echo l(t('topic_statistics', 'admin'), url('admin/topic/statistics'), array('target'=>'main'));?></li> -->
                        <li class="divider"></li>
                        <li class="nav-header"><?php echo t('post_special', 'admin');?></li>
                        <li><?php echo l(t('create_special', 'admin'), url('admin/special/create'), array('target'=>'main'));?></li>
                        <li><?php echo l(t('special_list_table', 'admin'), url('admin/special/list'), array('target'=>'main'));?></li>
                        <li class="divider"></li>
                        <li class="nav-header"><?php echo t('post_category', 'admin');?></li>
                        <li><?php echo l(t('create_category', 'admin'), url('admin/category/create'), array('target'=>'main'));?></li>
                        <li><?php echo l(t('category_list_table', 'admin'), url('admin/category/list'), array('target'=>'main'));?></li>
                        <!-- <li><?php echo l(t('category_statistics', 'admin'), url('admin/category/statistics'), array('target'=>'main'));?></li> -->
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">评论管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="nav-header"><?php echo t('comment_manage', 'admin');?></li>
                        <li><?php echo l(t('latest_comment', 'admin'), url('admin/comment/latest'), array('target'=>'main'));?></li>
                        <li><?php echo l(t('verify_comment', 'admin'), url('admin/comment/verify'), array('target'=>'main'));?></li>
                        <li><?php echo l(t('recommend_comment', 'admin'), url('admin/comment/recommend'), array('target'=>'main'));?></li>
                        <li><?php echo l(t('search_comment', 'admin'), url('admin/comment/search'), array('target'=>'main'));?></li>
                        <li class="divider"></li>
                        <li class="nav-header"><?php echo t('post_tag', 'admin');?></li>
                        <li><?php echo l(t('hottest_tags', 'admin'), url('admin/tag/hottest'), array('target'=>'main'));?></li>
                        <li><?php echo l(t('tag_search', 'admin'), url('admin/tag/search'), array('target'=>'main'));?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">用户管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo l('添加用户', url('admin/user/create'), array('target'=>'main'));?></li>
                        <li><?php echo l('审核用户', url('admin/user/verify'), array('target'=>'main'));?></li>
                        <li><?php echo l('搜索用户', url('admin/user/search'), array('target'=>'main'));?></li>
                        <li class="divider"></li>
                        <li class="nav-header">统计</li>
                        <li><?php echo l('今日注册', url('admin/user/today'), array('target'=>'main'));?></li>
                        <li><?php echo l('用户列表', url('admin/user/list'), array('target'=>'main'));?></li>
                        <li><?php echo l('禁用用户', url('admin/user/forbidden'), array('target'=>'main'));?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">工具<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo l('友情链接', url('admin/link/list'), array('target'=>'main'));?></li>
                        <li><?php echo l('广告管理', url('admin/advert/list'), array('target'=>'main'));?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">设置<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="nav-header">系统功能</li>
                        <li><?php echo l('网站设置', url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_SYSTEM_SITE)), array('target'=>'main'));?></li>
                        <li><?php echo l('缓存设置', url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_SYSTEM_CACHE)), array('target'=>'main'));?></li>
                        <li><?php echo l('附件设置', url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_SYSTEM_ATTACHMENTS)), array('target'=>'main'));?></li>
                        <li class="divider"></li>
                        <li class="nav-header">网站显示</li>
                        <li><?php echo l('模板配置', url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_DISPLAY_TEMPLATE)), array('target'=>'main'));?></li>
                        <li><?php echo l('界面元素', url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_DISPLAY_UI)), array('target'=>'main'));?></li>
                        <li class="divider"></li>
                        <li class="nav-header">敏感词管理</li>
                        <li><?php echo l('批量添加', url('admin/keyword/create'), array('target'=>'main'));?></li>
                        <li><?php echo l('敏感词列表', url('admin/keyword/list'), array('target'=>'main'));?></li>
                        <li class="nav-header">SNS配置</li>
                        <li><?php echo l('SNS接口', url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_SNS_INTERFACE)), array('target'=>'main'));?></li>
                        <li><?php echo l('SNS统计', url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_SNS_STATS)), array('target'=>'main'));?></li>
                        <li><?php echo l('SNS模板', url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_SNS_TEMPLATE)), array('target'=>'main'));?></li>
                        <li class="divider"></li>
                        <li class="nav-header">自定义参数</li>
                        <li><?php echo l('自定义参数列表', url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_CUSTOM)), array('target'=>'main'));?></li>
                        <li><?php echo l('添加自定义参数', url('admin/config/create'), array('target'=>'main'));?></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav pull-right">
                <li><?php echo l(user()->name, url('admin/user/current'), array('target'=>'main'));?></li>
                <li><?php echo l('退出登录', url('site/logout'));?></li>
                <li><?php echo l('网站首页', url('site/index'), array('target'=>'_blank'));?></li>
            </ul>
        </div>
    </div>
</div>
<div class="well admin-sidebar">
    <ul class="nav nav-list">
        <li class="nav-header">文章</li>
        <li><?php echo l('发表文章', url('admin/post/create'), array('target'=>'main'));?></li>
        <li><?php echo l('审核文章', url('admin/post/verify'), array('target'=>'main'));?></li>
        <li><?php echo l('最新文章', url('admin/post/latest'), array('target'=>'main'));?></li>
        <li><?php echo l('搜索文章', url('admin/post/search'), array('target'=>'main'));?></li>
        <li class="nav-header">评论</li>
        <li><?php echo l('审核评论', url('admin/comment/verify'), array('target'=>'main'));?></li>
        <li><?php echo l('最新评论', url('admin/comment/latest'), array('target'=>'main'));?></li>
        <li class="nav-header">用户</li>
        <li><?php echo l('审核用户', url('admin/user/verify'), array('target'=>'main'));?></li>
        <li><?php echo l('今日注册', url('admin/user/today'), array('target'=>'main'));?></li>
    </ul>
</div>
<div class="admin-container">
    <iframe id="admin-iframe" src="<?php echo url('admin/default/welcome');?>" name="main"></iframe>
</div>

<script type="text/javascript">
$(function(){
	$('.admin-sidebar').on('click', 'li a', function(event){
		var li = $(this).parent();
		if (li.hasClass('active')) return true;

		$('li.dropdown').removeClass('active');
		$('.dropdown-menu  li').removeClass('active');
		li.siblings().removeClass('active');
		li.addClass('active');
	});
	$('.dropdown-menu').on('click', 'li a', function(event){
		var li = $(this).parent();
		$(this).parents('.dropdown').removeClass('open');
		if (li.hasClass('active')) return true;

		$('li').removeClass('active');
		li.addClass('active');
		$(this).parents('.dropdown').addClass('active');
	});

	$(document).on('mouseenter', '#admin-iframe', function(){
		$('li.dropdown').removeClass('open');
		$(this).focus();
	});
});
</script>
<script type="text/javascript" src="<?php echo sbu('libs/bootstrap/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo sbu('scripts/beta-admin.js');?>"></script>

</body>
</html>

