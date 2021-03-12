#include <iostream>

using namespace std;

int main() {
    /* Enter your code here. Read input from STDIN. Print output to STDOUT */
    long long int n;
    int arr[1000];
    int i,j=0,k=0;
    cin>>n;
    while(n!=0)
    {
        i=n%10;
        arr[j]=i;
        n=n/10;
        j++;
         
    }
    for(i=0;i<j;i++)
    {
        if(arr[i]!=0){
           cout<<arr[i];
            k=1;
         }
        if(arr[i]==0 && k==1)
           cout<<arr[i];
          
    }
    return 0;
}
