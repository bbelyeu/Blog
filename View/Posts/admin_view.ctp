<div class="posts view">
<h2><?php echo __('Post');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($post['Post']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<img src="/images/<?php echo h($post['Post']['image_id']); ?>" />
			&nbsp;
		</dd>
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
		<dt><?php echo __('Publish'); ?></dt>
		<dd>
			<?php echo h($post['Post']['publish']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($post['Post']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
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
		<li><?php echo $this->Html->link(__('List Tags'), '/admin/tags'); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), '/admin/tag/add'); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Tags');?></h3>
	<?php if (!empty($post['Tag'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($post['Tag'] as $tag): ?>
		<tr>
			<td><?php echo $tag['id'];?></td>
			<td><?php echo $tag['name'];?></td>
			<td><?php echo $tag['created'];?></td>
			<td><?php echo $tag['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), '/admin/tags/view'.$tag['id']); ?>
				<?php echo $this->Html->link(__('Edit'), '/admin/tags/edit'.$tag['id']); ?>
				<?php echo $this->Form->postLink(__('Delete'), '/admin/tags/delete'.$tag['id'], null, __('Are you sure you want to delete # %s?', $tag['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tag'), '/admin/tags/add');?> </li>
		</ul>
	</div>
</div>
