<div class="container">

<div class="page-header">
<h1>商品一覧</h1>
</div>

<div><?php echo $this->Paginator->counter('{:count}件中{:start}~{:end}を表示中') ?></div>
<div class="pagination">
	<?php if ($this->Paginator->hasPrev()) {echo $this->Paginator->prev('<<Prev', null, null, array('class' => 'disabled'));} ?>
	<?php echo $this->Paginator->first('First') ?>
	<?php echo $this->Paginator->numbers(array('modulus' => 4)) ?>
	<?php echo $this->Paginator->last('Last') ?>
	<?php if ($this->Paginator->hasNext()) {echo $this->Paginator->next('Next>>', null, null, array('class' => 'disabled'));} ?>
</div>

<table class="table table-striped">
	
	<tr>
		<th>ID</th>
		<th>Item image</th>
		<th>Item name</th>
		<th>Item comment</th>
		<th>Item left</th>
		<th><?php echo $this->Paginator->sort('price', 'Price') ?></th>
		<th>Release date</th>
		<th><?php echo $this->Paginator->sort('Brand.brand_name', 'Brand') ?></th>
		<th>Buyer name</th>
	</tr>
	
	<?php foreach ($products as $product): ?>
	<tr>
		<td><?php echo $product['Product']['id'] ?></td>
		<td><?php if ($product['Product']['image']) { echo $this->Html->image('products/' . $product['Product']['id'] .'/small_'. $product['Product']['image']);} ?>
		<td><?php echo $this->Html->link($product['Product']['item_title'], array('controller' => 'products', 'action' => 'detail', $product['Product']['id'])) ?></td>
		<td><?php echo $this->Text->truncate($product['Product']['item_comment'], 100, array('ellipsis' => '..')) ?></td>
		<td><?php echo $product['Product']['items_left'] ?></td>
		<td><?php echo $this->Number->currency($product['Product']['price'], 'JPY') ?></td>
		<td><?php echo $this->Time->format($product['Product']['release_date'], '%Y/%m/%d') ?></td>
		<td><?php echo $product['Brand']['brand_name'] ?><br /><?php echo $product['Brand']['brand_name_kana'] ?></td>
		<td><?php echo $product['User']['username'] ?></td>
		<?php if($userData['id'] === $product['User']['id'] || $userData['admin'] ==='1'): ?>
		<td><?php echo $this->Html->link('Edit', array('action' => 'edit', $product['Product']['id'])) ?>
		<?php endif ?>
	</tr>
	<?php endforeach ?>
	<?php unset($product) ?>

</table>

<div class="pagination">
	<?php if ($this->Paginator->hasPrev()) {echo $this->Paginator->prev('<<Prev', null, null, array('class' => 'disabled'));} ?>
	<?php echo $this->Paginator->first('First') ?>
	<?php echo $this->Paginator->numbers(array('modulus' => 4)) ?>
	<?php echo $this->Paginator->last('Last') ?>
	<?php if ($this->Paginator->hasNext()) {echo $this->Paginator->next('Next>>', null, null, array('class' => 'disabled'));} ?>
</div>

</div>