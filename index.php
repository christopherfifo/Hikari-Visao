<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="./css/clinica.css" />
    <script src="./libraries/javascript/clinica.js" defer></script>
    <title>nft</title>
  </head>
  <body>
    <div class="bg">
      <header id="top" class="header">
        <span class="header__logo">Japa Olho Puxado</span>

        <nav class="header__nav">
          <ul class="nav__ul">
            <li class="nav__li"><a class="nav__a" href="http://localhost/projeto-clinica/pages/login.php">Login</a></li>
            <li class="nav__li"><a class="nav__a" href="#">Sobre nós</a></li>
            <li class="nav__li"><a class="nav__a" href="#">Nosso time</a></li>
            <li class="nav__li"><a class="nav__a" href="#">Contato</a></li>
          </ul>
        </nav>
        <button class="header__icon-btn">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="header__icon"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
            />
          </svg>
        </button>
      </header>

      <section class="hero">
        <div class="hero__left">
          <span class="hero__up">Cuide da sua visão</span>
          <h1 class="hero__title">Bem-vindo à Clínica Japa Olho Puxado</h1>
          <h2 class="hero__description">
          Especialistas em oftalmologia para cuidar da saúde dos seus olhos.
          </h2>
          <button class="hero__btn">Descubra</button>
        </div>
        <div class="hero__right">
          <img class="hero__img" src="./pictures/index/fada.png" alt="fada" />
        </div>
      </section>
    </div>

    <section class="info">
      <div class="line"></div>
      <div class="itens-wrapper">
        <div class="item">
          <div class="item__title">1k+</div>
          <div class="item__description">Pacientes atendidos</div>
        </div>
        <div class="item">
          <div class="item__title">15M</div>
          <div class="item__description">Convênios aceitos</div>
        </div>
        <div class="item">
          <div class="item__title">4.9</div>
          <div class="item__description">Avaliação média</div>
        </div>
        <div class="item">
          <div class="item__title">20+</div>
          <div class="item__description">Especialistas</div>
        </div>
      </div>

      <div class="info-wrapper">
        <div class="info__left">
          <img src="./pictures/index/img1.png" alt="" />
        </div>
        <div class="info__right">
          <div class="section__up-text">Nossa missão</div>
          <div class="section__title">Cuidar da sua visão com excelência</div>
          <div class="section__description">
          Oferecemos atendimento personalizado e equipamentos modernos para diagnósticos precisos e tratamentos eficazes.
          </div>
          <button class="section__btn">Saiba mais</button>
        </div>
      </div>
    </section>

    <section class="features">
      <div class="features-wrapper">
        <div class="features__text">
          <div class="section__up-text">Nossos diferenciai</div>
          <div class="section__title">Atendimento de qualidade</div>
          <div class="section__description features--description">
          Oferecemos um ambiente acolhedor e uma equipe dedicada para garantir a melhor experiência para nossos pacientes.

          </div>
        </div>
        <div class="features__cards">
          <div class="features__card">
            <img
              class="features__card-img"
              src="./pictures/index/feature-icon.png"
              alt=""
            />
            <div class="feature__card-title">Unimed</div>
            <div class="feature__card-description">
            Atendemos pelo plano Unimed, com ampla cobertura oftalmológica.
            </div>
          </div>
          <div class="features__card">
            <img
              class="features__card-img"
              src="./pictures/index/feature-icon.png"
              alt=""
            />
            <div class="feature__card-title">Bradesco Saúde</div>
            <div class="feature__card-description">
            Consulte nossa equipe utilizando o plano Bradesco Saúde.
            </div>
          </div>
          <div class="features__card">
            <img
              class="features__card-img"
              src="./pictures/index/feature-icon.png"
              alt=""
            />
            <div class="feature__card-title">Amil</div>
            <div class="feature__card-description">
            Atendimento oftalmológico completo pelo plano Amil.
            </div>
          </div>
          <div class="features__card">
            <img
              class="features__card-img"
              src="./pictures/index/feature-icon.png"
              alt=""
            />
            <div class="feature__card-title">SulAmérica</div>
            <div class="feature__card-description">
            Pacientes SulAmérica têm acesso aos nossos serviços especializados.
            </div>
          </div>
          <div class="features__card">
            <img
              class="features__card-img"
              src="./pictures/index/feature-icon.png"
              alt=""
            />
            <div class="feature__card-title">CASSI</div>
            <div class="feature__card-description">
            Oferecemos consultas e tratamentos para clientes CASSI.
            </div>
          </div>
          <div class="features__card">
            <img
              class="features__card-img"
              src="./pictures/index/feature-icon.png"
              alt=""
            />
            <div class="feature__card-title">Itaú</div>
            <div class="feature__card-description">
            Atendimento disponível para clientes do plano Itaú.
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="info2">
  <div class="info2-wrapper">
    <div class="info2--flex1">
      <img class="info2__img" src="./pictures/index/img2.png" alt="Imagem de um exame ocular" />
    </div>
    <div class="info2--flex1">
      <div class="section__up-text">Nossa Especialidade</div>
      <div class="section__title">Cuidado e Excelência em Oftalmologia</div>
      <div class="section__description">
        Nossa clínica oferece serviços completos para a saúde dos seus olhos, com exames de última geração, diagnósticos precisos e tratamentos avançados. Com uma equipe de especialistas altamente qualificados, cuidamos da sua visão com atenção e profissionalismo.
      </div>
      <button class="hero__btn">Agende uma Consulta</button>
    </div>
  </div>

  <div class="info2-wrapper">
    <div class="info2--flex1 info2--img">
      <div class="info2__size-img">
        <img class="info2__img slider" src="./pictures/index/img2.png" alt="Imagem de um exame ocular" />
        <img class="info2__img slider" src="./pictures/index/img1.png" alt="Imagem de consulta oftalmológica" />
      </div>
      <div class="info2__btn2">
        <button class="info2__btn-img" id="prev">
          <i class="fa-solid fa-arrow-left seta"></i>
        </button>
        <button class="info2__btn-img" id="next">
          <i class="fa-solid fa-arrow-right seta"></i>
        </button>
      </div>
    </div>
    <div class="info2--flex1">
      <div class="section__up-text">Nossos Serviços</div>
      <div class="section__title">Exames e Tratamentos Completo</div>
      <div class="section__description">
        Oferecemos uma ampla gama de serviços, desde exames de rotina, diagnóstico de doenças oculares, até tratamentos cirúrgicos como cirurgia de catarata e correção de miopia. Garantimos um atendimento humanizado e de qualidade para todos os nossos pacientes.
      </div>
      <button class="info2__btn">
        Saiba mais
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="info2__btn-icon">
          <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
        </svg>
      </button>
    </div>
  </div>
