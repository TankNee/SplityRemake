<?php if($this->is('index')):?>
<!-- 页面首页时 -->
<span><a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>">首页</a> <span
        class="sep">›</span></span>
<?php elseif ($this->is('post')): ?>
<!-- 页面为文章单页时 -->
<span><a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>">首页</a> <span
        class="sep">›</span> <?php $this->category(); ?> <span class="sep">›</span> <?php $this->title(); ?></span>
<?php else: ?>
<!-- 页面为其他页时 -->
<span><a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>">首页</a> <span
        class="sep">›</span> <?php $this->archiveTitle(' &raquo; ','',''); ?></span>
<?php endif; ?>