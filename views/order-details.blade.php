<div class="order-details">
    <h3>Invoice: {{$order['INVOICE']}}</h3>
    <hr>
    <p>
        Description: {{$order['DESCR']}}
    </p>
    <hr>
    <p>
        Total Amount: {{number_format($order['AMOUNT'], 2)}}
    </p>
    <hr>
    <p>
        Expiration Date: {{date('d/m/Y', strtotime($order['EXP_TIME']))}}
    </p>
</div>
