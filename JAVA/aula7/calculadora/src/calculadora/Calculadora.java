
package calculadora;
import java.util.Scanner;

public class Calculadora {
  
    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);
        System.out.println("Digite o first número");
        double num1 = input.nextDouble();
        System.out.println("Digite o Second número");
        double num2 = input.nextDouble();
        
        System.out.println("Escolha a Operação(+,-,*,/)");
        char operacao = input.next().charAt(0);

        switch (operacao){
            case '+':
                Operacoes soma = new Operacoes();            
                double resultado = soma.Soma(num1, num2);
                System.out.println("O Resultado da soma é: "+resultado);
                break;
            case '-':
                Operacoes menos = new Operacoes();
                double google = menos.menos(num1, num2);
                System.out.println("O Resultado do menos é: "+google);
                break;
            case '*':
                Operacoes multilplicar = new Operacoes();
                double jilson = multilplicar.multiplicar(num1, num2);
                System.out.println("O resultado da multiplicação é: "+jilson);
                break;
            case '/':
                Operacoes divisao = new Operacoes();
                double charque = divisao.divisao(num1, num2);
                System.out.println("O resultado da divisão é: "+charque);
                break;
        }
        input.close();
    }
    
    
}
