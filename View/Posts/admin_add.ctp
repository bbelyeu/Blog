<script type="text/javascript" src="/blog/ckeditor/ckeditor.js"></script>
<style>
input {
    width: 400px;
}
</style>
<div class="posts form">
<?php echo $this->Form->create('Post', array('enctype' => 'multipart/form-data'));?>
	<fieldset>
		<legend><?php __('Add Blog Post'); ?></legend>
	<?php
        echo $this->Form->input('photo_upload', array('type' => 'file'));
        echo $this->Form->input('title');
        echo $this->Form->input('body', array(
            'class' => 'ckeditor'
        ));
        echo $this->Form->input('publish', array(
            'div' => false,
            'class' => 'datetime-field',
            'dateFormat' => 'DMY',
            'minYear' => date('Y'),
        ));
        echo $this->Form->input('Tag');
    ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit'));
?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Posts'), '/admin/posts');?></li>
		<li><?php echo $this->Html->link(__('List Tags'), '/admin/tags'); ?></li>
		<li><?php echo $this->Html->link(__('New Tag'), '/admin/tags/add'); ?></li>
	</ul>
</div>
