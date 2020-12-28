<html>
<title>Checkout</title>

<head>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-YnUnIBEfr1vIrZqC">
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>


    <form id="payment-form" method="post" action="{{route('midtrans.finish')}}">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <input type="hidden" name="result_type" id="result-type" value=""></div>
        <input type="hidden" name="result_data" id="result-data" value=""></div>
    </form>

    <button id="pay-button">Pay!</button>
    <script type="text/javascript">
        $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");
    
    $.ajax({
      
      url: 'http://127.0.0.1:8000/midtrans/token',
      cache: false,
      success: function(data) {
        //location = data;
        console.log('token = '+data);
        
      
        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }
        snap.pay(data, {
     
          onSuccess: function(result){
          ;
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          }
        });
      }
    });
  });
    </script>


</body>

</html>