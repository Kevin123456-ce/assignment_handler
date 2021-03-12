#include<bits/stdc++.h>
using namespace std;
int n;
void print_path(int path[],int i)
{
	if(path[i]==-1)
	{
		return;
	}
	print_path(path,path[i]);
	cout<<"--> "<<i;
}
void Dijkstra(vector<vector<int> >graph,int source)
{
	int i,selected[n+1],path[n+1],distance[n+1],adjacent,min=999;
	for(int i=1;i<=n;i++)
	{
		distance[i]=999;
		selected[i]=0;
	}
	path[source]=-1;
	distance[source]=0;
	for(int i=1;i<=n;i++)
	{
		for(int j=1;j<=n;j++)
		{
			if(selected[j]==0 && distance[j]<=min)
			{
				adjacent = j;
				min = distance[j];
			}
		}
		selected[adjacent]=1;
		for(int j=1;j<=n;j++)
		{
			if(selected[j]==0 && graph[adjacent][j]!=-1 && (distance[adjacent]+graph[adjacent][j])<distance[j])
			{
				path[j] = adjacent;
				distance[j] = distance[adjacent] + graph[adjacent][j];
			}
		}
		min=999;
	}
	for(int i=1;i<=n;i++)
	{
		cout<<i<<"  "<<distance[i]<<"  "<<source;
		print_path(path,i);
		cout<<endl;
	}
}
int main()
{
	cin>>n;
	vector<vector<int> >graph(n+1,vector<int>(n+1));
	int i,j;
	for(int i=1;i<=n;i++)
	{
		for(int j=1;j<=n;j++)
		{
			cin>>graph[i][j];
			if(i!=j && graph[i][j]==0)
			{
				cout<<"Weight of the edge "<<i<<" - "<<j<<" can not be 0!";
				exit (0);
			}
			if(i==j && graph[i][j]!=0)
			{
				cout<<"Weight of the edge "<<i<<" - "<<j<<" must be 0!";
				exit (0);
			}
			if(graph[i][j]<-1)
			{
				cout<<"Weight of the edge "<<i<<" - "<<j<<" can't less than -1!";
				exit (0);
			}
		}
	}
	for(int i=1;i<=n;i++)
	{
		for(int j=1;j<=n;j++)
		{
			cout<<graph[i][j]<<" ";
		}
		cout<<endl;
	}
	for(i=1;i<=n;i++)
	{
		cout<<"Source vertex as "<<i<<":"<<endl;
		Dijkstra(graph,i);
	}
}
