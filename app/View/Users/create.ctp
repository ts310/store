<div class="container">

<div class="page-header">
<h1>バイヤ登録</h1>
</div>

<?php echo $this->Form->create('User', array(
    'class' => 'form-horizontal',
    'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' => array('class' => 'form-group'),
      	'label' => array('class' => 'col-lg-2 control-label'),
      	'between' => '<div class="col-lg-10">',
       	'after' => '</div>',
        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
    )));?>
    
<fieldset>
<?php echo $this->Form->input('username', array(
	'class' => 'form-control'
    )); 
?>
    
<?php echo $this->Form->input('email', array(
    'class' => 'form-control'
    )); 
?>

<?php echo $this->Form->input('password', array(
	'class' => 'form-control'
    )); 
?>

</fieldset>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
 </div>
 
<?php echo $this->Form->end(); ?>
</div>