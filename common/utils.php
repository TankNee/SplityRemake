<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}

class Utils
{
    /**
     * @link https://github.com/WordPress/WordPress/blob/master/wp-includes/shortcodes.php#L508
     */
    public static function shortcode_parse_atts($text)
    {
        $atts = array();
        $pattern = self::get_shortcode_atts_regex();
        $text = preg_replace("/[\x{00a0}\x{200b}]+/u", ' ', $text);
        if (preg_match_all($pattern, $text, $match, PREG_SET_ORDER)) {
            foreach ($match as $m) {
                if (!empty($m[1])) {
                    $atts[strtolower($m[1])] = stripcslashes($m[2]);
                } elseif (!empty($m[3])) {
                    $atts[strtolower($m[3])] = stripcslashes($m[4]);
                } elseif (!empty($m[5])) {
                    $atts[strtolower($m[5])] = stripcslashes($m[6]);
                } elseif (isset($m[7]) && strlen($m[7])) {
                    $atts[] = stripcslashes($m[7]);
                } elseif (isset($m[8]) && strlen($m[8])) {
                    $atts[] = stripcslashes($m[8]);
                } elseif (isset($m[9])) {
                    $atts[] = stripcslashes($m[9]);
                }
            }
            // Reject any unclosed HTML elements
            foreach ($atts as &$value) {
                if (false !== strpos($value, '<')) {
                    if (1 !== preg_match('/^[^<]*+(?:<[^>]*+>[^<]*+)*+$/', $value)) {
                        $value = '';
                    }
                }
            }
        } else {
            $atts = ltrim($text);
        }
        return $atts;
    }
    public static function get_shortcode_atts_regex()
    {
        return '/([\w-]+)\s*=\s*"([^"]*)"(?:\s|$)|([\w-]+)\s*=\s*\'([^\']*)\'(?:\s|$)|([\w-]+)\s*=\s*([^\s\'"]+)(?:\s|$)|"([^"]*)"(?:\s|$)|\'([^\']*)\'(?:\s|$)|(\S+)(?:\s|$)/';
    }
    /**
     * 
     * @param $matches
     * @return bool|string
     */
    public static function parseButtonCallback($matches)
    {
        if ($matches[1] == '[' && $matches[6] == ']') {
            return substr($matches[0], 1, -1);
        }
        $attr = htmlspecialchars_decode($matches[3]);
        $attrs = self::shortcode_parse_atts($attr);
        $color = "primary";
        $linkUrl = "";
        if (@$attrs['url'] != "") {
            $linkUrl = 'window.open("' . $attrs['url'] . '","_blank")';
        }
        if (@$attrs['color'] != "") {
            $color = $attrs['color'];
        }

        return <<<EOF
<button class="btn m-b-xs btn-{$color} " onclick='{$linkUrl}'>{$matches[5]}</button>
EOF;
    }
    public static function parseScodeCallback($matches)
    {
        // 判断[]内的字符串数量
        if ($matches[1] == '[' && $matches[6] == ']') {
            return substr($matches[0], 1, -1);
        }
        $attr = htmlspecialchars_decode($matches[3]);
        $attrs = self::shortcode_parse_atts($attr);
        $type = "info";
        // 判断type类型
        switch ($attrs['type']) {
            case 'yellow':
                $type = "warning";
                break;
            case 'red':
                $type = "error";
                break;
            case 'blue':
                $type = "info";
                break;
            case 'green':
                $type = "success";
                break;
            case 'share':
                $type = "share";
                break;
        }
        return '<div class="tip inlineBlock ' . $type . '">' . $matches[5] . '</div>';
    }
    public static function parseLinkCallback($matches)
    {
        // 判断[]内的字符串数量
        if ($matches[1] == '[' && $matches[5] == ']') {
            return substr($matches[0], 1, -1);
        }
        $attr = htmlspecialchars_decode($matches[3]);
        $attrs = self::shortcode_parse_atts($attr);
        $url = $attrs['url'];
        $img = $attrs['img'];
        $des = $attrs['des'];
        return '<div class="Link_Box">
                    <li>
                        <a class="mc-link" href="' . $url . '" target="_blank" title="' . $matches[5] . '">
                            <img src="' . $img . '">
                            <h4 id="toc_0">' . $matches[5] . '</h4>
                            <p>' . $des . '</p>
                        </a>
                    </li>
                </div>';
        // return '<div class="tip inlineBlock">' . $matches[5] . '</div>';
    }
}