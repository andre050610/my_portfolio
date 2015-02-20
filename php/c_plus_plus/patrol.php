<h1>patrol.cpp</h1>
<?php
$code = str_replace('<','&lt;','#include "patrol.h"
#include "car.h"
#include "parking_lot.h"
#include <iostream>
#include <iterator>
#include <random>
#include <list>
using namespace std;

//***************************************************
// Constructor: Sets patrol to false, minute to 0.	*
//***************************************************
Patrol::Patrol()
{
	patroling = false;
	minute = 0;
}

//*******************************
// True if ready to patrol.		*
//*******************************
void Patrol::readyPatroling(int patrolTime)
{
	minute++;		// Adds a minute.

	if (minute >= 10)
	{
		patroling = true;
		minute = 0;		// Sets 
	}

	else
	{
		if(rand()%10 < patrolTime)
		{
			patroling = true;
			minute = 0;
		}

		else
		{
			patroling = false;
		}
	}
}

//***************************
// Patrol the parking lot.	*
//***************************
void Patrol::patrolParkingLot(list<Car> &car, int time)
{
	list<Car>::iterator iter;

	for(iter = car.begin(); iter != car.end(); iter++)
	{
		if(time - iter->getInitialTime() >= iter->getpaymantTime())		// Checks if cars are over the time limit.
		{
			cout<<"-Car in violation-";
			iter = car.erase(iter);		// Removes the car from the lot list.
			Parking::getInstance()->minusLot();		// Removes car from the lot.
			Parking::getInstance()->addToCarViolation();		// Adds one to the car of violation.
		}
	}
}

//*******************************
// Gets the patroling status.	*
//*******************************
bool Patrol::getPatroling()
{
	return patroling;
}

//***********************
// Sets the patroling.	*
//***********************
void Patrol::setPatrol()
{
	patroling = false;
}'
);

echo ($code);
?>

