
// Get the modal
var modal = document.getElementById("myModal");
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

document.getElementById("splititform").addEventListener("submit", function(event){
    event.preventDefault()
    formData = []
    $(event.target).serializeArray().map((data)=>formData.push([data.name,data.value]))
    formData = Object.fromEntries(formData)
    data = {
        "RequestHeader": {
            "SessionId": formData.session_id,
            "ApiKey": "c17658cd-ef26-4a70-a257-e8b44d3cf12e"
        },
        "PlanData": {
            "Amount": {
                "Value": document.getElementById('subtotal').innerHTML/3,
                "CurrencyCode": "AUD"
            },
            "NumberOfInstallments": 3,
            "RefOrderNumber": formData.FullName+"-"+formData.Email+"-"+formData.PhoneNumber,
            "AutoCapture": true
        },
        "BillingAddress": {
            "AddressLine": formData.AddressLine1,
            "AddressLine2": formData.AddressLine2,
            "City": formData.City,
            "State": formData.State,
            "Country": formData.Country,
            "Zip": formData.ZipCode
        },
        "ConsumerData": {
            "FullName": formData.FullName,
            "Email": formData.Email,
            "PhoneNumber": formData.PhoneNumber,
            "CultureName": formData.CultureName
        },
        "CreditCardDetails": {
            "CardHolderFullName": formData.CardHolderFullName,
            "CardNumber": formData.CardNumber,
            "CardExpYear": formData.CardExpyear,
            "CardExpMonth": formData.CardExpmonth,
            "CardCvv": formData.CardCvv
        },
        "PlanApprovalEvidence": {
            "AreTermsAndConditionsApproved": "true"
        }
    }
    // console.log(data)
    //  modal.style.display = "none";
    //  alert('this is an alert');
     
    $.ajax({
        type: 'POST',
        url: 'https://webapi.sandbox.splitit.com/api/InstallmentPlan/Create',
        beforeSend: function(request) {
            request.setRequestHeader("SessionId", formData.session_id);
            request.setRequestHeader("ApiKey", "c17658cd-ef26-4a70-a257-e8b44d3cf12e");
        },
        contentType: 'application/json; charset=utf-8',
        data:data,
        success: function (data) {
             alert('successfull');
            modal.style.display = "none";
        },
        error: function (r) {
             alert(r);
            console.log(r);
            
        }
    });

});







// Get the modal
var myModalairwalex = document.getElementById("myModalairwalex");
// Get the button that opens the modal
var myBtnairwalex = document.getElementById("myBtnairwalex");
// Get the <span> element that closes the modal
var spanairwalex = document.getElementsByClassName("spanairwalexclose")[0];
// When the user clicks the button, open the modal 
myBtnairwalex.onclick = function() {
    myModalairwalex.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
spanairwalex.onclick = function() {
    myModalairwalex.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == myModalairwalex) {
        myModalairwalex.style.display = "none";
    }
}

document.getElementById("airwallexform").addEventListener("submit", function(event){
    event.preventDefault()
    formData = []
    $(event.target).serializeArray().map((data)=>formData.push([data.name,data.value]))
    formData = Object.fromEntries(formData)
    data = {
          "beneficiary": {
            "additional_info": {
              "business_area": "Australia"
            },
            "address": {
                "city": "Australia",
                "country_code": "AU",
                "postcode": "3976",
                "state": "Victoria",
                "street_address": "15 Ralph Cres Hampton Park"
            },
            "bank_details": {
                "account_currency": "AUD",
                "account_name": "My Puppy My Pet",
                "account_number": "44306251",
                "account_routing_type1": "bank_code",
                "account_routing_value1": "063097",
                "bank_country_code": "AU",
                "bank_name": "Common Wealth Bank"
            },
            "date_of_birth": "1988-11-26",
            "entity_type": "Business",
            "first_name": "Kunasekar",
            "last_name": "Kobalasingam"
          },
          "payer": {
            "additional_info": {
              "personal_email": formData.Email,
              "personal_phone": formData.PhoneNumber,
              "personal_phonenumber": formData.PhoneNumber,
              "personal_phone_number": formData.PhoneNumber
            },
            "address": {
              "city": formData.City,
              "country_code": formData.country_code,
              "postcode": formData.postcode,
              "zipcode": formData.ZipCode,
              "state": formData.State,
              "addressline": formData.AddressLine1,
              "address": formData.AddressLine1+' '+formData.AddressLine2+' '+formData.street_address,
              "addressline1": formData.AddressLine1,
              "addressline2": formData.AddressLine2,
              "street_address": formData.street_address
            },
            "date_of_birth": formData.date_of_birth,
            "entity_type": "PERSONAL",
            "first_name": formData.first_name,
            "last_name": formData.last_name
          },
          "payment_amount": document.getElementById('subtotal').innerHTML,
          "payment_currency": formData.payment_currency,
          "payment_method": "LOCAL",
          "reason": formData.FullName+"-"+formData.Email+"-"+formData.PhoneNumber,
          "reference": "",
          "request_id": formData.session_id,
          "source_currency": "AUD"
        };

    console.log(data);
    // $.ajax({
    //     type: 'POST',
    //     url: 'https://api-demo.airwallex.com/api/v1/payments/create',
    //     beforeSend: function(request) {
    //         request.setRequestHeader("ApiKey", "Bearer eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ0b20iLCJyb2xlcyI6WyJ1c2VyIl0sImlhdCI6MTQ4ODQxNTI1NywiZXhwIjoxNDg4NDE1MjY3fQ.UHqau03y5kEk5lFbTp7J4a-U6LXsfxIVNEsux85hj-Q");
    //     },
    //     contentType: 'application/json; charset=utf-8',
    //     data:data,
    //     success: function (data) {
    //         alert('successfull');
    //         myModalairwalex.style.display = "none";
    //     },
    //     error: function (r) {
    //         alert(r);
    //         console.log(r);
    //     }
    // });

});



























