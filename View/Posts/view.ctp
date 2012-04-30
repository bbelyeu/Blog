<div class="posts view">
<h2><?php  echo __('Post');?></h2>
	<dl>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($post['Post']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($post['Post']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Posted On'); ?></dt>
		<dd>
			<?php echo h($post['Post']['publish']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
