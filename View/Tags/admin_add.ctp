<div class="tags form">
<?php echo $this->Form->create('Tag');?>
	<fieldset>
		<legend><?php echo __('Admin Add A Blog Post Tag'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('Post');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Tags'), '/admin/tags');?></li>
		<li><?php echo $this->Html->link(__('List Posts'), '/admin/posts'); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), '/admin/posts/add'); ?> </li>
	</ul>
</div>
