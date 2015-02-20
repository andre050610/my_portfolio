<h1>main.cpp</h1>
<?php
$code = str_replace('<','&lt;','/*
Jonathan Aguirre
11/30/2013
Final Project
			    ____  ____  _   ________   
			   / __ \/ __ \/ | / / ____/   
			  / /_/ / / / /  |/ / / __     
			 / ____/ /_/ / /|  / /_/ /     
			/_/    \____/_/ |_/\____/

					CREDITS

	ASCII ART FROM:
http://patorjk.com/software/taag/#p=display&f=Slant&t=USERNAME%20%3A

*/


#include <windows.h>
#include <iostream>
#include <string>
#include <time.h>
#include <fstream>
#include <sstream>
using namespace std;

		//PROTOTYPE FUNCTIONS
void startUpScreen();
void getAccount(string&,string&,int&,int&);
void rules();
void ballAnimation(int,int,int);
void c(int,int);
void saveScore(int&, int&, string&, string&);
void mainMenu(string [][30],int&, int&, string&, string&);
void compVSplayer(string [][30],int&,int&);
void playerVSplayer(string [][30],int&,int&);
int playGame(bool ,string [][30], int, int,bool&);
void clearBoard(string [][30]);
void SetWindow(int , int );
void readySetGo();
int winner(int,bool&);
void board(string[][30],int,int, int, int);
void pongPaddles (int ,bool&,string[][30],bool&);
void clearScreen();
void ballMove(string[][30],int&,int&,int&,int&);
void obstacle(int &,string[][30]);
int playGameComp(bool,string [][30], int, int,bool&);
void pongPaddlesComp (int,bool &,string [][30],int,int,bool&);
void boardComp(string [][30],int,int,int, int);
int winnerComp(int,bool &);



int main()
{
	int width = 110;	//WIDTH OF THE CONSOLE
	int height = 50;	//HEIGHT OF THE CONSOLE

	const int rows = 36;	//NUMBER OF ROWS IN ARRAY
	const int cols = 30;	//NUMBER OF COLUMNS IN ARRAY

	string id;	//USERNAME
	string word;	//PASSWORD

	int won = 0;	//NUMBER OF WINS
	int loss = 0;	//NUMBER OF LOSSES
	
			//ARRAY FOR THE BOARD
	string b[rows][cols] = {{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{"|"," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," ","|"},
							{"|"," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," ","*","|"},
							{"|"," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," ","|"},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "}};
	
	SetWindow(width, height);	//SETS THE SIZE OF THE CONSOLE
	
	startUpScreen();	//ANIMATION FOR THE START UP SCREEN

	getAccount(id,word,won,loss);	//GET ACCOUNT FROM USER

	mainMenu(b,won,loss,id,word);	//DISPLAYS THE MAIN MENU
	



return 0;
}


		//ANIMATION FOR THE START UP SCREEN
void startUpScreen()
{
	int black = 0;	//CHANGES THE COLOR TO BLACK
	int white = 15;	//CHANGES THE COLOR TO WHITE
	int countAni = 0;	//THE AMOUNT OF TIMES THE ANIMATION CYCLES

		//THE TITLE OF THE GAME
	string titlePong= "\n\n\n\n\n\n\n\n\n\n\n\n\n\n"
"\t\t\t\t,------.  ,-----. ,--.  ,--. ,----.	\n"   
"\t\t\t\t|  .--. \'\'  .-.  \'|  ,\'.|  |\'  .-./	\n"
"\t\t\t\t|  \'--\' ||  | |  ||  |\' \'  ||  | .---. \n"
"\t\t\t\t|  | --\' \'  \'-\'  \'|  | `   |\'  \'--\'  | \n"
"\t\t\t\t`--\'      `-----\' `--\'  `--\' `------\'  \n";

	while(countAni != 5)
	{

		for (int count = 1;count<13;count++)
		{				//DISPLAYS THE ANIMATION ONE CLIP AT A TIME
			c(white,black);		//CHANGES THE COLOR OF THE SCREEN TO SHOW PADDLES AND BALL
			cout<<titlePong<<endl;
			cout<<"\n\n\n\n\t\t\t\t\t";
			c(black,white);cout<<" ";
			c(black,black);cout<<"\t\t";
			c(black,white);cout<<" ";
			//@@@@@@@@@@@@@@@@@
			c(black,black);
			cout<<"\n\t\t\t\t\t";
			c(black,white);cout<<" ";
			c(black,black);cout<<"\t\t";
			c(black,white);cout<<" ";
			//@@@@@@@@@@@@@@@@@
			c(black,black);
			cout<<"\n\t\t\t\t\t";
			c(black,white);cout<<" ";
			c(black,black);ballAnimation(count,black,white);	//DISPLAYS THE BALL AT DIFFERENT LOCATIONS DEPENDING
			c(black,white);cout<<" ";				//ON WHERE THE ANIMATION IS CYCLING
			//@@@@@@@@@@@@@@@@@
			c(black,black);
			cout<<"\n\t\t\t\t\t";
			c(black,white);cout<<" ";
			c(black,black);cout<<"\t\t";
			c(black,white);cout<<" ";
			//@@@@@@@@@@@@@@@@@
			c(black,black);
			cout<<"\n\t\t\t\t\t";
			c(black,white);cout<<" ";
			c(black,black);cout<<"\t\t";
			c(black,white);cout<<" ";
			//@@@@@@@@@@@@@@@@@
		
	


			c(white,black);	//RESETS THE COLOR OF THE CONSOLE BACK TO NORMAL
			cout<<"\n\n\n";
			_sleep(50);	//SLEEPS THE CONSOLE 
			clearScreen();	//CLEARS THE SCREEN
		}

		countAni ++;	//ADDS A COUNT TO THE AMOUNT OF ANIMATION CYCLES
	}
	system("cls");	//CLEARS THE SCREEN
}


		//GET ACCOUNT FROM USER
void getAccount(string& id, string& word,int& won, int& loss)
{
			//DISPLYS \'LOGIN\'
	string login = "\n\n"
"\t\t\t\t\t    __    ____  ___________   __ \n"
"\t\t\t\t\t   / /   / __ \\/ ____/  _/ | / / \n"
"\t\t\t\t\t  / /   / / / / / __ / //  |/ /  \n"
"\t\t\t\t\t / /___/ /_/ / /_/ // // /|  /   \n"
"\t\t\t\t\t/_____/\\____/\\____/___/_/ |_/    \n";    

			//DISPLYS \'USERNAME\'
	string username = "\n\n\n"
"\t   __  _______ __________  _   _____    __  _________     \n"
"\t  / / / / ___// ____/ __ \\/ | / /   |  /  |/  / ____/  _  \n"
"\t / / / /\\__ \\/ __/ / /_/ /  |/ / /| | / /|_/ / __/    (_) \n"
"\t/ /_/ /___/ / /___/ _, _/ /|  / ___ |/ /  / / /___   _    \n"
"\t\\____//____/_____/_/ |_/_/ |_/_/  |_/_/  /_/_____/  (_)   ";

			//DISPLYS \'PASSWORD\'
	string password = "\n\n\n"
"\t    ____  ___   ___________       ______  ____  ____       \n" 
"\t   / __ \\/   | / ___/ ___/ |     / / __ \\/ __ \\/ __ \\   _  \n"
"\t  / /_/ / /| | \\__ \\\\__ \\| | /| / / / / / /_/ / / / /  (_) \n"
"\t / ____/ ___ |___/ /__/ /| |/ |/ / /_/ / _, _/ /_/ /  _    \n"
"\t/_/   /_/  |_/____/____/ |__/|__/\\____/_/ |_/_____/  (_)   ";

	string idTemp;	//TEMP USERNAME
	string wordTemp;	//TEMP PASSWORD

	bool found = false;	// FOUND LOGIN

	fstream file;	//FILE FOR ID AND PASSWORD


	file.open("idPassword.txt");	//OPENS THE FILE

	if (!file)
	{
		cout<<"\n\n\t\t\tSorry! Error opening file...\n\n\t\tEXITING THE PROGRAM!"<<endl;
		_sleep(3000);	//SLEEPS THE CONSOLE
		exit(0);	//EXITS THE PROGRAM
	}

	else
	{
		while(true)
		{

			cout<<login<<endl;	//DISPLAYS \'LOGIN\'
			cout<<"\t\t\tTYPE \'0\' FOR USERNAME AND \'0\' FOR PASSWORD TO CREATE AN ACCOUNT"<<endl;

			cout<<username;	//DISPLAYS \'USERNAME\'
			getline(cin,id);	//GETS USERNAME

			cout<<password;	//DISPLAYS \'PASSWORD\'
			getline(cin,word);	//GETS PASSWORD

			if (id == "0" && word == "0")
			{
				system("cls");	//CLEARS THE SCREEN
				file.close();	//CLOSES THE FILE
				file.open("idPassword.txt",ios::app);	//OPENS FILE TO APPEND

				cout<<"\n\n\n\t\t\tENTER A USERNAME"<<endl;
				cout<<username;	//DISPLAYS \'USERNAME\'
				getline(cin,id);	//GETS USERNAME

				cout<<"\n\n\t\t\tENTER A PASSWORD"<<endl;
				cout<<password;	//DISPLAYS \'PASSWORD\'
				getline(cin,word);	//GETS PASSWORD

				file<<id<<endl;	//SEND TO FILE
				file<<word<<endl;	//SEND TO FILE
				file<<won<<endl;	//SEND TO FILE
				file<<loss<<endl;	//SEND TO FILE

				cout<<"\n\n\t\t\tACCOUNT CREATED!"<<endl;
				_sleep(1000);	//SLEEPS THE CONSOLE
				system("cls");	//CLEARS THE CONSOLE
				file.close();	//CLOSES THE FILE
				found = true;	//FOUND LOGIN
				break;	//BREAKS THE LOOP
			}

			else
			{
				system("cls");	//CLEARS THE SCREEN
				while (!file.eof())
				{
					file>>idTemp;	//GETS THE USERNAME
					if (idTemp == id)
					{
						file>>wordTemp;	//GETS THE PASSWORD
						if (wordTemp == word)
						{
							file>>won;	//GETS THE WONS
							file>>loss;	//GETS THE LOSSES
							cout<<"\n\n\n\n\n\n\n\n\n\t\t\t\t\tGAMES WON: "<<won<<endl;
							cout<<"\n\n\n\n\t\t\t\t\tGAMES LOST: "<<loss<<endl;
							_sleep(3000);	//SLEEPS THE CONSOLE
							file.close();	//CLOSES THE FILE
							found = true;	//FOUND LOGIN
							system("cls");	//CLEARS THE CONSOLE
							break;	//BREAKS THE LOOP
						}

					}

				}

				if (found == false)
				{
					cout<<"\n\n\n\n\n\n\n\n\n\t\t\t\tSORRY! INPUTED INVALID USERNAME OR PASSWORD..."<<endl;
					_sleep(3000);	//SLEEPS THE CONSOLE
					file.close();	//CLOSES THE FILE
					file.open("idPassword.txt");	//OPENS THE FILE
				}

				else
				{
					break;	//BREAKS THE LOOP
				}


			}

			system("cls");	//CLEARS THE CONSOLE
		}
	}
}


		//RULES OF THE GAME AND CONTROLES
void rules()
{
			//RULES OF THE GAMES GOES HERE
	string rules = "\n\n\n"
		"\t\t\t\t\tPONG\n"
		"\tThe rules of PONG are easy, each player will move their paddles up and down to\n"
		"hit the ball back to the other player to make them miss the ball. If a player misses\n"
		"the ball, the other player gets a point. The first player to get to five points will win\n" 
		"the game. Beware as each match progresses their will be obstacles appearing randomly on \n"
		"the screen.\n\n\n"
		"\t\tPLAYER VS PLAYER\n"
		"Player 1 Controls: SHIFT KEY(Up), CONTROL KEY(Down)\n"
		"Player 2 Controls: UP ARROW KEY(Up), DOWN ARROW KEY(Down)\n\n\n"
		"\t\tCOMPUTER VS PLAYER\n"
		"Player Controls: UP ARROW KEY(Up), DOWN ARROW KEY(Down)\n\n\n";
	
	cout<<rules<<endl;
	system("pause");	//PAUSES THE SCREEN
}


		//FUNTION TO CHANGE THE TEXT AND BACKGROUND COLOR
void c(int font,int background)
{
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE), (font + (background * 16)) );
}


		//ANIMATES THE BALL 
void ballAnimation(int count,int black, int white)
{				//MOVES THE BALL BACK AND FORTH DEPENDING ON THE AMOUNT OF TIME THE ANIMATION CYCLES
	if (count == 1 || count == 7)
	{
		cout<<"\t";
		c(black,white);cout<<" ";
		c(black,black);
		cout<<"\t";
	}
	else if (count == 2 || count == 6)
	{
		cout<<"\t  ";
		c(black,white);cout<<" ";
		c(black,black);
		cout<<"\t";
	}
	else if (count == 3 || count == 5)
	{
		cout<<"\t    ";
		c(black,white);cout<<" ";
		c(black,black);
		cout<<"\t";
	}
	else if (count == 4)
	{
		cout<<"\t       ";
		c(black,white);cout<<" ";
		c(black,black);
		cout<<"";
	}
	
	else if (count == 8 || count == 12)
	{
		cout<<"    ";
		c(black,white);cout<<" ";
		c(black,black);
		cout<<"\t\t";
	}
	else if (count == 9 || count == 11)
	{
		cout<<"  ";
		c(black,white);cout<<" ";
		c(black,black);
		cout<<"\t\t";
	}
	else if (count == 10)
	{
		cout<<"";
		c(black,white);cout<<" ";
		c(black,black);
		cout<<"\t\t";
	}
}


		//SAVES THE SCORE
void saveScore(int& won, int& loss, string& id, string& word)
{
	
	string wons;	//NUMBER OF WINS
	string losses;	//NUMBER OF LOSSES

	ifstream file;	//READ FILE FOR ID AND PASSWORD
	ofstream fileWrite;	//WRITE FILE FOR ID AND PASSWORD

	string tempData;	//SROTES TEMP LINE FORM FILE
	string stringFile = "";	//STORES THE TEMP DATA

	stringstream temp;	//CONVERTS TO STRING 
	temp<<won;
	temp>>wons;

	stringstream temp2;	//CONVERTS TO STRING 
	temp2<<loss;
	temp2>>losses;

	file.open("idPassword.txt");	//OPENS THE FILE
	file>>tempData;	//GETS DATA FROM FILE

	do
	{
				//PROCEED IF USERNAME IS THE SAME AS IN FILE
				//TO CHANGE DATA IN FILE
		if (tempData == id)
		{
			stringFile += (id +"\n");	//ADDS USERNAME
			file>>tempData;	//GETS DATA FROM FILE
			stringFile += (word +"\n");	//ADDS PASSWORD
			file>>tempData;	//GETS DATA FROM FILE
			stringFile += (wons +"\n");	//ADDS WINS
			file>>tempData;	//GETS DATA FROM FILE
			stringFile += (losses +"\n");	//ADDS LOSSES
		}

		else
		{
			stringFile += (tempData +"\n");	//ADDS THE DATA FROM FILE
		}
		file>>tempData;	//GETS DATA FROM FILE
	}while(!file.eof());

	file.close();	//CLOSES FILE

	fileWrite.open("idPassword.txt");	//OPENS THE FILE

	fileWrite<<stringFile;	//WRITE TO FILE

	fileWrite.close();	//CLOSE FILE

}


		//DISPLAYS THE MAIN MENU
void mainMenu(string b[][30],int& won, int& loss, string& id, string& word)
{
			//DISPLAYS OPTION PLAYER VS PLAYER
	string option1 = " \n"
" __       ____  _                                     ____  _		\n"      
" \\ \\     |  _ \\| | __ _ _   _  ___ _ __  __   _____  |  _ \\| | __ _ _   _  ___ _ __		\n"
"  \\ \\    | |_) | |/ _` | | | |/ _ \\ \'__| \\ \\ / / __| | |_) | |/ _` | | | |/ _ \\ \'__|		\n"
"  / /    |  __/| | (_| | |_| |  __/ |     \\ V /\\__ \\ |  __/| | (_| | |_| |  __/ |			\n"
" /_/     |_|   |_|\\__,_|\\__, |\\___|_|      \\_/ |___/ |_|   |_|\\__,_|\\__, |\\___|_|		\n"
"       ____             |___/          _                          __|___/				\n"
"      / ___|___  _ __ ___  _ __  _   _| |_ ___ _ __  __   _____  |  _ \\| | __ _ _   _  ___ _ __		\n"
"     | |   / _ \\| \'_ ` _ \\| \'_ \\| | | | __/ _ \\ \'__| \\ \\ / / __| | |_) | |/ _` | | | |/ _ \\ \'__|      \n"
"     | |__| (_) | | | | | | |_) | |_| | ||  __/ |     \\ V /\\__ \\ |  __/| | (_| | |_| |  __/ |             \n"
"      \\____\\___/|_| |_| |_| .__/ \\__,_|\\__\\___|_|      \\_/ |___/ |_|   |_|\\__,_|\\__, |\\___|_|        \n"
"     |  _ \\ _   _| | ___  |_|                                                   |___/		\n"
"     | |_) | | | | |/ _ \\/ __|				\n"
"     |  _ <| |_| | |  __/\\__ \\				\n"
"     |_|_\\_\\\\__,_|_|\\___||___/				\n"
"      / _ \\ _   _(_) |_						\n"
"     | | | | | | | | __|						\n"
"     | |_| | |_| | | |_						\n"
"      \\__\\_\\\\__,_|_|\\__|					\n"
"												\n";

			//DISPLAYS OPTION COMPUTER VS PLAYER
	string option2 = " \n"
"     ____  _                                     ____  _			\n"
"    |  _ \\| | __ _ _   _  ___ _ __  __   _____  |  _ \\| | __ _ _   _  ___ _ __				\n"
"    | |_) | |/ _` | | | |/ _ \\ \'__| \\ \\ / / __| | |_) | |/ _` | | | |/ _ \\ \'__|			\n"
"    |  __/| | (_| | |_| |  __/ |     \\ V /\\__ \\ |  __/| | (_| | |_| |  __/ |				\n"
" __ |_|   |_|\\__,_|\\__, |\\___|_|      \\_/ |___/ |_|   |_|\\__,_|\\__, |\\___|_|_			\n"
" \\ \\      / ___|___|___/_ ___  _ __  _   _| |_ ___ _ __  __   _|___/ |  _ \\| | __ _ _   _  ___ _ __  \n"
"  \\ \\    | |   / _ \\| \'_ ` _ \\| \'_ \\| | | | __/ _ \\ \'__| \\ \\ / / __| | |_) | |/ _` | | | |/ _ \\ \'__|  \n"
"  / /    | |__| (_) | | | | | | |_) | |_| | ||  __/ |     \\ V /\\__ \\ |  __/| | (_| | |_| |  __/ |          \n"
" /_/  ____\\____\\___/|_| |_| |_| .__/ \\__,_|\\__\\___|_|      \\_/ |___/ |_|   |_|\\__,_|\\__, |\\___|_|    \n" 
"     |  _ \\ _   _| | ___  ___ |_|                                                   |___/	\n"  
"     | |_) | | | | |/ _ \\/ __|									\n"   
"     |  _ <| |_| | |  __/\\__ \\				\n"    
"     |_|_\\_\\\\__,_|_|\\___||___/				\n"     
"      / _ \\ _   _(_) |_						\n"      
"     | | | | | | | | __|						\n"       
"     | |_| | |_| | | |_						\n"        
"      \\__\\_\\\\__,_|_|\\__| 					\n"
"												\n"; 
			
			//DISPLAYS OPTION RULES
	string option3 = "	\n"
"     ____  _                                     ____  _			\n"
"    |  _ \\| | __ _ _   _  ___ _ __  __   _____  |  _ \\| | __ _ _   _  ___ _ __			\n "
"   | |_) | |/ _` | | | |/ _ \\ \'__| \\ \\ / / __| | |_) | |/ _` | | | |/ _ \\ \'__|		\n"
"    |  __/| | (_| | |_| |  __/ |     \\ V /\\__ \\ |  __/| | (_| | |_| |  __/ |			\n"
"    |_|   |_|\\__,_|\\__, |\\___|_|      \\_/ |___/ |_|   |_|\\__,_|\\__, |\\___|_|			\n"
"      ____         |___/              _                        |___/_  _				\n"
"     / ___|___  _ __ ___  _ __  _   _| |_ ___ _ __  __   _____  |  _ \\| | __ _ _   _  ___ _ __		\n"
"    | |   / _ \\| \'_ ` _ \\| \'_ \\| | | | __/ _ \\ \'__| \\ \\ / / __| | |_) | |/ _` | | | |/ _ \\ \'__|		\n"
"    | |__| (_) | | | | | | |_) | |_| | ||  __/ |     \\ V /\\__ \\ |  __/| | (_| | |_| |  __/ |		\n"
" __  \\____\\___/|_| |_| |_| .__/ \\__,_|\\__\\___|_|      \\_/ |___/ |_|   |_|\\__,_|\\__, |\\___|_|		\n"
" \\ \\    |  _ \\ _   _| | _|_| ___                                               |___/ \n"
"  \\ \\   | |_) | | | | |/ _ \\/ __|			\n"
"  / /   |  _ <| |_| | |  __/\\__ \\			\n"
" /_/  __|_| \\_\\\\__,_|_|\\___||___/			\n"
"     / _ \\ _   _(_) |_						\n"
"    | | | | | | | | __|						\n"
"    | |_| | |_| | | |_							\n"
"     \\__\\_\\\\__,_|_|\\__|					\n"
"												\n";

			//DISPLAYS OPTION QUIT
	string option4 = "	\n"
"     ____  _                                     ____  _			\n"
"    |  _ \\| | __ _ _   _  ___ _ __  __   _____  |  _ \\| | __ _ _   _  ___ _ __				\n"
"    | |_) | |/ _` | | | |/ _ \\ \'__| \\ \\ / / __| | |_) | |/ _` | | | |/ _ \\ \'__|		\n"
"    |  __/| | (_| | |_| |  __/ |     \\ V /\\__ \\ |  __/| | (_| | |_| |  __/ |				\n"
"    |_|   |_|\\__,_|\\__, |\\___|_|      \\_/ |___/ |_|   |_|\\__,_|\\__, |\\___|_|				\n"
"      ____         |___/              _                        |___/_  _				\n"
"     / ___|___  _ __ ___  _ __  _   _| |_ ___ _ __  __   _____  |  _ \\| | __ _ _   _  ___ _ __	\n"
"    | |   / _ \\| \'_ ` _ \\| \'_ \\| | | | __/ _ \\ \'__| \\ \\ / / __| | |_) | |/ _` | | | |/ _ \\ \'__|		\n"
"    | |__| (_) | | | | | | |_) | |_| | ||  __/ |     \\ V /\\__ \\ |  __/| | (_| | |_| |  __/ |		\n"
"     \\____\\___/|_| |_| |_| .__/ \\__,_|\\__\\___|_|      \\_/ |___/ |_|   |_|\\__,_|\\__, |\\___|_|		\n"
"    |  _ \\ _   _| | ___  |_|                                                   |___/	\n"
"    | |_) | | | | |/ _ \\/ __|					\n"
"    |  _ <| |_| | |  __/\\__ \\				\n"
" __ |_| \\_\\\\__,_|_|\\___||___/				\n"
" \\ \\     / _ \\ _   _(_) |_					\n"
"  \\ \\   | | | | | | | | __|					\n"
"  / /   | |_| | |_| | | |_						\n"
" /_/     \\__\\_\\\\__,_|_|\\__|				\n"
"												\n";

	bool end = false;	//ENDING POINT FOR THE ANIMATION FOR MAIN MENU
	int menu = 1;	//OPTION MENU


	while(true)
	{
		
		while (end==false)
		{
			if (menu == 1)
			 {
				 cout<<"\n\n\n\t\t~PLEASE PRESS UP OR DOWN ARROW KEY TO MOVE AND RIGHT TO CHOOSE OPTION~\n\n\n\n\n";
				 cout<<option1;	//DISPLAYS THE PLAYER VS PLAYER
			 }

			 else if (menu == 2)
			 {
				 cout<<"\n\n\n\t\t~PLEASE PRESS UP OR DOWN ARROW KEY TO MOVE AND RIGHT TO CHOOSE OPTION~\n\n\n\n\n";
				 cout<<option2;	//DISPLAYS THE COMPUTER VS PLAYER
			 }

			else if (menu == 3)
			 {
				 cout<<"\n\n\n\t\t~PLEASE PRESS UP OR DOWN ARROW KEY TO MOVE AND RIGHT TO CHOOSE OPTION~\n\n\n\n\n";
				 cout<<option3;	//DISPLAYS THE RULES
			 }

			 else if (menu == 4)
			 {
				 cout<<"\n\n\n\t\t~PLEASE PRESS UP OR DOWN ARROW KEY TO MOVE AND RIGHT TO CHOOSE OPTION~\n\n\n\n\n";
				 cout<<option4;	//DISPLAYS THE QUIT
			 }
			
			if (GetAsyncKeyState(VK_UP))
			{
				menu --;	//MOVES THE ARROW UP
				if (menu < 1)
				{
					menu = 4;	//TAKES ARROW BACK TO MENU 4 SO IT WONT GO OUT OF BOUNDS
				}
					
				}

				else if (GetAsyncKeyState(VK_DOWN))
				{
					menu ++;	//MOVES THE ARROW DOWN
				if (menu > 4)
				{
					menu = 1;	//TAKES ARROW BACK TO MENU 1 SO IT WONT GO OUT OF BOUNDS
				}
					
				}

				else if (GetAsyncKeyState(VK_RIGHT))
				{
					end = true;	//IT WILL END THE LOOP FOR MAIN MENU
				}
				
			_sleep(200);	//SLEEPS THE CONSOLE
			clearScreen();	//CLEARS THE SCREEN

		}
		
		switch(menu)
		{
			case 1: 
				system("cls");	//CLEARS SCREEN
				playerVSplayer(b,won,loss);	//PLAYER VS PLAYER START GAME
				break;
			case 2: 
				system("cls");	//CLEARS SCREEN
				compVSplayer(b,won,loss);	//COMPUTER VS PLAYER START GAME
				break;
			case 3:
				system("cls");	//CLEARS SCREEN
				rules();	//DISPLAYS RULES
				break;
			case 4: 
				saveScore(won,loss,id,word);	//SAVES THE SCORE
				exit(0);	//EXITS THE PROGRAM
				break;

		}
		system("cls");	//CLEARS SCREEN
		end = false;	//RESETS THE LOOP
	}
	
}


		//PLAYER VS PLAYER START GAME
void playerVSplayer(string b[][30],int& won, int& loss)
{	
				//DISPLAY THE PLAYER 2 WINNER OF MATCH
	string playerWin2 = "\n\n\n\n\n\n"
"\t\t    ____  __    _____  ____________     ___      _       ______  _   ____ \n"
"\t\t   / __ \\/ /   /   \\ \\/ / ____/ __ \\   |__ \\    | |     / / __ \\/ | / / / \n"
"\t\t  / /_/ / /   / /| |\\  / __/ / /_/ /   __/ /    | | /| / / / / /  |/ / /  \n"
"\t\t / ____/ /___/ ___ |/ / /___/ _, _/   / __/     | |/ |/ / /_/ / /|  /_/   \n"
"\t\t/_/   /_____/_/  |_/_/_____/_/ |_|   /____/     |__/|__/\\____/_/ |_(_)	   \n";

			//DISPLAY THE PLAYER 1 WINNER OF MATCH
	string playerWin1 = "\n\n\n\n\n\n"
"\t\t    ____  __    _____  ____________     ___   _       ______  _   ____ \n"
"\t\t   / __ \\/ /   /   \\ \\/ / ____/ __ \\   <  /  | |     / / __ \\/ | / / / \n"
"\t\t  / /_/ / /   / /| |\\  / __/ / /_/ /   / /   | | /| / / / / /  |/ / /  \n"
"\t\t / ____/ /___/ ___ |/ / /___/ _, _/   / /    | |/ |/ / /_/ / /|  /_/   \n"
"\t\t/_/   /_____/_/  |_/_/_____/_/ |_|   /_/     |__/|__/\\____/_/ |_(_)    \n";

	int player2 = 0;	//PLAYER 2 SCORE
	int player1 = 0;	//PLAYER 1 SCORE
	int winner;		//WINNER OF THE GAME

	bool end = false;	//ENDS THE MATCH
	bool endGame = false;	//ENDS THE GAME

	readySetGo();	//READY SET GO DISPLAY
	_sleep(2000);	//SLEEPS THE CONSOLE
	system("cls");	//CLEARS THE CONSOLE
	
			//A PLAYER WINS IF GETS TO SCORE 5
	while (player1 !=5 && player2 != 5 && endGame == false)
		{
			winner = playGame(end,b,player1,player2,endGame);	//DETERMINES THE WINNER FOR EACH MATCH
			if (winner == 1)
			{
				player1 += 1;	//PLAYER 1 GETS A 1 SCORE ADDED
				if (player1 == 5)
				{
					system("cls");	//CLEARS THE CONSOLE
					cout<<playerWin1<<endl;	//DISPLAY THE PLAYER 1 WINNER OF MATCH
					_sleep(2000);	//SLEEPS THE SRCEEN
					won += 1;	//ADDS A WIN
				}

				else 
				{	
					readySetGo();	//READY SET GO DISPLAY
					_sleep(2000);	//SLEEPS THE SRCEEN
					system("cls");	//CLEARS THE CONSOLE
				}

			}
			else if(winner == 2)
			{
				player2 += 1;	//PLAYER 2 GETS A 1 SCORE ADDED
				if (player2 == 5)
				{
					system("cls");	//CLEARS THE CONSOLE
					cout<<playerWin2<<endl;	//DISPLAY THE PLAYER 2 WINNER OF MATCH
					_sleep(2000);	//SLEEPS THE SRCEEN
					loss += 1;	//ADDS A LOSS
				}

				else
				{	
					readySetGo();	//READY SET GO DISPLAY
					_sleep(2000);	//SLEEPS THE SRCEEN
					system("cls");	//CLEARS THE CONSOLE
				}

			}

			clearBoard(b);	//RESETS THE BOARD

		}
	endGame =false;
}


		//COMPUTER VS PLAYER START GAME
void compVSplayer(string b[][30],int& won, int& loss)
{
				//DISPLAY THE PLAYER  WINNER OF MATCH
	string playerWin = "\n\n\n\n\n\n"
"\t\t    ____  __    _____  ____________     _       ______  _   ____ \n"
"\t\t   / __ \\/ /   /   \\ \\/ / ____/ __ \\   | |     / / __ \\/ | / / / \n"
"\t\t  / /_/ / /   / /| |\\  / __/ / /_/ /   | | /| / / / / /  |/ / /  \n"
"\t\t / ____/ /___/ ___ |/ / /___/ _, _/    | |/ |/ / /_/ / /|  /_/   \n"
"\t\t/_/   /_____/_/  |_/_/_____/_/ |_|     |__/|__/\\____/_/ |_(_)    \n";

			//DISPLAY THE COMPUTER WINNER OF MATCH
	string computerWin = "\n\n\n\n\n\n"
"\t\t   __________  __  _______  __  __________________     _       ______  _   ____ \n"
"\t\t  / ____/ __ \\/  |/  / __ \\/ / / /_  __/ ____/ __ \\   | |     / / __ \\/ | / / / \n"
"\t\t / /   / / / / /|_/ / /_/ / / / / / / / __/ / /_/ /   | | /| / / / / /  |/ / /  \n"
"\t\t/ /___/ /_/ / /  / / ____/ /_/ / / / / /___/ _, _/    | |/ |/ / /_/ / /|  /_/   \n"
"\t\t\\____/\\____/_/  /_/_/    \\____/ /_/ /_____/_/ |_|     |__/|__/\\____/_/ |_(_)    \n";

	int player1 = 0;	//PLAYER SCORE
	int comp = 0;	//COMPUTER SCORE
	int winner;		//WINNER OF THE GAME

	bool end = false;	//ENDS THE MATCH
	bool endGame = false;	//ENDS THE GAME

	readySetGo();	//READY SET GO DISPLAY
	_sleep(2000);	//SLEEPS THE CONSOLE
	system("cls");	//CLEARS THE CONSOLE

			//SOMEONE WINS IF GETS TO SCORE 5
	while (player1 !=5 && comp != 5 && endGame == false)
		{
			winner = playGameComp(end,b,comp,player1,endGame);	//DETERMINES THE WINNER FOR EACH MATCH
			if (winner == 1)
			{
				comp += 1;	//COMPUTER GETS A 1 SCORE ADDED
				if (comp == 5)
				{
					system("cls");	//CLEARS THE CONSOLE
					cout<<computerWin<<endl;	//DISPLAY THE COMPUTER WINNER OF MATCH
					_sleep(2000);	//SLEEPS THE SRCEEN
					loss += 1;	//ADDS A LOSS
				}

				else
				{	
					readySetGo();	//READY SET GO DISPLAY
					_sleep(2000);	//SLEEPS THE SRCEEN
					system("cls");	//CLEARS THE CONSOLE
				}

			}
			else if(winner ==2)
			{
				player1 += 1;	//PLAYER GETS A 1 SCORE ADDED
				if (player1 == 5)
				{
					system("cls");	//CLEARS THE CONSOLE
					cout<<playerWin<<endl;	//DISPLAY THE PLAYER 2 WINNER OF MATCH
					_sleep(2000);	//SLEEPS THE SRCEEN
					won += 1;	//ADDS A WIN
				}

				else
				{	
					readySetGo();	//READY SET GO DISPLAY
					_sleep(2000);	//SLEEPS THE SRCEEN
					system("cls");	//CLEARS THE CONSOLE
				}

			}

			clearBoard(b);	//RESETS THE BOARD

		}
	endGame = false;
}


		//CLEARS THE BOARD TO RESTART GAME
void clearBoard(string b[][30])
{
			//STARTING POINT OF ARRAY TO RESET
	string tempb [36][30] = {{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{"|"," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," ","|"},
							{"|"," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," ","*","|"},
							{"|"," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," ","|"},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "},
							{" "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "}};

	for (int row = 0;row<36;row++)
	{
		for(int col = 0;col<30;col++)
		{
					//RESETS THE BOARD ROW BY COLUMN
			b[row][col] = tempb[row][col];
		}

	}

}


		//SETS THE SIZE OF THE CONSOLE
void SetWindow(int Width, int Height) 
    { 
    _COORD coord; 
    coord.X = Width;	//GETS THE WIDTH IN CORDINATES
    coord.Y = Height;	//GETS THE HEIGHT IN CORDINATES

    _SMALL_RECT Rect; 
    Rect.Top = 0; 
    Rect.Left = 0; 
    Rect.Bottom = Height - 1; 
    Rect.Right = Width - 1; 

    HANDLE Handle = GetStdHandle(STD_OUTPUT_HANDLE);      // GET HANDLE
    SetConsoleScreenBufferSize(Handle, coord);            // SET BUFFER SIZE 
    SetConsoleWindowInfo(Handle, TRUE, &Rect);            // SET WINDOW SIZE
    }


		//READY SET GO DISPLAY
void readySetGo()
{
			//DISPLAYS \'READY\'
	string ready = "\n\n\n\n\n\n"
"\t\t\t\t    ____  _________    ______  __ \n"
"\t\t\t\t   / __ \\/ ____/   |  / __ \\ \\/ / \n"
"\t\t\t\t  / /_/ / __/ / /| | / / / /\\  /  \n"
"\t\t\t\t / _, _/ /___/ ___ |/ /_/ / / /   \n"
"\t\t\t\t/_/ |_/_____/_/  |_/_____/ /_/    \n";

			//DISPLAYS \'GO\'
	string go = "\n\n\n\n\n\n"
"\t\t\t\t\t   __________  __ \n"
"\t\t\t\t\t  / ____/ __ \\/ / \n"
"\t\t\t\t\t / / __/ / / / /  \n"
"\t\t\t\t\t/ /_/ / /_/ /_/   \n"
"\t\t\t\t\t\\____/\\____(_)    \n";


	cout<<ready<<endl;	//DISPLYAS \'READY\'
	_sleep(1000);	//SLEEPS THE SCREEN
	cout<<go<<endl;	//DISPLAYS \'GO\'
}


		//DETERMINES THE WINNER FOR EACH MATCH PLAYER VS PLAYER
int winner(int ystart,bool &end)
{
	int black = 0;	//CHANGE COLOR TO BLACK
	int white = 15;	//CHANGE COLOR TO WHITE

	if (ystart == 0)
	{
		c(white,black);	//RESETS THE COLOR BACK TO NORMAL
		end = true;	//ENDS THE MATCH
		system("cls");	//CLEARS THE CONSOLE
		return 2;
	}

	else if (ystart == 29)
	{
		c(white,black);	//RESETS THE COLOR BACK TO NORMAL
		end = true;	//ENDS THE MATCH
		system("cls");	//CLEARS THE CONSOLE
		return 1;
	}

}


		//DETERMINES THE WINNER FOR EACH MATCH COMPUTER VS PLAYER
int winnerComp(int ystart,bool &end)
{
	int black = 0;	//CHANGE COLOR TO BLACK
	int white = 15;	//CHANGE COLOR TO WHITE

	if (ystart == 0)
	{
		c(white,black);	//RESETS THE COLOR BACK TO NORMAL
		end = true;	//ENDS THE MATCH
		system("cls");	//CLEARS THE CONSOLE
		return 2;
	}

	else if (ystart == 29)
	{
		c(white,black);	//RESETS THE COLOR BACK TO NORMAL
		end = true;	//ENDS THE MATCH
		system("cls");	//CLEARS THE CONSOLE
		return 1;
	}

}


		//DISPLAYS THE BOARD ON CONSOLE PLAYER VS PLAYER
void board(string b[][30],int rows,int cols,int player1, int player2)
{
	cout<<"\t\t\t\tPLAYER 1: "<<player1<<"\tPLAYER 2: "<<player2<<endl<<endl;	//DISPLAYS THE SCORE FOR PLAYERS
	cout<<"\t\t\t\t--------------------------------"<<endl;
	for(int row = 0;row < rows;row++)
	{
		cout<<"\t\t\t\t|";
		for(int col = 0;col < cols;col++)
		{
			cout<<b[row][col];	//GETS ALL THE ELEMENTS ROW BY COLUMN FROM ARRAY AND DISPLAYS THE BOARD
		}
		cout<<"|"<<endl;
	}
	cout<<"\t\t\t\t--------------------------------"<<endl;
	
}


		//DISPLAYS THE BOARD ON CONSOLE COMPUTER VS PLAYER
void boardComp(string b[][30],int rows,int cols,int player1, int player2)
{
		cout<<"\t\t\t\tCOMPUTER: "<<player1<<"\tPLAYER: "<<player2<<endl<<endl;	//DISPLAYS THE SCORE FOR PLAYER AND COMPUTER
	cout<<"\t\t\t\t--------------------------------"<<endl;
	for(int row = 0;row < rows;row++)
	{
		cout<<"\t\t\t\t|";
		for(int col = 0;col < cols;col++)
		{
			cout<<b[row][col];	//GETS ALL THE ELEMENTS ROW BY COLUMN FROM ARRAY AND DISPLAYS THE BOARD
		}
		cout<<"|"<<endl;
	}
	cout<<"\t\t\t\t--------------------------------"<<endl;
}


		//MAKES THE PADDLES MOVE PLAYER VS PLAYER
void pongPaddles (int time,bool &end,string b[][30], bool &endGame)
{
	 int black = 0;		//CHANGES THE COLOR TO BLACK
	 int white = 15;	//CHANGES THE COLOR TO WHITE

			//WAITS FOR THE CERTAIN AMOUNT OF TIME OR USER TO INPUT KEY
     clock_t endWait;
     bool noInput=true;
     endWait=clock()+time;
     while (clock()<=endWait && noInput)
     {				//PRESS ESCAPE KEY TO END GAME
           if (GetAsyncKeyState(VK_ESCAPE))
           {
              end=true;		//ENDS THE LOOP FOR MATCH
			  endGame = true;	//ENDS THE GAME
              noInput=false;	//ENDS THE LOOP FOR INPUT
			  c(white,black);
           }

		   else if((GetAsyncKeyState(VK_SHIFT)))
		   {
			   for(int row =35;row >= 3;row--)
			   {
				   if (b[row][0] == "|")
				   {			//MOVES THE PADDLE UP
					   b[row][0] = " ";
					   b[row-3][0] = "|";

					   noInput = false;		//ENDS THE LOOP FOR INPUT
					   break;	//BREAKS THE FOR LOOP
				   }

			   }

		   }

		   else if((GetAsyncKeyState(VK_CONTROL)))
		   {					//MOVES THE PADDLE DOWN
			   for(int row =0;row <= 32;row++)
			   {
				   if (b[row][0] == "|")
				   {
					   b[row][0] = " ";
					   b[row+3][0] = "|";

					   noInput = false;	//ENDS THE LOOP FOR INPUT
					   break;	//BREAKS THE FOR LOOP
				   }

			   }

		   }

		   if((GetAsyncKeyState(VK_UP)))
		   {
			   for(int row =35;row >= 3;row--)
			   {			//MOVES THE PADDLE UP
				   if (b[row][29] == "|")
				   {
					   b[row][29] = " ";
					   b[row-3][29] = "|";

					   noInput = false;	//ENDS THE LOOP FOR INPUT
					   break;	//BREAKS THE FOR LOOP
				   }

			   }

		   }

		   else if((GetAsyncKeyState(VK_DOWN)))
		   {
			   for(int row =0;row <= 32;row++)
			   {			//MOVES THE PADDLE DOWN
				   if (b[row][29] == "|")
				   {
					   b[row][29] = " ";
					   b[row+3][29] = "|";

					   noInput = false;	//ENDS THE LOOP FOR INPUT
					   break;	//BREAKS THE FOR LOOP
				   }

			   }

		   }

     }
}


		//MAKES THE PADDLES MOVE COMPUTER VS PLAYER
void pongPaddlesComp (int time,bool &end,string b[][30], int xstart,int x,bool &endGame)
{
	 int black = 0;		//CHANGES THE COLOR TO BLACK
	 int white = 15;	//CHANGES THE COLOR TO WHITE

			//WAITS FOR THE CERTAIN AMOUNT OF TIME OR USER TO INPUT KEY
     clock_t endWait;
     bool noInput=true;
     endWait=clock()+time;
     while (clock()<=endWait && noInput)
     {				//PRESS ESCAPE KEY TO END GAME
           if (GetAsyncKeyState(VK_ESCAPE))
           {
              end=true;
			  endGame = true;
              noInput=false;	//ENDS THE LOOP FOR INPUT
			  c(white,black);
           }


		   if (xstart <= 15 && x == -1)
		   {					//MOVES THE COMPUTER\'S PADDLE UP WHEN BALL MOVES UP
				for(int row =35;row >= 3;row--)
				{
						
					if (b[row][0] == "|")
					{
						b[row][0] = " ";
						b[row-3][0] = "|";

						noInput = false;		//ENDS THE LOOP FOR INPUT
					}

					if (row-3 == xstart)
					{
						break;	//BREAKS THE FOR LOOP
					}
				}
		   }

		   else if (xstart <= 15 && x == 1)
		   {					//MOVES THE COMPUTER\'S PADDLE DOWN WHEN BALL MOVES DOWN
			   for(int row =0;row <= 32;row++)
			   {
				   if (b[row][0] == "|")
				   {
					   b[row][0] = " ";
					   b[row+3][0] = "|";

					   noInput = false;		//ENDS THE LOOP FOR INPUT
				   }

				   if (row == xstart)
					{
						break;	//BREAKS THE FOR LOOP
					}
			   }
		   }


		   if (xstart > 15 && x == -1)
		   {
				for(int row =35;row >= 3;row--)
				{
								//MOVES THE COMPUTER\'S PADDLE UP WHEN BALL MOVES UP
					if (b[row][0] == "|")
					{
						b[row][0] = " ";
						b[row-3][0] = "|";

						noInput = false;		//ENDS THE LOOP FOR INPUT
					}

					if (row == xstart)
					{
						break;	//BREAKS THE FOR LOOP
					}
				}
		   }

		   else if (xstart > 15 && x == 1)
		   {					//MOVES THE COMPUTER\'S PADDLE DOWN WHEN BALL MOVES DOWN
			   for(int row =0;row <= 32;row++)
			   {
				   if (b[row][0] == "|")
				   {
					   b[row][0] = " ";
					   b[row+3][0] = "|";

					   noInput = false;		//ENDS THE LOOP FOR INPUT
				   }

				   if (row == xstart)
					{
						break;	//BREAKS THE FOR LOOP
					}
			   }
		   }

		   if((GetAsyncKeyState(VK_UP)))
		   {
			   for(int row =35;row >= 3;row--)
			   {
				   if (b[row][29] == "|")
				   {			//MOVES THE PADDLE UP
					   b[row][29] = " ";
					   b[row-3][29] = "|";

					   noInput = false;		//ENDS THE LOOP FOR INPUT
					   break;	//BREAKS THE FOR LOOP
				   }
			   }

				for(int row =35;row >= 3;row--)
			   {				//MOVES THE COMPUTER\'S PADDLE UP
				   if (b[row][0] == "|")
				   {
					   b[row][0] = " ";
					   b[row-3][0] = "|";

					   noInput = false;		//ENDS THE LOOP FOR INPUT
					   break;	//BREAKS THE FOR LOOP
				   }

			   }


			   

		   }

		   else if((GetAsyncKeyState(VK_DOWN)))
		   {
			   for(int row =0;row <= 32;row++)
			   {				//MOVES THE PADDLE DOWN
				   if (b[row][29] == "|")
				   {
					   b[row][29] = " ";
					   b[row+3][29] = "|";

					   noInput = false;		//ENDS THE LOOP FOR INPUT
					   break;	//BREAKS THE FOR LOOP
				   }
			   }

			    for(int row =0;row <= 32;row++)
			   {				//MOVES THE COMPUTER\'S PADDLE DOWN
				   if (b[row][0] == "|")
				   {
					   b[row][0] = " ";
					   b[row+3][0] = "|";

					   noInput = false;		//ENDS THE LOOP FOR INPUT
					   break;	//BREAKS THE FOR LOOP
				   }

			   }

		   }

     }
	
}


		//CLEARS THE SCREEN AND SETS THE CURSOR ON TOP
void clearScreen()
{
  	HANDLE hOut;
  	COORD Position;

  	hOut = GetStdHandle(STD_OUTPUT_HANDLE);

   	Position.X = 0;
  	Position.Y = 0;
  	SetConsoleCursorPosition(hOut, Position);
}


		//MOVES THE BALL 
void ballMove(string b[][30],int &x,int &y,int &xstart, int &ystart)
{
	if (xstart == 0)	//BALL HITS TOP SCREEN CHANGE DIRECTION
	{
		x = 1;
	}

	else if (xstart == 35)		//BALL HITS BOTTOM SCREEN CHANGE DIRECTION
	{
		x = -1;
	}

	else if (b[xstart][ystart+y] == "|")	//PLAYER PADDLE HIT
	{
		y *= -1;
	}

	else if (b[xstart+x][ystart+y] == "|")		//CHANGE DIRECTION WHEN HIT TOP ANGLE OF PADDLE
	{
		y*= -1;
		x*= -1;
	}

			//MAKES THE BALL MOVE
	b[xstart][ystart] = " ";
	b[xstart + x][ystart + y] = "*"; 

	xstart += x;
	ystart += y;


	




}


		//GENERATES AN OBSTACLE AT CORRECT TIME AND CHANGES THE COLOR
bool generateObstacle(int x, int y, int count, int seconds,string b[][30])
{
	if (count == seconds)
	{
					//CHANGES THE COLOR OF THE CONSOLE 
		SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE), ( (count/30)+ (0 * 16)) );
		b[x][y] = "|";		//ADDS AN OBSTACLE
		return true;
	}
	return false;
}

		//OBSTACLE\'S CONDITIONS
void obstacle(int &count,string b[][30])
{
	count +=1;	//COUNTS THE INTERVALS
	srand ( time(NULL) );	//RANDOM THE SET TIME
	int xobstacle = rand()%32 + 1;	//GENERATES A RANDOM X-AXIS
	int yobstacle = rand()%14 + 7;	//GENERATES A RANDOM Y-AXIS
	bool generate;	//GIVES A FLAG TO GENERATE OBSTACLE 
	
	for (int seconds = 30; seconds < 450; seconds+=30)
	{				//GENERATES AN OBSTACLE AT CORRECT TIME AND CHANGES THE COLOR
		generate = generateObstacle(xobstacle,yobstacle,count,seconds,b);
		if (generate == true)
		{
			break;  //BREAK THE FOR LOOP
		}
	}
}


		//PLAYS THE GAME PLAYER VS PLAYER
int playGame(bool end,string b[][30], int player1, int player2,bool &endGame)
{
	const int rows = 36;	//AMOUNT OF ROWS 
	const int cols = 30;	//AMOUNT OF COLUMN

	int count = 0;	//COUNT INTERVALS
	int x = -1;	//X-AXIS BALL MOVEMENT
	int y = -1;	//Y-AXIS BALL MOVEMENT
	
	int xstart = 15;	//X-AXIS START POINT
	int ystart = 28;	//Y-AXIS START POINT
	
	int player;	//WINNER OF GAME

	while(end==false)
	{
		
		board(b,rows,cols,player1,player2);	//DISPLAYS THE BOARD ON CONSOLE PLAYER VS PLAYER
		pongPaddles(10,end,b,endGame);	//MAKES THE PADDLES MOVE PLAYER VS PLAYER
		ballMove(b,x,y,xstart,ystart);	//MOVES THE BALL
		_sleep(10);	//SLEEPS THE CONSOLE
		clearScreen();	//CLEARS THE SCREEN
		player = winner(ystart,end);	//DETERMINES THE WINNER FOR EACH MATCH PLAYER VS PLAYER
		obstacle(count,b);	//OBSTACLE\'S CONDITIONS

	}
	return player;	//RETURNS THE WINNER
}


			//PLAYS THE GAME COMPUTER VS PLAYER
int playGameComp(bool end,string b[][30], int player1, int player2,bool &endGame)
{
	const int rows = 36;	//AMOUNT OF ROWS
	const int cols = 30;	//AMOUNT OF COLUMNS

	int count = 0;	//COUNT INTERVALS
	int x = -1;	//X-AXIS BALL MOVEMENT
	int y = -1;	//Y-AXIS BALL MOVEMENT
	
	int xstart = 15;	//X-AXIS START POINT
	int ystart = 28;	//Y-AXIS START POINT
	
	int player;	//WINNER OF GAME

	while(end==false)
	{
		
		boardComp(b,rows,cols,player1,player2);	//DISPLAYS THE BOARD ON CONSOLE COMPUTER VS PLAYER
		pongPaddlesComp(10,end,b,xstart,x,endGame);	//MAKES THE PADDLES MOVE COMPUTER VS PLAYER
		ballMove(b,x,y,xstart,ystart);	//MOVES THE BALL
		_sleep(10);	//SLEEPS THE CONSOLE
		clearScreen();	//CLEARS THE SCREEN
		player = winnerComp(ystart,end);//DETERMINES THE WINNER FOR EACH MATCH COMPUTER VS PLAYER
		obstacle(count,b);	//OBSTACLE\'S CONDITIONS

	}
	return player;	//RETURNS THE WINNER
}'
);

echo($code);
?>