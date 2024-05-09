<?php
session_start();

if(isset($_SESSION['user_name'])){
}

@include 'config.php';

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = "SELECT * FROM user_form WHERE email = '$email' AND password = '$pass'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){
         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');
         exit();
      }elseif($row['user_type'] == 'user'){
         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');
         exit();
      }
   }else{
      $error[] = 'INCORRECT EMAIL OR PASSWORD!';
   }
}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sorbee Menu: Drinks</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
  <link href="CategB.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
      <a class="navbar-brand d-lg-none" href="#">
        <img src="pic/logo.png" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="user_page.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="CategALogin.php">TREATS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">DRINKS</a>
          </li>
          <a class="navbar-brand d-none d-lg-block" href="#">
            <img src="pic/logo.png" alt="">
          </a>
          <li class="nav-item">
            <a class="nav-link" href="StoresLogin.php">STORES</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="cartLogin.php">CARTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php" class="btn">LOGOUT</a>
          </li>
        </ul>
      </div>
    </nav>
  
  <div class="container mt-5">
    <div class="item-center cone-divider">
      <div class = "cone-image">
      </div>
    </div>
    <div class="divider">
      <img src="pic/milkshake.png" alt="Divider Image">
  </div>
    <!-- First Row -->
    <div class="row mb-4">
        <!-- Box 1 -->
        <div class="col-lg-3 mb-4">
          <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
            <div class="product-info">
              <div class="backframe">
                  <div class="innerframe">
                      <img class="itemframe" src="https://www.cfacdn.com/img/order/menu/Mobile/Desserts/Menu%20Item/16oz_VanillaMilkshake-1080.png">
                  </div>
              </div>
              </div>
              <p class="font-bold text-center item-name">Vanilla Milkshake</p>
              <p class="text-center item-price">100.00<span class="currency"> PHP</span></p> 
              <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Vanilla Milkshake', 'Our creamy Vanilla Milkshakes are hand-spun the old-fashioned way each time and feature delicious dessert, topped with whipped cream and a cherry.', '100.00 PHP', 'https://www.cfacdn.com/img/order/menu/Mobile/Desserts/Menu%20Item/16oz_VanillaMilkshake-1080.png')">
                <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
              </button>
          </div>
        </div>
  
        <!-- Box 2 -->
        <div class="col-lg-3 mb-4">
          <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
            <div class="product-info">
              <div class="backframe">
                  <div class="innerframe">
                      <img class="itemframe" src="https://www.cfacdn.com/img/order/menu/Mobile/Desserts/Menu%20Item/16oz_ChocolateMilkshake-1080.png">
                  </div>
              </div>
              </div>
              <p class="font-bold text-center item-name">Chocolate Milkshake</p>
              <p class="text-center item-price">120.00<span class="currency"> PHP</span></p> 
              <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Chocolate Milkshake', 'Our creamy Chocolate Milkshakes are hand-spun the old-fashioned way each time and feature delicious dessert, topped with whipped cream and a cherry', '120.00 PHP', 'https://www.cfacdn.com/img/order/menu/Mobile/Desserts/Menu%20Item/16oz_ChocolateMilkshake-1080.png')">
                <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
              </button>
          </div>
        </div>
  
        <!-- Box 3 -->
        <div class="col-lg-3 mb-4">
          <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
            <div class="product-info">
              <div class="backframe">
                  <div class="innerframe">
                      <img class="itemframe" src="https://www.cfacdn.com/img/order/menu/Mobile/Desserts/Menu%20Item/16oz_StrawberryMilkshake-1080.png">
                  </div>
              </div>
              </div>
              <p class="font-bold text-center item-name">Berry Milkshake</p>
              <p class="text-center item-price">120.00<span class="currency"> PHP</span></p> 
              <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Strawberry Milkshake', 'Our creamy Strawberry Milkshakes are hand-spun the old-fashioned way each time and feature delicious dessert, topped with whipped cream and a cherry.', '120.00 PHP', 'https://www.cfacdn.com/img/order/menu/Mobile/Desserts/Menu%20Item/16oz_StrawberryMilkshake-1080.png')">
                <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
              </button>
          </div>
        </div>
  
        <!-- Box 4 -->
        <div class="col-lg-3 mb-4">
          <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
            <div class="product-info">
              <div class="backframe">
                  <div class="innerframe">
                      <img class="itemframe" src="https://www.cfacdn.com/img/order/menu/Mobile/Desserts/Menu%20Item/16oz_C%26C_Milkshake-1080.png">
                  </div>
              </div>
              </div>
              <p class="font-bold text-center item-name">Cookies Milkshake</p>
              <p class="text-center item-price">120.00<span class="currency"> PHP</span></p> 
              <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Cookies and Cream Milkshake', 'Our creamy Cookies & Cream Milkshakes are hand-spun the old-fashioned way each time and feature delicious dessert, topped with whipped cream and a cherry. ', '120.00 PHP', 'https://www.cfacdn.com/img/order/menu/Mobile/Desserts/Menu%20Item/16oz_C%26C_Milkshake-1080.png')">
                <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
              </button>
          </div>
        </div>
      </div>

    <div class="divider">
      <img src="pic/milktea.png" alt="Divider Image">
  </div>
    
    <!-- Second Row -->
    <div class="row mb-4">
      <!-- Box 5 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://png.pngtree.com/png-clipart/20230427/original/pngtree-yellow-milk-tea-drink-png-image_9112253.png">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Boba Milktea</p>
            <p class="text-center item-price">100.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Boba Milktea', 'Experience the essence of indulgence with our Boba Milk Tea. Delight in the chewy tapioca pearls perfectly balanced with the smoothness of our signature milk tea blend.', '100.00 PHP', 'https://png.pngtree.com/png-clipart/20230427/original/pngtree-yellow-milk-tea-drink-png-image_9112253.png')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>

      <!-- Box 6 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://png.pngtree.com/png-clipart/20231006/original/pngtree-pink-bubble-tea-png-image_13127587.png">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Strawberry Milktea</p>
            <p class="text-center item-price">120.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Strawberry Milktea', 'Indulge your taste buds in the sweetness of our Strawberry Milk Tea, where luscious strawberries meet creamy milk tea, creating a blissful fusion of flavors.', '120.00 PHP', 'https://png.pngtree.com/png-clipart/20231006/original/pngtree-pink-bubble-tea-png-image_13127587.png')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>

      <!-- Box 7 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://png.pngtree.com/png-vector/20240316/ourmid/pngtree-vector-iced-taiwanese-bubble-tea-green-tea-matcha-with-cream-cheese-png-image_11986775.png">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Matcha Milktea</p>
            <p class="text-center item-price">120.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Matcha Milktea', 'Savor the serene simplicity of our Matcha Milk Tea, crafted with premium matcha powder for an authentic taste of traditional Japanese green tea.', '120.00 PHP', 'https://png.pngtree.com/png-vector/20240316/ourmid/pngtree-vector-iced-taiwanese-bubble-tea-green-tea-matcha-with-cream-cheese-png-image_11986775.png')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>

      <!-- Box 8 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://png.pngtree.com/png-clipart/20230427/original/pngtree-milk-tea-transparent-straw-png-image_9112283.png">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Chocolate Milktea</p>
            <p class="text-center item-price">120.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Chocolate Milktea', 'For those craving classic decadence, our Chocolate Milk Tea is a rich and velvety delight, marrying the boldness of chocolate with the creaminess of milk tea.', '120.00 PHP', 'https://png.pngtree.com/png-clipart/20230427/original/pngtree-milk-tea-transparent-straw-png-image_9112283.png')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>
    </div>

    <div class="divider">
      <img src="pic/caffeine.png" alt="Divider Image">
  </div>

    <!-- Third Row -->
      <div class="row mb-4">
        <!-- Box 9 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://burgerking.com.my/upload/image/Product/35/Hot%20Cuppucino.png">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Capuccino</p>
            <p class="text-center item-price">140.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Capuccino', 'An Italian classic prepared with espresso, hot milk and steamed milk foam.', '140.00 PHP', 'https://burgerking.com.my/upload/image/Product/35/Hot%20Cuppucino.png')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>

      <!-- Box 10 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://burgerking.com.my/upload/image/Product/32/Ice%20Americano.png">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Americano</p>
            <p class="text-center item-price">140.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Americano', 'Espresso combined with water. Same strength as drip coffee, but a different flavor. Try it!', '140.00 PHP', 'https://burgerking.com.my/upload/image/Product/32/Ice%20Americano.png')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>

      <!-- Box 11 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://burgerking.com.my/upload/image/Product/33/Hot%20Latte.png">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Latte</p>
            <p class="text-center item-price">140.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Latte', 'Makes mornings worth waking up for. Espresso and milk. ', '140.00 PHP' , 'https://burgerking.com.my/upload/image/Product/33/Hot%20Latte.png')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>

      <!-- Box 12 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://burgerking.com.my/upload/image/Product/34/Hot%20Mocha.png">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Mocha</p>
            <p class="text-center item-price">140.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Mocha', 'If coffee ain’t hip enough, try this combination of chocolate and espresso.', '140.00 PHP', 'https://burgerking.com.my/upload/image/Product/34/Hot%20Mocha.png')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>
    </div>

      
          </div>
        </div>
      </div>  
    </div>

  <!-- Modal -->
  <div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-text modal-box modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="itemModalLabel">Item Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="itemDetails">
        </div>  
        <div class="modal-footer">
          <button type="button" class="btn mod-add-to-cart" id="addToCartBtn">
            <img src="pic/addtocart.png" alt="Modal Add to Cart" class="items-center mod-cart-icon">
          </button>
        </div>
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="CategB.js"></script>
</body>
</html>
