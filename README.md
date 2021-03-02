# Get IP Informations

# Sobre

Ferramenta desenvolvida em PHP com objetivo de verificar informações de localização de um visitante. 
Obtendo diversos dados como: Continente, país, estado, cidade e até uma coordenada aproximada de sua localização.

# Como funciona

Logo que o visitante acessar a página na qual o código está instalado alguns dados serão extraídos diretamente do client dele, sendo como a mais relevante o seu endereço de acesso.

Após coletar esse recurso o sistema envia uma requisição para a API "ip2Location" solicitando informações de localização de tal endereço coletado anteriormente, recebendo um json como resposta da API.

No final de sua execução o json é tratado e os dados são separados individualmente, possibilitando a leitura de dados como o continente, país, estado, etc.

# Porque utiliza-la

Esta ferramenta pode se fazer bastante útil caso você queira identificar ou coletar dados sobre quem são/de onde são seus visitantes, como por exemplo em serviços de chat, ou até mesmo para bloquear conteúdos para determinados locais. 

Porém, é importante lembrar que essa técnica por ser consideravelmente simples pode ser fácilmente **burlada** com sistemas de VPN ou simplesmente endereços de IP dinâmicos.
