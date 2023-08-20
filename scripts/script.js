//Check when document is ready
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
  } else {
    ready()
  }
  
  
function ready() {// Get the login popup element
    var loginPopup = document.getElementById('login-popup');
    loginPopup.style.display = 'block';
  }


