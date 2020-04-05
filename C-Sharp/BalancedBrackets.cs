using System.CodeDom.Compiler;
using System.Collections.Generic;
using System.Collections;
using System.ComponentModel;
using System.Diagnostics.CodeAnalysis;
using System.Globalization;
using System.IO;
using System.Linq;
using System.Reflection;
using System.Runtime.Serialization;
using System.Text.RegularExpressions;
using System.Text;
using System;

class Solution {
    // Complete the isBalanced function below.
    static string isBalanced(string s) {
        char[] openingBrackets = new char[]{'{', '[', '('};
        char[] chars = s.ToCharArray(); 
        Stack<char> stack = new Stack<char>();

        foreach (char c in chars) {
            
            if (openingBrackets.Contains(c)) {
                stack.Push(c);
                continue;
            }

            if (stack.Count == 0) {
                return "NO";
            }

            char a = stack.Pop();

            if (a == '{' && c != '}') {
                return "NO";
            }

            if (a == '[' && c != ']') {
                return "NO";
            }

            if (a == '(' && c != ')') {
                return "NO";
            }
        }

        if (stack.Count > 0) {
            return "NO";
        }

        return "YES";
    }

    static void Main(string[] args) {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int t = Convert.ToInt32(Console.ReadLine());

        for (int tItr = 0; tItr < t; tItr++) {
            string s = Console.ReadLine();

            string result = isBalanced(s);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
