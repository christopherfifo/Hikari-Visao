<div class="overlay obj">
          <div class="overlay-panel overlay-left">

          <main class="senha_container obj">
              <section class="senha_dados">
                <div class="senha_dados-info especial">
                  <div class="senha_title">
                    <p class="title_gerador">
                      <?php echo $nomes[0]; ?>
                      <span class="senha_mostrar" id="mostrar"></span>
                    </p>
                  </div>
                  <div class="senha_tamanho">
                    <input
                      class="senha_linha"
                      type="range"
                      name=""
                      id="senha-linha"
                      min="8"
                      max="25"
                      value="8"
                    />
                    <input
                      class="senha_caixa"
                      type="number"
                      name=""
                      id="senha-caixa"
                      min="8"
                      max="25"
                      value="8"
                    />
                  </div>
                </div>
                <div class="senha_dados-info">
                  <p class="title_gerador"><?php echo $nomes[1]; ?> </p>
                  <input
                    class="senha-marcavel"
                    type="checkbox"
                    name=""
                    id="maiscula"
                  />
                </div>
                <div class="senha_dados-info">
                  <p class="title_gerador"><?php echo $nomes[2]; ?></p>
                  <input
                    class="senha-marcavel"
                    type="checkbox"
                    name=""
                    id="minuscula"
                  />
                </div>
                <div class="senha_dados-info">
                  <p class="title_gerador"><?php echo $nomes[3]; ?></p>
                  <input
                    class="senha-marcavel"
                    type="checkbox"
                    name=""
                    id="numero"
                  />
                </div>
                <div class="senha_dados-info">
                  <p class="title_gerador"><?php echo $nomes[4]; ?></p>
                  <input
                    class="senha-marcavel"
                    type="checkbox"
                    name=""
                    id="simbolo"
                  />
                </div>

                <div class="senha_button">
                  <button class="senha-btn obj" id="gerar"><?php echo $nomes[5]; ?></button>
                </div>
              </section>

              <section class="senha">
                <div class="senha_lugar">
                  <p class="senha_texto" id="password"></p>
                </div>
                <div class="senha_button">
                  <button class="senha-btn btn-copiar obj" id="copiar">
                  <?php echo $nomes[6]; ?>
                  </button>
                </div>
              </section>
            </main>


            <h1 class="title gerador-local"><?php echo $nomes[7]; ?></h1>
            <p class="gerador-local p_description">
              <?php echo $nomes[8]; ?>
            </p>
            <button class="ghost gerador-local" id="login">
            <?php echo $nomes[9]; ?><i class="login fa-solid fa-arrow-left"></i>
            </button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1 class="title"><?php echo $nomes[10]; ?></h1>
            <p class="p_description">
            <?php echo $nomes[11]; ?>
          </p>
            <button class="ghost" id="register">
            <?php echo $nomes[12]; ?><i class="register fa-solid fa-arrow-right"></i>
            </button>
          </div>
        </div>
