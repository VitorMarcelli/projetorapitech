<?php
@session_start();
// Incluir arquivo de configuração
require_once "bd/config.php";
?>

<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aqui você irá encontrar...">
  <meta name="keywords" content="computadores, prestação de serviço de micros , notebook, aluguel de computadores...">

  <link rel="icon" src="img\icon.ico">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link rel="stylesheet" href="css/style.css">

  <title>RapiTech</title>
</head>


<body>


  <!--Menu-->

  <nav class="navbar navbar-expand-lg navbar-light bg-white">
  <a class="navbar-brand" href="index.php">

    <img class="Logo" src="img/logo09.png" alt="LogoTipo" width="80px"></a>
<div class="opacidade">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
</div>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(Página atual)</span></a>
      </li>
      
      <li class="nav-item active">
        <a class="nav-link" href="quem.php">Quem Somos</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="contrato.php">Contratos </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="contato.php">Contato </a>
      </li>
     
      
     
       

    </ul>
    
  </div>
  <div class=" float-right">
          
          <form class="d-flex">
          <a href="login.php" class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i>Login</button> </a>
          </form>
        </div>
</nav>

  <!-- Banner-->

  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      <div>
        <div class="carousel-item active">
          <img class="d-block w-100" src="img/banner1.png" alt="Primeiro Slide" width="800px">
          <div class="carousel-caption d-none d-md-block">
           
          </div>
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="img/banner2.png" alt="Segundo Slide">
          <div class="carousel-caption d-none d-md-block">
           
          </div>
        </div>

        <div class="carousel-item">

          <img class="d-block w-100" src="img/BANNER3.png" alt="Terceiro Slide">
          <div class="carousel-caption d-none d-md-block">
           
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Próximo</span>
        </a>
      </div>
</div>


  <!-- card -->
  <article class="container">

  <br><br><br><br>
    <div class="row bg-light rounded-circle">
      <div class="col-sm-4 col-md-3 px-3 py-3">
        <img class="img-fluid rounded-circle" src="img/valores.png" alt="">
      </div>

      <div class="col-sm-8 col-md-7 px-3 py-3">
        <h2 class="text-center text-primary"> Valores da RapiTech </h2>

        <p>Tudo que fazemos aqui é baseado na ÉTICA que é o principal pilar da nossa empresa. Respeitar o ser humano, permitindo que ele seja quem ele é, independente de religião, raça, cor da pele, orientação ou condição sexual. Aqui nada disso importa! Queremos conhecer o ser humano que existe em você. Prezamos pelo pró atividade. Nunca fazemos somente o necessário, sempre trabalhamos pelo mais, pelo surpreender o cliente. Aprendemos constantemente pois descobrimos que o mundo não para de evoluir e nós temos que acompanhar. Todos nossos colaboradores têm percepção de negócio e todos sabem exatamente o que nossa empresa faz. Trabalhar sozinho não mais! Aqui somos uma equipe, uma família! Sempre estamos comprometidos com nosso cliente e nossos objetivos gerando confiança em quem é mais importante para nós.
        </p>

      </div>

    </div>

    
      <br><br><br><br>

    <div class="row bg-light rounded-circle">

      <div class="col-sm-8 col-md-8 px-8 py-5 mt-0 mb-4">
        <h2 class="text-center text-primary"> Nossas Pretensões </h2>

        <p>O que pretendemos é crescer e sermos reconhecidos por nossos clientes como a melhor opção nas áreas de prestação de serviços. Acima de tudo, atendermos no melhor prazo possível, oferecermos soluções com tecnologia de ponta e estarmos à frente na disponibilização de informações que auxiliem clientes e parceiros a também crescerem de forma sólida e moderna..
        </p>

      </div>
      
        <div class="col-sm-4 col-md-3 px-3 py-3 mt-1 mb-8">
          <img class="img-fluid rounded-circle" src="img/logotela.png"alt="">
        </div> 

    </div>

    <br><br><br><br>
    <div class="row bg-light rounded-circle">
      <div class="col-sm-4 col-md-3 px-3 py-3">
        <img class="img-fluid rounded-circle float-right" src="img/palma.png" alt="">
      </div>

      <div class="col-sm-8 col-md-7 px-3 py-3">
        <h2 class="text-center text-primary"> Diferenciais da nossa empresa </h2>

        <p>Nosso foco está em desenvolver soluções para suprir a necessidade da empresa, ter profissionais atualizados nas tecnologias que utilizamos, atendendo nosso cliente com agilidade e sempre com transparência na resolução do problema. Nos preocupamos muito com o custo de todo o projeto pois sabemos que para o empresário brasileiro, caixa é algo bem delicado de mexer.
        </p>

      </div>
    </div>

    <br><br>

  </article>


  <!-- rodapé -->

  <article class="container"><div class="contact-box"></div> </article> <br><br>
<footer>
  <div id="contact-area">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="main-title">Entre em contato conosco:</h3>
          </div>
          <br><br><br><br><br><br>
          <div class="col-md-4 contact-box">
            
            <p><span class="contact-tile">Ligue para:</span> (11)99999-9999</p>
            <p><span class="contact-tile">Horários:</span> 8:00 - 19:00</p>
          </div>
          <div class="col-md-4 contact-box">
          
            <p><span class="contact-tile">Envie um email:</span> rapitechsp2022@gmail.com </p>
          </div>
          <div class="col-md-4 contact-box">
           
            <p><span class="contact-tile">Venha nos conhecer:</span> Rua Lorem Ipsum - 1314</p>
          </div>



          <div class="col-md-6" id="msg-box">
            <p>Caso tenha alguma dúvida:</p>
            <img class="w-50" src="img/logo02.png" alt="">
          </div>
          <div class="col-md-6" id="contact-form">
          <form action="https://formsubmit.co/rapiteeech@gmail.com" method="POST">
              <input type="email" class="form-control" placeholder="E-mail" name="email"><br>
              <input type="text" class="form-control" placeholder="Assunto" name="subject">
              <textarea class="form-control" rows="3" placeholder="Sua mensagem..." name="message"></textarea>
            <input type="submit" class="main-btn">
            </form>
          </div>
        </div>
    </div>
  </div>
  <div id="copy-area">
    <div class="container">
      <div class="row">
          <div class="col-md-12">
            <p>Desenvolvido por <a href="#" target="_blank">RapTech</a> &copy; 2022</p>
            <p> Todos os direitos reservados.</p>
          </div>
      </div>
    </div>
  </div>
</footer>





  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
