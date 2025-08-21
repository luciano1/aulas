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
    public Animal(String nome, String especie){
        this.nome = nome;
        this.especie = especie;
    }

    public String getNome(){
        return nome;
    }
    public String getEspecie(){
        return especie;
    }
    public void setNome(String nome){
        this.nome=nome;
    }
    public void setEspecie(String especie){
        this.especie=especie;
                
    }
}