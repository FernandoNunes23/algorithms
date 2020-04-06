using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;

class Node {
    public Node left;
    public Node right;
    public int data;
    public int depth;
    
    public Node(int data) {
        this.data = data;
        this.left = null;
        this.right = null;
        this.depth = 0;
    }
}

class Solution {

    static Node insert(Node root, int[][] indexes) {
        Queue<Node> q = new Queue<Node>();
        q.Enqueue(root);

        for (int i = 0; i < indexes.Length; i++) {
            Node a = q.Dequeue();

            if(indexes[i][0] > 0) {
                a.left = new Node(indexes[i][0]);
                a.left.depth = a.depth + 1;
                q.Enqueue(a.left);
            }

            if (indexes[i][1] > 0) {
                a.right = new Node(indexes[i][1]);
                a.left.depth = a.depth + 1;
                q.Enqueue(a.right);
            }

            if (i == 0) {
                root = a;
            }
        }

        return root;
    }

    static int[] inOrderTraversal(Node root, int l, int d) {
        int[] a = new int[l];
        Node n = root;
        bool visitedAllInDepth = false;

        while (visitedAllInDepth == false) {
            for (int i = 1; i <= d; i++) {
                if (n.left) {
                    n = n.left;
                    continue;
                }

                if (n.right) {
                    n = n.right;
                }
            }
        }

        return a;
    }

    /*
     * Complete the swapNodes function below.
     */
    static int[][] swapNodes(int[][] indexes, int[] queries) {
        Node root = new Node(1);
        root.depth = 1;

        root = insert(root, indexes);

        for (int i = 0; i < queries.Length; i++) {
            int k = queries[i];
            int m = 1;

            while (k <= queries.Length) {
                int[] a = inOrderTraversal(root, queries.Length, k);

                m++;
                k = m * k;
            }
        }

        int[][] jaggedArray3 = 
        {
            new int[] { 1, 3, 5, 7, 9 },
            new int[] { 0, 2, 4, 6 },
            new int[] { 11, 22 }
        };

        return jaggedArray3;
    }

    static void Main(string[] args) {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine());

        int[][] indexes = new int[n][];

        for (int indexesRowItr = 0; indexesRowItr < n; indexesRowItr++) {
            indexes[indexesRowItr] = Array.ConvertAll(Console.ReadLine().Split(' '), indexesTemp => Convert.ToInt32(indexesTemp));
        }

        int queriesCount = Convert.ToInt32(Console.ReadLine());

        int[] queries = new int [queriesCount];

        for (int queriesItr = 0; queriesItr < queriesCount; queriesItr++) {
            int queriesItem = Convert.ToInt32(Console.ReadLine());
            queries[queriesItr] = queriesItem;
        }

        int[][] result = swapNodes(indexes, queries);

        textWriter.WriteLine(String.Join("\n", result.Select(x => String.Join(" ", x))));

        textWriter.Flush();
        textWriter.Close();
    }
}
