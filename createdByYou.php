<div class="row" id="created_by_you">
    <!-- BEGIN TICKET CONTENT -->
    <div class="col-md-12">
        <?php
        $resultTicket = $conn->query("SELECT * FROM Blad");
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
                                <i class="fa fa-comments"></i> <a href="#"> 2 comments </a></p>
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
                        <form action="#" method="post">
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
                                            <?php $resultUserPhoto = $conn->query("SELECT profile_photo FROM Uzytkownik
                                    WHERE Uzytkownik.uzytkownik_id = '{$_SESSION["userid"]}'");
                                            $userPhotoPath = $resultUserPhoto->fetch_assoc();
                                            ?>
                                            <img src="<?php echo $userPhotoPath['profile_photo']?>"
                                                 class="img-circle" alt="" width="50">
                                        </div>
                                        <div class="col-md-10">
                                            <p>Posted by <a href="#"><?php echo $rowComment['display_name'];?></a></p>
                                            <p><?php echo $rowComment['comment'];?></p>
                                            <a href="#"><span class="fa fa-reply"></span> &nbsp;Post
                                                a reply</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default"
                                        data-dismiss="modal"><i class="fa fa-times"></i> Close
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        <?php } ?>
        <!-- END DETAIL TICKET -->
    </div>
</div>
