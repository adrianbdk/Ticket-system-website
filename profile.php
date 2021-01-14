<?php
include_once 'header.php';
if(!isset($_SESSION['userid'])){
    header("location: login.php?error=pleaselogin");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ProjektIAB</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style_profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
            integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
            crossorigin="anonymous"></script>


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
                <div class="author-card-cover"
                     style="background-image: url(https://demo.createx.studio/createx-html/img/widgets/author/cover.jpg);"></div>
                <div class="author-card-profile">
                    <?php $resultUserPhoto = $conn->query("SELECT profile_photo FROM Uzytkownik 
                                                WHERE Uzytkownik.uzytkownik_id = '{$_SESSION["userid"]}'");
                        $userPhotoPath = $resultUserPhoto->fetch_assoc();
                         ?>
                    <div class="author-card-avatar"><img src="<?php echo $userPhotoPath['profile_photo'] ?>"
                                                         alt="<?php
                                                         if (isset($_SESSION["userid"])) {
                                                             echo "<p> Welcome " . $_SESSION["login"] . "</php>";
                                                         }
                                                         ?>">
                    </div>
                    <div class="author-card-details">
                        <h5 class="author-card-name text-lg">
                            <?php
                            $resultDUser = $conn->query("SELECT display_name FROM Uzytkownik 
                                                WHERE Uzytkownik.uzytkownik_id = '{$_SESSION["userid"]}'");
                            $userDName = $resultDUser->fetch_assoc();?>

                            <p><?php echo $userDName['display_name']?> </p>
                        </h5><span class="author-card-position">Joined <?php echo time_ago_profile('2018-12-09 23:38:00') ?></span>
                    </div>
                </div>
            </div>
            <div class="wizard">
                <nav class="list-group list-group-flush">
                    <a class="list-group-item" href='#' data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fa fa-user text-muted"></i>Profile Settings</a>
                </nav>
            </div>
        </div>

        <!--Profile settings-->

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <form action="profileSettings.php" method="POST" enctype="multipart/form-data">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Profile Settings</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Change username:</label>
                            <input type="text" class="form-control" name="new_username" id="new_username" placeholder="Enter new username">
                        </div>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file" id="file"/>
                                <label class="custom-file-label" for="file">Change profile photo(choose file)</label>
                            </div>
                        </div>
                        <script>
                            $('#file').on('change', function () {
                                //get the file name
                                var fileName = $(this).val().replace('C:\\fakepath\\', " ");
                                //replace the "Choose a file" label
                                $(this).next('.custom-file-label').html(fileName);
                            })
                        </script>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                    </div>
                </div>
            </div>
            </form>
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
                    <?php
                    $uid = $_SESSION['userid'];
                    $resultTicket = $conn->query("SELECT * FROM Blad WHERE uzytkownik_id = {$uid}");
                    ?>
                    <?php
                    while ($row = $resultTicket->fetch_assoc()) {
                        $ticketDate = $row['date'];
                        $formatDate = DateTime::createFromFormat('Y-m-d H:i:s', $ticketDate);
                        ?>
                        <tr>
                            <td><a class="navi-link" href="#order-details"
                                   data-toggle="modal"><?php echo $row['blad_id'] ?></a></td>
                            <td><?php echo date_format($formatDate,'F d, Y') ?></td>
                            <?php $resultStatus = $conn->query("SELECT Nazwa from StatusBledu 
                                    WHERE statusBledu_id = {$row['statusBledu_id']}");
                                $status = $resultStatus->fetch_assoc();?>
                            <?php if ($status['Nazwa'] == 'New'){?>
                            <td><span class="badge badge-primary m-0"><?php echo $status['Nazwa'];?></span></td>
                            <?php }else if ($status['Nazwa'] == 'Pending'){ ?>
                            <td><span class="badge badge-warning m-0"><?php echo $status['Nazwa'];?></span></td>
                            <?php } ?>
                            <td><span>Marcin Najman</span></td>
                        </tr>
                    <?php } ?>

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
