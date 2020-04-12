<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
	exit;
}
function themeConfig($form) {
	$logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', null, null, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
	$form->addInput($logoUrl);
	$imghdp = new Typecho_Widget_Helper_Form_Element_Text('imghdp', null, null, _t('首页轮显文章ID'), _t('在这里填入轮显文章ID,支持多填'));
	$form->addInput($imghdp);
	$favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', null, null, _t('favicon地址'), _t('一般为http://www.yourblog.com/image.png,支持 https:// 或 //,留空则不设置favicon'));
	$form->addInput($favicon);
	$blogmeabout = new Typecho_Widget_Helper_Form_Element_Text('blogmeabout', null, null, _t('博主个人简介'), _t('在这里填入你的个人简介，例如：欢迎来到我的typecho博客。'));
	$form->addInput($blogmeabout);
	$baiduappdi = new Typecho_Widget_Helper_Form_Element_Text('baiduappdi', null, null, _t('配置熊掌号 APPID'), _t('在这里填入你的个人配置熊掌号 APPID，不填写则为不开启，可以和自动推送有现成的插件：BaiduSubmit 配合推送'));
	$form->addInput($baiduappdi);
	$abimg = new Typecho_Widget_Helper_Form_Element_Text('abimg', null, null, _t('个人背景图片地址'), _t('在这里填入你的个人背景图片地址，http://www.yourblog.com/image.png,支持 https:// 或 //'));
	$form->addInput($abimg);
	$wechat = new Typecho_Widget_Helper_Form_Element_Text('wechat', null, null, _t('微信二维码图片地址'), _t('在这里填入你的微信二维码图片地址，http://www.yourblog.com/image.png,支持 https:// 或 //'));
	$form->addInput($wechat);
	$alipay = new Typecho_Widget_Helper_Form_Element_Text('alipay', null, null, _t('支付宝二维码图片地址'), _t('在这里填入你支付宝二维码图片地址，http://www.yourblog.com/image.png,支持 https:// 或 //'));
	$form->addInput($alipay);
	$icp = new Typecho_Widget_Helper_Form_Element_Text('icp', null, null, _t('备案号'), _t('在这里填入你的网站备案号， 例如：鄂ICP备15008888号-1'));
	$form->addInput($icp);
	$sitedate = new Typecho_Widget_Helper_Form_Element_Text('sitedate', null, null, _t('网站建站日期'), _t('在这里填入你的网站建站日期， 例如：2017-05-20'));
	$form->addInput($sitedate);
	$zztj = new Typecho_Widget_Helper_Form_Element_Text('zztj', null, null, _t('网站统计代码'), _t('在这里填入你的网站统计代码，这个可以到百度统计或者cnzz上申请。'));
	$form->addInput($zztj);
	$adlink = new Typecho_Widget_Helper_Form_Element_Text('adlink', null, null, _t('广告链接地址'), _t('在这里填入你广告链接地址，http://www.yourblog.com,支持 https:// 或 //'));
	$form->addInput($adlink);
	$adimg = new Typecho_Widget_Helper_Form_Element_Text('adimg', null, null, _t('广告图片链接地址'), _t('在这里填入你广告图片链接地址，http://www.yourblog.com/image.png,支持 https:// 或 //'));
	$form->addInput($adimg);
	$footernav = new Typecho_Widget_Helper_Form_Element_Textarea('footernav', null, null, _t('底部链接（友情链接）'), _t('一行一个链接，格式为：&lt;a rel="nofollow" target="_blank" href="//mrju.cn"&gt;MrJu&lt;/a&gt;'));
	$form->addInput($footernav);
	$adnav = new Typecho_Widget_Helper_Form_Element_Textarea('adnav', null, null, _t('列表广告设置（单个）'), _t('列表默认第二篇文章后广告图片链接，广告代码参考：&lt;a rel="nofollow" target="_blank" href=""&gt; &lt;img src="图片链接"&gt;  &lt;/a&gt;'));
	$form->addInput($adnav);
	$adtxt = new Typecho_Widget_Helper_Form_Element_Textarea('adtxt', null, null, _t('文章底部（单个）'), _t('文章底部广告图片链接，广告代码参考：&lt;a rel="nofollow" target="_blank" href=""&gt; &lt;img src="图片链接"&gt;  &lt;/a&gt;'));
	$form->addInput($adtxt);
	$sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock',
	        array(
	            'ShowAboutMe' => _t('关于我'),
	            'ShowSidebarPosts' => _t('最新文章'),
	            'ShowAd' => _t('广告'),
	            'ShowRecentComments' => _t('热门文章')),
	        array('ShowAboutMe', 'ShowSidebarPosts', 'ShowAd', 'ShowRecentComments'), _t('侧边栏显示'));
	$form->addInput($sidebarBlock->multiMode());
	//备份开始
	$db = Typecho_Db::get();
	$sjdq = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:splity'));
	$ysj = $sjdq['value'];
	if (isset($_POST['type'])) {
		if ($_POST["type"] == "备份模板数据") {
			if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:splitybf'))) {
				$update = $db->update('table.options')->rows(array('value' => $ysj))->where('name = ?', 'theme:splitybf');
				$updateRows = $db->query($update);
				echo '<div class="tongzhi">备份已更新，请等待自动刷新！如果等不到请点击';
				?>
				<a href="<?php Helper::options()->adminUrl('options-theme.php');?>">这里</a></div>
				<script language="JavaScript">
				window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php');?>\'", 2500);
				</script>
				<?php
			} else {
				if ($ysj) {
					$insert = $db->insert('table.options')
					                        ->rows(array('name' => 'theme:splitybf', 'user' => '0', 'value' => $ysj));
					$insertId = $db->query($insert);
					echo '<div class="tongzhi">备份完成，请等待自动刷新！如果等不到请点击';
					?>
					<a href="<?php Helper::options()->adminUrl('options-theme.php');?>">这里</a></div>
					<script language="JavaScript">
					window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php');?>\'", 2500);
					</script>
					<?php
				}
			}
		}
		if ($_POST["type"] == "还原模板数据") {
			if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:splitybf'))) {
				$sjdub = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:splitybf'));
				$bsj = $sjdub['value'];
				$update = $db->update('table.options')->rows(array('value' => $bsj))->where('name = ?', 'theme:splity');
				$updateRows = $db->query($update);
				echo '<div class="tongzhi">检测到模板备份数据，恢复完成，请等待自动刷新！如果等不到请点击';
				?>
				<a href="<?php Helper::options()->adminUrl('options-theme.php');?>">这里</a></div>
				<script language="JavaScript">
				window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php');?>\'", 2000);
				</script>
				<?php
			} else {
				echo '<div class="tongzhi">没有模板备份数据，恢复不了哦！</div>';
			}
		}
		if ($_POST["type"] == "删除备份数据") {
			if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:splitybf'))) {
				$delete = $db->delete('table.options')->where('name = ?', 'theme:splitybf');
				$deletedRows = $db->query($delete);
				echo '<div class="tongzhi">删除成功，请等待自动刷新，如果等不到请点击';
				?>
				<a href="<?php Helper::options()->adminUrl('options-theme.php');?>">这里</a></div>
				<script language="JavaScript">
				window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php');?>\'", 2500);
				</script>
				<?php
			} else {
				echo '<div class="tongzhi">不用删了！备份不存在！！！</div>';
			}
		}
	}
	echo '<form class="protected" action="?splitybf" method="post">
