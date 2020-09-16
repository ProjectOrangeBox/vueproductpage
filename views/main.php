<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Product Display Vue Example</title>
  <link href="/assets/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
  <link href="/assets/product.css" rel="stylesheet" />
  <script src="https://unpkg.com/vue@3.0.0-beta.12/dist/vue.global.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
  <div id="app">
    <?php require 'nav.php' ?>

    <product-display :premium="premium" @add-to-cart="updateCart"></product-display>
  </div>

  <script src="/assets/product.js"></script>
  <script src="/components/ProductDisplay.js"></script>

  <script>
    const mountedApp = app.mount('#app')
  </script>

  <?php require 'footer.php' ?>

  <script src="/assets/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="/assets/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
</body>

</html>