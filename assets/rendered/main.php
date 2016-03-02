<!DOCTYPE html>
<html>
  <head>
    <title><?php echo htmlspecialchars($title,ENT_QUOTES,'UTF-8'); ?></title>
    <link href="/assets/css/style.css" rel="stylesheet">
    <meta charset="utf-8">
  </head>
  <body>
    <?php include($renderer->parse_template($subview)); ?>
  </body>
</html>
