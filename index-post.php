<div class="list-home list-grid list-grid-padding animated fadeIn" id="content">

    <?php $counter = 0;?>
    <?php while ($this->next()): ?>




    <?php if ($this->fields->abcimg == 'mable'): ?>
    <!--三图列表样式s-->

    <div class="list-item list-item-column block">
        <div class="list-content p-0">
            <div class="list-body ">
                <a href="<?php $this->permalink()?>" title="<?php $this->title()?>" target="_blank"
                    class="list-title text-lg h-2x mb-2 mb-md-3"><?php $this->title()?></a>
                <div class="mb-2 mb-md-3">
                    <div class="d-flex flex-fill align-items-center text-muted text-xs">
                        <div class="d-inline-block">
                            <?php $this->excerpt(60, '...');?>
                        </div>
                        <div class="flex-fill"></div>
                        <div>
                            <time class="mx-1"><?php $this->date('F j, Y');?></time>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-xs mb-md-3">



                <div class="col-4">
                    <div class="media media-3x2">
                        <a class="media-content" title="<?php $this->title()?>" href="<?php $this->permalink()?>"
                            target="_blank" style='background-image:url(" <?php showThumbnail($this, 0);?>")'></a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="media media-3x2">
                        <a class="media-content" title="<?php $this->title()?>" href="<?php $this->permalink()?>"
                            target="_blank" style='background-image:url(" <?php showThumbnail($this, 1);?>")'></a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="media media-3x2">
                        <a class="media-content" title="<?php $this->title()?>" href="<?php $this->permalink()?>"
                            target="_blank" style='background-image:url(" <?php showThumbnail($this, 2);?>")'></a>
                    </div>
                </div>

            </div>
            <div class="list-desc d-none d-md-block text-sm text-secondary">
                <div class="h-2x"><?php $this->excerpt(100, '...');?></div>
            </div>
        </div>
    </div>

    <!--三图列表样式e-->
    <?php elseif ($this->fields->abcimg == 'bable'): ?>

    <!--大图列表样式s-->

    <div class="list-item list-item-column block card-featured post">
        <div class="list-content p-0">
            <div class="list-body ">
                <a class="list-title text-lg h-2x mb-2 mb-md-3" title="<?php $this->title()?>"
                    href="<?php $this->permalink()?>" target="_blank"><?php $this->title()?></a>
                <div class="mb-2 mb-md-3">
                    <div class="d-flex flex-fill align-items-center text-muted text-xs">
                        <div class="d-inline-block">

                        </div>
                        <div class="flex-fill"></div>
                        <div>
                            <time class="mx-1"><?php $this->date('F j, Y');?></time>
                        </div>
                    </div>
                </div>
            </div>

            <div class="media media-21x9 mb-md-3">
                <a class="media-content" title="<?php $this->title()?>" href="<?php $this->permalink()?>"
                    target="_blank" style='background-image:url("<?php $this->fields->bimg ? $this->fields->bimg() : showThumbnail($this, 0);?>")'></a>
            </div>
            <div class="list-desc d-none d-md-block text-sm text-secondary">
                <div class="h-2x "><?php $this->excerpt(60, '...');?></div>
            </div>
        </div>
    </div>

    <!--大图列表样式e-->
    <?php else: ?>

    <!--正常列表样式s-->
    <?php if ($this->fields->prebadge): ?>
    <div class="list-item block card-plain post tag-post" tag="<?php $this->fields->prebadge(); ?>">
        <?php else: ?>
        <div class="list-item block card-plain post" tag="">
            <?php endif;?>
            <div class="media media-3x2 col-4 col-md-4">
                <?php if ($this->fields->img): ?>
                <a class="media-content" href="<?php $this->permalink()?>" title="<?php $this->title()?>"
                    style='background-image:url("<?php $this->fields->img();?>")'></a>
                <?php else: ?>
                <a class="media-content" href="<?php $this->permalink()?>" title="<?php $this->title()?>"
                    style='background-image:url("<?php showThumbnail($this, 0);?>")'></a>
                <?php endif;?>
            </div>
            <div class="list-content">
                <div class="list-body">
                    <a href="<?php $this->permalink()?>" title="<?php $this->title()?>" class="list-title text-lg h-2x">
                        <?php if ($this->fields->pretag): ?>
                        <span class="pretag"><?php $this->fields->pretag();?></span>
                        <?php endif;?>
                        <?php $this->title()?></a>
                    <div class="list-desc d-none d-md-block text-sm text-secondary my-3">
                        <div class="h-2x "><?php $this->excerpt(60, '...');?></div>
                    </div>
                </div>
                <div class="list-footer">
                    <div class="d-flex flex-fill align-items-center text-muted text-xs">
                        <div class="d-inline-block tag-list" style="overflow:hidden;">
                            <?php $email = $this->author->mail;
$imgUrl = getGravatar($email);
echo '<img src="' . $imgUrl . '" class="avatar" height="25" width="25">';?>

                        </div>
                        <div class="flex-fill"></div>
                        <div>
                            <?php $this->author->screenName();?>
                            <time class="mx-1"><?php $this->date('m-d');?></time>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--正常列表样式e-->

        <?php endif;?>






        <?php $counter++;?>
        <?php if ($counter == 2): ?>
        <div class="block card-plain ad">
            <?php if ($this->options->adnav) {$this->options->adnav();}?>
        </div>
        <?php else: ?>
        <?php endif;?>



        <?php endwhile;?>
    </div>