<div class="form-container register-container">
        <form
          action="../backend/loginRegister.php"
          method="POST"
          id="form"
          class="form_register"
        >
          <h1 class="problema"> Registre aqui</h1>
          <div class="espaco-input">
            <input
              type="text"
              name="name"
              placeholder="Name"
              class="required input-register"
            />
            <span class="error_span"></span>
          </div>
          <div class="espaco-input">
            <input
              type="email"
              name="email"
              placeholder="Email"
              class="required input-register"
            />
            <span class="error_span"></span>
          </div>
          <div class="espaco-input">
            <input
              type="tel"
              name="telefone"
              placeholder="Numero de telefone"
              class="required input-register"
            />
            <span class="error_span"></span>
          </div>
          <div class="espaco-input">
            <div class="espaco-senha">
              <input
                type="password"
                name="password"
                placeholder="Password"
                class="required input-register senha-copy"
              />
              <i class="fa-regular fa-eye olhos obj"></i>
            </div>
            <span class="error_span"></span>
          </div>
          <div class="espaco-input">
            <div class="espaco-senha">
              <input
                type="password"
                name="password_confirm"
                placeholder="Confirm Password"
                class="required input-register senha-copy"
              />
              <i class="fa-regular fa-eye olhos obj"></i>
            </div>
            <div class="gerar-senha">
              <span class="title-senha size-span"
                >Gere a sua senha:
                <button class="senha_btn obj">
                  <i class="fa-solid fa-lock"></i>
                </button>
              </span>
              <span class="error_span size-span"></span>
            </div>
          </div>
          <button type="submit" id="vali_register" class="rl-tema obj">
            Registrar
          </button>
          <div class="social-container obj">
            <a href="#" class="social obj"
              ><i class="fa-brands fa-facebook"></i
            ></a>
            <!-- talvez tenha a classe lni -->
            <a href="#" class="social obj"
              ><i class="fa-brands fa-google"></i
            ></a>
            <a href="#" class="social obj"
              ><i class="fa-brands fa-linkedin"></i
            ></a>
            <a href="#" class="social obj"
              ><i class="fa-brands fa-github"></i
            ></a>
          </div>
        </form>
      </div>