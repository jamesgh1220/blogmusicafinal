<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog de Música</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Antic+Slab&family=Noto+Sans+TC&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/de75e0fec7.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="<?= base_url ?>css/normalize.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url ?>css/styles.css">
</head>

<body>
  <div class="container">
    <nav class="menu">
      <a href="<?= base_url ?>" class="logo">BLOG DE MUSICA</a>
      <ul class="menu-items">
      <?php if (isset($_SESSION['login']) && !isset($_SESSION['error_login'])) : ?>
        <li><a href="#">
            <span class="icon">
              <i class="fa fa-home" aria-hidden="true"></i>
            </span>
            <span class="title">Perfil</span>
          </a>
        </li>
        <li><a href="">
            <span class="icon">
              <i class="fa fa-search" aria-hidden="true"></i>
            </span>
            <span class="title">Buscar noticias</span>
          </a>
        </li>
        <li><a href="<?= base_url ?>user/getUsers">
            <span class="icon">
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
            <span class="title">Usuarios</span>
          </a>
        </li>
        <li><a href="<?= base_url ?>category/index">
            <span class="icon">
              <i class="fa fa-list-alt" aria-hidden="true"></i>
            </span>
            <span class="title">Categorias</span>
          </a>
        </li>
        <li><a href="<?= base_url ?>news/getAllNews">
            <span class="icon">
              <i class="fa fa-newspaper-o" aria-hidden="true"></i>
            </span>
            <span class="title">Noticias</span>
          </a>
        </li>
        <li><a href="<?= base_url ?>user/logout">
            <span class="icon">
              <i class="fa fa-sign-out" aria-hidden="true"></i>
            </span>
            <span class="title">Cerrar sesion</span>
          </a>
        </li>
      </ul>
      <span class="btn-menu">
        <i class="fa fa-bars"></i>
      </span>
      <?php endif; ?>
    </nav>
  