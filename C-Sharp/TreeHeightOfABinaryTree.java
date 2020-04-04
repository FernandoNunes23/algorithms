import java.util.*;
import java.io.*;

class Node {
    Node left;
    Node right;
    int data;
    
    Node(int data) {
        this.data = data;
        left = null;
        right = null;
    }
}

class Solution {

    /*
    class Node 
        int data;
        Node left;
        Node right;
    */
    public static int height(Node root) {
        int maxHeight = 0;          
        Stack<Node> s = new Stack<Node>();

        s.push(root);

        int h = 0;

        while (s.empty() == false) {
            Node n = s.pop();

            if (h > maxHeight) {
                maxHeight = h;
            }

            if (n == root.right) {
                h = 1;
            }

            if ((n.right != null || n.left != null)) {
                h++;
            }
            
            if (n.right != null) {
                s.push(n.right);
            }

            if (n.left != null) {
                s.push(n.left);
            }
        }

        return maxHeight;
    }

    public static Node insert(Node root, int data) {
        if(root == null) {
            return new Node(data);
        } else {
            Node cur;
            if(data <= root.data) {
                cur = insert(root.left, data);
                root.left = cur;
            } else {
                cur = insert(root.right, data);
                root.right = cur;
            }
            return root;
        }
    }

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        int t = scan.nextInt();
        Node root = null;
        while(t-- > 0) {
            int data = scan.nextInt();
            root = insert(root, data);
        }
        scan.close();
        int height = height(root);
        System.out.println(height);
    }   
}