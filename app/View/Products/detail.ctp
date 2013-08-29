<div class="container">

<div class="page-header">
<h1>商品詳細</h1>
</div>

<p><?php echo $this->Html->link('リストに戻る', array('controller' => 'products', 'action' => 'index')) ?></p>

<table class="table">

	<tr>
		<td>商品ID</td>
		<td><?php echo $product['Product']['id'] ?></td>
	</tr>
	<tr>
		<td>商品タイトル</td>
		<td><?php echo $product['Product']['item_title'] ?></td>
	</tr>
	<tr>
		<td>商品コメント</td>
		<td><?php echo $product['Product']['item_comment'] ?></td>
	</tr>
	<tr>
		<td>ブランド</td>
		<td><?php echo $product['Brand']['brand_name'] ?></td>
	</tr>
	<tr>
		<td>価格</td>
		<td><?php echo $this->Number->currency($product['Product']['price'], 'JPY') ?></td>
	</tr>
	<tr>
		<td>公開日</td>
		<td><?php echo $this->Time->format($product['Product']['release_date'], '%Y/%m/%d') ?></td>
	</tr>
	<tr>
		<td>バイヤー</td>
		<td><?php echo $product['Buyer']['user_nickname'] ?></td>
	</tr>

</table>

</div>