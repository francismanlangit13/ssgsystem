<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Please wait</title>
</head>
<body>
 <!-- This element will be automatically clicked -->
 <a id="targetElement" href="home.php"></a>

<script>
  // Auto-click when the page loads
  window.addEventListener('load', function() {
    var targetElement = document.getElementById("targetElement");
    if (targetElement) {
      targetElement.click();
    }
  });
</script>
</body>
</html>