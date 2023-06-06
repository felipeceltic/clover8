<x-parts.head />
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
                                    <h5 class="card-title text-center pb-0 fs-4">Recupere sua senha</h5>
                                    <p class="text-center small">Insira seu e-mail para receber o link</p>
                                </div>
                                <form class="row g-3 needs-validation" method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">E-mail</label>
                                        <div class="input-group has-validation">
                                            <input type="email" name="email"
                                                class="form-control border border-primary" id="email"
                                                :value="old('email')" required autofocus>
                                            <div class="invalid-feedback">Por favor insira seu e-mail!</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Enviar link de recuperação</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Não possui conta? <a href="{{ route('register') }}">Crie
                                                agora!</a></p>
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