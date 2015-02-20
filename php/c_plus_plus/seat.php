<h1>seat.cpp</h1>
#include "seat.h"
#include &lt;iostream&gt;
#include &lt;iterator&gt;
#include &lt;fstream&gt;
#include &lt;string&gt;
using namespace std;

//***********************************
// Constructor: Creates all seats.	*
//***********************************
Seat::Seat(string flight)
{
	fstream seatFile;		// To use the file input.	
	string tempFlight;		// Temp variable for flight number.
	string tempAircraft;		// Temp variable for aircraft type.
	string tempSeat;		// Temp variable for each seats in aircraft.

	seatFile.open("seatFile.txt", ios::in);		// Opens the file for the seats of aircrafts.
	
	if (seatFile)		// If file opens.
	{
		while(seatFile)		// While the not end of file.
		{
			getline(seatFile,tempFlight,':');		// Gets the flight number from file.
			flightSeats.push_back(tempFlight+':');		// Adds flight number to the flight seat list.

			if (tempFlight == "$")
			{
				break;
			}
			
			if (tempFlight == flight)
			{
				getline(seatFile,tempAircraft,':');		// Gets the aircraft type from file.
				aircraftType = tempAircraft;		// Sets the aircraft type.
				flightSeats.push_back(aircraftType+':');		// Adds aircraft type to the flight seat list.
				
				if (tempAircraft == "A")
				{
					for(int count = 0; count &lt; 20; count++)
					{
						if (count == 19)
						{
							getline(seatFile,tempSeat,':');		// Gets all the seats from aricraft A.
							seatA.push_back(tempSeat);		// Adds the seat to the seat list.
							flightSeats.push_back(tempSeat+":\n:");		// Adds the seat to the flight seat list.
							getline(seatFile,tempSeat,':');		// Gets the new line from file.
						}

						else
						{
							getline(seatFile,tempSeat,':');		// Gets all the seats from aricraft A.
							seatA.push_back(tempSeat);		// Adds the seat to the seat list.
							flightSeats.push_back(tempSeat+':');		// Adds the seat to the flight seat list.
						}
					}
				}

				else if (tempAircraft == "B")
				{
					for(int count = 0; count &lt; 15; count++)
					{
						if (count == 14)
						{
							getline(seatFile,tempSeat,':');		// Gets all the seats from aricraft A.
							seatB.push_back(tempSeat);		// Adds the seat to the seat list.
							flightSeats.push_back(tempSeat+":\n:");		// Adds the seat to the flight seat list.
							getline(seatFile,tempSeat,':');		// Gets the new line from file.
						}

						else
						{
							getline(seatFile,tempSeat,':');		// Gets all the seats from aricraft A.
							seatB.push_back(tempSeat);		// Adds the seat to the seat list.
							flightSeats.push_back(tempSeat+':');		// Adds the seat to the flight seat list.
						}
					}
				}

				else 
				{
					cout&lt;&lt;"ERROR101: Not correct aircraft type loaded."&lt;&lt;endl;
				}
			}

			else 
			{
				getline(seatFile,tempAircraft,':');		// Gets the aircraft type from file.
				flightSeats.push_back(tempAircraft+':');		// Adds aircraft type to the flight seat list.

				if (tempAircraft == "A")
				{
					for(int count = 0; count &lt; 20; count++)
					{
						if (count == 19)
						{
							getline(seatFile,tempSeat,':');		// Gets all the seats from aricraft.
							flightSeats.push_back(tempSeat+":\n:");		// Adds the seat to the flight seat list.
							getline(seatFile,tempSeat,':');		// Gets the new line from file.
						}

						else
						{
							getline(seatFile,tempSeat,':');		// Gets all the seats from aricraft.
							flightSeats.push_back(tempSeat+':');		// Adds the seat to the flight seat list.
						}
					}

				}

				else if (tempAircraft == "B")
				{
					for(int count = 0; count &lt; 15; count++)
					{
						if (count == 14)
						{
							getline(seatFile,tempSeat,':');		// Gets all the seats from aricraft.
							flightSeats.push_back(tempSeat+":\n:");		// Adds the seat to the flight seat list.
							getline(seatFile,tempSeat,':');		// Gets the new line from file.
						}

						else
						{
							getline(seatFile,tempSeat,':');		// Gets all the seats from aricraft.
							flightSeats.push_back(tempSeat+':');		// Adds the seat to the flight seat list.
						}
					}
				}

				else 
				{
					cout&lt;&lt;"ERROR102: Not correct aircraft type loaded."&lt;&lt;endl;
				}
			}

		}
	}

	else 
	{
		cout&lt;&lt;"ERROR103: Cannot open file."&lt;&lt;endl;
	}

	seatFile.close();		// Closes the file.
}

