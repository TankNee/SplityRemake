<?php if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}
?>
<?php $this->need('header.php');?>
<main class="py-3 py-md-5">
    <div class="container">
        <div class="d-none d-md-block breadcrumbs text-muted mb-3">
            <?php $this->need('link-s.php');?>
        </div>
        <div class="row no-gutters animated fadeIn">
            <div class="col-lg-8">
                <div class="post card">
                    <div class="card-body">
                        <div class="post-header border-bottom border-light mb-4 pb-4">
                            <h1 class="h3 mb-3"><?php $this->title();?></h1>
                            <div class="meta d-flex align-items-center text-xs text-muted">
                                <div>
                                    <time class="d-inline-block"><?php $this->date('Y-m-d H:i');?></time>
                                </div>
                                <div class="ml-auto text-sm">
                                    <span class="mx-1"><i
                                            class="text-md iconfont icon-eye-line mx-1"></i><small><?php Postviews($this);?></small></span>
                                    <a class="mx-1" href="#comments"><i
                                            class="text-md iconfont icon-chat--line mx-1"></i><small><a
                                                href="<?php $this->permalink()?>#comments"><?php $this->commentsNum('0', '1', '%d');?></a></small></a>
                                </div>
                            </div>
                            <div class="border-theme bg-primary"></div>
                        </div>
                        <div class="post-content" id="article-post">
                            <?php PreprocessTextContent($this);?>
                        </div>
                    </div>
                    <div class="card-footer pt-0 border-0">
                        <div id="post-share-section"
                            class="d-flex align-items-center justify-content-between justify-content-md-start text-center text-md-left py-2">
                            <a href="javascript:;" class="plus-power-popup mr-md-4"><i
                                    class="text-xl iconfont icon-exchange-dollar-fill"></i></a>
                            <div id="plus-power-popup-wrap">
                                <div class="popup-inner">
                                    <div class="content p-4">
                                        <div class="plus-power-tabcontent">
                                            <div class="item-qrcode">
                                                <img src="<?php $this->options->alipay();?>" alt="打赏">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="javascript:;" class="btn-bigger-cover comiis_poster_a"><span><i
                                        class="text-xl iconfont icon-article-line"></i></span></a>

                        </div>
                    </div>
                </div>
                <!--ad-->
                <div class="paid-share my-lg-4 d-lg-block">
                    <?php if ($this->options->adtxt) {$this->options->adtxt();}?>
                </div>
                <!--ad-->
                <section class="list-related">
                    <div class="mx-1 my-3">
                        <i class="text-xl text-primary iconfont icon-refresh-line mr-2"></i>相关文章</div>
                    <div class="content-related card">
                        <div class="card-body">
                            <div class="list list-dots my-n2">
                                <?php $this->related(5)->to($relatedPosts);?>
                                <?php while ($relatedPosts->next()): ?>
                                <div class="list-item py-2">
                                    <a href="<?php $relatedPosts->permalink();?>" target="_blank"
                                        class="list-title h-2x">
                                        <?php $relatedPosts->title();?> </a>
                                </div>
                                <?php endwhile;?>
                            </div>
                        </div>
                    </div>
                </section>


                <div id="comments" class="comments">
                    <div class="mx-1 my-3">
                        <i class="text-xl text-primary iconfont icon-message--line mr-2"></i>
                        评论 <small
                            class="font-theme text-muted">(<?php $this->commentsNum(_t('暂无评论'), _t('1'), _t('%d'));?>)</small>
                    </div>
                    <div class="card">
                        <?php $this->need('comments.php');?>
                    </div>
                </div>
                <!-- #comments -->
            </div>
            <?php $this->need('sidebar.php');?>
        </div>
    </div>
</main>
<?php $this->need('footer.php');?>
<?php if ($this->is('post')): ?>
<?php $this->need('poster.php');?>
<?php endif;?>