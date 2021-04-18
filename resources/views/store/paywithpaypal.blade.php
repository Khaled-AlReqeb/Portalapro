<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pay-Pal</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="w3-container">
        @if($message = Session::get('success'))
        <div class="w3-panel w3-green w3-display-container">
            <span onclick="this.parentElement.style.display = 'name'" class="w3-button w3-green w3-large w3-display-topright">&times;</span>
            <p>{!! $message !!}</p>
        </div>
        <?php Session::forget('success');?>
        @endif

            @if($message = Session::get('error'))
                <div class="w3-panel w3-red w3-display-container">
                    <span onclick="this.parentElement.style.display = 'name'" class="w3-button w3-red w3-large w3-display-topright">&times;</span>
                    <p>{!! $message !!}</p>
                </div>
                <?php Session::forget('error');?>
            @endif
</div>


<form class="w3-container w3-display-middle w3-card-4 w3-padding-16" method="POST" id="payment-form" action="{!! URL::to('paypal') !!}">
    <div class="w3-container w3-teal w3-padding-16">PaywithPAYPAL</div>
    {{ csrf_field() }}
    <h2 class="w3-text-blue">Payment Form</h2>
    <p>Test PayPal form - portal assignment</p>
    <label class="w3-text-blue"><b>Enter Account</b></label>
    <input class="w3-input w3-border" id="amount" type="text" name="amount">
    <button class="w3-btn w3-blue">Pay With PayPal</button>

</form>
</body>
</html>
