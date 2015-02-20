<h1>main.cpp</h1>
<?php
$code = str_replace('<','&lt;','/*
Jonathan Aguirre
3/27/2014
Chapter 18 
Parked Car Full Simulation

		Brainstorming
- car entering a parking lot
- paying for parking
- leaving the parking lot

- officer will randomly survey the cars for 
	no car parked beyond the time limit
- if in violation: 
		- car is towed(removed from parking lot)

Following parameters:
	•A lot with 20 spaces
	•Cars can pay for parking in 15 minute increments: 15, 30, 45, and 60 minutes
	•Cars can be parked at a max of 1 hour. Therefore a car could pay for 30 minutes of parking, 
		and park for 45 minutes. Any car parked for more than an hour is automatically in violation and is towed away.
	•Cars can park for 5 - 70 minutes (using 5 minute increments)
	•Cars that are towed are just removed from the lot
	•The police officer should patrol at least once every 10 minutes on average.
	•If the lot is full, cars are removed from the simulation.

User Input:
	- ask use the amount of time(in minutes) to run the simulation.
	- should run to the end and output the data:	
		•Number of cars that were found in violation
		•Number of cars that parked
		•Number of cars that were turned away because the lot was full
		•The average # of full spaces

*/

#include <iostream>
#include <random>
#include "parking_lot.h"
using namespace std;

Parking* Parking::instance = 0;		// Sets the instance to null.

int main()
{
	//Parking* parking = Parking::getInstance();

	//parking->/
	int tempTime;		// Temp value for the amount of time in simulation.
	int carFrequency = 7;		// Car frequency 1-10.
	int policeFrequency = 4;		// Police frequency 1-10;
	
	cout<<"\t\tParking Lot Simulation\n\n"<<endl;
	cout<<"Please enter the amount of time(minutes) to simulate the parking lot: ";
	cin>>tempTime;

	Parking::getInstance()->setTime(tempTime);		// Sets the time of simulation.
	
	for(int count = 1; count <= Parking::getInstance()->getTime();count++)
	{
		cout<<"\n\nMinute "<<count<<": ";

		Parking::getInstance()->entersParking(carFrequency, count);		// Creates a vehicle if enters lot.
		
		Parking::getInstance()->carsLeaving(count);		// Checks if any cars are ready to leave.

		Parking::getInstance()->patrolsParkingLot(policeFrequency, count);		// Checks if ready to patrol the lot.
	}

	Parking::getInstance()->displayData();		// Displays the data for the simulation.

	cout<<endl<<endl;
	system("pause");
	return 0;
}'
);

echo ($code);
?>
