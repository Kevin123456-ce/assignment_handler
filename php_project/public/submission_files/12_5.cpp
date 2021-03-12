#include <iostream>
#include <iomanip>
using namespace std;

class SavingAccount{
    
    static float annualInterestRate;
    float savingsBalance;
    public:
    SavingAccount(float balance)
    {
     savingsBalance = balance;
    }
    float calculateMonthlyInterest()
    {
      float x;
        x = savingsBalance * annualInterestRate/12;
        savingsBalance += x;
        return savingsBalance;
    }
    static void modifyInterestRate(float interestRate) 
    {
      annualInterestRate = interestRate;
    }
};
float SavingAccount::annualInterestRate;

int main() 
{
    float interestRate, savingBalance, newInterestRate;
    
    cin >> interestRate >> savingBalance >> newInterestRate;
    
    SavingAccount::modifyInterestRate(interestRate);
    SavingAccount sa(savingBalance);
    cout << setprecision(1) << fixed << sa.calculateMonthlyInterest() << endl;
    sa.modifyInterestRate(newInterestRate);
    cout << setprecision(1) << fixed << sa.calculateMonthlyInterest() << endl;
    
    return 0;
}
