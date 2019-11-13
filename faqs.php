<?php require_once ('./controllers/authController.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>FAQs | Streams Global</title>
  <meta content="FAQs" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="fontawesome/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/streams-project.webflow.css" rel="stylesheet" type="text/css">
  <link href="css/custom.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/loader.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Saira:100,200,300,regular,500,600,700,800,900"]  }});</script>
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/ms-icon-256x256.png" rel="apple-touch-icon">

  <style>
  .accordion-toggle{color: #2AB334 !important;}
  .accordion-toggle:hover{color: #2AB334 !important;}
  .card-header{background-color: transparent;border-bottom:none;padding: .5rem;}
  </style>
</head>
<body class="body">
  <body class="body">
    <div class="loader-body" id="loader">
  	<div class="loader"></div>
  </div>
  <?php
  if (isset($_SESSION['usersid'])) {
    require ('./component/menu.home.php');
  }
  else {
    require ('./component/menu.php');
  }
  ?>
  <div class="container-fluid header-section span">

    <div class="text-center">
      <h1 class="display-4 font-weight-bold span">Frequently Asked Questions</h1>
    </div>

  </div>

  <main class="my-3">

    <div class="container">

      <div class="" id="accordion">
        <div class="faqHeader">General questions</div>
        <div class="card ">
          <div class="card-header">
            <h4 class="card-header ">
              <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                <span>What is Cooperative?</span>
                <i class="fas fa-caret-right"></i>
              </a>
            </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in">
            <hr class="my-0">
            <div class="card-block p-3">
              Cooperative simply means one or more persons coming together, puttingtheirresources monetary, idea etc for the total goal of developing each other.
            </div>
          </div>
        </div>
        <div class="card ">
          <div class="card-header">
            <h4 class="card-header">
              <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">
                <span>What is a Cooperator?</span>
                <i class="fas fa-caret-right"></i>
              </a>
            </h4>
          </div>
          <div id="collapseTen" class="panel-collapse collapse">
            <hr class="my-0">
            <div class="card-block p-3">
              A cooperator is a registered and financial contributing member of a cooperative.
            </div>
          </div>
        </div>
        <div class="card ">
          <div class="card-header">
            <h4 class="card-header">
              <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">
                <span>What is membership form?</span>
                <i class="fas fa-caret-right"></i>
              </a>
            </h4>
          </div>
          <div id="collapseEleven" class="panel-collapse collapse">
            <hr class="my-0">
            <div class="card-block p-3">
              This is a form you fill and submit to a cooperative for approval of membership.
            </div>
          </div>
        </div>

        <div class="faqHeader">Sellers</div>
        <div class="card ">
          <div class="card-header">
            <h4 class="card-header">
              <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                <span>Do I pay anything to be a member?</span>
                <i class="fas fa-caret-right"></i>
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse">
            <hr class="my-0">
            <div class="card-block p-3">
              Yes you pay an unrefundable fee of <strong>&#8358;1,000</strong> for membership.
            </div>
          </div>
        </div>
        <div class="card ">
          <div class="card-header">
            <h4 class="card-header">
              <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                <span>Can l take my Money back if l am no long interested if i am a SAAP contributor?</span>
                <i class="fas fa-caret-right"></i>
              </a>
            </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse">
            <hr class="my-0">
            <div class="card-block p-3">
              No, the cooperative does not make refund of any kind. please see <strong><a href="plans/saap">SAAP</a></strong>
            </div>
          </div>
        </div>
        <div class="card ">
          <div class="card-header">
            <h4 class="card-header">
              <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                <span>Interest?</span>
                <i class="fas fa-caret-right"></i>
              </a>
            </h4>
          </div>
          <div id="collapseFive" class="panel-collapse collapse">
            <hr class="my-0">
            <div class="card-block p-3">
              This is what you get for doing a specific savings that comes with an interest.
              <br />
            </div>
          </div>
        </div>
        <div class="card ">
          <div class="card-header">
            <h4 class="card-header">
              <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                <span>What types of savings do you have?</span>
                <i class="fas fa-caret-right"></i>
              </a>
            </h4>
          </div>
          <div id="collapseSix" class="panel-collapse collapse">
            <hr class="my-0">
            <div class="card-block p-3">
              We have Six saving plan you can choose from, and pay daily, weekly or monthly:
              <ul>
                <li><a href="plans/piggy">Piggy Walley.</a></li>
                <li><a href="plans/saap">Save & Acquire Properties <strong>(SAAP)</strong>.</a></li>
                <li><a href="plans/fixed">Fixed Savings.</a></li>
                <li><a href="plans/land">Land Savings.</a></li>
                <li><a href="plans/cooperators">Cooperators Savings.</a></li>
                <li><a href="plans/diaspora">Diaspora Savings.</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card ">
          <div class="card-header">
            <h4 class="card-header">
              <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
                <span>Can i do top up after my initial deposit?</span>
                <i class="fas fa-caret-right"></i>
              </a>
            </h4>
          </div>
          <div id="collapseEight" class="panel-collapse collapse">
            <hr class="my-0">
            <div class="card-block p-3">
              Yes, you can top up your accounts by clicking the top up button.
            </div>
          </div>
        </div>
        <div class="card ">
          <div class="card-header">
            <h4 class="card-header">
              <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">
                <span>What is the minimum savings on other products?</span>
                <i class="fas fa-caret-right"></i>
              </a>
            </h4>
          </div>
          <div id="collapseNine" class="panel-collapse collapse">
            <hr class="my-0">
            <div class="card-block p-3">
              &#8358;1,000 only.
            </div>
          </div>
        </div>

        <div class="faqHeader">Plans</div>
        <div class="card ">
          <div class="card-header">
            <h4 class="card-header">
              <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                <span>What is SAAP?</span>
                <i class="fas fa-caret-right"></i>
              </a>
            </h4>
          </div>
          <div id="collapseFour" class="panel-collapse collapse">
            <hr class="my-0">
            <div class="card-block p-3">
              Save and Acquire Properties.
            </div>
          </div>
        </div>
        <div class="card ">
          <div class="card-header">
            <h4 class="card-header">
              <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                <span>How safe is streams MPCS</span>
                <i class="fas fa-caret-right"></i>
              </a>
            </h4>
          </div>
          <div id="collapseSeven" class="panel-collapse collapse">
            <hr class="my-0">
            <div class="card-block p-3">
              Thanks &amp; Kings
            </div>
          </div>
        </div>
        <!-- ADDED -->
        <div class="card ">
          <div class="card-header">
            <h4 class="card-header">
              <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve">
                <span>How do I get my ltems?</span>
                <i class="fas fa-caret-right"></i>
              </a>
            </h4>
          </div>
          <div id="collapseTwelve" class="panel-collapse collapse">
            <hr class="my-0">
            <div class="card-block p-3">
              See <a href="plans/saap"><strong>SAAP</strong>.
              </div>
            </div>
          </div>
          <div class="card ">
            <div class="card-header">
              <h4 class="card-header">
                <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThirteen">
                  <span>ls the Cooperative registered?</span>
                  <i class="fas fa-caret-right"></i>
                </a>
              </h4>
            </div>
            <div id="collapseThirteen" class="panel-collapse collapse">
              <hr class="my-0">
              <div class="card-block p-3">
                Yes, we are fully and dully registered, <strong>RS 30366, RS 31904, AK 23813, AB 16307</strong>.
              </div>
            </div>
          </div>
          <div class="card ">
            <div class="card-header">
              <h4 class="card-header">
                <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFourteen">
                  <span>Where or how does the Cooperative generate money?</span>
                  <i class="fas fa-caret-right"></i>
                </a>
              </h4>
            </div>
            <div id="collapseFourteen" class="panel-collapse collapse">
              <hr class="my-0">
              <div class="card-block p-3">
                Agriculture,Loans, Business funding etc.
              </div>
            </div>
          </div>
          <div class="card ">
            <div class="card-header">
              <h4 class="card-header">
                <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFiftheen">
                  <span>Do you have a physical office?</span>
                  <i class="fas fa-caret-right"></i>
                </a>
              </h4>
            </div>
            <div id="collapseFiftheen" class="panel-collapse collapse">
              <hr class="my-0">
              <div class="card-block p-3">
                Yes in Three(3) different state:
                <ul>
                  <li>11 Ogoloma Street, Off Emekuku Dline, Port Harcourt, Rivers State, Nigeria.</li>
                  <li>Providence House, No 1 Babatunde Ladiga Street Omole.</li>
                  <li>No 2 free Zone Road Ariaria, Beside AKTC park, Aba, Abia State.</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="faqHeader">More</div>
          <div class="card ">
            <div class="card-header">
              <h4 class="card-header">
                <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSixteen">
                  <span>Do you do this same business offline?</span>
                  <i class="fas fa-caret-right"></i>
                </a>
              </h4>
            </div>
            <div id="collapseSixteen" class="panel-collapse collapse">
              <hr class="my-0">
              <div class="card-block p-3">
                Yes with over 100,000 field Rep &amp; agents doing collections daily weekly &amp; monthly.
              </div>
            </div>
          </div>
          <div class="card ">
            <div class="card-header">
              <h4 class="card-header">
                <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeventeen">
                  <span>Hope l will get what l am paying for?</span>
                  <i class="fas fa-caret-right"></i>
                </a>
              </h4>
            </div>
            <div id="collapseSeventeen" class="panel-collapse collapse">
              <hr class="my-0">
              <div class="card-block p-3">
                Yes Streamsglobal MPCS is committed to fulfilling its promises.
              </div>
            </div>
          </div>
          <div class="card ">
            <div class="card-header">
              <h4 class="card-header">
                <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEighteen">
                  <span>Can i make referral?</span>
                  <i class="fas fa-caret-right"></i>
                </a>
              </h4>
            </div>
            <div id="collapseEighteen" class="panel-collapse collapse">
              <hr class="my-0">
              <div class="card-block p-3">
                Yes you can, through yours referral link.
              </div>
            </div>
          </div>
          <div class="card ">
            <div class="card-header">
              <h4 class="card-header">
                <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNineteen">
                  <span>Do i get paid for refers</span>
                  <i class="fas fa-caret-right"></i>
                </a>
              </h4>
            </div>
            <div id="collapseNineteen" class="panel-collapse collapse">
              <hr class="my-0">
              <div class="card-block p-3">
                Yes you get incentives when you get incentives when you link specific no of cooperator,see Ref programme.
              </div>
            </div>
          </div>
          <div class="card ">
            <div class="card-header">
              <h4 class="card-header">
                <a class="accordion-toggle d-flex justify-content-between collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwenty">
                  <span>How Safe is our savings</span>
                  <i class="fas fa-caret-right"></i>
                </a>
              </h4>
            </div>
            <div id="collapseTwenty" class="panel-collapse collapse">
              <hr class="my-0">
              <div class="card-block p-3">
                They are safe as much as they can be, the cooperative trades on reliable business.
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <?php
    require ('./component/footer.php');
    ?>
