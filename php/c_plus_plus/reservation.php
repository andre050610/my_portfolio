<h1>reservation.cpp</h1>
<?php
$code = str_replace('<','&lt;','#include "reservation.h"
#include "flightFactory.h"
#include "airlineSystem.h"
#include <string>
#include <iostream>
using namespace std;

//***********************************************************
// Constructor: creates objects for destiantion and time.	*
//***********************************************************
Reservation::Reservation()
{
	destination = new FlightDestination;
	time = new FlightTime;
}

//*******************
// Destructor.		*
//*******************
Reservation::~Reservation()
{
	delete destination;
	delete time;
}

//*******************************
// Displays the destinations.	*
//*******************************
void Reservation::displayScheldule()
{
	destination->displayScheldule(name);
}
	
//*******************************************************
// Makes sure entered correctly the passenger\'s name.	*
//*******************************************************
bool Reservation::validateName()
{
	string option;		// Option for Y or N.

	system("cls");
	

	while (true)
	{
		cout<<"\t\t"<<name;
		cout<<"\nIs the name correct (Y/N)? ";
		cin>>option;

		if (option == "Y" || option == "y")
		{
			return true;
		}

		else if (option == "N" || option == "n")
		{
			return false;
		}

		else 
		{
			cout<<"Sorry! Invalid input."<<endl;
		}
	}

	return false;
}


//***************************************
// Enters the name of the passenger.	*
//***************************************
void Reservation::nameOfPassenger()
{
	do
	{
		system("cls");
		cout<<"Please enter the passenger\'s name: ";
		cin.ignore();
		getline(cin,name);
	}while(validateName() != true);
}

//***********************************
// Gets the name of the passenger.	*
//***********************************
string Reservation::getName()
{
	return name;
}

//*******************************
// Gets the from destination.	*
//*******************************
string Reservation::getFrom()
{
	return destination->getStateFrom();
}

//***************************
// Get the to destination.	*
//***************************
string Reservation::getTo()
{
	return destination->getStateTo();
}

//***********************
// Gets departure time.	*
//***********************
string Reservation::getDeparture()
{
	return time->getDeparture();
}

//***********************
// Gets arriaval time.	*
//***********************
string Reservation::getArrival()
{
	return time->getArrival();
}

//***************************
// Gets the flight number.	*
//***************************
string Reservation::getFlightNumber()
{
	return time->getFlightNumber();
}

//***************************
// Gets the flyer points.	*
//***************************
string Reservation::getFlyerPoints()
{
	return AirlineSystem::getInstance()->getFlyerPoints(destination->getStateFrom(), destination->getStateTo(), time->getDeparture(), time->getArrival());
}

//***************************
// Gets the aircraft type.	*
//***************************
string Reservation::getAircraft()
{
	return AirlineSystem::getInstance()->getAircraft(destination->getStateFrom(), destination->getStateTo(), time->getDeparture(), time->getArrival());
}



//***************************
// Gets the state from.		*
//***************************
void Reservation::stateFrom()
{
	do
	{
		destination->setStateFrom();		// Gets state from.

	}while(destination->validateStateFrom() != true);

	destination->updateScheduleFrom(name, time->getFlightNumber());		// Updates the schedule for from destination.
}

//***********************
// Gets the state to.	*
//***********************
void Reservation::stateTo()
{
	do
	{
		destination->setStateTo();		// Gets state to.

	}while(destination->validateStateTo() != true);

	destination->updateScheduleTo(name, time->getFlightNumber());		// Updates the schedule for to destination.
}

//***************************
// Gets the depart time.	*
//***************************
void Reservation::deaprtTime()
{
	do
	{
		time->setDeparture();		// Gets the departure time.

	}while(time->validateDeparture(destination) != true);

	time->updateScheduleDeparture(destination, name);		// Updates the schedule from the departure time.

}

//***************************
// Gets the arrival time.	*
//***************************
void Reservation::arrivalTime()
{
	do
	{
		time->setArrival();		// Gets the arrival time.

	}while(time->validateArrival(destination) != true);

	time->updateScheduleFinal(destination,name);		// Updates the final schedule.
}

//*******************************************************
// Ask for if the information was entered correctly.	*
//*******************************************************
bool Reservation::correctReservation(bool &correctReservation)
{
	string correct;		// Option from user for Y or N.

	cout<<"\n\n\n";

	while (true)
	{
		cout<<"Is the information correct (Y/N)?";
		cin>>correct;

		if (correct == "Y" || correct == "y")
		{

			correctReservation = true;
			return true;
			break;
		}

		else if (correct == "N" || correct == "n")
		{
			while (true)
			{
				cout<<"\n\nWould you like to redo the reservation (Y/N)?";
				cin>>correct;

				if (correct == "Y" || correct == "y")
				{
					correctReservation = false;
					return false;
					break;
				}

				else if (correct == "N" || correct == "n")
				{
					correctReservation = false;
					return true;
					break;
				}

				else
				{
					cout<<"\tSorry! Invalid input."<<endl;
				}
			}
			
		}

		else
		{
			cout<<"\tSorry! Invalid input."<<endl;
		}
	}

	return true;
}

//***********************************************
// Resets the flight number for full seats.		*
//***********************************************
void Reservation::resetFlightNumber(string flightNum)
{
	time->resetFlightNumber(flightNum);
}

//*******************************************
// Updates the schedule from full flight.	*
//*******************************************
void Reservation::updatedFullFlight()
{
	destination->updateScheduleFrom(name, time->getFlightNumber());		// Updates the schedule for from destination.
}
');

echo ($code);
?>