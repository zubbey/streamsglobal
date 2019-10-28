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
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Saira:100,200,300,regular,500,600,700,800,900"]  }});</script>
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/ms-icon-256x256.png" rel="apple-touch-icon">
</head>
<body class="body">
  <div class="header-section span">

    <?php
    if (isset($_SESSION['usersid'])) {
      require ('./component/menu.home.php');
    }
    else {
      require ('./component/menu.php');
    }
    ?>

    <div class="container">
      <h1 class="heading-2 span">Frequently Asked Questions</h1>
    </div>

  </div>

  <main>
    <div class="section faqs">
      <div class="container faqs">
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-1">What is Cooperative?</a>
            <i class="fas fa-arrows"></i>
          </div>
          <div class="divider"></div>
          <p data-w-id="237147aa-50d2-a0fe-16cf-a59161cc21dc" class="p-faqs">
            <span class="ans">Ans</span>
            Cooperative simply means one or more persons coming together, puttingtheirresources monetary, idea etc for the total goal of developing each other.
          </p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-2">What is a Cooperator?</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="063ac3c2-d797-e5ff-899f-09273891e27b" class="p-faqs"><span class="ans">Ans</span>    A cooperator is a registered and financial contributing member of a cooperative</p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-3">What is membership form?</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="c9b89c65-e310-1817-8aba-51228304defd" class="p-faqs"><span class="ans">Ans</span>  This is a form you fill and submit to a cooperative for approval of membership</p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-4">Do I pay anything to be a member?</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="1a015073-403a-543a-0c05-b3bbedbdd03f" class="p-faqs"><span class="ans">Ans</span>  Yes you pay an unrefundable fee of 1,000 for membership</p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-5">Can l take my Money back if l am no long interested if i am a SAAP contributor?</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="e3b32a22-1610-06f4-6996-37df6fc1b6b2" class="p-faqs"><span class="ans">Ans</span>  No, the cooperative does not make refund of any kind. please see SAAP</p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-6">Interest?</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="01ab7061-2b04-7003-728c-3e3c279bb7a3" class="p-faqs"><span class="ans">Ans</span>  This is what you get for doing a specific savings that comes with an interest</p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-7">What types of savings do you have?</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="459d1d95-b0f7-bc9b-6691-b561eaf31cf0" class="p-faqs"><span class="ans">Ans</span>  We have nine saving products you can choose from, and pay daily, weekly or monthly.</p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-8">Can i do top up after my initial deposit?</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="19e8c4be-45f2-a341-6497-a154723f631e" class="p-faqs"><span class="ans">Ans</span>  Yes, you can top up your accounts by clicking the top up button</p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-9">What is the minimum savings on other products?</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="24d9a79a-798e-e456-c99e-e1dacb00c2c5" class="p-faqs"><span class="ans">Ans</span>   10</p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-10">what is the minimum savings on other products?</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="8167caa0-e5a1-c5b3-7f2c-3db8ddea9b45" class="p-faqs"> <span class="ans">Ans</span>  1,000 only</p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-11">What is SAAP?</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="a0384c06-7fbb-7a29-6bcf-a56a978ef1cf" class="p-faqs"> <span class="ans">Ans</span>  Save and Acquire Properties</p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-12">How safe is streams MPCS</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="56ed0358-f1a6-3b66-cd6b-b7100597e38b" class="p-faqs"> <span class="ans">Ans</span>  Thanks &amp; Kings</p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-13">How do I get my ltems?</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="f0fbbc9c-d1fb-16e3-c805-f807f275027c" class="p-faqs"> <span class="ans">Ans</span>  See SAAP.</p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-14">ls the Cooperative registered?</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="e7128e78-d8d5-281d-8221-28c24a9fe847" class="p-faqs"> <span class="ans">Ans</span>  Yes, we are fully and dully registered, RS 30366, RS 31904, AK 23813, AB 16307</p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-15">Where or how does the Cooperative generate money?</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="0fc51601-ee83-43c7-e6bd-cbe9f36044db" class="p-faqs"> <span class="ans">Ans</span>  Agriculture,Loans, Business funding etc.</p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-16">Do you have a href="#" physical office?</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="1bfa6356-4cbe-bd72-ca0b-5f5809a442ca" class="p-faqs"> <span class="ans">Ans</span>  Yes in four different state past ofﬁce address here</p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-17">Do you do this same business offline</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="bf814bf7-0ca6-70af-1c28-b507eec336dc" class="p-faqs"> <span class="ans">Ans</span>  Yes with over 100,000 field rep &amp; agents doing collections daily weekly &amp;monthly</p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-18">Hope l will get what l am paying for?</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="d7eb514c-8359-e44d-aaca-0c0aaea66d86" class="p-faqs"> <span class="ans">Ans</span>  Yes streams global MPCS is committed to fulfilling its promises.</p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-19">Can i make referral?</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="c4ee56fa-e996-0fc5-4007-a626d8acc66b" class="p-faqs"> <span class="ans">Ans</span>  Yes you can, through yours referral link.</p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-20">Do i get paid for refers</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="fc12d37e-71b0-dd02-a1e6-5aff8f657785" class="p-faqs"> <span class="ans">Ans</span>  Yes you get incentives when you get incentives when you link specific no of cooperator,see Ref programme.</p>
        </div>
        <div class="faqs">
          <div class="faqs-fliex">
            <a href="#" class="h-faqs-21">How Safe is our savings</a>
          </div>
          <div class="divider"></div>
          <p data-w-id="ede778bc-19bf-e29a-3f65-51e7f05acad9" class="p-faqs"> <span class="ans">Ans</span>  They are safe as much as they can be the cooperative trade on reliable business.</p>
        </div>
      </div>
    </div>
  </main>

  <?php
  require ('./component/footer.php');
  ?>
