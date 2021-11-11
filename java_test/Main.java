import java.util.Scanner;

class Main {
  public static void main(String[] args) {
    int i, j, n, count;
    System.out.println("Type a number:");
    Scanner myObj = new Scanner(System.in);
    n = myObj.nextInt();

    count = 0;
     for(i = 0; i < n; i++)
     {
        for(j = 0; j < n; j++)
        {
          count = count + 1;
        }
     }

    for(i = 0; i < n; i++)
     {
        count = count + 1;
     }

     System.out.println("n = " + n + ", count = " + count);
  }
}