<?php

$is_bs5 = true;
if (basename($_SERVER['PHP_SELF']) == 'bs3confirm.php') {
    $is_bs5 = false;
}

?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">

<?php if($is_bs5): ?>
<title>Bootstrap 5 Confirmation Example </title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous">

<style>
    /* Show it's not fixed to the top */
    body {
      min-height: 75rem;
    }
    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .modal-header-success {
      color:#fff;
      border-bottom:1px solid #eee;
      background-color: #198754;
    }
    .modal-header-warning {
      color:#000;
      border-bottom:1px solid #eee;
      background-color: #ffc107;
    }
    .modal-header-danger {
      color:#fff;
      border-bottom:1px solid #eee;
      background-color: #dc3545;
    }
    .modal-header-info {
      color:#000;
      border-bottom:1px solid #eee;
      background-color: #0dcaf0;
    }
    .modal-header-primary {
      color:#fff;
      border-bottom:1px solid #eee;
      background-color: #0d6efd;
    }
</style>

<?php else: ?>

<title>Bootstrap 3/4 Confirmation Example </title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
      crossorigin="anonymous">

<style>
    body {
      font-size: 1.6em;
      padding-top: 50px;
    }
    .starter-template {
      padding: 40px 15px;
    }

    .modal-header {
      -webkit-border-top-left-radius: 5px;
      -webkit-border-top-right-radius: 5px;
      -moz-border-radius-topleft: 5px;
      -moz-border-radius-topright: 5px;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
    }
    .modal-header-success {
      color:#fff;
      border-bottom: 1px solid #eee;
      background-color: #5cb85c;
    }
    .modal-header-warning {
      color:#fff;
      border-bottom: 1px solid #eee;
      background-color: #f0ad4e;
    }
    .modal-header-danger {
      color:#fff;
      border-bottom: 1px solid #eee;
      background-color: #d9534f;
    }
    .modal-header-info {
      color:#fff;
      border-bottom: 1px solid #eee;
      background-color: #5bc0de;
    }
    .modal-header-primary {
      color:#fff;
      border-bottom: 1px solid #eee;
      background-color: #337ab7;
    }
</style>

<?php endif ?>


<script src=" https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js "></script>
<script src="../js/jquery.bsConfirm.js"></script>

<!--<script src="/vendor/htmx/htmx/htmx.min.js"></script>-->
<!--<script src="https://unpkg.com/htmx.org@2.0.4/dist/htmx.js"></script>-->
<script src="https://unpkg.com/htmx.org@1.9.12/dist/htmx.js"></script>


<?php if($is_bs5): ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

<?php else: ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<?php endif ?>
</head>
<body>

<?php if($is_bs5): ?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="index.php">BsConfirm</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="htmx.php">HTMX</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bs3confirm.php">Bootstrap 3/4</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://github.com/tropotek/bsConfirm" target="_blank">Readme</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php else: ?>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">BsConfirm</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
        <li><a href="htmx.php">HTMX</a></li>
        <li><a href="index.php">Bootstrap 5</a></li>
        <li><a href="https://github.com/tropotek/bsConfirm" target="_blank">Readme</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<?php endif ?>

