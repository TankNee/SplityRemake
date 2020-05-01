<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**
 * 归档页面
 *
 * @package custom
 *
 */
?>
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
                            <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives); ?>
                            <div id="line"></div>
                            <div id="coos">
                                <?php
			                        $i = 0;
			                        $index = 0;
			                        $color = array("yellow","pink","black","green","blue","purple");
			                        //打乱颜色
			                        shuffle($color);
		                        ?>
                                <?php while($archives->next()): ?>
                                <div class="lis">
                                    <div class="spot"></div>
                                    <div class="ke">
                                        <div class="<?php echo "archive-item"." ".$color[$index] ?>">
                                            <date class="archive-date"><?php $archives->date('Y-m-d'); ?></date>
                                            <h3 class="archive-title"><span
                                                    class="archive-tag"></span><?php $archives->sticky();?> <a
                                                    href="<?php $archives->permalink() ?>" target="_blank">
                                                    <?php $archives->title() ?></a></h3>
                                            <div class="archive-des">
                                                <?php 
                                                    
                                                    if($archives->category == "album" || $archives->category == $this->options->archive_img_category_1 || $archives->category == $this->options->archive_img_category_2  ){
                                                        echo "<img class='archive-img' src='" .showThumbnail($archives,0). "' />";
                                                    }else{
                                                        $archives->excerpt(10, '...'); 
                                                    }
                                                    
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $i++;
                                    $index++;
                                    if($index>5){
                                        $index = 0;
                                    }

                                ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->need('sidebar.php'); ?>
        </div>
    </div>
</main>
<?php $this->need('footer.php'); ?>