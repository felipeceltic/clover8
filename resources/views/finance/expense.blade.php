<x-parts.header />
<x-parts.sidebar />
<main id="main" class="main min-vh-100">
  <section class="section">
    <div class="row">
      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Inclusão de despesas</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="POST" action="{{ route('finance.expense.store') }}">
              @csrf
              <div class="col-12">
                <div class="form-floating border border-primary border-opacity-75 rounded">
                  <input type="date" class="form-control" id="date" name="date" required autofocus>
                  <label for="date">Data de vencimento</label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating border border-primary border-opacity-75 rounded">
                  <input type="text" class="form-control" id="description" name="description" placeholder="Descrição da despesa">
                  <label for="description">Descrição da despesa</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating border border-primary border-opacity-75 rounded">
                  <input type="number" step="0.01" class="form-control" id="amount" name="amount" placeholder="R$ 99.99" required>
                  <label for="amount">Valor da despesa</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating border border-primary border-opacity-75 rounded">
                  <input type="number" step="1" class="form-control" id="repeat" name="repeat" placeholder="3">
                  <label for="repeat">Quantidade de parcelas</label>
                </div>
              </div>
              <div class="text-center d-flex justify-content-between">
                <button type="reset" class="btn btn-outline-secondary">Limpar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
              </div>
            </form><!-- End floating Labels Form -->

          </div>
        </div>

      </div>
    </div>
  </section>
</main>
<x-parts.footer />