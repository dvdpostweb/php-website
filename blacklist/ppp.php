<?
// each card is array with 2 elements:
// 0 is value (0-12)
// 1 is suit (0-3)
function CreateDeck() {
  global $numberOfDecks;
  global $arrDeck;
  // create a deck
  $arrDeck = Array();
  // for each suit...
  for ($i=0;$i<$numberOfDecks;$i++) {
    for ($suit=0; $suit<4; $suit++) {
      // for each card...
      for ($tmpCardValue=0; $tmpCardValue<13; $tmpCardValue++) {
        $tmpCard = Array();
        $tmpCard[0] = $tmpCardValue;
        $tmpCard[1] = $suit;
        array_push($arrDeck, $tmpCard);
      } // each card
    } // each suit
  } // each deck
}
$numberOfDecks=1;
$howManyShuffles=1;
echo '<pre>';
CreateDeck();
var_dump($arrDeck);
function ShuffleDeck() {
  global $arrDeck;
  global $howManyShuffles;

  $numCards = sizeof($arrDeck);

  for ($shuffleTimes=0; $shuffleTimes<$howManyShuffles; $shuffleTimes++) {
    $newShuffledDeck = Array();
    echo 'num'.$numCards.'?';
    for ($i=0; $i<$numCards; $i++) {
      echo '|'.$i.'=>';
      $cardsRemaining = sizeof($arrDeck);
      if ($cardsRemaining > 1) {
        // if there's more than one card
        // pick one at random
        $randomCard = rand(0,($cardsRemaining-1));
        echo $randomCard.'.';
        // add it to the new deck
        array_push($newShuffledDeck, $arrDeck[randomCard]);
        // and delete it from the old one...
        // NOT SURE I'VE USED THIS RIGHT...
        array_splice($arrDeck, $randomCard,1);
      } else {
        // just take the last card
        array_push($newShuffledDeck, $arrDeck[0]);
      } // if last card
    } // cards
    $arrDeck = $newShuffledDeck;
  } //shuffleTimes
} //ShuffleDeck()
function evaluateHand($intPlayer) {
  $arrHand = array_push($arrTableCards, $arrPlayers[intPlayer]);
  rsort($arrHand);
  $numCards = sizeof($arrHand);


  // check for flush
  $currentCardSeries = Array();
  $boolFlush = false;
  $arrSuitCounts = Array(4);
  for ($i=0;$i<$numCards;$i++) {
    $intValue = $arrHand[i][0];
    $intSuit = $arrHand[i][1];
    if (!is_array($arrSuitCounts[$intSuit])) {
      $arrSuitCounts[$intSuit] = Array();
      // this array stores two elements for each suit:
      // the number of cards belong to that suit and also
      // the value for highest value comparison
      // REMEMBER that the hand array has been sorted
      // by card valud in descending order so the first
      // value encountered will be the highest.
      $arrSuitCounts[$intSuit][0] = $intValue;
      // set the count for that suit to 1
      $arrSuitCounts[$intSuit][1] = 1;
    } else {
      $arrSuitCounts[$intSuit][1]++;
      if ($arrSuitCounts[$intSuit][1] >= 5) {
        $boolFlush = true;
        $arrFlushCards = Array();
        echo 'a flush! highest card is ' . $arrSuitCounts[$intSuit][0] . '<BR>';
        $intHighestFlushCard = $arrSuitCounts[$intSuit][0];

        // remember the cards of the hand for later...
        for($j=0;$j<$numCards;$j++) {
          if ($arrHand[$j][1] == $intSuit) {
            array_push($arrFlushCards, $arrHand[i]);
          }
          if (sizeof($arrFlushCards) >= 5) {
            break;
          }
        } // remember the cards of...

        break;
      } // if there are 5 card of any given suit
    } // if clause to create or increment $array element
  } // for each card


  // check for straight/straight flush...

  // this loop checks for a straight
  // straight could be:
  // cards 1 thru 5
  // cards 2 thru 6
  // cards 3 thru 7
  // etc.
  $numCardsToCheckForStraight = ($numCards - 5) + 1;
  // each of these cards could be the highest card in a straight
  for ($i=0; $i < $numCardsToCheckForStraight; $i++) {
    $intValue = $arrHand[$i][0];
    $intSuit = $arrHand[$i][1];

    $currentCardSeries = Array();
    array_push($currentCardSeries, $arrHand[$i]);

    // this will be true if the hand
    // has five consecutive card values
    $boolStraight = false;


    // assume these are true until proven false below
    $boolThisOneIsStraight = true;
    $boolStraightFlush = true; 
    // we have one card...check the next 4
    $howManyCardsToCheck = 4;
    // check the next 4 cards...
    for ($j=1;$j<=$howManyCardsToCheck;$j++) {
      if (($i+$j) > sizeof($arrHand)) {
        break;
      }
      if (($j != 1) && ($arrHand[$i+$j] == $arrHand[$i+$j-1])) {
        // if this card is not the first card
        // and has same value as the previous card
        // then our streak is not broken
        // but we must check one more card
        $howManyCardsToCheck++;
      } else if ($arrHand[$i+$j][0] != ($intValue-$j)) {
        // check if the straight is broken...
        $boolThisOneIsStraight=false;
        $boolStraightFlush = false;
        break;
      } else {
        // if our straight continues
        array_push($currentCardSeries, $arrHand[$i+$j]);
        // then check the suit
        if ($arrHand[$i+$j][1] != $intSuit) {
          $boolStraightFlush = false;
        }
      }
    } // check the next 4 cards
    if ($boolStraightFlush) {
      // we have a straight flush!
      // don't bother checking the others...
      // we can check out right here
      $intHighestCard = $intValue;
      if ($intHighestCard == 12) {
        // royal flush!
        $handValue = 9;
      } else {
        $handValue = 8;
      }
      echo "straight flush! high card is " + $intHighestCard;
      // store the hand info in the global players object
      //$arrPlayers[$intPlayer].highestCard = $intHighestCard;
      //$arrPlayers[$intPlayer].handValue = $handValue;
      //$arrPlayers[$intPlayer].bestHand = $currentCardSeries;
      return $handValue;
    } else {
      // this particular series is not a straight flush...
      // be we need to keep checking...just in case
      // there IS a straight flush in here
      // if this one was a straight, let's remember it
      if ($boolThisOneIsStraight) {
        $boolStraight = true;
        if ($intValue > $intHighestStraightCard) {
          $intHighestStraightCard = $intValue;
          $arrStraightHand = Array();
          $arrStraightHand = $currentCardSeries;
          echo 'straight! high card is ' + $intHighestCard;
        } else {
          echo 'another straight...but not the highest which is: ' + intHighestStraightCard;
        }
      }
    } // if straight flush...
  } // for each of the high cards


  // if we reach this point, our straight check
  // is completed. no straight flush exists
  // but a straight *might*.
  // we need to check for higher-ranked hands like full house, etc.


  // count how many of each value
  // we have...
  $arrValueCounts = Array();
  for ($i=0;$i<$numCards;$i++) {
    $intValue = $arrHand[$i][0];
    $intSuit = $arrHand[$i][1];
    if (!$arrValueCounts[$intValue]) {
      $arrValueCounts[$intValue] = 1;
    } else {
      $arrValueCounts[$intValue]++;
    }
  }

  // check for 4 of a kind, full house
  // three of a kind, etc. in descending
  // card order from highest to lowest values
  $boolThreeOfAKind = false;
  $intPairs = 0;
  for ($i=12;$i>=0;$i--) {
    if ($arrValueCounts[$i] == 4) {
      // FOUR OF A KIND! we can stop looking
      //$arrPlayers[$intPlayer].handValue = 7;
      //$arrPlayers[$intPlayer].highestCard = $i;
      return 7;
    } else if ($arrValueCounts[$i]==3) {
      // if we have 3 of a kind
      // and we've already seen a pair
      // or another triple, then we have
      // FULL HOUSE!
      if ($boolThreeOfAKind) {
        //$arrPlayers[$intPlayer].handValue = 6;
        //$arrPlayers[$intPlayer].highestCard = $intHighestTriple;
        return 6;
      } else if ($intPairs > 0) {
        // FULL HOUSE!
        // we previous landed a pair
        // but our highest card is the
        // one for this triplet
        // $arrPlayers[$intPlayer].handValue = 6;
        // $arrPlayers[$intPlayer].highestCard = $i;
        return 6;
      } else {
        // we're not done checking yet
        // but we do have 3 of a kind.
        $boolThreeOfAKind = true;
        $intHighestTriple = $i;
      } // if 3 of a kind
    } else if ($arrValueCounts[$i]==2) {
      if ($boolThreeOfAKind) {
        // currently have a pair, have already seen a triple
        // FULL HOUSE!
        // highest card has already been set
        //$arrPlayers[intPlayer].handValue = 6;
        // $arrPlayers[intPlayer].highestCard = $intHighestTriple;
        return 6;
      } else {
        // if we get this far, we *might*
        // have already seen a pair
        // but there should be NO CHANCE
        // that the player has 3 of a kind
        if ($intPairs <= 0) {
          // no pairs yet seen, no 3 of a kind
          $intPairs++;
          $intHighestPair = $i;
        } else {
          $intPairs++;
        }
      }
    } // check for 4/3/2 of a kind
  } // for 12 to 0

  // we have check for all higher hands...if user has
  // a flush, return that
  if ($boolFlush) {
    //$arrPlayers[$intPlayer].handValue = 5;
    //$arrPlayers[$intPlayer].highestCard = $intHighestFlushCard;
    return 5;
  }

  // otherwise, if we had a straight...
  if ($boolStraight) {
    //$arrPlayers[$intPlayer].highestCard = $intHighestStraightCard;
    // $arrPlayers[$intPlayer].handValue = 4;
    //arrPlayers[$intPlayer].bestHand = $arrStraightHand;
    echo 'straight selected as best possible hand';
    return 4;
  }

  // 3 of a kind
  if ($boolThreeOfAKind) {
    // $arrPlayers[$intPlayer].handValue = 3;
    //arrPlayers[$intPlayer].highestCard = intHighestTriple;
    return 3;
  }

  // 2 pair
  if ($intPairs == 2) {
    //arrPlayers[$intPlayer].handValue = 2;
    //   $arrPlayers[$intPlayer].highestCard = $intHighestPair;
    return 2;
  }

  // pair
  if ($intPairs == 1) {
    //  $arrPlayers[$intPlayer].handValue = 1;
    //  $arrPlayers[$intPlayer].highestCard = $intHighestPair;
    return 1;
  }

  // what a bad hand!
  //$arrPlayers[$intPlayer].handValue = 0;
  //$arrPlayers[$intPlayer].highestCard = $arrHand[0][0];
  return 0;
} // 
$init = array(1,2);
//evaluateHand($init);
?>