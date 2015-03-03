<h1>main.cpp</h1>
<?php
$code = str_replace('<','&lt;','#include <iostream>
#include "airlineSystem.h"		// Main singleton system class.
#include "flightFactory.h"
#include "baseFlight.h"
#include "flight602.h"
#include "flight1201.h"
#include "flight1202.h"
#include "flight1203.h"
#include "flight902.h"
#include "flight903.h"
#include "flight202.h"
#include "flight204.h"
#include "flight1204.h"
#include "flight1205.h"
#include "flight1206.h"
#include "flight302.h"
#include "flight304.h"
#include "flight306.h"
#include "flight904.h"
#include "flight905.h"
#include "flight601.h"
#include "flight201.h"
#include "flight203.h"
#include "flight205.h"
#include "flight301.h"
#include "flight303.h"
#include "flight305.h"
#include "flight101.h"
#include "flight103.h"
#include "flight105.h"
#include "flight107.h"
#include "flight109.h"
#include "flight100.h"
#include "flight102.h"
#include "flight104.h"
#include "flight106.h"
#include "flight108.h"
#include "seat.h"	// Airplane Seats.
using namespace std;
 
AirlineSystem *AirlineSystem::instance = 0;		// Sets the instance to null.
FlightFactory *FlightFactory::instance = 0;		// Sets the instance to null.

void registerFlight();

int main()
{
	
	AirlineSystem *airline = AirlineSystem::getInstance();
	FlightFactory *flightFact = FlightFactory::getInstance();

	registerFlight();		// Registers the flights.

	while(true)
	{
		switch (airline->mainMenu())
		{
		case 1:	airline->reservation();		// Reserves a ticket for a passenger.
				break;
		case 2: airline->displaySinglePass();		// Displays a single boarding pass.
				break;
		case 3: airline->displayAllBoardingPasses();		// Displays all the boarding passes.
				break;
		case 4: airline->sortFlightSchedule();		// Sorts the flight schedule.
				break;
		case 5: airline->sortFlightCities();		// Sorts the city by name or code.
				break;
		case 6: airline->cancelReservation();		// Cancels a reservation.
				break;
		case 7: airline->saveToFile();		// Saves to the file.
				exit(0);
				break;
		}
	}

	system("pause");
	return 0;
}


void registerFlight()
{
	FlightFactory::getInstance()->registerFlight( 602, new Flight602,new Flight602);
	FlightFactory::getInstance()->registerFlight( 1201, new Flight1201, new Flight1201);
	FlightFactory::getInstance()->registerFlight(1202, new Flight1202, new Flight1202);
	FlightFactory::getInstance()->registerFlight(1203, new Flight1203, new Flight1203);
	FlightFactory::getInstance()->registerFlight(902, new Flight902, new Flight902);
	FlightFactory::getInstance()->registerFlight(903, new Flight903, new Flight903);
	FlightFactory::getInstance()->registerFlight(202, new Flight202, new Flight202);
	FlightFactory::getInstance()->registerFlight(204, new Flight204, new Flight204);
	FlightFactory::getInstance()->registerFlight(1204, new Flight1204, new Flight1204);
	FlightFactory::getInstance()->registerFlight(1205, new Flight1205, new Flight1205);
	FlightFactory::getInstance()->registerFlight(1206, new Flight1206, new Flight1206);
	FlightFactory::getInstance()->registerFlight(302, new Flight302, new Flight302);
	FlightFactory::getInstance()->registerFlight(304, new Flight304, new Flight304);
	FlightFactory::getInstance()->registerFlight(306, new Flight306, new Flight306);
	FlightFactory::getInstance()->registerFlight(904, new Flight904, new Flight904);
	FlightFactory::getInstance()->registerFlight(905, new Flight905, new Flight905);
	FlightFactory::getInstance()->registerFlight(601, new Flight601, new Flight601);
	FlightFactory::getInstance()->registerFlight(201, new Flight201, new Flight201);
	FlightFactory::getInstance()->registerFlight(203, new Flight203, new Flight203);
	FlightFactory::getInstance()->registerFlight(205, new Flight205, new Flight205);
	FlightFactory::getInstance()->registerFlight(301, new Flight301, new Flight301);
	FlightFactory::getInstance()->registerFlight(303, new Flight303, new Flight303);
	FlightFactory::getInstance()->registerFlight(305, new Flight305, new Flight305);
	FlightFactory::getInstance()->registerFlight(101, new Flight101, new Flight101);
	FlightFactory::getInstance()->registerFlight(103, new Flight103, new Flight103);
	FlightFactory::getInstance()->registerFlight(105, new Flight105, new Flight105);
	FlightFactory::getInstance()->registerFlight(107, new Flight107, new Flight107);
	FlightFactory::getInstance()->registerFlight(109, new Flight109, new Flight109);
	FlightFactory::getInstance()->registerFlight(100, new Flight100, new Flight100);
	FlightFactory::getInstance()->registerFlight(102, new Flight102, new Flight102);
	FlightFactory::getInstance()->registerFlight(104, new Flight104, new Flight104);
	FlightFactory::getInstance()->registerFlight(106, new Flight106, new Flight106);
	FlightFactory::getInstance()->registerFlight(108, new Flight108, new Flight108);
}'
);

echo ($code);
?>