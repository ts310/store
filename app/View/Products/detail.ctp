<div class="container">

<div class="page-header">
<h1>商品詳細</h1>
</div>

<p><?php echo $this->Html->link('リストに戻る', array('controller' => 'products', 'action' => 'index')) ?></p>

<div class="text-center"><?php if ($product['Product']['image']) { echo $this->Html->image('products/' . $product['Product']['id'] .'/'. $product['Product']['image'], array('class' => 'img-rounded'));}?></div>

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

<div class="comments">
<?php foreach ($comments as $comment): ?>
<div class="panel panel-default ">
  <div class="panel-footer ">
    <?php echo $comment['User']['username'] ?>
    <div class="pull-right"><?php echo $this->Time->format($comment['Comment']['created'], '%Y/%m/%d') ?></div>
  </div>
  <div class="panel-body "><?php echo $comment['Comment']['comment'] ?></div>
</div>
<?php endforeach ?>
</div>

<?php 
	echo $this->Form->create('Comment', array('onsubmit' => 'return false;'));
	echo $this->Form->input('comment', array("type" => "textarea", 'class' => 'form-control', 'style' => 'resize:none'));
	echo $this->Form->input('product_id', array("value" => $product['Product']['id'], "type" => "hidden"));	
	echo $this->Form->end();
?>

<div class="form-group">
      <button type="submit" class="btn btn-default" onclick="comment();">Submit</button>
 </div>

<script type="text/javascript">
function comment() {
	var form = $("#CommentDetailForm").serialize();

	$.ajax({
      	type:		"POST",
      	url: 		"/comments/save",
      	data: 		form,
      	dataType: 	'json',
      })
      .done(function(value) {
          	if(value.success){
         	 		$('.comments').append("<div class=\"panel panel-default\"><div class=\"panel-footer\">"+value.username+"<div class=\"pull-right\">"+value.created+"</div></div><div class=\"panel-body\">"+value.comment+"</div></div>");
         	 	}
         	else{
         		alert("error adding comment");
         	}
          })
          ;
	$('#CommentComment').val('');
}
</script>
		
</div>