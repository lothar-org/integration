Smarty 3.1

1����ʼ��
require 'Smarty.class.php';
$smarty = new Smarty();
//Smarty�Ա�ھ���������������
// ������
$smarty->left_delimiter = '{';// �󶨽��
$smarty->right_delimiter = '}';// �Ҷ����
$smarty->template_dir = 'tpl';// htmlģ���ַ
$smarty->compile_dir = 'template_c';// ģ��������ɵ��ļ�������php�ű�����ģ�
$smarty->cache_dir = 'cache';// ���棨���ݿ��ѯ����ʱ���ݣ�
// �����ǿ��������������Ҫ���á�ͨ������smarty�Ļ�����ơ�
// $smarty->caching = true;// ��������
// $smarty->cache_lifetime = 60;//����ʱ��
// ������
$smarty->assign('str','str');
$smarty->assign('arr',array('name'=>'lothar','age'=>12));
$smarty->assign('arr3',array(array(10,20),2));
$smarty->display('sm.htm');
// HTML �ļ�
sm.htm
{$str}
{$arr.name}	{$arr.age}
{$arr['name']}	{$arr[age]}
{$arr3[0][1]}  {$arr3[1]}


2��ע��
{*ע��*}

3������������
(1)����ĸ��д
    {$title|capitalize}
(2)�ַ���ƴ�� cat
    {$title|cat:" ok."}
(3)���ڸ�ʽ�� date_format	�о��治��php��date()����
    {$date|date_format}
    {$date|date_format:" :"%A,%B %e,%Y %H:%M:%S"}
    {$date|date_format:"%A,%B %e,%Y %H:%M:%S"}
    {$date|date_format:"%H:%M:%S"}
    {$date|date_format:":"%Y-%m-%d %H:%M:%S"}
    %Y��%B��%e��%Hʱ%M��%S��
    %Yʮ�����꣬%mʮ�����£�%dʮ�����գ�%Hʮ����ʱ��%Mʮ���Ʒ֣�%Sʮ���Ƶ��롣ע���Сд
    ��PHP�е� strftime()������������ͬ
(4)����ֵΪ empty ʱΪ������Ĭ��ֵ default
    {$title|default:'no title'}
��5��ת��escape
    ����htmlת�룬urlת�룬��û��ת��ı�����ת�������ţ�ʮ������ת�룬ʮ����������������JavaScriptת�롣Ĭ����htmlת�롣
��6��Сдlower ��дupper
    {$title|lower}	{$title|upper}
��7�����еĻ��з������滻��<br> nl2br����ͬPHP��nl2br()����һ��
    {$title|nl2br}
��8��
��9��
    ԭ��������smarty���������磺
    Wordwrap�п�ʹ��css��ʽ�����
    truncate��ȡ����php������css��ʽ�����

4�������ж�
��1��������ʽ
    {if $a eq 1}
    {elseif $a eq 2}
    {else}
    {/if}
��2���������η�
    eq	==
    neq	!=
    gt	>
    lt	<
��3�����η��������ҿո�

5��ѭ������
��1��section,sectionelse ���ܶ࣬������
    �������ԣ�
    name	
    loop	
    start	ѭ��ִ�еĳ�ʼλ�ã�������ʾ��ĩβ����
    step	ѭ��������step=2,��ֻ�����±�Ϊ0,2,4
    max	���ѭ������
    show	�Ƿ���ʾ��ѭ��
    {section loop=$lists name=user}
        {$lists[user].id}
        {$lists[user].name}
    {sectionelse}
        ���ޡ���
    {/section}
��2��foreach,foreachelse ����php��д��
    {foreach from=$arr key=k item=v}
        {$v.id}
        {$v.name}
    {foreachelse}
        ���ޡ���
    {/foreach}
    // Smarty3.0��д��
    {foreach $arr as $v}{/foreach}

6���ļ����ã����Ը����Զ������
    include 
    {include file='header,tpl'}
    {include file='header,tpl' sn='into header'}
    // ��header.tpl �ļ���
    {$sn}

7���������ĸ�ֵ��ʹ��
    ��ĵ��÷�����
    ��1��register_object����Smarty3.0���ѷϳ�
    ��2����assign��ֵ�ࡢ����
    $myobj = new Obj();
    $smarty->assign('myobj',$myobj);
    {$myobj->method()}

8��ʹ��php���ú������Զ��庯��,
    ��1��PHP������|ǰ�����ǵ�һ��������|�����php������:��ӵڶ������������ġ���������ÿ������ǰ��:��
    $smarty->assign('time',time());
    ����д����{$time|date:"Y-m-d"}
    ��ȷд����{"Y-m-d"|date:$time}
    {'search'|str_replace:'replace':$str}
��2���Զ��� registerPlugin('������','��smarty�����','php��ĺ�����')
    function test($params){
        print_r($params);die;
        $p1 = 'p1='.$params['p1'];
        $p2 = 'p2='.$params['p2'];
        // echo $p1.'��'.$p2;
        return $p1.'��'.$p2;
    }
    $smarty->registerPlugin('function','f','test');
    {f p1='a' p2='B'}

9��Smarty���  ����������ظ�
��1��function �������
��2��modifiers ���β��
��3��block function ���麯�����
ʹ�ã�
��1��ʹ��registerPlugin
��2��php���ú���
��3��д�ò������Smarty��libĿ¼�µ�plugin��
    <?php
    function smarty_function_test($params){
        $a = $params['a'];
        $b = $params['b'];
        return $a*$b;
    }
    ?>
    {test a=1 b=2}
    <?php
    function smarty_modifier_test($a,$b='Y-m-d H:i:s'){
        return date($b,$a);
    }
    ?>
    {$time|test:'Y-m-d'}
    <?php
    function smarty_block_test($params,$str){
        $r = $params['r'];
        $max = $params['max'];
        if($r){
            $str = str_replace('��',',',$str);
            $str = str_replace('��','.',$str);
        }
        return substr($str,0,$max);
    }
    ?>
    {test r='true' max=2}
    {$str}
    {/test}

10�����Smarty���MVCʵ������
function.php�ļ�
/** ���õ��������
* $path ·��
* $name ����������
* $params ����
*/
function ORG($path, $name, $params=array()) {
    require_once('lib/ORG/'.$path.$name.'.class.php');
    // eval('$obj = new '.$name.'();');
    $obj = new $name();
    if(!empty($params)){
        foreach($params as $key=>$val){
            // eval('$obj->'.$key.'=\''.$val.'\';');
            $obj->$key = $val;
        }
    }
    return $obj;
}
�����ļ�
<?php
require_once 'function.php';
$view = ORG('Smarty/','Smarty',array('left_delimiter'=>'{','right_delimiter'=>'}','template_dir'=>'tpl','compile_dir'=>'template_c'));
$controller = $_GET['ctrl'];
$method = $_GET['mod'];
C($controller,$method);
?>


 
