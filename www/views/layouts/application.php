<DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="/main.js"></script>
    <link rel="stylesheet" href="/style.css">
    <title><?= @$title ?></title>
</head>
<body>
  
  <div class="container-fluid">
  
    <div class="row content">
      <?= @$dashboard ?>
      <div class="col-sm-10 content">
        <div id="dialog" title="Box">
          <div id="message"></div>
        </div>
        <?= @$content ?>
      </div>
    </div>
  </div>
</body>
</html>

