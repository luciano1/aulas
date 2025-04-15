package com.mycompany.arcadenoe;

public class Marsupiais extends Mamifero{
    private boolean gestationInBag;
    private String locomocao;
    
    //construtor sem argumentos
    public Marsupiais(){
        super();
        this.gestationInBag=true;
        this.locomocao = "corre";
    }   
    //construtor com argumentos
    public Marsupiais(
            boolean gestacao, 
            String locomocao, 
            String alimentacao,
            String habitat,
            String nome,
            String especie
    ){
        super(alimentacao, habitat, nome, especie);
        this.gestationInBag = gestacao;
        this.locomocao = locomocao;
    }
    
    public boolean getGestationInBag(){
        return gestationInBag;    
    }
    public void setGestationInBag(boolean gestationInBag){
        this.gestationInBag = gestationInBag;
    }
    public String getLocomocao(){
        return locomocao;
    }
    public void setLocomocao(String locomocao){
        this.locomocao = locomocao;
    }
    
    
}
