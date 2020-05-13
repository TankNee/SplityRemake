<?php if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="<?php $this->options->charset();?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php if ($this->options->favicon): ?>
    <link rel="shortcut icon" href="<?php $this->options->favicon();?>">
    <?php endif;?>
    <title><?php $this->archiveTitle(array(
    'category' => _t('分类 %s 下的文章'),
    'search' => _t('包含关键字 %s 的文章'),
    'tag' => _t('标签 %s 下的文章'),
    'author' => _t('%s 发布的文章'),
), '', ' - ');?><?php $this->options->title();?>
    </title>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/jimu.css');?>" type="text/css" media="all">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/iconfont.css');?>" type="text/css" media="all">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/splity.css');?>" type="text/css" media="all">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/OwO.css');?>" type="text/css" media="all">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css');?>">
    <script type="text/javascript" src="<?php $this->options->themeUrl('js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php $this->options->themeUrl('js/lazyload.min.js');?>"></script>
    <script type="text/javascript" src="<?php $this->options->themeUrl('js/OwO.js');?>"></script>
    <link rel="stylesheet" href="https://cdn.staticfile.org/fancybox/3.5.2/jquery.fancybox.min.css">
    <script src="https://cdn.staticfile.org/fancybox/3.5.2/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.10.0-beta/dist/katex.min.css"
        integrity="sha384-9tPv11A+glH/on/wEu99NVwDPwkMQESOocs/ZGXPoIiLE8MU/qkqUcZ3zzL+6DuH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/katex@0.10.0-beta/dist/katex.min.js"
        integrity="sha384-U8Vrjwb8fuHMt6ewaCy8uqeUXv4oitYACKdB0VziCerzt011iQ/0TqlSlv8MReCm" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/katex@0.10.0-beta/dist/contrib/auto-render.min.js"
        integrity="sha384-aGfk5kvhIq5x1x5YdvCp4upKZYnA8ckafviDpmWEKp4afOZEqOli7gqSnh8I6enH" crossorigin="anonymous">
    </script>
    <script src="//instant.page/1.2.2" type="module"
        integrity="sha384-2xV8M5griQmzyiY3CDqh1dn4z3llDVqZDqzjzcY+jCBCk/a5fXJmuZ/40JJAPeoU"></script>
    <?php if ($this->is('post')): ?>
    <?php if ($this->options->baiduappdi): ?>
    <link rel="canonical" href="<?php $this->permalink()?>" />
    <script src="//msite.baidu.com/sdk/c.js?appid=<?php $this->options->baiduappdi();?>"></script>
    <?php else: ?>
    <?php endif;?>
    <?php endif;?>
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header();?>
</head>

<body class="home blog <?php echo ($_COOKIE['night'] == '1' ? 'night' : ''); ?>">
    <header class="header ">
        <!--导航e-->
        <nav class="navbar navbar-expand-lg shadow" style="z-index:2">
            <div class="container animated fadeInDown">
                <!-- / brand -->
                <a href="<?php $this->options->siteUrl();?>" rel="home" class="logo navbar-brand order-2 order-lg-1">
                    <?php if ($this->options->logoUrl): ?>
                    <img src="<?php $this->options->logoUrl();?>" alt="<?php $this->options->title()?>" width="100px"
                        height="40px" class="d-inline-block logo-light nc-no-lazy" />
                    <?php else: ?>
                    <?php $this->options->title()?>
                    <?php endif;?>
                </a>
                <button class="navbar-toggler order-1" type="button" id="sidebarCollapse">
                    <i class="text-xl iconfont icon-menu-line"></i>
                </button>
                <button class="navbar-toggler nav-search order-3 collapsed" data-target="#navbar-search"
                    data-toggle="collapse" aria-expanded="false" aria-controls="navbar-search">
                    <i class="text-xl iconfont icon-search-line"></i>
                    <i class="text-xl iconfont icon-close-fill"></i>
                </button>
                <!-- brand -->
                <div class="collapse navbar-collapse order-md-2">
                    <ul class="navbar-nav main-menu ml-4 mr-auto">
                        <?php $this->widget('Widget_Contents_Page_List')->to($pages);?>
                        <?php while ($pages->next()): ?>
                        <li>
                            <a<?php if ($this->is('page', $pages->slug)): ?> class="current" <?php endif;?>
                                href="<?php $pages->permalink();?>" title="<?php $pages->title();?>">
                                <?php $pages->title();?></a>
                        </li>
                        <?php endwhile;?>


                    </ul>

                    <ul class="navbar-nav align-items-center order-1 order-lg-2">

                        <li class="nav-item">
                            <a class="btn btn-link btn-icon nav-switch-dark-mode" href="javascript:switchNightMode()">
                                <span class=" icon-light-mode">
                                    <i class="text-lg iconfont icon-moon-line"></i>
                                </span>
                                <span class="icon-dark-mode">
                                    <i class="text-lg text-warning iconfont icon-moon-fill"></i></span>
                            </a>
                        </li>

                        <li class="nav-item ml-1 ml-md-2">
                            <a class="btn btn-link btn-icon nav-link nav-search collapsed" href="#navbar-search"
                                data-toggle="collapse">
                                <span title="搜索">
                                    <i class="text-lg iconfont icon-search-line"></i>
                                    <i class="text-lg iconfont icon-close-fill"></i>
                                </span>
                            </a>
                        </li>
                        <?php if ($this->user->hasLogin()): ?>
                        <li class="nav-item nav-item-signin text-sm ml-2 ml-md-3">
                            <a class="d-flex align-items-center dropdown-toggle" id="link_item_signin"
                                data-toggle="dropdown">
                                <span class="flex-avatar w-32 mx-2">

                                    <?php $email = $this->author->mail;
$imgUrl = getGravatar($email);
echo '<img src="' . $imgUrl . '" width="32px" height="32px" class="avatar avatar-32 photo avatar-default loaded" >';?>

                                </span>
                            </a>
                            <div class="nice-dropdown" aria-labelledby="link_item_signin">
                                <ul class="text-xs p-2">
                                    <li class="p-2">
                                        <a href="<?php $this->options->adminUrl();?>" rel="nofollow"><i
                                                class="text-md mr-2 iconfont icon-settings-line1"></i><?php _e('后台管理');?></a>
                                    </li>
                                    <li class="p-2">
                                        <a href="<?php $this->options->logoutUrl();?>"><i
                                                class="text-md mr-2 iconfont icon-shut-down-line"></i><?php _e('退出登录');?></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php else: ?>
                        <div class="btn-group ml-2 ml-md-3" role="group">
                            <a class="btn btn-primary btn-sm"
                                href="<?php $this->options->adminUrl('login.php');?>">登录</a>
                        </div>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </nav>
        <!--s-->
        <?php $this->need('mobile-sidebar.php');?>
        <!--e-->
        <div class="navbar-search collapse " id="navbar-search" style="">
            <div class="container">
                <form method="get" id="searchform" class="searchform shadow"
                    action="<?php $this->options->siteUrl();?>">
                    <div class="input-group">
                        <input type="text" name="s" id="s" placeholder="请输入搜索关键词并按回车键…" class="form-control">
                        <div class="input-group-append">
                            <button class="btn btn-nostyle" type="submit"><i
                                    class="text-lg iconfont icon-search-line"></i></button>
                        </div>
                    </div>
                    <!-- /input-group -->
                </form>
            </div>
        </div>
    </header>
    <!--导航e-->