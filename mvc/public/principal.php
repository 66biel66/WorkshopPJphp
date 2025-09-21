<?php
session_start();
if (!isset($parametro) || !is_array($parametro)) {
  $parametro = [];
}
$usuario_id = $_SESSION['id'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inscrições para Workshops</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    header {
      background-color: #4caf50ff;
      color: white;
      padding: 20px;
    }

    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .cabecalho {
      top: 0;
      left: 0;
      width: 100%;
      background-color: #4caf50ff;
      color: white;
      padding: 15px 20px;
      font-size: 20px;
      font-weight: bold;
      text-align: center;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      z-index: 1000;
    }

    .rodape {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: #4caf50ff;
      color: white;
      padding: 10px 20px;
      font-size: 14px;
      text-align: center;
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
      z-index: 1000;
    }

    .user-button {
      background-color: white;
      color: #4CAF50;
      padding: 8px 16px;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .workshop-button {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 5px;
      cursor: pointer;
    }

    .user-button:hover {
      background-color: #e6e6e6;
    }

    .content {
      padding: 20px;
    }

    .workshop {
      background-color: white;
      margin: 20px 0;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .workshop h2 {
      margin-top: 0;
    }

    .workshop button {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 5px;
      cursor: pointer;
    }

    .workshop button:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>

  <header>
    <nav>
      <h1>Bem-vindo ao Portal de Workshops!</h1>
      <form method="POST" action="/Workshop/mvc/usuario/formularioalterar?id=<?php echo ($_SESSION['id']) ?>">
        <input type="submit" class="user-button"
          value="<?php echo isset($_SESSION["nome"]) ? htmlspecialchars($_SESSION["nome"]) . " 👤" : "Usuário"; ?>">
      </form>
    </nav>
  </header>

  <div class="content">
    <p>Escolha um dos workshops abaixo e inscreva-se para aprimorar suas habilidades!</p>

    <div class="workshop">
      <h2>Workshop de Programação Web</h2>
      <p>Aprenda os fundamentos do desenvolvimento web com HTML, CSS e JavaScript.</p>


      <form method="POST" action="/Workshop/mvc/inscricao/sair">
        <input type="hidden" name="workshop_id" value="1">
        <input type="hidden" name="usuario_id" value="<?= $usuario_id ?>">
        <input type="submit" value="Sair do workshop" class="user-button">
      </form>


      <form method="GET" action="/Workshop/mvc/inscricao/inscrever">
        <input type="hidden" name="workshop_id" value="1">
        <input type="submit" value=<?php if (isset($_SESSION['teste']) && $_SESSION['teste'] == 1) {
                                      print_r($_SESSION['jaEnscrito']);
                                    } else {
                                      echo "inscreva-se";
                                    } ?> class="user-button">
      </form>

      <form method="GET" action="/Workshop/mvc/workshops/lista">
        <input type="hidden" name="workshop_id" value="1">
        <input type="submit" value="Ver inscritos" class="workshop-button">
      </form>
    </div>

    <div class="workshop">
      <h2>Workshop de Design Gráfico</h2>
      <p>Explore ferramentas como Photoshop e Illustrator para criar designs incríveis.</p>


      <form method="POST" action="/Workshop/mvc/inscricao/sair">
        <input type="hidden" name="workshop_id" value="2">
        <input type="hidden" name="usuario_id" value="<?= $usuario_id ?>">
        <input type="submit" value="Sair do workshop" class="user-button">
      </form>


      <form method="GET" action="/Workshop/mvc/inscricao/inscrever">
        <input type="hidden" name="workshop_id" value="2">
        <input type="submit" value=<?php if (isset($_SESSION['teste']) && $_SESSION['teste'] == 2) {
                                      print_r($_SESSION['jaEnscrito']);
                                    } else {
                                      echo "inscreva-se";
                                    } ?> class="user-button">
      </form>


      <form method="GET" action="/Workshop/mvc/workshops/lista">
        <input type="hidden" name="workshop_id" value="2">
        <input type="submit" value="Ver inscritos" class="workshop-button">
      </form>
    </div>

    <div class="workshop">
      <h2>Workshop de Marketing Digital</h2>
      <p>Descubra estratégias para alavancar marcas e produtos online.</p>


      <form method="POST" action="/Workshop/mvc/inscricao/sair">
        <input type="hidden" name="workshop_id" value="3">
        <input type="hidden" name="usuario_id" value="<?= $usuario_id ?>">
        <input type="submit" value="Sair do workshop" class="user-button">
      </form>


      <form method="GET" action="/Workshop/mvc/inscricao/inscrever">
        <input type="hidden" name="workshop_id" value="3">
        <input type="submit" value=<?php if (isset($_SESSION['teste']) && $_SESSION['teste'] == 3) {
                                      print_r($_SESSION['jaEnscrito']);
                                    } else {
                                      echo "inscreva-se";
                                    } ?> class="user-button">
      </form>


      <form method="GET" action="/Workshop/mvc/workshops/lista">
        <input type="hidden" name="workshop_id" value="3">
        <input type="submit" value="Ver inscritos" class="workshop-button">
      </form>

    </div>
  </div>





















</body>

</html>