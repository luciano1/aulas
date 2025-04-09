package com.mycompany.arcadenoe;

public class Animal {
    private String nome;
    private String especie;
    
    //metodo construtor sem argumentos
    public Animal(){
        this.nome="Cachorro";
        this.especie="Mamifero";
    }
    //metodo construtor com argumentos
    public Animal(String n, String e){
        nome = n;
        especie = e;
    }

    public String getNome(){
        return nome;
    }
    public String getEspecie(){
        return especie;
    }
    public void setNome(){
    }
    public void setEspecie(){
        
    }
}