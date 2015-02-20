<h1>account.cpp</h1>
<?php
$code = str_replace('<','&lt;','#include "account.h"
#include "deposit.h"
#include "withdrawal.h"
#include "check.h"
#include <string>
#include <iomanip>
#include <iostream>
#include <fstream>
#include <sstream>
using namespace std;

//*******************************************************
// Sets number of transactions and allocates an array.	*
//*******************************************************
Account::Account()
{
	numTransactions = 0;		// Sets number of transactions to 0.
	allTransactions = new string [20];	// Allocating memory for array.
}

//*******************************************
// Deletes the allocated array from memory.	*
//*******************************************
Account::~Account()
{
	delete [] allTransactions;		// Deletes the memory in the dynamic array.
}

//***********************************
// Makes a withdrawal to account.	*
//***********************************
void Account::withdrawal()
{
	Withdrawal w(\'W\');		// Creates object from deposit.

	double tempWithdraw;		// Temporary variable for withdrawal.
	ostringstream convert;		// Converts to string.
	string convertWithdraw;		// Variable for converted withdrawal string.
	
	if(w.properAccess(accBalance))		// Enables proper access.
	{
		if (numTransactions <= 20)
		{
			cout<<"Please enter the amount you wish to withdraw: $";

			while (true)
			{
				while (!(cin>>tempWithdraw))		// Validates the for invalid value.
					{
						cout<<"\nSorry! Invalid input..."<<endl;
						cin.clear();
						cin.ignore(1000,\'\n\');
						cout<<"Please re-enter the amount you wish to withdraw: $";
					}

					if (tempWithdraw < 0)		// Validates for negative value.
					{
						cout<<"\nSorry! Cannot deposit negative amount..."<<endl;
						cout<<"Please re-enter the amount you wish to withdraw: $";
					}

					else
					{
						break;
					}
			}

			w.setWithdrawal(tempWithdraw);		// Sets the amount of withdrawal.	

			if (w.makeWithdrawal(w.getWithdrawal(),accBalance) != 0)	
			{
				accBalance -= w.getWithdrawal();   // Manages the transaction.
				cout<<"\n\nYour withdrawal transaction was made..."<<endl<<endl<<endl;
				numTransactions += 1;		// Adds a transaction made.
						// Converts withdrawal to string.
				convert<<w.getWithdrawal();
				convertWithdraw = convert.str();
				allTransactions[numTransactions - 1] = "Withdrawal: $"+ convertWithdraw;	// Adds to all transactions made.
			}

			else
			{
				cout<<"\nSorry! Insufficient funds...\n\n\n\n"<<endl;
			}
		}

		else
		{
			cout<<"\nSorry! You can only do 20 transactions per login.\nPlease sign out and log back in. Thank You!\n\n\n\n"<<endl;
		}
	}
	
	w.setWithdrawal(0);		// Resets the withdrawal.
	w.setTransactionAmount(0);		// Sets the transaction amount to 0.
	system("pause");	// Pauses the screen.
	system("cls");		// Clears the screen.
}

//*******************
// Makes a check.	*
//*******************
void Account::check()
{
	Check c(\'C\');	// Creates object from deposit.

	double tempCheck;		// Temporary variable for check.
	ostringstream convert;		// Converts to string.
	string convertCheck;		// Variable for converted check string.
	
	if(c.properAccess(accBalance))		// Enables proper access.
	{
		if (numTransactions <= 20)
		{
			cout<<"Please enter the amount you wish to write the check: $";

			while (true)
			{
				while (!(cin>>tempCheck))		// Validates the for invalid value.
					{
						cout<<"\nSorry! Invalid input..."<<endl;
						cin.clear();
						cin.ignore(1000,\'\n\');
						cout<<"Please re-enter the amount you wish to write the check: $";
					}

					if (tempCheck < 0)		// Validates for negative value.
					{
						cout<<"\nSorry! Cannot deposit negative amount..."<<endl;
						cout<<"Please re-enter the amount you wish to write the check: $";
					}

					else
					{
						break;
					}
			}

			c.setCheck(tempCheck);		// Sets the amount of the check.
					
			if (c.makeCheck(c.getCheck(), accBalance) != 0)	
			{
				accBalance -= c.getCheck();   // Manages the transaction.
				cout<<"\n\nYour check transaction was made..."<<endl<<endl<<endl;
				numTransactions += 1;		// Adds a transaction made.
						// Converts check to string.
				convert<<c.getCheck();
				convertCheck = convert.str();
				allTransactions[numTransactions - 1] = "Check: $"+ convertCheck;	// Adds to all transactions made.
			}

			else
			{
				cout<<"\nSorry! Insufficient funds...\n\n\n\n"<<endl;
			}
		}

		else
		{
			cout<<"\nSorry! You can only do 20 transactions per login.\nPlease sign out and log back in. Thank You!\n\n\n\n"<<endl;
		}
	}

	c.setCheck(0);		// Resets the check.
	c.setTransactionAmount(0);		// Sets the transaction amount to 0.
	system("pause");	// Pauses the screen.
	system("cls");		// Clears the screen.
}

//*******************************
// Makes a deposit to account.	*
//*******************************
void Account::deposit()
{
	Deposit d(\'D\');	// Creates object from deposit.

	double tempDeposit;		// Temporary variable for deposit.
	ostringstream convert;		// Converts to string variable.
	string convertDeposit;		// String variable for deposit.
	
	if(d.properAccess(accBalance))	// Enables proper access.
	{
		if (numTransactions <= 20)		// Allows less than 20 transactions per log in.
		{
			cout<<"Please enter the amount you wish to deposit: $";
			
			while (true)
			{
				while (!(cin>>tempDeposit))		// Validates the for invalid value.
				{
					cout<<"\nSorry! Invalid input..."<<endl;
					cin.clear();
					cin.ignore(1000,\'\n\');
					cout<<"Please re-enter the amount you wish to deposit: $";
				}

				if (tempDeposit < 0)		// Validates for negative value.
				{
					cout<<"\nSorry! Cannot deposit negative amount..."<<endl;
					cout<<"Please re-enter the amount you wish to deposit: $";
				}

				else
				{		
					break;
				}

			}

			d.setDeposit(tempDeposit);		// Sets the deposit.
			accBalance += d.makeDeposit(d.getDeposit());      // Manages the transaction.
			cout<<"\n\nYour deposit transaction was made..."<<endl<<endl<<endl;
			numTransactions += 1;		// Adds a transaction made.
					// Converts deposit to a string.
			convert<<d.getDeposit();
			convertDeposit = convert.str();
			allTransactions[numTransactions - 1] = "Deposit: $"+ convertDeposit;  // Adds to all transactions made.
		}

		else
		{
			cout<<"\nSorry! You can only do 20 transactions per login.\nPlease sign out and log back in. Thank You!\n\n\n\n"<<endl;
		}
	}

	else 
	{
		cout<<"\nSorry! System does not have proper access...\n\n\n\n"<<endl;
	}

	d.setDeposit(0);		// Resets the deposit.
	d.setTransactionAmount(0);		// Resets the transaction amount. 
	system("pause");	// Pauses the screen.
	system("cls");		// Clears the screen.
}

//*******************************
// Displays all the accounts	*
//*******************************
void Account::displayAccounts()
{
	string tempVar;			// Temporary variable.
	int counter = 0;		// Counter variable.
	int spaces = 13;		// Spaces for each character.
	
	ifstream inputFile; 
	inputFile.open("allaccounts.txt");	// Opens the file.
	
	cout<<setw(spaces)<<"\nAccount #"<<setw(spaces)<<"First Name"<<setw(spaces);
	cout<<"Last Name"<<setw(spaces)<<"Password"<<setw(spaces)<<"Balance"<<endl;
	cout<<"------------------------------------------------------------------------------"<<endl;
	 
	if (inputFile)		// Checks for file in system.
	{
		while(!inputFile.eof())	
		{			
					// Gets all the account data from file
					// and displays them to the user.
			getline(inputFile,tempVar,\'$\');

			if (inputFile.eof())
			{
				break;
			}

			else if (counter%5 == 0 && counter!= 0)
			{
				cout<<left<<endl<<setw(spaces+1)<<tempVar;
			}
		
			else
			{
				cout<<left<<setw(spaces+1)<<tempVar;
			}
		
			counter ++;
		}
	}

	else
	{
		cout<< "\nError: Opening allaccount.txt...Please check for file in correct location.\n\n\n\n"<<endl;
	}

	
	cout<<endl<<endl;
	inputFile.close();		// Closes the file. 
	system("pause");	// Pauses the screen.
	system("cls");		// Clears the screen.
}

//*******************************************************
// Validates the password and sets the password.		*
//*******************************************************
void Account::validatePassword(bool &pass, string tempPassword, string password)
{
	if (tempPassword == password)
	{
		pass = true;	// True for corrrect password.
		accPassword = password;		// Sets the password.
	}
	else
	{
		pass = false;	// False if incorrect password.
	}
}

//***************************************************************
// Validates the account number and sets the account number.	*
//***************************************************************
void Account::validateAccNumber(bool &pass, int tempNumber, string number)
{
	int intNum;		// Variable for conversion.
	intNum = atoi(number.c_str());		// Converts the string to integer.

	if (tempNumber == intNum)
	{
		pass = true;	// True for corrrect password.
		accNumber = intNum;		// Sets the account number.
	}
	else
	{
		pass = false;	// False if incorrect account number.
	}
}

//***************************
// Logs into the system.	*	
//***************************
int Account::accountAccess( )
{
	ifstream inFile;
	inFile.open("allaccounts.txt");	// Opens the file.

	double doubleBal;		// Variable for conversion.
	int userAccNumber;	// Users entered account number.
	string userPassword;		// Users entered password.
	string tempfName;	// Temporary first name
	string templName;	// Temporary last name.
	string tempAccNumber; 	// Temporary account number.		
	string tempPassword;	// Temporary password.
	string tempBalance;		// Temporary balance.		
	
	bool passNum = false;	// True if correct input for number.
	bool passPassword = false;	// True if correct input for password.

	if (inFile)		// Checks for file in system.
	{
		cout<<"\t\t\tLogin Account\n"<<endl;
		cout<<"Please enter your account number: ";
		while(!(cin>>userAccNumber))		// Gets the account number from user.
		{
			cout<<"\n\tSorry! Invalid input..."<<endl;
			cin.clear();
			cin.ignore(1000,\'\n\');
			cout<<"Please re-enter your account number: ";
		}

		cout<<"Please enter your password: ";
		while(!(cin>>userPassword))		// Gets the password from user.
		{
			cout<<"\n\tSorry! Invalid input..."<<endl;
			cin.clear();
			cin.ignore(1000,\'\n\');
			cout<<"Please re-enter your password: ";
		}

		while(!inFile.eof())
		{
			getline(inFile,tempAccNumber,\'$\');	// Reads an account number from file.

			if(inFile.eof())
			{
				break;
			}

			getline(inFile,tempfName,\'$\');		// Reads the first name.
			getline(inFile,templName,\'$\');		// Reads the last name.
			getline(inFile,tempPassword,\'$\');	// Reads the password
			getline(inFile,tempBalance,\'$\');		// Reads the balance.	

			validatePassword(passPassword, userPassword, tempPassword);	// Validates the password.
			validateAccNumber(passNum, userAccNumber, tempAccNumber);	// Validates the account number.

			if(passNum== true && passPassword == true)
			{
				fName = tempfName;		// Sets the first name.
				lName = templName;		// Sets the last name.

				doubleBal = atoi(tempBalance.c_str());		// Converts the string to integer.
			
				accBalance = doubleBal;	// Sets the balance.
				cout<<"\n\n\n\n\t\t\tThank You! Login Accepted...\n\n\n\n"<<endl;
				break;
			}
		}

		if(passNum!= true || passPassword != true)
		{
			cout<<"\n\n\n\nSorry! Can\'t find the combinations of the \naccount number and password in the system...\n\n\n\n"<<endl;
		}
	}

	else
	{
		cout<< "\nError: Opening allaccount.txt...Please check for file in correct location.\n\n\n\n"<<endl;
	}

	inFile.close();	// Closes the file.
	system("pause");		// Pauses the system.
	system("cls");		// Clears the screen.
			// Returns the menu to go to.
	if (passNum== true && passPassword == true)
		return 2;
	else 
		return 1;
}

//***********************
// Creates an account.	*
//***********************
int Account::createAccount()
{
	cout<<"\t\t\tCreate Account\n"<<endl;
	fstream inputFile;
	inputFile.open("accountNumber.txt", ios::in);	// Opens the file for account number.
	ofstream inputFileAcc;
	inputFileAcc.open("allaccounts.txt", ios::out | ios::app);	// Opens the file for accounts.

	int convertAccNum;		// Holds the integer account number.
	string tempfName;		// Temporary first name.
	string templName;		// Temporary last name.
	string tempAccNumber; 		// Temporary account number.		
	string tempPassword;	// Temporary password.
	ostringstream convert;		// Variable to convert to string.

	char correct = \'n\'; 		// User entered correct data.
	
	while(inputFile && inputFileAcc)
	{
		getline(inputFile,tempAccNumber,\'$\');		// Reads the account number.
		inputFile.close();		// Closes the file.

		cout<<"\nPlease enter your first name: ";
		cin>>tempfName;		// User enters the first name.
	
		cout<<"\nPlease enter your last name: ";
		cin>>templName;		// User enters the last name.
	
		cout<<"\nPlease create a password: ";
		cin>>tempPassword;		// User creates a password .

		system("cls");		// Clears the screen.

		cout<<"Account Number: "<<tempAccNumber<<"\nFirst Name: "<<tempfName;
		cout<<"\nLast Name: "<<templName<<"\nPassword: "<<tempPassword;
		cout<<"\n\nIs your information correct?(y/n): ";
		cin>>correct;

		if (tolower(correct) == \'y\')
		{
			cout<<"Thank You! Account Created...\n\n\n\n"<<endl;
				
				// Adds data to the allaccounts.txt file.
			inputFileAcc<<tempAccNumber<<\'$\'<<tempfName<<\'$\'<<templName<<\'$\'<<tempPassword<<\'$\'<<0<<\'$\'<<endl;
				
			fName = tempfName;		// Sets the first name.
			lName = templName;		// Sets the last name.

			convertAccNum = atoi(tempAccNumber.c_str());		// Converts the string to integer.

			accNumber = convertAccNum;		// Sets the account number.
			accPassword = tempPassword;		// Sets the password.
			accBalance = 0;		// Sets the balance to 0.
			
			inputFile.open("accountNumber.txt", ios::out);	// Opens the file for account number.

			convertAccNum += 1;		// Adds one to the account number.

			convert<<convertAccNum;
			tempAccNumber = convert.str();
			inputFile<<tempAccNumber;		// Overwrites the accountNumber.txt file.
			break;	
		}
		else
		{
			system("cls");		// Clears the screen.
			cout<<"\nPlease re-enter your information..."<<endl;
			
		}
	}

	if(!inputFile || !inputFileAcc)
	{
		cout<< "\nError: Opening allaccount.txt...Please check for file in correct location.\n\n\n\n"<<endl;
	}

	inputFile.close();		// Closes the file.
	inputFileAcc.close();		// Closes the file.
	system("pause");		// Pauses the screen.
	system("cls");		// Clears the screen.

	if(correct == \'y\')
		return 2;
	else
		return 1;
}

//*******************************
// Displays account balance.	*
//*******************************

void Account::showAccountBalance()
{
	cout<<"\n\n\n\n\t\t\tAccount Balance"<<endl;
	cout<<"\n\t\tYour account balance is $"<<accBalance<<endl<<endl<<endl;	// Displays account balance.
	system("pause");
	system("cls");
}

//*******************************
// Shows all the transactions.	*
//*******************************
void Account::showAllTrans ()
{
	cout<<"All your Transactions"<<endl;
	cout<<"---------------------"<<endl<<endl;
	if (allTransactions[0] == "")
	{
		cout<<"No Transactions Made..."<<endl;
	}

	for (int count = 0; count < numTransactions; count +=1)
	{
		cout<<allTransactions[count]<<endl;
	}

	cout<<"\n\n\n\n";
	system("pause");		// Pauses the screen.
	system("cls");		// Clears the screen.
}

//***********************************
// Sets the number of transactions.	*
//***********************************
void Account::setNumTrans(int trans)
{
	numTransactions = trans;
}

//*******************************************
// Saves the account balance to account.	*
//*******************************************
void Account::saveData()
{
	string tempBalance;		// Temporary variable.
	string tempVar;		// Temporary variable.
	string tempAccNum;		// Temporary account number.
	ostringstream convertAccNum;		// Variable to convert account number to string.
	ostringstream convertBal;		// Variable to convert balance to string.

	ifstream file;		// Variable for read file.
	ofstream tempFile;		// Variable for write file.
	fstream trans;		// Variable for append file.
	file.open("allaccounts.txt");		// Opens the file.
	tempFile.open("tempAllaccounts.txt");		// Opens the file.

			// Converts to a string 
	convertAccNum<<accNumber;
	tempAccNum = convertAccNum.str();

	if (file && tempFile)		// Checks for file in system.
	{
		while(!file.eof())		// While not end of file.
		{
			
			getline(file,tempVar,\'$\');	// Reads the account number from file.
			
			if (file.eof())		// Break loop if end of file.
			{
				break;
			}
			
			tempFile<<tempVar<<\'$\';		// Writes data to the file.

			if (tempVar == tempAccNum)
			{
				getline(file,tempVar,\'$\');		// Reads the first name
				tempFile<<tempVar<<\'$\';		// Writes data to the file.

				getline(file,tempVar,\'$\');		// Reads the last name
				tempFile<<tempVar<<\'$\';		// Writes data to the file.

				getline(file,tempVar,\'$\');		// Reads the password.
				tempFile<<tempVar<<\'$\';		// Writes data to the file.

				getline(file,tempVar,\'$\');		// Reads the balance.
					// Converts to a string 
				convertBal<<accBalance;
				tempBalance = convertBal.str();
				tempVar = tempBalance;		// Sets the account balance to file.

				tempFile<<tempVar<<\'$\';		// Writes data to the file.
			}	
		}
	}

	else
	{
		cout<< "\nError: Opening allaccount.txt...Please check for file in correct location."<<endl;
	}

	
	file.close();	// Closes the file.
	tempFile.close();		// Closes the file.

	ofstream file2;
	ifstream tempFile2;

	file2.open("allaccounts.txt");		// Re-Opens the file.
	tempFile2.open("tempAllaccounts.txt");		// Re-Opens the file.
	
	if (file2 && tempFile2)		// Checks for file in system.
	{
		while(!tempFile2.eof())		// While not end of file.
		{
					// Re-Writes the account file with updated balance.
			getline(tempFile2,tempVar,\'$\');
			
			if (tempFile2.eof())		// Break loop if end of file.
			{
				break;
			}
			
			file2<<tempVar<<\'$\';
		}
	}

	else
	{
		cout<< "\nError: Opening allaccount.txt...Please check for file in correct location."<<endl;
	}

	file2.close();	// Closes the file.
	tempFile2.close();		// Closes the file.

	trans.open("transactionRecords.txt", ios::out | ios::app);		// Opens file.
	trans<<endl<<"\t"<<fName<<\'$\'<<endl<<endl;
	
	for (int count = 0; count < numTransactions; count++)		// Clears the list of transactions.
	{	
		trans<<allTransactions[count]<<\'$\'<<endl;		// Write all the transactions to file.
		allTransactions[count] = "";
	}
	
	numTransactions = 0;		// Resets the number of transactions.
	trans.close();		// Closes the file.
	cout<<"\n\n\n\t\t\t~Logging Out~\n\n\n\n\n\n\n\n\n\n";		// Logging out.
	system("pause");		// Pauses the screen.
	system("cls");		// Clears the screen.
}

//*******************************
// Displays all transactions.	*
//*******************************
void Account::displayTrans()
{
	string tempTrans;		// Temporary variable.
	ifstream inFile;		// Variable for reading file.
	inFile.open("transactionRecords.txt");		// Opens the file.

	cout<<"\n\n\tTransactions"<<endl;
	cout<<"----------------------------"<<endl;
	while (!inFile.eof())
	{
		getline(inFile,tempTrans,\'$\');		// Reads data.
		cout<<tempTrans;
	}

	cout<<"\n\n";
	inFile.close();		// Closes the file.
	system("pause");		// Pauses the screen.
	system("cls");		// Clears the screen.
}'
);

echo ($code);
?>
