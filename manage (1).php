<?php
$dataFile = 'team_data.txt';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $names = $_POST['name'];
    $ages = $_POST['age'];
    $bios = $_POST['bio'];
    $images = $_POST['image'];
    $facebookUrls = $_POST['facebook'];
    $instagramUrls = $_POST['instagram'];
    $githubUrls = $_POST['github'];
    $newData = [];
    foreach ($names as $index => $name) {
        $newData[] = implode('|', [
            htmlspecialchars($name),
            htmlspecialchars($ages[$index]),
            htmlspecialchars($bios[$index]),
            htmlspecialchars($images[$index]),
            htmlspecialchars($facebookUrls[$index]),
            htmlspecialchars($instagramUrls[$index]),
            htmlspecialchars($githubUrls[$index])
        ]);
    }
    file_put_contents($dataFile, implode("\n", $newData));
    echo "<p class='success-message'>Team data updated successfully.</p>";
}
$teamArray = [];
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (file_exists($dataFile)) {
        $teamArray = file($dataFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Team Data</title>
    <link rel="stylesheet" href="manage.css">
</head>
<body>
<h1>Manage Team Data</h1>
<form method="post">
    <?php
    foreach ($teamArray as $index => $line) {
        list($name, $age, $bio, $image, $facebook, $instagram, $github) = explode('|', $line);
        echo "<fieldset>";
        echo "<legend>Team Member " . ($index + 1) . "</legend>";
        echo "<label for='name_$index'>Name:</label>";
        echo "<input type='text' id='name_$index' name='name[]' value='" . htmlspecialchars($name) . "' required><br>";
        echo "<label for='age_$index'>Age:</label>";
        echo "<input type='text' id='age_$index' name='age[]' value='" . htmlspecialchars($age) . "' required><br>";
        echo "<label for='bio_$index'>Bio:</label>";
        echo "<textarea id='bio_$index' name='bio[]' rows='4' cols='50' required>" . htmlspecialchars($bio) . "</textarea><br>";
        echo "<label for='image_$index'>Image Filename:</label>";
        echo "<input type='text' id='image_$index' name='image[]' value='" . htmlspecialchars($image) . "' required><br>";
        echo "<label for='facebook_$index'>Facebook URL:</label>";
        echo "<input type='text' id='facebook_$index' name='facebook[]' value='" . htmlspecialchars($facebook) . "' required><br>";
        echo "<label for='instagram_$index'>Instagram URL:</label>";
        echo "<input type='text' id='instagram_$index' name='instagram[]' value='" . htmlspecialchars($instagram) . "' required><br>";
        echo "<label for='github_$index'>GitHub URL:</label>";
        echo "<input type='text' id='github_$index' name='github[]' value='" . htmlspecialchars($github) . "' required><br>";
        echo "</fieldset><br>";
    }
    ?>
    <input type="submit" value="Update Team Data">
</form>
<a href="main.php" class="back-button">Back to Main</a>
</body>
</html>
