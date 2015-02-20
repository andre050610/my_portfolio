<h1>parking_lot.cpp</h1>
<?php
$code = str_replace('<','&lt;','#include "parking_lot.h"
#include <random>
#include <iostream>
using namespace std;

//***********************************************************
// Constructor: Sets the parking lot to 0 (empty spots).	*
//***********************************************************
Parking::Parking()
{
	lot = 0;
	numOfCarsViolation = 0;		// Number of cars that where in violation.
	numOfCarsParked = 0;		// Number of cars that where parked.
	turnedAwayCars = 0;		// Cars that where turned away from full lot.
	averageFullSpaces = 0;		// Average of full spaces.
}

//***********************************************
// Sets the amount of time to run simulaion.	*
//***********************************************
void Parking::setTime(int t)
{
	time = t;
}

//***********************************************
// Gets the amount of time to run simulation.	*
//***********************************************
int Parking::getTime()
{
	return time;
}

//*******************************************
// Gets the amount of open spaces in lot.	*
//*******************************************
int Parking::getLot()
{
	return lot;
}

//***************************
// Removes a car from lot.	*
//***************************
void Parking::minusLot()
{
	lot -= 1;
}


//*******************************
// Creates a vehicle in lot.	*
//*******************************
void Parking::entersParking(int frequency, int currentTime)
{
	if((rand()%10) <= frequency)
	{
		if(lot <= 20)
		{
			Car newCar(currentTime);		// Creates a car in lot.
			car.push_back(newCar);		// Adds car to the list.

			lot += 1;		// Adds one to the amount of cars in lot.
			numOfCarsParked += 1;		// Adds one to the amount of cars ever parked.
			cout<<"-Car enters lot-";
		}

		else 
		{
			turnedAwayCars += 1;		// Adds one to the cars that were turned away.
			cout<<"-Car turned away-";
		}
	}
}

//*******************************************
// Checks if any cars are ready to leave.	*
//*******************************************
void Parking::carsLeaving(int time)
{
	list<Car>::iterator iter;

	for(iter = car.begin();iter != car.end();iter++)
	{
		if(time - iter->getInitialTime() >= 60)
		{
			iter = car.erase(iter);		// Removes the car from the lot.
			numOfCarsViolation += 1;		// Adds one to the number of cars in violation.
			lot -= 1;		// Frees a space in the lot.
			cout<<"-1 hour violation-";
		}
		
		else if(iter->checkTimeToLeave(time))		// Checks if car is ready to leave the lot.
		{
			iter = car.erase(iter);		// Removes the car from the lot.
			lot -= 1;		// Frees a space in the lot.
			cout<<"-Car leaves lot-";
		}
	}

	averageFullSpaces += lot;		// Adds the amount of cars in lot to average.
}

//***********************************
// Adds one to the car violation.	*
//***********************************
void Parking::addToCarViolation()
{
	numOfCarsViolation += 1;
}

//*******************************
// Patrols the parking lot.		*
//*******************************
void Parking::patrolsParkingLot(int frequency, int time)
{
	police.readyPatroling(frequency);		// Sets the patroling to true or false.
	
	if(police.getPatroling())
	{
		police.patrolParkingLot(car, time);		// Patrols the parking lot.
		cout<<"-Patrols the lot-";
		police.setPatrol();		// Sets patrol to false.
	}
}

//*******************************************
// Displays the data for the simulation.	*
//*******************************************
void Parking::displayData()
{
	cout<<"\n\n\n\tNumber of car violations: "<<numOfCarsViolation<<endl;
	cout<<"\tNumber of parked cars: "<<numOfCarsParked<<endl;
	cout<<"\tNumber of cars turned away: "<<turnedAwayCars<<endl;
	cout<<"\tAverage number of full spaces: "<<(averageFullSpaces/time)<<endl;
}'
);

echo ($code);
?>