//***********************************
// Displays the available seats.	*
//***********************************
void Seat::availableSeat()
{
	system("cls");

	if (aircraftType == "A")
	{
		displaySeatA();
	}

	else if (aircraftType == "B")
	{
		displaySeatB();
	}

	else 
	{
		cout&lt;&lt;"ERROR104: Aircraft not available to display."&lt;&lt;endl;
	}
}

//***************************
// Gets the seat number.	*
//***************************
string Seat::getSeatNumber()
{
	return seatNumber;
}

//***************************
// Displays aircraft A.		*
//***************************
void Seat::displaySeatA()
{
	cout&lt;&lt;"   \n"
"	   	    _________		\n"
"	           /|||||||||\\	\n"
"	          /|||||||||||\\	\n"
"                 /|||||||||||||\\	\n"
"	        /|||||||||||||||\\		\n"
"               /|||||||||||||||||\\				\n"
"               |||||||||||||||||||					\n"
"               |||||||||||||||||||					\n"
"               |||||||||||||||||||					\n"
"             _||||||||||||||||||||_				\n"
"            ||||______DELTA_____|||||				\n"
"             \\|||"&lt;&lt;s(0,seatA)&lt;&lt;"|"&lt;&lt;s(1,seatA)&lt;&lt;"||||"&lt;&lt;s(2,seatA)&lt;&lt;"|"&lt;&lt;s(3,seatA)&lt;&lt;"||||/				\n"
"             /|||__|__||||__|__||||\\				\n"
"            /||||"&lt;&lt;s(4,seatA)&lt;&lt;"|"&lt;&lt;s(5,seatA)&lt;&lt;"||||"&lt;&lt;s(6,seatA)&lt;&lt;"|"&lt;&lt;s(7,seatA)&lt;&lt;"|||||\\				\n"
"           /|||||__|__||||__|__||||||\\			\n"
"          /||||||"&lt;&lt;s(8,seatA)&lt;&lt;"|"&lt;&lt;s(9,seatA)&lt;&lt;"||||"&lt;&lt;s(10,seatA)&lt;&lt;"|"&lt;&lt;s(11,seatA)&lt;&lt;"|||||||\\			\n"	
"        //|||||||__|__||||__|__|||||||\\\\			\n"
"       /|||||||||"&lt;&lt;s(12,seatA)&lt;&lt;"|"&lt;&lt;s(13,seatA)&lt;&lt;"||||"&lt;&lt;s(14,seatA)&lt;&lt;"|"&lt;&lt;s(15,seatA)&lt;&lt;"|||||||||\\			\n"
"      / |||||||||__|__||||__|__||||||||| \\		\n"	
"     / @|||||||||"&lt;&lt;s(16,seatA)&lt;&lt;"|"&lt;&lt;s(17,seatA)&lt;&lt;"||||"&lt;&lt;s(18,seatA)&lt;&lt;"|"&lt;&lt;s(19,seatA)&lt;&lt;"|||||||||@ \\		\n"
"    /  @|||||||||__|__||||__|__|||||||||@  \\		\n"
"   /   @||||||||||||||||||||||||||||||||@   \\		\n"
"  /    @||||||||||||||||||||||||||||||||@    \\	\n"
" |......___..\\\\\\\\\\\\\\\\\\\\  //////////..___......|	\n"
"    |__|----  \\_\\\\\\\\\\\\\\\\////////_/  ----|__|		\n"
"	            |_____|  |_____|					\n";
}

