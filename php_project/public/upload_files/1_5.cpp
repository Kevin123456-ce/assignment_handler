#include<iostream>
#include<cstring>
#include <algorithm>
using namespace std;

class Student{
     public:
    string name;
    int rollNo;
};
class ClassRoom
{
   Student std[10];
    int j=0;
    public:
     void addStudent(string name_,int roll)
     {
          std[j].name = name_; 
          std[j].rollNo = roll;
           j++;
      }
    Student* getAllStudents()
    {
        return std;   
    } 
};

int main()
{
    string name;
    char temp[20];
    int rollNo, N, i;
    Student * students;
    ClassRoom classRoom;
    i=0;
    while(getline(cin, name) && cin.getline(temp,20)){
        rollNo = atoi(temp);
        classRoom.addStudent(name, rollNo);
        i++;
    }
    N = i;
    students = classRoom.getAllStudents();
    for(int i=0 ; i < N; i++){
          cout << (students+i)->rollNo  << " - " << (students+i)->name;
          if(i<N-1)
              cout<<endl;
    }
    return 0;
}
