<?php

function goodSplit( $s ) {
	$length = strlen( $s );
	$result = 0;

	$leftCount  = [];
	$rightCount = [];

	for ( $i = 0; $i < $length; $i++ ) {
		! isset( $rightCount[ $s[ $i ] ] ) ? $rightCount[ $s[ $i ] ] = 1 : $rightCount[ $s[ $i ] ]++;
	}

	for ( $i = 0; $i < $length - 1; $i++ ) {
		! isset( $leftCount[ $s[ $i ] ] ) ? $leftCount[ $s[ $i ] ] = 1 : $leftCount[ $s[ $i ] ]++;
		$rightCount[ $s[ $i ] ]--;

		if ( $rightCount[ $s[ $i ] ] == 0 ) {
			unset( $rightCount[ $s[ $i ] ] );
		}

		count( $rightCount ) == count( $leftCount ) ? $result++ : '';
	}
    
	return 'Total Good Splits:' . $result;
}

$result = goodSplit( 'aacaba' );
echo $result;
