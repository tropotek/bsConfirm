<?php
    include('header.php');
?>

<div class="container">
  <div class="starter-template">

    <div class="jumbotron">
      <h2>Bootstrap 3/4 Confirmation Example</h2>
      <p class="lead">
        Simpler way to implement confirmation dialogs in Bootstrap
      </p>
    </div>

    <div>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#links" aria-controls="links" role="tab" data-toggle="tab">Links</a></li>
        <li role="presentation"><a href="#form" aria-controls="profile" role="tab" data-toggle="tab">Form</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="links">
          <p>&nbsp;</p>
          <p>
            <a href="bs3confirm.php" title="Primary Confirm" data-confirm="Are you sure you want to submit this action?" class="btn btn-primary">Primary Confirm</a>
            <a href="bs3confirm.php" title="Success Confirm" data-confirm="Are you sure you want to submit this action?" class="btn btn-success">Success Confirm</a>
            <a href="bs3confirm.php" title="Warning Confirm" data-confirm="Are you sure you want to submit this action?" class="btn btn-warning">Warning Confirm</a>
            <a href="bs3confirm.php" title="Info Confirm"    data-confirm="Are you sure you want to submit this action?" class="btn btn-info">Info Confirm</a>
            <a href="bs3confirm.php" title="Danger Confirm"  data-confirm="Are you sure you want to submit this action?" class="btn btn-danger">Danger Confirm</a>
            <a href="bs3confirm.php" title="Default Confirm" data-confirm="Are you sure you want to submit this action?" class="btn btn-default">Default Confirm</a>
            <a href="bs3confirm.php" data-confirm="Are you sure you want to submit this action?">Basic Confirm Link</a>
          </p>
          <p>&nbsp;</p>
        </div>
        <div role="tabpanel" class="tab-pane" id="form">
          <p>&nbsp;</p>
          <form method="get">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="input1" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="text" name="input2" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary" data-confirm="Are you sure you want to submit this form?">Submit</button>
          </form>
          <p>&nbsp;</p>
        </div>
      </div>
    </div>

  </div>

</div><!-- /.container -->


<?php
    include('footer.php');
?>