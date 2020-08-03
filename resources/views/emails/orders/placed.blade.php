@component('mail::message')
    # Order Received

    Thank you for your order.

    **Order ID:** {{ $order->id }}

    **Order Email:** {{ $order->billing_email }}

    **Order Email:** {{ $order->billing_name }}

    **Order Total:** € {{ number_format($order->billing_total, 2) }}

    **Items Ordered**

    @foreach ($order->products as $product)

        Name: {{ $product->name }}
        Price: €{{ number_format($product->price, 2)}}
        Quantity: {{ $product->pivot->quantity }}
    @endforeach

    You can get further details about your order by logging into our website.

    @component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
        Go to Website
    @endcomponent

    Thank you again for choosing us.

    Regards,<br>
    Team {{ config('app.name') }}
@endcomponent