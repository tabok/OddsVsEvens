<?php


function battle($battleFieldConfiguration)
{
	$battleFieldConfTabSize = count($battleFieldConfiguration);
	$numberOfAllPositiveZeros = 0;
	$numberOfAllNegativeZeros = 0;
	$numberOfAllPositiveOnes = 0;
	$numberOfAllNegativeOnes = 0;

	for($i  = 0; $i < $battleFieldConfTabSize; $i++)
	{
		// evens
		if($battleFieldConfiguration[$i] % 2 == 0)
		{
			if($battleFieldConfiguration[$i] >= 0)
			{
				$binaryRepresentation = decbin($battleFieldConfiguration[$i]);
				// number of positive zeros
				$numberOfPositiveZeros = substr_count($binaryRepresentation, '0');
				$numberOfAllPositiveZeros = $numberOfAllPositiveZeros + $numberOfPositiveZeros;
			}
			else
			{
				$numberAbs = abs($battleFieldConfiguration[$i]);
				$binaryRepresentation = decbin($numberAbs);
				// number of negative zeros
				$numberOfNegativeZeros = substr_count($binaryRepresentation, '0');
				$numberOfAllNegativeZeros = $numberOfAllNegativeZeros + $numberOfNegativeZeros;
			}
		}
		// odds
		else
		{
			if($battleFieldConfiguration[$i] >= 0)
			{
				$binaryRepresentation2 = decbin($battleFieldConfiguration[$i]);
				// number of positive ones
				$numberOfPositiveOnes = substr_count($binaryRepresentation2, '1');
				$numberOfAllPositiveOnes = $numberOfAllPositiveOnes + $numberOfPositiveOnes;
			}
			else
			{
				$numberAbs = abs($battleFieldConfiguration[$i]);
				$binaryRepresentation3 = decbin($numberAbs);
				// number of negative ones
				$numberOfNegativeOnes = substr_count($binaryRepresentation3, '1');
				$numberOfAllNegativeOnes = $numberOfAllNegativeOnes + $numberOfNegativeOnes;
			}			
		}
	}
	battleResult($numberOfAllPositiveZeros, $numberOfAllNegativeZeros, $numberOfAllPositiveOnes, $numberOfAllNegativeOnes);
}


function battleResult($numberOfAllPositiveZeros, $numberOfAllNegativeZeros, $numberOfAllPositiveOnes, $numberOfAllNegativeOnes)
{
	$numberOfAllZeros = $numberOfAllPositiveZeros -$numberOfAllNegativeZeros;
	$numberOfAllOnes = $numberOfAllPositiveOnes - $numberOfAllNegativeOnes;

	if($numberOfAllOnes > $numberOfAllZeros)
	{
		echo 'odds win' . ' ' . $numberOfAllPositiveOnes . ' - ' . $numberOfAllNegativeOnes . ' VS ' . $numberOfAllPositiveZeros. ' - ' . $numberOfAllNegativeZeros . '<br>';;
	}
	else if($numberOfAllOnes < $numberOfAllZeros)
	{
		echo 'evens win' . ' ' . $numberOfAllPositiveOnes . ' - ' . $numberOfAllNegativeOnes . ' VS ' . $numberOfAllPositiveZeros. ' - ' . $numberOfAllNegativeZeros . '<br>';
	}
	else
	{
		echo 'tie' . ' ' . $numberOfAllPositiveOnes . ' - ' . $numberOfAllNegativeOnes . ' VS ' . $numberOfAllPositiveZeros. ' - ' . $numberOfAllNegativeZeros . '<br>';;
	}
}


// test
battle([5, 3, 14]);
battle([21, -3, 20]);
battle([7, -3, -14, 6]);
battle([23, -3, 32, -24]);
battle([128, -128, 31, -31]);

?>