//***************************
// Displays aircraft B.		*
//***************************
void Seat::displaySeatB()
{
	cout&lt;&lt;"\n"
"		    _________				\n"
"		   /|||||||||\\			\n"
"		  /|||||||||||\\			\n"
"                 /|||||||||||||\\					\n"
"                /|||||||||||||||\\					\n"
"               /|||||||||||||||||\\				\n"
"               |||||||||||||||||||					\n"
"               |||||||||||||||||||					\n"
"               |||||||||||||||||||					\n"
"             _||||||||||||||||||||_				\n"
"            ||||______DELTA_____|||||				\n"
"             \\|||| "&lt;&lt;s(0,seatB)&lt;&lt;"|||| "&lt;&lt;s(1,seatB)&lt;&lt;"| "&lt;&lt;s(2,seatB)&lt;&lt;"||||/				\n"
"             /||||___||||___|___||||\\				\n"
"            /||||| "&lt;&lt;s(3,seatB)&lt;&lt;"|||| "&lt;&lt;s(4,seatB)&lt;&lt;"| "&lt;&lt;s(5,seatB)&lt;&lt;"|||||\\			\n"		
"           /||||||___||||___|___||||||\\			\n"
"          /||||||| "&lt;&lt;s(6,seatB)&lt;&lt;"|||| "&lt;&lt;s(7,seatB)&lt;&lt;"| "&lt;&lt;s(8,seatB)&lt;&lt;"|||||||\\			\n"
"        //||||||||___||||___|___|||||||\\\\		\n"
"       /|||||||||| "&lt;&lt;s(9,seatB)&lt;&lt;"|||| "&lt;&lt;s(10,seatB)&lt;&lt;"| "&lt;&lt;s(11,seatB)&lt;&lt;"|||||||||\\		\n"
"      / ||||||||||___||||___|___||||||||| \\		\n"
"     / @|||||||||| "&lt;&lt;s(12,seatB)&lt;&lt;"|||| "&lt;&lt;s(13,seatB)&lt;&lt;"| "&lt;&lt;s(14,seatB)&lt;&lt;"|||||||||@ \\		\n"
"    /  @||||||||||___||||___|___|||||||||@  \\		\n"
"   /   @|||||||||||||||||||||||||||||||||@   \\	\n"
"  /    @|||||||||||||||||||||||||||||||||@    \\	\n"
" |......___..\\\\\\\\\\\\\\\\\\\\  //////////..___......|	\n"
"    |__|----  \\_\\\\\\\\\\\\\\\\////////_/  ----|__|		\n"
"   	         |_____|  |_____|					\n";
}

//***********************************
// Returns the seat by subscript.	*
//***********************************
string Seat::s(int subscript, list&lt;string> seat)
{
	
	int count = 0;		// Holds a counter.
	list&lt;string>::iterator iter;		

	for (iter = seat.begin(); iter != seat.end(); iter++)
	{
		if(count == subscript)
		{
			return *iter;
		}

		count++;		// Adds a counter for each subscript.
	}
	
	return "Wrong Subcript";
}

//***********************************
// Reserves a seat in aircraft.		*
//***********************************
void Seat::reserveSeat(string flightNumber)
{
	

	if (aircraftType == "A")
	{
		occupySeat(seatA, flightNumber);		// Occupies a seat on the aircraft A.	&lt;- NEED TO ADD THE FLIGHT NUMBER FROM OTHER CLASS--------------------------------------------------
	}

	else if (aircraftType == "B")
	{
		occupySeat(seatB,flightNumber);		// Occupies a seat on the aircraft B.	&lt;- NEED TO ADD THE FLIGHT NUMBER FROM OTHER CLASS--------------------------------------------------
	}

	else 
	{
		cout&lt;&lt;"ERROR105: Not correct aircraft type in system."&lt;&lt;endl;
	}


}

