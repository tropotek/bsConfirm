<?php
    include('inc/header.php');
?>

<main class="container">
  <div class="bg-body-tertiary p-5 rounded">
    <h1>Bootstrap 5 HTMX Confirmation Example</h1>
    <p class="lead">
      Simpler way to implement confirmation dialogs in Bootstrap
    </p>
  </div>

  <p>&nbsp;</p>

  <div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="links-tab" data-bs-toggle="tab" data-bs-target="#links" type="button" role="tab" aria-controls="links-tab-pane" aria-selected="true">Links</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#form" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Form</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="links" role="tabpanel" aria-labelledby="links-tab" tabindex="0">
        <p>&nbsp;</p>
        <p>
          <a href="index.html" title="Primary Confirm" data-confirm="Are you sure you want to submit this action?" class="btn btn-primary">Primary Confirm</a>
          <a href="index.html" title="Success Confirm" data-confirm="Are you sure you want to submit this action?" class="btn btn-success">Success Confirm</a>
          <a href="index.html" title="Warning Confirm" data-confirm="Are you sure you want to submit this action?" class="btn btn-warning">Warning Confirm</a>
          <a href="index.html" title="Info Confirm"    data-confirm="Are you sure you want to submit this action?" class="btn btn-info">Info Confirm</a>
          <a href="index.html" title="Danger Confirm"  data-confirm="Are you sure you want to submit this action?" class="btn btn-danger">Danger Confirm</a>
          <a href="index.html" title="Default Confirm" data-confirm="Are you sure you want to submit this action?" class="btn btn-light">Default Confirm</a>
          <a href="index.html" title="Outline Warning Confirm" data-confirm="Are you sure you want to submit this action?" class="btn btn-outline-warning">Outline Warning Confirm</a>
        </p>
        <p>&nbsp;</p>
      </div>

      <div class="tab-pane fade" id="form" role="tabpanel" aria-labelledby="form-tab" tabindex="0">
        <p>&nbsp;</p>
        <form method="get">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="input1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="text" name="input2" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" class="btn btn-primary" data-confirm="Are you sure you want to submit this form?">Submit</button>
        </form>
        <p>&nbsp;</p>
      </div>
    </div>
  </div>

</main>


<?php
    include('inc/footer.php');
?>