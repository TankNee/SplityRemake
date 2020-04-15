<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
 
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
    $depth = $comments->levels +1; //添加的一句
?>

<li id="li-<?php $comments->theId(); ?>" class="comment<?php 
if ( $depth > 1 && $depth < 3 ) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} elseif ( $depth > 2 ) { 
    echo ' comment-child2'; 
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even'); 
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
    <div id="<?php $comments->theId(); ?>" class="comment-body">
        <div class="comment-author">
            <?php $email=$comments->mail; $imgUrl = getGravatar($email);echo '<img src="'.$imgUrl.'" width="45px" height="45px" style="border-radius: 50%;" >'; ?>
            <cite class="fn"><?php CommentAuthor($comments); ?></cite><span class="says"><?php _e(''); ?></span>
        </div>
        <div class="comment-meta">
            <a href="<?php $comments->permalink(); ?>"><?php $comments->date('Y-m-d H:i'); ?></a>
            <span class="comment-ua">
                <?php getOs($comments->agent); ?>
                <?php getBrowser($comments->agent); ?>
            </span>
        </div>
        <?php parseCommentContent($comments->content); ?>
        <div class="reply">
            <span class="comment-reply-link"><?php $comments->reply(); ?></span>
        </div>
    </div>
    <?php if ($comments->children) { ?>
    <?php $comments->threadedComments($options); ?>
    <?php } ?>
</li>
<?php } ?>

<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
            <?php $comments->cancelReply(); ?>
        </div>

        <h3 id="response" class="comment-reply-title"><?php _e('发表评论'); ?></h3>
        <form id="new_comment_form" method="post" action="<?php $this->commentUrl() ?>" _lpchecked="1">

            <div class="new_comment">
                <textarea name="text" rows="3" class="textarea_box OwO-textarea" style="height: auto;"
                    placeholder="Write Your Idea!"></textarea>
                <div class="OwO padder-v-sm" style="text-align:right; padding-right: 10px;"></div>
            </div>

            <div class="comment_triggered" style="display: block;">
                <div class="input_body">
                    <ul class="ident">
                        <li>
                            <input type="text" name="author" placeholder="昵称*"
                                value="<?php $this->remember('author'); ?>">
                        </li>

                        <li>
                            <input type="mail" name="mail" placeholder="邮件*" value="<?php $this->remember('mail'); ?>">
                        </li>

                        <li>
                            <input type="text" name="url" placeholder="网址" value="<?php $this->remember('url'); ?>">
                        </li>
                    </ul>
                    <input type="submit" value="提交评论" class="comment_submit_button c_button">
                </div>
            </div>

        </form>
    </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
    <?php if ($comments->have()): ?>


    <?php $comments->listComments(); ?>

    <?php $comments->pageNav('','','2','...'); ?>

    <?php endif; ?>

</div>
<script>
var OwO_demo = new OwO({
    logo: 'OωO表情',
    container: document.getElementsByClassName('OwO')[0],
    target: document.getElementsByClassName('OwO-textarea')[0],
    api: '<?php $this->options->themeUrl('assets/OwO.json');?>',
    position: 'down',
    width: '100%',
    maxHeight: '250px'
});
</script>