//***************************************
// Occupies a seat on the aircraft.		*
//***************************************
void Seat::occupySeat(list&lt;string> AND seatType, string flight)
{
	list&lt;string>::iterator iter;
	
	for(iter = seatType.begin(); iter != seatType.end();iter++)
	{
		if (*iter == seatNumber)
		{
			*iter = "XX";		// Marks XX as occupied for seat.
		}
	}

	for(iter = flightSeats.begin(); iter != flightSeats.end();iter++)
	{
		if (*iter == (flight+':'))
		{
			while(true)
			{
				iter++;		// Traverse to the next iteration.
				if (*iter == (seatNumber+':') || *iter == (seatNumber+":\n:"))
				{
					if (*iter == (seatNumber+":\n:"))
					{
						*iter = "XX:\n:";		// Marks XX as occupied for seat with new line.
						break;
					}
			
					else 
					{
						*iter = "XX:";		// Marks XX as occupied for seat.
						break;
					}
				}
			}
		}
	}
}

//***************************
// Sets the seat number.	*
//***************************
void Seat::setSeatNumber()
{
	do
	{
		cout&lt;&lt;"\nPlease enter the seat number to reserve: ";
		cin>>seatNumber;

	}while(validateSeatNumber() != true);

	//&lt;-----------------------------------------------record seat number here or find somewhere to.
}

//*******************************
// Validats the seat number.	*
//*******************************
bool Seat::validateSeatNumber()
{


	if (aircraftType == "A")
	{
		if (findSeat(seatA) == true)	
		{
			return true;
		}

		else
		{
			cout&lt;&lt;"\t\tSorry! Invalid seat number input..."&lt;&lt;endl;
			return false;
		}
	}

	else if (aircraftType == "B")
	{
		if (findSeat(seatB) == true)	
		{
			return true;
		}

		else
		{
			cout&lt;&lt;"\t\tSorry! Invalid seat number input..."&lt;&lt;endl;
			return false;
		}	
	}

	else 
	{
		cout&lt;&lt;"ERROR106: Not correct aircraft type in system."&lt;&lt;endl;
		return false;
	}
}

//***********************************************************
// Finds the seat through the list of seats in aircraft.	*
//***********************************************************
bool Seat::findSeat(list&lt;string> seatType)
{
	list&lt;string>::iterator iter;
	
	for(iter = seatType.begin(); iter != seatType.end();iter++)
	{
		if (*iter == seatNumber)
		{
			return true;
		}
	}

	return false;
}

//*******************************
// Finds if flights are full.	*
//*******************************
bool Seat::findFullSeat()
{
	int count = 0;		// Number of XX.
	list&lt;string>::iterator iter;
	
	if (aircraftType == "A")
	{
		for(iter = seatA.begin(); iter != seatA.end();iter++)
		{
			if (*iter == "XX")
			{
				count++;
			}
		}

		if (count == 20)
		{
			return true;
		}

	return false;
	}

	else if (aircraftType == "B")
	{
		for(iter = seatB.begin(); iter != seatB.end();iter++)
		{
			if (*iter == "XX")
			{
				count++;
			}
		}

		if (count == 15)
		{
			return true;
		}

	return false;
	}

	else 
	{
		cout&lt;&lt;"ERROR106: Not correct aircraft type in system."&lt;endl;
		return false;
	}
}


//***********************************
// Saves the seats to the file.		*
//***********************************
void Seat::saveSeatToFile()
{
	fstream seatFile;		// To use the file output.	
	list&lt;string>::iterator iter;

	seatFile.open("seatFile.txt", ios::out);		// Opens the file to the seats.

	for (iter = flightSeats.begin(); iter != flightSeats.end(); iter++)
	{
		seatFile&lt;&lt;*iter;	// Adds all the updated seats to the file.
	}

	seatFile.close();		// Close the file.
}

