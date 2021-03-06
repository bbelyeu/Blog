<div class="tags view">
<h2><?php  echo __('Blog Post Tag');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tag'), '/admin/tags/edit'.$tag['Tag']['id']); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tag'), '/admin/tags/delete'.$tag['Tag']['id'], null, __('Are you sure you want to delete # %s?', $tag['Tag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), '/admin/tags'); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), '/admin/tags/add'); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), '/admin/posts'); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), '/admin/posts/add'); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Posts');?></h3>
	<?php if (!empty($tag['Post'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Publish'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tag['Post'] as $post): ?>
		<tr>
			<td><?php echo $post['id'];?></td>
			<td><?php echo $post['title'];?></td>
			<td><?php echo $post['body'];?></td>
			<td><?php echo $post['publish'];?></td>
			<td><?php echo $post['created'];?></td>
			<td><?php echo $post['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), '/admin/posts/view'.$post['id']); ?>
				<?php echo $this->Html->link(__('Edit'), '/admin/posts/edit'.$post['id']); ?>
				<?php echo $this->Form->postLink(__('Delete'), '/admin/posts/delete'.$post['id'], null, __('Are you sure you want to delete # %s?', $post['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Post'), '/admin/posts/add');?> </li>
		</ul>
	</div>
</div>
