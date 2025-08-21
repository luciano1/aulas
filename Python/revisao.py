nome=input("digite o nome:")
print ("olá",nome)

# Solicita ao usuário que digite o primeiro número
numero1 = input("Digite o primeiro número: ")

# Solicita ao usuário que digite o segundo número
numero2 = input("Digite o segundo número: ")

# Converte os valores de string para inteiros
numero1 = float(numero1)
numero2 = int(numero2)

# Soma os dois números
soma = numero1 + numero2

# Exibe o resultado da soma
print("A soma é:", soma)

# Pede ao usuário para digitar um número
numero = int(input("Digite um número: "))

# Verifica se o número é positivo
if numero > 0:
    print("O número é positivo.")

# Verifica se o número é negativo
elif numero < 0:
    print("O número é negativo.")

# Se não for positivo nem negativo, só pode ser zero
    else:
        print("O número é zero.")

# Começamos com o número 1
contador = 1

# Enquanto o contador for menor ou igual a 5
while contador <= 5:
    print("Contando:", contador)
    
    # Aumenta o contador em 1 a cada repetição
    contador += 1
    
# Usa range para gerar os números de 1 até 5
for numero in range(1, 6):
    print("Contando:", numero)

# Definindo a função
def saudacao(nome):
    print("Olá,", nome)

# Chamando a função
saudacao("Maria")
saudacao("João")






