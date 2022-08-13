<?php
    $host="localhost";
    $username="username";
    $password="password";
    $dbname="dbname";
    $tblname="users";

    $conn= new mysqli($host, $username, $password);
    if($conn->connect_error){
        die("Connection failed: " . $conn-> connect_error);
    }
    echo "Connected Successfully";
?>


<?php
function parse_xml($xml){
    $parser = xml_parser_create();
    xml_parse_into_struct($parser, $xml, $vals);
    xml_parser_free($parser);

    $params = array();
    $level = array();
    foreach ($vals as $xml_elem) {
        if ($xml_elem['type'] == 'open') {
            if (array_key_exists('attributes',$xml_elem)) {
                list($level[$xml_elem['level']],$extra) = array_values($xml_elem['attributes']);
            } else {
                $level[$xml_elem['level']] = $xml_elem['tag'];
            }
        }
        if ($xml_elem['type'] == 'complete') {
            $start_level = 1;
            $php_stmt = '$params';
            while($start_level < $xml_elem['level']) {
                $php_stmt .= '[$level['.$start_level.']]';
                $start_level++;
            }
            $php_stmt .= '[$xml_elem[\'tag\']] = $xml_elem[\'value\'];';
            eval($php_stmt);
        }
    }
    return $params;
}

function insert_into_db($params) {
$con = mysqli_connect("localhost", "root", "", "mydatabase");

if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "INSERT INTO flight (flightID, origin, destination, departure_date, departure_time, arrival_date, arrival_time, price)
VALUES ('$params[flightid]', '$params[origin]', '$params[destination]', '$params[departuredate]', '$params[departuretime]', '$params[arrivaldate]', '$params[arrivaltime]', '$params[price]')";

if (!mysqli_query($con, $sql)) {
die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
}

function retrieve_from_db() {
$con = mysqli_connect("localhost", "root", "", "mydatabase");

if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT * FROM flight";
$result = mysqli_query($con, $sql);

$data = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
$data[] = $row;
}

return $data;
}

function display_table($data) {
    echo "<table>";
    echo "<tr>";
    echo "<th>flightID</th>";
    echo "<th>origin</th>";
    echo "<th>destination</th>";
    echo "<th>departure_date</th>";
    echo "<th>departure_time</th>";
    echo "<th>arrival_date</th>";
    echo "<th>arrival_time</th>";
    echo "<th>price</th>";
    echo "</tr>";
    foreach ($data as $row) {
        echo "<tr>";
        echo "<td>" . $row['flightID'] . "</td>";
        echo "<td>" . $row['origin'] . "</td>";
        echo "<td>" . $row['destination'] . "</td>";
        echo "<td>" . $row['departure_date'] . "</td>";
        echo "<td>" . $row['departure_time'] . "</td>";
        echo "<td>" . $row['arrival_date'] . "</td>";
        echo "<td>" . $row['arrival_time'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
}

function parseAndInsert() {
    $xml = file_get_contents('flight.xml');
    $params = parse_xml($xml);
    insert_into_db($params);
}

function retrieveAndDisplay() {
    $data = retrieve_from_db();
    display_table($data);
}

    parseAndInsert();
    retrieveAndDisplay();
?>