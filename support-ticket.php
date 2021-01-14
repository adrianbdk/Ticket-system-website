<?php
include_once 'header.php';
if (!isset($_SESSION['userid'])) {
    header("location: login.php?error=pleaselogin");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ProjektIAB</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/support-ticket.css">

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
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">

    <section class="content">
        <div class="row">
            <!-- BEGIN NAV TICKET -->
            <div class="col-md-3">
                <div class="grid support">
                    <div class="grid-body">
                        <h2>Browse</h2>

                        <hr>
                        <?php
                        $checkTicket = $conn->query("SELECT * FROM Blad");
                        $countEveryone = $checkTicket->num_rows;


                        $checkTicketCBY = $conn->query("SELECT * FROM Blad WHERE uzytkownik_id = '{$_SESSION['userid']}'");
                        $countYours = $checkTicketCBY->num_rows;
                        ?>

                        <ul id="createdby">
                            <li class="active"><a href="#" id="btnCreatedByEveryone">Everyone's Issues<span
                                            class="pull-right"><?php echo $countEveryone ?></span></a></li>
                            <li><a href="#" id="btnCreatedByYou">Created by you<span
                                            class="pull-right"><?php echo $countYours ?></span></a>
                            </li>
                            <!-- <li><a href="#">Mentioning you<span class="pull-right">18</span></a></li> -->
                        </ul>

                        <hr>

                        <!-- <p><strong>Labels</strong></p>
                        <ul class="support-label">
                            <li><a href="#"><span class="bg-blue">&nbsp;</span>&nbsp;&nbsp;&nbsp;application<span class="pull-right">2</span></a></li>
                            <li><a href="#"><span class="bg-red">&nbsp;</span>&nbsp;&nbsp;&nbsp;css<span class="pull-right">7</span></a></li>
                            <li><a href="#"><span class="bg-yellow">&nbsp;</span>&nbsp;&nbsp;&nbsp;design<span class="pull-right">128</span></a></li>
                            <li><a href="#"><span class="bg-black">&nbsp;</span>&nbsp;&nbsp;&nbsp;html<span class="pull-right">41</span></a></li>
                            <li><a href="#"><span class="bg-light-blue">&nbsp;</span>&nbsp;&nbsp;&nbsp;javascript<span class="pull-right">22</span></a></li>
                            <li><a href="#"><span class="bg-green">&nbsp;</span>&nbsp;&nbsp;&nbsp;management<span class="pull-right">87</span></a></li>
                            <li><a href="#"><span class="bg-purple">&nbsp;</span>&nbsp;&nbsp;&nbsp;mobile<span class="pull-right">92</span></a></li>
                            <li><a href="#"><span class="bg-teal">&nbsp;</span>&nbsp;&nbsp;&nbsp;php<span class="pull-right">140</span></a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
            <!-- END NAV TICKET -->


            <!-- BEGIN TICKET -->
            <div class="col-md-9">
                <div class="grid support-content">
                    <div class="grid-body">
                        <h2>Issues</h2>

                        <hr>


                        <!-- BEGIN NEW TICKET -->
                        <!-- Button trigger modal -->

                        <button type="button" class="btn-custom" data-toggle="modal" data-target="#createTicket"
                                data-whatever="@getbootstrap">Create new ticket
                        </button>

                        <div class="modal fade" id="createTicket" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New ticket</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="upload.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Title:</label>
                                                <input type="text" class="form-control" name="title" id="recipient-name"
                                                       required>
                                            </div>
                                            <?php
                                            $resultCategory = $conn->query("SELECT Nazwa FROM KategoriaBledu");
                                            ?>
                                            <div class="btn-group">
                                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                                    <div class="dropdown">
                                                        <select class="btn btn-secondary dropdown-toggle"
                                                                name="category" id="dropdownMenu2"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false" required>
                                                            <label>Select Category</label>
                                                            <option value="" disabled selected>Choose Category</option>
                                                            <?php
                                                            while ($row = $resultCategory->fetch_assoc()) {
                                                                $bug_category = $row['Nazwa'];
                                                                echo "<option class='dropdown-item' type='button' id='category' value='$bug_category'>$bug_category</option>";
                                                            }
                                                            ?>
                                                        </select>

                                                        <script>
                                                            $(".dropdown-menu button").click(function () {
                                                                $(this).closest('.btn-group').find('.btn').text($(this).text()).append("<span class='caret'>");
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                <?php
                                                $resultGame = $conn->query("SELECT Nazwa FROM Gra");
                                                ?>
                                                <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                    <div class="dropdown">
                                                        <select class="btn btn-secondary dropdown-toggle" name="game"
                                                                id="dropdownMenu2" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                            <label>Select game</label>
                                                            <option class="dropdown-item" value="" disabled selected>
                                                                Choose Game
                                                            </option>
                                                            <?php
                                                            while ($row = $resultGame->fetch_assoc()) {
                                                                $game = $row['Nazwa'];
                                                                echo "<option class='dropdown-item' type='button' id='category' value='$game'>$game</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                        <script>
                                                            $(".dropdown-menu button").click(function () {
                                                                $(this).closest('.btn-group').find('.btn').text($(this).text()).append("<span class='caret'>");
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Description:</label>
                                                <textarea class="form-control" name="description" id="description-text"
                                                          required></textarea>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file" id="file"/>
                                                    <label class="custom-file-label" for="file">Choose file</label>
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary" name="submit">Create ticket
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END NEW TICKET -->


                        <div class="row" id="created_by_everyone">
                            <div class="padding"></div>
                            <!-- BEGIN TICKET CONTENT -->
                            <div class="col-md-12">
                                <?php
                                $resultTicket = $conn->query("SELECT * FROM Blad");
                                $countEveryone = $resultTicket->num_rows;
                                ?>
                                <?php
                                while ($row = $resultTicket->fetch_assoc()) {
                                    $title = $row["title"];
                                    $description = $row["description"];
                                    $attachment = $row["attachment"];
                                    $ticketDate = $row['date'];

                                    $resultTicketStatus = $conn->query("SELECT Nazwa FROM StatusBledu WHERE 
                                statusBledu_id = '{$row['statusBledu_id']}'");
                                    $ticketStatus = $resultTicketStatus->fetch_assoc();
                                    $status = $ticketStatus['Nazwa'];

                                    $resultTicketUser = $conn->query("SELECT display_name FROM Uzytkownik WHERE 
                                uzytkownik_id = '{$row['uzytkownik_id']}'");
                                    $ticketUser = $resultTicketUser->fetch_assoc();
                                    $user = $ticketUser['display_name'];

                                    $howMuchCommentsEv = $conn->query("SELECT * FROM Komentarz INNER JOIN Uzytkownik 
                                          ON Komentarz.uzytkownik_id = Uzytkownik.uzytkownik_id
                                          INNER JOIN Blad ON Blad.blad_id = Komentarz.blad_id
                                          WHERE Blad.blad_id = '{$row['blad_id']}'");
                                    $countComments = $howMuchCommentsEv->num_rows;

                                    ?>
                                    <ul class="list-group fa-padding">
                                        <li class="list-group-item" data-toggle="modal"
                                            data-target="#issue<?php echo $row['blad_id'] ?>"
                                            data-whatever="@getbootstrap">
                                            <div class="media">
                                                <i class="fa fa-cog pull-left"></i>
                                                <div class="media-body">
                                                    <strong> <?php echo $title ?> </strong> <span
                                                            class="label label-danger"> <?php echo $status ?></span><span
                                                            class="number pull-right"># <?php echo $row['blad_id'] ?></span>
                                                    <p class="info"> Opened by <a
                                                                href="#"> <?php echo $user ?></a> <?php echo time_ago($ticketDate) ?>
                                                        <i class="fa fa-comments"></i> <a href="#"> <?php echo $countComments ?> comments </a></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <p></p>


                                    <!-- BEGIN DETAIL TICKET -->

                                    <div class="modal fade" id="issue<?php echo $row['blad_id'] ?>" tabindex="-1"
                                         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-blue">
                                                    <h5 class="modal-title"
                                                        id="exampleModalLabel"><?php echo $title ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src="assets/img/user/avatar01.png"
                                                                 class="img-circle" alt="" width="50">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <p>Issue <strong>#<?php echo $row['blad_id'] ?></strong>
                                                            opened by <a href="#"><?php echo $user ?></a> 5 hours
                                                            ago</p>
                                                        <p><?php echo $description ?></p>
                                                    </div>
                                                    <img class='img-fluid' src="<?php echo $attachment ?>">
                                                    <p></p>

                                                    <?php $resultComments = $conn->query("SELECT * FROM Komentarz INNER JOIN Uzytkownik 
                                                                                                ON Komentarz.uzytkownik_id = Uzytkownik.uzytkownik_id
                                                                                                INNER JOIN Blad ON Blad.blad_id = Komentarz.blad_id
                                                                                                WHERE Blad.blad_id = '{$row['blad_id']}'");
                                                    while ($rowComment = $resultComments->fetch_assoc()) {
                                                        ?>
                                                        <div class="row support-content-comment">
                                                            <div class="col-md-2">
                                                                <?php
                                                                $resultCommentUserId = $conn->query("SELECT uzytkownik_id FROM Komentarz 
                                                                                                        WHERE id_komentarz = {$rowComment['id_komentarz']}");
                                                                $commentUserId = $resultCommentUserId->fetch_assoc();

                                                                $resultUserPhoto = $conn->query("SELECT profile_photo FROM Uzytkownik 
                                                                            WHERE uzytkownik_id = {$commentUserId['uzytkownik_id']}");
                                                                $userPhotoPath = $resultUserPhoto->fetch_assoc();
                                                                ?>
                                                                <img src="<?php echo $userPhotoPath['profile_photo']; ?>"
                                                                     class="img-circle" alt="" width="50">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <p>Posted by <a
                                                                            href="#"><?php echo $rowComment['display_name']; ?></a>
                                                                </p>
                                                                <p><?php echo $rowComment['comment']; ?></p>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <?php $permissionsCheck = $conn->query("SELECT permissions from Uzytkownik 
                                                        WHERE uzytkownik_id = {$_SESSION['userid']}");
                                                $permission = $permissionsCheck->fetch_assoc();

                                                if ($permission['permissions'] == "Admin") {
                                                    ?>
                                                    <form action="postReply.php" method="POST">
                                                        <div class="form-group"
                                                             style="margin-left: 50px; margin-top: 10px">

                                                            <input type="hidden" value="<?php echo $row['blad_id']; ?>"
                                                                   name="blad_id">
                                                            <label for="message-text"
                                                                   class="col-form-label">Comment:</label>
                                                            <textarea class="form-control" style="max-width: 350px;"
                                                                      name="comment-text" id="comment-text"
                                                                      required></textarea>
                                                            <button name='submit' id='post_reply' type='submit'><span
                                                                        class="fa fa-reply"></span> &nbsp;Post a
                                                                reply
                                                            </button>
                                                            <p></p>
                                                        </div>
                                                    </form>
                                                <?php } ?>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                            data-dismiss="modal"><i class="fa fa-times"></i> Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                <?php } ?>
                                <!-- END DETAIL TICKET -->
                            </div>
                            <!-- END TICKET CONTENT -->
                        </div>


                        <!-- CREATED BY YOU OPTION -->

                        <div class="row" id="created_by_you" style="display:none;">
                            <div class="padding"></div>
                            <!-- BEGIN TICKET CONTENT -->
                            <div class="col-md-12">
                                <?php
                                $resultTicket = $conn->query("SELECT * FROM Blad WHERE uzytkownik_id = '{$_SESSION['userid']}'");
                                ?>
                                <?php
                                while ($row = $resultTicket->fetch_assoc()) {
                                    $title = $row["title"];
                                    $description = $row["description"];
                                    $attachment = $row["attachment"];
                                    $ticketDate = $row['date'];

                                    $resultTicketStatus = $conn->query("SELECT Nazwa FROM StatusBledu WHERE
        statusBledu_id = '{$row['statusBledu_id']}'");
                                    $ticketStatus = $resultTicketStatus->fetch_assoc();
                                    $status = $ticketStatus['Nazwa'];

                                    $resultTicketUser = $conn->query("SELECT display_name FROM Uzytkownik WHERE
        uzytkownik_id = '{$row['uzytkownik_id']}'");
                                    $ticketUser = $resultTicketUser->fetch_assoc();
                                    $user = $ticketUser['display_name'];

                                    $howMuchComments = $conn->query("SELECT * FROM Komentarz INNER JOIN Uzytkownik 
                                          ON Komentarz.uzytkownik_id = Uzytkownik.uzytkownik_id
                                          INNER JOIN Blad ON Blad.blad_id = Komentarz.blad_id
                                          WHERE Blad.blad_id = '{$row['blad_id']}'");
                                    $countComments = $howMuchComments->num_rows;

                                    ?>
                                    <ul class="list-group fa-padding">
                                        <li class="list-group-item" data-toggle="modal"
                                            data-target="#createdByYouIssue<?php echo $row['blad_id'] ?>"
                                            data-whatever="@getbootstrap">
                                            <div class="media">
                                                <i class="fa fa-cog pull-left"></i>
                                                <div class="media-body">
                                                    <strong><?php echo $title ?> </strong> <span
                                                            class="label label-danger"> <?php echo $status ?></span><span
                                                            class="number pull-right"># <?php echo $row['blad_id'] ?></span>
                                                    <p class="info"> Opened by <a
                                                                href="#"> <?php echo $user ?></a> <?php echo time_ago($ticketDate) ?>
                                                        <i class="fa fa-comments"></i> <a href="#"> <?php echo $countComments ?> comments </a></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <p></p>


                                    <!-- BEGIN DETAIL TICKET -->

                                    <div class="modal fade" id="createdByYouIssue<?php echo $row['blad_id'] ?>"
                                         tabindex="-1"
                                         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-blue">
                                                    <h5 class="modal-title"
                                                        id="exampleModalLabel"><?php echo $title ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src="assets/img/user/avatar01.png"
                                                                 class="img-circle" alt="" width="50">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <p>Issue <strong>#<?php echo $row['blad_id'] ?></strong>
                                                            opened by <a href="#"><?php echo $user ?></a> 5 hours
                                                            ago</p>
                                                        <p><?php echo $description ?></p>
                                                    </div>
                                                    <img class='img-fluid' src="<?php echo $attachment ?>">
                                                    <p></p>
                                                    <?php $resultComments = $conn->query("SELECT * FROM Komentarz INNER JOIN Uzytkownik
                            ON Komentarz.uzytkownik_id = Uzytkownik.uzytkownik_id
                            INNER JOIN Blad ON Blad.blad_id = Komentarz.blad_id
                            WHERE Blad.blad_id = '{$row['blad_id']}'");
                                                    while ($rowComment = $resultComments->fetch_assoc()) {
                                                        ?>
                                                        <div class="row support-content-comment">
                                                            <div class="col-md-2">
                                                                <?php
                                                                $resultCommentUserId = $conn->query("SELECT uzytkownik_id FROM Komentarz 
                                                                                                        WHERE id_komentarz = {$rowComment['id_komentarz']}");
                                                                $commentUserId = $resultCommentUserId->fetch_assoc();

                                                                $resultUserPhoto = $conn->query("SELECT profile_photo FROM Uzytkownik 
                                                                            WHERE uzytkownik_id = {$commentUserId['uzytkownik_id']}");
                                                                $userPhotoPath = $resultUserPhoto->fetch_assoc();
                                                                ?>
                                                                <img src="<?php echo $userPhotoPath['profile_photo'] ?>"
                                                                     class="img-circle" alt="" width="50">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <p>Posted by <a
                                                                            href="#"><?php echo $rowComment['display_name']; ?></a>
                                                                </p>
                                                                <p><?php echo $rowComment['comment']; ?></p>
                                                                <a href="#"><span class="fa fa-reply"></span> &nbsp;Post
                                                                    a reply</a>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <?php $permissionsCheck = $conn->query("SELECT permissions from Uzytkownik 
                                                        WHERE uzytkownik_id = {$_SESSION['userid']}");
                                                $permission = $permissionsCheck->fetch_assoc();

                                                if ($permission['permissions'] == "Admin") {
                                                    ?>
                                                    <form action="postReply.php" method="POST">
                                                        <div class="form-group"
                                                             style="margin-left: 50px; margin-top: 10px">

                                                            <input type="hidden" value="<?php echo $row['blad_id']; ?>"
                                                                   name="blad_id">
                                                            <label for="message-text"
                                                                   class="col-form-label">Comment:</label>
                                                            <textarea class="form-control" style="max-width: 350px;"
                                                                      name="comment-text" id="comment-text"
                                                                      required></textarea>
                                                            <button name='submit' id='post_reply' type='submit'><span
                                                                        class="fa fa-reply"></span> &nbsp;Post a
                                                                reply
                                                            </button>
                                                            <p></p>
                                                        </div>
                                                    </form>
                                                <?php } ?>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                            data-dismiss="modal"><i class="fa fa-times"></i> Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                <?php } ?>
                                <!-- END DETAIL TICKET -->
                            </div>
                        </div>

                        <!--END CREATED BY YOU SECTION-->


                    </div>
                </div>
            </div>
            <!-- END TICKET -->
        </div>
    </section>
</div>

<script>
    $('#btnCreatedByYou').on('click', function () {
        if ($('#created_by_everyone').css('display') != 'none') {
            $('#created_by_you').show().siblings('div').hide();
        } else if ($('#created_by_you').css('display') != 'none') {
            $('#created_by_you').show().siblings('div').hide();
        }
    });
    $('#btnCreatedByEveryone').on('click', function () {
        if ($('#created_by_you').css('display') != 'none') {
            $('#created_by_everyone').show().siblings('div').hide();
        } else if ($('#created_by_everyone').css('display') != 'none') {
            $('#created_by_everyone').show().siblings('div').hide();
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
    $(document).on('click', '#createdby li', function () {
        $(this).addClass('active').siblings().removeClass('active')
    })
</script>


</body>
</html>
