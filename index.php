<?php
/**
 * 这是一款支持夜间模式的主题，对夜间模式做了很多的优化
 *
 * @package SplityRemake
 * @author TankNee & 小灯泡设计
 * @version 0.0.2
 * @link https://tanknee.cn
 */
if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}

$this->need('header.php');
?>
<!--幻灯片s-->
<?php $this->need('index-hd.php'); ?>
<!--幻灯片e-->
<main class="py-3  pt-md-4 pb-md-5">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-8">
                <!--正常列表样式s-->

                <?php $this->need('index-post.php');?>

                <!--正常列表样式e-->
                <!--加载s-->

                <?php $this->pageLink('加载更多', 'next');?>

            </div>

            <!--右边栏样式s-->

            <?php $this->need('sidebar.php');?>

            <!--右边栏样式e-->

        </div>
    </div>
</main>

<!--底部样式s-->

<?php $this->need('footer.php');?>