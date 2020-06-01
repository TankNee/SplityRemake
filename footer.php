<footer class="footer bg-dark py-3 py-lg-4">
    <div class="container">
        <div class="d-md-flex flex-md-fill align-items-md-center">
            <div class="d-md-flex flex-md-column">
                <ul class="footer-menu">
                    <?php $this->widget('Widget_Metas_Category_List')->parse('<li><a href="{permalink}">{name}</a></li>');?>
                </ul>
                <div class="footer-copyright text-xs">
                    Copyright © 2019 <?php $this->options->icp();?>.
                    <?php _e('建站日期:');?><?php $this->options->sitedate();?>&nbsp;<?php $this->options->zztj();?>.
                </div>
            </div>
            <div class="flex-md-fill"></div>
            <div class="mt-3 mt-md-0">

                <?php if ($this->options->wechat): ?>
                <a href="javascript:" data-img="<?php $this->options->wechat();?>"
                    data-title="<?php $this->author->screenName();?>的微信号" data-desc="微信扫一扫，立即关注"
                    class="single-popup btn btn-secondary btn-weixin btn-icon">
                    <span><i class="text-lg iconfont icon-wechat-fill"></i></span>
                </a>
                <?php endif;?>

            </div>
        </div>
        <div class="footer-links border-top border-secondary pt-3 mt-3 text-xs">

            <?php if ($this->is('index')): ?>
            <span> <?php _e('友情链接：');?></span>
            <?php if ($this->options->footernav) {$this->options->footernav();}?>
            <?php else: ?>
            <span><?php $this->options->blogmeabout();?></span>
            <?php endif;?>
            <span><a href="https://tanknee.cn">TankNee</a></span>

        </div>
    </div>
</footer>

<a href="javascript:void(0)" id="scroll_to_top" class="btn btn-primary btn-icon scroll-to-top"><span><i
            class="text-lg iconfont icon-arrow-up-fill"></i></span></a>
<div class="mobile-overlay"></div>

<script type="text/javascript" src="<?php $this->options->themeUrl('js/jimu.js?ver=1.0');?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/bootstrap.min.js?ver=1.0.2');?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/owl.carousel.min.js?ver=1.0.2');?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/theia-sticky-sidebar.min.js?ver=1.0.2');?>">
</script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/splity.js?ver=1.0.2');?>"></script>
<!-- <script type="text/javascript">
const imageLazyLoader = () => {
    $("img.lazy").lazyload({
        effect: "fadeIn",
        placeholder: "<?php $this->options->themeUrl('images/loading1.gif');?>"
    });
}
imageLazyLoader();
</script> -->
<?php if ($this->is('post')): ?>
<?php if ($this->options->baiduappdi): ?>
<script type="application/ld+json">
{
    "@context": "https://ziyuan.baidu.com/contexts/cambrian.jsonld",
    "@id": "<?php $this->permalink()?>",
    "appid": "<?php $this->options->baiduappdi();?>",
    "title": "<?php $this->title()?>",
    "images": ["<?php $this->fields->img();?>"],
    "description": "<?php $this->description()?>",
    "pubDate": "<?php $this->date('Y-m-d\TH:i:s');?>"
}
</script>
<?php else: ?>
<?php endif;?>
<?php endif;?>

<!--底部样式e-->
<?php $this->footer();?>
</body>

</html>