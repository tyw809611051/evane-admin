<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page Title</title>
    <link href="css/app.css" rel="stylesheet">
</head>
<body>
<div class="app">
<div class="container">
  <div class="row">
    <div class="col-sm">
      One of three columns
    </div>
    <div class="col-sm">
      One of three columns
    </div>
    <div class="col-sm">
      One of three columns
    </div>
  </div>
</div>

<div class="alert alert-primary" role="alert">
  This is a primary alert—check it out!
</div>
</div>
<script src="js/app.js"></script>
<script>
    let test = $('.alert').html();
    console.log(test);
</script>
</body>
</html>