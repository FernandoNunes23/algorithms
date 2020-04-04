using System;
using System.Collections.Generic;
using System.IO;
class Solution {

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
        
        for(int i = 0; i < numberOfVertices; i++) {
            int pickedVertex = minimumDistance(distance, sptSet);
            sptSet[pickedVertex] = true;

            if (distance[pickedVertex] == int.MaxValue) {
                distance[pickedVertex] = -1;
                continue;
            }
                        
            for (int j = 0; j < numberOfVertices; j++) {
                if (graph[pickedVertex, j] == 1 || graph[j, pickedVertex] == 1) {
                    int newDistance = distance[pickedVertex] + 6;

                    if (newDistance < distance[j]) {
                        distance[j] = newDistance;
                    }
                }
            }
        }

        for (int i = 0; i < numberOfVertices; i++) 
        {
            if (i != src) {
                Console.Write(distance[i] + " ");   
            }
        }
    }

    int minimumDistance(int[] distance, bool[] sptSet) {
        int minDistance = int.MaxValue;
        int minDistanceVertex = 0;
        
        for (int i = 0; i < distance.Length; i++) { 
            if(sptSet[i] == false && distance[i] <= minDistance) {
                minDistance = distance[i];
                minDistanceVertex = i;
            }
        }
        
        return minDistanceVertex;
    }

    int[, ] mountGraph(int n, int m) {
        int[, ] graph = new int[n, n];
        
        for (int i = 0; i < m; i++) {
            string[] e = Console.ReadLine().Split(' ');
            int u = Convert.ToInt32(e[0]) - 1;
            int v = Convert.ToInt32(e[1]) - 1;

            graph[u, v] = 1;
            graph[v, u] = 1;
        }
        
        return graph;
    }

    static void Main(String[] args) {
        /* Enter your code here. Read input from STDIN. Print output to STDOUT. Your class should be named Solution */
        int q = Convert.ToInt32(Console.ReadLine());

        for (int i = 0; i < q; i++) {
            string[] a = Console.ReadLine().Split(' ');

            int n = Convert.ToInt32(a[0]);
            int m = Convert.ToInt32(a[1]);

            Solution s = new Solution();

            int[, ] graph = s.mountGraph(n, m);

            int src = Convert.ToInt32(Console.ReadLine()) - 1;

            s.dijkstra(graph, n, src);
            Console.Write("\n");  
        }
    }
}
