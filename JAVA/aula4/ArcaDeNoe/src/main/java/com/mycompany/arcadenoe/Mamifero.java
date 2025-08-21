package com.mycompany.arcadenoe;
public class Mamifero extends Animal{
    private String alimentacao;
    private String habitat;
    //Construtor com argumento
    public Mamifero(String nome, String especie, String alimentacao, String habitat){
        super(nome, especie);
        this.alimentacao = alimentacao;
    }
    //Construtor 
    public Mamifero() {
        super();
        this.alimentacao="";
        this.habitat="";
    }
    public String getAlimentacao(){
        return alimentacao;
    }
    public void setAlimentacao(String alimentacao){
        this.alimentacao=alimentacao;
    }
    public String getHabitat(){
        return this.habitat;
    }
    public void setHabitat(String habitat){
        this.habitat=habitat;
    }
    public String informacoes(){
        return("Especie: "+super.getEspecie()+" Nome: "
                +super.getNome()+"Alimentacao: "
                +getAlimentacao()+" Habitat: "+getHabitat());
    }   
}
