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
		<td><?php echo $product['User']['username'] ?></td>
	</tr>

</table>

<p><span class="label label-default">Comments</span></p>

<?php foreach ($comments as $comment): ?>
<div class="panel panel-default ">
  <div class="panel-body ">
    <?php echo $comment['User']['username'] ?>
    <div class="pull-right"><?php echo $this->Time->format($comment['Comment']['created'], '%Y/%m/%d') ?></div>
  </div>
  <div class="panel-footer "><?php echo $comment['Comment']['comment'] ?></div>
</div>
<?php endforeach ?>

<?php 
$this->Js->get('#CommentSaveForm')->event(
		'submit',
		$this->Js->request(array('controller' => 'comments', 'action' => 'save'), array('data' => $this->Js->serializeForm(array('isForm' => true, 'inline' =>true)), 'async' => true, 'dataExpression' => true, 'method' => 'POST')));

echo $this->Form->create('Comment', array('action' => 'save', 'default' => false));
echo $this->Form->input('comment', array('type' => 'text'));
echo $this->Form->hidden('product_id', array('value' => $product['Product']['id']));
echo $this->Form->end('submit');

?>	
		
</div>