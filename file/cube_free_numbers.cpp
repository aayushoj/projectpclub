#include <stdio.h>
#include <iostream>
#include <algorithm>
#define N 1000000
using namespace std;

int main(){
	int i,j,n,l,x;
	int flag[1000010];
	for(i=1;i<=N;i++)
		flag[i]=1;
	for(i=2;i<=101;i++){
		x=i*i*i;
		for(j=1;x*j<=N;j++)
			flag[x*j]=0;
	}
	for(i=j=1;i<=N;i++){
		if(flag[i]){
			flag[i]=j;
			j++;
		}
	}
	scanf("%d",&n);
	for(l=0;l<n;l++){
		scanf("%d",&x);
		if(flag[x]){
			printf("Case %d: %d\n",l+1,flag[x]);
		}
		else{
			printf("Case %d: Not Cube Free\n",l+1);
		}	
	}
	return 0;
}
