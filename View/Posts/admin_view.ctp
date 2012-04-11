<div class="posts view">
<h2><?php  __('Post');?></h2>
	<dl>
		<dt><?php __('Id'); ?></dt>
		<dd>
			<?php echo h($post['Post']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php __('Title'); ?></dt>
		<dd>
			<?php echo h($post['Post']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php __('Body'); ?></dt>
		<dd>
			<?php echo h($post['Post']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php __('Created'); ?></dt>
		<dd>
			<?php echo h($post['Post']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php __('Modified'); ?></dt>
		<dd>
			<?php echo h($post['Post']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Post'), '/admin/posts/edit/'.$post['Post']['id']); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Post'), '/admin/posts/delete/'.$post['Post']['id'], null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), '/admin/posts'); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), '/admin/posts/add'); ?> </li>
	</ul>
</div>
