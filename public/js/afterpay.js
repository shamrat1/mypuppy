document.getElementById("afterpay-button").addEventListener("click", function() {
    AfterPay.initialize({countryCode: "AU"});
    // To avoid triggering browser anti-popup rules, the AfterPay.open()
    // function must be directly called inside the click event listener
    AfterPay.open();
    // If you don't already have a checkout token at this point, you can
    // AJAX to your backend to retrieve one here. The spinning animation
    // will continue until `AfterPay.transfer` is called.
    // If you fail to get a token you can call AfterPay.close()
    AfterPay.onComplete = function(event) {
      if (event.data.status == "SUCCESS") {
        // The consumer confirmed the payment schedule.
        // The token is now ready to be captured from your server backend.
      } else {
        // The consumer cancelled the payment or closed the popup window.
      }
    }
    AfterPay.transfer({token: "6a6d859b898203cae6d1f4bff5c0668e0fdd1b4d5f9b75d42cb4df668c9e343add061d47acc5d23aaacc94f643b5ab85d38969909fdb712f448b086b76bc3f43"});
});