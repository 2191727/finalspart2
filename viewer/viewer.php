<?php
require 'baseURL.php';
require 'connect.php';

$query = "SELECT content.ContentID, content.Title, content.Description, content.Type, content.`status`, duration.`from`, duration.`to`, history.fileName FROM content INNER JOIN duration ON content.durationID = duration.durationID INNER JOIN history ON content.historyID = history.historyID WHERE TIME(duration.from) <= TIME(NOW()) AND TIME(duration.to) >= TIME(NOW())";
$result = $conn->query($query);
$data = array();
if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        array_push($data, $row);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>View</title>
</head>

<body>
    <div class="video-container">
        <div class="video">
            <?php
            if ($data) {
                echo '<video id="myVideo" autoplay muted loop width="110%" height="110%">
                <source src="' . $baseUrl . '/playVideo/' . $data[0]['fileName'] . '" type="video/mp4">
            </video><br><button id="muteButton" class="btn btn-info text-white">Mute/Unmute</button>';
            } else {
                echo '<video id="myVideo" autoplay muted loop width="110%" height="110%" >
                <source src="" type="video/mp4" alt="ERROR">
                Your browser does not support the video tag.
            </video>';
            }
            ?>
        </div>
    </div>
    <?php include('./header_sidebar_footer/footer.php') ?>
    <script>
        var video = document.getElementById("myVideo");
        var muteButton = document.getElementById("muteButton");

        muteButton.addEventListener("click", function() {
            if (video.muted) {
                video.muted = false;
                muteButton.textContent = "Mute";
            } else {
                video.muted = true;
                muteButton.textContent = "Unmute";
            }
        });
    </script>
</body>

</html>