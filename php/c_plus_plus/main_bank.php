<h1>main.cpp</h1>
<?php
$code = str_replace('<','&lt;','/*
*********************************
 Jonathan Aguirre				*
 2/26/2014						*
 Midterm Project				*
 Bank Application				*
*********************************
*/
#include "bankMenu.h"
#include <iostream>
using namespace std;

int main()
{
	BankMenu b;	// Create object from bank menu
	b.welcome();		// Welcome message
	
	while (true)
	{
			switch(b.getMenu())
			{
				case 1:  b.bankLoginMenu(); 	// Opens the bank login menu
					break;
				case 2:  b.bankMenu();	// Opens the bank menu
					break;
				default: cout<<"Error: menu not receiving (menu = 1 or 2)";
			}

			if (b.getMenu() == 0)		// Exits the program.
			{
				break;
			}
	}
	
	system("pause");
	return 0;
}'
);

echo ($code);
?>
