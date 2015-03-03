<h1>airlineSystem.cpp</h1>
<?php
$code = str_replace('<','&lt;','
#include "airlineSystem.h"
#include "flightFactory.h"
#include "passenger.h"
#include <iomanip>
#include <algorithm>
#include <iostream>
#include <sstream>
#include <vector>
using namespace std;

//***************************************************
// Constructor: initializes the pointer classes.	*
//***************************************************
AirlineSystem::AirlineSystem()
{
	seat = new Seat("0");
	menu = new Menu();
	reserve = new Reservation();
	loadPassengerTickets();		// Loads all the passenger\'s tickets.
}

//***************
// Destructor.	*
//***************
AirlineSystem::~AirlineSystem()
{
	delete menu;
	delete reserve;
}

//*******************************************
// Displays the main menu and gets option.	*
//*******************************************
int AirlineSystem::mainMenu()
{
	
	return menu->mainMenu();
}

//***********************
// Reserves a flight.	*
//***********************
void AirlineSystem::reservation()
{
	bool correctReservation;		// Boolean for entered correctly information.
	bool finish = false;		// Finished with the loop.
	
	reserve->nameOfPassenger();		// Enters the name of the passenger.
	reserve->displayScheldule();		// Displays the destinations.
	reserve->stateFrom();		// Gets the state from.
	do
	{		
		reserve->stateTo();		// Gets the state to.
		reserve->deaprtTime();		// Gets the depart time.
		reserve->arrivalTime();		// Gets the arrival time.
		finish = reserve->correctReservation(correctReservation);		// Checks if reservation is correct.

		if (correctReservation == true)
		{
			seat = new Seat(reserve->getFlightNumber());		// Creates a seat reservation for passenger.
			seat->availableSeat();		// Displays the available seats.

			if (seat->findFullSeat() != true)		// Checks if seats are full.
			{
				seat->setSeatNumber();		// Sets the seat number.
				seat->reserveSeat(reserve->getFlightNumber());		// Reserves a seat in aircraft.
				seat->saveSeatToFile();		// Saves seats to file.
				seat->availableSeat();		// Displays the available seats.
				system("pause");
			
				passenger = new Passenger(reserve->getName(),reserve->getFrom(),reserve->getTo(),	// Creates a new passenger object.
					reserve->getDeparture(),reserve->getArrival(),reserve->getFlightNumber(),
					reserve->getFlyerPoints(), reserve->getAircraft(),seat->getSeatNumber());
			
				passengers[passenger->getIdNumber()] = passenger;		// Registers the passenger in the list.

				displayBoardingPass(passengers);		// Displays the boarding pass.
				reserve->resetFlightNumber("");		// Resets the flight number for full seats.
				system("pause");
			}

			else
			{
				system("cls");
				cout<<"\t\tSORRY! AIRCRAFT IS FULL\n\tCHOSSE ANOTHER FLIGHT!\n"<<endl;
				system("pause");	
				reserve->updatedFullFlight();
				finish = false;
			}

		}

		else
		{
			reserve->resetFlightNumber("");		// Resets the flight number for full seats.
		}


	}while(finish != true);
}



//***********************************************
// Loads the passenger\'s tickets from the file.	*
//***********************************************
void AirlineSystem::loadPassengerTickets()
{
	fstream passengerFile;
	int tempIntergerIdnumber;		// Integer id number.
	string tempIdNumber;		// Passenger id number.
	string tempName;		// Name of passenger.
	string tempFrom;		// Departure from.
	string tempTo;		// Departure to.
	string tempDepartTime;		// Departure time.
	string tempArrivalTime;		// Arrival time.
	string tempFlightNumber;		// Flight number.
	string tempAircraft;		// Aircraft type.
	string tempFlyerPoints;		// Frequent flyer points.
	string tempSeatNumber;		// Seat number.
	string tempNewLine;		// New line.
	Passenger* ticketPass;

	passengerFile.open("passengerFile.txt", ios::in);		// Opens the file.

	if (passengerFile)
	{
		while (passengerFile)		// Gets all the data from each ticket.
		{
			getline(passengerFile, tempName, "$");

			if (tempName == "")
			{
				break;
			}

			else
			{
				getline(passengerFile, tempFrom, "$");
				getline(passengerFile, tempTo, "$");
				getline(passengerFile, tempDepartTime, "$");
				getline(passengerFile, tempArrivalTime, "$");
				getline(passengerFile, tempFlightNumber, "$");
				getline(passengerFile, tempFlyerPoints, "$");
				getline(passengerFile, tempAircraft, "$");
				getline(passengerFile, tempSeatNumber, "$");
				getline(passengerFile, tempIdNumber, "$");
			
				tempIntergerIdnumber = atoi(tempIdNumber.c_str());		// Converts string to integer.
				getline(passengerFile, tempNewLine, "$");

				ticketPass = new Passenger(tempName, tempFrom, tempTo, tempDepartTime, tempArrivalTime, tempFlightNumber, tempFlyerPoints, tempAircraft, tempSeatNumber);

				ticketPass->setIdNumber(tempIntergerIdnumber);		// Sets the id number.

				passengers[tempIntergerIdnumber] = ticketPass;		// Registers the passenger in the list.
			}
		}
	}

	else 
	{
		cout<<"ERROR130: Cannot open file."<<endl;
	}


	passengerFile.close();		// Closese the file.
}


//***************************************
// Displays all the boarding passes.	*
//***************************************
void AirlineSystem::displayAllBoardingPasses()
{
	system("cls");
	map<int, Passenger*>::iterator iter;

	for (iter = passengers.begin(); iter != passengers.end(); iter++)
	{
		cout<<"\t\tBOARDING PASS\n"
			"*************************************************************\n"
			"\tNAME: "<<iter->second->getName()<<"\n"
			"\tID NUMBER: "<<iter->second->getIdNumber()<<"\n"
			"\tSEAT NUMBER: "<<iter->second->getSeatNumber()<<"\n"
			"*************************************************************\n"
			"FROM   TO   DEPART   ARRIVAL   FLIGHT   AIRCRAFT   FREQUENT\n"
			"             TIME     TIME     NUMBER    NUMBER     FLYER\n"<<endl;

		cout<<iter->second->getFrom()<<"    "<<iter->second->getTo()<<"   "
			<<iter->second->getdepartTime()<<"     "<<iter->second->getArrivalTime()<<"     "
			<<iter->second->getflightNumber()<<"        "<<iter->second->getAircraft()<<"        "
			<<iter->second->getFlyerPoints()<<"\n"<<endl;
	}

	system("pause");
}

//***************************
// Cancels a reservation.	*
//***************************
void AirlineSystem::cancelReservation()
{
	int idNum;

	do 
	{
		system("cls");
		cout<<"*************************************************************\n"
			"\t\tCANCEL RESERVATIONA\n"
			"*************************************************************\n"
			"To cancel a reservation please enter the id number of boarding pass\n"
			"or enter 0 to exit from this menu...\n\n"<<endl;

		cout<<"Please enter the boarding pass id number: ";
		while(!(cin>>idNum))			// Validate for not interger entered.
		{
			cout<<"\tSorry! Invalid input..."<<endl;
			cin.clear();
			cin.ignore(1000,\'\n\');
			cout<<"Please re-enter the boarding pass id number: ";
		}

		if (idNum != 0)
		{
			map<int,Passenger*>::iterator iter;

			map<int,Passenger*> ticket;
			ticket = getTickets();

			for (iter = ticket.begin(); iter != ticket.end();iter++)
			{
				if (iter->second->getIdNumber() == idNum)
				{
					seat->removeOccupySeat(iter->second->getflightNumber(), iter->second->getSeatNumber());		// Removes the seats from the aircraft.
					seat->saveSeatToFile();		// Saves the removed seat.
					passengers.erase(idNum);		// Erases the passenger\'s ticket.
					cout<<"\n\nBoarding Pass - ID NUMBER : "<<idNum<<" was removed from system..."<<endl;
					system("pause");
					idNum = 0;
				}
			}
			
			if (idNum != 0)
			{
				cout<<"Sorry! Not valid id number..."<<endl;
				system("pause");
			}
			
		}

	}while (idNum != 0);

}

//***********************************
// Displays a single boarding pass.	*
//***********************************
void AirlineSystem::displaySinglePass()
{
	system("cls");
	int tempIdNumber;		// Input id number.
	string tempName;		// Input name.
	bool pass = false;		// True if id number and name found.
	map<int,Passenger*>::iterator iter;

	map<int,Passenger*> ticket;
	ticket = getTickets();

	cout<<"\n\nPlease enter the name of passenger: ";
	cin>>tempName;

	cout<<"Please enter the id number: ";
	
	while (!(cin>>tempIdNumber))		// Validates the input for id number.
	{
		cout<<"\tSorry! Invalid input..."<<endl;
		cin.clear();
		cin.ignore(1000,\'\n\');
		cout<<"Please re-enter the id number: ";
	}

	for (iter = ticket.begin(); iter != ticket.end();iter++)
	{
		if (iter->second->getIdNumber() == tempIdNumber && iter->second->getName() == tempName)
		{
			system("cls");
			cout<<"\t\tBOARDING PASS\n"
				"*************************************************************\n"
				"\tNAME: "<<iter->second->getName()<<"\n"
				"\tID NUMBER: "<<iter->second->getIdNumber()<<"\n"
				"\tSEAT NUMBER: "<<iter->second->getSeatNumber()<<"\n"
				"*************************************************************\n"
				"FROM   TO   DEPART   ARRIVAL   FLIGHT   AIRCRAFT   FREQUENT\n"
				"             TIME     TIME     NUMBER    NUMBER     FLYER\n"<<endl;

			cout<<iter->second->getFrom()<<"    "<<iter->second->getTo()<<"   "
				<<iter->second->getdepartTime()<<"     "<<iter->second->getArrivalTime()<<"     "
				<<iter->second->getflightNumber()<<"        "<<iter->second->getAircraft()<<"        "
				<<iter->second->getFlyerPoints()<<endl;
			system("pause");

			pass = true;
		}
	}

	if (!pass)
	{
		cout<<"\n\n\tName and id number combination not found in system!"<<endl;
		system("pause");
	}

}


//*******************************
// Displays the boarding pass.	*
//*******************************
void AirlineSystem::displayBoardingPass(map<int,Passenger*> passengerTicket)
{
	system("cls");
	cout<<"\t\tBOARDING PASS\n"
		"*************************************************************\n"
		"\tNAME: "<<passengerTicket[passenger->getIdNumber()]->getName()<<"\n"
		"\tID NUMBER: "<<passengerTicket[passenger->getIdNumber()]->getIdNumber()<<"\n"
		"\tSEAT NUMBER: "<<passengerTicket[passenger->getIdNumber()]->getSeatNumber()<<"\n"
		"*************************************************************\n"
		"FROM   TO   DEPART   ARRIVAL   FLIGHT   AIRCRAFT   FREQUENT\n"
		"             TIME     TIME     NUMBER    NUMBER     FLYER\n"<<endl;

	cout<<passengerTicket[passenger->getIdNumber()]->getFrom()<<"    "<<passengerTicket[passenger->getIdNumber()]->getTo()<<"   "
		<<passengerTicket[passenger->getIdNumber()]->getdepartTime()<<"     "<<passengerTicket[passenger->getIdNumber()]->getArrivalTime()<<"     "
		<<passengerTicket[passenger->getIdNumber()]->getflightNumber()<<"        "<<passengerTicket[passenger->getIdNumber()]->getAircraft()<<"        "
		<<passengerTicket[passenger->getIdNumber()]->getFlyerPoints()<<endl;
	
}

//*******************************
// Adds the cities to a vector.	*
//*******************************
void AirlineSystem::addCities()
{
	cities.push_back("HAWAII           ");
	cities.push_back("NEW YORK         ");
	cities.push_back("DALLAS/FORT WORTH");
	cities.push_back("CHICAGO          ");
	cities.push_back("ORLANDO          ");
	cities.push_back("ATLANTA          ");
	cities.push_back("LOS ANGELES      ");
}

//*******************************
// Adds the codes to a vector.	*
//*******************************
void AirlineSystem::addCodes()	
{
	codes.push_back("HAW");
	codes.push_back("NYC");
	codes.push_back("DFW");
	codes.push_back("CHI");
	codes.push_back("ORL");
	codes.push_back("ATL");
	codes.push_back("LAX");
}

//***************************************
// Dispalys the cities name and code.	*
//***************************************
void AirlineSystem::displayCityCodes()
{
	system("cls");
	cout<<"*************************************************************\n"
		"\t\tCITIES FLIGHTS\n"
		"*************************************************************"<<endl;

	for (int count = 0; count < cities.size();count++)
	{
		cout<<setw(18)<<cities[count]<<setw(18)<<codes[count]<<endl;
	}

	cout<<endl;
}

//***********************************
//Sort the city by name or code.	*						
//***********************************
void AirlineSystem::sortFlightCities()
{
	int optionSort;

	do
	{
		addCities();		// Adds the cities to a vector.
		addCodes();		// Adds the codes to a vector.
		
		displayCityCodes();			// Dispalys the cities name and code.
	
		cout<<"\n\n\t\tSORT BY\n"
			"\t\t1 - CITY NAME\n"
			"\t\t2 - CITY CODE\n"
			"\t\t3 - EXIT\n"<<endl;
		cout<<"Please enter your option: ";
	
		while (true)
		{
			while(!(cin>>optionSort))
			{
				cout<<"\tSorry! Invalid input..."<<endl;
				cin.clear();
				cin.ignore(1000,\'\n\');
				cout<<"Please re-enter your option: ";
			}

			if (optionSort > 0 && optionSort <= 3)
			{
				switch (optionSort)		// Sorts by name or code.
				{
				case 1: sortCity(1);	// Name.
						break;
				case 2: sortCity(2);	// Code.
						break;
				}

				break;
			}

			else
			{
				cout<<"\tSorry! Invalid input..."<<endl;
				cout<<"Please re-enter your option: ";
			}

		}

		cities.clear();		// Clears the cities name.
		codes.clear();		// Clears the cities code.

	}while (optionSort != 3);

	
}

//*******************
// Sorts the city.	*
//*******************
void AirlineSystem::sortCity(int feild)
{
	switch (feild)
	{
	case 1: 
		sort(cities.begin(), cities.end(),AirlineSystem::sortWayCities);
		sort(codes.begin(), codes.end(),AirlineSystem::sortWayCities);

		system("cls");
		cout<<"*************************************************************\n"
			"\t\tCITIES FLIGHTS\n"
			"*************************************************************"<<endl;

		for (int count = 0; count < cities.size();count++)
		{
			cout<<cities[count]<<setw(25)<<codes[count]<<endl;
		}

		cout<<endl;
			break;
	case 2: 
		sort(cities.begin(), cities.end(),AirlineSystem::sortWayCities);
		sort(codes.begin(), codes.end(),AirlineSystem::sortWayCities);

		system("cls");
		cout<<"*************************************************************\n"
			"\t\tCITIES FLIGHTS\n"
			"*************************************************************"<<endl;

		for (int count = 0; count < cities.size();count++)
		{
			cout<<codes[count]<<setw(25)<<cities[count]<<endl;
		}

		cout<<endl;
			break;
	}

	system("pause");
}

//***********************************
// Displays sorted flight schedule.	*
//***********************************
void AirlineSystem::sortFlightSchedule()
{
	int optionSort;

	do
	{
		dislpaySchedule("FLIGHT SCHEDULE");

		cout<<"\n\n\t\tSORT BY\n"
			"\t\t1 - FROM\n"
			"\t\t2 - TO\n"
			"\t\t3 - DEPART TIME\n"
			"\t\t4 - ARRIVAL TIME\n"
			"\t\t5 - FLIGHT NUMBER\n"
			"\t\t6 - AIRCRAFT\n"
			"\t\t7 - FREQUENT FLYER\n"
			"\t\t8 - EXIT\n"<<endl;
		cout<<"Please enter your option: ";
	
		while (true)
		{
			while(!(cin>>optionSort))
			{
				cout<<"\tSorry! Invalid input..."<<endl;
				cin.clear();
				cin.ignore(1000,\'\n\');
				cout<<"Please re-enter your option: ";
			}

			if (optionSort > 0 && optionSort <= 8)
			{
				switch (optionSort)		// Sorts by fields.
				{
				case 1: sortField(1);	// From.
						break;
				case 2: sortField(2);	// To.
						break;
				case 3: sortField(3);	// Depart time.
						break;
				case 4: sortField(4);	// Arrival time.
						break;
				case 5: sortField(5);	// Flight Number.
						break;
				case 6: sortField(6);	// Aircraft.
						break;
				case 7: sortField(7);	// Frequent flyer.
						break;
				}

				break;
			}

			else
			{
				cout<<"\tSorry! Invalid input..."<<endl;
				cout<<"Please re-enter your option: ";
			}

		}
	}while (optionSort != 8);

}

//***************************************
// Sorts the flight schedule by field.	*
//***************************************
void AirlineSystem::sortField(int field)
{
	FlightFactory *flightFact = FlightFactory::getInstance();
	vector<BaseFlight*> listFlights;
	vector<BaseFlight*> temp;

	listFlights = flightFact->getVectorFlights();

	switch (field)
	{
	case 1:			// Sorts and displays the from destination.
		sort(listFlights.begin(), listFlights.end(),AirlineSystem::sortWayFrom);

		system("cls");
		cout<<"*************************************************************\n"
			"\t\tFLIGHT SCHEDULE\n"
			"*************************************************************\n"
			"FROM   TO   DEPART   ARRIVAL   FLIGHT   AIRCRAFT   FREQUENT\n"
			"             TIME     TIME     NUMBER     TYPE     FLYER\n"<<endl;

		for (int count = listFlights.size()-1; count >= 0 ();count--)
		{
			cout<<setw(3)<<listFlights[count]->getFrom()<<setw(7)<<listFlights[count]->getTo()<<setw(7)<<listFlights[count]->getDepart()<<setw(9)<<listFlights[count]->getArrival()<<setw(10)
				<<listFlights[count]->getFlightNumber()<<setw(8)<<listFlights[count]->getAircarftType()<<setw(13)<<listFlights[count]->getFlyerPoints()<<endl;
		}

		break;

	case 2:			// Sorts and displays the to destination.
		sort(listFlights.begin(), listFlights.end(),AirlineSystem::sortWayTo);

		system("cls");
		cout<<"*************************************************************\n"
			"\t\tFLIGHT SCHEDULE\n"
			"*************************************************************\n"
			"FROM   TO   DEPART   ARRIVAL   FLIGHT   AIRCRAFT   FREQUENT\n"
			"             TIME     TIME     NUMBER     TYPE     FLYER\n"<<endl;

		for (int count = listFlights.size()-1; count >= 0 ();count--)
		{
			cout<<setw(3)<<listFlights[count]->getFrom()<<setw(7)<<listFlights[count]->getTo()<<setw(7)<<listFlights[count]->getDepart()<<setw(9)<<listFlights[count]->getArrival()<<setw(10)
				<<listFlights[count]->getFlightNumber()<<setw(8)<<listFlights[count]->getAircarftType()<<setw(13)<<listFlights[count]->getFlyerPoints()<<endl;
		}

		break;
	case 3:			// Sorts and displays the depart time destination.
		sort(listFlights.begin(), listFlights.end(),AirlineSystem::sortWayDepart);

		system("cls");
		cout<<"*************************************************************\n"
			"\t\tFLIGHT SCHEDULE\n"
			"*************************************************************\n"
			"FROM   TO   DEPART   ARRIVAL   FLIGHT   AIRCRAFT   FREQUENT\n"
			"             TIME     TIME     NUMBER     TYPE     FLYER\n"<<endl;

		for (int count = listFlights.size()-1; count >= 0 ();count--)
		{
			cout<<setw(3)<<listFlights[count]->getFrom()<<setw(7)<<listFlights[count]->getTo()<<setw(7)<<listFlights[count]->getDepart()<<setw(9)<<listFlights[count]->getArrival()<<setw(10)
				<<listFlights[count]->getFlightNumber()<<setw(8)<<listFlights[count]->getAircarftType()<<setw(13)<<listFlights[count]->getFlyerPoints()<<endl;
		}

		break;
	case 4:			// Sorts and displays the arrival time destination.
		sort(listFlights.begin(), listFlights.end(),AirlineSystem::sortWayArrival);

		system("cls");
		cout<<"*************************************************************\n"
			"\t\tFLIGHT SCHEDULE\n"
			"*************************************************************\n"
			"FROM   TO   DEPART   ARRIVAL   FLIGHT   AIRCRAFT   FREQUENT\n"
			"             TIME     TIME     NUMBER     TYPE     FLYER\n"<<endl;

		for (int count = listFlights.size()-1; count >= 0 ();count--)
		{
			cout<<setw(3)<<listFlights[count]->getFrom()<<setw(7)<<listFlights[count]->getTo()<<setw(7)<<listFlights[count]->getDepart()<<setw(9)<<listFlights[count]->getArrival()<<setw(10)
				<<listFlights[count]->getFlightNumber()<<setw(8)<<listFlights[count]->getAircarftType()<<setw(13)<<listFlights[count]->getFlyerPoints()<<endl;
		}

		break;
	case 5:			// Sorts and displays the flight number.
		sort(listFlights.begin(), listFlights.end(),AirlineSystem::sortWayFlightNumber);

		system("cls");
		cout<<"*************************************************************\n"
			"\t\tFLIGHT SCHEDULE\n"
			"*************************************************************\n"
			"FROM   TO   DEPART   ARRIVAL   FLIGHT   AIRCRAFT   FREQUENT\n"
			"             TIME     TIME     NUMBER     TYPE     FLYER\n"<<endl;

		for (int count = listFlights.size()-1; count >= 0 ();count--)
		{
			cout<<setw(3)<<listFlights[count]->getFrom()<<setw(7)<<listFlights[count]->getTo()<<setw(7)<<listFlights[count]->getDepart()<<setw(9)<<listFlights[count]->getArrival()<<setw(10)
				<<listFlights[count]->getFlightNumber()<<setw(8)<<listFlights[count]->getAircarftType()<<setw(13)<<listFlights[count]->getFlyerPoints()<<endl;
		}

		break;
	case 6:			// Sorts and displays the aircraft type.
		sort(listFlights.begin(), listFlights.end(),AirlineSystem::sortWayAircraft);

		system("cls");
		cout<<"*************************************************************\n"
			"\t\tFLIGHT SCHEDULE\n"
			"*************************************************************\n"
			"FROM   TO   DEPART   ARRIVAL   FLIGHT   AIRCRAFT   FREQUENT\n"
			"             TIME     TIME     NUMBER     TYPE     FLYER\n"<<endl;

		for (int count = listFlights.size()-1; count >= 0 ();count--)
		{
			cout<<setw(3)<<listFlights[count]->getFrom()<<setw(7)<<listFlights[count]->getTo()<<setw(7)<<listFlights[count]->getDepart()<<setw(9)<<listFlights[count]->getArrival()<<setw(10)
				<<listFlights[count]->getFlightNumber()<<setw(8)<<listFlights[count]->getAircarftType()<<setw(13)<<listFlights[count]->getFlyerPoints()<<endl;
		}

		break;
	case 7:			// Sorts and displays the frequent flyer points.
		sort(listFlights.begin(), listFlights.end(),AirlineSystem::sortWayFlyerPoints);

		system("cls");
		cout<<"*************************************************************\n"
			"\t\tFLIGHT SCHEDULE\n"
			"*************************************************************\n"
			"FROM   TO   DEPART   ARRIVAL   FLIGHT   AIRCRAFT   FREQUENT\n"
			"             TIME     TIME     NUMBER     TYPE     FLYER\n"<<endl;

		for (int count = 0; count < listFlights.size();count++)
		{
			cout<<setw(3)<<listFlights[count]->getFrom()<<setw(7)<<listFlights[count]->getTo()<<setw(7)<<listFlights[count]->getDepart()<<setw(9)<<listFlights[count]->getArrival()<<setw(10)
				<<listFlights[count]->getFlightNumber()<<setw(8)<<listFlights[count]->getAircarftType()<<setw(13)<<listFlights[count]->getFlyerPoints()<<endl;
		}

		break;
	}

	system("pause");
}

//***********************
// Saves to the file.	*
//***********************
void AirlineSystem::saveToFile()		
{
	fstream passengerFile;		// To use the file output.	

	map<int,Passenger*>::iterator iter;

	passengerFile.open("passengerFile.txt", ios::out);		// Opens the file to the seats.

	map<int,Passenger*> ticket;
	ticket = getTickets();

	for (iter = ticket.begin(); iter != ticket.end();iter++)
	{
		passengerFile<<(iter->second->getName())+"$";
		passengerFile<<(iter->second->getFrom())+"$";
		passengerFile<<(iter->second->getTo())+"$";
		passengerFile<<(iter->second->getdepartTime())+"$";
		passengerFile<<(iter->second->getArrivalTime())+"$";
		passengerFile<<(iter->second->getflightNumber())+"$";
		passengerFile<<(iter->second->getFlyerPoints())+"$";
		passengerFile<<(iter->second->getAircraft())+"$";
		passengerFile<<(iter->second->getSeatNumber())+"$";

		ostringstream convert;
		convert<<iter->second->getIdNumber();		// ZConverts the int to a string.

		passengerFile<<(convert.str())+"$\n$";
	}

	passengerFile.close();

}

//***************************************
// Displays the schedule for flights.	*
//***************************************
void AirlineSystem::dislpaySchedule(string name)
{
	FlightFactory *flightFact = FlightFactory::getInstance();
	map<int, BaseFlight*>::iterator iter;

	map<int, BaseFlight*> flights;		// Temp map list that holds the flights.
	flights = flightFact->getFlights();		// Gets all the flight in map.

	system("cls");
	cout<<"*************************************************************\n"
		"\t\t"<<name<<"\n"
		"*************************************************************\n"
		"FROM   TO   DEPART   ARRIVAL   FLIGHT   AIRCRAFT   FREQUENT\n"
		"             TIME     TIME     NUMBER     TYPE     FLYER\n"<<endl;

	for (iter = flights.begin(); iter != flights.end(); iter++)
	{
		cout<<setw(3)<<iter->second->getFrom()<<setw(7)<<iter->second->getTo()<<setw(7)<<iter->second->getDepart()<<setw(9)<<iter->second->getArrival()<<setw(10)
			<<iter->second->getFlightNumber()<<setw(8)<<iter->second->getAircarftType()<<setw(13)<<iter->second->getFlyerPoints()<<endl;
	}

}

//***************************************************
// Updates the schedule for each entry entered.		*
//***************************************************
void AirlineSystem::updateScheduleFrom(string from, string name, string fullFlight)
{
	FlightFactory *flightFact = FlightFactory::getInstance();
	map<int, BaseFlight*>::iterator iter;

	map<int, BaseFlight*> flights;		// Temp map list that holds the flights.
	flights = flightFact->getFlights();		// Gets all the flight in map.

	system("cls");
	cout<<"*************************************************************\n"
		"\t\t"<<name<<"\n"
		"*************************************************************\n"
		"FROM   TO   DEPART   ARRIVAL   FLIGHT   AIRCRAFT   FREQUENT\n"
		"             TIME     TIME     NUMBER     TYPE     FLYER\n"<<endl;

	for (iter = flights.begin(); iter != flights.end(); iter++)
	{
		if (from == iter->second->getFrom() && fullFlight != iter->second->getFlightNumber())
		{
			cout<<setw(3)<<iter->second->getFrom()<<setw(7)<<iter->second->getTo()<<setw(7)<<iter->second->getDepart()<<setw(9)<<iter->second->getArrival()<<setw(10)
				<<iter->second->getFlightNumber()<<setw(8)<<iter->second->getAircarftType()<<setw(13)<<iter->second->getFlyerPoints()<<endl;
		}
	}
}

//***************************************************************
// Updates the schedule for each entry entered to destination.	*
//***************************************************************
void AirlineSystem::updateScheduleTo(string from, string to, string name, string fullFlight)
{
	FlightFactory *flightFact = FlightFactory::getInstance();
	map<int, BaseFlight*>::iterator iter;

	map<int, BaseFlight*> flights;		// Temp map list that holds the flights.
	flights = flightFact->getFlights();		// Gets all the flight in map.

	system("cls");
	cout<<"*************************************************************\n"
		"\t\t"<<name<<"\n"
		"*************************************************************\n"
		"FROM   TO   DEPART   ARRIVAL   FLIGHT   AIRCRAFT   FREQUENT\n"
		"             TIME     TIME     NUMBER     TYPE     FLYER\n"<<endl;

	for (iter = flights.begin(); iter != flights.end(); iter++)
	{
		if (from == iter->second->getFrom() && to == iter->second->getTo() && fullFlight != iter->second->getFlightNumber())
		{
			cout<<setw(3)<<iter->second->getFrom()<<setw(7)<<iter->second->getTo()<<setw(7)<<iter->second->getDepart()<<setw(9)<<iter->second->getArrival()<<setw(10)
				<<iter->second->getFlightNumber()<<setw(8)<<iter->second->getAircarftType()<<setw(13)<<iter->second->getFlyerPoints()<<endl;
		}
	}
}

//***************************************************
// Updates the schedule from the departure time.	*
//***************************************************
void AirlineSystem::updateScheduleDeparture(string from, string to, string depart, string name, string fullFlight)
{
	FlightFactory *flightFact = FlightFactory::getInstance();
	map<int, BaseFlight*>::iterator iter;

	map<int, BaseFlight*> flights;		// Temp map list that holds the flights.
	flights = flightFact->getFlights();		// Gets all the flight in map.

	system("cls");
	cout<<"*************************************************************\n"
		"\t\t"<<name<<"\n"
		"*************************************************************\n"
		"FROM   TO   DEPART   ARRIVAL   FLIGHT   AIRCRAFT   FREQUENT\n"
		"             TIME     TIME     NUMBER     TYPE     FLYER\n"<<endl;

	for (iter = flights.begin(); iter != flights.end(); iter++)
	{
		if (from == iter->second->getFrom() && to == iter->second->getTo() && fullFlight != iter->second->getFlightNumber())
		{
			if (depart == iter->second->getDepart())
			{
				cout<<setw(3)<<iter->second->getFrom()<<setw(7)<<iter->second->getTo()<<setw(7)<<iter->second->getDepart()<<setw(9)<<iter->second->getArrival()<<setw(10)
					<<iter->second->getFlightNumber()<<setw(8)<<iter->second->getAircarftType()<<setw(13)<<iter->second->getFlyerPoints()<<endl;
			}
		}
	}
}

//***************************************************************
// Updates the final schedule to show results of reservation.	*
//***************************************************************
string AirlineSystem::updateScheduleFinal(string from, string to, string depart, string arrival, string name, string fullFlight)
{
	FlightFactory *flightFact = FlightFactory::getInstance();
	map<int, BaseFlight*>::iterator iter;

	map<int, BaseFlight*> flights;		// Temp map list that holds the flights.
	flights = flightFact->getFlights();		// Gets all the flight in map.

	system("cls");


	cout<<"*************************************************************\n"
		"\t\t"<<name<<"\n"
		"*************************************************************\n"
		"FROM   TO   DEPART   ARRIVAL   FLIGHT   AIRCRAFT   FREQUENT\n"
		"             TIME     TIME     NUMBER     TYPE     FLYER\n"<<endl;

	for (iter = flights.begin(); iter != flights.end(); iter++)
	{
		if (from == iter->second->getFrom() && to == iter->second->getTo() && fullFlight != iter->second->getFlightNumber())
		{
			if (depart == iter->second->getDepart() && arrival == iter->second->getArrival())
			{
				cout<<setw(3)<<iter->second->getFrom()<<setw(7)<<iter->second->getTo()<<setw(7)<<iter->second->getDepart()<<setw(9)<<iter->second->getArrival()<<setw(10)
					<<iter->second->getFlightNumber()<<setw(8)<<iter->second->getAircarftType()<<setw(13)<<iter->second->getFlyerPoints()<<endl;
				
				return iter->second->getFlightNumber();
			}
		}
	}

	cout<<"ERROR120: Not Valid Value"<<endl;
	return "Not Valid Value";
}
		
//***********************************
// Gets the frequent flyer points.	*
//***********************************
string AirlineSystem::getFlyerPoints(string from, string to, string depart, string arrival)
{
	FlightFactory *flightFact = FlightFactory::getInstance();
	map<int, BaseFlight*>::iterator iter;

	map<int, BaseFlight*> flights;		// Temp map list that holds the flights.
	flights = flightFact->getFlights();		// Gets all the flight in map.

	for (iter = flights.begin(); iter != flights.end(); iter++)
	{
		if (from == iter->second->getFrom() && to == iter->second->getTo())
		{
			if (depart == iter->second->getDepart() && arrival == iter->second->getArrival())
			{
				return iter->second->getFlyerPoints();
			}
		}
	}

	cout<<"ERROR120: Not Valid Value"<<endl;
	return "Not Valid Value";
}

//*******************************
// Gets the aircraft type.		*
//*******************************
string AirlineSystem::getAircraft(string from, string to, string depart, string arrival)
{
	FlightFactory *flightFact = FlightFactory::getInstance();
	map<int, BaseFlight*>::iterator iter;

	map<int, BaseFlight*> flights;		// Temp map list that holds the flights.
	flights = flightFact->getFlights();		// Gets all the flight in map.

	for (iter = flights.begin(); iter != flights.end(); iter++)
	{
		if (from == iter->second->getFrom() && to == iter->second->getTo())
		{
			if (depart == iter->second->getDepart() && arrival == iter->second->getArrival())
			{
				return iter->second->getAircarftType();
			}
		}
	}

	cout<<"ERROR120: Not Valid Value"<<endl;
	return "Not Valid Value";
}
');

echo ($code);
?>