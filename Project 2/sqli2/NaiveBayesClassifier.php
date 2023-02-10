<?php
    require_once('Category.php');
	error_reporting(E_ALL ^ E_WARNING); 
    class NaiveBayesClassifier {
    	public function __construct() {
    	}

    	public function classify($sentence) {
    		$keywordsArray = $this -> tokenize($sentence);
    		$category = $this -> decide($keywordsArray);
    		return $category;
    	}

    	public function train($sentence, $category) {
    		$spam = Category::$SPAM;
    		$ham = Category::$HAM;

    		if ($category == $spam || $category == $ham) {
	    	    require 'db_connect.php';
	    	    $sql = mysqli_query($conn, "INSERT into trainingSet (document, category) values('$sentence', '$category')");
	    	    $keywordsArray = $this -> tokenize($sentence);
	    	    foreach ($keywordsArray as $word) {

	    	    	$sql = mysqli_query($conn, "SELECT count(*) as total FROM wordFrequency WHERE word = '$word' and category= '$category' ");
	    	    	$count = mysqli_fetch_assoc($sql);

	    	    	if ($count['total'] == 0) {
	    	    		$sql = mysqli_query($conn, "INSERT into wordFrequency (word, category, count) values('$word', '$category', 1)");
	    	    	} else {
	    	    		$sql = mysqli_query($conn, "UPDATE wordFrequency set count = count + 1 where word = '$word'");
	    	    	}
	    	    }
	    	    $conn -> close();
    		} else {
    			throw new Exception('Unknown category. Valid categories are: $ham, $spam');
    		}
    	}

    	private function tokenize($sentence) {
	    	$sentence = preg_replace("/[^a-zA-Z 0-9 = ; <>]+/", "", $sentence);
	    	$sentence = strtolower($sentence);
	    	$keywordsArray = array();
	    	$token =  strtok($sentence, " ");
	    	while ($token !== false) {
	           array_push($keywordsArray, $token);
		    	$token = strtok(" ");
	    	}
	    	return $keywordsArray;
    	}

    	private function decide ($keywordsArray) {
    		$spam = Category::$SPAM;
    		$ham = Category::$HAM;
    		$category = $ham;

    	    require 'db_connect.php';

    		$sql = mysqli_query($conn, "SELECT count(*) as total FROM trainingSet WHERE  category = '$spam' ");
    		$spamCount = mysqli_fetch_assoc($sql);
    		$spamCount = $spamCount['total'];

    		$sql = mysqli_query($conn, "SELECT count(*) as total FROM trainingSet WHERE  category = '$ham' ");
    		$hamCount = mysqli_fetch_assoc($sql);
    		$hamCount = $hamCount['total'];

    		$sql = mysqli_query($conn, "SELECT count(*) as total FROM trainingSet ");
    		$totalCount = mysqli_fetch_assoc($sql);
    		$totalCount = $totalCount['total'];

    		$pSpam = $spamCount / $totalCount;

    		$pHam = $hamCount / $totalCount;

            $sql = mysqli_query($conn, "SELECT count(*) as total FROM wordFrequency ");
    		$distinctWords = mysqli_fetch_assoc($sql);
    		$distinctWords = $distinctWords['total'];

    		$bodyTextIsSpam = log($pSpam);
    		foreach ($keywordsArray as $word) {
    			$sql = mysqli_query($conn, "SELECT count as total FROM wordFrequency where word = '$word' and category = '$spam' ");
    			$wordCount = mysqli_fetch_assoc($sql);
				{
					$wordCount = $wordCount['total'];
					$bodyTextIsSpam += log(($wordCount + 1) / ($spamCount + $distinctWords));
				}
    		}

    		$bodyTextIsHam = log($pHam);
    		foreach ($keywordsArray as $word) {
    			$sql = mysqli_query($conn, "SELECT count as total FROM wordFrequency where word = '$word' and category = '$ham' ");
    			$wordCount = mysqli_fetch_assoc($sql);
				{
					$wordCount = $wordCount['total'];
					$bodyTextIsHam += log(($wordCount + 1) / ($hamCount + $distinctWords));
				}
    		}

    		if ($bodyTextIsHam >= $bodyTextIsSpam) {
    			$category = $ham;
    		} else {
    			$category = $spam;
    		}
    		$conn -> close();
    		return $category;
    	}
    }

?>