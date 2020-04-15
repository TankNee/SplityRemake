<div class="mobile-sidebar">
    <div class="mobile-sidebar-header text-right p-3">
        <a class="btn btn-link btn-icon nav-switch-dark-mode" href="javascript:switchNightMode()">
            <span class=" icon-light-mode">
                <i class="text-lg iconfont icon-moon-line"></i>
            </span>
            <span class="icon-dark-mode">
                <i class="text-lg text-warning iconfont icon-moon-fill"></i></span>
        </a>
        <button class="btn btn-icon sidebar-close"><span><i
                    class="text-xl iconfont icon-radio-button-line"></i></span></button>
    </div>
    <ul class="mobile-sidebar-menu nav flex-column">
        <li><a href="<?php $this->options->siteUrl(); ?>"><?php _e('网站导航'); ?></a></li>
        <?php $this->widget('Widget_Metas_Category_List')->parse('<li><a href="{permalink}">{name}</a></li>'); ?>
        <li><a href="<?php $this->options->navMenusLink1(); ?>"><?php $this->options->navMenus1(); ?></a></li>
        <li><a href="<?php $this->options->navMenusLink2(); ?>"><?php $this->options->navMenus2(); ?></a></li>
        <li><a href="<?php $this->options->navMenusLink3(); ?>"><?php $this->options->navMenus3(); ?></a></li>
    </ul>
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock) && $this->is('post')): ?>

    <!--输出文章目录结构-->
    <div class="card mobile-sidebar-menu nav flex-column">
        <div class="card-header widget-header">文章目录<i class="bg-primary"></i>
        </div>
        <div class="card-body">
            <div class="list-news my-n2" id="m-article-menu">
            </div>
        </div>
    </div>
    <?php endif;?>
</div>