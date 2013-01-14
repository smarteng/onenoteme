<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo app()->charset;?>" />
<title><?php echo app()->name . t('control_center', 'admin');?></title>
<link rel="stylesheet" type="text/css" href="<?php echo sbu('libs/bootstrap/css/bootstrap.min.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo sbu('styles/beta-admin.css');?>" />
<script type="text/javascript">
/*<![CDATA[*/
var CD_YES = <?php echo CD_YES;?>;
var CD_NO = <?php echo CD_NO;?>;
var confirmAlertText = '<?php echo t('delete_confirm', 'admin');?>';
/*]]>*/
</script>
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container admin-nav-container">
            <a class="brand" href="<?php echo CDBase::adminHomeUrl();?>">管理中心</a>
            <ul class="nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">文章管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo l('发表文章', url('admin/post/create'));?></li>
                        <li><?php echo l('审核文章', url('admin/post/verify'));?></li>
                        <li><?php echo l('搜索文章', url('admin/post/search'));?></li>
                        <li class="divider"></li>
                        <li><?php echo l('最新文章', url('admin/post/latest'));?></li>
                        <li><?php echo l('热门文章', url('admin/post/hottest'));?></li>
                        <li><?php echo l('编辑推荐', url('admin/post/recommend'));?></li>
                        <li><?php echo l('首页推荐', url('admin/post/homeshow'));?></li>
                        <li><?php echo l('置顶文章', url('admin/post/istop'));?></li>
                        <li class="divider"></li>
                        <li class="nav-header">附件</li>
                        <li><?php echo l('附件搜索', url('admin/upload/search'));?></li>
                        <li><?php echo l('附件列表', url('admin/upload/list'));?></li>
                        <li class="divider"></li>
                        <li><?php echo l('回收站', url('admin/post/trash'));?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">主题分类<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="nav-header"><?php echo t('post_topic', 'admin');?></li>
                        <li><?php echo l(t('create_topic', 'admin'), url('admin/topic/create'));?></li>
                        <li><?php echo l(t('topic_list_table', 'admin'), url('admin/topic/list'));?></li>
                        <!-- <li><?php echo l(t('topic_statistics', 'admin'), url('admin/topic/statistics'));?></li> -->
                        <li class="divider"></li>
                        <li class="nav-header"><?php echo t('post_special', 'admin');?></li>
                        <li><?php echo l(t('create_special', 'admin'), url('admin/special/create'));?></li>
                        <li><?php echo l(t('special_list_table', 'admin'), url('admin/special/list'));?></li>
                        <li class="divider"></li>
                        <li class="nav-header"><?php echo t('post_category', 'admin');?></li>
                        <li><?php echo l(t('create_category', 'admin'), url('admin/category/create'));?></li>
                        <li><?php echo l(t('category_list_table', 'admin'), url('admin/category/list'));?></li>
                        <!-- <li><?php echo l(t('category_statistics', 'admin'), url('admin/category/statistics'));?></li> -->
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">评论管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="nav-header"><?php echo t('comment_manage', 'admin');?></li>
                        <li><?php echo l(t('latest_comment', 'admin'), url('admin/comment/latest'));?></li>
                        <li><?php echo l(t('verify_comment', 'admin'), url('admin/comment/verify'));?></li>
                        <li><?php echo l(t('recommend_comment', 'admin'), url('admin/comment/recommend'));?></li>
                        <li><?php echo l(t('search_comment', 'admin'), url('admin/comment/search'));?></li>
                        <li class="divider"></li>
                        <li class="nav-header"><?php echo t('post_tag', 'admin');?></li>
                        <li><?php echo l(t('hottest_tags', 'admin'), url('admin/tag/hottest'));?></li>
                        <li><?php echo l(t('tag_search', 'admin'), url('admin/tag/search'));?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">用户管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo l('添加用户', url('admin/user/create'));?></li>
                        <li><?php echo l('审核用户', url('admin/user/verify'));?></li>
                        <li><?php echo l('搜索用户', url('admin/user/search'));?></li>
                        <li class="divider"></li>
                        <li class="nav-header">统计</li>
                        <li><?php echo l('今日注册', url('admin/user/today'));?></li>
                        <li><?php echo l('用户列表', url('admin/user/list'));?></li>
                        <li><?php echo l('禁用用户', url('admin/user/forbidden'));?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">工具<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo l('友情链接', url('admin/link/list'));?></li>
                        <li><?php echo l('广告管理', url('admin/advert/list'));?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">设置<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="nav-header">系统功能</li>
                        <li><?php echo l('网站设置', url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_SYSTEM_SITE)));?></li>
                        <li><?php echo l('缓存设置', url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_SYSTEM_CACHE)));?></li>
                        <li><?php echo l('附件设置', url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_SYSTEM_ATTACHMENTS)));?></li>
                        <li class="divider"></li>
                        <li class="nav-header">网站显示</li>
                        <li><?php echo l('模板配置', url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_DISPLAY_TEMPLATE)));?></li>
                        <li><?php echo l('界面元素', url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_DISPLAY_UI)));?></li>
                        <li class="divider"></li>
                        <li class="nav-header">敏感词管理</li>
                        <li><?php echo l('批量添加', url('admin/keyword/create'));?></li>
                        <li><?php echo l('敏感词列表', url('admin/keyword/list'));?></li>
                        <li class="nav-header">SNS配置</li>
                        <li><?php echo l('SNS接口', url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_SNS_INTERFACE)));?></li>
                        <li><?php echo l('SNS统计', url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_SNS_STATS)));?></li>
                        <li><?php echo l('SNS模板', url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_SNS_TEMPLATE)));?></li>
                        <li class="divider"></li>
                        <li class="nav-header">自定义参数</li>
                        <li><?php echo l('自定义参数列表', url('admin/config/view', array('categoryid'=>AdminConfig::CATEGORY_CUSTOM)));?></li>
                        <li><?php echo l('添加自定义参数', url('admin/config/create'));?></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav pull-right">
                <li><?php echo l(user()->name, url('admin/user/current'));?></li>
                <li><?php echo l('退出登录', url('site/logout'));?></li>
                <li><?php echo l('网站首页', url('site/index'), array('target'=>'_blank'));?></li>
            </ul>
        </div>
    </div>
</div>
<div class="admin-sidebar">
    <ul class="nav nav-list">
        <li class="nav-header">文章</li>
        <li><?php echo l('发表文章', url('admin/post/create'));?></li>
        <li><?php echo l('审核文章', url('admin/post/verify'));?></li>
        <li><?php echo l('最新文章', url('admin/post/latest'));?></li>
        <li><?php echo l('搜索文章', url('admin/post/search'));?></li>
        <li class="nav-header">评论</li>
        <li><?php echo l('审核评论', url('admin/comment/verify'));?></li>
        <li><?php echo l('最新评论', url('admin/comment/latest'));?></li>
        <li class="nav-header">用户</li>
        <li><?php echo l('审核用户', url('admin/user/verify'));?></li>
        <li><?php echo l('今日注册', url('admin/user/today'));?></li>
    </ul>
</div>
<div class="admin-container">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs));?>
    <?php echo $content;?>
</div>

</body>
</html>

<?php
cs()->registerCoreScript('jquery');
cs()->registerScriptFile(sbu('libs/bootstrap/js/bootstrap.min.js'), CClientScript::POS_END);
cs()->registerScriptFile(sbu('scripts/beta-admin.js'), CClientScript::POS_END);
?>


