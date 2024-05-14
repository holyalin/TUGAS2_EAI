<?php
$apiKey = "c9f91b0c298f3a132f1dceb25c7953f4703e39a38b234865b9d1f9c3ec52c28f";

$leagueApi = file_get_contents("https://apiv3.apifootball.com/?action=get_leagues&country_id=".$_GET['country_id']."&APIkey=".$apiKey);
$parseLeagueApi = json_decode($leagueApi, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colorful Admin Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-primary {
            background-color: #007bff !important;
        }
        .bg-success {
            background-color: #28a745 !important;
        }
        .bg-info {
            background-color: #17a2b8 !important;
        }
        .bg-warning {
            background-color: #ffc107 !important;
        }
        .bg-danger {
            background-color: #dc3545 !important;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-3">Colorful Admin Dashboard</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Table</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Liga</th>
                                    <th scope="col">Season</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($parseLeagueApi as $key => $value) {
                                    $i = $key + 1;
                                    echo '<tr>';
                                    echo '<th scope="row">'.$i.'</th>';
                                    echo '<td><img src="'.$value['league_logo'].'" alt="'.$value['country_name'].'" class="rounded" height="20" /></td>';
                                    echo '<td>'.$value['league_name'].'</td>';
                                    echo '<td>'.$value['league_season'].'</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