</section>

<section class="registro">
  <div class="registro-container">
    <div class="registro__left">
      <div class="section__title registro__title">
        Agende sua consulta e cuide da sua visão com a gente.
      </div>
      <div class="section__description">
        Nossos especialistas estão prontos para oferecer o melhor tratamento e cuidados para a sua saúde ocular.
      </div>
    </div>
    <div class="registro__right">
      <button class="registro__btn">Agende agora</button>
    </div>
  </div>
</section>

<section class="depoimento">
  <div class="depoimento__size">
    <div class="depoimento__left">
      <div class="section__up-text depoimento__up-text">O que dizem nossos pacientes</div>
      <div class="section__title depoimento__title">
        Histórias de sucesso e satisfação com nosso atendimento.
      </div>
    </div>
    <div class="depoimento__right">
      <div class="depoimento__star">
        <i class="fa-solid fa-star depoimento-estrela"></i>
        <i class="fa-solid fa-star depoimento-estrela"></i>
        <i class="fa-solid fa-star depoimento-estrela"></i>
        <i class="fa-solid fa-star depoimento-estrela"></i>
        <i class="fa-solid fa-star depoimento-estrela"></i>
      </div>
      <h2 class="depoimento__description">
        "Excelente atendimento e profissionais que fazem toda a diferença na saúde ocular. Recomendo a todos!"
      </h2>
      <div class="depoimento__final">
        <div class="depoimento__letras">
          <div class="section__title depoimento__name">Maria S.</div>
          <div class="depoimento__description depoimento--description2">
            Paciente satisfeita
          </div>
        </div>
        <img src="./pictures/index/avatar.avif" class="depoimento__img" alt="Foto de Maria S." />
      </div>
    </div>
  </div>
</section>

<section class="video">
  <div class="video__size">
    <img class="video-video" src="./pictures/index/koi.webp" alt="Imagem de vídeo sobre cuidados com a visão" />
  </div>
</section>

<section class="agora">
  <div class="agora__size">
    <div class="agora__contencao">
      <div class="section__title">Cuide da sua visão hoje mesmo.</div>
      <div class="section__description agora__description">
        Estamos aqui para ajudar você a manter sua saúde ocular em dia. Agende uma consulta com nossos especialistas e conheça nossos serviços.
      </div>
      <button class="hero__btn">Agende sua consulta</button>
    </div>
  </div>
</section>

<footer class="end">
  <div class="end__size">
    <div class="end__contencao">
      <div class="end__divisao end__divisao1">
        <div class="section__title">Clínica Oftalmológica</div>
        <div class="section__description end__description">
          Seu parceiro para uma visão saudável e de qualidade. Com tecnologia de ponta e uma equipe dedicada, oferecemos os melhores cuidados oculares.
        </div>
      </div>

      <div class="end__divisao end__divisao2">
        <div class="contact-info">
          <h4 class="end__tile">CONTATE-NOS</h4>
          <p>123 Rua da Saúde, Cidade, Estado</p>
          <p>Telefone: <strong class="contact-info-s">(11) 1234-5678</strong></p>
          <p>contato@clinicaoftalmo.com</p>
        </div>
      </div>

      <div class="end__divisao end__divisao3">
        <div class="subscribe-info">
          <h4 class="end__tile">ASSINE NOSSAS NOVIDADES</h4>
          <div class="subscribe__form">
            <input class="subscribe__form-input" type="email" placeholder="Seu e-mail" />
            <button class="subscribe__form-btn" type="submit">Cadastrar</button>
          </div>
          <p>Receba atualizações e novidades sobre cuidados com a visão.</p>
        </div>
      </div>
    </div>
    <div class="line"></div>
    <div class="end__final">
      <div class="section__description">
        Copyright @2024 Clínica Oftalmológica. Todos os direitos reservados.
      </div>

      <nav class="end__nav">
        <ul class="end__ul">
          <li class="end__li"><a class="end__a" href="#top">Serviços</a></li>
          <li class="end__li"><a class="end__a" href="#">Sobre nós</a></li>
          <li class="end__li"><a class="end__a" href="#">Equipe</a></li>
          <li class="end__li"><a class="end__a" href="#">Contato</a></li>
        </ul>
      </nav>
    </div>
  </div>
</footer>

  </body>
</html>
