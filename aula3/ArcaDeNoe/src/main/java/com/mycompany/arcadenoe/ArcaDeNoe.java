package com.mycompany.arcadenoe;

public class ArcaDeNoe {

    public static void main(String[] args) {
        Animal x86 = new Animal("Zebralo", "Equino");
        Animal normal = new Animal();
        Animal cr7 = new Animal("Cristino Ronaldo", "Robozão");
        
        System.out.println("Nome do animal: "+x86.getNome());
        System.out.println("Especie do animal: "+x86.getEspecie());
        
        System.out.println("Nome padrão: "+normal.getNome());
        System.out.println("Especie padrão: "+normal.getEspecie());
    }
}
