<h1>main.py</h1>
<?php
$code = str_replace('<','&lt;','#JONATHAN AGUIRRE
#12/1/2013
#FINAL PROJECT

import random

#######  TIC TAC TOE GLOBAL VARIABLES   #########

cordinates = ["1", "4", "7", "2", "5", "8", "3", "6", "9"] #CORDINATES FOR BOARD
player1Box = [] #PLAYER 1 CHOSEN CORDINATES
player2Box = [] #PLAYER 2 CHOSEN CORDINATES
one =" "    #CORDINATE VALUE
two =" "    #CORDINATE VALUE
three =" "  #CORDINATE VALUE
four =" "   #CORDINATE VALUE
five =" "   #CORDINATE VALUE
six =" "    #CORDINATE VALUE
seven =" "  #CORDINATE VALUE
eight =" "  #CORDINATE VALUE
nine =" "   #CORDINATE VALUE
winner = False  #IF THERE IS A WINNER

#######  HANGMAN GLOBAL VARIABLES   #########

lettersChosen = ""  #LETTERS CHOSEN
guess = 1   #NUMBER OF GUESSES


########################   TIC TAC TOE   ######################################
        #INTRO MESSAGE
def introTicTacToe():
    
    print(""" \n
\t  ________________   _________   ______   __________  ______
\t /_  __/  _/ ____/  /_  __/   | / ____/  /_  __/ __ \/ ____/
\t  / /  / // /        / / / /| |/ /        / / / / / / __/   
\t / / _/ // /___     / / / ___ / /___     / / / /_/ / /___   
\t/_/ /___/\____/    /_/ /_/  |_\____/    /_/  \____/_____/


\t\t\t\t_1_|_2_|_3_\n
\t\t\t\t_4_|_5_|_6_\n
\t\t\t\t 7 | 8 | 9 \n""")

        #DISPLAYS THE BOARD
def displayBoard():
    print("\t\t\t\t \n"
            "_"+one+"_|_"+two+"_|_"+three+"_\t\t\t_1_|_2_|_3_\n"
            "_"+four+"_|_"+five+"_|_"+six+"_\t\t\t_4_|_5_|_6_\n"
            " "+seven+" | "+eight+" | "+nine+" \t\t\t 7 | 8 | 9 \n")


        #GETS THE PLAYERS MOVE
def getPlayer1Move():
    while True:
        player1Choice = input ("Enter your cordinates player 1 to place your \'o\':")
        if player1Choice in cordinates:     #CHECKS IF MOVE IS VALID
            cordinates.remove(player1Choice)    #REMOVES THE MOVE FROM ARRAY CORDINATES
            player1Box.append(player1Choice)    #ADDS MOVE TO PLAYER1 ARRAY
            return player1Choice    #RETURNS THE PLAYERS MOVE
        else:   #DISPLAYING INVALID MOVE
            print ("Wrong cordinates!")


        #PLACES PLAYERS 1 MOVE ON THE BOARD
def OMoveBoard1(player1Choice):
    if player1Choice == "1":
        global one
        one = "o"
    elif player1Choice == "2":
        global two
        two = "o"
    elif player1Choice == "3":
        global three
        three = "o"
    elif player1Choice == "4":
        global four
        four = "o"
    elif player1Choice == "5":
        global five
        five = "o"
    elif player1Choice == "6":
        global six
        six = "o"
    elif player1Choice == "7":
        global seven
        seven = "o"
    elif player1Choice == "8":
        global eight
        eight = "o"
    elif player1Choice == "9":
        global nine
        nine = "o"


        #CHECKS IF PLAYER 1 WINS
def player1Win():
    if "1" in player1Box and "4" in player1Box and "7" in player1Box:
        print ("\n\t\tCongrates player1 you have won!")
        global winner
        winner = True   #ENDS THE GAME
    elif "2" in player1Box and "5" in player1Box and "8" in player1Box:
        print ("\n\t\tCongrates player1 you have won!")
        winner = True   #ENDS THE GAME
    elif "3" in player1Box and "6" in player1Box and "9" in player1Box:
        print ("\n\t\tCongrates player1 you have won!")
        winner = True   #ENDS THE GAME
    elif "1" in player1Box and "2" in player1Box and "3" in player1Box:
        print ("\n\t\tCongrates player1 you have won!")
        winner = True   #ENDS THE GAME
    elif "4" in player1Box and "5" in player1Box and "6" in player1Box:
        print ("\n\t\tCongrates player1 you have won!")
        winner = True   #ENDS THE GAME
    elif "7" in player1Box and "8" in player1Box and "9" in player1Box:
        print ("\n\t\tCongrates player1 you have won!")
        winner = True   #ENDS THE GAME
    elif "1" in player1Box and "5" in player1Box and "9" in player1Box:
        print ("\n\t\tCongrates player1 you have won!")
        winner = True   #ENDS THE GAME
    elif "3" in player1Box and "5" in player1Box and "7" in player1Box:
        print ("\n\t\tCongrates player1 you have won!")
        winner = True   #ENDS THE GAME
    elif cordinates == []:
        print ("\n\t\tTIE")
        winner = True   #ENDS THE GAME


        #GETS THE PLAYERS MOVE
def getPlayer2Move():
    displayBoard()

    while True:
        player2Choice = input ("Enter your cordinates player 2 to place your \'x\':")
        if player2Choice in cordinates:     #CHECKS IF MOVE IS VALID
            cordinates.remove(player2Choice)    #REMOVES THE MOVE FROM ARRAY CORDINATES
            player2Box.append(player2Choice)    #ADDS MOVE TO PLAYER2 ARRAY
            return player2Choice    #RETURNS THE PLAYERS MOVE
        else:   #DISPLAYING INVALID MOVE
            print ("Wrong cordinates!")


        #PLACES PLAYERS 2 MOVE ON THE BOARD
def OMoveBoard2(player2Choice):
    if player2Choice == "1":
        global one
        one = "x"
    elif player2Choice == "2":
        global two
        two = "x"
    elif player2Choice == "3":
        global three
        three = "x"
    elif player2Choice == "4":
        global four
        four = "x"
    elif player2Choice == "5":
        global five
        five = "x"
    elif player2Choice == "6":
        global six
        six = "x"
    elif player2Choice == "7":
        global seven
        seven = "x"
    elif player2Choice == "8":
        global eight
        eight = "x"
    elif player2Choice == "9":
        global nine
        nine = "x"


        #CHECKS IF PLAYER 2 WINS
def player2Win():
    if "1" in player2Box and "4" in player2Box and "7" in player2Box:
        print ("\n\t\tCongrates player2 you have won!")
        global winner
        winner = True   #ENDS THE GAME
    elif "2" in player2Box and "5" in player2Box and "8" in player2Box:
        print ("\n\t\tCongrates player2 you have won!")
        winner = True   #ENDS THE GAME
    elif "3" in player2Box and "6" in player2Box and "9" in player2Box:
        print ("\n\t\tCongrates player2 you have won!")
        winner = True   #ENDS THE GAME
    elif "1" in player2Box and "2" in player2Box and "3" in player2Box:
        print ("\n\t\tCongrates player2 you have won!")
        winner = True   #ENDS THE GAME
    elif "4" in player2Box and "5" in player2Box and "6" in player2Box:
        print ("\n\t\tCongrates player2 you have won!")
        winner = True   #ENDS THE GAME
    elif "7" in player2Box and "8" in player2Box and "9" in player2Box:
        print ("\n\t\tCongrates player2 you have won!")
        winner = True   #ENDS THE GAME
    elif "1" in player2Box and "5" in player2Box and "9" in player2Box:
        print ("\n\t\tCongrates player2 you have won!")
        winner = True   #ENDS THE GAME
    elif "3" in player2Box and "5" in player2Box and "7" in player2Box:
        print ("\n\t\tCongrates player2 you have won!")
        winner = True   #ENDS THE GAME
    elif cordinates == []:
        print ("\n\t\tTIE")
        winner = True   #ENDS THE GAME


        #DISPLAYS THE FINAL WINNER ON BOARD
def displayFinalBoard():
    print(

    "\t\t\t_",one,"_|_",two,"_|_",three,"_\n"
    "\t\t\t_",four,"_|_",five,"_|_",six,"_\n"
    "\t\t\t ",seven," | ",eight," | ",nine," \n")


        #RESETS THE BOARD
def resetBoard():
    global cordinates,player1Box,player2Box,one,two,three,four,five,six,seven,eight,nine,winner

    cordinates = ["1", "4", "7", "2", "5", "8", "3", "6", "9"] #CORDINATES FOR BOARD
    player1Box = [] #PLAYER 1 CHOSEN CORDINATES
    player2Box = [] #PLAYER 2 CHOSEN CORDINATES
    one =" "    #CORDINATE VALUE
    two =" "    #CORDINATE VALUE
    three =" "  #CORDINATE VALUE
    four =" "   #CORDINATE VALUE
    five =" "   #CORDINATE VALUE
    six =" "    #CORDINATE VALUE
    seven =" "  #CORDINATE VALUE
    eight =" "  #CORDINATE VALUE
    nine =" "   #CORDINATE VALUE
    winner = False  #IF THERE IS A WINNER


        #PLAYS TIC TAC TOE
def playTicTacToe():
    introTicTacToe() #INTRO MESSAGE
    while True:
        player1Choice = getPlayer1Move()    #GETS THE PLAYERS MOVE
        OMoveBoard1(player1Choice)  #PLACES PLAYERS 1 MOVE ON THE BOARD
        player1Win()    #CHECKS IF PLAYER 1 WINS
        if winner == True:
            break
        player2Choice = getPlayer2Move()    #GETS THE PLAYERS MOVE
        OMoveBoard2(player2Choice)  #PLACES PLAYERS 2 MOVE ON THE BOARD
        player2Win()    #CHECKS IF PLAYER 2 WINS
        if winner == True:
            break
        displayBoard()  #DISPLAYS THE BOARD
    displayFinalBoard() #DISPLAYS THE FINAL WINNER ON BOARD
    input("\n\n\t\t\tPRESS ENTER TO GO TO MAIN MENU")
    print("\n"*30)
    resetBoard()    #RESETS THE BOARD


###########################   HANGMAN   ######################################

        #INTRO MESSAGE
def introHangman():
    print("""\n
                __  _____    _   __________  ______    _   __
               / / / /   |  / | / / ____/  |/  /   |  / | / /
              / /_/ / /| | /  |/ / / __/ /|_/ / /| | /  |/ / 
             / __  / ___ |/ /|  / /_/ / /  / / ___ |/ /|  /  
            /_/ /_/_/  |_/_/ |_/\____/_/  /_/_/  |_/_/ |_/
                            ____
                            |  | 
                            O  |
                           -|- |
                           / \ |
                           ____|_____
                          /          \ 
                         /            \

                            ~TOPICS~

                             SPORT
                             ANIMAL
                             BODY PART
                             FOOD
                             CAR MODEL""")


        #GETS THE TOPIC AND WORD 
def getTopic():
    while True:
        topic = input("\nPlaese enter the topic you wish to play: ")
        topic = topic.upper()   #MAKES WORD ALL UPPERCASE
        
        if topic == "ANIMAL":
            file = open("animal.txt",\'r\')   #OPENS FILE
            line = random.randrange(1,5)    #RANDOMS THE WORD FROM FILE
            for num in range(line):
                word = file.readline()  #GETS THE SPECIFIC WORD
            file.close()    #CLOSES THE FILE
            return word     #RETURNS THE WORD
        
        elif topic == "SPORT":
            file = open("sport.txt",\'r\')    #OPENS FILE
            line = random.randrange(1,5)    #RANDOMS THE WORD FROM FILE
            for num in range(line):
                word = file.readline()  #GETS THE SPECIFIC WORD
            file.close()    #CLOSES THE FILE
            return word     #RETURNS THE WORD

        elif topic == "BODY PART":
            file = open("body.txt",\'r\')    #OPENS FILE
            line = random.randrange(1,5)    #RANDOMS THE WORD FROM FILE
            for num in range(line):
                word = file.readline()  #GETS THE SPECIFIC WORD
            file.close()    #CLOSES THE FILE
            return word     #RETURNS THE WORD

        elif topic == "CAR MODEL":
            file = open("car.txt",\'r\')    #OPENS FILE
            line = random.randrange(1,5)    #RANDOMS THE WORD FROM FILE
            for num in range(line):
                word = file.readline()  #GETS THE SPECIFIC WORD
            file.close()    #CLOSES THE FILE
            return word     #RETURNS THE WORD

        elif topic == "FOOD":
            file = open("food.txt",\'r\')    #OPENS FILE
            line = random.randrange(1,5)    #RANDOMS THE WORD FROM FILE
            for num in range(line):
                word = file.readline()  #GETS THE SPECIFIC WORD
            file.close()    #CLOSES THE FILE
            return word     #RETURNS THE WORD
        else:
            print("\t\tSorry!That topic is not on the list...")


        #DISPLAYS AN IMAGE
def bodyPic(num,soFar,word):
    global lettersChosen

    if num == 1:    #FIRST GUESS
        print("""\n\n
            HANGMAN

            ____
            |  | 
               |
               |
               |
           ____|_____
          /          \ 
         /            \ \n"""
"\t   ",soFar,"\n\t",lettersChosen)
    elif num == 2:  #SECOND WRONG GUESS
        print("""\n\n
            HANGMAN

            ____
            |  | 
            O  |
               |
               |
           ____|_____
          /          \ 
         /            \ \n"""
"\t   ",soFar,"\n\t",lettersChosen)
    elif num == 3:  #THIRD WRONG GUESS
        print("""\n\n
            HANGMAN

            ____
            |  | 
            O  |
            |  |
               |
           ____|_____
          /          \ 
         /            \ \n"""
"\t   ",soFar,"\n\t",lettersChosen)
    elif num == 4:  #FOURTH WRONG GUESS
        print("""\n\n
            HANGMAN

            ____
            |  | 
            O  |
           -|  |
               |
           ____|_____
          /          \ 
         /            \ \n"""
"\t   ",soFar,"\n\t",lettersChosen)
    elif num == 5:  #FIFTH WRONG GUESSS
        print("""\n\n
            HANGMAN

            ____
            |  | 
            O  |
           -|- |
               |
           ____|_____
          /          \ 
         /            \ \n"""
"\t   ",soFar,"\n\t",lettersChosen)
    elif num == 6:  #SIXTH WRONG GUESS
        print("""\n\n
            HANGMAN

            ____
            |  | 
            O  |
           -|- |
           /   |
           ____|_____
          /          \ 
         /            \ \n"""
"\t   ",soFar,"\n\t",lettersChosen)
    elif num == 7:  #FINAL WRONG GUESS
        print("""\n\n
            HANGMAN

            ____
            |  | 
            O  |
           -|- |
           / \ |
           ____|_____
          /          \ 
         /            \ \n"""
"\t   ",soFar,"\n\t",lettersChosen,"\n\t   ",word)


        #GETS THE LETTERS FROM PLAYER    
def getLettter(word):
    global guess    #NUMBER OF GUESSES
    global lettersChosen    #LETTER CHOSEN

    winner = 2  #WINNER OF GAME
    length = len(word)-1    #LENGTH OF WORD
    soFar = "-"*length  #WORDS GUESSED
    bodyPic(guess,soFar,word)   #DISPLAYS AN IMAGE

    while guess < 7 and winner != 1:

        while True:
            letter = input("\nPlease enter a letter to get your guess: ")
            letter = letter.upper() #UPPERCASES THE LETTER

            if len(letter) == 1:    #VALIDATES IF PLAYERS ENTERED 1 CHARACTER
                lettersChosen += (letter+" ")  #STORES ALL THE LETTERS CHOSEN
                guess += 1  #ADDS ONE TO THE AMOUNT OF GUESSES

                if letter in word:
                    new = ""    #TEMP VARIABLE FOR THE WORD
                    guess -= 1  #REMOVES A GUESS

                    for char in range(length):

                        if letter == word[char]:
                            new += letter   #ADDS THE LETTER TO TEMP VARIABLE
                        else:
                            new += soFar[char]  #ADDS \'-\' TO TEMP VARIABLE

                    soFar = new     #GETS THE TEMP VARIABLE

                    if "-" not in soFar:
                        winner = 1  #PLAYER HAS WON
                    break   #BREAKS THE LOOP
                else:
                    break   #BREAKS THE LOOP
            else:   #DISPLAY ERROR FOR TOO MANY LETTERS AT ONCE
                print("\t\tSorry!Only one letter at a time...")
        bodyPic(guess,soFar,word)   #DISPLAYS AN IMAGE

    return winner #RETURNS THE WINNER


        #SHOWS IF PLAYER WON OR LOST
def winnerLoser(winner):
    if winner == 1:
        print("""
__  ______  __  __   _       ______  _   __   __
\ \/ / __ \/ / / /  | |     / / __ \/ | / /  / /
 \  / / / / / / /   | | /| / / / / /  |/ /  / / 
 / / /_/ / /_/ /    | |/ |/ / /_/ / /|  /  /_/  
/_/\____/\____/     |__/|__/\____/_/ |_/  (_) """)
    else:
        print("""
__  ______  __  __   __    ____  ___________   __
\ \/ / __ \/ / / /  / /   / __ \/ ___/_  __/  / /
 \  / / / / / / /  / /   / / / /\__ \ / /    / / 
 / / /_/ / /_/ /  / /___/ /_/ /___/ // /    /_/  
/_/\____/\____/  /_____/\____//____//_/    (_) """)


        #RESETS THE GAME
def resetGame():
    global lettersChosen,guess

    lettersChosen = ""  #LETTERS CHOSEN
    guess = 1   #NUMBER OF GUESSES
    

       #PLAYS HANGMAN 
def playHangman():
    introHangman() #INTRO MESSAGE
    word = getTopic()  #GETS THE TOPIC AND WORD 
    winner = getLettter(word)   #GETS THE LETTERS FROM PLAYER   
    winnerLoser(winner) #SHOWS IF PLAYER WON OR LOST
    input("\n\n\t\t\tPRESS ENTER TO GO TO MAIN MENU")
    print("\n"*30)
    resetGame()     #RESETS THE GAME


##########################   MAIN MENU   ######################################

        #MENU OPTIONS
def mainMenu():
    print("""
                __  ______    _____   __   __  __________   ____  __
               /  |/  /   |  /  _/ | / /  /  |/  / ____/ | / / / / /
              / /|_/ / /| |  / //  |/ /  / /|_/ / __/ /  |/ / / / / 
             / /  / / ___ |_/ // /|  /  / /  / / /___/ /|  / /_/ /  
            /_/  /_/_/  |_/___/_/ |_/  /_/  /_/_____/_/ |_/\____/

   ___            ________________   _________   ______   __________  ______
  <  /           /_  __/  _/ ____/  /_  __/   | / ____/  /_  __/ __ \/ ____/
  / /  ______     / /  / // /        / / / /| |/ /        / / / / / / __/   
 / /  /_____/    / / _/ // /___     / / / ___ / /___     / / / /_/ / /___   
/_/             /_/ /___/\____/    /_/ /_/  |_\____/    /_/  \____/_____/

   ___               __  _____    _   __________  ______    _   __
  |__ \             / / / /   |  / | / / ____/  |/  /   |  / | / /
  __/ /   ______   / /_/ / /| | /  |/ / / __/ /|_/ / /| | /  |/ / 
 / __/   /_____/  / __  / ___ |/ /|  / /_/ / /  / / ___ |/ /|  /  
/____/           /_/ /_/_/  |_/_/ |_/\____/_/  /_/_/  |_/_/ |_/

   _____             ____  __  ____________
  |__  /            / __ \/ / / /  _/_  __/
   /_ <   ______   / / / / / / // /  / /   
 ___/ /  /_____/  / /_/ / /_/ // /  / /    
/____/            \___\_\____/___/ /_/  \n\n""")

    menu = input("Please enter the menu number you wish to go: ")

    return menu     #RETURNS MENU OPTION


#########################    MAIN    ##########################################

def main():
    print("\n"*100)
    while True:
        menu = mainMenu()   #MENU OPTIONS
        print("\n"*100)
        if menu == "1":
            playTicTacToe() #PLAY TIC TAC TOE
        elif menu == "2":
            playHangman()   #PLAY HANGMAN
        elif menu == "3":
            break   #EXITS THE PROGRAM
        else:   #DISPLAYS ERROR FOR INVALID MENU
            print("\n\t\tSorry! Invalid menu option...")
            

main()'
);

echo($code);
?>
