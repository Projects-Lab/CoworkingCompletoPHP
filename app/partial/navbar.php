<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="inicio">INICIO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="asignacion" tabindex="-1">Asignación</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="clientes" tabindex="-1">Clientes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="salas" tabindex="-1">Salas</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Configuraciones
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="usuario">Perfil</a>
          <a class="dropdown-item" href="javascript:void(0)"
          onclick="location.href = '../controlador/login.php?opcion=logout'"
          >Salir</a>
        </div>
      </li>
    </ul>
  </div>
</nav>