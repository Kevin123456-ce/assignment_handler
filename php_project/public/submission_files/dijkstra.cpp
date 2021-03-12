#include<stdio.h> 
#include<stdlib.h> 
#include<string.h> 
#include<math.h> 
int n; 
void print_path(int path[],int index) 
{     
    if(path[index]==0)      
	    return;     
	print_path(path,path[index]);     
	printf("->%d",index); 
} 
void Shortest_Distance(int arr[10][10],int source) 
{     
    int i,select[n+1],path[n+1],distance[n+1],j,min=1000,adj;     
	for(i=1;i<=n;i++)     
	{     
	    distance[i]=1000;         
		select[i]=0;         
		path[source]=0;     
	}     
	distance[source]=0;     
	for(j=1;j<=n;j++)     
	{     
	    for(i=1;i<=n;i++)        
		{         
		    if(select[i]==0 && distance[i]<=min)         
			{             
			    min=distance[i]; 
                adj=i;         
			}        
		}        
		select[adj]=1;        
		for(i=1;i<=n;i++)     
		{       
	        if(select[i]==0 && arr[adj][i]!=-1 && (distance[adj]+arr[adj][i])<distance[i])            
			{           
		        distance[i] = distance[adj]+arr[adj][i];                
				path[i]=adj;            
			}        
		}         
		min=1000;     
	}     
	for(i=1;i<=n;i++)     
	{        
	    printf("%d\t%d\t%d",i,distance[i],source);         
		print_path(path,i);         
		printf("\n");     
	}      
} 
int main()   
{    
    int array[10][10],source,i,j;     
	scanf("%d",&n);     
	for(i=1;i<=n;i++)     
	{        
	    for(j=1;j<=n;j++)        
		{         
		    scanf("%d",&array[i][j]);            
			if(i!=j && array[i][j]==0)            
			{                
			    printf("Weight of the edge %d <-> %d can not be 0",i,j);                
				exit (0);           
			}          
			if(array[i][j]<-1)            
			{                
			    printf("Weight of the edge %d <-> %d can not be negative",i,j); 
               exit (0); 
            }            
			if(i==j && array[i][j]!=0)            
			{               
			    printf("Weight of the edge %d <-> %d must be 0",i,j);                
				exit (0);        
		    }       
		}     
	}     
	scanf("%d",&source);     
	Shortest_Distance(array,source); 
} 
