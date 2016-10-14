 <div class="panel_s todo-panel">
   <div class="panel-body padding-10">
      <p class="text-muted pull-left padding-5">
         <?php echo _l('home_my_todo_items'); ?>
      </p>
      <a href="<?php echo admin_url('todo'); ?>" class="pull-right mbot20"><?php echo _l('home_widget_view_all'); ?></a>
      <div class="clearfix"></div>
      <hr class="no-mtop">
      <?php $total_todos = count($todos); ?>
      <h4 class="todo-title text-warning"><i class="fa fa-warning"></i> <?php echo _l('home_latest_todos'); ?></h4>
      <ul class="list-unstyled todo unfinished-todos todos-sortable sortable">
         <?php foreach($todos as $todo) { ?>
            <li>
               <div class="dragger todo-dragger"></div>
               <?php echo form_hidden('todo_order',$todo['item_order']); ?>
               <?php echo form_hidden('finished',0); ?>
               <div class="checkbox checkbox-default todo-checkbox">
                  <input type="checkbox" name="todo_id" value="<?php echo $todo['todoid']; ?>">
                  <label></label>
               </div>
               <span class="todo-description"><?php echo $todo['description']; ?><a href="#" onclick="delete_todo_item(this,<?php echo $todo['todoid']; ?>)" class="pull-right text-muted"><i class="fa fa-remove"></i></a></span>
               <small class="todo-date"><?php echo $todo['dateadded']; ?></small>
            </li>
            <?php } ?>
            <li class="padding no-todos ui-state-disabled <?php if($total_todos > 0){echo 'hide';} ?>"><?php echo _l('home_no_latest_todos'); ?></li>
         </ul>
         <?php $total_finished_todos = count($todos_finished); ?>
         <h4 class="todo-title text-success"><i class="fa fa-check"></i> <?php echo _l('home_latest_finished_todos'); ?></h4>
         <ul class="list-unstyled todo finished-todos todos-sortable sortable" >
            <?php foreach($todos_finished as $todo_finished){ ?>
               <li>
                  <div class="dragger todo-dragger"></div>
                  <?php echo form_hidden('todo_order',$todo_finished['item_order']); ?>
                  <?php echo form_hidden('finished',1); ?>
                  <div class="checkbox checkbox-default todo-checkbox">
                     <input type="checkbox" value="<?php echo $todo_finished['todoid']; ?>" name="todo_id" checked>
                     <label></label>
                  </div>
                  <span class="todo-description line-throught"><?php echo $todo_finished['description']; ?><a href="#" onclick="delete_todo_item(this,<?php echo $todo_finished['todoid']; ?>)" class="pull-right text-muted"><i class="fa fa-remove"></i></a></span>
                  <small class="todo-date todo-date-finished"><?php echo $todo_finished['datefinished']; ?></small>
               </li>
               <?php } ?>
               <li class="padding no-todos ui-state-disabled <?php if($total_finished_todos > 0){echo 'hide';} ?>"><?php echo _l('home_no_finished_todos_found'); ?></li>
            </ul>
         </div>
      </div>
