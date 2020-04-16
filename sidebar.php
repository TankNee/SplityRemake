<?php if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}
?>

<div class="sidebar col-lg-4 pl-lg-4 pl-xl-5 d-none d-lg-block">


    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowAboutMe', $this->options->sidebarBlock)): ?>

    <!--关于我-->

    <div class="card">
        <div class="widget-author-cover">
            <div class="media media-2x1">

                <div class="media-content" style="background-image: url(<?php $this->options->abimg();?>);"></div>

            </div>
            <div class="widget-author-avatar">
                <div class="flex-avatar mx-2 w-80 border border-white border-2">

                    <?php $email = $this->author->mail;
$imgUrl = getGravatar($email);
echo '<img src="' . $imgUrl . '" class="avatar" height="80" width="80">';?>

                </div>
            </div>
        </div>
        <div class="widget-author-meta text-center p-4" style="font-family:'screenname';">
            <div class="h6 mb-3 iconfont" style="font-weight:bold;"><?php strtoupper($this->author->screenName());?>
                <small class="d-block iconfont" style="margin-top:1rem;">
                    <?php if ($this->options->blogmeabout): ?>
                    <span class="badge badge-outline-primary mt-2"><?php $this->options->blogmeabout();?></span>
                    <?php else: ?>
                    <!-- 添加一言api -->
                    <span id="jinrishici-sentence">晚来天欲雨，能饮一杯无</span>
                    <script src="https://sdk.jinrishici.com/v2/browser/jinrishici.js" charset="utf-8"></script>
                    <?php endif;?>
                </small>
            </div>
            <div class="desc text-xs mb-3 h-2x"></div>
            <div class="row no-gutters text-center">

                <?php Typecho_Widget::widget('Widget_Stat')->to($stat);?>
                <a href="<?php $this->options->siteUrl();?>" target="_blank" class="col">
                    <span class="font-theme font-weight-bold text-md"><?php $stat->publishedPostsNum()?></span><small
                        class="d-block text-xs text-muted">文章</small>
                </a>
                <a href="<?php $this->options->siteUrl();?>" target="_blank" class="col">
                    <span class="font-theme font-weight-bold text-md"><?php $stat->publishedCommentsNum()?></span><small
                        class="d-block text-xs text-muted">评论</small>
                </a>
                <a href="<?php $this->options->siteUrl();?>" target="_blank" class="col">
                    <span class="font-theme font-weight-bold text-md"><?php $stat->categoriesNum()?></span><small
                        class="d-block text-xs text-muted">栏目</small>
                </a>
            </div>
        </div>
    </div>


    <?php endif;?>
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowSidebarPosts', $this->options->sidebarBlock) && !$this->is('post')): ?>

    <!--最新文章-->

    <div class="card card-sm widget Recommended_Posts">
        <div class="card-header widget-header">最新文章
            <i class="bg-primary"></i>
        </div>
        <div class="card-body">
            <div class="list-rounded my-n2">

                <?php $latestArticles = $this->widget('Widget_Contents_Post_Recent');
$count = 0;?>
                <?php while ($latestArticles->next() && $count < 2): ?>
                <div class="py-2">
                    <div class="list-item list-overlay-content">
                        <div class="media media-2x1">
                            <?php if ($this->fields->img): ?>
                            <a class="media-content" href="<?php $latestArticles->permalink();?>" target="_blank"
                                style="background-image: url(<?php $latestArticles->fields->img();?>);"><span
                                    class="overlay"></span></a>
                            <?php else: ?>
                            <a class="media-content" href="<?php $latestArticles->permalink();?>" target="_blank"
                                style="background-image: url(<?php echo showThumbnail($latestArticles, 0); ?>);"><span
                                    class="overlay"></span></a>
                            <?php endif;?>

                        </div>
                        <div class="list-content">
                            <div class="list-body">
                                <a href="<?php $latestArticles->permalink();?>" target="_blank"
                                    class="list-title h-2x"><?php $latestArticles->title();?></a>
                            </div>
                            <div class="list-footer">
                                <div class="text-muted text-xs">
                                    <time class="d-inline-block"><?php $latestArticles->date("yy-m-d");?></time>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $count++;?>
                <?php endwhile;?>
            </div>
        </div>
    </div>

    <?php endif;?>
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowAd', $this->options->sidebarBlock) && !$this->is('post')): ?>

    <!--关于广告-->

    <div class="card">
        <div class="list-rounded">
            <div class="list-item list-overlay-content ad">
                <div>
                    <?php if ($this->options->adlink): ?>
                    <a href="<?php $this->options->adlink();?>"><img src="<?php $this->options->adimg();?>"></a>
                    <?php else: ?>
                    <a href="<?php $this->options->adlink();?>"><img
                            src="<?php $this->options->themeUrl('images/thumbs/adimg.png');?>"></a>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>

    <?php endif;?>
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock) && !$this->is('post')): ?>

    <!--关于热门文章-->

    <div class="card">
        <div class="card-header widget-header">热门文章<i class="bg-primary"></i>
        </div>
        <div class="card-body">
            <div class="list-news my-n2">

                <?php getHotPosts('4');?>

            </div>
            <div class="mt-3"><a href="" target="_blank" class="btn btn-outline-primary btn-block">更多</a></div>
        </div>
    </div>
    <?php endif;?>
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock) && $this->is('post')): ?>

    <!--输出文章目录结构-->

    <div class="card">
        <div class="card-header widget-header">文章目录<i class="bg-primary"></i>
        </div>
        <div class="card-body">
            <div class="list-news my-n2" id="article-menu">
            </div>
        </div>
    </div>
    <?php endif;?>

</div>