<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
	
  <main class="py-3 py-md-5"><div class="container">
    	<div class="content-error text-center h-v-75 py-5">
    		<div > 
            <img src="<?php $this->options->themeUrl('images/404.png'); ?>">
            </div>
            <h1 class="display-1 font-theme">404</h1>
            <h4 class="py-4">哎呀！ 该页面无法找到。</h4>
            <p class="text-muted">看起来这里没有任何东西…</p>
        </div>
    </div>
</main>	

<!--底部样式s-->

<?php $this->need('footer.php'); ?>