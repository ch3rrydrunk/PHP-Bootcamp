#!/usr/bin/php
<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   mlx.php                                            :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: caellis <caellis@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/10/09 12:54:40 by caellis           #+#    #+#             */
/*   Updated: 2019/10/09 12:54:40 by caellis          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

	while (1)
	{
		echo "Enter a number: ";
		if (($input = fgets(STDIN)) == false)
			break ;
		$trim = trim($input, "\n");
		if ((!$val = filter_var($trim, FILTER_VALIDATE_INT)) && ($trim != "0"))
			echo "'$trim' is not a number\n";
		else
		{
			if ($val % 2 == 0)
				echo "The number $val is even\n";
			else
				echo "The number $val is odd\n";
		}
	}
?>
