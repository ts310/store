<div class="page-header">
<h1>商品一覧</h1>
</div>

<?php echo $this->Paginator->prev('<<Prev') ?>
<?php echo $this->Paginator->first('First') ?>
<?php echo $this->Paginator->last('Last') ?>
<?php echo $this->Paginator->next('Next>>') ?>

<table class="table table-striped">
	
	<tr>
		<td>ID</td>
		<td>Item name</td>
		<td>Item comment</td>
		<td>Item left</td>
		<td>Price</td>
		<td>Release date</td>
		<td>Brand</td>
		<td>Buyer name</td>
	</tr>
	
	<?php foreach ($products as $product): ?>
	<tr>
		<td><?php echo $product['Product']['id'] ?></td>
		<td><?php echo $this->Html->link($product['Product']['item_title'], array('controller' => 'products', 'action' => 'detail', $product['Product']['id'])) ?></td>
		<td><?php echo $this->Text->truncate($product['Product']['item_comment'], 100, array('ellipsis' => '..')) ?></td>
		<td><?php echo $product['Product']['items_left'] ?></td>
		<td><?php echo $this->Number->currency($product['Product']['price'], 'JPY') ?></td>
		<td><?php echo $this->Time->format($product['Product']['release_date'], '%Y/%m/%d') ?></td>
		<td><?php echo $product['Brand']['brand_name'] ?><br /><?php echo $product['Brand']['brand_name_kana'] ?></td>
		<td><?php echo $product['Buyer']['user_nickname'] ?></td>
	</tr>
	<?php endforeach ?>
	<?php unset($product) ?>

</table>