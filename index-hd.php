<div class="list-banner list-rounded banner-style-2 banner-has-nav pt-3 pt-md-5 animated fadeIn" style="z-index:1;position: relative;">
    <div class="container">
        <!--全屝s-->
        <div class="owl-carousel owl-theme">
            <?php
$lunbo = $this->options->imghdp;
$hang = explode(",", $lunbo);
$n = count($hang);
$html = "";
for ($i = 0; $i < $n; $i++) {
    $this->widget('Widget_Archive@lunbo' . $i, 'pageSize=1&type=post', 'cid=' . $hang[$i])->to($ji);
    if ($i == 0) {$no = " sx_no";} else { $no = "";}
    if ($ji->fields->bimg) {
        $thumbnail = $ji->fields->bimg;
    } else if ($ji->fields->img) {
        $thumbnail = $ji->fields->img;
    } else {
        $thumbnail = showThumbnail($ji, 0);
    }
    // $html = $html . '<div class="card item list-item list-overlay-content m-0"><div class="media media-21x9"><a class="media-content" href="' . $ji->permalink . '" style="background-image:url(' . $thumbnail . ')" ><span class="overlay"></span></a></div><div class="list-content p-3 p-md-5 text-center"><div class="list-body"><a href="' . $ji->permalink . '" target="_blank" class="h4 text-white h-2x m-0">' . $ji->title . '</a> </div></div></div>';
    $html = $html . '<div class="card item list-item list-overlay-content m-0"><div class="media media-21x9"><a class="media-content" href="' . $ji->permalink . '" ><img class="lazy" data-original="' . $thumbnail  . '"><span class="overlay"></span></a></div><div class="list-content p-3 p-md-5 text-center"><div class="list-body"><a href="' . $ji->permalink . '" target="_blank" class="h4 text-white h-2x m-0">' . $ji->title . '</a> </div></div></div>';
}
echo $html;
?>
        </div>
        <!--全屝e-->
    </div>
</div>