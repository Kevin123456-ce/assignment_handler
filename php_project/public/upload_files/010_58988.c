#include <stdio.h>
#include <string.h>
#include <math.h>
#include <stdlib.h>

void rotate_array(char str[], int even_index_rotations, int odd_index_rotations)
{
    // Write code here to rotate characters at even index by even_index_rotations
    // and characters at odd index by odd_index_rotations in the array.
    // Consider index starting from 0, i.e. first character in the array is at 0 index.
    // Use array traversing method.
    // Do not use array indexation method or pointer offset method.
    // Look at example for more clarity
    int l,i,j=0,k=0,l1,l2,x,y;
    char str1[20],str2[20],even_str[20],odd_str[20];
    char *ptr1,*ptr2,*ptr;
    char *even_ptr,*odd_ptr;
    ptr=str;
    l=strlen(str);
    for(i=0;i<l;i++)
    {
        if(i%2 == 0)
        {
            str1[j]=*ptr;
            l1=strlen(str1);
           // printf("%s\n",str1);
            ptr++;
            j++;
        }
        else
        {
            str2[k]=*ptr;
            l2=strlen(str2);
          //  printf("%s\n",str2);
            ptr++;
            k++;
        }
    }
    if(odd_index_rotations>l2)
        odd_index_rotations=odd_index_rotations-l2;
    
    ptr1=str1;
    ptr2=str2;
    for(i=0;i<2;i++)
    {
         if(i%2 == 0)
         {
          for(j=0;j<l1;j++)
          {
              if(ptr1+even_index_rotations < str1+l1)
              {
                  if(even_index_rotations<l1)
                  {
                      k=j+even_index_rotations;
                      even_str[k]=*ptr1;
                      ptr1++;
                  }
              }
              else
              {
                  x=j+even_index_rotations-l1;
                  even_str[x]=*ptr1;
                  ptr1++;
              }
          }
        }
        else
        {
          for(j=0;j<l2;j++)
          {
              if(ptr2+odd_index_rotations < str2+l2)
              {
                     k=j+odd_index_rotations;
                     odd_str[k]=*ptr2;
                     ptr2++;
              }
              else
              {
                     k=j+odd_index_rotations-l2;
                     odd_str[k]=*ptr2;
                     ptr2++;
              }
          }
        }
        even_ptr=even_str;
        odd_ptr=odd_str;
    }
    for(i=0;i<l;i++,even_ptr++,odd_ptr++)
    {
        printf("%c%c",*even_ptr,*odd_ptr);
    }
}

int main() {

    /* Enter your code here. Read input from STDIN. Print output to STDOUT */    
    char str[30];
    int m,n;
    scanf("%[^\n]",str);
    scanf("%d %d",&m,&n);
    rotate_array(str,m,n);
    return 0;
}
