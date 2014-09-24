<?php /* Smarty version 2.6.26, created on 2014-01-23 12:08:46
         compiled from /Users/rubyotero/sites/opendocman//templates/common/edit.tpl */ ?>


<script type="text/javascript" src="functions.js"></script>

<!-- file upload formu using ENCTYPE -->
<form name="main" action="<?php echo $_SERVER['PHP_SELF']; ?>
" method="POST" enctype="multipart/form-data" onsubmit="return checksec();">
    <input type="hidden" id="db_prefix" value="<?php echo $this->_tpl_vars['db_prefix']; ?>
" />
<table border="0" cellspacing="5" cellpadding="5">
<?php $this->assign('i', '0'); ?>    
<?php $_from = $this->_tpl_vars['t_name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop1']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name']):
        $this->_foreach['loop1']['iteration']++;
?>
    <input type="hidden" id="secondary<?php echo $this->_tpl_vars['i']; ?>
" name="secondary<?php echo $this->_tpl_vars['i']; ?>
" value="" /> <!-- CHM hidden and onsubmit added-->
    <input type="hidden" id="tablename<?php echo $this->_tpl_vars['i']; ?>
" name="tablename<?php echo $this->_tpl_vars['i']; ?>
" value="<?php echo $this->_tpl_vars['name']; ?>
" /> <!-- CHM hidden and onsubmit added-->
    <?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
<?php endforeach; endif; unset($_from); ?>
    <input type="hidden" id="id" name="id" value="<?php echo $this->_tpl_vars['file_id']; ?>
" />
    <input id="i_value" type="hidden" name="i_value" value="<?php echo $this->_tpl_vars['i']; ?>
" /> <!-- CHM hidden and onsubmit added-->
    <tr>
		<td><?php echo $this->_tpl_vars['g_lang_label_name']; ?>
</td>
		<td colspan="3"><b><?php echo $this->_tpl_vars['realname']; ?>
</b></td>
    </tr>
    
    <?php if ($this->_tpl_vars['is_admin'] == true): ?>
    <tr>

        <td>
            <?php echo $this->_tpl_vars['g_lang_editpage_assign_owner']; ?>

        </td>
        <td>
            <select name="file_owner">
            <?php $_from = $this->_tpl_vars['avail_users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
                <option value="<?php echo $this->_tpl_vars['user']['id']; ?>
" <?php if ($this->_tpl_vars['pre_selected_owner'] == $this->_tpl_vars['user']['id']): ?>selected='selected'<?php endif; ?>><?php echo $this->_tpl_vars['user']['last_name']; ?>
, <?php echo $this->_tpl_vars['user']['first_name']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
            </select>
        </td>
    </tr>

<?php endif; ?>

 <tr>
        <td>
            <?php echo $this->_tpl_vars['g_lang_editpage_assign_department']; ?>

        </td>
        <td>
               
            <select name="file_department">
            <?php $_from = $this->_tpl_vars['avail_depts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dept']):
?>
                <option value="<?php echo $this->_tpl_vars['dept']['id']; ?>
" <?php if ($this->_tpl_vars['pre_selected_department'] == $this->_tpl_vars['dept']['id']): ?>selected='selected'<?php endif; ?>><?php echo $this->_tpl_vars['dept']['name']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            <a class="body" href="help.html#Add_File_-_Category"  onClick="return popup(this, 'Help')" style="text-decoration:none"><?php echo $this->_tpl_vars['g_lang_category']; ?>
</a>
        </td>
        <td colspan=3>
            <select tabindex=2 name="category" >
            <?php $_from = $this->_tpl_vars['cats_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
                <option value="<?php echo $this->_tpl_vars['cat']['id']; ?>
" <?php if ($this->_tpl_vars['pre_selected_category'] == $this->_tpl_vars['cat']['id']): ?>selected='selected'<?php endif; ?>><?php echo $this->_tpl_vars['cat']['name']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
            </select>
        </td>
    </tr>
    <!-- Set Department rights on the file -->
    <tr id="departmentSelect">
        <td>
            <a class="body" href="help.html#Add_File_-_Department" onClick="return popup(this, 'Help')" style="text-decoration:none"><?php echo $this->_tpl_vars['g_lang_addpage_permissions']; ?>
</a>
        </td>
        <td colspan=3>
            <hr />
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../../templates/common/_filePermissions.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <hr />
        </td>
    </tr>
    <tr>
        <td>
            <a class="body" href="help.html#Add_File_-_Description" onClick="return popup(this, 'Help')" style="text-decoration:none"><?php echo $this->_tpl_vars['g_lang_label_description']; ?>
</a>
        </td>
        <td colspan="3"><input tabindex="5" type="Text" name="description" size="50" value="<?php echo $this->_tpl_vars['description']; ?>
"/></td>
    </tr>

    <tr>
        <td>
            <a class="body" href="help.html#Add_File_-_Comment" onClick="return popup(this, 'Help')" style="text-decoration:none"><?php echo $this->_tpl_vars['g_lang_label_comment']; ?>
</a>
        </td>
        <td colspan="3"><textarea tabindex="6" name="comment" rows="4" onchange="this.value=enforceLength(this.value, 255);"><?php echo $this->_tpl_vars['comment']; ?>
</textarea></td>
    </tr>