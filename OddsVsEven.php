<?php

/**
*  Procedural function which count number of zeros and number of ones.
*  Zeros represent evens soldiers and ones represent odds soldiers.
*/
function battle($battle_field_configuration)
{
	$number_of_all_positive_zeros = 0;
	$number_of_all_negative_zeros = 0;
	$number_of_all_positive_ones = 0;
	$number_of_all_negative_ones = 0;
	$battle_field_conf_tab_size = count($battle_field_configuration);
	
	if(check_input($battle_field_configuration))
	{
		for($i = 0; $i < $battle_field_conf_tab_size; $i++)
		{	
			// evens soldiers
			if($battle_field_configuration[$i] % 2 == 0)
			{
				if($battle_field_configuration[$i] >= 0)
				{
					$binary_representation = decbin($battle_field_configuration[$i]);
					// number of positive zeros
					$number_of_positive_zeros = substr_count($binary_representation, '0');
					$number_of_all_positive_zeros = $number_of_all_positive_zeros + $number_of_positive_zeros;
				}
				else
				{
					$abs_number = abs($battle_field_configuration[$i]);
					$binary_representation = decbin($abs_number);
					// number of negative zeros
					$number_of_negative_zeros = substr_count($binary_representation, '0');
					$number_of_all_negative_zeros = $number_of_all_negative_zeros + $number_of_negative_zeros;
				}
			}
			// odds soldiers
			else
			{
				if($battle_field_configuration[$i] >= 0)
				{
					$binary_representation = decbin($battle_field_configuration[$i]);
					// number of positive ones
					$number_of_positive_ones = substr_count($binary_representation, '1');
					$number_of_all_positive_ones = $number_of_all_positive_ones + $number_of_positive_ones;
				}
				else
				{
					$abs_number = abs($battle_field_configuration[$i]);
					$binary_representation = decbin($abs_number);
					// number of negative ones
					$number_of_negative_ones = substr_count($binary_representation, '1');
					$number_of_all_negative_ones = $number_of_all_negative_ones + $number_of_negative_ones;
				}
			}
		}
		$evens_result = $number_of_all_positive_zeros - $number_of_all_negative_zeros; 
		$odds_result = $number_of_all_positive_ones - $number_of_all_negative_ones;
		battle_result($evens_result, $odds_result);
	}
	else
	{
		echo 'incorrect input<br>';
	}
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
		echo
			'odds win' . ' ' . $odds_result . ' vs ' . $evens_result . '<br>';
	}
	else if($odds_result < $evens_result)
	{
		echo
			'evens win' . ' ' . $odds_result . ' vs ' . $evens_result . '<br>';
	}
	else
	{
		echo
			'tie' . ' ' . $odds_result . ' vs ' . $evens_result . '<br>';
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