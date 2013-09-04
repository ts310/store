 <div class="container">

<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User', array('class' => 'form-signin')); ?>
    <fieldset>
        <h2 class="form-signin-heading">Please sign in</h2>
        <?php echo $this->Form->input('username', array('label' => false, 'class' => 'form-control', 'placeholder' => 'username'));
        echo $this->Form->input('password', array('label' => false, 'class' => 'form-control', 'placeholder' => 'password'));
    ?>
    </fieldset>
    <div class="form-group">
    <button class="btn btn-lg btn-primary" type="submit">Sign in</button>
	</div>
    <?php echo $this->Form->end(); ?>
</div>
      
      <p>No account? <?php echo $this->Html->link('Create', array('controller' => 'users', 'action' => 'create')) ?></p>

</div>
