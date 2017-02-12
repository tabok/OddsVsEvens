<?php

/**
*  Procedural function which counts the number of zeros and the number of ones.
*  Zeros represents evens soldiers and ones represents odds soldiers.
*/
function battle($battle_field_configuration)
{
	$number_of_all_zeros = 0;
	$number_of_all_ones = 0;
	
	if(!check_input($battle_field_configuration))
	{
		echo 'incorrect input<br>';
		return;
	}

	foreach($battle_field_configuration as $one_number)
	{
		$abs_number = abs($one_number);
		$binary_representation = decbin($abs_number);

		// evens soldiers
		if($one_number % 2 == 0)
		{
			if($one_number >= 0)
			{
				// number of positive zeros
				$number_of_positive_zeros = substr_count($binary_representation, '0');
				$number_of_all_zeros += $number_of_positive_zeros;
			}
			else
			{
				// number of negative zeros
				$number_of_negative_zeros = substr_count($binary_representation, '0');
				$number_of_all_zeros -= $number_of_negative_zeros;
			}
		}
		// odds soldiers
		else
		{
			if($one_number >= 0)
			{
				// number of positive ones
				$number_of_positive_ones = substr_count($binary_representation, '1');
				$number_of_all_ones += $number_of_positive_ones;
			}
			else
			{
				// number of negative ones
				$number_of_negative_ones = substr_count($binary_representation, '1');
				$number_of_all_ones -= $number_of_negative_ones;
			}
		}
	}
	battle_result($number_of_all_zeros, $number_of_all_ones);
}

/**
*  Procedural function which check input array.
*/
function check_input($battle_field_configuration)
{
	foreach ($battle_field_configuration as $one_number)
	{
		if (!is_int($one_number))
		{
        		return false;
    		}
	}
	return true;
}

/**
*  Procedural function which print battle result.
*/
function battle_result($evens_result, $odds_result)
{
	if($odds_result > $evens_result)
	{
		echo 'odds win' . ' ' . $odds_result . ' vs ' . $evens_result . '<br>';
	}
	else if($odds_result < $evens_result)
	{
		echo 'evens win' . ' ' . $odds_result . ' vs ' . $evens_result . '<br>';
	}
	else
	{
		echo 'tie' . ' ' . $odds_result . ' vs ' . $evens_result . '<br>';
	}
}


// test
battle([5, 3, 14]);
battle([21, -3, 20]);
battle([7, -3, -14, 6]);
battle([23, -3, 32, -24]);
battle([128, -128, 31, -31]);
battle([]);
battle([10, 23, 22, '1b', '0b', 3]);
battle([10, 23 , '1f', 22, '1b', '0b', 3]);
battle([12, 21, -2, 33, 14]);

?>