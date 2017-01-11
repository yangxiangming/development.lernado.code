<?php
/**
 * author yangxiangming@live.com
 * description 分页类文件 2013/12/11
 */
class core_libs_paging {

    /**
     * description 分页基础参数
     */
    public static $paging_count = null;
    public static $paging_num = 5;
    public static $paging_start = 0;
    public static $paging_size = 10;
    public static $paging_list = array ();
    
    /**
     * description 分页 
     * param $paging_count(数据总记录数) | int $paging_num(显示几个分页页码) | int $paging_start(当前记录数) | int $paging_size(每页记录数) | string $paging_url(分页url)
     */
    public static function get_paging($paging_count, $paging_num = null, $paging_start = null, $paging_size = null, $paging_url = null) {
        
        /** 分页处理逻辑 */
        $pagestart = empty ( $paging_start ) ? self::$paging_start : $paging_start;
        $pagesize = empty ( $paging_size ) ? self::$paging_size : $paging_size;
        if (empty ( $paging_start )) {
            $offset = $pagestart;
        } else {
            $offset = $pagesize * ($pagestart - 1);
        }
        self::$paging_list ['offset'] = $offset;
        
        /** 分页页码显示逻辑 */
        $num = $pages = ceil ( $paging_count / $pagesize );
        if ($pagestart > $pages) {
            $pagestart = $pages;
        }
        if ($pagestart < 1) {
            $pagestart = 1;
        }
        $prev = $pagestart - 1;
        if ($prev < 1) {
            $prev = 1;
        }
        $next = $pagestart + 1;
        if ($next > $pages) {
            $next = $pages;
        }
        
        /** 页码格式显示逻辑，始终显示5个页码 */
        $pagenum = empty ( $paging_num ) ? self::$paging_num : $paging_num;
        $pageoffset = ($pagenum - 1) / 2;
        if ($pages <= $pagenum) {
            $p = 1;
        } else {
            if (($pagestart - $pageoffset) <= 1) {
                $p = 1;
            } elseif (($pagestart + $pageoffset) > $pages) {
                $p = $pages - $pagenum + 1;
            } else {
                $p = $pagestart - $pageoffset;
            }
            $pages = $p + $pagenum - 1;
        }
        
        /** 分页显示逻辑 - 判断是否为首页 | 上一页 */
        $paging_html = '<div class="pagination"><a id="boder-clear">记录数：' . $paging_count . ' | 页码数：' . $num . '</a><ul>';
        if ($paging_start == 0) {
            $paging_html .= '<li><a>l&lt;</a></li><li><a>&lt;&lt;</a></li>';
        } else {
            $paging_html .= '<li><a href="' . $paging_url . '&p=0">l&lt;</a></li>';
            $paging_html .= '<li><a href="' . $paging_url . '&p=' . $prev . '">&lt;&lt;</a></li>';
        }
        
        /** 分页显示逻辑 - 计算当前页 */
        for($i = $p; $i <= $pages; $i ++) {
            if ($i == $pagestart) {
                $paging_html .= '<li  class="active"><a>' . $i . '</a></li>';
            } else {
                $paging_html .= '<li><a href="' . $paging_url . '&p=' . $i . '">' . $i . '</a></li>';
            }
        }
        
        /** 分页显示逻辑 - 判断是否为尾页 | 下一页 */
        if ($paging_start == $num) {
            $paging_html .= '<li><a>&gt;&gt;</a></li><li><a>&gt;l</a></li>';
        } else {
            $paging_html .= '<li><a href="' . $paging_url . '&p=' . $next . '">&gt;&gt;</a></li>';
            $paging_html .= '<li><a href="' . $paging_url . '&p=' . $num . '">&gt;l</a></li>';
        }
        $paging_html .= '</ul></div>';
        self::$paging_list ['paginghtml'] = $pages > 1 ? $paging_html : '';
        return self::$paging_list;
    }
    
}
