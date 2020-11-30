<?php
include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>ProjektIAB</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style_profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


</head>
<body>
    <style>
        body {
  background: #eee;
}
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container mb-4 main-container">
    <div class="row">
        <div class="col-lg-4 pb-5">
            <!-- Account Sidebar-->
            <div class="author-card pb-3">
                <div class="author-card-cover" style="background-image: url(https://demo.createx.studio/createx-html/img/widgets/author/cover.jpg);"></div>
                <div class="author-card-profile">
                    <div class="author-card-avatar"><img src="uploads/najman.png"
                    alt="<?php
if (isset($_SESSION["userid"])) {
    echo "<p> Welcome " . $_SESSION["login"] . "</php>";
}
?>">
                    </div>
                    <div class="author-card-details">
                        <h5 class="author-card-name text-lg">
                            <?php
if (isset($_SESSION["userid"])) {
    echo "<p>" . $_SESSION["login"] . "</php>";
}
?>
</h5><span class="author-card-position">Joined February 06, 2017</span>
                    </div>
                </div>
            </div>
            <div class="wizard">
                <nav class="list-group list-group-flush">
                    <a class="list-group-item active" href="#">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fa fa-shopping-bag mr-1 text-muted"></i>

                            </div><span class="badge badge-secondary">6</span>
                        </div>
                    </a><a class="list-group-item" href="#"><i class="fa fa-user text-muted"></i>Profile Settings</a>

                </nav>
            </div>
        </div>
        <!-- Orders Table-->
        <div class="col-lg-8 pb-5">
            <div class="d-flex justify-content-end pb-3">
                <div class="form-inline">
                    <label class="text-muted mr-3" for="order-sort">Sort Orders</label>
                    <select class="form-control" id="order-sort">
                        <option>All</option>
                        <option>Solved</option>
                        <option>In Progress</option>
                        <option>Resolved</option>
                        <option>Delayed</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Ticket #</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Assigned agent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">78A643CD409</a></td>
                            <td>August 08, 2020</td>
                            <td><span class="badge badge-danger m-0">Canceled</span></td>
                            <td><span>Marcin Najman</span></td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">34VB5540K83</a></td>
                            <td>July 21, 2020</td>
                            <td><span class="badge badge-info m-0">In Progress</span></td>
                            <td>Marcin Najman</td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">112P45A90V2</a></td>
                            <td>June 15, 2020</td>
                            <td><span class="badge badge-warning m-0">Delayed</span></td>
                            <td>Marcin Najman</td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">28BA67U0981</a></td>
                            <td>May 19, 2020</td>
                            <td><span class="badge badge-success m-0">Solved</span></td>
                            <td>Marcin Najman</td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">502TR872W2</a></td>
                            <td>April 04, 2020</td>
                            <td><span class="badge badge-success m-0">Solved</span></td>
                            <td>Marcin Najman</td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">47H76G09F33</a></td>
                            <td>March 30, 2020</td>
                            <td><span class="badge badge-success m-0">Solved</span></td>
                            <td>Marcin Najman</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">

</script>
</body>
</html>
