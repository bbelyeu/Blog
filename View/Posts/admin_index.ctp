<div class="posts index">
	<h2><?php __('Blog Posts');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('body');?></th>
			<th><?php echo $this->Paginator->sort('publish');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	foreach ($posts as $post): ?>
	<tr>
		<td><?php echo h($post['Post']['id']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['title']); ?>&nbsp;</td>
		<td><?php echo $this->Text->truncate(
            h($post['Post']['body']),
            100,
            array(
                'ending' => '...',
                'exact' => false,
                'html' => true
            )); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['publish']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['created']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), '/admin/posts/view/'.$post['Post']['id']); ?>
			<?php echo $this->Html->link(__('Edit'), '/admin/posts/edit/'.$post['Post']['id']); ?>
			<?php echo $this->Form->postLink(__('Delete'), '/admin/posts/delete/'.$post['Post']['id'], null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
    <?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Post'), '/admin/posts/add'); ?></li>
		<li><?php echo $this->Html->link(__('List Tags'), '/admin/tags'); ?></li>
		<li><?php echo $this->Html->link(__('New Tag'), '/admin/tags/add'); ?></li>
	</ul>
</div>
