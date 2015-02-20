<h1>car.cpp</h1>
<?php
$code = str_replace('<','&lt;','#include "car.h"
#include <random>
#include <list>
using namespace std;

//*******************************************************
// Constructor: Sets the payment time, parking time.	*
//*******************************************************
Car::Car(int iTime)
{
	initialTime = iTime;		// Sets the initial time.
	
	paymentTime = (1+rand()%4)*15;		// Sets random time of paid parking 15, 30, 45, and 60 minutes.

	parkTime = (1+rand()%70)*5;		// Amount of time that the car will be left parked.
}

//***************************
// Gets the initial time.	*
//***************************
int Car::getInitialTime()
{
	return initialTime;
}

//***************************************
// Gets the payment time for parking.	*
//***************************************
int Car::getpaymantTime()
{
	return paymentTime;
}

//*******************************
// Checks and leaves if ready.	*
//*******************************
bool Car::checkTimeToLeave(int time)
{
	if(time - initialTime >= parkTime)
	{
		return true;
	}

	else
	{
		return false;
	}
}'
);

echo ($code);
?>



