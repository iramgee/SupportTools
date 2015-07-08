<html>
<head>
<title>Cylance Email Setup</title>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<link href="https://p6.zdassets.com/hc/settings_assets/296219/200008063/G7faR2ZSJImMkGBe9eEITA-favicon.png" rel="shortcut icon">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>




<style>
body{
  margin:50px;
}
td{
  padding: 8px;
}
th{
  padding: 8px;
}
tr:nth-child(even) {background: #CCC}
tr:nth-child(odd) {background: #FFF}
ul{
    list-style-type: none;
}
#header-container{
    width: 100%;
    height: 60px;
  left: 0px;
  z-index: 50;
  position: fixed;
  top: 0px;
  background-color: #333333;

  
}
#getStats{
  display:none;
  float:right;
  padding-right: 30px;
margin-top: -25px;
}
#header-image{
  margin-left: 50px;
  padding-top: 6px;

}

</style>
</head>
<body>
<nav class="navbar-fixed-top navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="images/cylance-logo-white-green.png" height="18px" width="auto"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Emails <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Welcome/">Welcome Email</a></li>
            <li><a href="WelcomeStraight/">Welcome Straight Purchase Email</a></li>
            <li><a href="EndOfPoc/">End Of POC Email</a></li>
            <li><a href="UpdateEmails/">Protect Update Email</a></li>
            <li><a href="UpdateDelayedEmails/">Protect Update Delayed Email</a></li>
          </ul>
          <li><a href="../LogParserWithDB/">Log File Parser</a></li>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<br/>
<br />