<div class="form-container login-container">
        <form
          action="../backend/loginApi.php"
          method="POST"
          class="form_login"
          id="formLogin"
        >
          <h1>Login</h1>
          <input
            type="email"
            id="accessInput"
            name="email"
            placeholder="Email ou Telefone"
            class="inputs_login"
          />
          <div class="espaco-senha">
            <input
              type="password"
              name="password"
              placeholder="Password"
              class="inputs_login"
              id="senha_entrar"
            />
            <i class="fa-regular fa-eye olhos obj"></i>
          </div>
          <div class="content">
            <div class="checkbox">
              <input type="checkbox" id="rememberCheckbox" name="checkbox" />
              <label for="remember-me">lembre-me</label>
            </div>
            <div class="pass-link">
              <a class="obj" href="../../../../aula_php/pages/esqueci.php">Esqueceu a senha?</a>
            </div>
          </div>
          <button type="submit" class="rl-tema obj" id="vali_login">
            Login
          </button>
          <div class="social-container obj">
            <a href="#" class="social obj"
              ><i class="fa-brands fa-facebook"></i
            ></a>
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