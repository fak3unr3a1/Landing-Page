<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delicious Recipes</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Comic Sans MS', cursive; 
      background-color: #fff; 
    }

    .header {
      background-color: #411204; 
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    .hero {
      background-image: url('background.avif'); 
      background-size: cover;
      background-position: center;
      height: 600px;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #8B4513; 
      text-align: center;
    }

    .hero h1 {
      font-size: 3em;
      margin-bottom: 20px;
    }

    .hero p {
      font-size: 1.5em;
      margin-bottom: 30px;
    }

    .hero button {
      background-color: #8B4513;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 1.2em;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .hero button:hover {
      background-color: #654321; 
    }

    .fold {
      background-color: #fff;
      padding: 100px 0;
      text-align: center;
      opacity: 0;
      animation: fadeIn 1s forwards;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    .fold h2 {
      font-size: 2em;
      margin-bottom: 20px;
      color: #ff5722; 
    }

    .fold p {
      color: #666;
      font-size: 1.2em;
      margin-bottom: 30px;
    }

    .recipe-card {
      background-color: #fff7f2; 
      border-radius: 10px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
      padding: 20px;
      margin-bottom: 20px;
      transition: transform 0.3s ease;
    }

    .recipe-card:hover {
      transform: translateY(-5px);
    }

    .recipe-card img {
      max-width: 100%;
      border-radius: 5px;
      margin-bottom: 10px;
    }

    .recipe-card h3 {
      color: #333;
    }

    .recipe-card p {
      color: #666;
    }

    .recipe-card a {
      color: #ff5722; 
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .recipe-card a:hover {
      color: #f4511e; 
    }

    .affiliated {
      background-color: #ff9800; 
      color: #fff;
      padding: 50px 0;
      text-align: center;
    }

    .affiliated h2 {
      margin-bottom: 20px;
    }

    .affiliated ul {
      list-style: none;
      padding: 0;
    }

    .affiliated ul li {
      display: inline;
      margin: 0 10px;
    }
    .header-buttons {
      display: flex;
      align-items: center;
    }

    .header-buttons button {
      background-color: #8B4513;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 1.2em;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-right: 10px;
    }

    .header-buttons button:hover {
      background-color: #654321; 
    }

    .footer {
      background-color: #ff5722; 
      color: #fff;
      padding: 20px;
      text-align: center;

    }
    /* Slideshow container */
    .slideshow-container {
      max-width: 1000px;
  position: relative;
  margin: auto;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 300px;
    }

    /* Hide the images by default */
    .mySlides {
      display: none;
    }

    /* Next and previous buttons */
    .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      margin-top: -22px;
      padding: 16px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover, .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }

    /* Text inside the slides */
    .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    /* Caption text */
    .caption-container {
      text-align: center;
      background-color: #222;
      padding: 2px 16px;
      color: white;
    }

    .dot {
      cursor: pointer;
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }

    .active, .dot:hover {
      background-color: #717171;
    }
  </style>
</head>
<body>


  

  <div class="hero">
    <div>
      <h1>Explore the World of Flavor</h1>
      <p>Discover mouthwatering recipes from around the globe</p>
      <button onclick="window.location.href='#our-recipes'">Get Cooking</button>
      </div>
  </div>
  
  
  <div class="fold" style="background-color: #f9f9f9; padding: 50px 0;">
  <h2 style="color: #333; margin-bottom: 20px;">Search Recipes</h2>
  <form id="recipe-search-form" style="display: flex; justify-content: center;">
    <input type="text" id="search-input" placeholder="Search for recipes..." style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; width: 300px;">
    <button type="button" onclick="handleSearch()" style="background-color: #8B4513; color: #fff; border: none; padding: 10px 20px; font-size: 1em; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;">Search</button>
  </form>
</div>

<script>
  function handleSearch() {
    // Get the search query from the input field
    var query = document.getElementById('search-input').value.trim().toLowerCase();
    
    // Get all recipe cards
    var recipeCards = document.querySelectorAll('.recipe-card');
    
    // Variable to track if a match is found
    var found = false;
    
    // Loop through each recipe card
    recipeCards.forEach(function(card) {
      // Get the recipe name from the card
      var recipeName = card.querySelector('h3').textContent.trim().toLowerCase();
      
      // Check if the recipe name contains the search query
      if (recipeName.includes(query)) {
        // Scroll to the recipe card
        card.scrollIntoView({ behavior: 'smooth', block: 'start' });
        
        // Highlight the card or show some indication of match
        card.style.border = '2px solid #8B4513';
        
        // Set found to true to indicate a match is found
        found = true;
        
        // Exit loop since we found the first match
        return;
      }
    });
    
    // If no match is found, alert the user
    if (!found) {
      alert('No recipes found matching your search.');
    }
  }
</script>



  
  <div class="fold">
    <h2>Popular Recipes</h2>
    <div class="recipe-card">
      <img src="./recipe1.jpeg" alt="Recipe 1">
      <h3>Spaghetti Carbonara</h3>
      <p>A classic Italian pasta dish made with eggs, cheese, pancetta, and black pepper.</p>
      <a href="#">View Recipe</a>
    </div>

    
    <div class="recipe-card">
      <img src="recipe2.jpeg" alt="Recipe 2">
      <h3>Chicken Tikka Masala</h3>
      <p>A flavorful Indian dish with tender chicken pieces in a creamy tomato-based sauce.</p>
      <a href="#">View Recipe</a>
    </div>
  </div>
  <?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "recipe_app";
$port = 3307; // Use the correct MySQL port

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select the database
if (!$conn->select_db($dbname)) {
    die("Database selection failed: " . $conn->error);
}

// Fetch recipes
$sql = "SELECT id, recipe_name, recipe_image, ingredients, instructions FROM recipes";
$result = $conn->query($sql);
?>

  <div id="our-recipes" class="fold">
    <h2>Our Recipes</h2>
    <p>Discover our collection of delicious recipes, curated just for you.</p>
    <div class="recipe-list">
      <?php
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<div class='recipe-card'>";
              echo "<img src='" . $row["recipe_image"] . "' alt='" . $row["recipe_name"] . "'>";
              echo "<h3>" . $row["recipe_name"] . "</h3>";
              echo "<p>Ingredients: " . $row["ingredients"] . "</p>";
              echo "<p>Instructions: " . $row["instructions"] . "</p>";
              echo "</div>";
          }
      } else {
          echo "No recipes found.";
      }
      $conn->close();
      ?>
    </div>
  </div>



  



  <div class="slideshow-container">
    <div class="mySlides fade">
      <img src="slideshow1.webp" style="width:50%">
    </div>
  
    <div class="mySlides fade">
      <img src="slideshow2.jpg" style="width:50%">
    </div>
  
    <div class="mySlides fade">
      <img src="slideshow3.jpeg" style="width:50%">
    </div>
  
    <div class="mySlides fade">
      <img src="slideshow4.jpg" style="width:50%">
    </div>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>

  <div class="fold" style="background-color: #fff7f2; padding: 50px 0; text-align: center;">
    <h2 style="color: #ff5722; font-size: 2em; margin-bottom: 20px;"></h2>
    <p style="color: #666; font-size: 1.2em; margin-bottom: 30px;">Explore our curated collections of recipes for every occasion.</p>
    <button style="background-color: #8B4513; color: #fff; border: none; padding: 10px 20px; font-size: 1.2em; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;"></button>
  </div>
  

  <div class="affiliated">
  <h2>Some Organizations</h2>
  <ul>
    <li><a href="https://www.foodnetwork.com/" target="_blank">Food Network</a></li>
    <li><a href="https://www.bbcgoodfood.com/" target="_blank">BBC Good Food</a></li>
    <li><a href="https://tasty.co/" target="_blank">Tasty</a></li>
  </ul>
</div>


  <div class="footer">
    <p>&copy; 2024 Delicious Recipes. All rights reserved.</p>
  </div>
  <script>
    var slideIndex = 0;
    showSlides();
  
    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}
      slides[slideIndex-1].style.display = "block";
      setTimeout(showSlides, 5000); // Change image every 5 seconds
    }

    
  </script>
</body>
</html>
