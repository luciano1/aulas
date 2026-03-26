package objeto;

public class Produto {
    String nome;
    double preco;

    public Produto(String nome, double preco){
        this.nome = nome;
        this.preco = preco;
    }

    public Produto(){
        nome = "perfume";
        preco = 499;
    }

    public void info(){
        System.out.println("Produto: " + nome);
        System.out.println("Preço: " + preco);
    }

    public double alterar(double preco){
        return preco + 1; 
    }
}