package strings_e_metodos;

// ============================================================
// CURSO TÉCNICO EM DESENVOLVIMENTO DE SISTEMAS - PROZ EDUCAÇÃO
// TEMA: MÉTODOS DA CLASSE STRING EM JAVA
// PROFESSOR: LUCIANO ROCHA
// ============================================================

public class Strings_e_Metodos {

    public static void main(String[] args) {

        // ----------------------------------------------------
        // 1) CRIAÇÃO DE STRING
        // ----------------------------------------------------
        String texto = "Java é incrível";

        System.out.println("Texto original: " + texto);


        // ----------------------------------------------------
        // 2) LENGTH() → TAMANHO DA STRING
        // ----------------------------------------------------
        System.out.println("Tamanho: " + texto.length());


        // ----------------------------------------------------
        // 3) TOUPPERCASE() → MAIÚSCULO
        // ----------------------------------------------------
        System.out.println("Maiúsculo: " + texto.toUpperCase());


        // ----------------------------------------------------
        // 4) TOLOWERCASE() → MINÚSCULO
        // ----------------------------------------------------
        System.out.println("Minúsculo: " + texto.toLowerCase());


        // ----------------------------------------------------
        // 5) CHARAT() → PEGAR UM CARACTERE
        // ----------------------------------------------------
        System.out.println("Primeira letra: " + texto.charAt(0));


        // ----------------------------------------------------
        // 6) EQUALS() → COMPARAR STRINGS
        // ----------------------------------------------------
        String a = "Java";
        String b = "Java";

        System.out.println("São iguais? " + a.equals(b));


        // ----------------------------------------------------
        // 7) EQUALSIGNORECASE() → IGNORA MAIÚSCULO/MINÚSCULO
        // ----------------------------------------------------
        String c = "java";

        System.out.println("Igual ignorando case? " + a.equalsIgnoreCase(c));


        // ----------------------------------------------------
        // 8) CONTAINS() → VERIFICAR SE CONTÉM TEXTO
        // ----------------------------------------------------
        System.out.println("Contém 'Java'? " + texto.contains("Java"));


        // ----------------------------------------------------
        // 9) STARTSWITH() → COMEÇA COM
        // ----------------------------------------------------
        System.out.println("Começa com 'Java'? " + texto.startsWith("Java"));


        // ----------------------------------------------------
        // 10) ENDSWITH() → TERMINA COM
        // ----------------------------------------------------
        System.out.println("Termina com 'incrível'? " + texto.endsWith("incrível"));


        // ----------------------------------------------------
        // 11) INDEXOF() → POSIÇÃO DE UM TEXTO
        // ----------------------------------------------------
        System.out.println("Posição de 'é': " + texto.indexOf("é"));


        // ----------------------------------------------------
        // 12) LASTINDEXOF() → ÚLTIMA OCORRÊNCIA
        // ----------------------------------------------------
        String frase = "banana";
        System.out.println("Última posição de 'a': " + frase.lastIndexOf("a"));


        // ----------------------------------------------------
        // 13) SUBSTRING() → PARTE DA STRING
        // ----------------------------------------------------
        System.out.println("Substring (0,4): " + texto.substring(0, 4));


        // ----------------------------------------------------
        // 14) REPLACE() → SUBSTITUI TEXTO
        // ----------------------------------------------------
        System.out.println("Trocar Java por Python: " + texto.replace("Java", "Python"));


        // ----------------------------------------------------
        // 15) TRIM() → REMOVE ESPAÇOS
        // ----------------------------------------------------
        String espaco = "   Java   ";
        System.out.println("Sem espaços: '" + espaco.trim() + "'");


        // ----------------------------------------------------
        // 16) SPLIT() → DIVIDIR STRING
        // ----------------------------------------------------
        String nomes = "Ana,Carlos,João";

        String[] lista = nomes.split(",");

        for (int i = 0; i < lista.length; i++) {
            System.out.println("Nome: " + lista[i]);
        }


        // ----------------------------------------------------
        // 17) CONCATENAÇÃO
        // ----------------------------------------------------
        String nome = "Luciano";
        String mensagem = "Olá, " + nome;

        System.out.println(mensagem);


        // ----------------------------------------------------
        // 18) VALUEOF() → CONVERTER PARA STRING
        // ----------------------------------------------------
        int numero = 10;
        String textoNumero = String.valueOf(numero);

        System.out.println("Número como texto: " + textoNumero);


        // ----------------------------------------------------
        // 19) IS EMPTY() → STRING VAZIA
        // ----------------------------------------------------
        String vazio = "";

        System.out.println("Está vazia? " + vazio.isEmpty());


        // ----------------------------------------------------
        // 20) COMPARETO() → COMPARAÇÃO
        // ----------------------------------------------------
        String x = "Ana";
        String y = "Carlos";

        System.out.println("Comparação: " + x.compareTo(y));


        // ----------------------------------------------------
        // FIM
        // ----------------------------------------------------
        System.out.println("Fim da demonstração!");

    }
}