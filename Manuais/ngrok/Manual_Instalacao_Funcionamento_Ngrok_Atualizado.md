# Manual de Instalação e Funcionamento do Ngrok

## 1. Introdução {#introdução}

O Ngrok é uma ferramenta que permite expor servidores locais (como APIs,
sites e aplicações em desenvolvimento) para a internet de forma segura e
temporária. Ele cria um túnel seguro entre a sua máquina e um endpoint
público, facilitando testes, integrações e demonstrações sem a
necessidade de um servidor dedicado ou IP público.

## 2. Instalação do Ngrok {#instalação-do-ngrok}

Siga os passos abaixo para instalar o Ngrok em seu sistema:

### 2.1 Windows {#windows}

1\. Acesse o site oficial: https://ngrok.com/download  
2. Faça o download do arquivo ZIP correspondente ao Windows.  
3. Extraia o arquivo ngrok.exe para uma pasta de sua preferência (ex:
C:\ngrok).  
4. (Opcional) Adicione o caminho do executável ao PATH do sistema para
facilitar o uso no terminal.

### 2.2 Linux {#linux}

1\. Baixe o binário manualmente (opção tradicional):  
wget https://bin.equinox.io/c/4VmDzA7iaHb/ngrok-stable-linux-amd64.zip  
2. Extraia o arquivo ZIP:  
unzip ngrok-stable-linux-amd64.zip  
3. Mova o executável para um diretório do sistema:  
sudo mv ngrok /usr/local/bin  
  
OU  
  
Instale o Ngrok via Snap (método mais simples e automatizado):  
sudo snap install ngrok  
  
Caso o Snap ainda não esteja instalado em sua distribuição, você pode
instalá-lo com:  
sudo apt install snapd  
sudo systemctl enable \--now snapd.socket  
Após isso, o comando \'snap\' estará disponível para uso e você poderá
executar a instalação do Ngrok normalmente.

### 2.3 macOS {#macos}

1\. Instale via Homebrew (recomendado):  
brew install ngrok/ngrok/ngrok  
2. Ou faça o download manual do binário em: https://ngrok.com/download

## 3. Configuração {#configuração}

Após a instalação, é necessário autenticar sua conta Ngrok para liberar
o uso completo. Para isso, crie uma conta gratuita em
https://dashboard.ngrok.com e obtenha seu token de autenticação.

Execute o comando abaixo substituindo \<TOKEN\> pelo seu token
pessoal:  
ngrok config add-authtoken \<TOKEN\>

## 4. Funcionamento {#funcionamento}

O Ngrok funciona criando um túnel seguro entre sua máquina local e um
endpoint público na internet. Isso permite o acesso remoto a servidores
locais sem configurações adicionais de rede.

## 5. Exemplos de Uso {#exemplos-de-uso}

### 5.1 Expor um Servidor HTTP {#expor-um-servidor-http}

Se você estiver executando um servidor local na porta 8080, execute:  
ngrok http 8080  
O Ngrok exibirá uma URL pública (ex: https://abcd1234.ngrok.io), que
encaminhará requisições para seu servidor local.

### 5.2 Expor um Servidor HTTPS {#expor-um-servidor-https}

Para expor um servidor local rodando com HTTPS, use:  
ngrok http https://localhost:443

### 5.3 Especificar Subdomínio (contas pagas) {#especificar-subdomínio-contas-pagas}

Usuários de planos pagos podem definir subdomínios personalizados:  
ngrok http \--subdomain=meuprojeto 8080  
O endereço gerado será algo como: https://meuprojeto.ngrok.io

### 5.4 Visualizar o Painel Web {#visualizar-o-painel-web}

O Ngrok fornece um painel local acessível em:  
http://127.0.0.1:4040  
Nesse painel é possível inspecionar requisições HTTP, respostas e
detalhes do túnel ativo.

## 6. Dicas e Boas Práticas {#dicas-e-boas-práticas}

\- Evite expor dados sensíveis ou ambientes de produção via Ngrok.  
- Use senhas ou autenticação básica para endpoints públicos.  
- Monitore o painel web para depuração de requisições.  
- Gere novos túneis quando necessário, pois URLs mudam após reiniciar o
serviço.

## 7. Referências Oficiais {#referências-oficiais}

• Documentação oficial do Ngrok: https://ngrok.com/docs  
• Painel de usuário e tokens: https://dashboard.ngrok.com  
• Repositório GitHub (não oficial, para scripts e exemplos):
https://github.com/inconshreveable/ngrok
