<?php
$dataFile = 'team_data.txt';
if (file_exists($dataFile)) {
    $teamArray = file($dataFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
} else {
    $teamData = "Brian O. Blaza|21|Hi, my name is Brian O. Blaza from Team 4. I am 21 years old, and we are currently working on this webpage. As the team leader, we constructed this webpage with manner and professionalism. I have experience as an IT Specialist in a private company and in back-end programming.|Brian.jpg|https://www.facebook.com/haruhikoooooo?mibextid=ZbWKwL|https://www.instagram.com/seiyaaaaaaaaaaaaaaaaaaaaaaaaaa?igsh=dGp1aTdiMTRzMg==|https://github.com/Seiyaaaaaaaaaaaaaaa\n" .
        "Mark Allen G. Bayona|22|My name is Mark Allen Bayona. I am 22, from Katarungan Village 2. I am part of Team 4 of BSIT 3L.|alien.jpg|https://www.facebook.com/mark.bayona.3?mibextid=ZbWKwL|https://www.instagram.com/llenofficial_?igsh=MXdvZjUxYzdiM3hmOQ==|https://github.com/len-mark27\n" .
        "Jhovella Mae G. Buendia|20|My name is Jhovella Mae G. Buendia, and I am 20 years old from Tunasan, Muntinlupa City. I am grateful to have this team, Group 4. I am a BSIT student who is still learning programming languages, particularly HTML and CSS.|ella.jpg|https://www.facebook.com/jhovellamae.galiasbuendia?mibextid=ZbWKwL|https://www.instagram.com/itsyaboikielll?igsh=MWhqZzU4aWY1ejRpNg==|https://github.com/jhovellamaee\n" .
        "Katrina M. Macalinao|1 year|Hi, my name is Katrina M. Macalinao from Team 4. I am a web developer from GMA Cavite with a passion for creating websites. With over 1 year of experience in HTML and CSS, I specialize in building responsive and accessible web applications.|Kat.jpg|https://www.facebook.com/katrina.macalinao.1?mibextid=ZbWKwL|https://www.instagram.com/_trnmcs?igsh=YmFyNzIzeDF6ZHAw|https://github.com/Trinamacalinao\n" .
        "Jonalyn P. Madrigal|22|My name is Jonalyn P. Madrigal. I am 22 years old from Bayanan, Muntinlupa City. I am currently a 3rd-year college student at Pamantasan Lungsod ng Muntinlupa.|Jo.jpg|https://www.facebook.com/jonalyn.madrigal.52?mibextid=ZbWKwL|https://www.instagram.com/me_kyami?igsh=MW9wdWdhZXEyZGVpaA==|https://github.com/Jonalynmadrigal";
    file_put_contents($dataFile, $teamData);
    $teamArray = file($dataFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group 4 Team Portfolio</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <h1>Group 4 Team Profile</h1>
    <button class="manage" onclick="window.location.href='manage.php'">Manage Team</button>
<div class="register">
    <p class="join-text">Wanna be part of the team?</p>
    <button class="edit" onclick="window.location.href='register.php'">Click Here</button>
</div>
    <?php foreach ($teamArray as $index => $memberData): 
        $member = explode('|', $memberData); ?>
        <button class="nav" onclick="showContent('content<?php echo $index + 1; ?>')">
            <?php echo $member[0]; ?>
        </button>
    <?php endforeach; ?>
    <?php foreach ($teamArray as $index => $memberData): 
        $member = explode('|', $memberData); ?>
        <div id="content<?php echo $index + 1; ?>" class="content">
            <h2><?php echo $member[0]; ?></h2>
            <h3>My Social Media Account:</h3>
            <p><?php echo $member[2]; ?></p>
            <img src="<?php echo $member[3]; ?>" alt="<?php echo $member[0]; ?>">
            <button id="fb" onclick="window.location.href='<?php echo $member[4]; ?>'"></button>
            <button id="insta" onclick="window.location.href='<?php echo $member[5]; ?>'"></button>
            <button id="github" onclick="window.location.href='<?php echo $member[6]; ?>'"></button>
        </div>
    <?php endforeach; ?>

    <script src="main.js"></script>
</body>
</html>
