<?php
/**
 * Created by PhpStorm.
 * User: Lm
 * Date: 2018/3/8
 * Time: 11:26
 */
define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

require(ROOT_PATH . 'languages/' .$_CFG['lang']. '/admin/nowinquiry.php');
$smarty->assign('lang', $_LANG);
if (!empty($_REQUEST['act']) && $_REQUEST['act'] == 'list')
{
    //ini_set('display_errors',1);
    /* 检查权限 */
    //admin_priv('nowinquiry');

    //查询所有询价信息
    $nowinquiry_list = nowinquiry_list();
    //var_dump($nowinquiry_list);die;
    $smarty->assign('nowinquiry_list',$nowinquiry_list);
    /* 载入订单状态、付款状态、发货状态 */

    $smarty->assign('full_page',    1);
    /* 模板赋值 */
    $smarty->assign('ur_here', $_LANG['nowinquiry_list']);

    /* 显示模板 */
    assign_query_info();
    $smarty->assign('nowinquiry_list', $nowinquiry_list['list']);
    $smarty->assign('filter', $nowinquiry_list['filter']);
    $smarty->assign('record_count', $nowinquiry_list['record_count']);
    $smarty->assign('page_count', $nowinquiry_list['page_count']);
    $smarty->display('nowinquiry_list.htm');
}

/* ------------------------------------------------------ */
// -- ajax返回询价列表
/* ------------------------------------------------------ */
elseif (!empty($_REQUEST['act']) && $_REQUEST['act'] == 'query')
{
    $smarty = $GLOBALS['smarty'];
    $nowinquiry_list = nowinquiry_list();
    //echo '<pre>';print_r($nowinquiry_list);die;
    $smarty->assign('nowinquiry_list', $nowinquiry_list['list']);
    $smarty->assign('filter', $nowinquiry_list['filter']);
    $smarty->assign('record_count', $nowinquiry_list['record_count']);
    $smarty->assign('page_count', $nowinquiry_list['page_count']);

    //$smarty->assign('full_page', $user_list['filter']['page']);

    make_json_result($smarty->fetch('nowinquiry_list.htm'), '', array(
        'filter' => $nowinquiry_list['filter'],'page_count' => $nowinquiry_list['page_count']
    ));
}

/* ------------------------------------------------------ */
// -- 修改商品询价状态
/* ------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'toggle_status')
{
    //check_authz_json('goods_manage');

    $id       = intval($_POST['id']);
    $status = intval($_POST['val']);

    $sql = "UPDATE nowinquiry set status = ".$status." where id = ".$id;

    if ($GLOBALS['db']->query($sql))
    {
        clear_cache_files();
        make_json_result($status);
    }
}

/**
 * 获得询价 列表aaa
 *
 * @access  public
 * @params  integer $isdelete
 * @params  integer $real_goods
 * @params  integer $conditions
 * @return  array
 */
function nowinquiry_list()
{
    $result = get_filter();
    if ($result === false)
    {
        $filter['tel']       = empty($_REQUEST['tel']) ? 0 : $_REQUEST['tel'];
        $filter['status']    = empty($_REQUEST['status']) ? 0 : intval($_REQUEST['status']);

        $where = 1;
        if($filter['tel'] != '')
        {
            $where .= " and n.tel like '%".$filter['tel']."%'";
        }
        if($filter['status'] != '-1' && $filter['status'] != '')
        {
            $where .= " and n.status = ".$filter['status'];
        }
        /* 记录总数 */
        $sql = "SELECT COUNT(*) FROM nowinquiry AS n
            left join ". $GLOBALS['ecs']->table('users') ." as u on n.user_id = u.user_id
            left join ". $GLOBALS['ecs']->table('supplier') ." as s on n.supplier_id = s.supplier_id
            left join ". $GLOBALS['ecs']->table('goods') ." as g on n.good_id = g.goods_id where " . $where .
            " ORDER BY priority desc";

        $filter['record_count'] = $GLOBALS['db']->getOne($sql);

        /* 分页大小 */
        $filter = page_and_size($filter);

        $sql = "SELECT u.user_name, g.goods_name, s.supplier_name, n.id, n.tel, n.date, n.status FROM nowinquiry AS n
            left join ". $GLOBALS['ecs']->table('users') ." as u on n.user_id = u.user_id
            left join ". $GLOBALS['ecs']->table('supplier') ." as s on n.supplier_id = s.supplier_id
            left join ". $GLOBALS['ecs']->table('goods') ." as g on n.good_id = g.goods_id where " .$where.
            " ORDER BY priority desc".
            " LIMIT " . $filter['start'] . ",$filter[page_size]";

        set_filter($filter, $sql);
    }
    else
    {
        $sql    = $result['sql'];
        $filter = $result['filter'];
    }
    //return $sql;
    $row = $GLOBALS['db']->getAll($sql);

    /* 代码增加 By  www.68ecshop.com End */
    foreach($row as $k=>$v){
        $row[$k]['date'] = date('Y-m-d H:i:s',$v['date']);
    }
    return array('list' => $row, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
}

