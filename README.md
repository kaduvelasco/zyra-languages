# Zyra Languages

<!-- Project Shields -->
[![OpenSource](https://img.shields.io/badge/OPEN-SOURCE-green?style=for-the-badge)](https://opensource.org/)
[![GitHub license](https://img.shields.io/github/license/kaduvelasco/zyra-mustache?style=for-the-badge)](https://github.com/kaduvelasco/zyra-languages/blob/main/LICENSE)
[![PHP7.4](https://img.shields.io/badge/PHP-7.4-blue?style=for-the-badge)](https://www.php.net/)
[![PSR-12](https://img.shields.io/badge/PSR-12-orange?style=for-the-badge)](https://www.php-fig.org/psr/psr-12/)

> Classe auxiliar para utilização de vários idiomas com PHP.

>- [Começando](#-começando)
>- [Pré-requisitos](#-pré-requisitos)
>- [Instalação](#-instalação)
>- [Utilização](#-utilização)
>- [Colaborando](#-colaborando)
>- [Versão](#-versão)
>- [Autores](#-autores)
>- [Licença](#-licença)

## 🚀 Começando
Esta classe possibilita a utilização de vários idiomas em projetos PHP.

## 📋 Pré-requisitos
- PHP 7.4 ou superior
- Extensão json do PHP (ext-json)

## 🔧 Instalação
Utilizando um arquivo `composer.json`:
```json
{
    "require": {
        "kaduvelasco/zyra-languages": "^1"
    }
}
```
Depois, execute o comando de instalação.
```
$ composer install
```
OU execute o comando abaixo.
```
$ composer require kaduvelasco/zyra-languages
```

## 💻 Utilização

### Pacote de idioma
Será preciso criar quantos pacotes de idioma forem necessários para a sua aplicação. Um pacote de idioma é um arquivo `.json` com a seguinte estrutura:
```json
{
  "STRING_NAME": "String content",
  "STRING_NAME2": "String content 2"
}
```

**Importante** O nome da string deve ser totalmente em maiúsculo.

### Utilizando a Zyra Language em seu projeto

A utilização da classe é bem simples. Veja um exemplo:

```php
declare(strict_types=1);

namespace Zyra;

require_once 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$lang = new Languages();
```

#### Definindo o pacote de idiomas que será utilizado

A definição do pacote de idiomas pode ser feito no momento em que a classe é instanciada:

```php
$lang = new Languages('path/to/language/pack');
```

Ou utilizando o método `setLanguagePack`:
```php
$lang->setLanguagePack('path/to/language/pack');
```

**Importante** O caminho até o pacote de idiomas deve ser válido, caso contrário seu script será interrompido.

#### Utilizando as strings disponíveis no pacote de idiomas

Existem dois métodos disponíveis para utilização das strings. O primeiro, e mais simples, é o método `string`. Ele retorna o texto da string informada. Caso a string informada não exista, um erro é informado e a execução do script interrompida.

```php
echo $lang->string('STRING_NAME');
```

Outra forma é utilizando o método `format`, com ele é possível definir algumas tags HTML onde o texto será adicionado.

As tags suportadas são: 'div', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'span', 'pre', 'strong', 'em'

```php
echo $lang->format(
    'STRING_NAME',
    'html_tag',
    'html_class (opcional)',
    'html_style (opcional'
);

echo $lang->format('PROJECT_NAME', 'h1', '', 'border:1px solid red;');
# Retorna: <h1 style="border:1px solid red;">Zyra Language</h1>
```
**Importante** As propriedades definidas em _html_style_ sobrepões as definidas em _html_class_.

#### 

## 🤝 Colaborando

Por favor, leia o arquivo [CONDUCT.md][link-conduct] para obter detalhes sobre o nosso código de conduta e o arquivo [CONTRIBUTING.md][link-contributing] para detalhes sobre o processo para nos enviar pedidos de solicitação.

## 📌 Versão

Nós usamos [SemVer][link-semver] para controle de versão.

Para as versões disponíveis, observe as [tags neste repositório][link-tags].

O arquivo [VERSIONS.md][link-versions] possui o histórico de alterações realizadas no projeto.

## ✒️ Autores
- **Kadu Velasco** / Desenvolvedor
  - [Perfil][link-profile]
  - [Email][link-email]

## 📄 Licença

Esse projeto está sob licença MIT. Veja o arquivo [LICENSE][link-license] para mais detalhes ou acesse [mit-license.org](https://mit-license.org/).

[⬆ Voltar ao topo](#zyra-languages)

<!-- links -->
[link-conduct]:https://github.com/kaduvelasco/zyra-languages/blob/main/CONDUCT.md
[link-contributing]:https://github.com/kaduvelasco/zyra-languages/blob/main/CONTRIBUTING.md
[link-license]:https://github.com/kaduvelasco/zyra-languages/blob/main/LICENSE
[link-versions]:https://github.com/kaduvelasco/zyra-languages/blob/main/VERSIONS.md
[link-tags]:https://github.com/kaduvelasco/zara-phptools/tags
[link-semver]:http://semver.org/
[link-profile]:https://github.com/kaduvelasco
[link-email]:mailto:kadu.velasco@gmail.com
