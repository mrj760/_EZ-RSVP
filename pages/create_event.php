<!-- This page will allow the user to create a new event by providing 
    the event details such as the date, time, venue, and event description. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../style/_global.css?<?= filesize('../style/_global.css'); ?>" />
    <script src="../script/_global.js?<?= filesize('../script/_global.js'); ?>"></script>
</head>

<body>
    <div class="background">
        <h1>Create Event</h1>
        <form action="../php/create.event.php" method="POST">
            <div>
                <label class="default">Event name:<br>
                    <input id="eventName" type="text" name="eventName" required="required">
                </label>
            </div>
            <div>
                <label class="default">Location:<br>
                    <input id="eventLocation" type="text" name="eventLocation" required="required">
                </label>
            </div>
            <div>
                <label class="default">Event Photo URL:<br>
                    <input id="eventPhotoURL" type="text" name="eventPhotoURL" required="required">
                </label>
            </div>
            <div>
                <label class="default">Date:<br>
                    <input id="eventDate" type="date" name="eventDate" required="required">
                </label>
            </div>
            <div>
                <label class="default">Time:<br>
                    <input id="eventTime" type="text" name="eventTime" required="required">
                </label>
            </div>
            <div>
                <label class="">Event Details
                    <br>
                    <textarea id="eventDetails" name="eventDetails" wrap="hard" rows="3" cols="30" required="required"></textarea>
                </label>
            </div>
            <div id="buttons">
                <input type="submit" value="Create" class="button" >
                <input type="reset" value="Reset" class="secondaryButton">
            </div>
            <?php require_once('db.config.php');

// Start php session to pull local data from prior php pages
session_start();

// Validate request
if (!isset($_COOKIE['email']) ||!isset($_POST['eventName']) || !isset($_POST['eventPhotoURL']) || !isset($_POST['eventDetails']) || !isset($_POST['eventDate']) || !isset($_POST['eventTime']) || !isset($_POST['eventLocation'])) {
    http_response_code(400);
    echo ($_COOKIE['username']);
    print_r($_COOKIE);
    echo json_encode(array("message" => 'You should fill up required values'));
    exit;
}

//Create event array of required details
$EVENT = array(
    $_COOKIE['email'],
    $_POST['eventName'],
    $_POST['eventPhotoURL'],
    $_POST['eventDetails'],
    $_POST['eventDate'],
    $_POST['eventTime'],
    $_POST['eventLocation']
);

// Prepare a SQL statement to insert the event into the database
$SQL = "INSERT INTO events (owner, name, \"photoURL\", details, date, time, location) VALUES ($1, $2, $3, $4, $5, $6, $7)";

// Execute the SQL statement
$result = pg_query_params($CONNECTION, $SQL, $EVENT);

if (!$result) {
    http_response_code(500);
    echo json_encode(array("message" => "Error occurred while creating event: " . pg_last_error($CONNECTION)));
}

// Close the database connection
pg_close($CONNECTION);

header("Location: dashboard.php");
exit();

?>


        </form>
    </div>
</body>

</html>