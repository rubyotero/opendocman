<?php /* Smarty version 2.6.26, created on 2014-01-23 12:08:46
         compiled from ../../templates/common/_filePermissions.tpl */ ?>
<?php echo '
<style>
.accordion {
   margin: 10px;   
   dt, dd {
      padding: 10px;
      border: 1px solid black;
      border-bottom: 0; 
      &:last-of-type {
        border-bottom: 1px solid black; 
      }
      a {
        display: block;
        color: black;
        font-weight: bold;
      }
   }
  dd {
     border-top: 0; 
     font-size: 12px;
     &:last-of-type {
       border-top: 1px solid white;
       position: relative;
       top: -1px;
     }
  }
}
</style>
'; ?>


<dl class="accordion">
    <dt><a href="">Edit Department Permissions</a></dt>
    <dd>
        <table id="department_permissions_table" class="display">
            <thead>
                <tr>
                    <td>Department</td>
                    <td>Forbidden</td>
                    <td>None</td>
                    <td>View</td>
                    <td>Read</td>
                    <td>Write</td>
                    <td>Admin</td>
                </tr>
            </thead>
            <tbody>
                <?php $_from = $this->_tpl_vars['avail_depts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dept']):
?>
                    <?php if ($this->_tpl_vars['dept']['selected'] == 'selected'): ?>
                        <?php $this->assign('selected', "checked='checked'"); ?>
                    <?php else: ?>
                        <?php $this->assign('noneselected', "checked='checked'"); ?>
                    <?php endif; ?>
                <tr>
                    <td><?php echo $this->_tpl_vars['dept']['name']; ?>
</td>
                    <td><input type="radio" name="department_permission[<?php echo $this->_tpl_vars['dept']['id']; ?>
]" value="-1" <?php if ($this->_tpl_vars['dept']['rights'] == '-1'): ?>checked="checked"<?php endif; ?> /></td>
                    <td><input type="radio" name="department_permission[<?php echo $this->_tpl_vars['dept']['id']; ?>
]" value="0" <?php if ($this->_tpl_vars['dept']['rights'] == '0'): ?>checked="checked"<?php endif; ?> <?php echo $this->_tpl_vars['noneselected']; ?>
/></td>
                    <td><input type="radio" name="department_permission[<?php echo $this->_tpl_vars['dept']['id']; ?>
]" value="1" <?php if ($this->_tpl_vars['dept']['rights'] == 1): ?>checked="checked"<?php endif; ?> <?php echo $this->_tpl_vars['selected']; ?>
 /></td>
                    <td><input type="radio" name="department_permission[<?php echo $this->_tpl_vars['dept']['id']; ?>
]" value="2" <?php if ($this->_tpl_vars['dept']['rights'] == 2): ?>checked="checked"<?php endif; ?> /></td>
                    <td><input type="radio" name="department_permission[<?php echo $this->_tpl_vars['dept']['id']; ?>
]" value="3" <?php if ($this->_tpl_vars['dept']['rights'] == 3): ?>checked="checked"<?php endif; ?> /></td>
                    <td><input type="radio" name="department_permission[<?php echo $this->_tpl_vars['dept']['id']; ?>
]" value="4" <?php if ($this->_tpl_vars['dept']['rights'] == 4): ?>checked="checked"<?php endif; ?> /></td>
                </tr>
                    <?php $this->assign('selected', ""); ?>
                <?php endforeach; endif; unset($_from); ?>       
            </tbody>
        </table>
    </dd>
    <dt><a>Edit User Permissions</a></dt>
    <dd>
        <table id="user_permissions_table" class="display">
            <thead>
                <tr>
                    <td>Department</td>
                    <td>Forbidden</td>
                    <td>View</td>
                    <td>Read</td>
                    <td>Write</td>
                    <td>Admin</td>
                </tr>
            </thead>
            <tbody>
                <?php $_from = $this->_tpl_vars['avail_users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
                <?php if ($this->_tpl_vars['user']['rights'] == ''): ?>
                    <?php $this->assign('selected', "checked='checked'"); ?>
                <?php endif; ?> 

                <tr>
                    <td><?php echo $this->_tpl_vars['user']['last_name']; ?>
, <?php echo $this->_tpl_vars['user']['first_name']; ?>
</td>
                    <td><input type="radio" name="user_permission[<?php echo $this->_tpl_vars['user']['id']; ?>
]" value="-1" <?php if ($this->_tpl_vars['user']['rights'] == '-1'): ?>checked="checked"<?php endif; ?> /></td>
                    <td><input type="radio" name="user_permission[<?php echo $this->_tpl_vars['user']['id']; ?>
]" value="1" <?php if ($this->_tpl_vars['user']['rights'] == 1): ?>checked="checked"<?php endif; ?> /></td>
                    <td><input type="radio" name="user_permission[<?php echo $this->_tpl_vars['user']['id']; ?>
]" value="2" <?php if ($this->_tpl_vars['user']['rights'] == 2): ?>checked="checked"<?php endif; ?> /></td>
                    <td><input type="radio" name="user_permission[<?php echo $this->_tpl_vars['user']['id']; ?>
]" value="3" <?php if ($this->_tpl_vars['user']['rights'] == 3): ?>checked="checked"<?php endif; ?> /></td>
                    <td><input type="radio" name="user_permission[<?php echo $this->_tpl_vars['user']['id']; ?>
]" value="4" <?php if ($this->_tpl_vars['user']['rights'] == 4 || ( $this->_tpl_vars['user']['id'] == $this->_tpl_vars['user_id'] && $this->_tpl_vars['user']['rights'] == '' )): ?>checked="checked"<?php endif; ?> /></td>
                </tr>
                <?php endforeach; endif; unset($_from); ?>       
            </tbody>
        </table>
    </dd>
</dl>
<?php echo '
<script>
    $(document).ready(function() {
        
        (function($) {

            var allPanels = $(\'.accordion > dd\').hide();
            
            $(\'.accordion > dt > a\').click(function() {
                allPanels.slideUp();
                $(this).parent().next().slideDown();
                return false;
                });

         })(jQuery);
         
        $(\'#department_permissions_table\').dataTable(
        {
            "bAutoWidth": false
        });
        
         $(\'#user_permissions_table\').dataTable(
        {
            "bAutoWidth": false
        });
    
    } );
</script>
'; ?>
