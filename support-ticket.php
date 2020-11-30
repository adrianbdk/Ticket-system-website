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
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/support-ticket.css">

	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

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

					<ul>
						<li class="active"><a href="#">Everyone's Issues<span class="pull-right">142</span></a></li>
						<li><a href="#">Created by you<span class="pull-right">52</span></a></li>
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

					 <div class="btn-group">
						<button type="button" class="btn btn-default active">162 Open</button>
						<button type="button" class="btn btn-default">95,721 Closed</button>
					</div>

					 <div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> Sort: <strong>Newest</strong> <span class="caret"></span></button>
						<ul class="dropdown-menu fa-padding" role="menu">
							<li><a href="#"><i class="fa fa-check"></i> Newest</a></li>
							<li><a href="#"><i class="fa"> </i> Oldest</a></li>
							<li><a href="#"><i class="fa"> </i> Recently updated</a></li>
							<li><a href="#"><i class="fa"> </i> Least recently updated</a></li>
							<li><a href="#"><i class="fa"> </i> Most commented</a></li>
							<li><a href="#"><i class="fa"> </i> Least commented</a></li>
						</ul>
					</div>

					<!-- BEGIN NEW TICKET -->
					<!-- Button trigger modal -->

					<button type="button" class="btn-custom" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Create new ticket</button>

					<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
								<input type="text" class="form-control" id="recipient-name" required>
							</div>
                                <?php
                                $resultCategory = $conn->query("SELECT Nazwa FROM KategoriaBledu");
                                ?>
                                <div class="btn-group">
                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Select bug category
                                        </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <?php
                                                while($rows = $resultCategory->fetch_assoc()){
                                                    $bug_category = $rows['Nazwa'];
                                                    echo "<button class='dropdown-item' type='button' id='category' value='$bug_category'>$bug_category</button>";
                                                }
                                                ?>
                                            </div>
                                            <script>
                                                $(".dropdown-menu button").click(function() {
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
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Select game
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <?php
                                                while($rows = $resultGame->fetch_assoc()){
                                                    $game = $rows['Nazwa'];
                                                    echo "<button class='dropdown-item' type='button' value='$game'>$game</button>";
                                                }
                                                ?>
                                            </div>
                                            <script>
                                                $(".dropdown-menu button").click(function() {
                                                    $(this).closest('.btn-group').find('.btn').text($(this).text()).append("<span class='caret'>");
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
							<div class="form-group">
								<label for="message-text" class="col-form-label">Description:</label>
								<textarea class="form-control" id="description-text" required></textarea>
							</div>
							<div class="input-group mb-3">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="file" id="file"/>
								<label class="custom-file-label" for="file">Choose file</label>
							</div>
						</div>
						<script>
							$('#file').on('change',function(){
								//get the file name
								var fileName = $(this).val().replace('C:\\fakepath\\', " ");
								//replace the "Choose a file" label
								$(this).next('.custom-file-label').html(fileName);
							})
						</script>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" name="submit">Create ticket</button>
						</div>
						</form>
						</div>
					</div>
					</div>
					<!-- END NEW TICKET -->

					<div class="padding"></div>

					<div class="row">
						<!-- BEGIN TICKET CONTENT -->
						<div class="col-md-12">
							<ul class="list-group fa-padding">
								<li class="list-group-item" data-toggle="modal" data-target="#issue">
									<div class="media">
										<i class="fa fa-cog pull-left"></i>
										<div class="media-body">
											<strong>Add drag and drop config import closes</strong> <span class="label label-danger">IMPORTANT</span><span class="number pull-right"># 13698</span>
											<p class="info">Opened by <a href="#">jwilliams</a> 5 hours ago <i class="fa fa-comments"></i> <a href="#">2 comments</a></p>
										</div>
									</div>
								</li>
								<!-- <li class="list-group-item" data-toggle="modal" data-target="#issue">
									<div class="media">
										<i class="fa fa-file-o pull-left"></i>
										<div class="media-body">
											<strong>Document that Helvetica Neue can cause problems on Windows</strong> <span class="label label-success">SUCCESS</span><span class="number pull-right"># 13697</span>
											<p class="info">Opened by <a href="#">lgardner</a> 12 hours ago <i class="fa fa-comments"></i> <a href="#">7 comments</a></p>
										</div>
									</div>
								</li>
								<li class="list-group-item" data-toggle="modal" data-target="#issue">
									<div class="media">
										<i class="fa fa-code-fork pull-left"></i>
										<div class="media-body">
											<strong>Manually triggering dropdown not working</strong> <span class="label label-primary">NOT IMPORTANT</span><span class="number pull-right"># 13695</span>
											<p class="info">Opened by <a href="#">ehernandez</a> 19 hours ago <i class="fa fa-comments"></i> <a href="#">14 comments</a></p>
										</div>
									</div>
								</li>
								<li class="list-group-item" data-toggle="modal" data-target="#issue">
									<div class="media">
										<i class="fa fa-code pull-left"></i>
										<div class="media-body">
											<strong>Add classes for respective directions to affix</strong> <span class="label label-primary">NOT IMPORTANT</span><span class="number pull-right"># 13691</span>
											<p class="info">Opened by <a href="#">tmckenzie</a> 1 day ago <i class="fa fa-comments"></i> <a href="#">20 comments</a></p>
										</div>
									</div>
								</li>
								<li class="list-group-item" data-toggle="modal" data-target="#issue">
									<div class="media">
										<i class="fa fa-code pull-left"></i>
										<div class="media-body">
											<strong>Responsive tables of the horizontal scroll bar</strong> <span class="label label-danger">IMPORTANT</span><span class="number pull-right"># 13680</span>
											<p class="info">Opened by <a href="#">tmckenzie</a> 2 days ago <i class="fa fa-comments"></i> <a href="#">5 comments</a></p>
										</div>
									</div>
								</li>
								<li class="list-group-item" data-toggle="modal" data-target="#issue">
									<div class="media">
										<i class="fa fa-cog pull-left"></i>
										<div class="media-body">
											<strong>Make autoprefixer browsers fixed</strong> <span class="label label-warning">URGENT</span><span class="number pull-right"># 13679</span>
											<p class="info">Opened by <a href="#">lgardner</a> 2 days ago <i class="fa fa-comments"></i> <a href="#">29 comments</a></p>
										</div>
									</div>
								</li>
								<li class="list-group-item" data-toggle="modal" data-target="#issue">
									<div class="media">
										<i class="fa fa-code pull-left"></i>
										<div class="media-body">
											<strong>Popover doesn't move when tied element moves</strong> <span class="label label-primary">NOT IMPORTANT</span><span class="number pull-right"># 13678</span>
											<p class="info">Opened by <a href="#">lgardner</a> 3 days ago <i class="fa fa-comments"></i> <a href="#">21 comments</a></p>
										</div>
									</div>
								</li>
								<li class="list-group-item" data-toggle="modal" data-target="#issue">
									<div class="media">
										<i class="fa fa-file-o pull-left"></i>
										<div class="media-body">
											<strong>Glyphicon chevron left/right vertical alignment</strong> <span class="label label-info">INFO</span><span class="number pull-right"># 13658</span>
											<p class="info">Opened by <a href="#">lgardner</a> 5 days ago <i class="fa fa-comments"></i> <a href="#">9 comments</a></p>
										</div>
									</div>
								</li>
								<li class="list-group-item" data-toggle="modal" data-target="#issue">
									<div class="media">
										<i class="fa fa-file-o pull-left"></i>
										<div class="media-body">
											<strong>Horizontal to vertical navbar/offcanvas</strong> <span class="label label-primary">NOT IMPORTANT</span><span class="number pull-right"># 13630</span>
											<p class="info">Opened by <a href="#">tmckenzie</a> 5 days ago <i class="fa fa-comments"></i> <a href="#">10 comments</a></p>
										</div>
									</div>
								</li>
								<li class="list-group-item" data-toggle="modal" data-target="#issue">
									<div class="media">
										<i class="fa fa-code pull-left"></i>
										<div class="media-body">
											<strong>Changing container padding</strong> <span class="label label-danger">IMPORTANT</span><span class="number pull-right"># 13627</span>
											<p class="info">Opened by <a href="#">ehernandez</a> 1 week ago <i class="fa fa-comments"></i> <a href="#">82 comments</a></p>
										</div>
									</div>
								</li> -->
							</ul>

							<!-- BEGIN DETAIL TICKET -->
							<div class="modal fade" id="issue" tabindex="-1" role="dialog" aria-labelledby="issue" aria-hidden="true">
								<div class="modal-wrapper">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header bg-blue">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
												<h4 class="modal-title"><i class="fa fa-cog"></i> Add drag and drop config import closes</h4>
											</div>
											<form action="#" method="post">
												<div class="modal-body">
													<div class="row">
														<div class="col-md-2">
															<img src="assets/img/user/avatar01.png" class="img-circle" alt="" width="50">
														</div>
														<div class="col-md-10">
															<p>Issue <strong>#13698</strong> opened by <a href="#">jqilliams</a> 5 hours ago</p>
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
															<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
														</div>
													</div>
													<div class="row support-content-comment">
														<div class="col-md-2">
															<img src="assets/img/user/avatar02.png" class="img-circle" alt="" width="50">
														</div>
														<div class="col-md-10">
															<p>Posted by <a href="#">ehernandez</a> on 16/06/2014 at 14:12</p>
															<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
															<a href="#"><span class="fa fa-reply"></span> &nbsp;Post a reply</a>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!-- END DETAIL TICKET -->
						</div>
						<!-- END TICKET CONTENT -->
					</div>
				</div>
			</div>
		</div>
		<!-- END TICKET -->
	</div>
</section>
</div>

<!-- <script>
	document.getElementById('button').addEventListener("click", function() {
	document.querySelector('.modal fade').style.display = "flex";
});

document.querySelector('.close').addEventListener("click", function() {
	document.querySelector('.modal fade').style.display = "none";
});
</script> -->
<!-- <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript"> -->

</script>
</body>
</html>
