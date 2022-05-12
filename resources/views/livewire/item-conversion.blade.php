<tr class="hover:bg-gray-100">
    <td class=" border border-light-blue-500 px-4 py-2 text-light-blue-600 text-xs">{{$conversion->created_at}}</td>
    <td class=" border border-light-blue-500 px-4 py-2 text-light-blue-600 text-xs">{{$conversion->default_currency}}-{{$conversion->destination_currency}}</td>
    <td class=" border border-light-blue-500 px-4 py-2 text-light-blue-600 text-xs">
        R$ {{number_format($conversion->value, '2',',','.')}}<br>
        (Taxa: {{$conversion->conversion_rate*100}}%)
    </td>
    <td class=" border border-light-blue-500 px-4 py-2 text-light-blue-600 text-xs">
        {{$conversion->type_payment}}<br>
        (Taxa: {{$conversion->payment_rate*100}}%)
    </td>
    <td class=" border border-light-blue-500 px-4 py-2 text-light-blue-600 text-xs">$ {{$conversion->ask_value}}</td>
    <td class=" border border-light-blue-500 px-4 py-2 text-light-blue-600 text-xs">$ {{number_format($conversion->destination_value, '2',',','.')}}</td>
    <td class=" border border-light-blue-500 px-4 py-2 text-light-blue-600 text-xs">
        Conversão: R$ {{number_format($conversion->conversion_rate_value, '2',',','.')}}<br>
        Pagamento: R$ {{number_format($conversion->payment_rate_value, '2',',','.')}}
    </td>
    <td class=" border border-light-blue-500 px-4 py-2 text-light-blue-600 text-xs">$ {{number_format($conversion->default_value, '2',',','.')}}</td>
</tr>
