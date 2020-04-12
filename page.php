<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<main class="py-3 py-md-5">
    <div class="container">
        <div class="d-none d-md-block breadcrumbs text-muted mb-3">
            <?php $this->need('link-s.php'); ?>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-8">
                <div class="post card">
                    <div class="card-body">
                        <div class="post-header mb-3">
                            <h1 class="h3 mb-3"><?php $this->title(); ?></h1>
                        </div>
                        <div class="post-content">
                            <?php PreprocessTextContent($this); ?>
                        </div>
                    </div>
                </div>
                <!--ad-->
                <div class="paid-share my-lg-4 d-lg-block">
                    <?php if($this->options->adtxt){$this->options->adtxt();} ?>
                </div>
                <!--ad-->
                <div id="comments" class="comments">
                    <div class="mx-1 my-3">
                        <i class="text-xl text-primary iconfont icon-message--line mr-2"></i>
                        评论 <small
                            class="font-theme text-muted">(<?php $this->commentsNum(_t('暂无评论'), _t('1'), _t('%d')); ?>)</small>
                    </div>
                    <div class="card">
                        <?php $this->need('comments.php'); ?>
                    </div>
                </div>
                <!-- #comments -->
            </div>
            <?php $this->need('sidebar.php'); ?>
        </div>
    </div>
</main>
<?php $this->need('footer.php'); ?>