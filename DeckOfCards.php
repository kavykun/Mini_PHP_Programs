<title> hello</title>

<?php
//Author: Kavy Rattana
//class to simulate a deck of cards
class DeckOfCards{
	
	public $players = array();
	public $deck = array();
	public $deckAmount;
	
	//creating all 52 cards
	public function makeCards(){
		
		global $deck;
		
		//cards
		for($i = 2 ; $i < 11 ; $i ++){
			
			$card = new card($i ,'black', 'clubs');
			$deck[] = $card;
			$card = new card($i ,'black', 'spades');
			$deck[] = $card;
			$card = new card($i ,'red', 'diamonds');
			$deck[] = $card;
			$card = new card($i ,'red', 'hearts');
			$deck[] = $card;

		}//end for
	
		//adding the face cards
		$card = new face('Jack' ,'black', 'clubs');
		$deck[] = $card;
		$card = new face('Queen' ,'black', 'clubs');
		$deck[] = $card;
		$card = new face('King' ,'black', 'clubs');
		$deck[] = $card;
		$card = new face('Ace' ,'black', 'clubs');
		$deck[] = $card;
		
		$card = new face('Jack' ,'black', 'spades');
		$deck[] = $card;
		$card = new face('Queen' ,'black', 'spades');
		$deck[] = $card;
		$card = new face('King' ,'black', 'spades');
		$deck[] = $card;
		$card = new face('Ace' ,'black', 'spades');
		$deck[] = $card;

		$card = new face('Jack' ,'red', 'diamonds');
		$deck[] = $card;
		$card = new face('Queen' ,'red', 'diamonds');
		$deck[] = $card;
		$card = new face('King' ,'red', 'diamonds');
		$deck[] = $card;
		$card = new face('Ace' ,'red', 'diamonds');
		$deck[] = $card;
		
		$card = new face('Jack' ,'red', 'hearts');
		$deck[] = $card;
		$card = new face('Queen' ,'red', 'hearts');
		$deck[] = $card;
		$card = new face('King' ,'red', 'hearts');
		$deck[] = $card;
		$card = new face('Ace' ,'red', 'hearts');
		$deck[] = $card;
					
		
	}//end makeCards
	
	//creating 5 palyers
	public function makePlayers(){
		
		global $players;
		
		for($i = 0 ; $i < 5 ; $i++){
			
			$player = new player('player '.$i);
			$players[] = $player;
			
			
		}//end for
		
	echo "<br>";
	echo "<br>";
	$playerAmount = count($players);
	echo 'Number of players: '.$playerAmount;
		
	}//end makeCards

	//dealing the cards
	public  function deal(){
	
	global $players;
	global $deck;	
		
	$playerAmount = count($players);

		for($i = 0 ; $i < $playerAmount ; $i++){
			
			for($j = 0 ; $j < 2; $j++){
	
			echo "<br>";
			
			$players[$i]->addToHand($deck[0]);
			unset($deck[0]);
			$deck = array_values($deck);

			}//end j for
			
			echo $players[$i]->getName();
			
			$players[$i]->showHand();
			
		}//end for
	
		
	}//end deal
	
	//shuffling the cards
	public function shuffle(){
		
		global $deck;
		echo "<br>";
		echo 'Shuffling deck';
		
		shuffle($deck);
		
	}//end shuffle
	
	//displayus all the cards in the deck
	public function showAllCards(){
		
	global $deck;
	$deckAmount = count($deck);
	echo 'Number of cards in the deck: '.$deckAmount;
	
	for($i = 1 ; $i < $deckAmount ; $i ++){
		
		$deck[$i]->getNumber();
	
	}//end for

	foreach($deck as $cards){
		
		echo "<br>";
		if($cards->getNumber()){
			
		echo $cards->getNumber()." ". $cards->getColor()." ". $cards->getSuit();
		
		}else {
		
		echo $cards->getFace()." ". $cards->getColor()." ". $cards->getSuit();
			
		}//end else
	
	}//end for
		
	}//showAllCards
	
}//end class DeckOfCards

//class for each card
class card{
	
		 public $number, $color, $suit;
	
	//passing in card's attributes
	function __construct($n, $c, $s){
		
		$this->number = $n;
		$this->color = $c;
		$this->suit = $s;
		
	}//end constructor 
	
	public function getNumber(){
		
		return $this->number;
		
	}//end get name
	
	public function getColor(){
		
		return $this->color;
		
	}//end getColor
	
	public function getSuit(){
		
		return $this->suit;
		
		
	}//end getSuit
	
}//end class card

class face extends card{
	
	public $face;
	
	function __construct($f, $c , $s){
		
	$this->face = $f;
	$this->color = $c;
	$this->suit = $s;		
		
	}//end constructor
	
	public function getFace(){
		
		return $this->face;
		
	}//end getColor
	
}//end class face

//class for each player
class player{

	public $name , $card;
	public $cards = array();
	
	function __construct($n){
	
		$this->name = $n;
		
	}//end constructor
	
	public function showHand(){
	
	$handAmount = count($this->cards);
	echo "<br>";
	echo 'Number of cards in the  hand: '.$handAmount;
		
		foreach($this->cards as $card){
		
		echo "<br>";
		if($card->getNumber()){
			
		echo $card->getNumber()." ". $card->getColor()." ". $card->getSuit();
		
		}else {
		
		echo $card->getFace()." ". $card->getColor()." ". $card->getSuit();
			
		}//end else
	
	}//end for
		
	}//end showHands
	
	public function addToHand($c){
		
		$this->cards[] = $c;
		
	}//end addToHand
	
	public function removeCard(card $c){
		
	$handAmount = count($this->cards);
	echo 'Number of cards in the  hand: '.$handAmount;
	
		for($i = 0 ; $i < $handAmount ; $i++){
			
			if($c = $cards[$i]){
				
				unset($cards[$i]);
				
			}//end if
			
		}//end for
	}//end remove card
	
	public function getName(){
		
		return $this->name;
		
	}//get name
	
}//end class player

$a = new DeckOfCards();
$a->makeCards();
$a->showAllCards();

echo "<br>";
echo "<b>Texas Hold'em</b>";

$a->makePlayers();
$a->shuffle();
$a->deal();


?>