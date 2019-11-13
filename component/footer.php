<div class="footer-section">
  <div class="div_content3">
    <div class="columns w-row">
      <div class="w-col w-col-2">
        <h4 class="h4">Company</h4>
        <ul class="w-list-unstyled">
          <li class="list-item"><a href="about" class="p-footer">About Us</a></li>
          <li class="list-item"><a href="about#Ads-Section" class="p-footer">Why Trust Us</a></li>
          <li class="list-item"><a href="about" class="p-footer">Meet Our Team</a></li>
          <li class="list-item"><a href="faqs" class="p-footer">FAQS</a></li>
        </ul>
      </div>
      <div class="w-col w-col-2">
        <h4 class="h4">Features</h4>
        <ul class="w-list-unstyled">
          <li class="list-item"><a href="start/saap" class="p-footer">SAAP</a></li>
          <li class="list-item"><a href="start/piggy-wallet" class="p-footer">Piggy Wallet</a></li>
          <li class="list-item"><a href="start/fixed-savings" class="p-footer">Fixed Savings</a></li>
          <li class="list-item"><a href="start/buildings" class="p-footer">Land &amp; Building Savings</a></li>
          <li class="list-item"><a href="start/cooperators" class="p-footer">Cooperators Bank</a></li>
          <li class="list-item"><a href="#" class="p-footer">Diaspora Safe</a></li>
        </ul>
      </div>
      <div class="w-col w-col-2">
        <h4 class="h4">Legal</h4>
        <ul class="w-list-unstyled">
          <li class="list-item"><a href="terms" class="p-footer">Terms of Service</a><br></li>
          <li class="list-item"><a href="privacy" class="p-footer">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="column-4 w-col w-col-3">
        <h4 class="h4">Connect With Us</h4>
        <div class="list-item w-widget w-widget-facebook"><iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FStreams-Global-Network-229776350927303%2F&amp;layout=standard&amp;locale=en_US&amp;action=like&amp;show_faces=false&amp;share=false" scrolling="no" frameborder="0" allowtransparency="true" style="border: none; overflow: hidden; width: 125px; height: 45px;"></iframe></div>
        <ul class="w-list-unstyled">
          <li class="list-item"><a href="mailto:help@streamsglobal.com?subject=Mail%20for%20help" class="p-footer">help@streamsglobal.com</a></li>
          <li class="list-item"><a href="tel:+2349030000857" class="p-footer">+234 (0) 903 000 0857</a></li>
          <li class="list-item span">Come say hello at our office.</li>
          <li class="list-item"><a href="about" class="p-footer">5 Reverend Ogunbiyi Street, Port Harcourt GRA, Nigeria.</a></li>
        </ul>
      </div>
      <div class="w-col w-col-3">
        <h4 class="h4">Streams Global</h4>
        <p class="p-footer">Our investment professionals invest savers funds in agriculture and other cooperative society businesses and manage the investments to ensure optimum return. This agricultural product is ensured by Agricultural Insurance Commission.</p>
      </div>
    </div>
  </div>
</div>

<?php require('mini-footer.php'); ?>

<script src="https://d1tdp7z6w94jbb.cloudfront.net/js/jquery-3.3.1.min.js" type="text/javascript" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="js/webflow.js" type="text/javascript"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/loader.js"></script>
<script>
function onReady(callback) {
  var intervalId = window.setInterval(function() {
    if (document.getElementsByTagName('body')[0] !== undefined) {
      window.clearInterval(intervalId);
      callback.call(this);
    }
  }, 1000);
}

function setVisible(selector, visible) {
  document.querySelector(selector).style.display = visible ? 'block' : 'none';
}

onReady(function() {
  setVisible('.page', true);
  setVisible('#loading', false);
});

$('document').ready(function (){

  $('.carousel-inner .carousel-item:first-child').addClass('active').ready(() => {
    $('.carousel').carousel();
    $('.carousel').carousel({
      interval: 2000
    });
  });

    // AUTO DISAPPEAR ALERT
  $("#alert").toggleClass('in');
  window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
      $(this).remove();
    });
  }, 8000);

});
var dropdown = $(".dropdown-toggle");

dropdown.on("click", function() {
  setTimeout(function(){           //loses focus after 0 milliseconds
    dropdown.blur();
  }, 0);
});

function verifyaccountMsg(){
  $(".verifyMsg").animate({top: '180px'}).css('display','block');
}
</script>
</body>
</html>
