using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Globalization;

public class HeapSort 
{ 
    List<int> arr;

    public HeapSort() {
        arr = new List<int>();
    }

    public int[] sort(int[] arr) 
    { 
        int n = arr.Length; 
  
        // Build heap (rearrange array) 
        for (int i = n / 2 - 1; i >= 0; i--) 
            heapify(arr, n, i); 
  
        // One by one extract an element from heap 
        for (int i=n-1; i>0; i--) 
        { 
            // Move current root to end 
            int temp = arr[0]; 
            arr[0] = arr[i]; 
            arr[i] = temp; 
  
            // call max heapify on the reduced heap 
            heapify(arr, i, 0); 
        }

        return arr; 
    } 

    public int[] insert(int v) {
        this.arr.Add(v);
        int[] a = this.sort(this.arr.ToArray());

        return a;
    }
  
    // To heapify a subtree rooted with node i which is 
    // an index in arr[]. n is size of heap 
    void heapify(int[] arr, int n, int i) 
    { 
        int largest = i; // Initialize largest as root 
        int l = 2*i + 1; // left = 2*i + 1 
        int r = 2*i + 2; // right = 2*i + 2 
  
        // If left child is larger than root 
        if (l < n && arr[l] > arr[largest]) 
            largest = l; 
  
        // If right child is larger than largest so far 
        if (r < n && arr[r] > arr[largest]) 
            largest = r; 
  
        // If largest is not root 
        if (largest != i) 
        { 
            int swap = arr[i]; 
            arr[i] = arr[largest]; 
            arr[largest] = swap; 
  
            // Recursively heapify the affected sub-tree 
            heapify(arr, n, largest); 
        } 
    } 
} 

class Solution {

    /*
     * Complete the runningMedian function below.
     */
    static double[] runningMedian(int[] a) {
        int[] orderedArray = new int[a.Length];
        double[] medianPoints = new double[a.Length];
        HeapSort h = new HeapSort();

        for (int i = 0; i < a.Length; i++) {
            orderedArray = h.insert(a[i]);

            if ((orderedArray.Length % 2) == 0 && i != 2) {
                Console.WriteLine("i " + i);
                int x = orderedArray[(orderedArray.Length / 2 - 1)];
                int y = orderedArray[(orderedArray.Length / 2)];

                medianPoints[i] = (double) (x + y) / 2; 
            } else {
                int z = 0; 
                
                if (i != 0) {
                    z = Convert.ToInt32(Math.Round((double) orderedArray.Length/2 , MidpointRounding.AwayFromZero));

                    z = z-1;
                }

                if (i == 2) {
                    z = 1;
                }

                Console.WriteLine(z);

                medianPoints[i] = (double) a[z];
            }
        }

        return medianPoints;
    }

    static void Main(string[] args) {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int aCount = Convert.ToInt32(Console.ReadLine());

        int[] a = new int [aCount];

        for (int aItr = 0; aItr < aCount; aItr++) {
            int aItem = Convert.ToInt32(Console.ReadLine());
            a[aItr] = aItem;
        }

        double[] result = runningMedian(a);

        foreach (double r in result) {
            //textWriter.WriteLine(r.ToString("F1"));
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