//***************************
// Removes an occupy seat.	*
//***************************
void Seat::removeOccupySeat(string flight, string seatNumber)			
{
	list&lt;string>::iterator iter;

	for (iter = flightSeats.begin(); iter != flightSeats.end(); iter++)
	{
		if (*iter == (flight + ':'))
		{
			iter++;		// Traverse to the next iteration.
			if (*iter == "A:")
			{
				if (seatNumber[0] == '1')
				{	
					iter++;		// Traverse to the next iteration.
					if (seatNumber[1] == 'A')
					{
						if (*iter == "XX:")
						{
							*iter = "1A:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'B')
					{
						iter++;		// Traverse to the next iteration.
						if (*iter == "XX:")
						{
							*iter = "1B:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'C')
					{
						iter++;iter++;		// Traverse to the next 2 iteration.
						if (*iter == "XX:")
						{
							*iter = "1C:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'D')
					{
						iter++;iter++;iter++;		// Traverse to the next 3 iteration.
						if (*iter == "XX:")
						{
							*iter = "1D:\n:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else 
					{
						cout&lt;&lt;"ERROR108: Letter not found in char [array]."&lt;&lt;endl;
					}



				}

				else if (seatNumber[0] == '2')
				{
					iter++;iter++;iter++;iter++;iter++;		// Traverse to the next 5 iteration.
					if (seatNumber[1] == 'A')
					{
						if (*iter == "XX:")
						{
							*iter = "2A:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'B')
					{
						iter++;		// Traverse to the next iteration.
						if (*iter == "XX:")
						{
							*iter = "2B:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'C')
					{
						iter++;iter++;		// Traverse to the next 2 iteration.
						if (*iter == "XX:")
						{
							*iter = "2C:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'D')
					{
						iter++;iter++;iter++;		// Traverse to the next 3 iteration.
						if (*iter == "XX:")
						{
							*iter = "2D:\n:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else 
					{
						cout&lt;&lt;"ERROR108: Letter not found in char [array]."&lt;&lt;endl;
					}
				}

				else if (seatNumber[0] == '3')
				{
					iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;		// Traverse to the next 9 iteration.
					if (seatNumber[1] == 'A')
					{
						if (*iter == "XX:")
						{
							*iter = "3A:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'B')
					{
						iter++;		// Traverse to the next iteration.
						if (*iter == "XX:")
						{
							*iter = "3B:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'C')
					{
						iter++;iter++;		// Traverse to the next 2 iteration.
						if (*iter == "XX:")
						{
							*iter = "3C:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'D')
					{
						iter++;iter++;iter++;		// Traverse to the next 3 iteration.
						if (*iter == "XX:")
						{
							*iter = "3D:\n:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else 
					{
						cout&lt;&lt;"ERROR108: Letter not found in char [array]."&lt;&lt;endl;
					}
				}

				else if (seatNumber[0] == '4')
				{
					iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;		// Traverse to the next 13 iteration.
					if (seatNumber[1] == 'A')
					{
						if (*iter == "XX:")
						{
							*iter = "4A:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'B')
					{
						iter++;		// Traverse to the next iteration.
						if (*iter == "XX:")
						{
							*iter = "4B:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'C')
					{
						iter++;iter++;		// Traverse to the next 2 iteration.
						if (*iter == "XX:")
						{
							*iter = "4C:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'D')
					{
						iter++;iter++;iter++;		// Traverse to the next 3 iteration.
						if (*iter == "XX:")
						{
							*iter = "4D:\n:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else 
					{
						cout&lt;&lt;"ERROR108: Letter not found in char [array]."&lt;&lt;endl;
					}
				}

				else if (seatNumber[0] == '5')
				{
					// Traverse to the next 17 iteration.
					iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;
					if (seatNumber[1] == 'A')
					{
						if (*iter == "XX:")
						{
							*iter = "5A:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'B')
					{
						iter++;		// Traverse to the next iteration.
						if (*iter == "XX:")
						{
							*iter = "5B:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'C')
					{
						iter++;iter++;		// Traverse to the next 2 iteration.
						if (*iter == "XX:")
						{
							*iter = "5C:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'D')
					{
						iter++;iter++;iter++;		// Traverse to the next 3 iteration.
						if (*iter == "XX:")
						{
							*iter = "5D:\n:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else 
					{
						cout&lt;&lt;cout&lt;&lt;"Sorry! Invalid input for seat number."&lt;&lt;endl;
					}
				}

				else 
				{
					cout&lt;&lt;"Sorry! Invalid input for seat number."&lt;&lt;endl;
				}


			}

			else if (*iter == "B:")
			{
				if (seatNumber[0] == '1')
				{	
					iter++;		// Traverse to the next iteration.
					if (seatNumber[1] == 'A')
					{
						if (*iter == "XX:")
						{
							*iter = "1A:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'B')
					{
						iter++;		// Traverse to the next iteration.
						if (*iter == "XX:")
						{
							*iter = "1B:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'C')
					{
						iter++;iter++;		// Traverse to the next 2 iteration.
						if (*iter == "XX:")
						{
							*iter = "1C:\n:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else 
					{
						cout&lt;&lt;"Sorry! Invalid input for seat number."&lt;&lt;endl;
					}



				}

				else if (seatNumber[0] == '2')
				{
					iter++;iter++;iter++;iter++;		// Traverse to the next 4 iteration.
					if (seatNumber[1] == 'A')
					{
						if (*iter == "XX:")
						{
							*iter = "2A:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'B')
					{
						iter++;		// Traverse to the next iteration.
						if (*iter == "XX:")
						{
							*iter = "2B:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'C')
					{
						iter++;iter++;		// Traverse to the next 2 iteration.
						if (*iter == "XX:")
						{
							*iter = "2C:\n:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else 
					{
						cout&lt;&lt;"Sorry! Invalid input for seat number."&lt;&lt;endl;
					}
				}

				else if (seatNumber[0] == '3')
				{
					iter++;iter++;iter++;iter++;iter++;iter++;iter++;		// Traverse to the next 7 iteration.
					if (seatNumber[1] == 'A')
					{
						if (*iter == "XX:")
						{
							*iter = "3A:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'B')
					{
						iter++;		// Traverse to the next iteration.
						if (*iter == "XX:")
						{
							*iter = "3B:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'C')
					{
						iter++;iter++;		// Traverse to the next 2 iteration.
						if (*iter == "XX:")
						{
							*iter = "3C:\n:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else 
					{
						cout&lt;&lt;"Sorry! Invalid input for seat number."&lt;&lt;endl;
					}
				}

				else if (seatNumber[0] == '4')
				{
					iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;		// Traverse to the next 10 iteration.
					if (seatNumber[1] == 'A')
					{
						if (*iter == "XX:")
						{
							*iter = "4A:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'B')
					{
						iter++;		// Traverse to the next iteration.
						if (*iter == "XX:")
						{
							*iter = "4B:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'C')
					{
						iter++;iter++;		// Traverse to the next 2 iteration.
						if (*iter == "XX:")
						{
							*iter = "4C\n::";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else 
					{
						cout&lt;&lt;"Sorry! Invalid input for seat number."&lt;&lt;endl;
					}
				}

				else if (seatNumber[0] == '5')
				{
					// Traverse to the next 13 iteration.
					iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;iter++;
					if (seatNumber[1] == 'A')
					{
						if (*iter == "XX:")
						{
							*iter = "5A:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'B')
					{
						iter++;		// Traverse to the next iteration.
						if (*iter == "XX:")
						{
							*iter = "5B:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else if (seatNumber[1] == 'C')
					{
						iter++;iter++;		// Traverse to the next 2 iteration.
						if (*iter == "XX:")
						{
							*iter = "5C:\n:";		// Sets the seat to available.
						}

						else 
						{
							cout&lt;&lt;"Sorry! Seat is already available."&lt;&lt;endl;
						}
					}

					else 
					{
						cout&lt;&lt;"Sorry! Invalid input for seat number."&lt;&lt;endl;
					}
				}

				else 
				{
					cout&lt;&lt;"Sorry! Invalid input for seat number."&lt;&lt;endl;
				}
			}

			else 
			{
				cout&lt;&lt;"ERROR110: Not correct aircraft type in system."&lt;&lt;endl;
			}
		}
	}
}
