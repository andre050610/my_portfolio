<h1>transaction.cpp</h1>
<?php
$code = str_replace('<','&lt;','#include "transactions.h"
#include <iostream>
using namespace std;

//***************************
// Manages the transaction.	*
//***************************
void Transaction::manageTransaction(double amount)
{
	transactionAmount = amount;
}

//***************************
// Enables proper access.	*
//***************************
bool Transaction::properAccess(double total)
{
	if (transactionID == \'D\')
	{
		return true;
	}
	else if (transactionID == \'W\' || transactionID == \'C\')
	{
		if(total <= 0)
		{
			cout<<"\n\n\t\t\tSorry! Insufficient funds...\n\n\n\n"<<endl;
			return false;
		}

		return true;	
	}
	
	else
	{
		cout<<"\nSorry! System does not have proper access..."<<endl;
		return false;
	}
}

//*******************************
// Gets transactions amount.	*
//*******************************
double Transaction::getTransactionAmount()
{
	return transactionAmount;
}

//***************************
// Set transaction amount.	*
//***************************
void Transaction::setTransactionAmount(double t)
{
	transactionAmount = t;
}'
);

echo ($code);
?>
