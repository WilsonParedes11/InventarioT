<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>POS Dash</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/backend-plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/backend.css?v=1.0.0') }}">
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/remixicon/fonts/remixicon.css') }}">
</head>
<body>

    <!-- Inicio del Envoltorio -->
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-block">
                        <div class="card-header d-flex justify-content-between bg-primary">
                            <div class="iq-header-title">
                                <h4 class="card-title mb-0">Factura #1234567</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <img src="{{ asset('assets/images/logo.png') }}" class="logo-invoice img-fluid mb-3">
                                    <h5 class="mb-3">Hola, {{ $customer->name }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive-sm">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Fecha del Pedido</th>
                                                    <th scope="col">Estado del Pedido</th>
                                                    <th scope="col">Número de Factura</th>
                                                    <th scope="col">Dirección de Facturación</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>17 de enero de 2016</td>
                                                    <td><span class="badge badge-danger">No pagado</span></td>
                                                    <td>250028</td>
                                                    <td>
                                                        <p class="mb-0">{{ $customer->address }}<br>
                                                            Nombre de la Tienda: {{ $customer->shopname ? $customer->shopname : '-' }}<br>
                                                            Teléfono: {{ $customer->phone }}<br>
                                                            Correo Electrónico: {{ $customer->email }}<br>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="mb-3">Resumen del Pedido</h5>
                                    <div class="table-responsive-lg">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" scope="col">#</th>
                                                    <th scope="col">Artículo</th>
                                                    <th class="text-center" scope="col">Cantidad</th>
                                                    <th class="text-center" scope="col">Precio</th>
                                                    <th class="text-center" scope="col">Totales</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($content as $item)
                                                <tr>
                                                    <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                                    <td>
                                                        <h6 class="mb-0">{{ $item->name }}</h6>
                                                    </td>
                                                    <td class="text-center">{{ $item->qty }}</td>
                                                    <td class="text-center">{{ $item->price }}</td>
                                                    <td class="text-center"><b>{{ $item->subtotal }}</b></td>
                                                </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <b class="text-danger">Notas:</b>
                                    <p class="mb-0">Es un hecho establecido de hace mucho tiempo que un lector se distraerá con el contenido legible de una página
                                        al mirarla
                                        en su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de letras,
                                        en lugar de usar 'Contenido aquí, contenido aquí', lo que lo hace parecer inglés legible.</p>
                                </div>
                            </div>
                            <div class="row mt-4 mb-3">
                                <div class="offset-lg-8 col-lg-4">
                                    <div class="or-detail rounded">
                                        <div class="p-3">
                                            <h5 class="mb-3">Detalles del Pedido</h5>
                                            <div class="mb-2">
                                                <h6>Banco</h6>
                                                <p>{{ $customer->bank_name }}</p>
                                            </div>
                                            <div class="mb-2">
                                                <h6>Núm. de Cuenta</h6>
                                                <p>{{ $customer->account_number }}</p>
                                            </div>
                                            <div class="mb-2">
                                                <h6>Fecha de Vencimiento</h6>
                                                <p>12 de agosto de 2020</p>
                                            </div>
                                            <div class="mb-2">
                                                <h6>Sub Total</h6>
                                                <p>${{ Cart::subtotal() }}</p>
                                            </div>
                                            <div>
                                                <h6>IVA (5%)</h6>
                                                <p>${{ Cart::tax() }}</p>
                                            </div>
                                        </div>
                                        <div class="ttl-amt py-2 px-3 d-flex justify-content-between align-items-center">
                                            <h6>Total</h6>
                                            <h3 class="text-primary font-weight-700">${{ Cart::total() }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin del Envoltorio -->

    <script>
    window.addEventListener("load", (event) => {
        window.print();
    });
    </script>
</body>
</html>
