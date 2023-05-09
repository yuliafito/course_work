<?php
function linkResource($rel, $href) {
  echo "<link rel='{$rel}' href='{$href}'>";
}
linkResource("stylesheet", "/css/style.css");
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$conn = mysqli_connect('localhost', 'root', '','db_connect');

// Перевірка з'єднання
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// перевірка, чи була надіслана форма пошуку
if (isset($_POST['search'])) {

  // очистка введеного користувачем запиту
  $search = mysqli_real_escape_string($conn, $_POST['search']);

  // запит для витягнення даних з БД
  $sql = "SELECT d.id, d.name, d.price, c.color_name, s.size_name, cat.category_name, d.description, i.img
          FROM tbl_dresses d
          JOIN tbl_colors c ON d.color_id = c.id
          JOIN tbl_size s ON d.size_id = s.id
          JOIN tbl_category cat ON d.category_id = cat.id
          JOIN tbl_pictures p ON d.id = p.dress_id
          JOIN tbl_img i ON p.img_id = i.id
          WHERE d.name LIKE '%$search%'
          ORDER BY d.name ASC";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo '<div class="fixed-menu">
    <div class="h1">
      <a class="hh11" href="friends.html"
        >Отримай бонуси за кожну наступну сукню</a
      >
    </div>
    <div class="h2">
      <div class="icon-name">
        <img src="icons8-diamond-100.png" style="height: 60px" alt="" />
        <p class="title-name">Diamond Evening Gowns</p>
      </div>
      <!--<a
        href="/bootstrap-5.3.0-alpha3-examples/sign-in/index.html"
        class="user"
      >
        <span class="sign_in">SIGN IN</span>
        <i class="bi bi-person"></i>
      </a>
      <a href="" class="heart">
        <i class="bi bi-heart"></i>
      </a>
      <a href="" class="cart">
        <i class="bi bi-cart"></i>
      </a>-->
    </div>
    <ul class="menu" id="myMenu">
      <li><a href="index.html">Home</a></li>
      <li><a href="evening_dresses.html">Вечірні сукні</a></li>
      <li><a href="wedding.html">Весільні сукні</a></li>
      <li><a href="about.html">Про нас</a></li>
      <li><a href="#footer">Контакти</a></li>
      <li class="search">
        <a href="#search"><i class="fa fa-search"></i></a>
      </li>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </ul>
  </div>';
    echo '<div class="container">';
    while($row = mysqli_fetch_assoc($result)) {
        echo '<div id="' . $row['id'] . '" class="item ' . $row['color_name'] . ' ' . $row['size_name'] . '">';
        echo '<a href="single-product.html">';
        echo '<div class="featured-item">';
        echo '<img src="' . $row['img'] . '" alt="" />';
        echo '<h4>' . $row['name'] . '</h4>';
        echo '<h6>&#8372 ' . $row['price'] . '</h6>';
        echo '</div></a></div>';
    }
    echo '</div>';
} else {
    echo "Результатів не знайдено";
}

}

// закриття з'єднання з БД
mysqli_close($conn);



?>