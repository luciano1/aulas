package aula1;
import java.util.Scanner;

class Funcionario{
    String nome;
    double salario=0;
    float cargaHoraria=0;
    double bonus =0;
} 
class Gerente extends Funcionario{
    boolean power;

}
class Desenvolvedor extends Funcionario{
    double pagamento(){
        double salariototal;
        salariototal=((1.2*salario)*cargaHoraria)/(bonus/100);
        return salariototal;
    }
}
public class Aula1 {

    public static void main(String[] args) {
        //Input
        Scanner input = new Scanner(System.in);      
        
        Desenvolvedor dev = new Desenvolvedor();
        System.out.println("Escreva o nome:");
        dev.nome= input.nextLine();    
        System.out.println("Escreva a Carga horaria em numeros:");
        dev.cargaHoraria=input.nextInt();
        System.out.println("Escreva o salario:");
        dev.salario=input.nextDouble();
        System.out.println("Escreva o bonus");
        dev.bonus=input.nextDouble();
        double valor1= dev.pagamento();
        System.out.println("R$ "+valor1+" este "
                + "é o salario de"+dev.nome);
        
        Gerente gerente = new Gerente();
        gerente.bonus=10;
        
    }
    
}
