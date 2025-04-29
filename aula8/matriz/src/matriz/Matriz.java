package matriz;
import java.util.Scanner;

public class Matriz {

    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);
        boolean repetir=true;
        int [][] matriz = new int[4][4];
        while(repetir){
            System.out.println("Insira os valores: ");
            int value = input.nextInt();
            System.out.println("Insira a posicao X: ");
            int posicaoX = input.nextInt();
            System.out.println("Insira a posicao Y: ");
            int posicaoY = input.nextInt();
            matriz[posicaoX][posicaoY]=value;
            System.out.print("1 - sair: ");
            int sair = input.nextInt();
            repetir = (sair == 1) ? false : true;
            
            //imprimir
            for(int linha = 0; linha<4;linha++){
                System.out.println(" ");
                for(int coluna = 0; coluna < 4; coluna++){
                    System.out.print(matriz[linha][coluna]+"\t");
                }
            }
            
            }cl
        for(int i=0; i<3; i++){
                for(int j = 0; j<3; j++){
                    int valor = matriz[i][j];
                    if(valor%2==0){
                        System.out.println(valor+ "eh par");
                    }
                    if(valor%2!=0){
                        System.out.println(valor+ "eh impar");
                    }
                }
        }
        
    }
    
}