<input type="submit" name="type" class="btn btn-s" value="备份模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="还原模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="删除备份数据" /></form>';
	//备份结束
}
//后台编辑器添加功能
function themeFields($layout) {
	$img = new Typecho_Widget_Helper_Form_Element_Text('img', null, null, _t('自定义缩略图'), _t('在这里填入一个图片 URL 地址, 以添加显示本文的缩略图，留空则显示默认缩略图'));
	$img->input->setAttribute('class', 'w-100');
	$layout->addItem($img);
	$bimg = new Typecho_Widget_Helper_Form_Element_Text('bimg', null, null, _t('大封面缩略图'), _t('在这里填入一个图片 URL 地址, 以添加显示本文的大封面缩略图，留空则显示默认小缩略图'));
	$bimg->input->setAttribute('class', 'w-100');
	$layout->addItem($bimg);
	$pretag = new Typecho_Widget_Helper_Form_Element_Text('pretag', null, null, _t('标题前的标签'), _t('在这里填入标签名'));
	$pretag->input->setAttribute('class', 'w-100');
	$layout->addItem($pretag);
	$prebadge = new Typecho_Widget_Helper_Form_Element_Text('prebadge', null, null, _t('文章左侧的徽标'), _t('在这里填入徽标名'));
	$prebadge->input->setAttribute('class', 'w-100');
	$layout->addItem($prebadge);
	//单图/大图/三图显示
	$abcimg = new Typecho_Widget_Helper_Form_Element_Radio('abcimg',
	        array('able' => _t('单图'),
	            'bable' => _t('大图'),
	            'mable' => _t('三图'),
	        ),
	        'able', _t('单图/大图/三图显示'), _t('默认单图，注意确保发布的文章必须有三张以上的图片附件'));
	$layout->addItem($abcimg);
}
//热门文章
function getHotPosts($limit = 10) {
	$db = Typecho_Db::get();
	$result = $db->fetchAll($db->select()->from('table.contents')
	            ->where('status = ?', 'publish')
	            ->where('type = ?', 'post')
	            ->where('created <= unix_timestamp(now())', 'post') //添加这一句避免未达到时间的文章提前曝光
	->limit($limit)
	            ->order('commentsNum', Typecho_Db::SORT_DESC)
	    );
	if ($result) {
		foreach ($result as $val) {
			$val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
			$post_title = htmlspecialchars($val['title']);
			$permalink = $val['permalink'];
			echo '<div class="list-news-item"><div class="list-news-dot"></div><div class="list-news-body"><div class="list-news-content mt-2 pb-1"><div class="text-sm" id="news_title_4814"><a href="' . $permalink . '">' . $post_title . '</a></div><div class="text-xs text-muted my-1">' . $val['commentsNum'] . ' 评论</div></div></div></div>';
		}
	}
}
/**
 * 阅读统计
 * 调用<?php get_post_view($this); ?>
*/
function Postviews($archive) {
	$db = Typecho_Db::get();
	$cid = $archive->cid;
	if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
		$db->query('ALTER TABLE `' . $db->getPrefix() . 'contents` ADD `views` INT(10) DEFAULT 0;');
	}
	$exist = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid))['views'];
	if ($archive->is('single')) {
		$cookie = Typecho_Cookie::get('contents_views');
		$cookie = $cookie ? explode(',', $cookie) : array();
		if (!in_array($cid, $cookie)) {
			$db->query($db->update('table.contents')
			->rows(array('views' => (int) $exist + 1))
			->where('cid = ?', $cid));
			$exist = (int) $exist + 1;
			array_push($cookie, $cid);
			$cookie = implode(',', $cookie);
			Typecho_Cookie::set('contents_views', $cookie);
		}
	}
	echo $exist == 0 ? '0' : $exist . ' ';
}
/**
* 评论者主页链接新窗口打开
* 调用<?php CommentAuthor($comments); ?>
*/
function CommentAuthor($obj, $autoLink = null, $noFollow = null) {
	//后两个参数是原生函数自带的，为了保持原生属性，我并没有删除，原版保留
	$options = Helper::options();
	$autoLink = $autoLink ? $autoLink : $options->commentsShowUrl;
	//原生参数，控制输出链接（开关而已）
	$noFollow = $noFollow ? $noFollow : $options->commentsUrlNofollow;
	//原生参数，控制输出链接额外属性（也是开关而已...）
	if ($obj->url && $autoLink) {
		echo '<a href="' . $obj->url . '"' . ($noFollow ? '
    rel="external nofollow"' : null) . (strstr($obj->url, $options->index) == $obj->url ? null : '
    target="_blank"') . '>' . $obj->author . '</a>';
	} else {
		echo $obj->author;
	}
}
/** 输出文章缩略图 */
function showThumbnail($widget, $imgnum) {
	//获取两个参数，文章的ID和需要显示的图片下标
	// 当文章无图片时的默认缩略图
	$rand = rand(1, 3);
	$random = $widget->widget('Widget_Options')->themeUrl . '/images/thumbs/random/' . $rand . '.jpg';
	// 随机缩略图路径
	$attach = $widget->attachments(1)->attachment;
	$pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
	$patternMD = '/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png))/i';
	$patternMDfoot = '/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png))/i';
	//如果文章内有插图，则调用插图
	if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
		echo $thumbUrl[1][$imgnum];
	}
    //没有就调用第一个图片附件 
    else if ($attach && $attach->isImage) {
		echo $attach->url;
	}
    //如果是内联式markdown格式的图片 
    else if (preg_match_all($patternMD, $widget->content, $thumbUrl)) {
		echo $thumbUrl[1][$imgnum];
	}
    //如果是脚注式markdown格式的图片 
    else if (preg_match_all($patternMDfoot, $widget->content, $thumbUrl)) {
		echo $thumbUrl[1][$imgnum];
	}
    //如果真的没有图片，就调用一张随机图片 
    else {
		echo $random;
	}
}
//获取Gravatar头像 QQ邮箱取用qq头像
function getGravatar($email, $s = 96, $d = 'mp', $r = 'g', $img = false, $atts = array()) {
	preg_match_all('/((\d)*)@qq.com/', $email, $vai);
	if (empty($vai['1']['0'])) {
		$url = 'https://cdn.v2ex.com/gravatar/';
		$url .= md5(strtolower(trim($email)));
		$url .= "?s=$s&d=$d&r=$r";
		if ($img) {
			$url = '<img src="' . $url . '"';
			foreach ($atts as $key => $val) {
				$url .= ' ' . $key . '="' . $val . '"';
			}
			$url .= ' />';
		}
	} else {
		$url = 'https://q2.qlogo.cn/headimg_dl?dst_uin=' . $vai['1']['0'] . '&spec=100';
	}
	return $url;
}
/**
    * 预处理文本内容，实现自定义markdown解析
    */
