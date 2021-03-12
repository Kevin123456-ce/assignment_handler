#include<stdio.h>
int main()
{
	FILE *fp;
	int n;
	char c;
	fp=fopen("try.txt","r");
	printf("enter a value of n");
	scanf("%d",&n);
	fseek(fp,n,0);
	while(n>=0)
	{
	 c=fgetc(fp);
	 printf("%c ",c);
	 fseek(fp,n-1,0);
	 n--;
	}
	fclose(fp);
	return 0;
}
