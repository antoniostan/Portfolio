#include<iostream>
#include<string>
#include"fBullCowGame.h"

using FText = std::string;
using int32 = int;

void PrintIntro();
void PlayGame();
FText GetGuess();
bool AskToPlayAgain();

FBullCowGame BCGame;

//the entry point of application
int main()
{
	std::cout << BCGame.GetCurrentTry();
	bool bPlayAgain = false;
	do
	{
		PrintIntro();

		PlayGame();

		bPlayAgain = AskToPlayAgain();
	} while (bPlayAgain);
	return 0;
}
//exit the aplication

//introduce the game
void PrintIntro()
{
	std::cout << "Welcome to Bulls and Cows, a fun word game!";
	std::cout << std::endl;
	std::cout << "Can you guess the " << BCGame.GetHiddenWordLength();
	std::cout << " letter isogram I'm thinking of?" << std::endl;
	std::cout << "You have 5 tries. Be careful!" << std::endl;
	std::cout << std::endl;
	return;
}


void PlayGame()
{
	BCGame.Reset();
	int32 MaxTries = BCGame.GetMaxTries();
	std::cout << "You have " << MaxTries <<" tries" << std::endl;
	std::cout << "Good luck!" << std::endl;
	for (int32 count = 1; count <= MaxTries; count++)
	{
		FText Guess = GetGuess();

		EGuessStatus Status = BCGame.CheckGuessValidity(Guess);

		//submit valid guess to the game and recieve counts
		FBullCowCount BullCowCount = BCGame.SubmitGuess(Guess);
		std::cout << "Bulls: " << BullCowCount.Bulls;
		std::cout << " Cows: " << BullCowCount.Cows << std::endl;
		std::cout << std::endl;
	}

	//TODO summarise the game
}

FText GetGuess()
{
	int32 CurrentTry = BCGame.GetCurrentTry();
	std::cout << "Try " << CurrentTry << std::endl;
	std::cout << "Type your guess buddy: ";
	FText Guess = "";
	std::getline(std::cin, Guess);
	return Guess;
}

bool AskToPlayAgain()
{
	std::cout << "Do you wanna play again? (y/n)   " << std::endl;
	FText Response = "";
	std::getline(std::cin, Response);
	return (Response[0] == 'y') || (Response[0] == 'Y');
}


