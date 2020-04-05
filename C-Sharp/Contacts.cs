using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;

class TrieNode {
    Dictionary<char, TrieNode> map;
    char character;
    bool last;
    int numberOfWordsIn;

    public TrieNode(char character) {
        this.map = new Dictionary<char, TrieNode>();
        this.character = character;
        this.last = false;
        this.numberOfWordsIn = 1;
    }

    public TrieNode getNode(char c) {
        return this.map[c];
    }

    public int countNodes() {
        return this.map.Count;
    }

    public void incrementNumberOfWordsIn() {
        this.numberOfWordsIn++;
    }

    public int getNumberOfWordsIn() {
        return this.numberOfWordsIn;
    }

    public bool containsKey(char c) {
        return this.map.ContainsKey(c) ? true : false;
    } 

    public TrieNode addKey(char c) {
        TrieNode newNode = new TrieNode(c);
        this.map.Add(c, newNode);

        return this.map[c];
    }

    public void markAsLastInWord() {
        this.last = true;
    }

    public bool isLastInWord() {
        return this.last;
    }
}

class Trie {

    TrieNode root;

    public Trie() {
        root = new TrieNode(' ');
    }

    public void insert(string s) {
        TrieNode n = root;

        for (int i = 0; i < s.Length; i++) {
            if (n.containsKey(s[i])) {
                n = n.getNode(s[i]);
                n.incrementNumberOfWordsIn();
                continue;
            }

            n = n.addKey(s[i]);

            if (i == (s.Length - 1)) {
                n.markAsLastInWord();
            }
        }
    }

    public int search(string p) {
        TrieNode n = root;

        for (int i = 0; i < p.Length; i++) {
            if (n.containsKey(p[i])) {
                n = n.getNode(p[i]);
            } else {
                return 0;
            }
        }

        return n.getNumberOfWordsIn();
    }
}

class Solution {
    /*
     * Complete the contacts function below.
     */
    static int[] contacts(string[][] queries) {
        Trie t = new Trie();
        List<int> counters = new List<int>();

        for (int i = 0; i < queries.Length; i++) {
            int n = 0;

            if (queries[i][0] == "add") {
                t.insert(queries[i][1]);
            } else {
                n = t.search(queries[i][1]);
                counters.Add(n);
            }
        }
        
        return counters.ToArray();
    }

    static void Main(string[] args) {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int queriesRows = Convert.ToInt32(Console.ReadLine());

        string[][] queries = new string[queriesRows][];

        for (int queriesRowItr = 0; queriesRowItr < queriesRows; queriesRowItr++) {
            queries[queriesRowItr] = Console.ReadLine().Split(' ');
        }

        int[] result = contacts(queries);

        textWriter.WriteLine(string.Join("\n", result));

        textWriter.Flush();
        textWriter.Close();
    }
}