function PreprocessTextContent($article) {
	// 灯箱效果实现
	$img_replacement = '<a href="$1" data-fancybox="gallery" /><img src="$1" alt="' . $article->title . '"
        title="点击放大图片"></a>';
	$content = preg_replace('/\<img.*?src\=\"(.*?)\"[^>]*>/i', $img_replacement, $article->content);
	// 按钮样式解析--这么做是为了兼容handsome格式文章的迁移！
	$btn_pattern =
	        '/\[button.*?color\=\"(.*?)\".*?icon\=\"(.*?)\".*?url\=\"(.*?)\".*?type\=\"(.*?)\"[^>]*](.*)\[\/button\]/i';
	if (preg_match_all($btn_pattern, $content, $button)) {
	}
	echo parseContentPublic($content);
}
function parseContentPublic($content) {
	// $options = mget();
	// //解析文章中的表情短代码
	// $content = Utils::handle_preg_replace_callback('/::([^:\s]*?):([^:\s]*?)::/sm',
	// array('Content','emojiParseCallback'),
	// $content);
	// //解析markdown扩展语法
	// if ($options->markdownExtend != "" && in_array('scode', $options->markdownExtend)) {
	// $content = Utils::handle_preg_replace_callback("/(@|√|!|x|i)&gt;\s(((?!<\ /p>).)*)(<br \ />|<\ /p>)/is",
	//         array('Content', 'sCodeMarkdownParseCallback'), $content);
	//         }
	//         //解析拼音注解写法
	//         if ($options->markdownExtend != "" && in_array('pinyin', $options->markdownExtend)) {
	//         $content = Utils::handle_preg_replace('/\{\{\s*([^\:]+?)\s*\:\s*([^}]+?)\s*\}\}/is',
	//         "<ruby>$1<rp> (</rp>
	//             <rt>$2</rt>
	//             <rp>) </rp>
	//         </ruby>", $content);
    //         }
    require_once 'Utils.php';
	$utils = new Utils();
	//解析短代码功能
	if (strpos($content, '[scode') !== false) {
		//提高效率，避免每篇文章都要解析
		$pattern = get_shortcode_regex(array('scode'));
		$content = $utils->handle_preg_replace_callback("/$pattern/", array('self', 'scodeParseCallback'),
		        $content);
	}
	//解析显示按钮短代码
	if (strpos($content, '[button') !== false) {
		//提高效率，避免每篇文章都要解析
		$pattern = get_shortcode_regex(array('button'));
		$content = $utils->handle_preg_replace_callback("/$pattern/", array('self', 'parseButtonCallback'),
		                $content);
	}
	return $content;
}
/**
     * 获取匹配短代码的正则表达式
     * @param null $tagnames
     * @return string
     * @link https://github.com/WordPress/WordPress/blob/master/wp-includes/shortcodes.php#L254
     */
