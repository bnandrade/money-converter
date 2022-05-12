<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Money Converter</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">

</head>
<body>
    <div class="flex items-center justify-center min-h-screen p-5 bg-blue-100 min-w-screen">
        <div class="max-w-xl p-8 text-center text-gray-800 bg-white shadow-xl lg:max-w-3xl rounded-3xl lg:p-12">
            <h3 class="text-2xl">Obrigado por utilizar nosso sistema!</h3>

            <p>Estamos felizes que tenha realizado a conversão de moeda com o Money Converter.<br>
                Segue abaixo as informações da sua conversão:</p>

                <div>Moedas de conversão: <b>{{$default_currency}}-{{$destination_currency}}</b></div>
                <div>Valor para conversão: <b>R$ {{number_format($value, '2',',','.')}}</b> </div>
                <div>Forma de pagamento: <b>{{$type_payment}}</b></div>
                <div>Cotação moeda destino: <b>$ {{$ask_value}}</b></div>
                <div>Valor comprado moeda destino: <b>$ {{number_format($destination_value, '2',',','.')}}</b></div>
                <div>Taxa de pagamento: <b>R$ {{number_format($payment_rate_value, '2',',','.')}}</b></div>
                <div>Taxa de conversão: <b>R$ {{number_format($conversion_rate_value, '2',',','.')}}</b></div>
                <div>Valor utilizado para conversão: <b>R$ {{number_format($default_value, '2',',','.')}}</b></div>

            <div>
                <p class="mt-4 text-sm">
                    {{$usermessage}}
                </p>
                <p class="mt-4 text-sm">
                    {{$username}}
                </p>
            </div>
        </div>
    </div>

</body>
</html>
