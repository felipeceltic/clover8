<x-parts.head/>
<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Clover</span>
                </a>
              </div>

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Crie sua conta</h5>
                    <p class="text-center small">Insira seus da dos para criar uma conta</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="col-12">
                      <label for="name" class="form-label">Seu nome</label>
                      <input type="text" name="name" class="form-control border border-primary" id="name" required  autofocus>
                    </div>

                    <div class="col-12">
                      <label for="email" class="form-label">Seu e-mail</label>
                      <input type="email" name="email" class="form-control border border-primary" id="email" required>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Senha</label>
                      <input type="password" name="password" class="form-control border border-primary" id="password" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                        <label for="password_confirmation" class="form-label">Confirme a senha</label>
                        <input type="password" name="password_confirmation" class="form-control border border-primary" id="password_confirmation" required>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input border border-primary" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">Eu concordo e aceito os <a href="#">termos de uso</a></label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Criar conta</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Já possui uma conta? <a href="{{ route('login') }}">Entre aqui!</a></p>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>