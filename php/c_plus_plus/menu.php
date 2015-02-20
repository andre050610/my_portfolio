<h1>menu.cpp</h1>
<?php
$code = str_replace('<','&lt;','#include "bankMenu.h"
#include <iostream>
using namespace std;

//***************************
// BankMenu constructor.	*
//***************************
BankMenu::BankMenu()
{
	option = \' \';		// Sets the option to null.
	menu = 1;			// Sets the menu to 1.
	setNumTrans(0);		// Sets the amount of transactions to 0.
}

//*******************
// Welcome message.	*
//*******************
void BankMenu::welcome()
{
	cout<<"\n\n\n\n"
"              __      __   _                    _                       \n"
"              \\ \\    / /__| |__ ___ _ __  ___  | |_ ___                 \n"
"               \\ \\/\\//  -_) / _/ _ \\ \'  \\/ -_) |  _/ _ \\               \n"
" __      __   _ \\_/\\_/\\___|_\\__\\___/_|_|_\\___|  \\__\\___/            _   \n"
" \\ \\    / /__| | |___ /_\\  __ _ _  _(_)_ _ _ _ ___  | _ ) __ _ _ _ | |__  \n"
"  \\ \\/\\/ / -_) | (_-</ _ \\/ _` | || | | \'_| \'_/ -_) | _ \\/ _` | \' \\| / /  \n"
"   \\_/\\_/\\___|_|_/__/_/ \\_\\__, |\\_,_|_|_| |_| \\___| |___/\\__,_|_||_|_\\_\\  \n\n\n\n\n\n\n\n\n\n";

	system("pause");		// Pauses the screen.
	system("cls");		// Clears the screen.
}

//*******************************
// Opens the bank login menu.	*
//*******************************
void BankMenu::bankLoginMenu()
{
	while (true)
	{
		cout<<""
			"Bank Login Menu\n"
			"-------------------------\n\n"
			"A) Log into an account\n"
			"B) Open a new account\n"
			"C) Show all accounts\n"
			"D) Show all transactions\n"
			"E) Exit System\n\n"
			"Please choose an option: ";
		
		while(!(cin>>option))		// Validates and gets the option from user.
		{
			cout<<"\nSorry! Invalid value..";
			cin.clear();
			cin.ignore(1000, \'\n\');
			cout<<"Please re-choose an option: ";
		}
		option = toupper(option);		// Upper cases the letter.
				// Validates user input.
		if (option != \'A\' && option != \'B\' && option != \'C\' && option != \'D\' && option != \'E\')
		{
			cout<<"\n\n\t\t\tSorry! Not valid letter...\n\n\n";
		}

		else
		{
			switch (option)
			{
				case \'A\': system("cls");		// Clears the screen.
						menu = accountAccess();		// Logs into the system.
						break;
				case \'B\': system("cls");		// Clears the screen.
						menu = createAccount();		// Creates an account.								
						break;
				case \'C\': system("cls");		// Clears the screen.
						displayAccounts();	// Displays all the accounts.						
						break;
				case \'D\': system("cls");		// Clears the screen.
						displayTrans();		// Displays all transactions.
						break;
				case \'E\': system("cls");	// Clears the screen.
						cout<<"\n\n\n\n\n\n\n\t\t\t~Exiting System~\n\n\n\n\n\n\n\n\n\n";	// Exits the system.
						menu = 0;	// Sets the menu to 0.
						break;	
			}

			break;
		}

	}

}


//***********************	
// Opens the bank menu.	*		
//***********************
void BankMenu::bankMenu()
{
	while (true)
	{
		cout<<""
			"Bank Menu\n"
			"------------------------------------\n\n"
			"A) Show account balance\n"
			"B) Make a deposit\n"
			"C) Make a withdrawal\n"
			"D) Write a Check\n"
			"E) Show all transactions\n"
			"F) Logout of an account\n\n"
			"Please choose an option: ";

		while(!(cin>>option))		// Validates and gets the option from user.
		{
			cout<<"\nSorry! Invalid value..";
			cin.clear();
			cin.ignore(1000, \'\n\');
			cout<<"Please re-choose an option: ";
		}
		option = toupper(option);		// Upper cases the letter.
				// Validates user input.
		if (option != \'A\' && option != \'B\' && option != \'C\' && option != \'D\' && option != \'E\' && option != \'F\')
		{
			cout<<"\n\n\t\t\tSorry! Not valid letter...\n\n\n";
		}

		else
		{
			switch (option)
			{
				case "A": system("cls");		// Clears the screen.
						showAccountBalance();		// Displays account balance.
						break;
				case "B": system("cls");		// Clears the screen.
						deposit();		// Make deposit.
						break;
				case "C": system("cls");		// Clears the screen.
						withdrawal();		// Makes a withdrawal.
						break;
				case "D": system("cls");		// Clears the screen.
						check();			// Makes a check.
						break;
				case "E": system("cls");		// Clears the screen.
						showAllTrans();		// Displays all the transactions.
						break;
				case "F": system("cls");	// Clears the screen.
						saveData();		// Saves the data and resets variables.
						menu = 1;		// Sets the menu to 1.
						break;	
			}

			break;
		}

	}
}

//*******************
// Gets the menu.	*
//*******************
int BankMenu::getMenu()
{
	return menu;
}

//*******************
// Sets the menu.	*
//*******************
void BankMenu::setMenu(int m)
{
	menu = m;
}'
);

echo ($code);
?>



