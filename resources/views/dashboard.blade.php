<x-parts.header />
<x-parts.sidebar />
@php
    use Carbon\Carbon;
@endphp
<main id="main" class="main min-vh-100">

    <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card border border-primary border-opacity-50 rounded">

                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title text-nowrap">Despesas</h5>
                        <form action="{{ route('reports.expense') }}" method="post">
                            @csrf
                            <input type="hidden" name="datainicialreceitas" value="{{ $startDateIncomes }}">
                            <input type="hidden" name="datafinalreceitas" value="{{ $endDateIncomes }}">
                            <div class="input-group-sm m-2 text-primary">
                                <input type="date" name="datainicialdespesas" class="form-control mb-2"
                                    value="{{ $startDateExpenses }}">
                                <input type="date" name="datafinaldespesas" class="form-control"
                                    value="{{ $endDateExpenses }}">
                            </div>
                            <button class="btn btn-sm btn-primary w-100" type="submit">
                                Atualizar
                            </button>
                        </form>
                    </div>
                    <div class="d-flex align-items-center">
                        <div
                            class="text-danger card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <h3 class="mt-2">R$</h3>
                        </div>
                        <div class="ps-3">
                            <h4>{{ $totalExpense }}</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card border border-primary border-opacity-50 rounded">

                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title text-nowrap">Receitas</h5>
                        <form action="{{ route('reports.income') }}" method="post">
                            @csrf
                            <input type="hidden" name="datainicialdespesas" value="{{ $startDateExpenses }}">
                            <input type="hidden" name="datafinaldespesas" value="{{ $endDateExpenses }}">
                            <div class="input-group-sm m-2 text-primary">
                                <input type="date" name="datainicialreceitas" class="form-control mb-2"
                                    value="{{ $startDateIncomes }}">
                                <input type="date" name="datafinalreceitas" class="form-control"
                                    value="{{ $endDateIncomes }}">
                            </div>
                            <button class="btn btn-sm btn-primary w-100" type="submit">
                                Atualizar
                            </button>
                        </form>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <div
                                class="text-success card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <h3 class="mt-2">R$</h3>
                            </div>
                            <div class="ps-3">
                                <h4>{{ $totalIncome }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-xxl-4 col-md-6">
            <div class="card info-card border border-danger border-opacity-50 table-responsive rounded" style="height: 240px;">
                <table class="table table-sm m-3">
                    <thead>
                        <tr>
                            <th class="d-none" scope="col">#</th>
                            <th scope="col">Data</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expenses as $t)
                            <tr>
                                <th class="d-none" scope="row"><a href="#">#{{ $t->id }}</a></th>
                                <td>{{ Carbon::parse($t->date)->format('d/m/Y') }}</td>
                                <td><a href="#" class="text-primary">{{ $t->description }}</a></td>
                                <td>R${{ $t->amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-xxl-4 col-md-6">
            <div class="card info-card border border-success border-opacity-50 table-responsive rounded" style="height: 240px;">
                <table class="table table-sm m-3">
                    <thead>
                        <tr>
                            <th class="d-none" scope="col">#</th>
                            <th scope="col">Data</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($incomes as $t)
                            <tr>
                                <th class="d-none" scope="row"><a href="#">#{{ $t->id }}</a></th>
                                <td>{{ Carbon::parse($t->date)->format('d/m/Y') }}</td>
                                <td><a href="#" class="text-primary">{{ $t->description }}</a></td>
                                <td>R${{ $t->amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                                    data: [2.558, 1000, 500],
                                }, {
                                    name: 'Receitas',
                                    data: [2.558, 2000, 1000]
                                }],
                                chart: {
                                    height: 350,
                                    type: 'area',
                                    toolbar: {
                                        show: false
                                    },
                                },
                                markers: {
                                    size: 4
                                },
                                colors: ['#4154f1', '#2eca6a'],
                                fill: {
                                    type: "gradient",
                                    gradient: {
                                        shadeIntensity: 1,
                                        opacityFrom: 0.3,
                                        opacityTo: 0.4,
                                        stops: [0, 90, 100]
                                    }
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                stroke: {
                                    curve: 'smooth',
                                    width: 2
                                },
                                xaxis: {
                                    type: 'datetime',
                                    categories: ["2023-01-01", "2023-02-01", "2023-03-01"]
                                },
                                tooltip: {
                                    x: {
                                        format: 'dd/MM/yy'
                                    },
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
            <div class="table-responsive">

                <div class="card-body border border-primary border-opacity-50 rounded">
                    <h5 class="card-title">Inclusões recentes</h5>

                    <table class="table table-sm m-3">
                        <thead>
                            <tr>
                                <th class="d-none" scope="col">#</th>
                                <th scope="col">Data</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $t)
                                <tr>
                                    <th class="d-none" scope="row"><a href="#">#{{ $t->id }}</a></th>
                                    <td>{{ Carbon::parse($t->date)->format('d/m/Y') }}</td>
                                    <td><a href="#" class="text-primary">{{ $t->description }}</a></td>
                                    <td>R${{ $t->amount }}</td>
                                    @if ($t->type == 'income')
                                        <td><span class="badge bg-success">Receita</span></td>
                                    @else
                                        <td><span class="badge bg-danger">Despesa</span></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div><!-- End Recent Sales -->

    </div>

</main>
<x-parts.footer />
