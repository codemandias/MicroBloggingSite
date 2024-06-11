<?php

		<main id="pg-main-content">
            <div class="py-5 text-center container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">JediTweeps: Your Followers</h1>
                        <p class="lead text-muted">Tweep your thoughts away!</p>
                        <p class="lead text-muted">and Siths, be on your away!</p>
                    </div>
                </div>
            </div>


		<div class="py-5 text-center container">
			<div class="row">
				<div class="col-lg-6 col-md-8 mx-auto">
					<?php
						$result = $dbconnection->query("SELECT * FROM `follow-table` JOIN `user-credentials` ON `follow-table`.`followerID` = `user-credentials`.`userID` WHERE `followedID` = '$_SESSION[userID]';");
						while($row = $result->fetch_assoc()){
							echo "<p class='fw-light'><b style='font-size: 30px;'>$row[username]</b></p>";
						}
					?>
				</div>
			</div>
		</div>



		</main>

<?php
	require_once "includes/footer.php";
?>