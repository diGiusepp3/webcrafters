<?php
	
	session_start();
	
	if (!isset($_SESSION['username'])) {
		header('Location: /pages/profile/login.php');
		exit();
	}

	// index.php
	require ('ini.inc');
	$pagetitle = 'Webcrafters social';
	$keywords = 'Webcrafters, socialfeed, vrienden, chat, praat, social media, platform';
	$description = 'Welkom op het social media platform van webcrafters.';
	require('header.php');
	
	
	$storiesSql = "
		SELECT `username`, `story`, `folder`, `type`, `timestamp`
		FROM `stories`
		ORDER BY `timestamp` DESC
		LIMIT 4;
	";
	
	$storiesResult = $conn->query($storiesSql);

	
	echo'
	<main>
		<aside class="asideLeft">
			<div class="imgAndName d-flex flex-row justify-content-center align-items-center">
				<img class="profile-image" src="/pages/users/' . $user_id . '/images/profile-image/' . $profileImage .'" alt="profielfoto: ' . $username . '">'. $username .'</img>
			</div>
			<div class="iconAndTekst">
				<i class="fas fa-users"></i>
				<p>Vrienden</p>
			</div>
			
			<div class="iconAndTekst">
				<i class="fas fa-clock-rotate-left"></i>
				<p>Herinneringen</p>
			</div>
			
			<div class="iconAndTekst">
				<i class="far fa-bookmark"></i>
				<p>Opgeslagen</p>
			</div>
			
			<div class="iconAndTeskst">
				<i class="fas fa-people-group"></i>
				<p>Groepen</p>
            </div>
            
            <div class="iconAndTeskst">
				<i class="fas fa-video"></i>
				<p>Video</p>
            </div>
            
           
		</aside>
		
		<div class="container-fluid w-50 h-100 justify-content-center d-flex flex-column justify-content-center">
			<h2 class="w-100 text-center">Verhalen</h2><br>
			<div class="storiesTop d-flex flex-row justify-content-center align-items-stretch p-2 mt-2 w-100">
				';
				if ($storiesResult->num_rows > 0) {
					while ($storiesRow = $storiesResult->fetch_assoc()) {
						$storiesUsername = $storiesRow['username'];
						$story = $storiesRow['story'];
						$folder = $storiesRow['folder'];
						$type = $storiesRow['type'];
						
						echo '
						<div class="story d-flex justify-content-center flex-column rounded-bottom-5 rounded-top-5">
							<img src=" ' . $folder.$story . ' " alt="Verhaal van $username" class="rounded-top-5">
							<h4 class="text-center">' . $storiesUsername . '</h4>
						</div>';
					}
				} else {
					echo '<p>Geen verhalen beschikbaar.</p>';
				}
				echo '
			</div>
			
			<div class="postMessage d-flex flex-row w-50 m-auto rounded-2  justify-content-evenly align-items-center">
			    <img class="profile-image p-2" src="/pages/users/' . $user_id . '/images/profile-image/' . $profileImage .'" alt="profielfoto: ' . $username . '">
			    ';
				if (isset($_POST['placePost'])) {
					echo '<div class="dev">post gestart</div>';
					
				}
				echo'
			    <div class="postPopup" id="postPopup">
			    	<h3 class="text-white text-center">Bericht plaatsen</h3>
			        <form method="post" name="newPost">
			            <textarea class="w-100 border-0 text-white" placeholder="Wat wil je posten, ' . $username . '"></textarea>
			            <input type="submit" name="placePost" value="plaatsen">
			            <div class="addToPost border-1 rounded-2 w-100 h-25 d-flex flex-row" id="addToPost">
			            	<p class="bg-light">Toevoegen aan bericht</p>
						</div>
			        </form>
			    </div>
			    
		        <div class="video-popup" id="videoPopup" style="display: none;">
		        
		        </div>
		        <div class="image-popup" id="imagePopup" style="display: none;">
		            <form method="post" action="" enctype="multipart/form-data">
		           		<input type="file" name="postImage">
					</form>
		        </div>
		        <div class="emoji-popup" id="emojiPopup" style="display: none;">
		            <div id="emojiMenu">
					    <div class="emoji" onclick="insertEmoji(\'😀\')">😀</div>
					    <div class="emoji" onclick="insertEmoji(\'😍\')">😍</div>
					    <div class="emoji" onclick="insertEmoji(\'👍\')">👍</div>
					    <div class="emoji" onclick="insertEmoji(\'😁\')">😁</div>
					    <div class="emoji" onclick="insertEmoji(\'😂\')">😂</div>
					</div>
		        </div>
			    <input
			    	class="newPostToggler rounded-2 p-1 m-1"
			    	type="text"
			    	placeholder="Wat wil je doen?"
			    	name="storyPost"
			    	onclick="openPostPopup()"
			    >
			    <div class="newPostIcons" id="newPostIcons" style="display:flex;">
			    	<i class="fas fa-video videoIcon" id="videoIcon" onclick="openVideoPopup()"></i>
			    	<i class="fas fa-image icon" id="imageIcon" onclick="openImagePopup()"></i>
			    	<i class="fas fa-icons icon emojiIcon" id="emojiIcon" onclick="openEmojiPopup()"></i>
				</div>
			</div>
			
			<div class="feed">';
				$feedSql = "SELECT * FROM `posts` WHERE 1";
				$feedResult = $conn->query($feedSql);
				if ($feedResult->num_rows > 0) {
					while ($feed = $feedResult->fetch_assoc()) {
						$feedContent  = $feed['mainContent'];
						$placedBy = $feed['user_id'];
						$image = $feed['image'];
						$video = $feed['video'];
						$likes = $feed['likes'];
						$comments = $feed['comments'];
						$shares = $feed['shares'];
						$whoShared = $feed['whoShared'];
						$placedOn = $feed['placed'];
					}
				}
				
				echo'
			</div>
		</div>
		
		<aside class="asideRight">';
			if (!empty($ownedPages)) {
				echo '
				<div>
					<img class="pageImg" src=""></img>
					<p>Pagina,s</p>
				</div>';
			} else {
				echo'
				<div>
				    <p>U heeft nog geen pagina,s</p>
			    </div>
				';
			}
			echo'
			
			<div>
				<div class="birthDayToday d-flex flex-column">
				<h4>Verjaardagen</h4>
				
   				';
				    $today = date("Y-m-d"); // Gebruik 'Y' in plaats van 'y' om het volledige jaar te krijgen
				    $day = date('d');
				    $month = date('m');
				    $happyBirthday = $month . '-' . $day;
				    $birthdaySql = "SELECT * FROM `users` WHERE DATE_FORMAT(`dateOfBirth`, '%m-%d') = '$happyBirthday'";
				    $birthdayResult = $conn->query($birthdaySql);
				
				    if ($birthdayResult->num_rows > 0) {
				       
				        while ($birthday = $birthdayResult->fetch_assoc()) {
				            $firstName = $birthday['firstName'];
				            $middleName = $birthday['middleName'];
				            $lastName = $birthday['lastName'];
				            $profileImage = $birthday['profileImage'];
							$birthday_id = $birthday['id'];
							$dateOfBirthday = $birthday['dateOfBirth'];
					        $birthdayDate = new DateTime($dateOfBirthday);
					        $currentDate = new DateTime();
					        
					        $age = $currentDate->diff($birthdayDate)->y;
							
				            
				            echo '<div class="birthdayUser"><img src="/pages/users/' . $birthday_id . '/images/profile-image/'.$profileImage . ' "> ' . $firstName . '</div>';
					        echo "Leeftijd: " . $age . " jaar";
				         
				        }
				    } else {
				        echo "Geen verjaardagen vandaag";
				    }
				    echo'
				</div>

			</div>
			
			<div>
				<p>Online vrienden</p>
				<div class="online-users">
					<!--
							Maak een rij aan bij in de tabel van de gebruikers om weer te geven als iemand is ingelogd
					 		Zorg hierbij dat als er geen activiteit heeft plaatsgevonden binnen 2.5 minuut, de gebruiker offline weergegeven is.
					-->
				</div>
			</div>
			
			<div>
				<p>Groepen</p>
				<div class="yourGroups">
					<!--
							Maak een tabel aan om de groepen van gebruikers op te slaan.
							Maak daarna een sql om deze op te halen en weer te geven op basis van de ingelogde sessie.
					-->
				</div>
            </div>
       
		</aside>

	</main>
	<script>
		document.addEventListener("click", function(event) {
		    var popup = document.querySelector(".postPopup");
		    var newPostToggler = document.querySelector(".newPostToggler");
		    var textarea = popup.querySelector("textarea");
		
		    if (event.target !== popup && event.target !== newPostToggler && event.target !== textarea) {
		        if (popup.style.display === "block") {
		            popup.style.display = "none";
		            newPostToggler.style.display = "block";
		        }
		    }
		});
        
        document.addEventListener("click", function(event) {
           
        });
		
		function openPostPopup(event) {
		    var popup = document.querySelector(".postPopup");
		    var newPostToggler = document.querySelector(".newPostToggler");
		
		    if (popup.style.display === "none" || popup.style.display === "") {
		        popup.style.display = "block";
		        newPostToggler.style.display = "none";
		    } else {
		        popup.style.display = "none";
		        newPostToggler.style.display = "block";
		    }
		
		    // Stop de gebeurtenispropagatie om te voorkomen dat de klik buiten de popup onmiddellijk de popup sluit
		    event.stopPropagation();
		}
        
        function togglePostOptions() {
		    var postPopup = document.getElementById("postPopup");
		    if (postPopup.style.display === "block") {
		        postPopup.style.display = "none";
		    } else {
		        postPopup.style.display = "block";
		    }
		}
		
		
		function openVideoPopup() {
    		window.location.href = "/pages/creator/index.php";
		}
		
		function openImagePopup() {
            var videoIcon = document.querySelector(".videoIcon");
            var emojiIcon = document.querySelector(".emojiIcon");
		    var imagePopup = document.getElementById("imagePopup");
            var newPostToggler = document.querySelector(".newPostToggler");
		    if (imagePopup.style.display === "none" || imagePopup.style.display === "") {
		        imagePopup.style.display = "block";
  		        newPostToggler.style.display = "none";
                videoIcon.style.display = "none";
                emojiIcon.style.display = "none";
		    } else {
		        imagePopup.style.display = "none";
   		        newPostToggler.style.display = "block";
                videoIcon.style.display = "block";
                emojiIcon.style.display = "block";
		    }
		}
        
        function openEmojiPopup() {
		    var emojiPopup = document.getElementById("emojiPopup");
            var newPostToggler = document.querySelector(".newPostToggler");
		    if (emojiPopup.style.display === "none" || emojiPopup.style.display === "") {
		        emojiPopup.style.display = "block";
  		        newPostToggler.style.display = "none";

		    } else {
		        emojiPopup.style.display = "none";
 		        newPostToggler.style.display = "block";
		    }
		}


	</script>
	';
	require('footer.php');

