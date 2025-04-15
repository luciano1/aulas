
package com.mycompany.arcadenoe;

public class ArcaDeNoe {

    public static void main(String[] args) {
       
        Marsupiais qualquerMarsupiais = new Marsupiais(
                true,
                "pulando",
                "cuicadagua",
                "aquatico",
                "carnivoro",
                "didelfídeos");     
        
        String locomocao=qualquerMarsupiais.getLocomocao();
        System.out.println("A locomocação do"+ qualquerMarsupiais.getNome()+" eh: "+locomocao);
    }
}