function get_shortcode_regex($tagnames = null) {
	global $shortcode_tags;
	if (empty($tagnames)) {
		$tagnames = array_keys($shortcode_tags);
	}
	$tagregexp = join('|', array_map('preg_quote', $tagnames));
	// WARNING! Do not change this regex without changing do_shortcode_tag() and strip_shortcode_tag()
	// Also, see shortcode_unautop() and shortcode.js.
	// phpcs:disable Squiz.Strings.ConcatenationSpacing.PaddingFound -- don't remove regex indentation
	return
	            '\\['                                // Opening bracket
	. '(\\[?)'                           // 1: Optional second opening bracket for escaping shortcodes: [[tag]]
	. "($tagregexp)"                     // 2: Shortcode name
	. '(?![\\w-])'                       // Not followed by word character or hyphen
	. '('                                // 3: Unroll the loop: Inside the opening shortcode tag
	. '[^\\]\\/]*'                   // Not a closing bracket or forward slash
	. '(?:'
	            . '\\/(?!\\])'               // A forward slash not followed by a closing bracket
	. '[^\\]\\/]*'               // Not a closing bracket or forward slash
	. ')*?'
	            . ')'
	            . '(?:'
	            . '(\\/)'                        // 4: Self closing tag ...
	. '\\]'                          // ... and closing bracket
	. '|'
	            . '\\]'                          // Closing bracket
	. '(?:'
	            . '('                        // 5: Unroll the loop: Optionally, anything between the opening and closing shortcode tags
	. '[^\\[]*+'             // Not an opening bracket
	. '(?:'
	            . '\\[(?!\\/\\2\\])' // An opening bracket not followed by the closing shortcode tag
	. '[^\\[]*+'         // Not an opening bracket
	. ')*+'
	            . ')'
	            . '\\[\\/\\2\\]'             // Closing shortcode tag
	. ')?'
	            . ')'
	            . '(\\]?)';
	// 6: Optional second closing brocket for escaping shortcodes: [[tag]]
	// phpcs:enable
}
function handleHtml($content, $callback) {
	$replaceStartIndex = array();
	$replaceEndIndex = array();
	$currentReplaceId = 0;
	$replaceIndex = 0;
	$searchIndex = 0;
	$searchCloseTag = false;
	$contentLength = strlen($content);
	while (true) {
		if ($searchCloseTag) {
			$tagName = substr($content, $searchIndex, 4);
			if ($tagName == "<cod") {
				$searchIndex = strpos($content, '</code>', $searchIndex);
				if (!$searchIndex) {
					break;
				}
				$searchIndex += 7;
			} elseif ($tagName == "<pre") {
				$searchIndex = strpos($content, '</pre>', $searchIndex);
				if (!$searchIndex) {
					break;
				}
				$searchIndex += 6;
			} elseif ($tagName == "<kbd") {
				$searchIndex = strpos($content, '</kbd>', $searchIndex);
				if (!$searchIndex) {
					break;
				}
				$searchIndex += 6;
			} elseif ($tagName == "<scr") {
				$searchIndex = strpos($content, '</script>', $searchIndex);
				if (!$searchIndex) {
					break;
				}
				$searchIndex += 9;
			} elseif ($tagName == "<sty") {
				$searchIndex = strpos($content, '</style>', $searchIndex);
				if (!$searchIndex) {
					break;
				}
				$searchIndex += 8;
			} else {
				break;
			}
			if (!$searchIndex) {
				break;
			}
			$replaceIndex = $searchIndex;
			$searchCloseTag = false;
			continue;
		} else {
			$searchCodeIndex = strpos($content, '<code', $searchIndex);
			$searchPreIndex = strpos($content, '<pre', $searchIndex);
			$searchKbdIndex = strpos($content, '<kbd', $searchIndex);
			$searchScriptIndex = strpos($content, '<script', $searchIndex);
			$searchStyleIndex = strpos($content, '<style', $searchIndex);
			if (!$searchCodeIndex) {
				$searchCodeIndex = $contentLength;
			}
			if (!$searchPreIndex) {
				$searchPreIndex = $contentLength;
			}
			if (!$searchKbdIndex) {
				$searchKbdIndex = $contentLength;
			}
			if (!$searchScriptIndex) {
				$searchScriptIndex = $contentLength;
			}
			if (!$searchStyleIndex) {
				$searchStyleIndex = $contentLength;
			}
			$searchIndex = min($searchCodeIndex, $searchPreIndex, $searchKbdIndex, $searchScriptIndex, $searchStyleIndex);
			$searchCloseTag = true;
		}
		$replaceStartIndex[$currentReplaceId] = $replaceIndex;
		$replaceEndIndex[$currentReplaceId] = $searchIndex;
		$currentReplaceId++;
		$replaceIndex = $searchIndex;
	}
	$output = "";
	$output .= substr($content, 0, $replaceStartIndex[0]);
	for ($i = 0; $i < count($replaceStartIndex); $i++) {
		$part = substr($content, $replaceStartIndex[$i], $replaceEndIndex[$i] - $replaceStartIndex[$i]);
		if (is_array($callback)) {
			$className = $callback[0];
			$method = $callback[1];
			$renderedPart = call_user_func($className.'::'.$method, $part);
		} else {
			$renderedPart = $callback($part);
		}
		$output.= $renderedPart;
		if ($i < count($replaceStartIndex) - 1) {
			$output.= substr($content, $replaceEndIndex[$i], $replaceStartIndex[$i + 1] - $replaceEndIndex[$i]);
		}
	}
	$output .= substr($content, $replaceEndIndex[count($replaceStartIndex) - 1]);
	return $output;
}
function handle_preg_replace_callback($pattern, $callback, $subject) {
	return handleHtml($subject,function ($content) use ($callback, $pattern) {
		return preg_replace_callback($pattern,$callback, $content);
	}
	);
}