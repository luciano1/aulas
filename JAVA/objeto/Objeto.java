package objeto;
import java.util.Scanner;
/*
Aula sobre métodos construtores
Professor: Luciano Rocha
*/

public class Objeto {
    public static void main(String[] args) {
        Scanner makita = new Scanner(System.in);
 
        System.out.println("Digite o nome:");
        String nomes = makita.nextLine();
        
        System.out.println("Digite o preço:");
        double precos = makita.nextDouble(); // Alterado para nextDouble
        
        Produto p0 = new Produto();
        Produto p1 = new Produto(nomes, precos);
        //p1.info();
        
        p1.preco = p1.alterar(p1.preco);
        p0.alterar(p0.preco);
        System.out.println("Novo preço: " + p1.preco);
        System.out.println("Novo preço: " + p0.preco);
    } 
} 