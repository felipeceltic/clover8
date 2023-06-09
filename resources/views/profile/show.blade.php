<x-parts.header/>
<x-parts.sidebar/>
<main id="main" class="main min-vh-100">
<div class="pagetitle">
  <h1>Perfil</h1>
</div><!-- End Page Title -->
<x-parts.errors/>
<section class="section profile">
  <div class="row">

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-overview">Resumo</button>
            </li>

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar perfil</button>
            </li>

            {{-- <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Configurações</button>
            </li> --}}

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Alterar senha</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade profile-overview pt-3" id="profile-overview">

              <div class="rounded-circle overflow-hidden" style="width: 96px; height: 96px;">
                <img src="{{ Auth::user()->profile_image }}" class="img-fluid h-100 w-100" alt="Imagem de perfil">
              </div>

              <div class="row mt-5">
                <div class="col-lg-3 col-md-4 label ">Nome</div>
                <div class="col-lg-9 col-md-8">{{Auth::user()->name}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">E-mail</div>
                <div class="col-lg-9 col-md-8">{{Auth::user()->email}}</div>
              </div>

            </div>

            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">
              <div class="rounded-circle overflow-hidden" style="width: 96px; height: 96px;">
                <img src="{{ Auth::user()->profile_image }}" class="img-fluid h-100 w-100" alt="Imagem de perfil">
              </div>
              <!-- Profile Edit Form -->
              <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3 mt-5">
                  <div class="input-group">
                    <label class="input-group-text ps-0 pe-3 me-2" for="profileImage">Imagem de perfil</label>
                    <input type="file" class="form-control" id="profileImage" name="profileImage">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="name" class="col-md-4 col-lg-3 col-form-label">Nome</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="name" type="text" class="form-control" id="name" value="{{Auth::user()->name}}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="email" class="col-md-4 col-lg-3 col-form-label">E-mail</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="text" class="form-control" id="email" value="{{Auth::user()->email}}">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="text-end">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                  </div>
                </div>
              </form><!-- End Profile Edit Form -->

            </div>

            {{-- <div class="tab-pane fade pt-3" id="profile-settings">

              <!-- Settings Form -->
              <form>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                  <div class="col-md-8 col-lg-9">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="changesMade" checked>
                      <label class="form-check-label" for="changesMade">
                        Changes made to your account
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="newProducts" checked>
                      <label class="form-check-label" for="newProducts">
                        Information on new products and services
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="proOffers">
                      <label class="form-check-label" for="proOffers">
                        Marketing and promo offers
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                      <label class="form-check-label" for="securityNotify">
                        Security alerts
                      </label>
                    </div>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form><!-- End settings Form -->

            </div> --}}

            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form action="{{route('user.password.update')}}" method="POST">
                @csrf
                <div class="row mb-3">
                  <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Senha atual</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="current_password" type="password" class="form-control" id="current_password" value="{{ old('current_password') }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="password" class="col-md-4 col-lg-3 col-form-label">Nova senha</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="password" value="{{ old('password') }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label text-nowrap">Confirme sua senha</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" value="{{ old('password_confirmation') }}">
                  </div>
                </div>

                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Atualizar senha</button>
                </div>
              </form><!-- End Change Password Form -->

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>
</main>
<x-parts.footer/>