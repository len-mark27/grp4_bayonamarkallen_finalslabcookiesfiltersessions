<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
    $bio = filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if ($email && preg_match("/@gmail\.com$/", $email)) {
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image = $_FILES['image'];
            $imageName = basename($image['name']);
            $_SESSION['name'] = $name;
            $_SESSION['age'] = $age;
            setcookie("user_name", $name, time() + (86400 * 30), "/");
            echo "Registration successful! Welcome, " . htmlspecialchars($name);
        } else {
            echo "Please upload a valid image file.";
        }
    } else {
        echo "Please enter a valid Gmail address.";
    }
}
if (isset($_COOKIE['user_name'])) {
    $userName = htmlspecialchars($_COOKIE['user_name']);
    echo "Welcome back, $userName!";
}
?>
<?php include 'header.php'; ?>
<form id="registerForm" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="age">Age:</label>
        <select id="age" name="age" required>
            <?php
            for ($i = 18; $i <= 50; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="bio">Bio:</label>
        <textarea id="bio" name="bio" rows="4" cols="50" required></textarea>
    </div>
    <div class="form-group">
        <label for="email">Email (Gmail only):</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="image">Select Profile Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
    </div>
    <input type="submit" value="Register">
</form>
<?php include 'footer.php'; ?>
