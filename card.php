<html>
	<head>
		<title>Playing Cards</title>
	</head>
	
	<body>
		<form method="post" action="">
			Number of person: <input type="text" name="txtNumber" />
			<input type="submit" value="Submit" />
		</form>
		<?php

			if($_POST){
				//Validation - Any number less than 0 are invalid value.
				if($_POST['txtNumber'] > 0){
					
					//Total 52 cards containing 1-13 of each Spade(S), Heart(H), Diamond(D), Club(C
					$suits = array('S', 'H', 'D', 'C');
					$cards = array('A', 2, 3, 4, 5, 6, 7, 8, 9, 'X', 'J', 'Q', 'K');

					$decks = array();

					foreach ($suits as $suit) {
					 foreach ($cards as $card) {
					   $decks[]= $suit. "-" . $card;
					 }
					}

					// Random the cards.
					shuffle($decks);

					$person_count = $_POST['txtNumber'];
					$person = array();	

					
					while(count($decks) > 0){						
						for($j = 0; $j < $person_count; $j++){
							
							// Distribute the card on top to each person .
							$deck = array_shift($decks);
							if(!empty($deck)){
								$person[$j][] = $deck;
							}
						}
					}
					
					//Create a table for display - [LF] is not allowed.
					print "<table>";
					foreach($person as $key => $values){
						print "<tr>";						
						//The card distributed to the person on the row will be separated by (comma),
						print "<td>".implode(',', $values)."</td>";
						print "</tr>";
					}
					print "</table>";
					
				} else {
					
					//In case input value is nil or value is invalid then display error message.
					print "Input value does not exist or value is invalid.";
				}
			}
		?>
	</body>
</html>