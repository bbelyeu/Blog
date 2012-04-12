<style>
textarea, input {
    width: 400px;
}
textarea {
    height: 200px;
}
</style>
<div class="posts form">
<?php echo $this->Form->create('Post');?>
	<fieldset>
		<legend><?php __('Admin Add Blog Post'); ?></legend>
	<?php
        echo $this->Form->input('title');
        echo $this->Form->input('body');
    ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit'));
?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Posts'), '/admin/posts');?></li>
	</ul>
</div>
