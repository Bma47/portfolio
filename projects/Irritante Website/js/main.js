confirm('This website uses cookies We use cookies to personalise content and ads, to provide social media features and to analyse our traffic. We also share information about your use of our site with our social media, advertising and analytics partners who may combine it with other information that youve provided to them or that theyve collected from your use of their services')
alert("I am an alert box!");
function mijnFunction() {
    var txt;
    if (confirm("druk button!")) {
      txt = "je hebt gedrukt!";
    } else {
      txt = "je hebt op Annuleren gedrukt!";
    }
    document.getElementById("java").innerHTML = txt;
  }