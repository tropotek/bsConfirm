<?php
    include('header.php');
?>

<main class="container">
  <div class="bg-body-tertiary p-5 rounded">
    <h1>Bootstrap 5 Confirmation Example</h1>
    <p class="lead">
      Simpler way to implement confirmation dialogs in Bootstrap
    </p>
  </div>

  <p>&nbsp;</p>

  <div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="links-tab" data-bs-toggle="tab" data-bs-target="#links" type="button" role="tab">Links</button>
      </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="form-tab" data-bs-toggle="tab" data-bs-target="#form" type="button" role="tab">Form</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="static-tab" data-bs-toggle="tab" data-bs-target="#static" type="button" role="tab">Static</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="htmx-tab" data-bs-toggle="tab" data-bs-target="#htmx" type="button" role="tab">HTMX</button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="links" role="tabpanel" aria-labelledby="links-tab" tabindex="0">
        <p>&nbsp;</p>
        <p>
          <a href="index.php" title="Primary Confirm" data-confirm="Are you sure you want to submit this action?" class="btn btn-primary">Primary Confirm</a>
          <a href="index.php" title="Success Confirm" data-confirm="Are you sure you want to submit this action?" class="btn btn-success">Success Confirm</a>
          <a href="index.php" title="Warning Confirm" data-confirm="Are you sure you want to submit this action?" class="btn btn-warning">Warning Confirm</a>
          <a href="index.php" title="Info Confirm"    data-confirm="Are you sure you want to submit this action?" class="btn btn-info">Info Confirm</a>
          <a href="index.php" title="Danger Confirm"  data-confirm="Are you sure you want to submit this action?" class="btn btn-danger">Danger Confirm</a>
          <a href="index.php" title="Default Confirm" data-confirm="Are you sure you want to submit this action?" class="btn btn-light">Default Confirm</a>
          <a href="index.php" title="Outline Warning Confirm" data-confirm="Are you sure you want to submit this action?" class="btn btn-outline-warning">Outline Warning Confirm</a>
        </p>
          <p>Initialization script:</p>
          <pre>
jQuery(function($) {
  $('[data-confirm]').bsConfirm();
});
          </pre>
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
          <p>Initialization script:</p>
          <pre>
jQuery(function($) {
  $('[data-confirm]').bsConfirm();
});
          </pre>
          <p>&nbsp;</p>
      </div>

      <div class="tab-pane fade" id="static" role="tabpanel" aria-labelledby="links-tab" tabindex="0">
        <p>&nbsp;</p>
        <p>
          <a href="index.php" title="Primary Confirm" data-confirm="Are you sure you want to submit this action?" class="btn btn-primary">Primary Confirm</a>
          <a href="index.php" title="Success Confirm" data-confirm="Are you sure you want to submit this action?" class="btn btn-success">Success Confirm</a>
          <a href="index.php" title="Warning Confirm" data-confirm="Are you sure you want to submit this action?" class="btn btn-warning">Warning Confirm</a>
          <a href="index.php" title="Info Confirm"    data-confirm="Are you sure you want to submit this action?" class="btn btn-info">Info Confirm</a>
          <a href="index.php" title="Danger Confirm"  data-confirm="Are you sure you want to submit this action?" class="btn btn-danger">Danger Confirm</a>
          <a href="index.php" title="Default Confirm" data-confirm="Are you sure you want to submit this action?" class="btn btn-light">Default Confirm</a>
          <a href="index.php" title="Outline Warning Confirm" data-confirm="Are you sure you want to submit this action?" class="btn btn-outline-warning">Outline Warning Confirm</a>
        </p>
          <p>Initialization script:</p>
          <pre>
jQuery(function($) {
  $('[data-confirm]').each(function() {
    $(this).on('click', function() {

      bsConfirm({
        onConfirm: function() {
          alert('confirmed');
        }
      }, this);
      return false;

    });
  });
});
          </pre>
          <p>&nbsp;</p>
      </div>

      <div class="tab-pane fade" id="htmx" role="tabpanel" aria-labelledby="links-tab" tabindex="0">
        <p>&nbsp;</p>
        <p class="static">
          <a hx-get="hx.php" hx-target="#hx-message" hx-confirm="Are you sure you want to submit this action?" title="Primary Confirm" data-confirm="" class="btn btn-primary">Primary Confirm</a>
          <a hx-get="hx.php" hx-target="#hx-message" hx-confirm="Are you sure you want to submit this action?" title="Success Confirm" class="btn btn-success">Success Confirm</a>
          <a hx-get="hx.php" hx-target="#hx-message" hx-confirm="Are you sure you want to submit this action?" title="Warning Confirm" class="btn btn-warning">Warning Confirm</a>
          <a hx-get="hx.php" hx-target="#hx-message" hx-confirm="Are you sure you want to submit this action?" title="Info Confirm"    class="btn btn-info">Info Confirm</a>
          <a hx-get="hx.php" hx-target="#hx-message" hx-confirm="Are you sure you want to submit this action?" title="Danger Confirm"  class="btn btn-danger">Danger Confirm</a>
          <a hx-get="hx.php" hx-target="#hx-message" hx-confirm="Are you sure you want to submit this action?" title="Default Confirm" class="btn btn-light">Default Confirm</a>
          <a hx-get="hx.php" hx-target="#hx-message" hx-confirm="Are you sure you want to submit this action?" title="Outline Warning Confirm" class="btn btn-outline-warning">Outline Warning Confirm</a>
        </p>
          <div class="message" id="hx-message"></div>

          <p>Initialization script:</p>
          <pre>
jQuery(function($) {
    $(document).on('htmx:confirm', function(e) {
      if (e.defaultPrevented) return;
      if (!e.detail.elt.hasAttribute('hx-confirm')) return;
      e.preventDefault();
      $.fn.bsConfirm({
        onConfirm: function() { e.detail.issueRequest(true); }
      }, e.detail.elt);
    });
});
          </pre>
          <p>&nbsp;</p>
      </div>



    </div>
  </div>

</main>


<?php
    include('footer.php');
?>