<!DOCTYPE html>
<html lang="pt_BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

  <!-- FONTS CDN -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />

  <!-- STYLES -->
  <link rel="stylesheet" href="./assets/styles/main.css">
</head>

<body>
  <div class="container">
    <aside>
      <div class="topo">
        <a href="#" class="brand">
          <img src="./assets/img/logo-dark.png" alt="Painel Administrativo Monkeys">
        </a>
        <div class="clone-menu" id="close-btn">
          <span class="material-symbols-outlined">close</span>
        </div>
      </div>
      <div class="sidebar">
        <a href="#" class="active">
          <span class="material-symbols-outlined">keyboard_command_key</span>
          <h3>Dashboard</h3>
        </a>
        <a href="#">
          <span class="material-symbols-outlined">person</span>
          <h3>Clientes</h3>
        </a>
        <a href="#">
          <span class="material-symbols-outlined">receipt_long</span>
          <h3>Pedidos</h3>
          <div class="counter">26</div>
        </a>
        <a href="#">
          <span class="material-symbols-outlined">inventory</span>
          <h3>Produtos</h3>
        </a>
        <a href="#">
          <span class="material-symbols-outlined">help</span>
          <h3>Ajuda</h3>
        </a>
        <a href="#">
          <span class="material-symbols-outlined">settings</span>
          <h3>Configurações</h3>
        </a>
        <a href="#">
          <span class="material-symbols-outlined">logout</span>
          <h3>Sair</h3>
        </a>
      </div>
    </aside>
    <main>
      <section class="page-header">
        <div class="title">
          <h1>Dashboard</h1>
          <h3>All sales statics</h3>
        </div>
        <div class="actions">
          <button id="menu-btn">
            <span class="material-symbols-outlined">menu</span>
          </button>
          <div class="theme-toggler">
            <span class="material-symbols-outlined">dark_mode</span>
          </div>
          <div class="profile">
            <div class="profile-photo">
              <img src="./assets/img/profile-1.jpg" alt="Admin - Alanderson">
            </div>
            <div class="info">
              <p>Hey, <b>Alanderson</b></p>
              <small class="text-muted">Admin</small>
            </div>
          </div>
        </div>
      </section>
      <?php $this->render() ?>
    </main>
  </div>

  <script src="./assets/scripts/main.js"></script>
</body>

</html>