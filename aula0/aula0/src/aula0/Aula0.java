package aula0;

class Animal{
    String nome;
    String alimetar;
    
    void emitirSom(){
        System.out.println("O animal emitiu som");
}
    void comer(){
        System.out.println("O animal comeu!");
    }
}

class Cachorro extends Animal{
    void abanarRabo(){
           System.out.println(nome+" esta abanando o rabo!");
       }
    void comer(){
        System.out.println(nome+" esta alimentado-se!");
    
    }
}
class Gato extends Animal{
    void ronronar(){
        System.out.println(nome+" esta ronronando");
    }
}


public class Aula0 {

    public static void main(String[] args) {
        Cachorro dog = new Cachorro();
        dog.nome = "Mimosa";
        dog.emitirSom();
        dog.abanarRabo();
        dog.comer();
        
        Gato cat = new Gato();
        cat.nome = "DestruidorDePlanetas";
        cat.ronronar();
        
    }
}
