<x-parts.header />
@auth
    <x-parts.sidebar />
@endauth
<main class="m-4 p-4 mt-5">

    <div class="pagetitle text-center mt-5">
        <h1>Olá! bem vindo ao clover!</h1>
    </div>
    <div class="row row-col row-cols-lg-3 my-5 py-5">

      <!-- First Card -->
        <div class="col">
            <div class="card info-card">

                <div class="card-body">
                    <h5 class="card-title text-center"><i class="h1 bi bi-journal"></i></h5>
                    <h5 class="card-title text-center">Organizado</h5>

                    <div class="d-flex align-items-center">
                      <p class="h5 text-center">
                      Mantenha suas finanças organizadas com nossa plataforma, que categoriza seus dados e oferece gráficos e relatórios detalhados.
                      </p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Second Card -->
        <div class="col">
            <div class="card info-card">

                <div class="card-body">
                    <h5 class="card-title text-center"><i class="h1 bi bi-star"></i></h5>
                    <h5 class="card-title text-center">Simples</h5>

                    <div class="d-flex align-items-center">
                      <p class="h5 text-center">
                        Nossa plataforma é simples, com uma interface fácil de usar e recursos descomplicados.
                      </p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Third Card -->
        <div class="col">
            <div class="card info-card">

                <div class="card-body">
                    <h5 class="card-title text-center"><i class="h1 bi bi-gear"></i></h5>
                    <h5 class="card-title text-center">Intuitivo</h5>

                    <div class="d-flex align-items-center">
                      <p class="h5 text-center">
                        Gerencie suas finanças de forma intuitiva com nossa plataforma adaptável, que permite acesso fácil a transações, contas e planejamento financeiro.
                      </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card border border-primary border-opacity-50 rounded">

                <div class="card-body">
                    <h5 class="card-title">Despesas <span>| Este mês</span></h5>

                    <div class="d-flex align-items-center">
                        <div
                            class="text-danger card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <h3 class="mt-2">R$</h3>
                        </div>
                        <div class="ps-3">
                            <h4>2,558</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card border border-primary border-opacity-50 rounded">

                <div class="card-body">
                    <h5 class="card-title">Receitas <span>| Este mês</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <div
                                class="text-success card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <h3 class="mt-2">R$</h3>
                            </div>
                            <div class="ps-3">
                                <h4>2,558</h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Reports -->
        <div class="col-12">
            <div class="card">

                <div class="card-body border border-primary border-opacity-50 rounded">
                    <h5 class="card-title">Grafico</h5>

                    <!-- Line Chart -->
                    <div id="reportsChart"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#reportsChart"), {
                                series: [{
                                    name: 'Despesas',
                                    data: ['10', '20', '30', '40', '50']
                                },{
                                    name: 'Receitas',
                                    data: ['50', '40', '30', '20', '10']
                                }],
                                chart: {
                                    type: 'bar',
                                    height: 350
                                },
                                plotOptions: {
                                    bar: {
                                        horizontal: false,
                                        columnWidth: '55%',
                                        endingShape: 'rounded'
                                    },
                                },
                                colors: ["#Be2525", "#25be30"],
                                dataLabels: {
                                    enabled: false
                                },
                                stroke: {
                                    show: true,
                                    width: 2,
                                    colors: ['transparent']
                                },
                                xaxis: {
                                    categories: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio'],
                                },
                                yaxis: {
                                    title: {
                                        text: 'R$'
                                    }
                                },
                                fill: {
                                    opacity: 1
                                },
                                tooltip: {
                                    y: {

                                    }
                                }

                            }).render();
                        });
                    </script>
                    <!-- End Line Chart -->

                </div>

            </div>
        </div><!-- End Reports -->

        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="card-body border border-primary border-opacity-50 rounded">
                    <h5 class="card-title">Inclusões recentes</h5>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Data</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"><a href="#">#1</a></th>
                                <td>02/03/2023</td>
                                <td><a href="#" class="text-primary">Lanche na esquina</a></td>
                                <td>R$ 64</td>
                                <td><span class="badge bg-danger">Despesa</span></td>
                            </tr>
                            <tr>
                                <th scope="row"><a href="#">#2</a></th>
                                <td>01/03/2023</td>
                                <td><a href="#" class="text-primary">Salário</a></td>
                                <td>R$ 1320</td>
                                <td><span class="badge bg-success">Receita</span></td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div><!-- End Recent Sales -->

    </div>

</main><!-- End #main -->
<x-parts.footer/>
