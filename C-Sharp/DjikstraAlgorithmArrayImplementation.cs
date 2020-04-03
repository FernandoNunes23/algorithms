using System;
using System.IO;
using System.Collections;

public class GFG {
    
    void dijkstra (int[, ] graph, int numberOfVertices, int src) {
        bool[] sptSet = new bool[numberOfVertices]; 
        int[] distance = new int[numberOfVertices];
        
        // Initialize all distances as 
        // INFINITE and stpSet[] as false 
        for (int i = 0; i < numberOfVertices; i++) { 
            distance[i] = int.MaxValue; 
            sptSet[i] = false; 
        } 
        
        distance[src] = 0;
        int minDistance = int.MaxValue;
        
        for(int i = 0; i < numberOfVertices; i++) {
            int pickedVertex = minimumDistance(distance, sptSet);
            
            sptSet[pickedVertex] = true;
            
            for (int j = 0; j < numberOfVertices; j++) {
                if (graph[pickedVertex, j] == 1) {
                    distance[j] = distance[pickedVertex] + 1;
                    
                    if (distance[j] < minDistance && pickedVertex != 0) {
                        minDistance = distance[j];
                    }
                }
            }
        }
        
        Console.WriteLine(minDistance);
    }
    
    int minimumDistance(int[] distance, bool[] sptSet) {
        int minDistance = int.MaxValue;
        int minDistanceVertex = 0;
        
        for (int i = 0; i < distance.Length; i++) { 
            if(sptSet[i] == false && distance[i] < minDistance) {
                minDistance = distance[i];
                minDistanceVertex = i;
            }
        }
        
        return minDistanceVertex;
    }
    
    int[, ] mountGraph(int n) {
        int[, ] graph = new int[n, n];
        
        for (int i = 0; i < n; i++) {
            int nextNumber = i+1;
            
            if (nextNumber < n) {
                graph[i, nextNumber] = 1;   
            }
            
            int number = (i+1) * 3;
            
            if (number <= n) {
                int c = number - 1;
                graph[i, c] = 1;
            }
        }
        
        return graph;
    }
    
    static public void Main () {
        int t = Convert.ToInt32(Console.ReadLine());

        GFG a = new GFG();
        
        for (int i = 0; i < t; i++) {
            int n = Convert.ToInt32(Console.ReadLine());
            int[, ] graph = a.mountGraph(n);
            
            a.dijkstra(graph, n, 0);   
        }
    }
}