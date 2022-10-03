
window.onload = function() {
    var cartHeader = document.getElementById('cart-header');
    var number = localStorage.getItem('number');
    var totalNumber = 124.99 * number;
    var quantity = document.getElementById('quantity');
    var total_2 = document.getElementById('total_2');

    if(number == null) {
        number = 0;
    }

    if(cartHeader != null) {
        cartHeader.innerHTML = "coș " + number + " ( RON " + totalNumber.toFixed(2) + " )";
    }
    quantity.innerHTML = number;
    total.innerHTML = totalNumber.toFixed(2) + "RON";
    total_2.innerHTML = totalNumber.toFixed(2) + "RON";
}

function showCart() {
    const cart = document.getElementById('checkout');
    cart.style.display = "block";
}

function quitCart() {
    const cart = document.getElementById('checkout');
    cart.style.display = "none";
}

function addToCart() {
    var number = localStorage.getItem('number');
    var quantity = document.getElementById('quantity');
    var total = document.getElementById('total');
    var totalNumber = total.innerHTML;
    var cartHeader = document.getElementById('cart-header');

    if(number < 10 && typeof number === 'string') {
        number++;

        localStorage.setItem('number', JSON.stringify(number));
        totalNumber = 124.99 * number;
    
        quantity.innerHTML = number;
        total.innerHTML = totalNumber.toFixed(2) + "RON";
        if(typeof total_2 !== 'undefined') {
          total_2.innerHTML = totalNumber.toFixed(2) + "RON";
        }
        cartHeader.innerHTML = "coș " + number + " ( RON " + totalNumber.toFixed(2) + " )";
    }
}

function decreaseFromCart() {
    var quantity = document.getElementById('quantity');
    var total = document.getElementById('total');
    var number = localStorage.getItem('number');
    var totalNumber = total.innerHTML;
    var cartHeader = document.getElementById('cart-header');
    
    if(number > 0 && typeof number === 'string') {
        number--;

        totalNumber = 124.99 * number;
        localStorage.setItem('number', JSON.stringify(number));

        quantity.innerHTML = number;
        total.innerHTML = totalNumber.toFixed(2) + "RON";
        if(typeof total_2 !== 'undefined') {
          total_2.innerHTML = totalNumber.toFixed(2) + "RON";
        }
        cartHeader.innerHTML = "coș " + number + " ( RON " + totalNumber.toFixed(2) + " )";
    }
}

function initPayPalButton() {
    paypal.Buttons({
      style: {
        shape: 'rect',
        color: 'gold',
        layout: 'vertical',
        label: 'paypal',
        
      },

      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{"amount":{"currency_code":"USD","value":1}}]
        });
      },

      onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {
          
          // Full available details
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

          // Show a success message within this page, e.g.
          const element = document.getElementById('paypal-button-container');
          element.innerHTML = '';
          element.innerHTML = '<h3>Thank you for your payment!</h3>';

          // Or go to another URL:  actions.redirect('thank_you.html');
          
        });
      },

      onError: function(err) {
        console.log(err);
      }
    }).render('#paypal-button-container');
}
initPayPalButton();



// CHECKOUT.HTML

var total_3 = document.getElementById('total_3');
const sum = 124.99 * localStorage.getItem('number');
total_3.innerHTML = sum.toFixed(2) + 'RON';


var quantity_2 = document.getElementById('quantity_2');
quantity_2.style.color = "#F9F9F9";
quantity_2.style.textAlign = "center";  
quantity_2.innerHTML = localStorage.getItem('number');

var total_4 = document.getElementById('total_4');
total_4.innerHTML = total_3.innerHTML;

var total_5 = document.getElementById('total_5');
total_5.innerHTML = total_3.innerHTML;

function showText() {
  var hiddenText = document.getElementById('hidden-text');
  hiddenText.style.display = "block";
}

function hideText() {
  var hiddenText = document.getElementById('hidden-text');
  hiddenText.style.display = "none";
}