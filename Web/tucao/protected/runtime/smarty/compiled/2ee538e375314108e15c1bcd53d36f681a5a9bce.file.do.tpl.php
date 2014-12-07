<?php /* Smarty version Smarty-3.1.13, created on 2014-12-07 10:23:25
         compiled from "/Users/gongchen/Project/tucao/Web/Tucao/protected/views/test/do.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7100498145483ba1d062046-78058763%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ee538e375314108e15c1bcd53d36f681a5a9bce' => 
    array (
      0 => '/Users/gongchen/Project/tucao/Web/Tucao/protected/views/test/do.tpl',
      1 => 1417045002,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7100498145483ba1d062046-78058763',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Yii' => 0,
    'url_prefix' => 0,
    'link_prefix' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5483ba1d095c55_98789747',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5483ba1d095c55_98789747')) {function content_5483ba1d095c55_98789747($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['url_prefix'] = new Smarty_variable($_smarty_tpl->tpl_vars['Yii']->value->params['url_prefix'], null, 0);?>
<?php $_smarty_tpl->tpl_vars['link_prefix'] = new Smarty_variable($_smarty_tpl->tpl_vars['Yii']->value->params['link_prefix'], null, 0);?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url_prefix']->value;?>
js/jquery-2.0.0.min.js"></script>
    <script type="text/javascript">
        $.__url_prefix__ = "<?php echo $_smarty_tpl->tpl_vars['url_prefix']->value;?>
";
        $.__link_prefix__ = "<?php echo $_smarty_tpl->tpl_vars['link_prefix']->value;?>
";
        $.log = function(msg) {
            console.log(msg);
        }
    </script>

    <title><?php echo $_smarty_tpl->tpl_vars['Yii']->value->name;?>
</title>
</head>

<body>


    <script type="text/javascript">

        function submit(type) {
            var url = $("#txtUrl").val().trim();
            if(url==="") {
                return;
            }
            if(/^\//.test(url)) {
                url = url.substr(1);
            }
            url = $.__link_prefix__ + url;
            var fd = new FormData();
            $("#table tr").each(function() {
                var _t = $(this);
                var _p = _t.find(".param").val().trim(), _vd, _v;
                if(_p==="") {
                    return;
                }
                _vd = _t.find(".value");
                if(_vd[0].type==='file' && _vd[0].files.length>0) {

                    _v = _vd[0].files[0];
                } else {
                    _v = _vd.val();
                }
                // $.log(_v);
                fd.append(_p, _v);
            });
            if(fd.length==0) {
                return;
            }
            if(type === 'ajax') {
                $.ajax({
                    url: url,
                    type : 'post',
                    data: fd,
                    contentType: false,
                    processData:false,
                    success : function(rtn) {
                        $("#output").html(rtn);
                    }
                });
            }
        }

        $(function() {
            $("#btnAdd").click(function() {
                var i = $("#table tr:first").clone().appendTo($("#table"));
                i.find(".value").val("")[0].type="text";
                i.find(".param").val("");
            });
            $("#btnSubmit").click(function() {
                submit("ajax");
            });
            $("#table").on("click", ".op_del", function() {
                var ts = $("#table tr");
                if(ts.length>1) {
                    $(this).parents("tr").remove();
                } else {
                    ts.find(".value")[0].type = "text";
                    ts.find("input").val("");
                }
            }).on("change", ".param", function() {
                var _t = $(this), _v = _t.val().trim();
                if(_v==='file' || /^file/i.test(_v)) {
                    _t.parents("tr").find(".value")[0].type = "file";
                } else if(_v==='time') {
                    _t.parents("tr").find(".value").val(Math.round(new Date().getTime()/1000));
                }
            });

            $("#btnSubmit2").click(function() {

            });
        });
    </script>



<table>
    <thead>
    <tr>
        <th>参数</th>
        <th>值</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody id="table">
    <tr>
        <td><input class="param" ></td>
        <td><input class="value" ></td>
        <td><a class="op_del" href="javascript:;">删除</a></td>
    </tr>
    </tbody>
</table>
<p>URL: <input type="text" id="txtUrl"><input type="button" value="添加" id="btnAdd" />
    <input type="button" id="btnSubmit" value="提交"><input type="button" id="btnSubmit2" value="页面提交">
</p>
<div id="output">

</div>

</body>
</html>
<?php }} ?>