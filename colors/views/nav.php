<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= URL ?>">Colors City</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= URL ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Colors
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= URL ?>/colors/create">Create new</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>/colors">Show all colors</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <div class="d-flex">
        <?php if ($auth): ?>
          <div class="me-3">Hello, <?= $auth ?></div>
          <form action="<?= URL ?>/logout" method="post">
            <button class="btn btn-outline-danger">Logout</button>
          </form>
        <?php else: ?>
          <a href="<?= URL ?>/login" class="btn btn-outline-primary">Login</a>
        <?php endif ?>
      </div>
    </div>
  </div>
</nav>
<?php require ROOT. 'views/message.php' ?>