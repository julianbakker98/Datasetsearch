<title>Ambitieproject Result page</title>
<?php
$url = 'https://catalog.data.gov/api/3/action/package_search?q=title:'.$_GET['query'];
$ch = curl_init( $url );
$options = array(
);

curl_setopt_array( $ch, $options );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result =  curl_exec($ch);
curl_close($ch);
$data = json_decode($result, true);
?>

<?php
echo '<link rel="stylesheet" href="css/table.css" type="text/css">';

if (sizeof($data['result']['results']) == 0) {
    echo "<h1>Search again, no usable results found!</h1>";
} else {
?>
<table class="ResultsFromApi" border="1">
    <thead>
    <tr>
        <th>Title</th>
        <th>Download URL</th>
        <th>Total trackings</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data['result']['results'] as $key => $value) {
        echo '<tr>';
        echo '<td>';
        echo $value['title'];
        echo '</td>';
        echo '<td> ';
        echo $value['resources'][0]['url'];
        echo '</td>';
        echo '<td>';
        echo $value['tracking_summary']['total'];
        echo '</td>';
        echo '</tr>';
    }
    }

    ?>
        </tbody>
    </table>

    <a href="index.php"><button class="button">Search again!</button></a>
