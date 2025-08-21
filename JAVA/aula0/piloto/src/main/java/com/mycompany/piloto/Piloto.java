package com.mycompany.piloto;
import java.util.Scanner;

public class Piloto {

    public static void main(String[] args) {
          
        Scanner input = new Scanner(System.in);
        
        System.out.println("Digite o primeiro numero");
        int numero1 = input.nextInt();
        System.out.println("Digite o segundo numero");
        int numero2 = input.nextInt();
        System.out.println("Digite a operação. (+, -, *, /):");
        char opcao = input.next().charAt(0);
        float resultado=0;
        
        switch (opcao) {
            case '+':
                resultado = numero1+numero2;
                break;
            case '-':
                resultado = numero1-numero2;
                break;
            case '*':
                resultado = numero1*numero2;
                break;
            case '/':
                resultado = numero1/numero2;
                break;
  
        }
              
        System.out.println("O resultado é: " +resultado );
        
        input.close();

    }
}
