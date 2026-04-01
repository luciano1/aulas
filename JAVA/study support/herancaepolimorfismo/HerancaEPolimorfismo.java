package com.mycompany.herancaepolimorfismo;



class Animal {
    String nome;
    int idade;
    
    void emitirSom(){
        System.out.println("Faz barulho");
    }
}
class Cachorro extends Animal {
    String pedigree;
    @Override
    void emitirSom(){
        System.out.println("AU AU");
    }
}
class Gato extends Animal {
    int numVidas;
    @Override
    void emitirSom(){
        System.out.println("miaAu");
    }
}
public class HerancaEPolimorfismo {
    public static void main(String[] args) {
        // Instanciando Cachorro
        Cachorro c1 = new Cachorro();
        c1.nome = "Gatuzo";
        c1.idade = 9;
        c1.pedigree = "sdffsdf1";

        // Instanciando Gato
        Gato g1 = new Gato();
        g1.nome = "Bola";
        g1.idade = 1;
        g1.numVidas = 7;

        // Saídas
        System.out.println("O cão " + c1.nome + " tem " + c1.idade + " anos e pedigree " + c1.pedigree);
        System.out.println("O gato " + g1.nome + " tem " + g1.idade + " ano e " + g1.numVidas + " vidas");
    }
}
