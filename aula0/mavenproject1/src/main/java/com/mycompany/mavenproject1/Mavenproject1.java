package com.mycompany.mavenproject1;

class Automovel{
    String nome;
    String status;
    String motor;
    
    void barulho(){
        System.out.println("RUIDO");
    }
}
class carro extends Automovel{
    
    void status(){
        System.out.println(nome+" está quebrado");
    }
   
}
class Moto extends Automovel{
    boolean daGrau;
    void cair(){
        System.out.println(nome+" caiu ao fazer zerinho");
    }
   
}
class MotoCombustao extends Moto{
     void abastecer(){
        System.out.println(nome+" esta com o tanque cheio");
    }
     @Override
    void barulho(){
        System.out.println("RAN DAN DAN DAN... pa pa pa");
    }
}

class MotoEletrica extends Moto{
    void carregar(){
        System.out.println(nome+", 100% carregada ");
    }
        

}  
    
public class Mavenproject1 {
    public static void main(String[] args) {
        Moto m = new MotoCombustao();
        m.daGrau=true;
        m.nome="YAMAHA MT03";
        m.status="EstaOK";
        m.motor="298CC";
        m.cair();
        m.barulho();
        
    }
}
